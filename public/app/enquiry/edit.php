<?php session_start();?>
<link href="../public/app/enquiry/add.css" rel="stylesheet">

<div class="container" ng-controller="EditCTL"
ng-show="prepareDisplayEdit"
ng-init="editAllow = <?php echo json_encode(@$_SESSION['login']['level_id'] == 2 && @$_SESSION['login']['level_id'] > 0);?>;"
>
	<ul class="nav nav-tabs tabs-add" >
  	<li class="active"><a>Enquiry</a></li>
  	<?php if(@$_SESSION['login']['level_id']==4){?>
		<li><a ng-click="changeHash('/match/'+id)">Match Property</a></li>
  	<li><a ng-click="changeHash('/matched/'+id)">Matched Property</a></li>
    <?php }?>
	</ul>
	<!-- nav-tab-->
	<?php if(in_array(@$_SESSION['login']['level_id'], [1,2])){?>
	<div class="tab-content">
    <h3>Assign Manager</h3>
		<div>Current assign: <strong>{{form.assign_manager.name || 'None'}}</strong></div>
		<form ng-submit="autoAssMng()">
      <div class="detail-type">
        Auto assign manager: <strong style="color: orange;">{{collection2.auto_assign.name || 'None'}}</strong>
        <br>
        <button type="submit" class="btn btn-success">Auto Assign Manager</button>
      </div>
    </form>
    <form ng-submit="assMng()">
      <div class="detail-type">
        <div class="form-group">
          <label>Assign manager</label>
          <select
          class="form-control"
          ng-model="assMngForm.assign_manager_id"
          ng-options="item.id as item.name for item in collection2.accounts"
          >
          <option value="">-None-</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Assign Manager</button>
        </div>
      </div>
    </form>
		<?php }?>
		<?php if(in_array(@$_SESSION['login']['level_id'], [1,2,3])){?>
		<h3>Assign Sale</h3>
		<div>Current assign: <strong>{{form.assign_sale.name || 'None'}}</strong></div>
		<form ng-submit="autoAssSale()">
      <div class="detail-type">
        Auto assign sale: <strong style="color: orange;">{{collection3.auto_assign.name || 'None'}}</strong>
        <br>
        <button type="submit" class="btn btn-success">Auto Assign Sale</button>
      </div>
    </form>
    <div class="detail-type">
      <form ng-submit="assSale()">
        <div class="form-group">
          <label>Assign Sale:</label>
          <select
          class="form-control"
          ng-model="assSaleForm.assign_sale_id"
          ng-options="item.id as item.name for item in collection3.accounts">
          <option value="">-None-</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Assign Sale</button>
        </div>
      </form>
    </div>
		<?php }?>
    <h3>Enquiry detail</h3>
    <form ng-submit="submitEdit()">
    	<div id="enquiry" class="tab-pane fade in active tab-1">
      		<!-- <div class="row detail-create">
            	<div class="col-md-5">
                	<div class="enq-id">
                    	<span><i class="id"><strong>Enquiry ID:</strong></i>
                        <i class="num-id">S07031520</i></span>
                        <i class="name-id">Rangsilkarn Maneerungraungroj</i>
                    </div>
                </div>
                <div class="col-md-3">
                	<div class="remark">
                    	<i class="rm"><strong>Remark:</strong></i>
                    </div>
                </div>
                <div class="col-md-4">
                	<div class="rating">
                    	<i class="col-md-2 rat"><strong>Rating:</strong> N/A</i>
                        <ul class="col-md-2 member">
                        	<li>sale</li>
                            <li>customer</li>
                        </ul>
                    </div>
                </div>
            </div> -->
						<!--row-->
						<fieldset ng-disabled="!editAllow">
            <div class="row detail-type">
            	<div class="col-md-12 form-group">
                  <label class="require">Enquiry Type</label><strong>:</strong>
                  <select class="form-control" id="type" ng-model="form.enquiry_type_id" required>
                    <option value="1">Individual</option>
                    <option value="2">Investment</option>
                    <option value="3">Corporate</option>
                  </select>
							</div>
                <div class="col-md-6">
            			<div class="form-group">
                    <label class="require">Customer</label><strong>: </strong>
                    <input type="text" class="form-control" id="name" placeholder="name,tel,email" ng-model="form.customer" required>
                    <br><small style="margin-left: 88px;">คั่นรายละเอียดการติดต่อด้วยลูกน้ำ " , "</small>
                  </div>
            	</div>
                <!-- <div class="col-md-6">
									<div class="form-inline">
                  		<div class="form-group">
                            <label for="contact-sale">Contact (manager)</label><strong>: </strong>
                            <select class="form-contro class="require"l" id="contact" ng-model="form.sale_id">
															<option value="">Please select</option>
														</select>
                      </div>
                  </div>
									<div class="form-inline">
                  		<div class="form-group">
                            <label for="contact-sale">Contact (sale)</label><strong>: </strong>
                            <select class="form-control" id="contact" ng-model="form.sale_id">
															<option value="">Please select</option>
														</select>
                      </div>
                  </div>
            	  </div> -->
                <div class="col-md-12 hr"></div>

                <div class="col-md-6">
                	<div class="form-group">
                  		<i class="col-md-6 box-1"><label>Requirement Type</label><strong>:</strong></i>
                        <i class="col-md-5 box-2">
                        	<select class="form-control"
													ng-model="form.requirement_id"
													ng-options="item.id as item.name_for_enquiry for item in collection.requirement"
                          required>
                        	</select>
                        </i>
                    </div>
                  	<div class="form-group">
                    	<i class="col-md-6 box-1"><label>Property Type</label><strong>:</strong></i>
                      	<i class="col-md-5 box-2">
                        	<select class="form-control"
													ng-model="form.property_type_id"
													ng-options="item.id as item.name for item in collection.property_type"
													required>
                      		</select>
                    	</i>
                    </div>

                  	<div class="form-group">
                  		<i class="col-md-6 box-1"><label>Branch</label><strong>:</strong></i>
                  		<i class="col-md-5 box-2">
                        	<select class="form-control"
													ng-model="form.province_id"
													ng-options="item.id as item.name for item in thailocation.province"
													required>
                  			</select>
                    	</i>
                  	</div>
                    <div class="form-group">
                  		<i class="col-md-6 box-1"><label>Project</label><strong>:</strong></i>
                  		<i class="col-md-5 box-2">
                        	<select class="form-control"
													ng-model="form.project_id"
										      ng-options="item.id as item.name for item in collection.project"
													>
                          <option value="">-Please Select-</option>
                  			</select>
                    	</i>
					          </div>
                    <div class="form-group">
            	        <i class="col-md-6 box-1"><label>Buying Budget</label><strong>:</strong></i>
           	            <i class="col-md-5 box-2">
       	                	<span><input type="text" class="form-control" ng-model="form.buy_budget_start"> to
                      		<input type="text" class="form-control" ng-model="form.buy_budget_end"></span>
                      	</i>
                    </div>
                    <div class="form-group">
            	        <i class="col-md-6 box-1"><label>Rental Budget</label><strong>:</strong></i>
           	            <i class="col-md-5 box-2">
       	                	<span><input type="text" class="form-control" ng-model="form.rent_budget_start"> to
                      		<input type="text" class="form-control" ng-model="form.rent_budget_end"></span>
                      	</i>
                    </div>
                    <div class="form-group">
            	       <i class="col-md-6 box-1"><strong>Zone: </strong></i>
                       <i class="col-md-5 box-2">
          	             <select class="form-control"
                         ng-model="form.zone_id"
                         ng-options="item.id as item.name group by getZoneGroupName(item.zone_group_id) for item in collection.zone"
                         >
                         <option value="">-Please Select-</option>
                         </select>
                    	</i>
					          </div>
                    <div class="form-group">
            	        <i class="col-md-6 box-1"><strong>Enquiry is the decision maker:</strong></i>
           	            <select class="form-control" style="width: 100px;" ng-mode="form.decision_maker">
           	              <option value="1">Yes</option>
           	              <option value="0">No</option>
           	            </select>
                    </div>

                    <div class="form-group">
            	       <i class="col-md-6 box-1"><strong>Period time to purchasing or leasing: </strong></i>
                       <i class="col-md-5 box-2">
                         <select class="form-control" ng-model="form.ptime_to_pol">
     	                    <option>Within a week</option>
                            <option>Within a month</option>
                            <option>Within 3 months</option>
                         </select>
                     	</i>
					          </div>
                </div><!--col-md-6-->
                <div class="col-md-6">
                	<div class="form-group">
            	        <i class="col-md-3 box-1"><strong>No. of bed Roooms: </strong></i>
           	            <i class="col-md-8 box-2">
       	                	<input type="text" class="form-control" ng-model="form.bedroom" ng-disabled="form.is_studio">
                      		<span><input type="checkbox" ng-model="form.is_studio" ng-change="vm.changeStudio()" ng-true-value="1" ng-false-value="0"> Studio</span>
                      	</i>
                    </div>
                  <div class="clearfix"></div>
                	<div class="form-group">
                 		<i class="col-md-3 box-1"><strong>Size: </strong></i>
                    	<i class="col-md-8 box-2">
                        	<input type="text" class="form-control" ng-model="form.size">
                  			<select class="form-control size" ng-model="form.size_unit_id">
                    			<option value="1">Sq. m.</option>
                    			<option value="2">Sq. wa</option>
                    			<option value="3">Rai</option>
                  			</select>
                    	</i>
                  	</div>
                    <div class="form-group">
                 		<i class="col-md-3 box-1"><strong>Nearest BTS: </strong></i>
                  		<i class="col-md-8 box-2">
                        	<select class="form-control"
                          ng-model="form.bts_id"
                          ng-options="item.id as item.name for item in collection.bts"
                          >
                    			<option value="">Please select</option>
                  			</select>
                  		</i>
                     </div>
                     <div class="form-group">
             	        <i class="col-md-3 box-1"><strong>Nearest MRT: </strong></i>
                        <i class="col-md-8 box-2">
    	                    <select class="form-control"
                          ng-model="form.mrt_id"
                          ng-options="item.id as item.name for item in collection.mrt"
                          >
                            <option value="">Please select</option>
                            </select>
                        </i>
                   	</div>
                    <div class="form-group">
                     <i class="col-md-3 box-1"><strong>Nearest Airport-link: </strong></i>
                       <i class="col-md-8 box-2">
                         <select class="form-control"
                         ng-model="form.airport_link_id"
                         ng-options="item.id as item.name for item in collection.airport_link"
                         >
                           <option value="">Please select</option>
                           </select>
                       </i>
                   </div>
                 <div class="clearfix"></div>
                    <div class="form-group">
            	       <i class="col-md-3 box-1"><strong>Status: </strong></i>
                       <i class="col-md-8 box-2">
          	             <select class="form-control"
                         ng-model="form.enquiry_status_id"
                         ng-options="item.id as item.name for item in collection.enquiry_status"
                         required>
                         <option value="">Please select</option>
                         </select>
                     	</i>
					          </div>
                    <div class="form-group">
            	        <i class="col-md-3 box-1"><strong>Exact location required:</strong></i>
           	            <i class="col-md-8 box-2">
       	                	<textarea class="form-control" rows="2" id="comment" ng-model="form.ex_location"></textarea>
                      	</i>
                    </div>
                </div><!--col-md-6-->
                <hr class="clear-fix">
        	</div><!--detail-type-->
            <div class="row detail-type">
            	<div class="col-md-12 specific">
                	<div class="col-md-2">
                    	<p><label>Specific requirement</label><strong>:</strong></p>
                    </div>
                    <div class="col-md-3">
                    	<div><input type="checkbox" ng-model="form.sq_furnish" ng-true-value="1" ng-false-value="0"> Fully Furnish / ตกแต่งครบ</div>
                        <div><input type="checkbox" ng-model="form.sq_park" ng-true-value="1" ng-false-value="0"> Close park / ใกล้สวนสาธรณะ</div>
                        <div><input type="checkbox" ng-model="form.sq_airport" ng-true-value="1" ng-false-value="0"> Close airport / ใกล้สนามบิน</div>
                    </div>
                    <div class="col-md-3">
                    	<div><input type="checkbox" ng-model="form.sq_hospital" ng-true-value="1" ng-false-value="0"> Close hospital / ใกล้โรงพยาบาล</div>
                        <div><input type="checkbox" ng-model="form.sq_bts" ng-true-value="1" ng-false-value="0"> Close to BTS/MRT / ติดรถไฟฟ้า</div>
                        <div><input type="checkbox" ng-model="form.sq_mainroad" ng-true-value="1" ng-false-value="0"> Close to main road / ติดถนนใหญ่</div>
                    </div>
                    <div class="col-md-3">
                    	<div><input type="checkbox" ng-model="form.sq_school" ng-true-value="1" ng-false-value="0"> Close school / University / ใกล้โรงเรียน</div>
                        <div><input type="checkbox" ng-model="form.sq_shopmall" ng-true-value="1" ng-false-value="0"> Close shopping mall / ใกล้ห้างสรรพสินค้า</div>
                        <div>Others / อื่นๆ <input type="text" ng-model="form.sq_other"> </div>
                    </div>
                </div>
            </div><!--detail-type-->
					</fieldset>
      		<div class="row detail-type">
            	<!-- <div class="col-md-12">
            	    <label>Source</label><strong>:</strong>
                    <select name="firstSelection" id="firstSelection"
                    ng-model="form.source_id"
                    ng-change="triggerChangeSource()"
                    disabled>
                        <option value="">--Select--</option>
                        <option value='1'>Online Marketing</option>
                        <option value='2'>Walkin</option>
                        <option value='3'>Call</option>
                        <option value='4'>Referal</option>
                        <option value='5'>Event</option>
                    </select>
                    <select name="secondSelection" id="online"
                    ng-show="form.source_id"
                    ng-model="form.sub_source_id"
                    ng-init="form.sub_source_id=1"
                     ng-change="triggerSource()"
                     required>
                        <option value="">--Select--</option>
                        <option value="1" ng-if="form.source_id==1">Website</option>
                        <option value="2" ng-if="form.source_id==1">Social Media</option>
                        <option value="3" ng-if="form.source_id==1">Online Ads.</option>
                        <option value="4" ng-if="form.source_id==1">Email</option>
                        <option value="5" ng-if="form.source_id==1">Line</option>line

                        <option value="6" ng-if="form.source_id==2">Site</option>
                        <option value="7" ng-if="form.source_id==2">Head ofince</option>

                        <option value="" ng-if="form.source_id==3">--Select--</option>
                        <option value="8" ng-if="form.source_id==3">Callcenter</option>
                        <option value="9" ng-if="form.source_id==3">Site</option>

                        <option value="10" ng-if="form.source_id==4">Friends</option>
                        <option value="11" ng-if="form.source_id==4">Customers</option>
                    </select>
					          <select name="thirdSelection" id="website"
                    ng-model="form.from_website_id"
                    ng-show="form.source_id==1 && form.sub_source_id==1">
                        <option value="">--Select--</option>
                        <option value="1">agent168th.com</option>
                        <option value="2">prakard.com</option>
                        <option value="3">thinkofliving.com</option>
                        <option value="4">ddproperty.com</option>
                        <option value="5">kobkid.com</option>
                        <option value="6">bangkokpost.com</option>
                    </select>
                </div> -->
                <!--col-md-12-->
                <div class="col-md-12 contact-type">
                	<label>Contact Type</label><strong>:</strong>
                    <select ng-model="form.contact_type_id" ng-disabled="!editAllow">
                        <option value="">-Please select-</option>
                        <option value="1">Online</option>
                        <option value="2">Walkin</option>
                        <option value="3">Call</option>
                    </select>
                </div><!--col-md-12-->
                <div class="col-md-12 form-group">
                  <label>
                  	<strong>Comment.</strong>
                  </label>
                  <small>(กรุณาใส่รายละเอียดความต้องการของลูกค้าให้ครบถ้วน)</small>
                  <br>
                	<textarea ng-model="form.comment" class="form-control" rows="2" id="comment" style="min-height:80px; margin:10px 0 10px 10px; display: inline; vertical-align: middle;"></textarea>
                </div>
            </div><!--detail-type-->
            <div class="col-md-12 comment text-center" style="margin:20px 0; text-align:center;">
            	<!-- <label>Comment/Remark</label><strong>:</strong>
               	<textarea class="form-control" rows="2" id="comment" style="min-height:100px; margin-top:10px; margin-left:10px; width:1000px; display: inline; vertical-align: middle; background-color: #fff; padding:5px;"></textarea> -->
                <button class="btn btn-success update" type="submit">Save</button>
                <a class="btn btn-warning update" type="button" href="#/">Cancle</a>
            </div>
    	</div><!--enquiry-->
    </form>
	</div><!--tab-conent-->
</div><!--container-->

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
