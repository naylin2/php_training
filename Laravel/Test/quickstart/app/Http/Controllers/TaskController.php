<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Contracts\Services\TaskServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return $this->taskInterface->addTask($request);
    }
    /**
     * delete a task
     *
     * @param  $id
     */
    public function deleteTask($id)
    {
        return $this->taskInterface->deleteTask($id);
    }
}
