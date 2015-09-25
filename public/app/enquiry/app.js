/**
 * Created by NuizHome on 8/4/2558.
 */

var app = angular.module('enquiry-app', ['ngRoute', 'angular-loading-bar']);
app.config(['$routeProvider', 'cfpLoadingBarProvider',
    function($routeProvider, cfpLoadingBarProvider) {
        $routeProvider.
            when('/', {
                templateUrl: '../public/app/enquiry/list.html'
            }).
            when('/add', {
                templateUrl: '../public/app/enquiry/add.html'
            }).
            when('/:id/gallery', {
                templateUrl: '../public/app/enquiry/gallery.html'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);

app.controller('ListCTL', ['$scope', '$http', '$location', '$route', function($scope, $http, $location, $route){
    $scope.items = [];
    function getItems(query){
        var url = "../api/enquiry";
        if(query){
            url = url + "?" + $.param($scope.form);
        }
        $http.get(url).success(function(data){
            $scope.items = data.data;
        });
    }
    getItems();

    $scope.filterItems = function(){
        getItems($scope.form);
    };

    $scope.form = {};

    $http.get("../api/collection").success(function(data){
        $scope.collection = data;
    });

    $scope.remove = function(id){
        if(!window.confirm("Are you sure?")){
            return;
        }
        $http.delete("../api/enquiry/"+ id).success(function(data){
            if(typeof data.error == 'undefined'){
                $route.reload();
            }
        });
    };
}]);

app.controller('AddCTL', ['$scope', '$http', '$location', function($scope, $http, $location){
    $scope.vm = {};
    $scope.vm.changeStudio = function(){
      if($scope.vm.buffer.is_studio) {
        $scope.form.bedroom = 0;
      }
    };
    $scope.form = {};
    $http.get("../api/collection").success(function(data){
        $scope.collection = data;
        // $scope.form.project_id = data.project[0].id;
        $scope.collection.project = data.project.sort(function(a, b) {
          if(a.name < b.name) return -1;
          if(a.name > b.name) return 1;
          return 0;
        });
    });
    $http.get("../api/collection/thailocation").success(function(thailocation) {
      $scope.thailocation = thailocation;
    });
    $scope.triggerChangeSource = function(){
      // if($scope.form.source_id == 1) {
      //   $scope.form.sub_source_id == 1;
      // }
      // else if($scope.form.source_id == 2) {
      //
      // }
      delete $scope.form.sub_source_id;
    };
    $scope.triggerFromWebsite = function(){
      if($scope.sub_source_id!=1){
        delete $scope.form.from_website_id;
      }
      else {
        $scope.form.from_website_id = 1;
      }
    };

    $scope.getZoneGroupName = function(id){
      var arr = $.grep($scope.collection.zone_group, function(o){ return o.id == id; });
      if (arr.length == 0) {
        return "";
      } else {
        return arr[0].name;
      }
    };
    $scope.addSubmit = function(){
        var fd = new FormData();
        angular.forEach($scope.form, function(value, key) {
            fd.append(key, value);
        });

        $scope.isSaving = true;
        $http.post("../api/enquiry", fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).success(function(data){
            $scope.isSaving = false;
            if(typeof data.error == 'undefined'){
                $location.path("/");
            }
        });
    };

    $scope.filter_zone = function(list, zone_group_id){
        if(!Array.isArray(list)) return;
        return list.filter(function(item){
            var res = (function(){
                for(var i in $scope.collection.zone_zone_group.data){
                    if(item.id == $scope.collection.zone_zone_group.data[i].zone_id
                        && $scope.collection.zone_zone_group.data[i].zone_group_id == zone_group_id){
                        return item;
                    }
                }
                return false;
            })();
            if(res){
                console.log(res);
                return res;
            }
        });
    };
}]);
