<?php
$this->import('/layout/headProperty');
?>

<style>

    .bodygal{

    }

    .bodygal-a{


    }

    .bodygal-a ul li{
        list-style-type: none;
        text-align: center;
    }
    .bodygal-b{


    }

    .bodygal-b ul li{
        list-style-type: none;
        text-align: center;

    }

    .bodygal-c{


    }

    .bodygal-c ul li{
        list-style-type: none;
        text-align: center;

    }
    .bodygal-d{


    }

    .bodygal-d ul li{
        list-style-type: none;
        text-align: center;

    }

    .bodygal ul li img{
        width: 200px;
        border: 5px solid  #1957a4;
    }

    .menu{
        margin-left: 10px;

    }

    .menu ul li{
        list-style-type: none;
        display: inline;
        font-size: 16px;
        font-family: 'Roboto', 'Arial', sans-serif;

    }

    .menu ul li a:link {
        color: #bbbbbb;
        text-decoration: none;}
    .menu ul li a:visited {
        color: #245ea7;
        text-decoration: none;
    }
    .menu ul li a:hover {
        color:#C355A6;
        text-decoration: none;
    }
    .menu ul li a:active {
        color: #1957a4;
        text-decoration: none;
        background-color: #FF704D;
    }

    .line{
        background-image: url(<?php echo \Main\Helper\URL::absolute("/public/images/line.jpg")?>);
        width: 95%;
        margin-left: 40px;
    }

    .page{
        margin-left: 480px;
    }

    .page ul li{
        list-style-type: none;
        margin-right: 5px;
        display: inline;
    }



</style>
<br><br><br>

<div class="container">
    <br>
    <div class="menu">
        <ul>
            <li><a href="/agent168/list">List</a></li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><span class="divider" style="color: #bbbbbb">/</span></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a href="/agent168/map">Map</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><span class="divider" style="color: #bbbbbb">/</span></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a href="/agent168/gallery">Gallery</a> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><span class="divider" style="color: #bbbbbb">/</span></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a href="/agent168/table">Table</a> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </ul>
            <div class="line row">
                <div class="line col-lg-12">
                </div>
            </div>
    </div>
    <div class="bodygal row">
        <div class="bodygal-a col-lg-3">
            <ul>
                <br>
                <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/picgal.jpg")?>"></li><br><br>
                <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/picgal.jpg")?>"></li><br><br>
                <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/picgal.jpg")?>"></li>
            </ul>

        </div>
        <div class="bodygal-b col-lg-3">
            <ul>
                <br>
                <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/picgal.jpg")?>"></li><br><br>
                <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/picgal.jpg")?>"></li><br><br>
                <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/picgal.jpg")?>"></li>
            </ul>
        </div>
        <div class="bodygal-c col-lg-3">
            <ul>
                <br>
                <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/picgal.jpg")?>"></li><br><br>
                <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/picgal.jpg")?>"></li><br><br>
                <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/picgal.jpg")?>"></li>
            </ul>
        </div>
        <div class="bodygal-d col-lg-3">
            <ul>
                <br>
                <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/picgal.jpg")?>"></li><br><br>
                <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/picgal.jpg")?>"></li><br><br>
                <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/picgal.jpg")?>"></li>
            </ul>
        </div>
    </div>
    <br><br>
    <br><br>
    <div class="page">
        <ul>
            <li><a href="#"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/back.jpg")?>"></a></li>
            <li><a href="#"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/n1.jpg")?>"></a></li>
            <li><a href="#"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/n2.jpg")?>"></a></li>
            <li><a href="#"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/n3.jpg")?>"></a></li>
            <li><a href="#"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/next.jpg")?>"></a></li>
        </ul>
    </div>
</div>
<br><br>
<?php
$this->import('/layout/footer');
?>
