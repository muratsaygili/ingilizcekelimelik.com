<?php 
	require_once "connection.php";
	ob_start();
	session_start();
	require_once "base.php";


	if ($_SESSION) {

?>	
	<br>
	
		<div class="center"><b>Kelime Listesi</b> <p><a href="vocabulary.php" class="a-blue">Yeni Kelime Ekle</a></p></div>
	
<?php
		if ($_GET['d_id'] and $_GET['b_id']) {
			$check = $crud->deleteVoc($_GET['d_id'],$_SESSION['id']);
			if ($check) {
				header("Refresh:2, url=box.php?b_id=".$_GET['b_id']);
				echo "<p>Kelime Silindi. Yönlendiriliyorsunuz...</p>";
			}else{
				header("Refresh:2, url=box.php?b_id=".$_GET['b_id']);
				echo "<p>Kelime Silinmedi.</p>";
			}
		}

		if ($_GET['b_id']) {
			$voc = $crud->getVocInBox($_GET['b_id'],$_SESSION['id']);
?>
<div class="gobek4">
	<table style="width:100%">
  		<tr class="center">
	    	<td><b>Kelime</b></td>
	    	<td><b>Anlamı</b></td>
	    	<td><b>Örnek</b></td>
	    	
  		</tr>
<?php 
		foreach ($voc as $v) {
?>
		<tr>
    		<td><?php echo $v['v_name'];?></td>
    		<td><?php echo $v['v_trans'];?></td>
    		<td><?php echo $v['v_example'];?></td>
    		<td class="small"><b><a href="box.php?b_id=<?php echo $v['b_id'];?>&d_id=<?php echo $v['v_id'];?>">Sil</a></b></td>
  		</tr>
<?php
		}
?>
	</table>
</div>
<?php


		}else{
			header("Location:profile.php");
		}



	}else{
		header("Location:login.php");
	}
	
?>