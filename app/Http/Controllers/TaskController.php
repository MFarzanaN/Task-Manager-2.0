<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Display a listing of tasks.
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Show the form for creating a new task.
    public function create()
    {
        return view('tasks.create');
    }

    // Store a newly created task in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|max:255',
            'description' => 'nullable',
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // Display the specified task.
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Show the form for editing the specified task.
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update the specified task in storage.
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title'       => 'required|max:255',
            'description' => 'nullable',
            'completed'   => 'sometimes|boolean',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Remove the specified task from storage.
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
