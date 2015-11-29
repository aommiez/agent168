<?php $this->import("/layout/headProperty"); ?>

<link rel="stylesheet" type="text/css" href="../public/css/detail.css">

<link rel="icon" href="assets/img/favicon.png">
<!-- Important stylesheet -->
<link rel="stylesheet" href="../public/js/assets/css/vendor/magic/magic.min.css">
<link rel="stylesheet" href="../public/js/assets/css/vendor/animate/animate.min.css">
<link rel="stylesheet" href="../public/css/jquery.desoslide.css">

<!-- Include js plugin -->
<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/assets/js/vendor/highlight/highlight.pack.js"></script>
<script src="../public/js/assets/js/app/jquery.desoslide.js"></script>

<!-- script slide -->
<script>
$(function() {

 $('#slideshow').desoSlide({
        thumbs: $('#slideshow_thumbs li > a'),
        auto: {
            start: true
        },
        first: 0,
        interval: 6000
    });
});
</script>
 <script>

$("slide>ul>li>a>img").click(function () {
      $(this).toggleClass("transitions");
    });
    </script>

		<div class="container">
        	<div class="content">
                	<div id="slideshow" style="height: 450px;"></div>
						<div class="text-center">
                        	<div class="slide">
                         	 <ul id="slideshow_thumbs" class="desoslide-thumbs-vertical list-inline ">
                              <?php
                              $imgList = $params['item']['images'];
                              if(count($imgList) == 0){ $imgList = [$params['item']['picture']]; }

                              foreach($imgList as $img){?>
                              <li>
                              	<a href="<?php echo $img['url'];?>"><img src="<?php echo $img['url'];?>" alt="images"></a>
                              </li>
                              <?php }?>
                            </ul>
                            </div>
						</div>

					<p class="remarkimg">* ภาพที่แสดงอาจไม่เหมือนสภาพจริง และห้อง/ บ้านที่จำหน่าย ไม่รวมการตกแต่งใดๆ ทั้งสิ้น ทั้งนี้เป็นไปตามเงื่อนไขบริษัทฯ</p>

           </div><!--content-->
     </div>
     <div class="container">

     </div>
     <div class="container">
            <div class="box-right">
    			<form id="frmQuickSendEnquiry">
                    <p class="head-form">กรอกข้อมูลเพื่อเยี่ยมชมยูนิตนี้</p>
                    <div class="item-form cf">
                    <p>ฉันต้องการ</p>
                        <div>
                        <input type="radio" name="requirement" value="Buy" checked=""><span>ซื้อ</span>
                        <input type="radio" name="requirement" value="Rent"><span>เช่า</span>
                        <input type="radio" name="requirement" value="Buy/Rent"><span>ซื้อ / เช่า</span>
                        </div>
                    </div>
                    <div class="item-form cf">
                        <p>ชื่อ</p>
                        <div><input name="first_name" type="text"></div>
                    </div>
                    <div class="item-form cf">
                        <p>นามสกุล</p>
                        <div><input name="last_name" type="text"></div>
                    </div>
                    <div class="item-form cf">
                        <p>มือถือ</p>
                        <div><input name="phone" type="text" class="number-only"></div>
                    </div>
                    <div class="item-form cf">
                        <p>อีเมล</p>
                        <div><input name="email" type="text"></div>
                    </div>
                    <div class="box-btn-toggle">
                        <button type="submit" style="display:none;" class="btn-search transit btnSubmit">Send</button>
                        <button class="btn-search transit btnSubmit">SEND</button>
                    </div>
                    <input type="hidden" name="reference_id" value="<?php echo $params['item']['reference_id'];?>">
                    <input type="hidden" name="id" value="<?php echo $params['item']['id'];?>">
     			</form>
          <div id="message-success"
          style="display:none; text-align:center; line-height:30px;">Success send form</div>
    	</div>

        <div class="content-tab1-main">

        <!-- Project Details -->
		<div class="box-text-main">
			<p class="title-text">ข้อมูลอสังหาฯ</p>
			<div class="text cf">
        <p><span>ประเภทอสังหาฯ</span> :
          <a href="" target="_blank">
            <?php echo $params['item']['property_type']['name_th'];?>
          </a>
        </p>
        <?php if($params['item']['property_type_id']==1){?>
        <p><span>ชื่อโครงการ</span> : <?php echo $params['item']['project']['name'];?></p>
        <?php }?>
				<p><span>รหัสอสังหาฯ</span> : <?php echo $params['item']['reference_id'];?></p>
				<p><span>ขนาด</span> : <?php echo $params['item']['size'];?> ตร.ว.</p>
				<p><span>ห้องนอน</span> : <?php echo $params['item']['bedrooms'];?></p>
				<p><span>ห้องน้ำ</span> : <?php echo $params['item']['bathrooms'];?></p>
			</div>
			<p class="bor"><span>ทำเล</span> : <a href="" target="_blank"><?php echo $params['item']['zone']['name'];?></a></p>
			<p class="title-text">สิ่งอำนวยความสะดวก</p>
			<div class="text2 cf">
    		<?php if(@$params['item']['project']['has_swimming_pool']){?><p>Swimming Pool</p><?php }?>
    		<?php if(@$params['item']['project']['has_onsen']){?><p>Onsen</p><?php }?>
    		<?php if(@$params['item']['project']['has_gym']){?><p>Gym</p><?php }?>
    		<?php if(@$params['item']['project']['has_garden']){?><p>Garden</p><?php }?>
    		<?php if(@$params['item']['project']['has_futsal']){?><p>Futsal</p><?php }?>
    		<?php if(@$params['item']['project']['has_badminton']){?><p>Badminton</p><?php }?>
    		<?php if(@$params['item']['project']['has_basketball']){?><p>Basketball</p><?php }?>
    		<?php if(@$params['item']['project']['has_tennis']){?><p>Tennis</p><?php }?>
    		<?php if(@$params['item']['project']['has_bowling']){?><p>Bowling</p><?php }?>
    		<?php if(@$params['item']['project']['has_pool_room']){?><p>Pool Room</p><?php }?>
    		<?php if(@$params['item']['project']['has_game_room']){?><p>Game Room</p><?php }?>
    		<?php if(@$params['item']['project']['has_playground']){?><p>Playground</p><?php }?>
    		<?php if(@$params['item']['project']['has_meeting_room']){?><p>Meeting Room</p><?php }?>
    		<?php if(@$params['item']['project']['has_private_butler']){?><p>Private Butler</p><?php }?>
    		<?php if(@$params['item']['project']['has_shuttle_bus']){?><p>Shuttle Bus</p><?php }?>
    		<?php if(@$params['item']['project']['has_minimart_supermarket']){?><p>Minimart Supermarket</p><?php }?>
    		<?php if(@$params['item']['project']['has_restaurant']){?><p>Restaurant</p><?php }?>
    		<?php if(@$params['item']['project']['has_laundry_service']){?><p>Laundry Servic</p><?php }?>
    		<?php if(@$params['item']['project']['has_private_parking']){?><p>Private Parking</p><?php }?>
    		<?php if(@$params['item']['project']['has_bathtub_inside_unit']){?><p>Bathtub Inside Unit</p><?php }?>
     	</div>
			<!-- Facilities End -->
		</div>
	</div>
    <div class="box-price-main">
                <!-- Best Deal -->
                <div class="box-picture cf">
                    <?php if($params['item']['feature_unit_id']==1){?>
                    <span class="ribbon best-buy"></span>
                    <?php }?>
                </div>
                <div class="box-price cf" style="width: 100%;">
                  <?php if($params['item']['requirement_id']==1 || $params['item']['requirement_id']==3){?>
                  <div class="box-left" style="width: 100%;">
                      <p class="price">ราคาขาย</p>
                      <p class="num"><?php echo number_format($params['item']['sell_price']);?> บาท</p>
                  </div>
                  <?php }?>
                  <?php if($params['item']['requirement_id']==2 || $params['item']['requirement_id']==3){?>
                  <div class="box-left" style="width: 100%;">
                      <p class="price">ราคาเช่า</p>
                      <p class="num"><?php echo number_format($params['item']['rent_price']);?> บาท</p>
                  </div>
                  <?php }?>
                <!-- <div class="box-cart">
                    <a class="btn-cart" href="">สนใจยูนิตนี้<img src="../public/images/shopping_cart.png" alt="images"></a>
                </div> -->
                </div>
                <!-- Best Deal End -->
		</div>
	</div><!--container-->
<script>
  $(function(){
    var form = $('#frmQuickSendEnquiry');
    var messageSuccess = $('#message-success');
    form.submit(function(e){
      e.preventDefault();

      var data = form.serialize();
      form.find(':input').prop("disabled", true);

      $.ajax("", {
        type: "post",
        dataType: "json",
        data: data,
        success: function(data){
          messageSuccess.show();
          form.hide();
        },
        error: function(){
          form.find(':input').prop("disabled", false);
        }
      });
    });
  });
</script>
<?php $this->import("/layout/footer"); ?>
