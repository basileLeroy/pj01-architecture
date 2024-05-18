<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function Pest\Laravel\json;
use function PHPUnit\Framework\isEmpty;

class ProjectController extends Controller
{
    // client view
    public function index ()
    {

        $projects = Project::where("language", App()->getLocale())->orderBy('index', 'ASC')->get();

        // dd($projects);
        return view("pages.guest.projects.index")->with([
            "projects" => $projects
        ]);
    }

    // client view
    public function show ($locale, $slug)
    {
        $project = Project::where(["slug" => $slug, "language" => $locale])->first();

        
        return view("pages.guest.projects.show")->with([
            "project" => $project
        ]);
    }

    // admin view
    public function create ()
    {
        $projects = Project::where("language", "fr")->orderBy('index', 'ASC')->get();

        return view("pages.admin.projects.create")->with([
            "projects" => $projects
        ]);
    }

    // admin POST request (creating new project)
    public function store (Request $request)
    {
        $languages = ["nl", "fr", "en"];

        $request->validate([
            "title" => "required|min:3",
            "cover" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:5048",
            "gallery.*" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:5048"
        ]);

        $slug = Str::slug($request->title);

        $cover = null;
        $gallery = [];

        if($request->cover) {
            $cover = Storage::disk('public')->put('images/projects/' . $slug . '/cover/', $request->cover);
        };

        if($request->gallery) {
            foreach($request->gallery as $image) {
                $galleryImage = Storage::disk('public')->put('images/projects/' . $slug . '/gallery/', $image);
                $gallery[] = "storage/" . $galleryImage;
            };
        }

        $indexCount = Project::where("language", "fr")->get()->count() + 1;

        foreach ($languages as $lang) {

            if($lang === "nl") {
                $content = "<p>Er is nog geen inhoud beschikbaar.</p>";
            } else if ($lang === "fr") {
                $content = "<p>Aucun contenu disponible pour le moment.</p>";
            } else {
                $content = "<p>No content available yet.</p>";
            }

            Project::create([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $content,
                'language' => $lang,
                'cover' => "storage/" . $cover,
                'gallery' => $gallery,
                'index' => $indexCount
            ]);
        }

        return redirect()->route("admin.projects.create");
    }

    // admin view
    public function edit ($slug)
    {
        $projects = Project::where("slug", $slug)->get();

        $firstProject = Project::where(["slug" => $slug, "language" => "fr"])->first();

        return view("pages.admin.projects.edit", compact('projects', 'firstProject'));
    }

    // admin POST request (update project)
    public function update (Request $request, $slug)
    {
        $languages = ["nl", "fr", "en"];

        $request->validate([
            "cover"=>"image|mimes:jpeg,png,jpg,gif,svg|max:5048",
            "gallery.*" => "image|mimes:jpeg,png,jpg,gif,svg|max:5048",

            "nl.title" => "required",
            "nl.content" => "required",

            "fr.title" => "required",
            "fr.content" => "required",

            "en.title" => "required",
            "en.content" => "required",
        ]);

        $cover = $request->cover ?? null;
        $newGallery = $request->gallery ?? [];
        $currentGallery = $request->currentGallery ?? [];
        $toRemove = $request->deletions ?? [];

        // removing images from local storage
        foreach($toRemove as $image) {
            // subtracting the "storage/" out of the path from the image
            $storagePathToGallery = substr($image, 8);
            
            if (Storage::disk("public")->exists($storagePathToGallery)) {
                Storage::disk('public')->delete($storagePathToGallery);
            }
        }

        foreach($newGallery as $image) {
            $galleryImage = Storage::disk('public')->put('images/projects/' . $slug . '/gallery/', $image);
            $gallery[] = "storage/" . $galleryImage;
        };

        foreach ($languages as $lang) {
            $title = "";
            $content = "";

            if ($lang == "nl") {
                $title = $request->nl["title"];
                $content = $request->nl["content"];

            } else if ($lang == "en") {
                $title = $request->en["title"];
                $content = $request->en["content"];

            } else  {
                $title = $request->fr["title"];
                $content = $request->fr["content"];            
            }

            $project = Project::where(["slug" => $slug, "language" => $lang])->first();

            if ($title !== $project->title) {
                $project->title = $title;
            }

            if ($content !== $project->description) {
                $project->description = $content;
            }

            if ($cover !== null) {
                $storagePathToCover = substr($project->cover, 8);
                if (Storage::disk("public")->exists($storagePathToCover)) {
                    Storage::disk("public")->delete($storagePathToCover);
                }

                $newCoverImage = Storage::disk('public')->put('images/projects/' . $slug . '/cover/', $cover);
                $project->cover = 'storage/' . $newCoverImage;
            }

            if (!empty($toRemove)) {
                $updatedGallery = array_values(array_diff($currentGallery, $toRemove));
                $project->gallery = $updatedGallery;
            } else  {
                $project->gallery = $currentGallery;
            }

            if (!empty($gallery)) {
                $project->gallery = array_merge($project->gallery, $gallery);
            }
            
            $project->save();
        }

        return redirect()->back();
    }

    public function updateListOrder (Request $request)
    {
        $request->validate([
            "projects" => "required|array"
        ]);

        foreach($request->projects as $index => $slug) {
            $projects = Project::where("slug", $slug)->get();
            foreach($projects as $project) {
                $project->index = $index;
                $project->save();
            }
        };

        return redirect()->back();
    }
}