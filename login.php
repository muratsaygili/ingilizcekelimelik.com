<?php  
	require_once "connection.php";
	session_start();
	ob_start();
	if ($_SESSION['id']) {
		header("Location:profile.php");
	}
?>
<html>
		<head>
			<title>Giriş Yap</title>
			<link rel="stylesheet" type="text/css" href="master.css">
			<meta charset="utf-8">
		</head>
		<body>
		<div class="nav">
			<div>
				<a href="index.php">ingilizce kelimelik</a>
				<a class="right" href="register.php">Kayıt Ol</a>
			</div>
		</div>

<?php
	if ($_POST) {
		$id = $crud->login($_POST['username'],$_POST['password']);
		if ($id != null) {
			$_SESSION['id'] = $id;
			header("Location:profile.php");
		}else{
			header("Refresh:2, url=login.php");
?>
			<p class="gobek">Kullanıcı bilgilerinizi kontrol edin. Yönlendiriliyorsunuz..</p>
<?php
		}
	}else{
?>
			<div class="gobek">
				<form action="" method="post" onsubmit="return isValid(this)">
					Kullanıcı Adı:<br>
					<input type="text" name="username">
					<br>
					Şifre:<br>
					<input type="password" name="password">
					<br>
					<br>
					<input type="submit" value="Giriş Yap">
				</form>

			<p>Daha önce kayıt olmadıysanız kayıt olmak için <a href="register.php" class="a-blue">tıklayınız.</a></p>
			</div>
<?php 
	}


?>

<script>
        function isValid(form){
            var kullanici_adi   =   form.username.value;
            var sifre           =   form.password.value;
            if ( kullanici_adi == null || kullanici_adi == "" || sifre == null || sifre == "" || email == null || email == "")
            {
                alert("Lütfen boş alan bırakmayın.");
                return false;
            }
            return true;
        }
      </script>

</body>
</html>