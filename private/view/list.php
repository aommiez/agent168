<?php
$this->import('/layout/headProperty');
?>

<style>

.item-property{
	padding:40px 0 0 0;
}
   
.item-list-type-room {
    position: relative;
    margin:0 20px 20px 0;
    border: 1px solid #1957a4;
    border-radius: 4px;;
    width: 350px;
    float: left;
	padding:10px;
}

.item-list-type-room {
    display: block;
    position: relative;
}

.img-item a img{
	width:100%;
	height:100%;
}

.item-name{
	margin:20px 0 10px 0;
	font-size: 18px;
    color: #1957a4;
    display: inline-block;
}

.button-detail{
	margin:15px 0;
}

.item-list ul{
	padding:0;
}

.text-red{
	color:red;
	margin:10px 0;
}

a.item-type-name:hover,
.item-name a:hover{
	text-decoration:none;
}

.item-price button{
	padding: 7px 30px;
}

.item-price span{
	float: right;
    margin-top: 8px;
}

.hr{
	margin:10px 0;
}

.item-list-type-room{
	color: #1957a4;
}

.page-next{
	text-align:center;
}
</style>

<div class="bgList">
    <div class="container">
    	<div class="item-property">
        <!-- <div class="labelText divTop">
          <a href="<?php echo \Main\Helper\URL::absolute("/condo")?>">List</a>
          &nbsp;&nbsp;/&nbsp;&nbsp;
          <a href="<?php echo \Main\Helper\URL::absolute("/map")?>">Map</a>
          &nbsp;&nbsp;/&nbsp;&nbsp;
          <a href="<?php echo \Main\Helper\URL::absolute("/gallery")?>">Gallery</a>
          &nbsp;&nbsp;/&nbsp;&nbsp;
          <a href="<?php echo \Main\Helper\URL::absolute("/table")?>">Table</a>
        </div> -->
        <!-- <div class="labelText"><hr></div> -->
        <?php foreach($params['items'] as $item){?>
        
        <div class="col-md-4">
        	<div class="item-list">
            	<ul class="item-list-box">
                	<li class="item-list-type-room">
                        <div class="img-item"><a href=""><img src="<?php echo \Main\Helper\URL::absolute("/public/images/condo.jpg")?>" alt="condo"></a></div>
                        <div class="text-item">
                            <p class="item-name"><a href="">RHYTHM Sukhumvit 36-38 Bangkok</a></p>
                            <p class="item-code">รหัส AC30121509</p>
                            <p class="item-type">ประเภทอสังหาฯ : <a href="" class="item-type-name">คอนโด</a></p>
                        </div>
                        <div class="item-room">
                            <span class="item-room-list">1 ห้องนอน</span> /
                            <span class="item-bath-list">1 ห้องน้ำ</span>
                        </div>
                       <div class="item-price text-red">
                        	<button type="button" class="btn btn-primary">Detail</button>
                            <span>ขาย : 596,805 บาท เช่า : 28,000 บาท</span>
                        </div>  
                	</li>
                </ul>
            
            </div>
         </div>
        <?php }?>
        <div class="page-next">
            <nav>
              <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
        </div>
		</div>
    </div><br><br>
</div>
<?php
$this->import('/layout/footer');
?>

