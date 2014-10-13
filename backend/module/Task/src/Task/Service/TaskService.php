<?php
/**
 * Created by PhpStorm.
 * User: jdelahoz1
 * Date: 10/10/14
 * Time: 3:22 PM
 */

namespace Task\Service;

use Task\Entity\Task;

class TaskService {

    const ENTITY_NAME = 'Task\Entity\Task';

    private $serviceLocator;
    private $entityManager;
    private $repositoryManager;

    /**
     * @param $serviceLocator
     */
    function __construct($serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        $this->entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $this->repositoryManager = $this->entityManager->getRepository(self::ENTITY_NAME);
    }

    /**
     * @return mixed
     */
    public function getRepositoryManager()
    {
        return $this->repositoryManager;
    }

    /**
     * @param mixed $repositoryManager
     */
    public function setRepositoryManager($repositoryManager)
    {
        $this->repositoryManager = $repositoryManager;
    }



    /**
     * @return mixed
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param mixed $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }



    /**
     * @return mixed
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     * @param mixed $serviceLocator
     */
    public function setServiceLocator($serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * @return mixed
     */
    public function getAllTasks()
    {
        return $this->getRepositoryManager()->findAll();
    }

    /**
     * @param $taskId
     * @return mixed
     */
    public function getTaskById($taskId)
    {
        return $this->getRepositoryManager()->findOneBy(array("task_id" => $taskId));
    }

    /**
     * @param Task $task
     */
    public function addTask(Task $task)
    {
        $task->setIsDone(false);
        $this->getEntityManager()->persist($task);
        $this->getEntityManager()->flush();
    }

    /**
     * @param Task $task
     */
    public function editTask(Task $task)
    {
        $this->getEntityManager()->merge($task);
        $this->getEntityManager()->flush();
    }

    /**
     * @param Task $task
     */
    public function removeTask(Task $task)
    {
        $this->getEntityManager()->remove($task);
        $this->getEntityManager()->flush();
    }

} 