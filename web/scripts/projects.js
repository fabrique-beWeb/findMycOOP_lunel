var monAppli = angular.module('project', []);

monAppli.controller('projectCtrl', [
    '$scope', '$http', function ($scope, $http) {
        
        $scope.projects = [];
        
        $http.get("http:///www.findmycoop.fr/projects")
                .then(function (response){
           $scope.projects = response.data; 
        });
    }]);