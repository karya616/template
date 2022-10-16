<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PMI - Pemerintah Kabupaten Jembrana</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="<?= base_url("assets/portal_depan") ?>/img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="<?= base_url("assets/portal_depan") ?>/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?= base_url("assets/portal_depan") ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url("assets/portal_depan") ?>/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="<?= base_url("assets/portal_depan") ?>/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="<?= base_url("assets/portal_depan") ?>/css/style.css" rel="stylesheet">

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <!-- jQuery Validate -->
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-validate/jquery.validate.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-validate/jquery.form.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-validate/additional-methods.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-validate/localization/messages_id.min.js"></script>
</head>

<body>
  <div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->
    <div class="container-xxl position-relative p-0">
      <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
          <h1 class="m-0" style="text-align: center;">E-Kin PEMDES</h1>
          <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="fa fa-bars"></span>
        </button>

      </nav>

      <?= view($view) ?>




      <!-- Back to Top -->
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url("assets/portal_depan") ?>/lib/wow/wow.min.js"></script>
    <script src="<?= base_url("assets/portal_depan") ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url("assets/portal_depan") ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url("assets/portal_depan") ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url("assets/portal_depan") ?>/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="<?= base_url("assets/portal_depan") ?>/lib/lightbox/js/lightbox.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url() ?>/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url("assets/portal_depan") ?>/js/main.js"></script>

    <!-- Loading -->
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
</body>

</html>