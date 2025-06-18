<?php

use App\Http\Controllers\ListsController;
use App\Http\Controllers\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'lists'], function() {
    Route::post('/create', [ListsController::class, 'createList']);
    Route::get('/', [ListsController::class, 'getAll']);
    Route::get('/{id}', [ListsController::class, 'getList']);
    Route::put('/update/{id}', [ListsController::class, 'updateList']);
    Route::delete('/delete/{id}', [ListsController::class, 'deleteList']);
});

Route::group(['prefix' => 'tasks'], function() {
    Route::post('/create', [TasksController::class, 'createTask']);
    Route::get('/', [TasksController::class, 'getAll']);
    Route::get('/{id}', [TasksController::class, 'getTask']);
    Route::get('/bylistid/{id}', [TasksController::class, 'getTasksByListID']);
    Route::put('/update/{id}', [TasksController::class, 'updateTask']);
    Route::delete('/delete/{id}', [TasksController::class, 'deleteTask']);
});