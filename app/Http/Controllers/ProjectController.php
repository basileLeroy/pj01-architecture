<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

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
}
