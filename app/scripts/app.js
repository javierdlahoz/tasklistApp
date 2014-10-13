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
    'ngRoute',
    'ngAnimate'
  ]).config(function ($routeProvider){
        $routeProvider
            .when('/', {
                controller: 'TaskController',
                templateUrl: 'scripts/module/Task/View/index.html'
            })
    });