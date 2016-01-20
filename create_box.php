<?php 
	require_once "connection.php";
	ob_start();
	session_start();
	require_once "base.php";


	if ($_SESSION) {
		if ($_POST) {
			
			$newBox = $crud->createBox($_POST['box_name'],$_SESSION['id']);
			if ($newBox) {
				header("Refresh:2, url=profile.php");
				echo "<p>Box Oluşturuldu. Yönlendiriliyorsunuz...</p>";
			}else{
				header("Refresh:2, url=profile.php");
				echo "<p>Box oluşturulurken bir hata meydana geldi. Yönlendiriliyorsunuz...</p>";
			}


		}else{
			#post olmadığı zaman oluşacak durum.
?>
	<div class="gobek2">
		<form action="" method="post">
			<p>Box Adı:</p>
			<input type="text" name="box_name">
			<br><br>
			<button type="submit" style="font-size:16px;">Oluştur</button>
		</form>
	</div>
<?php
		}
	}else{

		header("Location: login.php");
	}
 ?>
