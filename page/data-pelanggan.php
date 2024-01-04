<?php
if (isset($_POST["submit"])) {
    if (tambahPelanggan($_POST) > 0) {
        echo "
            <script>
				alert('Data berhasil ditambahkan!');
				document.location.href = 'index.php?p=Data+Pelanggan';
			</script>
        ";
    } else {
        echo "
            <script>
				alert('Data gagal ditambahkan!');
				document.location.href = 'index.php?p=Data+Pelanggan';
			</script>
        ";
    }
}
?>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title text-bold">Tambah, Edit & Hapus Data Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="mb-3">
                    <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#tambah-data">
                        <i class="fas fa-user-plus"></i> Tambah Data
                    </button>
                    <button type="button" class="btn btn-warning text-white" onclick="refreshPage()">
                        <i class="fas fa-sync"></i> Refresh
                    </button>
                </div>
                <table id="example1" class="table table-bordered table-hover table-striped my-2">
                  <thead>
                    <tr>
                        <th style="width: 1%">No</th>
                        <th style="width: 10%">ID Pelanggan</th>
                        <th style="width: 24%">Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>QR</th>
                        <th style="width: 13%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $i = 1;
                        $pelanggan = query("SELECT * FROM user WHERE role_id = '2'");
                        foreach ($pelanggan as $plgn) :
                    ?>
                    <tr>
                        <td><?=$i;?></td>
                        <td><?=$plgn['id'];?></td>
                        <td><?=$plgn['nama'];?></td>
                        <td><?=$plgn['email'];?></td>
                        <td><?=$plgn['alamat'];?></td>
                        <td class="text-center">
                            <?php
                              if ($_SESSION['role_id'] == "1") {
                                include_once "../vendor/phpqrcode/qrlib.php";
                                $tempdir = "../img/qr/";
                              } else {
                                include_once "../vendor/phpqrcode/qrlib.php";
                                $tempdir = "../img/qr/";
                              }

                              if (!is_dir($tempdir)) {
                                mkdir($tempdir, 0755, true);
                              }

                              $isi = $plgn['id'].' - '.$plgn['nama'];
                              $namafile = $plgn['id'].'.png';
                              $quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
                              $ukuran = 10; //batasan 1 paling kecil, 10 paling besar
                              $padding = 2;
                              
                              if (!file_exists($tempdir.$namafile)) {
                                QRCode::png($isi,$tempdir.$namafile,$quality,$ukuran,$padding);
                              }
                            ?>
                            <a href="<?=$tempdir.$plgn['id'];?>.png" target="_blank">
                              <img src="<?=$tempdir.$plgn['id'];?>.png" alt="<?=$plgn['id'];?>" width="50">
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="index.php?p=<?=urlencode("Ubah Data Pelanggan");?>&id=<?=$plgn['id'];?>" class="btn btn-sm btn-success mr-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="../act/hapus-pelanggan.php?id=<?=$plgn['id'];?>" class="btn btn-sm btn-danger mr-1" onclick="return confirm('Apakah anda yakin ingin menghapus <?=$plgn['nama'];?> dari database?');">
                                <i class="fas fa-trash"></i>
                            </a>
                            
                            <a href="<?=$tempdir.$plgn['id'];?>.png" download target="_blank" class="btn btn-sm btn-dark">
                              <i class="fas fa-cloud-download mr-1"></i>
                              <b> QR</b>
                            </a>
                        </td>
                    </tr>
                    <?php
                        $i++;
                        endforeach;
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>No</th>
                        <th>ID Pelanggan</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>QR</th>
                        <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <div class="modal fade" id="tambah-data">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Form Tambah Pelanggan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat" autocomplete="off">
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </section>
    <!-- /.content -->