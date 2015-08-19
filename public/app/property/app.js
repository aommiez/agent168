/**
 * Created by NuizHome on 8/4/2558.
 */

var app = angular.module('property-app', ['ngRoute', 'angular-loading-bar']);
app.config(['$routeProvider', 'cfpLoadingBarProvider',
    function($routeProvider, cfpLoadingBarProvider) {
        $routeProvider.
            when('/', {
                templateUrl: '../public/app/property/list.html'
            }).
            when('/add', {
                templateUrl: '../public/app/property/add.html'
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
    function getProps(query){
        var url = "../api/property";
        if(query){
            url = url + "?" + $.param($scope.form);
        }
        $http.get(url).success(function(data){
            $scope.props = data.data;
        });
    }
    getProps();

    $scope.filterProps = function(){
        console.log($scope.form);
        getProps($scope.form);
    };

    $scope.form = {};

    $http.get("../api/collection").success(function(data){
        $scope.collection = data;
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
                    console.log(data);
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
}]);


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

app.controller('AddCTL', ['$scope', '$http', '$location', function($scope, $http, $location){
    $scope.isSaving = false;

    $http.get("../api/collection").success(function(data){
        $scope.collection = data;
        $scope.form = {};
        $scope.form.property_type_id = $scope.collection.property_type.data[0].id;
        $scope.form.bed_rooms = 'Studio';
        $scope.form.developer_id = $scope.collection.developer.data[0].id;
        $scope.form.zone_group_id = $scope.collection.zone_group.data[0].id;
        $scope.form.duplex = "Duplex";
        $scope.form.status = 'Available';
        $scope.form.rented_expire = getDate(new Date());
        $scope.form.transfer_status='Booking-Form';
        $scope.form.requirement_type_id = $scope.collection.requirement_type.data[0].id;
        $scope.form.size_unit_id = $scope.collection.size_unit.data[0].id;
        $scope.form.web_status = 'Offline';
        $scope.form.property_highlight = 'Sale at Lost and Plus';
        $scope.form.feature_unit = 'Best Buy';
    });

    $scope.addSubmit = function(){
        var fd = new FormData();
        angular.forEach($scope.form, function(value, key) {
            fd.append(key, value);
        });
        angular.forEach($scope.images, function(value, key) {
            fd.append('images['+key+']', value);
        });

        $scope.isSaving = true;
        $http.post("../api/property", fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).success(function(data){
            $scope.isSaving = false;
            if(typeof data.error == 'undefined'){
                $location.path("/");
            }
        });
    };

    $scope.images = [];
    $scope.parseImagesInput = function(input){
        $scope.images = input.files;
    };

    $.fn.datepicker.defaults.format = "yyyy-mm-dd";
    $('.rented_expire').datepicker();
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
