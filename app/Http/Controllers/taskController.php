<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = task::where('user_id', auth()->id())->get();
        
        $grouped = $tasks->groupBy('status');

        return view('tasks.index', compact('grouped'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'status' => 'required|string'
        ]);

        $validated['user_id'] = auth()->id();

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateStatus(Request $request,task $task)
    {
        if ($task->user_id !== auth()->id()) {
        abort(403);
        }

        $statuses = ['to_do', 'in_progress', 'done'];

        $currentIndex = array_search($task->status, $statuses);
        $nextIndex = ($currentIndex + 1) % count($statuses);

        $task->status = $statuses[$nextIndex];
        $task->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
    $task->delete();
    return back();
    }
}
