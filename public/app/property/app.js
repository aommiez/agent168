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

var app = angular.module('property-app', ['ngRoute', 'angular-loading-bar']);
app.config(['$routeProvider', 'cfpLoadingBarProvider',
    function($routeProvider, cfpLoadingBarProvider) {
        $routeProvider.
            when('/', {
                templateUrl: '../public/app/property/list.php'
            }).
            when('/add', {
                templateUrl: '../public/app/property/add.php'
            })
            .when('/edit/:id', {
                templateUrl: '../public/app/property/edit.php'
            }).
            when('/:id/gallery', {
                templateUrl: '../public/app/property/gallery.html'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);

app.controller('ListCTL', ['$scope', '$http', '$location', '$route', function($scope, $http, $location, $route){
    $scope.props = [];

    $scope.form = {};
    $scope.form.page = 1;
    $scope.form.limit = 15;
    function getProps(query){
        var url = "../api/property";
        if(query){
            url += "?" + $.param($scope.form);
        }
        $http.get(url).success(function(data){
            $scope.props = data;
            if(data.total > 0){
              $scope.pagination = [];
              for(var i = 1; i*15 <= data.total; i++) {
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

    $scope.remove = function(id){
        if(!window.confirm("Are you sure?")){
            return;
        }
        $http.delete("../api/property/"+ id).success(function(data){
            if(typeof data.error == 'undefined'){
                $route.reload();
            }
        });
    };

    $scope.edit = function(id){

    };

    $scope.inputExcelText = "Add by excel";
    var $inputExcel = $("#add_excel-input");
    $scope.addExcelClick = function(){
        $inputExcel.click();
    };

    $inputExcel.change(function(e){
        var file = typeof e.target.files[0] != "undefined"? e.target.files[0]: false;
        if(!file){ return; }

        var formData = new FormData();
        formData.append("excel", file);

        $scope.inputExcelText = "loading...";
        $.ajax({
            url: '../api/property/uploadexcel',
            type: 'POST',
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function (data) {
                if(typeof data.error == "undefined"){
                    //window.location.reload();
                }
                else {
                    alert(data.error.message);
                }
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        });

        $scope.$apply();
    });

    $scope.commaNumber = numberWithCommas;
}]);


function getDate(date){
    var dd = date.getDate();
    var mm = date.getMonth()+1; //January is 0!

    var yyyy = date.getFullYear();
    if(dd<10){
        dd='0'+dd;
    }
    if(mm<10){
        mm='0'+mm;
    }
    return yyyy+'-'+mm+'-'+dd;
}

app.controller('AddCTL', ['$scope', '$http', '$location', function($scope, $http, $location){
    $scope.isSaving = false;
    $scope.initSuccess = false;
    var itv = setInterval(function() {
      if($scope.collection && $scope.thailocation) {
        $scope.initSuccess = true;
        clearInterval(itv);
      }
    }, 100);

    $http.get("../api/collection").success(function(data){
        $scope.collection = data;
        $scope.collection.project = data.project.sort(function(a, b) {
          if(a.name < b.name) return -1;
          if(a.name > b.name) return 1;
          return 0;
        });
    });

    $http.get("../api/collection/thailocation").success(function(thailocation) {
      $scope.thailocation = thailocation;
    });

    $scope.getDistrict = function() {
      if(!$scope.initSuccess) return [];
      return $scope.thailocation.district.filter(function(item){
        return item.province_id == $scope.form.province_id;
      });
    };
    $scope.getSubDistrict = function() {
      if(!$scope.initSuccess) return [];
      return $scope.thailocation.sub_district.filter(function(item){
        return item.
        district_id == $scope.form.district_id;
      });
    };

    $scope.submit = function(){
      if(!$scope.form.comment) {
        alert("please comment when add");
        return;
      }
        // var fd = new FormData();
        // angular.forEach($scope.form, function(value, key) {
        //     fd.append(key, value);
        // });

      //   $scope.isSaving = true;
      //   $http.post("../api/property", $scope.form
      //   // , {
      //   //     transformRequest: angular.identity,
      //   //     headers: {'Content-Type': undefined}
      //   // }
      // ).success(function(data){
      //       $scope.isSaving = false;
      //       if(typeof data.error == 'undefined'){
      //           $location.path("/");
      //       }
      //   });
      $.post("../api/property", $scope.form, function(data){
        if(data.error) {
          alert(data.error.message);
          return;
        }

        // window.location.hash = "/";
        window.location.reload();
      }, 'json');
    };

    $scope.images = [];
    $scope.parseImagesInput = function(input){
        $scope.images = input.files;
    };

    $.fn.datepicker.defaults.format = "yyyy-mm-dd";
    $('.rented_expire').datepicker();
}]);

app.controller('EditCTL', ['$scope', '$http', '$location', '$route', '$routeParams', function($scope, $http, $location, $route, $routeParams) {
  $scope.form = null;
  $scope.collection = null;
  $scope.thailocation = null;

  $http.get("../api/collection").success(function(data) {
    $scope.collection = data;
    $scope.collection.project = data.project.sort(function(a, b) {
      if(a.name < b.name) return -1;
      if(a.name > b.name) return 1;
      return 0;
    });
  });
  $http.get("../api/collection/thailocation").success(function(thailocation) {
    $scope.thailocation = thailocation;
  });
  $http.get("../api/property/" + $routeParams.id).success(function(data) {
    $scope.reference_id = data.reference_id;
    $scope.owner = data.owner;
    $scope.form = data;
  });

  $scope.initSuccess = false;
  var itv = setInterval(function() {
    if($scope.form && $scope.collection && $scope.thailocation) {
      $scope.initSuccess = true;
      clearInterval(itv);
    }
  }, 100);

  $scope.getDistrict = function() {
    if(!$scope.initSuccess) return [];
    return $scope.thailocation.district.filter(function(item){
      return item.province_id == $scope.form.province_id;
    });
  };
  $scope.getSubDistrict = function() {
    if(!$scope.initSuccess) return [];
    return $scope.thailocation.sub_district.filter(function(item){
      return item.
      district_id == $scope.form.district_id;
    });
  };

  $scope.submit = function() {
    if(!$scope.form.comment) {
      alert("please comment when edit");
      return;
    }
    var form;
    if($scope.editAllow) {
      form = $scope.form;
    }
    else {
      form = {
        comment: $scope.form.comment
      };
    }

    $.post("../api/property/edit/" + $routeParams.id, form, function(data){
      if(data.error) {
        alert(data.error.message);
        return;
      }

      // window.location.hash = "/";
      window.location.reload();
    }, 'json');
  };
}]);

app.controller('GalleryCTL', ['$scope', '$http', '$location', '$route', '$routeParams', function($scope, $http, $location, $route, $routeParams){
    $scope.images = [];

    $scope.refreshList = function(){
        $http.get("../api/property/" + $routeParams.id + "/gallery").success(function(data){
            $scope.images = data.data;
        });
    };
    $scope.refreshList();

    $scope.isUpload = false;
    $scope.images_upload = [];
    $scope.parseImagesInput = function(input){
        $scope.images_upload = input.files;
    };

    $scope.addSubmit = function(){
        var fd = new FormData();
        angular.forEach($scope.images_upload, function(value, key) {
            fd.append('images['+key+']', value);
        });

        $scope.isUpload = true;
        $http.post("../api/property/"+ $routeParams.id + "/gallery", fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).success(function(data){
            $scope.isUpload = false;
            $scope.refreshList();
        });
    };

    $scope.removeAllSelect = function(){
        var listId = [];
        angular.forEach($scope.images, function(value, key){
            if(value.selected){
                listId.push(value.id);
            }
        });

        $http.delete("../api/property/"+ $routeParams.id + "/gallery?" + $.param({"id": listId})).success(function(data){
            $scope.refreshList();
        });
    };
}]);

app.controller('CommentCTL', ['$scope', '$http', '$location', '$route', '$routeParams', function($scope, $http, $location, $route, $routeParams) {
  var propId = $routeParams.id;
  $http.get("../api/property/" + $routeParams.id + "/comment").success(function(data){
      $scope.comments = data.data;
  });
}]);
app.directive('datepicker',function($compile){
    return {
        // replace:true,
        // templateUrl:'custom-datepicker.html',
        scope: {
            ngModel: '=',
            dateOptions: '='
        },
        link: function($scope, $element, $attrs, $controller){
            $element.datepicker({
              format: 'yyyy-mm-dd'
            });
        }
    };
});
