<?php
/**
 * Created by PhpStorm.
 * User: jdelahoz1
 * Date: 10/10/14
 * Time: 3:17 PM
 */

namespace Task\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Task\Facade\TaskFacade;
use Task\Helper\TaskHelper;
use Task\Entity\Task;


class TaskController extends AbstractRestfulController
{

    /**
     * @return JsonModel
     */
    public function listAction()
    {
        return new JsonModel(TaskFacade::formatTaskCollection(
            $this->getServiceLocator()->get('taskService')->getAllTasks()));
    }

    /**
     * @throws \Exception
     */
    public function addAction()
    {
        $post = $this->getRequest()->getPost();

        if(TaskHelper::validateAddPost($post))
        {
            $task = new Task();
            $task->setDescription($post->get('description'));
            $task->setIsDone($post->get('isDone'));

            $this->getServiceLocator()->get('taskService')->addTask($task);
            return new JsonModel(array('status' =>  "success"));
        }
        else
        {
            throw new \Exception("An error was found");
        }
    }

    /**
     * @throws \Exception
     */
    public function editAction()
    {
        $post = $this->getRequest()->getPost();

        if(TaskHelper::validateEditPost($post))
        {
            $task = $this->getServiceLocator()->get('taskService')->getTaskById($post->get('taskId'));
            $task->setDescription($post->get('description'));
            $task->setIsDone($post->get('isDone'));

            $this->getServiceLocator()->get('taskService')->editTask($task);
            return new JsonModel(array('status' =>  "success"));
        }
        else
        {
            throw new \Exception("An error was found");
        }
    }

    /**
     * @throws \Exception
     */
    public function removeAction()
    {
        $post = $this->getRequest()->getPost();

        if(TaskHelper::validateRemovePost($post))
        {
            $task = $this->getServiceLocator()->get('taskService')->getTaskById($post->get('taskId'));
            $this->getServiceLocator()->get('taskService')->removeTask($task);
            return new JsonModel(array('status' =>  "success"));
        }
        else
        {
            throw new \Exception("An error was found");
        }
    }

} 