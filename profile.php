<?php
	require_once "connection.php";
	ob_start();
	session_start();
	#echo $_SESSION['id'];
	
	if ($_SESSION) {
		
		require_once "base.php";
		$user = $crud->getUserData($_SESSION['id']);
		$boxes = $crud->getBox($_SESSION['id']);
		if ($_GET['d_id']) {
			$check = $crud->deleteBox($_GET['d_id'],$_SESSION['id']);
			if ($check) {
				header("Refresh:1, url=profile.php");
				echo "<p>Box Başarılı Bir Şekilde Silindi.</p>";
			}
			else{
				header("Refresh:1, url=profile.php");
				echo "<p>Box Silinirken Bir Hata Oluştu. Tekrar Deneyiniz.</p>";
			}
		}
?>
	
	<div class="sol">
		<div class="center">Profil</div>
		<p>Kullanıcı Adı: <?php echo $user[0]["username"]; ?></p>
		<p>Kullanıcı Eposta: <?php echo $user[0]["email"]; ?></p>
		<div class="center"><a href="p_update.php"><button style="font-size: 16px;">Bilgileri Güncelle</button></a></div>
	</div>
	<div class="gobek">
		<div class=""><a href="create_box.php"><button style="font-size: 16px;">Box Oluştur</button></a></div>
		<br>
		<div class=""><a href="vocabulary.php"><button style="font-size: 16px;">Kelime Oluştur</button></a></div>
	</div>
	<div class="gobek3">
		<b>Box Listesi</b><br>
<?php 
	if ($boxes) {
		foreach ($boxes as $box) {
?>
		<div class="">
			>> <a class="a-blue" href="box.php?b_id=<?php echo $box['b_id'];?>"><?php echo $box['b_name']; ?></a>
			<div class="right3">
				<a href="profile.php?d_id=<?php echo $box['b_id']; ?>">Sil</a>
			</div>
		</div>
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
