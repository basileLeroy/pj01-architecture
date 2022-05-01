<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchitectureController extends Controller
{
    public function showArchitecture()
    {
        $projects = Project::all();
        return view('projects.architecture')->with('projects', $projects);
    }

    public function showProject($locale, $project)
    {
        $cover = Project::where('project_name', '=', $project)
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

        Project::create([
            'project_name' => $request->input('projectTitle'),
            'project_image' => $addNewImage,
            'project_gallery' => $gallery,
        ]);

        return redirect()->back();

        // return view('architecture')->with('projects', $projects);
    }
    public function updateProject($locale, $project, Request $request)
    {

        $currentProject = Project::where('project_name', '=', $project)
            ->first();

        $request->validate([
            'projectCover' => 'image|mimes:jpg,png,jpeg|max:5048',
            'projectGallery.*' => 'mimes:jpg,png,jpeg'
        ]);

        $addNewImage = null;
        $gallery = [];

        $coverExists = Storage::exists($currentProject->project_image);

        if($request->projectCover) {
            // TODO: remove current cover image
            if($coverExists) {
                Storage::delete($currentProject->project_image);
            }
            // TODO: store new image in storage
            $addNewImage = $request->file('projectCover')->store('images/architecture/icons');

            //TODO: update cover in DB
            $currentProject->project_image = $addNewImage;
        };

        if($request->projectGallery) {
            //TODO: remove gallery from storage
            foreach ($currentProject->project_gallery as $image){
                Storage::delete($image);
            }

            //TODO: update new gallery to storage
            foreach($request->projectGallery as $image) {
                $singleImage = $image->store('images/architecture/slider');
                $gallery[] = $singleImage;
            };

            //TODO: update slider to DB
            $currentProject->project_gallery = $gallery;
        }

        if($request->description) {
            $currentProject->description = $request->description;
        }

        $currentProject->save();
        return redirect()->back();
    }

}
