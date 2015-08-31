<?php $this->import("/layout/headProperty"); ?>

<link rel="stylesheet" type="text/css" href="../public/css/detail.css">

<!-- Important Owl stylesheet -->
<link rel="stylesheet" href="../public/css/owl.carousel.css">
 
<!-- Default Theme -->
<link rel="stylesheet" href="../public/css/owl.theme.css">
 
<!--  jQuery 1.9.1  -->
<script src="../public/js/jquery-1.9.1.min.js"></script>
 
<!-- Include js plugin -->
<script src="../public/js/owl.carousel.js"></script>

<script>
$(document).ready(function() {
 
  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
 
  sync1.owlCarousel({
    singleItem : true,
    slideSpeed : 1000,
    navigation: true,
    pagination:false,
    afterAction : syncPosition,
    responsiveRefreshRate : 200,
  });
 
  sync2.owlCarousel({
    items : 15,
    itemsDesktop      : [1199,10],
    itemsDesktopSmall     : [979,10],
    itemsTablet       : [768,8],
    itemsMobile       : [479,4],
    pagination:false,
    responsiveRefreshRate : 100,
    afterInit : function(el){
      el.find(".owl-item").eq(0).addClass("synced");
    }
  });
 
  function syncPosition(el){
    var current = this.currentItem;
    $("#sync2")
      .find(".owl-item")
      .removeClass("synced")
      .eq(current)
      .addClass("synced")
    if($("#sync2").data("owlCarousel") !== undefined){
      center(current)
    }
  }
 
  $("#sync2").on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).data("owlItem");
    sync1.trigger("owl.goTo",number);
  });
 
  function center(number){
    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
    var num = number;
    var found = false;
    for(var i in sync2visible){
      if(num === sync2visible[i]){
        var found = true;
      }
    }
 
    if(found===false){
      if(num>sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", num - sync2visible.length+2)
      }else{
        if(num - 1 === -1){
          num = 0;
        }
        sync2.trigger("owl.goTo", num);
      }
    } else if(num === sync2visible[sync2visible.length-1]){
      sync2.trigger("owl.goTo", sync2visible[1])
    } else if(num === sync2visible[0]){
      sync2.trigger("owl.goTo", num-1)
    }
    
  }
 
});
</script>


		<div class="container">
        	<div class="content">

        	<div class="slide">
				<div id="sync1" class="owl-carousel">
  					<div class="item"><img src="../public/images/home1.jpg"></div>
              		<div class="item"><img src="../public/images/home2.jpg"></div>
              		<div class="item"><img src="../public/images/home3.jpg"></div>
              		<div class="item"><img src="../public/images/home1.jpg"></div>
              		<div class="item"><img src="../public/images/home2.jpg"></div>
              		<div class="item"><img src="../public/images/home3.jpg"></div>
				</div>
				<div id="sync2" class="owl-carousel">
  					<div class="item"><img src="../public/images/home1.jpg"></div>
              		<div class="item"><img src="../public/images/home2.jpg"></div>
              		<div class="item"><img src="../public/images/home3.jpg"></div>
              		<div class="item"><img src="../public/images/home1.jpg"></div>
              		<div class="item"><img src="../public/images/home2.jpg"></div>
              		<div class="item"><img src="../public/images/home3.jpg"></div>
				</div>
					<p class="remarkimg">* ภาพที่แสดงอาจไม่เหมือนสภาพจริง และห้อง/ บ้านที่จำหน่าย ไม่รวมการตกแต่งใดๆ ทั้งสิ้น ทั้งนี้เป็นไปตามเงื่อนไขบริษัทฯ</p>
            </div><!--slide-->
            <div class="box-right">
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
        </div><!--content-->
        <div class="content-tab1-main">
			<div class="box-price-main">
        	<!-- Best Deal -->
			<div class="box-picture cf">
        		<span class="ribbon best-buy"></span>
    		</div>
    		<div class="box-price cf">
       		<div class="box-left">
            	<p class="price">
           		ราคาขาย :<span>13,370,000</span> บาท<br>   
            	</p>
        	</div>
        	<div class="box-cart">
        		<a class="btn-cart" href="">สนใจยูนิตนี้<img src="../public/images/icon-cart2.svg" alt="icon-cart" width="48" height="33"></a>
        	</div>
    		</div>
			<!-- Best Deal End -->            
			</div>
        
        <!-- Project Details -->
		<div class="box-text-main">
			<p class="title-text">ข้อมูลอสังหาฯ</p>
			<div class="text cf">
                <p><span>ประเภทอสังหาฯ</span> : <a href="" target="_blank">บ้านเดี่ยว</a></p>
				<p><span>รหัสอสังหาฯ</span> : H26101030</p>
				<p><span>ขนาด</span> : 74 ตร.ว.</p>
				<p><span>ห้องนอน</span> : 3</p>
				<p><span>ห้องน้ำ</span> : 4</p>
			</div>
			<p><span>ทำเล</span> : <a href="" target="_blank">ประชาชื่น, นนทบุรี</a></p>
			<p class="title-text">สิ่งอำนวยความสะดวก</p>
			<div class="text2 cf">
          		<p>Swimming Pool</p>
                <p>Security</p>
           		<p>Garden</p>
            	<p>Fitness</p>
           	</div>
			<!-- Facilities End -->
		</div>
	</div>
	</div><!--container-->
	
 <?php $this->import("/layout/footer"); ?>