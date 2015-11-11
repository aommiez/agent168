/**
 * Created by NuizHome on 8/4/2558.
 */

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
                templateUrl: '../public/app/reportproperty/list.php'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);


app.controller('ListCTL', ['$scope', '$http', '$location', '$route', function($scope, $http, $location, $route){
    $scope.props = [];
    $scope.form = {};

    $scope.getProps = function(){
        // if(!$scope.form.created_at_start || !$scope.form.created_at_start) {
        //   alert('Require created start and created end');
        //   return;
        // }

        var url = "../api/report_property";
        url += "?" + $.param($scope.form);
        $http.get(url).success(function(data){
            $scope.props = data;
            // if(data.total > 0){
            //   $scope.pagination = [];
            //   for(var i = 1; i * $scope.form.limit <= data.total; i++) {
            //     $scope.pagination.push(data.paging.page == i);
            //   }
            // }
            // else {
            //   $scope.pagination = null;
            // }
        });
    };

    $http.get("../api/collection").success(function(data){
        $scope.collection = data;
        $scope.collection.project = data.project.sort(function(a, b) {
          if(a.name.toLowerCase() < b.name.toLowerCase()) return -1;
          if(a.name.toLowerCase() > b.name.toLowerCase()) return 1;
          return 0;
        });
    });

    $http.get("../api/collection/thailocation").success(function(thailocation) {
      $scope.thailocation = thailocation;
    });

    $scope.filterProps = function(){
        $scope.getProps($scope.form);
    };

    $scope.isShowTotal = function(){
      return typeof $scope.props.total != 'undefined';
    };

    $scope.commaNumber = numberWithCommas;
}]);
