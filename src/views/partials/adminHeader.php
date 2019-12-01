<?php
/** @var \StanimiraNikolova\Core\ViewInterface $this */ ;
/** @var  \StanimiraNikolova\Models\View\Home\HomeViewModel $model */
$uriJunk = isset($uriJunk) ? $uriJunk : '';
$bodyClass = isset($bodyClass) ? $bodyClass : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Stanimira Nikolova</title>
    <link rel="stylesheet" href="<?=$uriJunk?>node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$uriJunk?>node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$uriJunk?>src/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=$uriJunk?>src/css/_all-skins.min.css">
    <link rel="stylesheet" href="<?=$uriJunk?>src/css/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?=$uriJunk?>node_modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?=$uriJunk?>src/css/login-form.css">
    <link rel="stylesheet" href="<?=$uriJunk?>src/js/jquery-ui-1.12.1.custom/jquery-ui.min.css">
    <script src="<?=$uriJunk?>node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?=$uriJunk?>src/js/jquery-ui.min.js"></script>
    <script src="<?=$uriJunk?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=$uriJunk?>node_modules/raphael/raphael.min.js"></script>
    <script src="<?=$uriJunk?>src/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=$uriJunk?>src/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?=$uriJunk?>node_modules/moment/min/moment.min.js"></script>
    <script src="<?=$uriJunk?>src/js/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="<?=$uriJunk?>node_modules/fastclick/lib/fastclick.js"></script>
    <script src="<?=$uriJunk?>src/js/adminlte.min.js"></script>
    <script src="<?=$uriJunk?>node_modules/select2/dist/js/select2.full.min.js"></script>
</head>
<body class="<?=$bodyClass?>">
<div class="wrapper">

