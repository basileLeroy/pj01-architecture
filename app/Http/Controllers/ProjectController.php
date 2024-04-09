<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

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

    public function show (Project $project)
    {
        return view("pages.guest.projects.show")->with([
            "project" => $project
        ]);
    }
}
