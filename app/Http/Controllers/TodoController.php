<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Task::all();
        return response()->json($todos);
    }

    public function show($id)
    {
        $todo = Task::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        return response()->json($todo);
    }

    public function store(Request $request)
    {
        $todo = new Task;
        $todo->category = $request->input('category');
        $todo->due_date = $request->input('due_date');
        $todo->estimate = $request->input('estimate');
        $todo->importance = $request->input('importance');
        $todo->save();
        return response()->json($todo, 201);
    }

    public function update(Request $request, $id)
    {
        $todo = Task::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        $todo->category = $request->input('category');
        $todo->due_date = $request->input('due_date');
        $todo->estimate = $request->input('estimate');
        $todo->importance = $request->input('importance');
        $todo->save();
        return response()->json($todo);
    }

    public function destroy($id)
    {
        $todo = Task::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        $todo->delete();
        return response()->json(['message' => 'Todo deleted'], 200);
    }}
