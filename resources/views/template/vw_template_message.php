<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?= $title ? $title . " | " : "" ?> <?= getenv("AppName") ?></title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="<?= base_url() ?>/assets/img/icon.ico" type="image/x-icon" />
  <?= csrf_meta() ?>
  <!-- Fonts and icons -->
  <script src="<?= base_url() ?>/assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        "families": ["Lato:300,400,700,900"]
      },
      custom: {
        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
        urls: ['<?= base_url() ?>/assets/css/fonts.min.css']
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/atlantis.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/messages.css">

  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">

  <link rel="stylesheet" href="<?= base_url() ?>/assets/js/plugin/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/js/plugin/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/js/plugin/select2/css/select2-bootstrap4.min.css">

  <!-- Filepond stylesheet -->
  <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

  <!--   Core JS Files   -->
  <script src="<?= base_url() ?>/assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/core/bootstrap.min.js"></script>

  <!-- jQuery UI -->
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

  <!-- jQuery Scrollbar -->
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

  <!-- jQuery Validate -->
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-validate/jquery.form.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-validate/additional-methods.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-validate/localization/messages_id.min.js"></script>

  <!-- Chart JS -->
  <script src="<?= base_url() ?>/assets/js/plugin/chart.js/chart.min.js"></script>

  <!-- jQuery Sparkline -->
  <script src="<?= base_url() ?>/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

  <!-- Chart Circle -->
  <script src="<?= base_url() ?>/assets/js/plugin/chart-circle/circles.min.js"></script>

  <!-- Datatables -->
  <script src="<?= base_url() ?>/assets/js/plugin/datatables/datatables.min.js"></script>

  <!-- Bootstrap Notify -->
  <script src="<?= base_url() ?>/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

  <!-- jQuery Vector Maps -->
  <script src="<?= base_url() ?>/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

  <!-- Sweet Alert -->
  <script src="<?= base_url() ?>/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

  <!-- Bootstrap Datepicker -->
  <script src="<?= base_url() ?>/assets/js/plugin/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugin/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"></script>

  <!-- Cleave -->
  <script src="<?= base_url() ?>/assets/js/plugin/cleave/cleave.min.js"></script>

  <!-- Jquery Input Mask -->
  <script src="<?= base_url() ?>/assets/js/plugin/jquery.inputmask/jquery.inputmask.min.js"></script>

  <!-- Atlantis JS -->
  <script src="<?= base_url() ?>/assets/js/atlantis.min.js"></script>

  <!-- Select2 -->
  <script src="<?= base_url() ?>/assets/js/plugin/select2/js/select2.full.min.js"></script>

  <!-- include FilePond library -->
  <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
  <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

  <script>
    $.fn.select2.defaults.set("theme", "bootstrap4");
  </script>
</head>

<body data-background-color="">
  <div class="wrapper">
    <?= view("templates/vw_navbar") ?>

    <?= view("templates/vw_sidebar") ?>

    <div class="main-panel">
      <div class="content">
        <?= view($view, $data); ?>
      </div>
    </div>

  </div>
  <!-- Modal -->
  <div class="modal fade" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content" id="modal">
      </div>
    </div>
  </div>

  <!-- Modal Large -->
  <div class="modal bd-example-modal-lg fade" role="dialog" id="myModalL">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" id="modalL">
      </div>
    </div>
  </div>
</body>

</html>