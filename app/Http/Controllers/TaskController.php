<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function edit($id)
{
    $task = Task::findOrFail($id);
    return view('tasks.edit', compact('task'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Task::create([
            'name' => $request->name,
            'completed' => false,
        ]);

        return redirect()->route('tasks.index');
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'name' => $request->name,
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function toggle($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = !$task->completed;
        $task->save();

        return redirect()->route('tasks.index');
    }
}
