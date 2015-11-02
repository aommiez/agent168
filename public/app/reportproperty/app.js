/**
 * Created by NuizHome on 8/4/2558.
 */

var app = angular.module('enquiry-app', ['ngRoute', 'angular-loading-bar']);
app.config(['$routeProvider', 'cfpLoadingBarProvider',
    function($routeProvider, cfpLoadingBarProvider) {
        $routeProvider.
            when('/', {
                templateUrl: '../public/app/reportproperty/list.html'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);


app.controller('ListCTL', ['$scope', '$http', '$location', '$route', function($scope, $http, $location, $route){
    $scope.props = [];
    $scope.form = {};

    $scope.getProps = function(){
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

    $scope.getProps();

    $scope.filterProps = function(){
        getProps($scope.form);
    };
}]);
