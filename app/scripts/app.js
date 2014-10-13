'use strict';

/**
 * @ngdoc overview
 * @name tasklistApp
 * @description
 * # tasklistApp
 *
 * Main module of the application.
 */
angular
  .module('tasklistApp', [
    'ngCookies',
    'ngTouch',
    'ngRoute' ,
    'ngResource',
    'ngAnimate'
  ]).config(function ($routeProvider){
        $routeProvider
            .when('/', {
                controller: 'TaskController',
                templateUrl: 'views/tasks/index.html'
            })
    });
