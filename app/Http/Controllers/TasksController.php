<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TasksController extends Controller {

    public function createTask(Request $request) {
        

        $post = $request->all();

        if (!isset($post['name']) || $post['name'] == "") {            
            return response()->json(['error' => 'Nome inválido ou vazio'], 422);
        }

        $task = Tasks::create($request->all());

        return response()->json($task, 201);

    }
    
    public function getAll() : JsonResponse {

        $tasks = Tasks::all();

        if ($tasks->isEmpty()) {
            return response()->json(['error' => 'Nenhuma tarefa encontrada'], 404);
        }

        return response()->json($tasks);

    }

    public function getTask($id) : JsonResponse {

        $task = Tasks::find($id);

        if (!$task) {
            return response()->json(['error' => 'Nenhuma tarefa encontrada'], 404);
        }

        return response()->json($task);

    }

    public function getTasksByListID($list_id) {

        $task = Tasks::all()->where('list_id', $list_id);

        return response()->json($task);

    }

    public function updateTask(Request $request, $id) : JsonResponse {

        $task = Tasks::find($id);

        $post = $request->all();

        if (!$task) {
            return response()->json(['error' => 'Nenhuma tarefa encontrada'], 404);
        }

        if (!isset($post['name']) || $post['name'] == "") {            
            return response()->json(['error' => 'Nome inválido ou vazio'], 422);
        }
        
        $task->update($post);
        
        return response()->json($task, 200);

    }

    public function deleteTask($id) : JsonResponse {

        $task = Tasks::destroy($id);

        if (!$task) {
            return response()->json(['error' => 'Erro ao deletar a tarefa'], 422);
        }

        return response()->json([], 204);

    }

    public function changeStatus($id) : JsonResponse {

        $task = Tasks::find($id);

        if (!$task) {
            return response()->json(['error' => 'Nenhuma tarefa encontrada'], 404);
        }

        $task->update(['done' => (($task->done == 0) ? 1 : 0)]);
        
        return response()->json($task, 200);
        
        
    }
}
