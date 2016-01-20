<?php 
	require_once "connection.php";
	ob_start();
	session_start();
	require_once "base.php";
	$boxes = $crud->getBox($_SESSION['id']);
	if ($_SESSION) {
		if ($_GET['b_id']) {
			$vocabulary = $crud->getRandom($_GET['b_id']);

?>

	<div class="gobek5">	
		<ul class="icerik">
	        <div id="resim-don">
	            <li class="resim">
	                <p class="center" style="padding-top:20%;"><?php echo $vocabulary[0]['v_name']; ?></p>
	            </li>
	            <li class="aciklama">
	                <p>Anlamı: <?php echo $vocabulary[0]['v_trans']; ?></p>
	                <p>Örnek Cümle: <?php echo $vocabulary[0]['v_example']; ?></p>
	            </li>
	        </div>

	    </ul>
	</div>
	<div style="padding-top:400px;" class="center">
		<a href="index.php?b_id=<?php echo $_GET['b_id']; ?>" class="a-blue">Başka Bir Kelime Getir</a>
	</div>
	
<?php
		}else{
?>
	<div class="gobek">
		<p>Box Seçin:</p>

		<form action="" method="get">
				<select name="b_id">
				  <?php foreach ($boxes as $box) {
?>
					<option value="<?php echo $box['b_id'] ?>"><?php echo $box['b_name'] ?></option>
<?php
				  } ?>
				</select>
				
				<br><br>
				<div class=""><button type="submit" style="font-size: 16px;">Box Seç</button></div>
			</form>
		
	</div>
<?php
		}
	}else{
		header("Location:intro.php");
	}
?>

