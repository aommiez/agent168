/**
 * Created by NuizHome on 8/4/2558.
 */

var app = angular.module('enquiry-app', ['ngRoute', 'angular-loading-bar']);
app.config(['$routeProvider', 'cfpLoadingBarProvider',
    function($routeProvider, cfpLoadingBarProvider) {
        $routeProvider.
            when('/', {
                templateUrl: '../public/app/enquiry/list.php'
            }).
            when('/add', {
                templateUrl: '../public/app/enquiry/add.php'
            }).
            when('/edit/:id', {
                templateUrl: '../public/app/enquiry/edit.php'
            }).
            when('/match/:id', {
                templateUrl: '../public/app/enquiry/match.php'
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
    $scope.addStep = 1;
    $scope.form2 = {};
    $scope.form3 = {};
    $scope.vm = {};
    $scope.vm.changeStudio = function(){
      if($scope.form.is_studio) {
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
      if(!$scope.form.comment) {
        alert("please comment when add");
        return;
      }

        var fd = new FormData();
        angular.forEach($scope.form, function(value, key) {
            fd.append(key, value);
        });

        $.post("../api/enquiry", $scope.form, function(data){
          // $scope.isSaving = false;
          if(data.error) {
            alert(data.error.message);
            return;
          }

          // window.location.hash = "/";
          // window.location.reload();

          $scope.addStep = 2;
          $scope.form2.id = data.id;
          $scope.form3.id = data.id;

          $.get("../api/enquiry/assign_list", function(data){
            $scope.collection2 = data;
            $scope.form3.assign_manager_id = data.auto_assign.id;
            $scope.form3.is_auto = 1;
            $scope.$apply();
          }, "json");
        }, 'json');

        // $scope.isSaving = true;

        // $http.post("../api/enquiry", fd, {
        //     transformRequest: angular.identity,
        //     headers: {'Content-Type': undefined}
        // }).success(function(data){
        //     $scope.isSaving = false;
        //     if(typeof data.error == 'undefined'){
        //         $location.path("/");
        //     }
        // });
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

    $scope.addForm2 = function() {
      $.post("../api/enquiry/assign_manager", $scope.form2, function(data){
        window.location.hash = "/";
      }, "json");
    };

    $scope.addForm3 = function() {
      $.post("../api/enquiry/assign_manager", $scope.form3, function(data){
        window.location.hash = "/";
      }, "json");
    };
}]);

app.controller('EditCTL', ['$scope', '$http', '$location', '$route', '$routeParams', function($scope, $http, $location, $route, $routeParams) {
  $scope.id = $routeParams.id;
  var promise1 = Q.promise(function (resolve, reject) {
    $.get("../api/enquiry/"+$routeParams.id, function(data){
      resolve(data);
    }, "json");
  });

  var promise2 = Q.promise(function (resolve, reject) {
    $.get("../api/collection", function(data){
      resolve(data);
    }, "json");
  });

  var promise3 = Q.promise(function (resolve, reject) {
    $.get("../api/collection/thailocation", function(data){
      resolve(data);
    }, "json");
  });

  var promise4 = Q.promise(function (resolve, reject){
    $.get("../api/enquiry/assign_list", function(data){
      // $scope.collection2 = data;
      // $scope.form2.assign_to = data.auto_assign.id;
      resolve(data);
    }, "json");
  });

  Q.all([promise1, promise2, promise3, promise4]).spread(function (result1, result2, result3, result4) {
    $scope.form = result1;
    $scope.collection = result2;
    $scope.collection2 = result4;
    $scope.thailocation = result3;

    $scope.assMngForm = {id: $routeParams.id};
    $scope.assAutoMngForm = {id: $routeParams.id};

    $scope.assAutoMngForm.assign_manager_id = $scope.form.assign_manager_id;

    $scope.collection.project = $scope.collection.project.sort(function(a, b) {
      if(a.name < b.name) return -1;
      if(a.name > b.name) return 1;
      return 0;
    });

    $scope.prepareDisplayEdit = true;
    $scpoe.$apply();
  });

  $scope.autoAssMng = function() {
    $.post("../api/enquiry/assign_manager", $scope.assAutoMngForm, function(data){
      window.location.reload();
    }, "json");
  };
  
  $scope.assMng = function() {
    $.post("../api/enquiry/assign_manager", $scope.assMngForm, function(data){
      window.location.reload();
    }, "json");
  };
}]);

app.controller('MatchCTL', ['$scope', '$http', '$location', '$route', '$routeParams', function($scope, $http, $location, $route, $routeParams) {
  $scope.id = $routeParams.id;
}]);
