<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface TaskServiceInterface
{
    /**
     * To get tasks list
     * @return array $tasks
     */
    public function getTasks();

    /**
     * add new task
     */
    public function addTask(Request $request);
    /**
     * delete
     */
    public function deleteTask($id);
}
