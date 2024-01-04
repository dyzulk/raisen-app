<?php
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["submit"])) {
    if (update_pelanggan($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php?p=Data+Pelanggan';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'index.php?p=Data+Pelanggan';
            </script>
        ";
    }
}
?>
    <section class="content">
      <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Data Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <?php
                    $id     = $_GET["id"];
                    $pelanggan = getdata("user", $id);
                ?>
                <div class="card-body">
                <input type="hidden" name="id" value="<?=$pelanggan["id"];?>">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" value="<?=$pelanggan['nama'];?>" class="form-control" id="nama" placeholder="Masukkan nama" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" value="<?=$pelanggan['email'];?>" class="form-control" id="email" placeholder="Masukkan email" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" value="<?=$pelanggan['alamat'];?>" class="form-control" id="alamat" placeholder="Masukkan alamat" autocomplete="off">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="button" name="submit" onclick="history.back()" class="btn btn-danger">Batal</button>
                  <button type="submit" name="submit" class="btn btn-primary">Perbarui</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div>
    </section>