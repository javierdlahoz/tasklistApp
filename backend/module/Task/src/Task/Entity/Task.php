<?php
/**
 * Created by PhpStorm.
 * User: jdelahoz1
 * Date: 10/10/14
 * Time: 3:20 PM
 */

namespace Task\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tasks")
 * @ORM\Entity
 */
class Task
{
    /**
     * @var integer
     *
     * @ORM\Column(name="task_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $task_id;

    /**
     * @ORM\Column(name="description", type="string", nullable=true)
     * @var string
     */
    private $description;

    /**
     * @ORM\Column(name="is_done", type="integer", nullable=true)
     * @var integer
     */
    private $is_done;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getIsDone()
    {
        if($this->is_done == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param mixed $is_done
     */
    public function setIsDone($is_done)
    {
        if($is_done == true)
        {
            $this->is_done = 1;
        }
        else
        {
            $this->is_done = 0;
        }
    }

    /**
     * @return mixed
     */
    public function getTaskId()
    {
        return $this->task_id;
    }

    /**
     * @param mixed $task_id
     */
    public function setTaskId($task_id)
    {
        $this->task_id = $task_id;
    }

} 