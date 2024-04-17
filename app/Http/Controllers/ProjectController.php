<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function Pest\Laravel\json;

class ProjectController extends Controller
{
    public function index ()
    {

        $projects = Project::where("language", App()->getLocale())->get();

        // dd($projects);
        return view("pages.guest.projects.index")->with([
            "projects" => $projects
        ]);
    }

    public function show ($locale, $slug)
    {
        $project = Project::where(["slug" => $slug, "language" => $locale])->first();

        
        return view("pages.guest.projects.show")->with([
            "project" => $project
        ]);
    }

    public function create ()
    {
        $projects = Project::where("language", "fr");

        return view("pages.admin.projects.create")->with([
            "projects" => $projects
        ]);
    }

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
            ]);
        }

        return redirect()->route("admin.projects.create");
    }
}