<?php

namespace App\Http\Controllers;

use App\Contracts\Services\TaskServiceInterface;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * task interface
     */
    private $taskInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }

    /**
     * Display all tasks.
     *
     * @return tasks
     */
    public function showTasks()
    {
        $tasks = $this->taskInterface->getTasks();
        return view('tasks', compact('tasks'));
    }
    /**
     * add a new task
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function addTask(Request $request)
    {
        $this->taskInterface->addTask($request);

        return redirect('/');
    }
    /**
     * delete a task
     *
     * @param  $id
     */
    public function deleteTask($id)
    {
        $this->taskInterface->deleteTask($id);

        return redirect('/');
    }
}
