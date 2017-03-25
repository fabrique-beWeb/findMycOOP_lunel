var monAppli = angular.module('project', []);

monAppli.controller('projectCtrl', [
    '$scope', '$http', function ($scope, $http) {

        $scope.themes = {};
        $scope.getThemes = function () {
            $http.get("http:///www.findmycoop.fr/themes")
                    .then(function (response) {
                        $scope.themes = response.data;
                    });
        };

        $scope.sousThemes = [];
        $scope.getSousThemes = function () {
            $http.get("sous-themes")
                    .then(function (response) {
                        $scope.sousThemes = response.data;
                    });
        };

        $scope.projects = {};
        $http.get("projects")
                .then(function (response) {
                    $scope.projects = response.data;
                });

//        $scope.topics = [];
//        $scope.getTopics = function () {
//            $http.get("http:///www.findmycoop.fr/topics")
//                    .then(function (response) {
//                        $scope.topics = response.data;
//                    });
//        };

        $scope.tasks = [];
        $scope.getTasks = function () {
            $http.get("tasks")
                    .then(function (response) {
                        $scope.tasks = response.data;
                    });
        };

        $scope.posts = [];
        $scope.getPosts = function () {
            $http.get("posts")
                    .then(function (response) {
                        $scope.posts = response.data;
                    });
        };
}]);