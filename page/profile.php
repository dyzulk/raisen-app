<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

      <?php
        $user   = getuser($_SESSION['id']);
      ?>
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="../img/user/<?= $user['image']; ?>"
                alt="User profile picture">
            </div>

            <h3 class="profile-username text-center"><?=$user['nama'];?></h3>

            <p class="text-muted text-center"><?=$user['id'];?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Email</b> <a class="float-right"><?=$user['email'];?></a>
              </li>
              <li class="list-group-item">
                <b>Alamat</b> <a class="float-right"><?=$user['alamat'];?></a>
              </li>
              <li class="list-group-item">
                <b>Sejak</b> <a class="float-right"><?=date("Y-m-d", $user['date_created']);?></a>
              </li>
            </ul>

            <a class="btn btn-primary btn-block"><b>Follow</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
              <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
              <li class="nav-item"><a class="nav-link" href="#foto-profil" data-toggle="tab">Foto Profil</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="email" name="nama" autocomplete="off" class="form-control" id="inputName" value="<?=$user['nama'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" autocomplete="off" class="form-control" id="inputEmail" value="<?=$user['email'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea name="alamat" autocomplete="off" class="form-control" id="inputExperience" value="<?=$user['alamat'];?>"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="setuju"> Saya yakin untuk melakukan perubahan</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="password">
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" autocomplete="off" class="form-control" id="inputName" placeholder="Password Lama">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                      <input type="password" name="password1" autocomplete="off" class="form-control" id="inputEmail" placeholder="Password Baru">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col-sm-10">
                      <input type="password" name="password2" autocomplete="off" class="form-control" id="inputEmail" placeholder="Konfirmasi Password Baru">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="setuju"> Saya yakin untuk melakukan perubahan</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="foto-profil">
                <!-- The foto-profil -->
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="UpdateGambar"class="col-sm-2 col-form-label">Masukkan Gambar</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="UpdateGambar">
                          <label class="custom-file-label" for="UpdateGambar">Pilih File</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="setuju"> Saya yakin untuk melakukan perubahan</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->

              
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->