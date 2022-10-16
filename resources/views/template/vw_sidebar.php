<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <?php
      $session = \Config\Services::session();
      ?>
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="<?= base_url("assets/img/profile.jpg"); ?>" alt="<?= $session->get("nama_lengkap") ?>" class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" class="collapsed">
            <span style="white-space: normal;">
              <?= $session->get("nama_lengkap") ?>
              <?php if ($session->get("id_kewenangan") == 200) { ?>
                <span class="user-level"><?= $session->get("jabatan") ?></span>
                <span class="user-level"><?= $session->get("ket_desa") ?></span>
              <?php } else { ?>
                <span class="user-level"><?= $session->get("ket_kewenangan") ?></span>
              <?php } ?>
            </span>
          </a>
          <div class="clearfix"></div>
        </div>
      </div>
      <?php
      $request = \Config\Services::request();
      $segment = $request->uri->getSegment(1);
      ?>
      <ul class="nav nav-primary">
        <?php if ($session->get('id_kewenangan') == 100) { ?>
          <li class="nav-item <?= ($segment == "dashboard") ? "active" : "" ?>">
            <a href="<?= site_url("dashboard") ?>">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?= ($segment == "validasiekin") ? "active" : "" ?>">
            <a href="<?= site_url("validasiekin") ?>">
              <i class="fas fa-user"></i>
              <p>Validasi Ekin</p>
            </a>
          </li>
          <li class="nav-item <?= ($segment == "rekapbulan") ? "active submenu" : "" ?>">
            <a data-toggle="collapse" href="#rekap" class="collapsed" aria-expanded="false">
              <i class="fas fa-clipboard-check"></i>
              <p>Rekap Ekin</p>
            </a>
            <div class="collapse <?= ($segment == "rekapbulan") ? "show" : "" ?>" id="rekap">
              <ul class="nav nav-collapse">
                <li class="nav-item <?= ($segment == "rekapbulan") ? "active" : "" ?>">
                  <a href="<?= site_url("rekapbulan") ?>">
                    <span class="sub-item">Rekap Bulanan</span>
                  </a>
                </li>
                <li class="nav-item <?= ($segment == "rekaptahun") ? "active" : "" ?>">
                  <a href="<?= site_url("rekaptahun") ?>">
                    <span class="sub-item">Rekap Tahunan</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item <?= ($segment == "rekapbulan" || $segment == "user") ? "active submenu" : "" ?>">
            <a data-toggle="collapse" href="#user" class="collapsed" aria-expanded="false">
              <i class="fas fa-clipboard-check"></i>
              <p>User Management</p>
            </a>
            <div class="collapse <?= ($segment == "userjabatan" || $segment == "user") ? "show" : "" ?>" id="user">
              <ul class="nav nav-collapse">
                <li class="nav-item <?= ($segment == "userjabatan") ? "active" : "" ?>">
                  <a href="<?= site_url("userjabatan") ?>">
                    <span class="sub-item">User Jabatan</span>
                  </a>
                </li>
                <li class="nav-item <?= ($segment == "user") ? "active" : "" ?>">
                  <a href="<?= site_url("user") ?>">
                    <span class="sub-item">User Pengguna</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item <?= ($segment == "modulindikator") ? "active" : "" ?>">
            <a href="<?= site_url("modulindikator") ?>">
              <i class="fas fa-file"></i>
              <p>Modul Indikator</p>
            </a>
          </li>
        <?php }
        if ($session->get('id_kewenangan') == 200) { ?>
          <li class="nav-item <?= ($segment == "dashboard") ? "active" : "" ?>">
            <a href="<?= site_url("dashboard") ?>">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?= ($segment == "inputekin") ? "active" : "" ?>">
            <a href="<?= site_url("inputekin") ?>">
              <i class="fas fa-clipboard-check"></i>
              <p>Ekin</p>
            </a>
          </li>
          <?php if ($session->get('id_jabatan') == 1) { ?>
            <li class="nav-item <?= ($segment == "validasiekin") ? "active" : "" ?>">
              <a href="<?= site_url("validasiekin") ?>">
                <i class="fas fa-user"></i>
                <p>Validasi Ekin</p>
              </a>
            </li>
          <?php } ?>
          <li class="nav-item <?= ($segment == "rekapbulan") ? "active submenu" : "" ?>">
            <a data-toggle="collapse" href="#rekap" class="collapsed" aria-expanded="false">
              <i class="fas fa-clipboard-check"></i>
              <p>Rekap Ekin</p>
            </a>
            <div class="collapse <?= ($segment == "rekapbulan") ? "show" : "" ?>" id="rekap">
              <ul class="nav nav-collapse">
                <li class="nav-item <?= ($segment == "rekapbulan") ? "active" : "" ?>">
                  <a href="<?= site_url("rekapbulan") ?>">
                    <span class="sub-item">Rekap Bulanan</span>
                  </a>
                </li>
                <li class="nav-item <?= ($segment == "rekaptahun") ? "active" : "" ?>">
                  <a href="<?= site_url("rekaptahun") ?>">
                    <span class="sub-item">Rekap Tahunan</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php }
        if ($session->get('id_kewenangan') == 103) { ?>
          <li class="nav-item <?= ($segment == "dashboard-user") ? "active" : "" ?>">
            <a href="<?= site_url("dashboard-user") ?>">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?= ($segment == "validasiekin") ? "active" : "" ?>">
            <a href="<?= site_url("validasiekin") ?>">
              <i class="fas fa-user"></i>
              <p>Validasi Ekin</p>
            </a>
          </li>
          <li class="nav-item <?= ($segment == "rekapbulan") ? "active submenu" : "" ?>">
            <a data-toggle="collapse" href="#rekap" class="collapsed" aria-expanded="false">
              <i class="fas fa-clipboard-check"></i>
              <p>Rekap Ekin</p>
            </a>
            <div class="collapse <?= ($segment == "rekapbulan") ? "show" : "" ?>" id="rekap">
              <ul class="nav nav-collapse">
                <li class="nav-item <?= ($segment == "rekapbulan") ? "active" : "" ?>">
                  <a href="<?= site_url("rekapbulan") ?>">
                    <span class="sub-item">Rekap Bulanan</span>
                  </a>
                </li>
                <li class="nav-item <?= ($segment == "rekaptahun") ? "active" : "" ?>">
                  <a href="<?= site_url("rekaptahun") ?>">
                    <span class="sub-item">Rekap Tahunan</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->