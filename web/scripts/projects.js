var currentSousTheme = null;
var monAppli = angular.module('project', ['vAccordion', 'ngAnimate']);

monAppli.controller('projectCtrl', [
    '$scope', '$http', function ($scope, $http) {


        $scope.showSousThemes = true;
        $scope.showProjects = false;
        $scope.showTasks = false;
        $scope.showPosts = false;

        $scope.themes = {};
        $http.get("themes")
                .then(function (response) {
                    $scope.themes = response.data;
                    $scope.showSousThemes = true;

                });


        $scope.sousThemes = {};
        $scope.getSousThemesFromTheme = function (id) {
            $http.get("sousTheme/" + id)
                    .then(function (response) {
                        $scope.showSousThemes = true;
                        $scope.sousThemes = response.data;
                    });
        };
        $scope.getSousThemes = function () {
            $http.get("sousTheme")
                    .then(function (response) {
                        $scope.showSousThemes = true;
                        $scope.sousThemes = response.data;
                    });
        };

        $scope.projects = {};
        $scope.getProjects = function () {
            $http.get("projects")
                    .then(function (response) {
                        $scope.showSousThemes = true;
                        $scope.showProjects = true;
                        $scope.projects = response.data;
                    });
        };

        $scope.getProjectsFromSousTheme = function (id) {
            $http.get("projects/" + id)
                    .then(function (response) {
                        $scope.showSousThemes = true;
                        $scope.showProjects = true;
                        $scope.projects = response.data;
                    });
        };

//        $scope.topics = [];
//        $scope.getTopics = function () {
//            $http.get("http:///www.findmycoop.fr/topics")
//                    .then(function (response) {
//                        $scope.topics = response.data;
//                    });
//        };

        $scope.tasks = {};
        $scope.getTasks = function () {
            $http.get("tasks")
                    .then(function (response) {
                        $scope.showTasks = true;
                        $scope.tasks = response.data;
                    });
        };

        $scope.getTasksFromProject = function (id) {
            $http.get("tasks/" + id)
                    .then(function (response) {
                        $scope.showTasks = true;
                        $scope.tasks = response.data;
                    });
        };


        $scope.posts = [];
        $scope.getPosts = function () {
            $http.get("posts")

                    .then(function (response) {
                        $scope.showTasks = true;
                        $scope.showPosts = true;
                        $scope.posts = response.data;
                    }
                    );
        };

        $scope.getPostsFromTask = function (id) {
            $http.get("posts/" + id)

                    .then(function (response) {
                        $scope.showTasks = true;
                        $scope.showPosts = true;
                        $scope.posts = response.data;
                    }
                    );
        };
        
        $scope.addProject = function (id) {
            $http.post("projects/" + currentSousTheme.id)

                    .then(function (response) {
//                        $scope.showTasks = true;
//                        $scope.showPosts = true;
                        $scope.posts = response.data;
                    }
                    );
        };
        
    }]);