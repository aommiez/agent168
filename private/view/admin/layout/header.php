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

    <!-- Material Css -->
    <link href="<?php echo Helper\URL::absolute("/public/css/roboto.min.css")?>" rel="stylesheet">
    <link href="<?php echo Helper\URL::absolute("/public/css/material.min.css")?>" rel="stylesheet">
    <link href="<?php echo Helper\URL::absolute("/public/css/ripples.min.css")?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo Helper\URL::absolute("/public/js/jquery.min.js")?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo Helper\URL::absolute("/public/js/bootstrap.min.js")?>"></script>
    <!-- Sweet Alert -->
    <script src="<?php echo Helper\URL::absolute("/public/js/sweet-alert.min.js")?>"></script>
    <link href="<?php echo Helper\URL::absolute("/public/css/sweet-alert.css")?>" rel="stylesheet">
    <link href="<?php echo Helper\URL::absolute("/public/css/ie9.css")?>" rel="stylesheet">
    <!-- font awesome -->
    <link href="<?php echo Helper\URL::absolute("/public/css/font-awesome.min.css")?>" rel="stylesheet">
    <!-- Material jQuery -->
    <script src="<?php echo Helper\URL::absolute("/public/js/ripples.min.js")?>"></script>
    <script src="<?php echo Helper\URL::absolute("/public/js/material.min.js")?>"></script>


</head>
<body>
