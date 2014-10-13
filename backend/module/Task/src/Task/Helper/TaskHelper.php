<?php
/**
 * Created by PhpStorm.
 * User: jdelahoz1
 * Date: 10/10/14
 * Time: 4:01 PM
 */

namespace Task\Helper;


class TaskHelper
{
    /**
     * @param $post
     * @return bool
     */
    public function validateAddPost($post)
    {
        $description = $post->get('description');

        if(empty($description))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * @param $post
     * @return bool
     */
    public function validateEditPost($post)
    {
        $taskId = $post->get('taskId');
        $description = $post->get('description');
        $isDone = $post->get('isDone');

        if(empty($description))
        {
            return false;
        }
        elseif(empty($isDone))
        {
            return false;
        }
        elseif(empty($taskId))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * @param $post
     * @return bool
     */
    public function validateRemovePost($post)
    {
        $taskId = $post->get('taskId');

        if(empty($taskId))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

} 