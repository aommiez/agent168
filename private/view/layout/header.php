<?php
use Main\Helper;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        <?php
            echo \Main\AppConfig::get("application.title");
        ?>
    </title>

    <!-- Bootstrap -->
    <link href="<?php echo Helper\URL::absolute("/public/css/bootstrap.min.css")?>" rel="stylesheet">
    <link href="<?php echo Helper\URL::absolute("/public/css/style.css")?>" rel="stylesheet">
    <link href="<?php echo Helper\URL::absolute("/public/css/footerstyle.css")?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo \Main\Helper\URL::absolute("/public/js/jquery.min.js")?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo \Main\Helper\URL::absolute("/public/js/bootstrap.min.js")?>"></script>
</head>
<body>
<div class="contact-bar">
    <div class="container">
        <ul>
            <li>
                <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                02-222-2222
            </li>
            <li style="margin-right: 130px">
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                tufftex2011@gmail.com
            </li>
            <li style="margin-right: 0px"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login" style="padding: 0px">LOGIN</button></li>
            <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register" style="padding: 0px">REGISTER</button></li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Facebook.png")?>" /> </li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Twitter.png")?>" style="margin-left: -10px"/></li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Google+.png")?>" style="margin-left: -10px"/></li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Rss.png")?>" style="margin-left: -10px"/></li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Pinterest.png")?>" style="margin-left: -10px"/></li>
        </ul>
    </div>
</div>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a href="/agent168/home"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Logo.png")?>" /></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>BUY</li>
                <li>RENT</li>
                <li>PROPERTY SEARCH</li>
                <li>LIST YOUR PROPERTY</li>
                <li>EDITORIAL</li>
                <li>CONTACT US</li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal fade" id="login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <div class="modal-body">
                <div class="maillogin">
                    E-Mail : <input type="text" class="form-control">
                </div><br>
                <div class="passlogin" style="margin-left: 44.5px">
                    Password : <input type="password" class="form-control">
                </div><br>
                <img src="<?php echo \Main\Helper\URL::absolute("/public/images/ZW4QC.png")?>" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="register">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <div class="modal-body">
                <div class="regis">
                        คำนำหน้าชื่อ : <select class="form-control" style="margin-left: 65px">
                            <option>นาย / Mr.</option>
                            <option>นาง / Mrs.</option>
                            <option>นางสาว / Miss</option>
                        </select>
                    <div class="nameregis">ชื่อ / Name : <input type="text" class="form-control" style="margin-left: 70px"></div>
                    <div class="nameregis">นามสกุล / Lastname : <input type="text" class="form-control"></div>
                    <div class="telinput">เบอร์โทรศัพท์ / Tel. : <input type="text" class="form-control" style="margin-left: 25px"></div>
                    <div class="mailregis"">อีเมล / E-Mail : <input type="text" class="form-control" style="margin-left: 55px"></div>
                <div class="passregis">รหัสผ่าน / Password : <input type="password" class="form-control" style="margin-left: 12px"></div>
                <div class="passconfirm">Confirm Password : <input type="password" class="form-control" style="margin-left: 20px"></div>
                <div class="coderegis">รหัสยืนยัน / Code :<input type="text" class="form-control" style="margin-left: 33px"></div>
            </div>
            <div class="checkbox">
                <label><input type="checkbox">รับข่าวสาร และโปรโมชั่นต่างๆ จาก Website</label>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Register</button>
                </div>
            </div>
        </div>
    </div>
</div>