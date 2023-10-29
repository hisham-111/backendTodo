<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class DoingController extends Controller
{
    public function index()
    {
        $doings = Task::all();
        return response()->json($doings);
    }

    public function show($id)
    {
        $doing = Task::find($id);
        if (!$doing) {
            return response()->json(['message' => 'Doing not found'], 404);
        }
        return response()->json($doing);
    }

    public function store(Request $request)
    {
        $doing = new Task;
        $doing->category = $request->input('category');
        $doing->due_date = $request->input('due_date');
        $doing->estimate = $request->input('estimate');
        $doing->importance = $request->input('importance');
        $doing->save();
        return response()->json($doing, 201);
    }

    public function update(Request $request, $id)
    {
        $doing = Task::find($id);
        if (!$doing) {
            return response()->json(['message' => 'Doing not found'], 404);
        }
        $doing->category = $request->input('category');
        $doing->due_date = $request->input('due_date');
        $doing->estimate = $request->input('estimate');
        $doing->importance = $request->input('importance');
        $doing->save();
        return response()->json($doing);
    }

    public function destroy($id)
    {
        $doing = Task::find($id);
        if (!$doing) {
            return response()->json(['message' => 'Doing not found'], 404);
        }
        $doing->delete();
        return response()->json(['message' => 'Doing deleted'], 200);
    }
}
