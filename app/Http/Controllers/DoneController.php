<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class DoneController extends Controller
{
    public function index()
    {
        $dones = Task::all();
        return response()->json($dones);
    }

    public function show($id)
    {
        $done = Task::find($id);
        if (!$done) {
            return response()->json(['message' => 'Done not found'], 404);
        }
        return response()->json($done);
    }

    public function store(Request $request)
    {
        $done = new Task;
        $done->category = $request->input('category');
        $done->due_date = $request->input('due_date');
        $done->estimate = $request->input('estimate');
        $done->importance = $request->input('importance');
        $done->save();
        return response()->json($done, 201);
    }

    public function update(Request $request, $id)
    {
        $done = Task::find($id);
        if (!$done) {
            return response()->json(['message' => 'Done not found'], 404);
        }
        $done->category = $request->input('category');
        $done->due_date = $request->input('due_date');
        $done->estimate = $request->input('estimate');
        $done->importance = $request->input('importance');
        $done->save();
        return response()->json($done);
    }

    public function destroy($id)
    {
        $done = Task::find($id);
        if (!$done) {
            return response()->json(['message' => 'Done not found'], 404);
        }
        $done->delete();
        return response()->json(['message' => 'Done deleted'], 200);
    }
}
