<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Models\Lists;

class ListsController extends Controller {

    public function createList(Request $request) {

        $post = $request->all();

        if (!isset($post['name']) || $post['name'] == "") {            
            return response()->json(['error' => 'Nome inválido ou vazio'], 422);
        }
        $list = Lists::create($request->all());

        return response()->json($list, 201);

    }
    
    public function getAll() : JsonResponse {

        $lists = Lists::all();

        if ($lists->isEmpty()) {
            return response()->json(['error' => 'Nenhuma lista encontrada'], 204);
        }

        return response()->json($lists);

    }

    public function getList($id) : JsonResponse {

        $list = Lists::find($id);

        if ($list->isEmpty()) {
            return response()->json(['error' => 'Nenhuma lista encontrada'], 204);
        }

        return response()->json($list);

    }

    public function updateList(Request $request, $id) : JsonResponse {

        $list = Lists::find($id);

        if ($list->isEmpty()) {
            return response()->json(['error' => 'Nenhuma lista encontrada'], 204);
        }

        if (!isset($post['name']) || $post['name'] == "") {            
            return response()->json(['error' => 'Nome inválido ou vazio'], 422);
        }

        $list->update($request->all());

        return response()->json($list, 200);

    }

    public function deleteList(Request $request, $id) : JsonResponse {

        $list = Lists::destroy($id);

        if (!$list) {
            return response()->json(['error' => 'Erro ao deletar a lista'], 422);
        }

        return response()->json([], 204);

    }

}
