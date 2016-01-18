<?php
	require_once "connection.php";
	ob_start();
	session_start();
	#echo $_SESSION['id'];
	
	if ($_SESSION) {
		
		require_once "base.php";
		$user = $crud->getUserData($_SESSION['id']);
		$boxes = $crud->getBox($_SESSION['id']);
?>
	
	<div class="sol">
		<div class="center">Profil</div>
		<p>Kullanıcı Adı: <?php echo $user[0]["username"]; ?></p>
		<p>Kullanıcı Eposta: <?php echo $user[0]["email"]; ?></p>
		<div class="center"><a href="p_update.php"><button style="font-size: 16px;">Bilgileri Güncelle</button></a></div>
	</div>
	<div class="gobek">
		<div class=""><button style="font-size: 16px;">Box Oluştur</button></div>
		<br>
		<div class=""><button style="font-size: 16px;">Kelime Oluştur</button></div>
	</div>
	<div class="gobek2">
		<b>Box Listesi</b><br>
<?php 
	if ($boxes) {
		foreach ($boxes as $box) {
?>
		<div class="">>> <a class="a-blue" href="box.php?b_id=<?php echo $box['b_id'];?>"><?php echo $box['b_name']; ?></a></div>
<?php
		}
	}else{
?>
	<div><p>Box oluşturmadınız. Kelimeleri gruplayarak kaydetmek için hemen bir box oluşturun.</p></div>
<?php 
	}
?>
	</div>
	



<?php
	}else{
		header("Location:login.php");
	}


?>
