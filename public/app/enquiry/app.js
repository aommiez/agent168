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
    $scope.form = {};
    $http.get("../api/collection").success(function(data){
        $scope.collection = data;
        console.log(data);
        $scope.form.customer_id = $scope.collection.customer.data[0].id;
        $scope.form.requirement_type_id = $scope.collection.requirement_type.data[0].id;
        $scope.form.property_type_id = $scope.collection.property_type.data[0].id;
        $scope.form.zone_group_1_id = $scope.collection.zone_group.data[0].id;
        $scope.form.zone_group_2_id = $scope.collection.zone_group.data[0].id;
        $scope.form.zone_1_id = $scope.collection.zone.data[0].id;
        $scope.form.zone_2_id = $scope.collection.zone.data[0].id;
        $scope.form.developer_id = $scope.collection.developer.data[0].id;
        $scope.form.bed_rooms = "Studio";
        $scope.form.size_unit_id = $scope.collection.size_unit.data[0].id;
        $scope.form.enquiry_status_id = $scope.collection.enquiry_status.data[0].id;
        $scope.form.enquiry_plan_tobuy_id = $scope.collection.enquiry_plan_tobuy.data[0].id;
        $scope.form.enquiry_budget_payment_id = $scope.collection.enquiry_budget_payment.data[0].id;
        $scope.form.enquiry_budget_purchases_id = $scope.collection.enquiry_budget_purchases.data[0].id;
        $scope.form.enquiry_reason_id = $scope.collection.enquiry_reason.data[0].id;
        $scope.form.rating = 0;
    });
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