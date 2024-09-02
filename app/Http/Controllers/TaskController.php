<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::fetch()
            ->orderBy('priority')->get();

        $projects = Project::fetch()->get();

        return view('task.index', compact('tasks', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        //
        Task::create($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $projects = Project::fetch()->get();

        return view('task.edit', compact('task', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, Task $task)
    {
        //
        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task): \Illuminate\Http\RedirectResponse
    {
        //
        $task->delete();

        return redirect()->route('tasks.index')->with('success-delete', 'Task deleted successfully');
    }
}
