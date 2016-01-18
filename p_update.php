<?php 
	require_once "connection.php";
	session_start();
	ob_start();

	require_once "base.php";
 	$user = $crud->getUserData($_SESSION['id']);

	if ($_SESSION) {
		if ($_POST) {
			$updated = $crud->userUpdate($_SESSION['id'],$_POST['username'],$_POST['email']);
			if ($updated) {
				header("Refresh:2, url=profile.php");
				echo "<p>Güncelleme Başarılı yönlendiriliyorsunuz...</p>";
			}else{
				header("Refresh:2, url=p_update.php");
				echo "<p>Güncelleme gerçekleştirilemedi. Kullanıcı adı veya email daha önce kullanımda olabilir.</p>";
			}
		}else{
?>
		<div class="gobek2">
			<p>Profil Bilgilerini Güncelle</p>
		<form action="" method="post">
			<div>Kullanıcı Adı:</div>
			<input type="text" name="username" value="<?php echo $user[0]['username'] ?>"></input>
			<br>
			<div>Eposta:</div>
			<input type="text" name="email" value="<?php echo $user[0]['email'] ?>">
			<br><br>
			<button type="submit" style="font-size:16px">Güncelle</button>
		</form>
	</div>
<?php 
		}
	}else{
		header("Location:login.php");
	}

 ?>

 