<?php
/**
 * Created by PhpStorm.
 * User: jdelahoz1
 * Date: 10/10/14
 * Time: 3:40 PM
 */

namespace Task\Facade;

use Task\Entity\Task;

class TaskFacade
{
    /**
     * @param Task $task
     * @return array|null
     */
    public function formatTask(Task $task)
    {
        if($task == null)
        {
            return null;
        }
        else
        {
            return array(
                "taskId" => $task->getTaskId(),
                "description" => $task->getDescription(),
                "isDone" => $task->getIsDone()
            );
        }
    }

    /**
     * @param array $tasks
     * @return array|null
     */
    public function formatTaskCollection(Array $tasks)
    {
        if($tasks == null)
        {
            return null;
        }
        else
        {
            foreach($tasks as $task)
            {
                $formattedTasks[] = self::formatTask($task);
            }
            return $formattedTasks;
        }
    }
} 