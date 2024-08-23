<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

    public function store(Request $request)
    {
      $request->validate([
              'title' => 'required|string|max:255',
              'description' => 'nullable|string',
              'user_id' => 'required|exists:users,id',
          ]);

      Task::create([
          'title' => $request->title,
          'description' => $request->description,
          'user_id' => $request->user_id,
          'is_completed' => false,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $users = User::all();
        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }


    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function markAsDone(Task $task)
    {
        $task->update(['is_completed' => true]);

        return redirect()->route('tasks.index')->with('success', 'Task marked as completed.');
    }

}
