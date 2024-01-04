<?php 
session_start();

// cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION["login"]) || ($_SESSION["role_id"] != 1 && $_SESSION["role_id"] != 2)) {
  header("Location: ../login.php");
  exit;
} elseif ($_SESSION["role_id"] == 1) {
  header("Location: ../admin/index.php");
  exit;
}

// menghubungkan dengan file php lainnya
require '../core.php';
// $user = query("SELECT * FROM user");

?>

<!DOCTYPE html>
<html lang="id">

<head>
  <?php
    require_once '../partition/header.php';
  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader, Navbar, Sidebar -->
    <?php 
      require_once '../partition/preloader.php';
      require_once '../partition/navbar.php';
      require_once '../partition/sidebar.php';
    ?>
    <!-- /.Preloader, Navbar, Sidebar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php
        require_once '../partition/content-header.php';
      ?>
      <!-- /.content-header -->

      <!-- Main content -->
      <?php showContent();?>
      <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->
    
    <!-- Footer -->
    <?php
      require_once '../partition/footer.php';
    ?>
    <!-- /.Footer -->
    

  </div>
  <!-- ./wrapper -->

  <!-- Scripts -->
  <?php
    require_once '../partition/script.php';
  ?>
  <!-- /.Scripts -->

</body>

</html>