<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>One-column fixed-width responsive layout</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Description" lang="en" content="ADD SITE DESCRIPTION">
		<meta name="author" content="ADD AUTHOR INFORMATION">
		<meta name="robots" content="index, follow">

		<!-- icons -->
		<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
		<link rel="shortcut icon" href="favicon.ico">

		<!-- Override CSS file - add your own CSS rules -->
		<link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()."public/"?>bootstrap/css/bootstrap.css" media="screen">

	</head>
	<body>
		<div class="container">
			<div class="header">
				<h1 class="header-heading">Toko Kami</h1>
			</div>
			<div class="nav-bar">
				<ul class="nav">
                    <?php
                    echo "<li>".anchor("item/add","Tambah Item")."</li>";
                    echo "<li>".anchor("item/look","Lihat Item")."<li>";
                    ?>
				</ul>
			</div>
