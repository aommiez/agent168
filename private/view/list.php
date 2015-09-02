<?php
$this->import('/layout/headProperty');
?>

<style>
    .bgList{
        background-image: url(<?php echo \Main\Helper\URL::absolute("/public/images/bglist.jpg")?>);
    }

    .labelText, .labelText2{
        font-family: 'thaisans', 'Arial', sans-serif;
        color: #1957a4;
    }

    .labelText{
        font-size: 14px;
        margin-left: 100px;
    }
    .labelText2{
        font-size: 18px;
        color: #1957a4;
        display: inline-block;
    }

    .divTop{
        margin-top: 20px;
    }

    hr{
        border: 1px solid #1957a4;
        width: 100%;
        margin-top: 20px;
        float: left;
        margin-bottom: 0px;
    }

    .list{
        background-color: #FFFFFF;
        border: 2px solid #1957a4;
        margin-left: 100px;
        width: 1043px;
        margin-top: 20px;
    }

    .formRight{
        margin-top: 30px;
    }

    .divImg{
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .h{
        margin-bottom: 20px;
        width: 500px;
    }

    .textRed{
        color: #FF0000;
        font-size: 14px;
    }

    .detail-text {
          margin-top: 44px;
    }

</style>

<div class="bgList">
    <div class="container">
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
        <div class="col-md-12 list">
            <div class="col-md-2">
                <div class="divImg"><img src="<?php echo $item['picture']['url'];?>" width="222" height="122" style="object-fit: cover;"></div>
            </div>
            <div class="col-md-8">
                <div class="labelText2 formRight">
                    <div class="labelText labelText2">
                      <a href="<?php echo \Main\Helper\URL::absolute("/property/{$item['id']}")?>">
                        <?php echo $item['property_type']['name'];?>
                        <?php echo $item['requirement']['name'];?>
                        <?php echo $item['project']['name'];?>
                        <?php echo $item['road'];?>
                        Bangkok
                      </a>
                    </div>
                    <div class="labelText"><hr class="h"></div>
                    <div class="labelText detail-text">
                      <?php
                      $detail = [];
                      if(!empty($item['bedrooms']) && $item['bedrooms'] != 0) $detail[] = $item['bedrooms']." ห้องนอน";
                      if(!empty($item['bathrooms']) && $item['bathrooms'] != 0) $detail[] = $item['bathrooms']." ห้องน้ำ";
                      if(!empty($item['reference_id'])) $detail[] = "รหัส ".$item['reference_id'];
                      echo implode(" / ", $detail);
                      ?>
                      <!-- 4 ห้องน้ำ /
                      38 ตร.ม /
                      รหัส C11091401
                      คอนโด /
                      ทำเล : สาทร, กรุงเทพมหานคร -->
                    </div>
                    <div class="labelText textRed">
                      <?php if($item['requirement_id'] == 1 || $item['requirement_id'] == 3) {
                        echo "ขาย : ".number_format($item['sell_price'], 0)." บาท";
                       } ?>
                      <?php if($item['requirement_id'] == 2 || $item['requirement_id'] == 3) {
                        echo "เช่า : ".number_format($item['rent_price'], 0)." บาท";
                      } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>

    </div><br><br>
</div>
<?php
$this->import('/layout/footer');
?>
