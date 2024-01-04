    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                        <th style="width: 1%">No</th>
                        <th style="width: 10%">NRP</th>
                        <th style="width: 24%">Nama</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                        <th style="width: 8%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $i = 1;
                        $mahasiswa = query("SELECT * FROM mahasiswa");
                        foreach ($mahasiswa as $mhs) :
                    ?>
                    <tr>
                        <td><?=$i;?></td>
                        <td><?=$mhs['nrp'];?></td>
                        <td><?=$mhs['nama'];?></td>
                        <td><?=$mhs['email'];?></td>
                        <td><?=$mhs['jurusan'];?></td>
                        <td class="text-center">
                            <a href="ubah.php?id=<?=$mhs['id'];?>" class="btn btn-success mr-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="hapus.php?id=<?=$mhs['id'];?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                <i class="fas fa-trash"></i>
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
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jurusan</th>
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
    </section>
    <!-- /.content -->