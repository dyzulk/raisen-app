    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?=base_url('vendor/')?>template/dist/img/favicon.png" alt="DerliApp" height="60" width="60">
      <h2 class="mt-4">Hallo <b><?php $user = getuser($_SESSION['id']); echo $user['nama'];?></b> !</h2>
    </div>