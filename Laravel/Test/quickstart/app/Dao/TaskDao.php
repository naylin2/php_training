<?php
namespace App\Dao;

use App\Contracts\Dao\TaskDaoInterface;
use App\Models\Task;

class TaskDao implements TaskDaoInterface
{
    /**
     * To get tasks
     * @return $tasks
     */
    public function getTasks()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return $tasks;
    }
    /**
     * Add new task
     */
    public function addTask($request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->save();
    }
    /**
     * delete
     */
    public function deleteTask($id)
    {
        Task::findOrFail($id)->delete();
    }
}
