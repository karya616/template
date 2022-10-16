<div class="main-header">
  <!-- Logo Header -->
  <div class="logo-header" data-background-color="blue">

    <a href="index.html" class="logo">
      <!-- <img src="<?= base_url() ?>/assets/img/logo.svg" alt="navbar brand" class="navbar-brand" style="width: 60%;"> -->
      <p class="navbar-brand" style="width: 60%; color:white;">E-KIN PEMDES</p>
    </a>
    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
        <i class="icon-menu"></i>
      </span>
    </button>
    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
    <div class="nav-toggle">
      <button class="btn btn-toggle toggle-sidebar">
        <i class="icon-menu"></i>
      </button>
    </div>
  </div>
  <!-- End Logo Header -->

  <!-- Navbar Header -->
  <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
    <div class="container-fluid">
      <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
        <li class="nav-item toggle-nav-search hidden-caret">
          <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
            <i class="fa fa-search"></i>
          </a>
        </li>

        <li class="nav-item dropdown hidden-caret">
          <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
            <div class="avatar-sm">
              <img src="<?= base_url() ?>/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
            </div>
          </a>
          <ul class="dropdown-menu dropdown-user animated fadeIn">
            <div class="dropdown-user-scroll scrollbar-outer">
              <li>
                <div class="user-box">
                  <div class="avatar-lg"><img src="<?= base_url() ?>/assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
                  <div class="u-text">
                    <?php
                    $session = \Config\Services::session();
                    ?>
                    <h4><?= $session->get("nama_lengkap") ?></h4>
                    <?php if ($session->get("id_kewenangan") == 200) { ?>
                      <p class="text-muted"><?= $session->get("jabatan") ?></p>
                      <p class="text-muted"><?= $session->get("ket_desa") ?></p>
                    <?php } else { ?>
                      <p class="text-muted"><?= $session->get("ket_kewenangan") ?></p>
                    <?php } ?>

                  </div>
                </div>
              </li>
              <li>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" onclick="ganti_pass()">Ganti Password</a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" onclick="logout()">Logout</a>
              </li>
            </div>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <!-- End Navbar -->
</div>
<script>
  function ganti_pass() {
    var url = '<?php echo site_url("/gantiPass") ?>';
    $.ajax({
      type: 'GET',
      url: url,
      success: function(res) {
        $('#modal').html(res).show();
        $('#myModal').modal('show');
      }
    });
  }

  function logout() {
    swal({
      title: 'Konfirmasi',
      text: 'Apakah anda ingin keluar dari aplikasi?',
      icon: 'warning',
      buttons: {
        confirm: {
          text: 'Ya',
          className: 'btn btn-success'
        },
        cancel: {
          text: 'Tidak',
          visible: true,
          className: 'btn btn-danger'
        }
      }
    }).then((result) => {
      if (result) {
        window.location = '<?= site_url("logout"); ?>';
      }
    });
  }
</script>