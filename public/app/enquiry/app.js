/**
 * Created by NuizHome on 8/4/2558.
 */

"use strict";

function numberWithCommas(x) {
 if(!x) {
    return "";
 }
 return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

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
            when('/matched/:id', {
                templateUrl: '../public/app/enquiry/matched.php'
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
            url += "?" + $.param($scope.form);
        }
        $http.get(url).success(function(data){
            $scope.items = data;
            if(data.total > 0){
              $scope.pagination = [];
              for(var i = 1; i * $scope.form.limit <= data.total; i++) {
                $scope.pagination.push(data.paging.page == i);
              }
            }
            else {
              $scope.pagination = null;
            }
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

    $http.get("../api/collection/thailocation").success(function(thailocation) {
      $scope.thailocation = thailocation;
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

    $scope.commaNumber = numberWithCommas;
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

          $location.path("/edit/" + data.id);
          $scope.$apply();

          // window.location.hash = "/";
          // window.location.reload();

          // $scope.addStep = 2;
          // $scope.form2.id = data.id;
          // $scope.form3.id = data.id;
          //
          // $.get("../api/enquiry/assign_list_manager", function(data){
          //   $scope.collection2 = data;
          //   $scope.form3.assign_manager_id = data.auto_assign.id;
          //   $scope.form3.is_auto = 1;
          //   $scope.$apply();
          // }, "json");
          //
          // $.get("../api/enquiry/assign_list_sale", function(data){
          //   $scope.collection3 = data;
          //   $scope.form4.assign_sale_id = data.auto_assign.id;
          //   $scope.form5.is_auto = 1;
          //   $scope.$apply();
          // }, "json");
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
    $.get("../api/enquiry/assign_list_manager", function(data){
      // $scope.collection2 = data;
      // $scope.form2.assign_to = data.auto_assign.id;
      resolve(data);
    }, "json");
  });

  var promise5 = Q.promise(function (resolve, reject){
    $.get("../api/enquiry/assign_list_sale", function(data){
      // $scope.collection2 = data;
      // $scope.form2.assign_to = data.auto_assign.id;
      resolve(data);
    }, "json");
  });

  Q.all([promise1, promise2, promise3, promise4, promise5])
    .spread(function (result1, result2, result3, result4, result5) {

    $scope.form = result1;
    $scope.collection = result2;
    $scope.collection2 = result4;
    $scope.collection3 = result5;
    $scope.thailocation = result3;

    if(!$scope.collection2.error) {
      $scope.assMngForm = {id: $routeParams.id};
      $scope.autoAssMngForm = {id: $routeParams.id};

      $scope.autoAssMngForm.assign_manager_id = $scope.collection2.auto_assign.id;
      $scope.autoAssMngForm.is_auto = 1;
    }

    if(!$scope.collection3.error) {
      $scope.assSaleForm = {id: $routeParams.id};
      $scope.autoAssSaleForm = {id: $routeParams.id};

      $scope.autoAssSaleForm.assign_sale_id = $scope.collection3.auto_assign.id;
      $scope.autoAssSaleForm.is_auto = 1;
    }

    $scope.collection.project = $scope.collection.project.sort(function(a, b) {
      if(a.name < b.name) return -1;
      if(a.name > b.name) return 1;
      return 0;
    });

    $scope.prepareDisplayEdit = true;
    $scope.$apply();
  });

  $scope.changeHash = function(hash){
    window.location.hash = hash;
  };

  $scope.autoAssMng = function() {
    $.post("../api/enquiry/assign_manager", $scope.autoAssMngForm, function(data){
      $route.reload();
    }, "json");
  };

  $scope.assMng = function() {
    $.post("../api/enquiry/assign_manager", $scope.assMngForm, function(data){
      $route.reload();
    }, "json");
  };

  $scope.autoAssSale = function() {
    $.post("../api/enquiry/assign_sale", $scope.autoAssSaleForm, function(data){
      $route.reload();
    }, "json");
  };

  $scope.assSale = function() {
    $.post("../api/enquiry/assign_sale", $scope.assSaleForm, function(data){
      $route.reload();
    }, "json");
  };

  $scope.submitEdit = function() {
    if(!$scope.form.comment) {
      alert("require comment");
      return;
    }
    var form = $scope.form;
    if(!$scope.editAllow) {
      form = {
        comment: $scope.form.comment
      };
    }
    $.post("../api/enquiry/edit/"+$scope.id, form, function(data){
      $route.reload();
    }, "json");
  };
}]);

app.controller('MatchCTL', ['$scope', '$http', '$location', '$route', '$routeParams', function($scope, $http, $location, $route, $routeParams) {
  $scope.id = $routeParams.id;

  $scope.changeHash = function(hash){
    window.location.hash = hash;
  };

  $scope.props = [];

  $scope.form = {};
  $scope.form.page = 1;
  $scope.form.limit = 15;
  function getProps(query){
      var url = "../api/enquiry/"+$scope.id+"/for_match";
      if(query){
          url += "?" + $.param($scope.form);
      }
      $http.get(url).success(function(data){
          $scope.props = data;
          if(data.total > 0){
            $scope.pagination = [];
            for(var i = 1; i * $scope.form.limit <= data.total; i++) {
              $scope.pagination.push(data.paging.page == i);
            }
          }
          else {
            $scope.pagination = null;
          }
      });
  }
  getProps($scope.form);

  $scope.setPage = function($index) {
    $scope.form.page = $index + 1;
    getProps($scope.form);
  };

  $scope.filterProps = function(){
      console.log($scope.form);
      getProps($scope.form);
  };

  $http.get("../api/collection").success(function(data){
      $scope.collection = data;
      $scope.collection.project = data.project.sort(function(a, b) {
        if(a.name < b.name) return -1;
        if(a.name > b.name) return 1;
        return 0;
      });
  });

  $scope.getZoneGroupName = function(id){
    var arr = $.grep($scope.collection.zone_group, function(o){ return o.id == id; });
    if (arr.length == 0) {
      return "";
    } else {
      return arr[0].name;
    }
  };

  $scope.inputProps = {};
  $scope.importClick = function(){
    var listPropsId = [];
    for(var key in $scope.inputProps) {
      if($scope.inputProps[key]) listPropsId.push(parseInt(key));
    }
    $.post("../api/enquiry/"+$scope.id+"/match", {props_id: listPropsId}, function(data){
      $route.reload();
    }, "json");
  };
  $scope.commaNumber = numberWithCommas;
}]);


app.controller('MatchedCTL', ['$scope', '$http', '$location', '$route', '$routeParams', function($scope, $http, $location, $route, $routeParams) {
  $scope.id = $routeParams.id;

  $scope.changeHash = function(hash){
    window.location.hash = hash;
  };

  $scope.props = [];

  $scope.form = {};
  $scope.form.page = 1;
  $scope.form.limit = 100;
  function getProps(query){
      var url = "../api/enquiry/"+$scope.id+"/matched";
      $http.get(url).success(function(data){
          $scope.props = data;
          if(data.total > 0){
            $scope.pagination = [];
            for(var i = 1; i * $scope.form.limit <= data.total; i++) {
              $scope.pagination.push(data.paging.page == i);
            }
          }
          else {
            $scope.pagination = null;
          }
      });
  }
  getProps($scope.form);

  $scope.setPage = function($index) {
    $scope.form.page = $index + 1;
    getProps($scope.form);
  };

  $scope.filterProps = function(){
      console.log($scope.form);
      getProps($scope.form);
  };

  $http.get("../api/collection").success(function(data){
      $scope.collection = data;
      $scope.collection.project = data.project.sort(function(a, b) {
        if(a.name < b.name) return -1;
        if(a.name > b.name) return 1;
        return 0;
      });
  });

  $scope.getZoneGroupName = function(id){
    var arr = $.grep($scope.collection.zone_group, function(o){ return o.id == id; });
    if (arr.length == 0) {
      return "";
    } else {
      return arr[0].name;
    }
  };

  $scope.clickRequestContact = function(prop){
    if(!window.confirm('Request contact')) { return; }
    $.post("../api/enquiry/request_contact", {
      enquiry_id: $scope.id,
      property_id: prop.id
    }, function(data){
      $route.reload();
    }, "json");
  };
  $scope.removeMathClick = function(prop){
    if(!window.confirm('Request contact')) { return; }
    $.get("../api/enquiry/matched/delete/"+prop.id, function(data){
      $route.reload();
    }, "json");
  };
  $scope.commaNumber = numberWithCommas;
}]);

app.controller('CommentCTL', ['$scope', '$http', '$location', '$route', '$routeParams', function($scope, $http, $location, $route, $routeParams) {
  var propId = $routeParams.id;
  $http.get("../api/enquiry/" + $routeParams.id + "/comment").success(function(data){
      $scope.comments = data.data;
  });
}]);
