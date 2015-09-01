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
    <script src="<?php echo \Main\Helper\URL::absolute("/public/js/skrollr.js")?>"></script>
    <script src="<?php echo \Main\Helper\URL::absolute("/public/js/jquery.nicescroll.min.js")?>"></script>
</head>
<body>
<div class="contact-bar">
    <div class="container">
        <ul>
            <li>
                <span class="glyphicon glyphicon-earphone" id="icon" aria-hidden="true"></span>
                02-184-6914
            </li>
            <li style="margin-right: 130px">
                <span class="glyphicon glyphicon-envelope" id="icon" aria-hidden="true"></span>
                info@agent168th.com
            </li>
            <li style="margin-right: 0px"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login" style="padding: 0px">LOGIN</button></li>
            <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register" style="padding: 0px">REGISTER</button></li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Facebook.png")?>" /> </li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Twitter.png")?>" /></li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Google+.png")?>" /></li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Rss.png")?>" /></li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Pinterest.png")?>" /></li>
        </ul>
    </div>
</div>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a href="<?php echo \Main\Helper\URL::absolute("/home")?>"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Logo.png")?>" /></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown" id="buy">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BUY</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo \Main\Helper\URL::absolute("/list?requirement_id=1&property_type_id=1")?>">CONDOMINIUM</a></li>
                        <li><a href="<?php echo \Main\Helper\URL::absolute("/list?requirement_id=1&property_type_id=2")?>">SINGLE DETACHED HOUSE</a></li>
                        <li><a href="<?php echo \Main\Helper\URL::absolute("/list?requirement_id=1&property_type_id=10")?>">TOWNHOME</a></li>
                        <li><a href="<?php echo \Main\Helper\URL::absolute("/list?requirement_id=1&property_type_id=7")?>">HOME OFFICE</a></li>
                    </ul>
                </li>
                <li class="dropdown" id="rent">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">RENT</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo \Main\Helper\URL::absolute("/list?requirement_id=2&property_type_id=1")?>">CONDOMINIUM</a></li>
                        <li><a href="<?php echo \Main\Helper\URL::absolute("/list?requirement_id=2&property_type_id=2")?>">SINGLE DETACHED HOUSE</a></li>
                        <li><a href="<?php echo \Main\Helper\URL::absolute("/list?requirement_id=2&property_type_id=10")?>">TOWNHOME</a></li>
                        <li><a href="<?php echo \Main\Helper\URL::absolute("/list?requirement_id=2&property_type_id=7")?>">HOME OFFICE</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo \Main\Helper\URL::absolute("/list")?>">PROPERTY SEARCH</a></li>
                <li><a href="<?php echo \Main\Helper\URL::absolute("/listprops")?>">LIST YOUR PROPERTY</a></li>
                <li><a href="<?php echo \Main\Helper\URL::absolute("/campaign")?>">EDITORIAL</a></li>
                <li><a href="<?php echo \Main\Helper\URL::absolute("/contact")?>">CONTACT US</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal fade" id="login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="maillogin">
                    <form class="form-horizontal">
                        <div class="form-group" id="id">
                            <label class="control-label col-lg-3" for="">E-Mail :</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control">
                            </div>

                        </div>
                    </form>
                </div>
                <div class="passlogin">
                    <form class="form-horizontal">
                        <div class="form-group" id="id">
                            <label class="control-label col-lg-3" for="">Password :</label>
                            <div class="col-lg-7">
                                <input type="password" class="form-control">
                            </div>

                        </div>
                    </form>
                </div>
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
            <div class="modal-body">
                <div class="regis">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-lg-4" for="">คำนำหน้าชื่อ : </label>
                            <div class="col-lg-4">
                                <select class="form-control">
                                    <option>นาย / Mr.</option>
                                    <option>นาง / Mrs.</option>
                                    <option>นางสาว / Miss</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-lg-4" for="">ชื่อ / Name : </label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-lg-4" for="">นามสกุล / Lastname : </label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-lg-4" for="">เบอร์โทรศัพท์ / Tel. : </label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-lg-4" for="">อีเมล / E-Mail : </label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-lg-4" for="">รหัสผ่าน / Password : </label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-lg-4" for="">Confirm Password : </label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-lg-4" for="">รหัสยืนยัน / Code :</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
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
