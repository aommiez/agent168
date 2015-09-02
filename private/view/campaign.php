<?php
$this->import('/layout/header');
?>

<style>

    .labelText, .labelText2, .underText{
        font-family: 'Arial', sans-serif;
        margin-top: 20px;
        color: #1957a4;
        margin-left: 100px;
    }
   .labelText{
       font-size: 14px;
   }

   .labelText2{
       font-size: 20px;
   }

   .labelImg {
       text-align: center;
       margin-top: 30px;
   }

    .underText{
        font-size: 18px;
    }

</style>

<hr style="border: 1px solid #000000; width: 100%">

<div class="container">
    <!-- <div class="labelText"><a href="#">Home</a>&nbsp;|&nbsp;<a href="#">Campaigns</a> </div> -->
    <div class="div labelImg">
        <!-- <img src="<?php echo \Main\Helper\URL::absolute("/public/images/town.jpg")?>" style="width: 940px"> -->
    </div>
    <!-- <div class="div labelText2">Campaigns</div> -->
    <div class="div labelText">
      <a href="<?php echo \Main\Helper\URL::absolute("/campaign/1")?>">
        Project review
        <img src="<?php echo \Main\Helper\URL::absolute("/public/images/editorial/lifea.jpg")?>" width="100%" height="200" style="object-fit: cover;" />
      </a>
    </div>
    <div class="underText">..............................................
      ..............................................................................................................................</div>
    <div class="div labelText">
      <a href="<?php echo \Main\Helper\URL::absolute("/campaign/2")?>">
        Property news
        <img src="<?php echo \Main\Helper\URL::absolute("/public/images/editorial/pnews/bkk.jpg")?>" width="100%" height="200" style="object-fit: cover;" />
      </a>
    </div>
    <div class="underText">............................................................................................................................................................................</div>
    <div class="div labelText">
      <a href="<?php echo \Main\Helper\URL::absolute("/campaign/3")?>">
        Tips
        <img src="<?php echo \Main\Helper\URL::absolute("/public/images/editorial/tips/01.jpg")?>" width="100%" height="200" style="object-fit: cover;" />
      </a>
    </div>
</div>
<br><br><br>
<?php
$this->import('/layout/footer');
?>
