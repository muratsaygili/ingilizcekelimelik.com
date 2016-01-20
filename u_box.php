<?php 
	require_once "connection.php";
	ob_start();
	session_start();
	require_once "base.php";
	
	$b_name = $crud->findBoxName($_GET['u_id']);
	if ($_SESSION) {
		if ($_POST) {
			$updateBox = $crud->updateBoxName($_POST['box_name'],$_SESSION['id'],$b_name[0]['b_name']);
			if ($updateBox) {
				header("Refresh:2, url=profile.php");
				echo "<p>Box İsmi Güncellendi. Yönlendiriliyorsunuz...</p>";
			}else{
				header("Refresh:2, url=profile.php");
				echo "<p>Box ismi güncellenirken bir hata meydana geldi. Yönlendiriliyorsunuz...</p>";
			}


		}else{
			#post olmadığı zaman oluşacak durum.
			
?>

	<div class="gobek2">
		<form action="" method="post">
			<p>Box Adı: </p>
			<input type="text" name="box_name" value="<?php echo $b_name[0]['b_name'];?>">
			<br><br>
			<button type="submit" style="font-size:16px;">Güncelle</button>
		</form>
	</div>
<?php
		}
	}else{

		header("Location: login.php");
	}
 ?>
