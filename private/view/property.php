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

<style>
* {
  /*font-family: 'Arial', 'san-serif';
  font-size: 11px;*/
}
</style>
<!-- script slide -->
<script>
$(function() {

 $('#slideshow').desoSlide({
        thumbs: $('#slideshow_thumbs li > a'),
        auto: {
            start: true
        },
        first: 1,
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
                	<div id="slideshow"></div>
						<div class="text-center">
                        	<div class="slide">
                         	 <ul id="slideshow_thumbs" class="desoslide-thumbs-vertical list-inline ">
                               <li>
                                   <a href="<?php echo $params['item']['picture']['url'];?>">
                                     <img src="<?php echo $params['item']['picture']['url'];?>" alt="images">
                                   </a>
                               </li>
                              <?php foreach($params['item']['images'] as $img) {?>
                            	<li>
                                	<a href="<?php echo $img['url'];?>"><img src="<?php echo $img['url'];?>" alt="images"></a>
                              </li>
                              <?php }?>
                              <!-- <li>
                              	<a href="../public/images/home2.jpg"><img src="../public/images/home2_thumb.jpg" alt="images"></a>
                              </li>
                              <li>
                              	<a href="../public/images/home3.jpg"><img src="../public/images/home3_thumb.jpg" alt="images"></a>
                              </li>
                              <li>
                                 	<a href="../public/images/home1.jpg"><img src="../public/images/home1_thumb.jpg" alt="images"> </a>
                              </li>
                               <li>
                                 	<a href="../public/images/home2.jpg"><img src="../public/images/home2_thumb.jpg" alt="images"> </a>
                              </li>
                               <li>
                                 	<a href="../public/images/home3.jpg"><img src="../public/images/home3_thumb.jpg" alt="images"> </a>
                              </li> -->
                          </ul>
                          </div>
						</div>

					<p class="remarkimg">* ภาพที่แสดงอาจไม่เหมือนสภาพจริง และห้อง/ บ้านที่จำหน่าย ไม่รวมการตกแต่งใดๆ ทั้งสิ้น ทั้งนี้เป็นไปตามเงื่อนไขบริษัทฯ</p>

           </div><!--content-->
     </div>
     <div class="container">

     </div>
     <div class="container">
            <div class="box-right"  style="display: none;">
    			<form id="frmQuickSendEnquiry">
                    <p class="head-form">กรอกข้อมูลเพื่อเยี่ยมชมยูนิตนี้</p>
                    <div class="item-form cf">
                    <p>ฉันต้องการ</p>
                        <div>
                        <input type="radio" name="data" value="1" checked=""><span>ซื้อ</span>
                        <input type="radio" name="data" value="2"><span>เช่า</span>
                        <input type="radio" name="data" value="3"><span>ซื้อ / เช่า</span>
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
                        <div><input name="mobile" type="text" class="number-only"></div>
                    </div>
                    <div class="item-form cf">
                        <p>อีเมล</p>
                        <div><input name="email" type="text"></div>
                    </div>
                    <div class="box-btn-toggle">
                        <button type="submit" style="display:none;" class="btn-search transit btnSubmit">Send</button>
                        <a href="#" class="btn-search transit btnSubmit">SEND</a>
                    </div>
     			</form>
    	</div>

        <div class="content-tab1-main">

        <!-- Project Details -->
		<div class="box-text-main">
			<p class="title-text">Detail</p>
			<div class="text cf">
                <p><span>Property Type</span> : <a href="" target="_blank"><?php echo $params['item']['property_type']['name'];?></a></p>
				<p><span>Reference ID</span> : <?php echo $params['item']['reference_id'];?></p>
				<p><span>Size</span> : <?php echo $params['item']['size']." ".$params['item']['size_unit']['name'];?></p>
				<p><span>Beds</span> : <?php echo $params['item']['bedrooms'];?></p>
				<p><span>Baths</span> : <?php echo $params['item']['bathrooms'];?></p>
			</div>
			<!-- <p class="bor"><span>ทำเล</span> : <a href="" target="_blank">ประชาชื่น, นนทบุรี</a></p> -->
			<!-- <p class="title-text">สิ่งอำนวยความสะดวก</p>
			<div class="text2 cf">
          		<p>Swimming Pool</p>
                <p>Security</p>
           		<p>Garden</p>
            	<p>Fitness</p>
           	</div> -->
			<!-- Facilities End -->
		</div>
	</div>
    <div class="box-price-main">
                <!-- Best Deal -->
                <div class="box-picture cf">
                    <!-- <span class="ribbon best-buy"></span> -->
                </div>
                <div class="box-price cf">
                <div class="box-left">
                    <p class="price"><?php echo $params['item']['requirement_id'] == 1? 'Sell': 'Rent';?> price</p>
                    <p class="num"><?php echo number_format($params['item']['requirement_id'] == 1? $params['item']['sell_price']: $params['item']['rent_price'], 0);?> Bath</p>
                </div>
                <div class="box-cart">
                    <!-- <a class="btn-cart" href="">สนใจยูนิตนี้<img src="../public/images/shopping_cart.png" alt="images"></a> -->
                </div>
                </div>
                <!-- Best Deal End -->
		</div>
	</div><!--container-->

 <?php $this->import("/layout/footer"); ?>
