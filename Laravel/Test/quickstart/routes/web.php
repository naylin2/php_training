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
    //Route::get('/', [\App\Http\Controllers\TaskController::class, 'showTasks']);
    Route::get('/', 'TaskController@showTasks')->name('show.tasks');
    /**
     * Add New Task
     */
    //Route::post('/task', [\App\Http\Controllers\TaskController::class, 'addTask']);
    Route::post('/task', 'TaskController@addTask')->name('add.task');
    /**
     * Delete Task
     */
    //Route::delete('/task/{id}', [\App\Http\Controllers\TaskController::class, 'deleteTask']);
    Route::delete('/task/{id}', 'TaskController@deleteTask')->name('delete.task');
});
