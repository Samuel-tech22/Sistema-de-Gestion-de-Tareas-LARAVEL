<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = Task::latest() -> get();
        return view('index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Nueva tarea asignada exitosamente.');
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
    public function edit(task $task): View
    {
        return view('edit', ['tasks'=> $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, task $task): RedirectResponse
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $task -> update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tarea actualizanda exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task): RedirectResponse
    {
        $task -> delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea Eliminada.');
    }
}
