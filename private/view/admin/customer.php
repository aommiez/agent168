<div ng-app="customer-app">
    <h2>Customer</h2>
    <div ng-view></div>
</div>
<script src="<?php echo \Main\Helper\URL::absolute("/bower_components/angular/angular.min.js");?>"></script>
<script src="<?php echo \Main\Helper\URL::absolute("/bower_components/angular-route/angular-route.min.js");?>"></script>
<script src="<?php echo \Main\Helper\URL::absolute("/public/app/customer/app.js");?>"></script>
