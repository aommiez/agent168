<link href="../public/app/enquiry/add.css" rel="stylesheet">

<div class="container" ng-controller="MatchCTL">

	<ul class="nav nav-tabs tabs-add" >
		<li><a href="#/edit/{{id}}">Enquiry</a></li>
		<li class="active"><a href="#/match/{{id}}">Match Property</a></li>
		<!-- <li><a href="">Touring Report</a></li> -->
	</ul>

	<div class="row detail-type">
	<div class="col-md-5">
		<div class="form-group">
			<i class="col-md-3 box-1"><strong>Reference No.</strong></i>
			<i class="col-md-8 box-2">
   	    	<input type="text" class="form-control">
   		</i>
		</div>
        <div class="form-group">
        	<i class="col-md-3 box-1"><strong>Property Type: </strong></i>
        	<i class="col-md-8 box-2">
            	<select class="form-control">
               		<option>All</option>
                    <option>--</option>
                    <option>--</option>
                </select>
           </i>
		</div>
        <div class="form-group">
        	<i class="col-md-3 box-1"><strong>Bedrooms: </strong></i>
        	<i class="col-md-8 box-2">
            	<select class="form-control">
               		<option>All</option>
                    <option>--</option>
                    <option>--</option>
                </select>
           </i>
		</div>
        <div class="form-group">
        	<i class="col-md-3 box-1"><strong>Selling Price:</strong></i>
           	<i class="col-md-8 box-2">
       	    	<span><input type="text" class="form-control"> to
                <input type="text" class="form-control"></span>
           	</i>
    	</div>
        <div class="form-group">
        	<i class="col-md-3 box-1"><strong>Prop.Assign.Status:</strong></i>
           	<i class="col-md-8 box-2">
       	    	<span><input type="date" class="form-control"> -
                <input type="date" class="form-control"></span>
           	</i>
    	</div>
        <div class="form-group">
        	<i class="col-md-3 box-1"><strong>Zone: </strong></i>
        	<i class="col-md-8 box-2">
            	<select class="form-control">
               		<option>select</option>
                    <option>--</option>
                    <option>--</option>
                </select>
           </i>
		</div>
    </div><!--col-md-5-->
    <div class="col-md-7">
    	<div class="form-group">
        	<i class="col-md-2 box-1"><strong>Reqquiment Type: </strong></i>
        	<i class="col-md-9 box-2">
            	<select class="form-control">
               		<option>all</option>
                    <option>--</option>
                    <option>--</option>
                </select>
           </i>
		</div>
        <div class="form-group">
        	<i class="col-md-2 box-1"><strong>Project: </strong></i>
        	<i class="col-md-9 box-2">
            	<select class="form-control">
               		<option>all</option>
                    <option>--</option>
                    <option>--</option>
                </select>
           </i>
		</div>
        <div class="form-group">
       		<i class="col-md-2 box-1"><strong>Size: </strong></i>
            <i class="col-md-9 box-2">
            	<span><input type="text" class="form-control"> To
                <input type="text" class="form-control">
                	<select class="form-control size" style="width: 13%;margin-left: 20px;">
                    	<option>all</option>
                    	<option>--</option>
                    	<option>--</option>
                  	</select></span>
           </i>
		</div>
        <div class="form-group">
        	<i class="col-md-2 box-1"><strong>Rental Price:</strong></i>
           	<i class="col-md-3 box-2">
       	    	<span><input type="text" class="form-control"> to
                <input type="text" class="form-control"></span>
           	</i>
            <i class="col-md-1 box-1"><strong>Unit No.</strong></i>
           	<i class="col-md-2 box-2">
       	    	<input type="text" class="form-control">
           	</i>
            <i class="col-md-2 box-1"><strong>Unit type.</strong></i>
           	<i class="col-md-2 box-2">
       	    	<input type="text" class="form-control">
           	</i>
    	</div>
        <div class="form-group">
        	<i class="col-md-2 box-1"><strong>Status: </strong></i>
        	<i class="col-md-2 box-2">
            	<select class="form-control">
               		<option>all</option>
                    <option>--</option>
                    <option>--</option>
                </select>
           </i>
           <i class="col-md-2 box-1" style="color:blue;"><strong>Owner's name.</strong></i>
           	<i class="col-md-6 box-2">
       	    	<input type="text" class="form-control">
           	</i>
		</div>
        <div class="form-group">
        	<i class="col-md-2 box-1"><strong>Specific Area: </strong></i>
        	<i class="col-md-9 box-2">
            	<select class="form-control">
               		<option></option>
                    <option>--</option>
                    <option>--</option>
                </select>
           </i>
		</div>
    </div><!--col-md-7-->
    <button class="search" type="submit" style="display:block; margin:20px auto; background: #009688; color:#fff; border:none; padding:5px 25px; border-radius:5px;">Search</button>
</div><!--detail-type-->
</div>
