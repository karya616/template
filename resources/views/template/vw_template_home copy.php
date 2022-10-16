<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="<?= base_url() ?>/assets/img/icon.ico" type="image/x-icon" />
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aplikasi cek</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>/assets/home/dist/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>/assets/home/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/home/css/login.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">



  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>/assets/home/dist/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/home/dist/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>/assets/home/dist/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>/assets/home/js/sb-admin-2.min.js"></script>

  <!-- jQuery Validate -->
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-validate/jquery.form.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-validate/additional-methods.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugin/jquery-validate/localization/messages_id.min.js"></script>


  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-10 mx-auto">
        <img src="<?= base_url() ?>/assets/home/img/jembrana.png" style="width: 15%; display: block; margin: 0 auto;">
        <h3 style="margin:auto;
    vertical-align:middle;">SISTEM INFORMASI HASIL LABORATORIUM KABUPATEN JEMBRANA</h3>
      </div>
    </div>
  </div>

  <?= view($view) ?>


</body>
<script>
  $('#form_submit').validate({
    submitHandler: function(form, event) {
      $(form).ajaxSubmit({
        success: function(res) {
          $('[name=<?= csrf_token() ?>]').val(res.csrf);

          if (res.success) {
            $('#response').removeAttr("hidden");
            $('#response').removeClass("alert-danger");
            $('#response').addClass("alert-success");
            $('#response').html(res.message).show();
            window.setTimeout(function() {
              window.location = res.url;
            }, 3000);
          } else {
            $('#response').removeAttr("hidden");
            $('#response').addClass("alert-danger");
            $('#response').html(res.message).show();
          }
        },
        dataType: 'json'
      });
    },
    rules: {
      username: {
        required: true,
      },
      password: {
        required: true
      },
    },
    messages: {
      username: {
        required: "Wajib diisi!"
      },
      password: {
        required: "Wajib diisi!"
      },
    }
  });

  function showPass() {
    var type = $('[name=password]').get(0).type;
    if (type == "password") {
      $('[name=password]').get(0).type = 'text';
      $('#icon-pass').removeClass('far fa-eye-slash');
      $('#icon-pass').addClass('far fa-eye');
    } else {
      $('[name=password]').get(0).type = 'password';
      $('#icon-pass').removeClass('far fa-eye');
      $('#icon-pass').addClass('far fa-eye-slash');
    }
  }
</script>

</html>