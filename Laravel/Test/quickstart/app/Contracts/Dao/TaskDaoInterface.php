<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface TaskDaoInterface
{
    /**
     * To get tasks
     * @return $tasks
     */
    public function getTasks();
    /**
     * Add new task
     */
    public function addTask(Request $request);
    /**
     * delete
     */
    public function deleteTask($id);
}
