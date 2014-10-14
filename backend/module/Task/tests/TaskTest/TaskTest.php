<?php
/**
 * Created by PhpStorm.
 * User: jdelahoz1
 * Date: 10/13/14
 * Time: 8:35 PM
 */

namespace Task\Test;

use Task\Service\TaskService;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Task\Entity\Task;
use TaskTest\Bootstrap;

class TaskTest extends AbstractHttpControllerTestCase
{
    private $taskService;
    private $task;

    const TASK_DESCRIPTION = "Buy milk";
    const TASK_IS_DONE = false;

    public function setUp()
    {
        $this->setApplicationConfig(
            include __DIR__.'/../../../../config/application.config.php'
        );
        parent::setUp();
        $this->taskService = new TaskService(Bootstrap::getServiceManager());
    }

    private function createTask()
    {
        $this->task = new Task();
        $this->task->setDescription(self::TASK_DESCRIPTION);
        $this->task->setIsDone(self::TASK_IS_DONE);
        $this->taskService->addTask($this->task);
    }

    public function testAddTask()
    {
        $this->createTask();

        $nTask = $this->taskService->getTaskById($this->task->getTaskId());

        $this->assertEquals($nTask->getTaskId(), $this->task->getTaskId());
        $this->assertEquals($nTask->getDescription(), $this->task->getDescription());
        $this->assertEquals($nTask->getIsDone(), $this->task->getIsDone());

        $this->taskService->removeTask($this->task);
    }

    public function testEditTask()
    {
        $this->createTask();

        $this->task->setDescription("bla");
        $this->task->setIsDone(true);
        $this->taskService->editTask($this->task);

        $nTask = $this->taskService->getTaskById($this->task->getTaskId());
        $this->assertEquals($nTask->getDescription(), "bla");

        $this->taskService->removeTask($this->task);
    }

    public function testRemoveTask()
    {
        $this->createTask();

        $this->taskService->removeTask($this->task);

        $nTask = $this->taskService->getTaskById($this->task->getTaskId());
        $this->assertNull($nTask);
    }
}