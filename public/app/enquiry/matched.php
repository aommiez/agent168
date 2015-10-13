<?php session_start();?>
<div ng-controller="MatchedCTL">
  <ul class="nav nav-tabs tabs-add" >
  	<li><a ng-click="changeHash('/edit/'+id)">Enquiry</a></li>
  	<?php if(@$_SESSION['login']['level_id']==4){?>
  	<li><a ng-click="changeHash('/match/'+id)">Match Property</a></li>
    <li><a>Matched Property</a></li>
    <?php }?>
  	<!-- <li><a href="">Touring Report</a></li> -->
	</ul>
    <div style="overflow-x: auto;">
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>#</th>
                <th>Details</th>
                <th>Requirement</th>
                <th>Size</th>
                <th>Sell</th>
                <th>Rent</th>
                <th>Status</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="prop in props.data">
                <td>{{prop.reference_id}}</td>
                <td>
                    <div><strong>Project</strong>: <span>{{prop.project_name}}</span></div>
                    <!-- <div><strong>Type</strong>: <span>{{prop.property_type_name}}</span></div> -->
                    <div><strong>Bed room</strong>: <span>{{prop.bedrooms}}</span></div>
                    <div><strong>Bath room</strong>: <span>{{prop.bathrooms}}</span></div>
                    <div ng-if="prop.address_no"><strong>Address no</strong>: <span>{{prop.address_no}}</span></div>
                    <!-- <div><strong>Transfer Status</strong>: <span>{{prop.property_status_name}}</span></div> -->
                </td>
                <td>{{prop.requirement_name}}</td>
                <td>{{prop.size}} {{prop.size_unit_name}}</td>
                <td><span ng-hide="!prop.sell_price">฿{{commaNumber(prop.sell_price)}}</span></td>
                <td><span ng-hide="!prop.rent_price">฿{{commaNumber(prop.rent_price)}}</span></td>
                <td>{{prop.property_status_name}}</td>
                <td>
                  <button class="btn btn-success"
                  ng-hide="prop.request_contact"
                  ng-click="clickRequestContact(prop)">Request Contact</button>
                  <button class="btn btn-info"
                  ng-show="prop.request_contact.status_id==1"
                  disabled>Waiting approve..</button>
                  <button class="btn btn-info"
                  ng-show="prop.request_contact.status_id==2"
                  disabled>Admin approved</button>
                  <button class="btn btn-info"
                  ng-show="prop.request_contact.status_id==3"
                  disabled>Admin denine</button>
                </td>
                <td><button class="btn btn-danger" ng-click="removeMathClick(prop)">Delete Match</button></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
      <ul class="pagination">
        <!-- <li>
          <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li> -->
        <li ng-repeat="page in pagination track by $index">
          <a href="" ng-click="setPage($index)">{{($index+1)}}</a>
        </li>
        <!-- <li>
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li> -->
      </ul>
    </div>
</div>
