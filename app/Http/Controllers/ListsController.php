<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Models\Lists;

class ListsController extends Controller {

    public function createList(Request $request) {

        $list = Lists::create($request->all());

        return response()->json($list, 201);

    }
    
    public function getAll() : JsonResponse {

        $lists = Lists::all();

        return response()->json($lists);

    }

    public function getList($id) : JsonResponse {

        $list = Lists::find($id);

        return response()->json($list);

    }

    public function updateList(Request $request, $id) : JsonResponse {

        $list = Lists::find($id);
        $list->update($request->all());

        return response()->json($list, 200);

    }

    public function deleteList(Request $request, $id) : JsonResponse {

        $list = Lists::destroy($id);

        return response()->json([], 204);

    }

}
