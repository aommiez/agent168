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
                                    <input type="text" class="form-control" ng-model="form.enquiry_no">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry type</label>
                                <div>
                                  <select class="form-control"
                                  ng-model="form.enquiry_type_id"
                                  ng-options="item.id as item.name for item in collection.enquiry_type">
                                      <option value="">All</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Customer</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.customer">
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Requirement Type</label>
                                <div>
                                  <select class="form-control"
                                  ng-model="form.requirement_id"
                                  ng-options="item.id as item.name for item in collection.requirement">
                                      <option value="">All</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Property Type</label>
                                <div>
                                  <select class="form-control"
                                  ng-model="form.property_type_id"
                                  ng-options="item.id as item.name for item in collection.property_type">
                                      <option value="">All</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Project</label>
                                <div>
                                    <select class="form-control"
                                    ng-model="form.project_id"
                                    ng-options="item.id as item.name for item in collection.project">
                                        <option value="">All</option>
                                    </select>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Zone</label>
                                <div>
                                  <select class="form-control"
                                  ng-model="form.zone_id"
                                  ng-options="item.id as item.name group by getZoneGroupName(item.zone_group_id) for item in collection.zone">
                                      <option value="">All</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Branch</label>
                                <div>
                                    <select class="form-control"
                                    ng-model="form.privince_id"
                                    ng-options="item.id as item.name for item in thailocation.privince">
                                        <option value="">All</option>
                                    </select>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Buying Budget</label>
                                <div class="row">
                                    <div class="col-md-5"><input type="text" class="form-control" ng-model="form.id"></div>
                                    <div class="col-md-2">to</div>
                                    <div class="col-md-5"><input type="text" class="form-control" ng-model="form.id"></div>
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Rental Budget</label>
                                <div class="row">
                                    <div class="col-md-5"><input type="text" class="form-control" ng-model="form.id"></div>
                                    <div class="col-md-2">to</div>
                                    <div class="col-md-5"><input type="text" class="form-control" ng-model="form.id"></div>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Enquiry is the decision maker</label>
                                <div>
                                      <select class="form-control"
                                      ng-model="form.decision_maker">
                                          <option value="">All</option>
                                          <option value="1">Yes</option>
                                          <option value="0">No</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Period time to purchasing or leasing</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">No. of bed</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Roooms</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Size</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Nearest BTS</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Nearest MRT</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Nearest Airport-link</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Status</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Exact location required</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="control-label">Contact Type</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="form.id">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                            <label>Order By</label>
                            <select ng-model="form.orderBy" ng-init="form.orderBy='enquiry.updated_at'" class="form-control">
                                <option value="enquiry.updated_at">update date</option>
                                <option value="enquiry.enquiry_no">Enquiry No.</option>
                            </select>
                          </div>
                          <div class="col-md-2">
                            <label></label>
                            <select ng-model="form.orderType" ng-init="form.orderType='DESC'" class="form-control">
                                <option value="DESC">max -> min</option>
                                <option value="ASC">min -> max</option>
                            </select>
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
        <div class="pull-right"><strong>Summary</strong>: {{items.total}}</div>
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
                <th>Enquiry Type</th>

                <th>Buying Budget</th>
                <th>Rental Budget</th>
                <th>Status</th>

                <th>Update</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="item in items.data">
                <td>{{item.created_at}}</td>
                <td>{{item.customer}}</td>
                <td>{{item.name_for_enquiry}}</td>
                <td>{{item.enquiry_type_name}}</td>

                <td>฿{{commaNumber(item.buy_budget_start)}} - ฿{{commaNumber(item.buy_budget_end)}}</td>
                <td>฿{{commaNumber(item.rent_budget_start)}} - ฿{{commaNumber(item.rent_budget_end)}}</td>
                <td>{{item.enquiry_status_name}}</td>

                <td>{{item.updated_at}}</td>
                <td>
                  <a class="xcrud-action btn btn-warning btn-sm" href="#/edit/{{item.id}}" target="_blank"><i class="glyphicon glyphicon-edit"></i></a>
                  <?php if(@$_SESSION["login"]["level_id"]==1){?><a class="xcrud-action btn btn-danger btn-sm" ng-click="remove(item.id)"><i class="glyphicon glyphicon-remove"></i></a><?php }?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>