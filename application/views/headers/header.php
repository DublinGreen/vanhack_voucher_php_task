<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en" ng-app>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php echo(meta($meta)); ?>        
        <meta name="robots" content="noindex">
        <title><?php echo($pageTitle); ?></title>

        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="<?php echo(base_url()); ?>favicon.png">

        <!-- Styles -->
        <link href="<?php echo($dashboardAssetsFolder); ?>assets/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo($dashboardAssetsFolder); ?>assets/css/lib/themify-icons.css" rel="stylesheet">
        <link href="<?php echo($dashboardAssetsFolder); ?>assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
        <link href="<?php echo($dashboardAssetsFolder); ?>assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
        <link href="<?php echo($dashboardAssetsFolder); ?>assets/css/lib/weather-icons.css" rel="stylesheet" />
        <link href="<?php echo($dashboardAssetsFolder); ?>assets/css/lib/mmc-chat.css" rel="stylesheet" />
        <link href="<?php echo($dashboardAssetsFolder); ?>assets/css/lib/sidebar.css" rel="stylesheet">
        <link href="<?php echo($dashboardAssetsFolder); ?>assets/css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo($dashboardAssetsFolder); ?>assets/css/lib/unix.css" rel="stylesheet">
        <link href="<?php echo($dashboardAssetsFolder); ?>assets/css/style.css" rel="stylesheet">

        <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo($dashboardAssetsFolder); ?>password_strenght_plugin/strength.css">

        <script src='https://www.google.com/recaptcha/api.js'></script>

    </head>
    <body onload="getReadyApp()">
