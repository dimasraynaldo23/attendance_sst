<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index', ['projects'=> $projects]);
    }

    // public function create()
    // {
    //     return view('admin.project.create');
    // }

    public function store(Request $request)
    {
        Project::create($request->all());
        return redirect('/project')->with('status','Project data has been successfully added!');
    }

    public function update(Request $request, Project $project)
    {
        $project_id = $project->id_project;
        $project = Project::findOrFail($project_id);

        $project->name = $request->input('name');

        $project->update();
        return redirect('/project')->with('status','Employe data has been updated!');
    }

    public function destroy(Project $project)
    {
        Project::destroy($project->id_project);
        return redirect('/project')->with('status','Employe data has been deleted!');
    }
}
