<?php session_start();?>
<div ng-controller="ListCTL">
    <div>
        <form id="searchForm">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Enquiry Search</h3>
                </div>
                <div class="panel-body">
                    <form ng-submit="filterItems()">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Customer name</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry No.</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success" ng-click="filterEnquiries()">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </form>
    </div>
    <div>
      <?php if(@$_SESSION['login']['level_id'] <= 2){?>
        <a href="#add" class="btn btn-primary">Add</a>
      <?php }?>
    </div>
    <div style="overflow-x: auto;">
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>Date</th>
                <th>Customer</th>
                <th>Requirement</th>
                <th>Property Type</th>

                <th>Buying Budget</th>
                <th>Rental Budget</th>
                <th>Status</th>

                <th>Update</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="item in items">
                <td>{{item.created_at}}</td>
                <td>{{item.customer}}</td>
                <td>{{item.name_for_enquiry}}</td>
                <td>{{item.enquiry_type_name}}</td>

                <td>฿{{item.buy_budget_start}} - ฿{{item.buy_budget_end}}</td>
                <td>฿{{item.rent_budget_start}} - ฿{{item.rent_budget_end}}</td>
                <td>{{item.enquiry_status_name}}</td>

                <td>{{item.updated_at}}</td>
                <td>
                  <a class="xcrud-action btn btn-warning btn-sm" href="#/edit/{{item.id}}" target="_blank"><i class="glyphicon glyphicon-edit"></i></a>
                  <a class="xcrud-action btn btn-danger btn-sm" ng-click="remove(item.id)"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
