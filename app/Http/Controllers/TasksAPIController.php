<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResources;
use App\Http\Resources\TaskResourceCollection;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : TaskResourceCollection
    {
        return new TaskResourceCollection(resource: Task::paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $task = Task::create($request->all());

        return new TaskResources($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task) : TaskResources
    {
        return new TaskResources($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task = $task->update($request->all());

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json('Apagado!');
    }
}
