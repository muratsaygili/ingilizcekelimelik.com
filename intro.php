<?php 
	require_once "connection.php";
	ob_start();
	session_start();
	
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="master.css">
	<meta charset="utf-8">
</head>
<body>
	<div class="nav">
		<div>
		<a href="index.php">ingilizce kelimelik</a>
		<a class="right2" href="login.php">Giriş Yap</a>
		<a class="right" href="register.php">Kayıt Ol</a>
		</div>
	</div>

	<div class="gobek">
		<p>İngilizce Kelimelik ile kelime hazineni geliştirmeye başla.</p>
		<p>İngilizce Kelimelik için yapman gereken hemen üye olmak. <a href="register.php" class="a-blue">Hemen Üye Ol.</a></p>
		<p>Daha önce üye oldun mu?<a href="login.php" class="a-blue"> Giriş Yap.</a></p>
		<p>Üye olduktan sonra <b>box</b> adını verdiğimiz kutuları oluşturup kelimeleri bu kutulara kaydetmelisin.</p>
		<p>Son olarak yapman gereken <a href="index.php" class="a-blue">ingilizcekelimelik.com </a> adresine gitmek ve öğrenmeye başlamak.</p>
	</div>