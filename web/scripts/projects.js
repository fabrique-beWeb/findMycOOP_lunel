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
//        $scope.getProjects = function () {
//            $http.get("projects")
//                    .then(function (response) {
//                        $scope.showSousThemes = true;
//                        $scope.showProjects = true;
//                        $scope.projects = response.data;
//                    });
//        };
        getProjects = function () {
            $http.get("projects")
                    .then(function (response) {
                        $scope.showSousThemes = true;
                        $scope.showProjects = true;
                        $scope.projects = response.data;
                    });
        };
        setInterval(getProjects,1000);

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
        
        
                $scope.user = [];
        $scope.getUser = function () {
            $http.get("/get/session")

                    .then(function (response) {
                        $scope.user = response.data;
                    }
                    );
        };
        
    }]);