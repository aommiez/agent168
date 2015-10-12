/**
 * Created by NuizHome on 8/4/2558.
 */

"use strict";

var app = angular.module('phonereq-app', ['ngRoute', 'angular-loading-bar']);
app.config(['$routeProvider', 'cfpLoadingBarProvider',
    function($routeProvider, cfpLoadingBarProvider) {
        $routeProvider.
            when('/', {
                templateUrl: '../public/app/phonereq/list.php'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);

app.controller('ListCTL', ['$scope', '$http', '$location', '$route', function($scope, $http, $location, $route){
  $scope.items = [];
  var promise1 = Q.promise(function (resolve, reject) {
    $.get("../api/phonereq", function(data){
      resolve(data);
    }, "json");
  });

  promise1.then(function(data){
    $scope.list = data;
    $scope.$apply();
  });

  function upateStatus(id, status_id){
    var item = $scope.list.data.find(function(o, index){
      if(o.id == id) {
        return o;
      }
    });
    if(item) {
      item.status_id = status_id;
    }
  }

  $scope.onClickApply = function(id){
    $.post("../api/phonereq/" + id + "/accept", function(data){
      if(data.error) {
        alert(data.error.message);
        return;
      }
      upateStatus(id, 2);
      $scope.$apply();
    }, "json");
  };
  $scope.onClickDenine = function(id){
    $.post("../api/phonereq/" + id + "/denine", function(data){
      if(data.error) {
        alert(data.error.message);
        return;
      }
      upateStatus(id, 3);
      $scope.$apply();
    }, "json");
  };
}]);
