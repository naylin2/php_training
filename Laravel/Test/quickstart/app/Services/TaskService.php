<?php

namespace App\Services;

use App\Contracts\Services\TaskServiceInterface;
use App\Contracts\Dao\TaskDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskService implements TaskServiceInterface
{
    /**
     * task dao
     */
    private $taskDao;
    /**
     * Class Constructor
     * @param TaskDaoInterface
     * @return
     */
    public function __construct(TaskDaoInterface $taskDao)
    {
      $this->taskDao = $taskDao;
    }

    /**
     * To get tasks list
     * @return array $tasks
     */
    public function getTasks()
    {
      return $this->taskDao->getTasks();
    }

    /**
     * add new task
     */
    public function addTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        return $this->taskDao->addTask($request);
    }
    /**
     * delete
     */
    public function deleteTask($id)
    {
        return $this->taskDao->deleteTask($id);
    }


}
