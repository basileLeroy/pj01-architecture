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
        return view('projects.project')->with('project', $project);
    }

    public function addProject(Request $request)
    {
        $request->validate([
            'projectTitle' => 'required',
            'projectCover' => 'mimes:jpg,png,jpeg|max:5048'
        ]);

        $addNewImage = null;

        if($request->projectCover) {
            $addNewImage = time().'-'.$request->projectTitle.'.'.$request->projectCover->extension();
            $request->projectCover->move(public_path('images\architectuur\icons'), $addNewImage);
        };


        $projects = Project::create([
            'project_name' => $request->input('projectTitle'),
            'project_image' => $addNewImage
        ]);
        

        return redirect()->back();

        // return view('architecture')->with('projects', $projects);

    }
}
