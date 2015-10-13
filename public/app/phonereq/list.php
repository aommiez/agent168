<?php session_start();?>

<style>
	.panel-heading {
    	background-color: #009688;
		color: rgba(255,255,255,.84);
    	border: 0;
	}
	thead{
		background-color:#fff;
	}
	tr.read{
		background-color: #D1FFF7 !important;
	}
	.table>tbody+tbody {
		border-top: 1px solid #ddd;
	}
</style>



<div ng-controller="ListCTL">

<div class="content">
	<div class="panel-heading">
    	<h3 class="panel-title">Phone Request</h3>
    </div>
    <div class="table-phone">
    	<table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>Enquiry</th>
                <th>Property</th>
                <th>Account</th>
                <th></th>
            </tr>
            </thead>
            <!--thead-->
            <tbody>
            	<tr class="table-detail" ng-repeat="item in list.data">
                	<td class="ng-binding enq">{{item.enquiry_no}}</td>
                  <td class="ng-binding pro">
										<div><strong>Enquiry no</strong>: {{item.reference_id}}</div>
										<div><strong>Project</strong>: {{item.project_name}}</div>
										<div><strong>Address no</strong>: {{item.address_no}}</div>
									</td>
									<td>
										<div><strong>Manager</strong>: {{item.manager_name}}</div>
										<div><strong>Sale</strong>: {{item.sale_name}}</div>
									</td>
                	<td ng-if="item.status_id == 1">
                  		<a class="xcrud-action btn btn-success btn-sm" ng-click="onClickApply(item.id)">
												<i class="glyphicon glyphicon-ok"></i>
											</a>
                  		<a class="xcrud-action btn btn-danger btn-sm" ng-click="onClickDenine(item.id)">
												<i class="glyphicon glyphicon-remove"></i>
											</a>
                	</td>
									<td ng-if="item.status_id != 1">
											<span ng-if="item.status_id == 2">Accepted</span>
											<span ng-if="item.status_id == 3">Denined</span>
                	</td>
            	</tr>
            </tbody>
            <!--tbody-->
        </table>
    </div><!--table-phone-->
</div>
</div>
