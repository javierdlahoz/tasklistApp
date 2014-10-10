<?php
/**
 * Created by PhpStorm.
 * User: jdelahoz1
 * Date: 10/10/14
 * Time: 3:12 PM
 */

namespace Task;

return array(

    'controllers' => array(
        'invokables' => array(
            'Task\Controller\Task' => 'Task\Controller\TaskController'
        ),
    ),

    'service_manager' => array(
        'factories' => array(
            'taskService' => function ($serviceManager){
                return new Service\TaskService($serviceManager);
            }
        )
    ),

    'router' => array(
        'routes' => array(
            'task' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/task',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Task\Controller',
                        'controller'    => 'Task',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'task-rest' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Task\Controller',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/:controller',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'task_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Task/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Task\Entity' =>  'task_entity'
                ),
            ),
        ),
    ),
);