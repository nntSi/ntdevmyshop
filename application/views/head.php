<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<title>MY SHOP</title>
	<link rel="icon" type="image/x-icon" href="<?= base_url() ?>/img/favicon/favicon.ico">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;400&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;200;300;400;500&display=swap" rel="stylesheet">
	<!-- Quuill -->
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<style type="text/css">
		.statusAPHover:hover{
			overflow: hidden;
			background-color: #D3D3D3;
			color: #fff;
		}
		.sarabun{
			font-family: 'Sarabun', sans-serif;
		}
		.card:hover {
			border-style: solid;
			box-shadow: 0px 2px 5px #808080;
		}
		.lifont{
			font-family: 'Kanit', sans-serif;
		}
		input[type=text]:focus {
			background-color: #fff;
		}

		.h1Login {
			font-size: 50px;
			font-family: 'Kanit', sans-serif;
		}

		.addimage {
			text-decoration: none;
		}

		.addimage:hover {
			text-decoration: underline;
		}

		table {
			background-color: #fff;
			border-radius: 10px;
		}

		p {
			font-family: 'Sarabun', sans-serif;
			color: #303030;
			font-weight: 400;
		}

		span {
			font-family: 'Ubuntu', sans-serif;
		}

		a {
			font-family: 'Ubuntu', sans-serif;
		}

		.li-hover:hover {
			border-radius: 4px;
			background-color: #F0F0F0;
		}

		.hide {
			display: none;
		}

		.sidebar a {
			font-family: 'Ubuntu', sans-serif;
			display: block;
			color: #fff;
			text-decoration: none;
		}

		.sidebar a.active {
			color: #E0E0E0;
		}

		.sidebar a:hover:not(.active) {
			color: #E0E0E0;
		}

		body {
			background-color: #F5F5F5;
		}

		.dotborder {
			border-radius: 5px;
			border: none;
			border: 2px dotted #c8c8c8;
			background-color: #F5F5F5;
		}

		.secondtext {
			color: #B0B0B0;
		}

		.secondtextfirst {
			color: #808080;
			font-size: 12px;
		}

		#images {
			width: 90%;
			position: relative;
			margin: auto;
		}

		.fb {
			font-family: 'Sarabun', sans-serif;
			color: #303030;
			font-weight: 400;
		}

		.inputfnt {
			font-family: 'Sarabun', sans-serif;
			color: #303030;
			font-weight: 400;
		}

		input::placeholder {
			color: #D3D3D3;
		}

		.hft {
			font-family: 'kanit', sans-serif;
		}

		h4, h1, button, h5, td, tr {
			font-family: 'kanit', sans-serif;
		}

		.btntanpri {
			width: 100px;
		}

		.btntanpri p {
			font-family: 'kanit', sans-serif;
			color: #fff;
			margin-bottom: 0px;
		}

		.displaynone {
			display: none;
		}
	</style>
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>