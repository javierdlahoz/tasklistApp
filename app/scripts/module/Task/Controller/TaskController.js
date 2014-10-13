/**
 * Created by jdelahoz1 on 10/13/14.
 */
angular.module('tasklistApp')
    .controller('TaskController', function ($scope, $http, $rootScope, $location){

        $scope.showAlert = false;
        var contentTypeForm = {'Content-Type': 'application/x-www-form-urlencoded'};
        $scope.isEditing = {};

        $scope.addTask =  function()
        {
            $http({
                url: appUrl.addTask,
                method: "POST",
                data: $.param({
                    description: $scope.newTaskDescription
                }),
                headers: contentTypeForm

            }).success(function(){
                $scope.newTaskDescription = null;
                $scope.getAllTasks();

            }).error(function(data){

                $scope.showAlert = true;
                $scope.alert = {
                    type: "danger",
                    message: data.message
                };
            });
        };

        $scope.editTask = function(task)
        {
            task.isDone = false;

            $http({
                url: appUrl.editTask,
                method: "POST",
                data: $.param(task),
                headers: contentTypeForm

            }).success(function(){
                $scope.getAllTasks();

            }).error(function(data){

                $scope.showAlert = true;
                $scope.alert = {
                    type: "danger",
                    message: data.message
                };
            });
        };

        $scope.isDoneTask = function(task)
        {
            task.isDone = true;

            $http({
                url: appUrl.editTask,
                method: "POST",
                data: $.param(task),
                headers: contentTypeForm

            }).success(function(){
                $scope.getAllTasks();

            }).error(function(data){

                $scope.showAlert = true;
                $scope.alert = {
                    type: "danger",
                    message: data.message
                };
            });
        };

        $scope.removeTask = function(taskId)
        {
            $http({
                url: appUrl.removeTask,
                method: "POST",
                data: $.param({
                    taskId: taskId
                }),
                headers: contentTypeForm

            }).success(function(){
                $scope.getAllTasks();

            }).error(function(data){
                $scope.showAlert = true;
                $scope.alert = {
                    type: "danger",
                    message: data.message
                };
            });
        };

        $scope.getAllTasks = function()
        {
            $http({
                url: appUrl.getAllTasks,
                method: "GET"
            }).success(function(data){
                $scope.tasks = data;

            });
        };

        $scope.getAllTasks();

    });