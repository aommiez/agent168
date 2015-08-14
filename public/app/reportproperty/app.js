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

    function getDate(date){
        var dd = date.getDate();
        var mm = date.getMonth()+1; //January is 0!

        var yyyy = date.getFullYear();
        if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }
        return yyyy+'-'+mm+'-'+dd;
    }

    $scope.getProps = function(back){
        var url = "../api/report_property";
        var curr = new Date; // get current date
        curr.setDate(curr.getDate()-(back*7));
        var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
        var last = first + 6; // last day is the first day + 6

        var firstday = new Date(curr.setDate(first));
        var lastday = new Date(curr.setDate(last));
        url = url + "?" + $.param({
            start: getDate(firstday),
            end: getDate(lastday)
        });

        $http.get(url).success(function(data){
            $scope.props = data.data;
        });
    };

    $scope.getProps(0);

    $scope.filterProps = function(){
        getProps($scope.form);
    };
}]);
