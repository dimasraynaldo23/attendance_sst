<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\StatusProject;

class ProjectController extends Controller
{
    public function index(StatusProject $statusProject)
    {
        $projects = Project::all();
        $statusProjects = StatusProject::all();
        $statusProjects = StatusProject::pluck('status', 'id_status_project');
        $id_status_project = 2;
        return view('admin.project.index', compact('projects', 'id_status_project', 'statusProjects'));
    }

    // public function create()
    // {
    //     return view('admin.project.create');
    // }

    public function store(Request $request)
    {

        $request->validate([
            'code' => 'required|unique:projects',
            'name' => 'required'
        ]);
        
        $project = new Project();

        $project->code = $request->input('code');
        $project->name = $request->input('name');

        $project->save();

        return redirect('/project')->with('status','Project data has been successfully added!');
    }

    public function update(Request $request, Project $project)
    {
        $project_id = $project->id_project;
        $project = Project::findOrFail($project_id);

        $project->code = $request->input('code');
        $project->name = $request->input('name');
        $project->status = $request->input('status');
        $project->update();
        
        return redirect('/project')->with('status','Project data has been updated!');
    }

    public function destroy(Project $project)
    {
        Project::destroy($project->id_project);
        return redirect('/project')->with('status','Project data has been deleted!');
    }
}