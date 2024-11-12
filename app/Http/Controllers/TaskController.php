<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', auth()->id())->orderBy('priority', 'desc');

        if ($request->has('priority')) {
            $tasks->where('priority', $request->input('priority'));
        }

        if ($request->has('status')) {
            $tasks->where('status', (bool)$request->input('status'));
        }

        return view('tasks.index')->with(['tasks' => $tasks->get()]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|max:300',
            'priority' => 'sometimes|nullable|in:0,1,2,3',
        ]);

        $data['user_id'] = auth()->id();
        $task = Task::create($data);

        return redirect()->route('index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $request->merge([
            'status' => filter_var($request->input('status'), FILTER_VALIDATE_BOOLEAN),
        ]);

        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required|integer|in:0,1,2,3',
            'status' => 'required|boolean',
        ]);

        $task->update($data);

        return redirect()->route('index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('index');
    }
}
