<?php
require_once 'core.php';
if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
        window.location.href = 'login.php';
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=title()?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dyzcdn/fontawesome-pro-5.15.4@main/css/all.css">
  <!-- <script src="https://cdn.jsdelivr.net/gh/dyzcdn/fontawesome-pro-5.15.4@main/js/pro.js"></script> -->
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('vendor/');?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('vendor/');?>template/dist/css/adminlte.min.css">
  
  <style>
    span {
        cursor: pointer;
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="login-logo">
    <img src="https://cdn.dyzulk.com/img-cdn/logo-pln.png" alt="DerlyAPP" width="100">
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Daftar sebagai pengguna <b>Derly</b>APP</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="nama" autocomplete="off" class="form-control" required placeholder="Nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <!-- <span class="fas fa-user"></span> -->
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="email" name="email" autocomplete="off" class="form-control" required placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <!-- <span class="fas fa-envelope"></span> -->
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" autocomplete="off" class="form-control" required placeholder="Password" id="password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-eye" id="togglePassword"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password2" autocomplete="off" class="form-control" required placeholder="Retype password" id="retypePassword">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-eye" id="toggleRetypePassword"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="alamat" autocomplete="off" class="form-control" required placeholder="Alamat">
          <div class="input-group-append">
            <div class="input-group-text">
              <!-- <span class="fas fa-map-marked"></span> -->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" required name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#" decoration="none">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="register" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
      </div>
      
      <div class="mt-2">Sudah punya akun? <a href="<?=base_url('login.php');?>" class="text-center">Login disini!</a></div class="mt-2">
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
  <div class="login-logo mt-3">
    <a href="#" id="reloadLink"><strong><b>Derly</b>APP</strong></a>
  </div>
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?=base_url('vendor/');?>template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('vendor/');?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('vendor/');?>template/dist/js/adminlte.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    togglePassword.classList.toggle('fa-eye-slash');
    });

    const toggleRetypePassword = document.getElementById('toggleRetypePassword');
    const retypePassword = document.getElementById('retypePassword');

    toggleRetypePassword.addEventListener('click', function () {
    const type = retypePassword.getAttribute('type') === 'password' ? 'text' : 'password';
    retypePassword.setAttribute('type', type);
    toggleRetypePassword.classList.toggle('fa-eye-slash');
    });
});
</script>

</body>
</html>
