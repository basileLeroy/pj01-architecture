<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class ArchitectureController extends Controller
{
    public function showArchitecture()
    {
        $localeLanguage = App::getLocale();
        $projects = Project::where('language', '=', $localeLanguage)
            ->get();

//        ddd($projects);
        return view('projects.architecture')->with('projects', $projects);
    }

    public function showProject($locale, $project)
    {
        $localeLanguage = App::getLocale();
        $cover = Project::where('project_name', '=', $project)
            ->where('language', '=', $localeLanguage)
            ->first();
        return view('projects.project')
            ->with('project', $project)
            ->with('cover', $cover)
            ->with('imageArray', $cover->project_gallery);
    }

    public function addProject(Request $request)
    {
        $request->validate([
            'projectTitle' => 'required',
            'projectCover' => 'image|mimes:jpg,png,jpeg|max:5048',
            'projectGallery.*' => 'mimes:jpg,png,jpeg'
        ]);

        $addNewImage = null;
        $gallery = [];

        if($request->projectCover) {
            $addNewImage = $request->file('projectCover')->store('images/architecture/icons');
        };

        if($request->projectGallery) {
            $i = 1;
            foreach($request->projectGallery as $image) {
                $singleImage = $image->store('images/architecture/slider');
                $gallery[] = $singleImage;
            };
        }
        $languages = ["nl", "fr", "en"];
        foreach ($languages as $lang) {

            if($lang === "nl") {
                $noContentMessage = "Er is nog geen inhoud beschikbaar.";
            } else if ($lang === "fr") {
                $noContentMessage = "Aucun contenu disponible pour le moment.";
            } else {
                $noContentMessage = "No content available yet.";
            }


            Project::create([
                'project_name' => $request->input('projectTitle'),
                'project_image' => $addNewImage,
                'project_gallery' => $gallery,
                "description" => $noContentMessage,
                "language" => $lang,
            ]);
        }
//        Project::create([
//            'project_name' => $request->input('projectTitle'),
//            'project_image' => $addNewImage,
//            'project_gallery' => $gallery,
//        ]);

        return redirect()->back();

        // return view('architecture')->with('projects', $projects);
    }
    public function updateProject($locale, $project, Request $request)
    {

        $languages = ["nl", "fr", "en"];

        $request->validate([
            'projectCover' => 'image|mimes:jpg,png,jpeg|max:5048',
            'projectGallery.*' => 'mimes:jpg,png,jpeg'
        ]);

        foreach($languages as $lang) {

            $currentProject = Project::where('project_name', '=', $project)
                ->where('language','=',$lang)
                ->first();

            $addNewImage = null;
            $gallery = [];

            $coverExists = Storage::exists($currentProject->project_image);

            if($request->projectCover) {
                if($coverExists) {
                    Storage::delete($currentProject->project_image);
                }
                $addNewImage = $request->file('projectCover')->store('images/architecture/icons');

                $currentProject->project_image = $addNewImage;
            };

            if($request->projectGallery) {
                foreach ($currentProject->project_gallery as $image){
                    Storage::delete($image);
                }

                foreach($request->projectGallery as $image) {
                    $singleImage = $image->store('images/architecture/slider');
                    $gallery[] = $singleImage;
                };

                $currentProject->project_gallery = $gallery;
            }

            $currentProject->save();
        }

        if($request->projectTitle) {
            $localeLanguage = App::getLocale();
            $langSpecificProject = Project::where('project_name', '=', $project)
                ->where('language','=',$localeLanguage)
                ->first();
            $langSpecificProject->title = $request->projectTitle;

            $langSpecificProject->save();
        }

        if($request->description) {
            $localeLanguage = App::getLocale();
            $langSpecificProject = Project::where('project_name', '=', $project)
                ->where('language','=',$localeLanguage)
                ->first();
            $langSpecificProject->description = $request->description;

            $langSpecificProject->save();
        }
        return redirect()->back();
    }

    public function deleteProject ($locale, $project)
    {
        $projects = Project::all();
        $languages = ["nl","fr","en"];

        foreach ($languages as $lang) {
            $currentProject = Project::where('project_name', '=', $project)
                ->where('language','=',$lang)
                ->first();
            $currentProject->delete();
        }
        return redirect(route('architectuur', ['locale' => app()->getLocale()] ));
    }

}
