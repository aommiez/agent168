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
            <li style="margin-right: 0px"><button type="button" class="btn btn-primary" style="padding: 0px">LOGIN</button></li>
            <li><button type="button" class="btn btn-primary" style="padding: 0px">REGISTER</button></li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Facebook.png")?>" /> </li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Twitter.png")?>" style="margin-left: -10px"/></li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Google+.png")?>" style="margin-left: -10px"/></li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Rss.png")?>" style="margin-left: -10px"/></li>
            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Pinterest.png")?>" style="margin-left: -10px"/></li>
        </ul>
    </div>
</div>
