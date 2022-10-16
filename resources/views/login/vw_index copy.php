<div class="wrapper wrapper-login wrapper-login-full p-0">
  <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
    <img src="<?= base_url("assets/home/img/jembrana.png"); ?>" alt="logo_pemkab" style="width: 200px;">
    <h1 class="title fw-bold text-white mb-3"><?= env("AppName") ?></h1>
    <p class="subtitle text-white op-7"><?= date("Y"); ?></p>
  </div>
  <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
    <div class="row">
      <div class="col-12">
        <div class="container container-login container-transparent animated fadeIn" style="display: block;">
          <h3 class="text-center">Sign In Admin</h3>
          <form id="form_submit" action="<?= site_url("login") ?>" method="post">
            <?= csrf_field(); ?>
            <div class="login-form">
              <div class="form-group">
                <label for="username" class="placeholder"><b>Username</b></label>
                <input id="username" name="username" type="text" class="form-control" required="">
              </div>
              <div class="form-group">
                <label for="password" class="placeholder"><b>Password</b></label>
                <div class="position-relative">
                  <input id="password" name="password" type="password" class="form-control" required="">
                  <div class="show-password" onclick="showPass()">
                    <i id="icon-pass" class="far fa-eye-slash"></i>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div id="response" class="alert" hidden></div>
              </div>
              <div class="form-group form-action-d-flex mb-3">
                <button type="submit" class="btn btn-secondary btn-block">Sign In</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-12">
        <h2 class="text-center">Video Tutorial Penggunaa Aplikasi</h2>
        <div class="row justify-content-md-center">
          <div class="col-md">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Admin Desa</h5>
                <p class="card-text">Tutorial pengguaan aplikasi untuk User Admin Desa.</p>
                <a href="https://youtu.be/Qrg_Unb6SnI" target="_blank" class="card-link">Link Tutorial</a>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Perbekel</h5>
                <p class="card-text">Tutorial verifikasi jawaban User Admin Desa untuk User Perbekel.</p>
                <a href="https://youtu.be/zOSdejxWPl0" target="_blank" class="card-link">Link Tutorial</a>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Admin Kecamatan</h5>
                <p class="card-text">Tutorial verifikasi penilaian setiap desa untuk User Kecamatan.</p>
                <a href="https://youtu.be/l81612PTwiI" target="_blank" class="card-link">Link Tutorial</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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