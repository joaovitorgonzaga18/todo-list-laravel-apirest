<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TasksController extends Controller {

    public function createTask(Request $request) {
        
        $task = Tasks::create($request->all());

        return response()->json($task, 201);

    }
    
    public function getAll() : JsonResponse {

        $tasks = Tasks::all();

        return response()->json($tasks);

    }

    public function getTask($id) : JsonResponse {

        $task = Tasks::find($id);

        return response()->json($task);

    }

    public function getTasksByListID($list_id) {

        $task = Tasks::all()->where('list_id', $list_id);

        return response()->json($task);

    }

    public function updateTask(Request $request, $id) : JsonResponse {

        $list = Tasks::find($id);
        $list->update($request->all());
        
        return response()->json($list, 200);

    }

    public function deleteTask($id) : JsonResponse {

        Tasks::destroy($id);

        return response()->json([], 204);

    }
}
