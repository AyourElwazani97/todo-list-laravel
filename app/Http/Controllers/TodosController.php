<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Todos::all();
        return view("todos.index", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("todos.index");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'todo' => "required",
        ]);

        $todo = new Todos();
        $todo->todo = strip_tags($request->input('todo'));
        $todo->save();
        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Todos::findOrfail($id);
        return view('todos.show', ["data" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Todos::findOrfail($id);
        return view('todos.edit', ["data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'todo' => "required",
        ]);
        $table = Todos::findOrfail($id);
        $table->todo = strip_tags($request->input('todo'));
        $table->status = strip_tags($request->input('status'));

        $table->save();
        return redirect()->route('todos.index');
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $todo = Todos::findOrfail($id);
        $todo->delete();
        return redirect()->route('todos.index');
    }
}
