<?php

namespace App\Http\Controllers;

use App\Contracts\Services\TaskServiceInterface;
use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;

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
    public function addTask(CreateTaskRequest $request)
    {
        $validated = $request->validated();
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
