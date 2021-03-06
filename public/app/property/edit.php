<?php session_start();?>
<div ng-controller="EditCTL">
<?php include(dirname(__FILE__).'/head.php');?>
<form ng-submit="submit()" id="form-edit-prop" ng-show="initSuccess"
  ng-init="editAllow = <?php echo json_encode(@$_SESSION['login']['level_id'] <= 2 && @$_SESSION['login']['level_id'] > 0);?>;"
  >
  <div class="row">
    <div class="col-md-4 form-group">
      <label>Reference ID</label>
      <input class="form-control" value="{{reference_id}}" ReadOnly>
    </div>
    <div class="col-md-4 form-group">
      <label>Owner</label>
      <input class="form-control" ng-if="editAllow" ng-model="form.owner">
      <input class="form-control" ng-if="!editAllow" disabled="disabled" value="">
    </div>
    <div class="col-md-4 form-group">
      <label>Status</label>
      <select class="form-control"
      ng-model="form.property_status_id"
      ng-options="item.id as item.name for item in collection.property_status"
      ng-disabled="!editAllow"
      required>
          <option value="">Please select</option>
      </select>
    </div>
  </div>
  <div class="row">
    <fieldset ng-disabled="!editAllow">
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
        <label>Room type</label>
        <select class="form-control"
        ng-model="form.room_type_id">
            <option value="">Please select</option>
            <option value="1">Studio</option>
            <option value="2">Duplex</option>
        </select>
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
      <div style="clear: both;"></div>
      <div class="col-md-4 form-group">
        <label>Contract price</label>
        <input type="text" class="form-control" ng-model="form.contract_price">
      </div>
      <div class="col-md-4 form-group">
        <label>Selling price</label>
        <input type="text" class="form-control" ng-model="form.sell_price">
      </div>
      <div class="col-md-4 form-group">
        <label>Rental price</label>
        <input type="text" class="form-control" ng-model="form.rent_price">
      </div>

      <div class="col-md-4 form-group"></div>
      <div class="col-md-4 form-group">
        <label>Contract expire</label>
        <div class="input-group">
          <input class="form-control datepicker" datepicker ng-model="form.contract_expire" placeholder="-">
          <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
        </div>
      </div>
      <div class="col-md-4 form-group">
        <label>Rented expire</label>
        <div class="input-group">
          <input class="form-control datepicker" datepicker ng-model="form.rented_expire" placeholder="-">
          <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
        </div>
      </div>
      <hr style="clear: both;
    background-color: black;
    height: 2px;
    margin: 30px 10px;">

      <div class="col-md-4 form-group">
        <label>key location</label>
        <select class="form-control"
        ng-model="form.key_location_id"
        ng-options="item.id as item.name for item in collection.key_location"
        >
            <option value="">Please select</option>
        </select>
      </div>
      <div style="clear: both;"></div>

      <div class="col-md-4 form-group">
        <label>road</label>
        <input type="text" class="form-control" ng-model="form.road">
      </div>
      <div class="col-md-4 form-group">
        <label>zone</label>
        <select class="form-control"
        ng-model="form.zone_id"
        ng-options="item.id as item.name group by getZoneGroupName(item.zone_group_id) for item in collection.zone"
        >
            <option value="">Please select</option>
        </select>
      </div>
      <div style="clear: both;"></div>

      <div class="col-md-4 form-group">
        <label>Province</label>
        <select class="form-control"
        ng-model="form.province_id"
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

      <hr style="clear: both;
    background-color: black;
    height: 2px;
    margin: 30px 10px;">


      <div class="col-md-4 form-group">
        <label>Web Status</label>
        <select class="form-control" ng-model="form.web_status" >
            <option value="0">Offline</option>
            <option value="1">Online</option>
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
        <label>Highlight</label>
        <select class="form-control"
        ng-model="form.property_highlight_id"
        ng-options="item.id as item.name for item in collection.property_highlight"
        >
            <option value="">Please select</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label>Web URL search</label>
        <textarea class="form-control"
        ng-model="form.web_url_search"></textarea>
      </div>
    </fieldset>
  </div>
  <div class="row">
    <div class="col-md-12 form-group">
      <label>Comment/Remark</label>
      <textarea class="form-control" ng-model="form.comment"></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 form-group">
      <!-- <button class="btn btn-primary">Save</button> -->
      <a class="btn btn-info" href="#/">Back</a>
      <button type="submit" class="btn btn-primary">Save</button>
      <a class="btn btn-info" href="#/{{form.id}}/match" target="_blank">Match</a>
    </div>
  </div>
</form>
<div ng-controller="CommentCTL">
  <table class="table table-bodered">
    <thead>
      <tr>
        <th>วันที่</th>
        <th>ข้อความ</th>
        <th>โดย</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="item in comments">
        <td>{{item.updated_at}}</td>
        <td>{{item.comment}}</td>
        <td>{{item.name}}</td>
      </tr>
    </tbody>
  </table>
</div>
</div>
