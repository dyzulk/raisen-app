    <?php
      $user = getuser($_SESSION['id']);
    ?>
    
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?=base_url();?>" class="brand-link">
        <img src="<?=base_url('vendor/')?>template/dist/img/logo-pln-square-white.png" alt="DerlyAPP Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light"><?=title();?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?=base_url('img/user/'.$user['image'])?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a class="d-block" style="word-wrap: break-word;"><?=$user['nama'];?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="index.php?p=<?=urlencode("Dashboard");?>" class="nav-link">
              <i class="nav-icon fad fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-header">PERDATAAN</li>
            <li class="nav-item">
              <a href="index.php?p=<?=urlencode("Data Mahasiswa");?>" class="nav-link">
                <i class="nav-icon fad fa-th"></i>
                <p>
                  Data Mahasiswa
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?p=<?=urlencode("Data Pelanggan");?>" class="nav-link">
                <i class="nav-icon fad fa-copy"></i>
                <p>
                  Data Pelanggan
                </p>
              </a>
            </li>
            <li class="nav-header">LAINNYA</li>
            <li class="nav-item">
              <a href="index.php?p=<?=urlencode("Profile");?>" class="nav-link">
                <i class="nav-icon fad fa-user-cog"></i>
                <p>
                  Akun Saya
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('logout.php');?>" class="nav-link">
                <i class="nav-icon fad fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>