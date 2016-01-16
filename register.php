<?php  
	require_once "connection.php";
	session_start();
	ob_start();
	if ($_SESSION['id']) {
		header("Location:profile.php");
	}
?>
<!DOCTYPE html>
		<head>
			<title>Kayıt Ol</title>
			<link rel="stylesheet" type="text/css" href="master.css">
			<meta charset="utf-8">
		</head>
		<body>
		<div class="nav">
			<div>
				<a href="index.php">ingilizce kelimelik</a>
				<a class="right" href="login.php">Giriş Yap</a>
			</div>
		</div>

<?php
	if ($_POST) {
		$status = $crud->register($_POST['username'],$_POST['password'],$_POST['email']);
		if ($status) {
			header("Refresh:2,url=login.php");
?>
		<p>Kayıt işlemi başarılı oldu. Giriş sayfasına yönlendiriliyorsunuz.</p>
<?php
		}else{
			header("Refresh:2, url=register.php");
?>
			<p class="gobek">Başka bir kullanıcı adı ve email deneyin. Yönlendiriliyorsunuz..</p>
<?php
		}
	}else{
?>
			<div class="gobek">
				<form action="" method="post" onsubmit="return isValid(this)">
					Kullanıcı Adı:<br>
					<input type="text" name="username" required>
					<br>
					Şifre:<br>
					<input type="password" name="password" required>
					<br>
					Eposta:<br>
					<input type="text" name="email" required>
					<br>
					<br>
					<input type="submit" value="Giriş Yap">
				</form>

			<p>Daha önce kayıt olduysanız giriş yapmak için <a href="login.php" class="a-blue">tıklayınız.</a></p>
			</div>
<?php 
	}


?>

<script>
        function isValid(form){
            var kullanici_adi   =   form.username.value;
            var sifre           =   form.password.value;
            var email           =   form.email.value;
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