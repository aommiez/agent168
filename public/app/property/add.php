<?php
session_start();
if(!(@$_SESSION['login']['level_id'] <= 2 && @$_SESSION['login']['level_id'] > 0)) {
  return "";
}
?>
<form ng-submit="submit()" ng-controller="AddCTL" id="form-edit-prop" ng-show="initSuccess">
  <div class="row">
    <div class="col-md-4 form-group">
      <label>Owner</label>
      <input class="form-control" ng-model="form.owner">
      <!-- <input class="form-control" disabled="disabled" value="ปิดไว้จนกว่าจะเสร็จ"> -->
    </div>
  </div>
  <div class="row">
    <fieldset>
      <div class="col-md-4 form-group">
        <label>Property Type</label>
        <select class="form-control"
        ng-model="form.property_type_id"
        ng-options="item.id as item.name for item in collection.property_type"
        required>
            <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>Project</label>
        <select class="form-control"
        ng-model="form.project_id"
        ng-options="item.id as item.name for item in collection.project"
        >
            <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>Address no</label>
        <input type="text" class="form-control" ng-model="form.address_no">
      </div>
      <div class="col-md-4 form-group">
        <label>Floors</label>
        <input type="text" class="form-control" ng-model="form.floors">
      </div>
      <div class="col-md-4 form-group">
        <label>Size</label>
        <div class="row">
          <div class="col-md-6">
            <input ng-model="form.size" class="form-control">
          </div>
          <div class="col-md-6">
            <select ng-model="form.size_unit_id" class="form-control"
            ng-options="item.id as item.name for item in collection.size_unit"
            required>
              <option value="">Please select</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-4 form-group">
        <label>bedrooms</label>
        <input type="text" class="form-control" ng-model="form.bedrooms">
      </div>
      <div class="col-md-4 form-group">
        <label>bathrooms</label>
        <input type="text" class="form-control" ng-model="form.bathrooms">
      </div>
      <div class="col-md-4 form-group">
        <label>requirement</label>
        <select class="form-control"
        ng-model="form.requirement_id"
        ng-options="item.id as item.name for item in collection.requirement"
        required>
            <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>Contract price</label>
        <input type="text" class="form-control" ng-model="form.contract_price">
      </div>
      <div class="col-md-4 form-group">
        <label>Selling price</label>
        <input type="text" class="form-control" ng-model="form.sell_price">
      </div>
      <div class="col-md-4 form-group">
        <label>Rent price</label>
        <input type="text" class="form-control" ng-model="form.rent_price">
      </div>

      <div class="col-md-4 form-group">
        <label>key location</label>
        <select class="form-control"
        ng-model="form.key_location_id"
        ng-options="item.id as item.name for item in collection.key_location"
        >
            <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>zone</label>
        <select class="form-control"
        ng-model="form.zone_id"
        ng-options="item.id as item.name for item in collection.zone"
        >
            <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>road</label>
        <input type="text" class="form-control" ng-model="form.road">
      </div>

      <div class="col-md-4 form-group">
        <label>Province</label>
        <select class="form-control"
        ng-model="form.province_id"
        ng-init="form.province_id = null"
        ng-options="item.id as item.name for item in thailocation.province"
        >
            <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>District</label>
        <select class="form-control"
        ng-model="form.district_id"
        ng-options="item.id as item.name for item in getDistrict()"
        >
            <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>Sub District</label>
        <select class="form-control"
        ng-model="form.sub_district_id"
        ng-options="item.id as item.name for item in getSubDistrict()"
        >
            <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>bts</label>
        <select class="form-control"
          ng-model="form.bts_id"
          ng-options="item.id as item.name for item in collection.bts"
          >
          <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>mrt</label>
        <select class="form-control"
          ng-model="form.mrt_id"
          ng-options="item.id as item.name for item in collection.mrt"
          >
          <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>Airport link</label>
        <select class="form-control"
          ng-model="form.airport_link_id"
          ng-options="item.id as item.name for item in collection.airport_link"
          >
          <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>Status</label>
        <select class="form-control"
        ng-model="form.property_status_id"
        ng-options="item.id as item.name for item in collection.property_status"
        >
            <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>Contract expire</label>
        <div class="input-group">
          <input class="form-control datepicker" datepicker ng-model="form.contract_expire" placeholder="-">
          <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
        </div>
      </div>
      <div class="col-md-4 form-group">
        <label>Web Status</label>
        <select class="form-control" ng-model="form.web_status" >
            <option value="0">Offline</option>
            <option value="1">Online</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>Highlight</label>
        <select class="form-control"
        ng-model="form.property_highlight_id"
        ng-options="item.id as item.name for item in collection.property_highlight"
        >
            <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>Feature Unit</label>
        <select class="form-control"
        ng-model="form.feature_unit_id"
        ng-options="item.id as item.name for item in collection.feature_unit"
        >
            <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>Rented expire</label>
        <div class="input-group">
          <input class="form-control datepicker" datepicker ng-model="form.rented_expire" placeholder="-">
          <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
        </div>
      </div>
    </fieldset>
  </div>
  <div class="row">
    <div class="col-md-12 form-group">
      <!-- <button class="btn btn-primary">Save</button> -->
      <a class="btn btn-info" href="#/">Back</a>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>