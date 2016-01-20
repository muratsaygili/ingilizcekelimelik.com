<?php 
	require_once "connection.php";
	ob_start();
	session_start();
	require_once "base.php";
	$boxes = $crud->getBox($_SESSION['id']);
	if ($_SESSION) {

		if ($_POST) {
			$vocabulary = $crud->createVocabulary($_POST['v_name'],$_POST['v_trans'],$_POST['v_example'],$_SESSION['id'],$_POST['b_id']);
			if ($vocabulary) {
				header("Refresh:2, url=box.php?b_id=".$_POST['b_id']);
				echo "<p>Kelime Oluşturuldu. Yönlendiriliyorsunuz...</p>";
			}else{
				header("Refresh:2, url=vocabulary.php");
				echo "<p>Kelime Oluşturulamadı. Yönlendiriliyorsunuz...</p>";
			}
		}else{
			if ($boxes) {
?>
	<div class="gobek">
			<form action="" method="post">
				<p>Bir Box Seçin:</p>
				<select name="b_id">
				  <?php foreach ($boxes as $box) {
?>
					<option value="<?php echo $box['b_id'] ?>"><?php echo $box['b_name'] ?></option>
<?php
				  } ?>
				</select>
				<p>İngilizce Kelimeyi Giriniz:</p>
				<input type="text" name="v_name">
				<p>Türkçe Karşılığını Giriniz:</p>
				<input type="text" name="v_trans">
				<p>Örnek cümleyi giriniz:</p>
				<textarea rows="10" cols="50" name="v_example" maxlength="100"></textarea>
				<br><br>
				<div class=""><button type="submit" style="font-size: 16px;">Kelime Oluştur</button></div>
			</form>
	</div>
<?php
			}else{
?>
		<div class="gobek"><p>Lütfen önce bir box oluşturun. <a class="a-blue" href="create_box.php">Box oluşturmak için tıklayın.</a></p></div>
<?php
			}
		}




	}else{
		header("Location:login.php");
	}	
?>