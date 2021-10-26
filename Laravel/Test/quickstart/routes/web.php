<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
 */

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
    /**
     * Show Task Dashboard
     */
    Route::get('/', [\App\Http\Controllers\TaskController::class, 'showTasks']);
    /**
     * Add New Task
     */
    Route::post('/task', [\App\Http\Controllers\TaskController::class, 'addTask']);
    /**
     * Delete Task
     */
    Route::delete('/task/{id}', [\App\Http\Controllers\TaskController::class, 'deleteTask']);
});
