<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ArchitectureController extends Controller
{
    public function showArchitecture()
    {
        $projects = Project::all();
        return view('architecture')->with('projects', $projects);
    }
    
    public function showProject($locale, $project)
    {
        $cover = Project::get()
        ->where('project_name', '=', $project)
        ->first();

        return view('projects.project')
            ->with('project', $project)
            ->with('cover', $cover);
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
            $addNewImage = time().'-'.$request->projectTitle.'.'.$request->projectCover->extension();
            $request->projectCover->move(public_path('images\architectuur\icons'), $addNewImage);
        };

        if($request->projectGallery) {
            $i = 1;

            foreach($request->projectGallery as $image) {
                $singleImage = time().'-'.$request->projectTitle.'-'.$i++.'.'.$image->extension();
                array_push($gallery, $singleImage);

                $image->move(public_path('images\architectuur\slider\\' . $request->projectTitle), $singleImage);
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
}
