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

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
    /**
     * Show Task Dashboard
     */
    Route::get('/', [TaskController::class, 'showTasks'])->name('show.tasks');
    //Route::get('/', 'TaskController@showTasks')->name('show.tasks');
    /**
     * Add New Task
     */
    Route::post('/task', [TaskController::class, 'addTask'])->name('add.task');
    //Route::post('/task', 'TaskController@addTask')->name('add.task');
    /**
     * Delete Task
     */
    Route::delete('/task/{id}', [TaskController::class, 'deleteTask'])->name('delete.task');
    //Route::delete('/task/{id}', 'TaskController@deleteTask')->name('delete.task');
});
