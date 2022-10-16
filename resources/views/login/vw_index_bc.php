<?= $this->extend('templates/vw_template_portal_login') ?>

<?= $this->section('content') ?>
<div class="wrapper wrapper-login">
  <div class="container container-login animated fadeIn" style="display: block;">
    <div class="text-center">
      <img class="mb-2" src="<?= base_url("assets/home/img/jembrana.png"); ?>" alt="logo_pemkab" style="width: 200px;">
      <h1 class="title fw-bold mb-2"><?= env("AppName") ?></h1>
      <h3>Login To Admin</h3>
    </div>
    <div class="login-form">
      <form id="form_submit" action="<?= site_url("login") ?>" method="post">
        <?= csrf_field(); ?>
        <div class="form-group form-floating-label">
          <input id="username" name="username" type="text" class="form-control input-border-bottom" required="">
          <label for="username" class="placeholder">Username</label>
        </div>
        <div class="form-group form-floating-label">
          <input id="password" name="password" type="password" class="form-control input-border-bottom" required="">
          <label for="password" class="placeholder">Password</label>
          <div class="show-password">
            <i class="icon-eye"></i>
          </div>
        </div>
        <div class="form-group">
          <div id="response" class="alert" hidden></div>
        </div>
        <div class="form-action mb-3">
          <button type="submit" href="#" class="btn btn-primary btn-rounded btn-block ld-ext-right">Login In <div id="loading"></div></button>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
<?= $this->section("javascript") ?>
<script>
  $('#form_submit').validate({
    submitHandler: function(form, event) {
      lbtn("[type=submit]");

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

            lbtn("[type=submit]", false);
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
</script>
<?= $this->endSection() ?>