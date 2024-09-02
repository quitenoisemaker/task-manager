<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::fetch()->orderBy('id', 'desc')->get();
        return view('project.index', compact('projects'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request): \Illuminate\Http\JsonResponse
    {
        $project = Project::find($request->project_id);
        
        $projectTasks = $project->tasks()->orderBy('priority')->get();

        return response()->json($projectTasks);
    }
}
