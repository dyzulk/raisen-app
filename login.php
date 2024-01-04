<?php 
session_start();
require 'core.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil email berdasarkan id
	$result = mysqli_query($conn, "SELECT email FROM user WHERE id = '$id'");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan email
	if( $key === hash('sha256', $row['email']) ) {
		$_SESSION['login'] = true;
	}


}

if( isset($_SESSION["login"]) ) {
	header("Location: app/index.php");
	exit;
}


if( isset($_POST["login"]) ) {

	$email    = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

	// cek email
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["role_id"] = $row["role_id"];

			// cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['email']), time()+60);
			}

			if( $row['role_id'] == 1 ) {
        session_start();
        header("Location: admin/index.php");
        exit;
      } else if( $row['role_id'] == 2 ) {
        session_start();
        header("Location: app/index.php");
        exit;
      }
			exit;
		}
	}

	$error = true;

}

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DerlyAPP | Log in</title>

  <link rel="shortcut icon" href="https://dyzulk.me/dist/img/favicon.png" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('vendor/');?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('vendor/');?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('vendor/');?>template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="https://cdn.dyzulk.com/img-cdn/logo-pln.png" alt="DerlyAPP" width="100">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="email" autocomplete="off" id="email" class="form-control" placeholder="Username atau email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" autocomplete="off" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" autocomplete="off" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="<?=base_url('forgot-password.php');?>">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="<?=base_url('register.php');?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
  <div class="login-logo mt-3">
    <a href="#" id="reloadLink"><strong><?=title();?></strong></a>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url('vendor/');?>template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('vendor/');?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('vendor/');?>template/dist/js/adminlte.min.js"></script>
<!-- Refresh -->
<script>
  // Mendapatkan referensi ke elemen <a>
  var reloadLink = document.getElementById('reloadLink');

  // Menambahkan event listener untuk menghandle klik pada elemen <a>
  reloadLink.addEventListener('click', function(event) {
    // Menghentikan default behavior dari link (misalnya, berpindah ke halaman baru)
    event.preventDefault();

    // Melakukan reload halaman
    // Anda dapat memilih salah satu dari dua metode yang disediakan sebelumnya
    // location.reload();
    location.href = location.href; // atau dengan timestamp untuk menghindari cache
  });
</script>
</body>
</html>
