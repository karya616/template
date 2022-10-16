<?= $this->extend('templates/vw_template_portal_login') ?>

<?= $this->section('content') ?>
<div class="wrapper wrapper-login wrapper-login-full p-0">
  <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
    <div class="mb-2">
      <img src="<?= base_url("assets/portal_depan") ?>/img/logo.png" alt="Logo" class="img-float">
    </div>
    <h1 class="title fw-bold text-white mb-3">E-KIN PEMDES</h1>
    <h1 class="fw-bold text-white op-7">(e-Kinerja Pemerintah Desa)</h1>
    <!-- <p class="subtitle text-white op-7">e-Kinerja Pemerintah Desa</p> -->

  </div>
  <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
    <div class="container container-login container-transparent animated fadeIn" style="display: block;">
      <h3 class="text-center">Forgot Password</h3>
      <form id="form_submit" action="<?php echo site_url("/forgotpass") ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="form-group" id="form_nik">
          <label for="nik">Nik</label>
          <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK">
        </div>
        <div class="form-group">
          <div class="position-relative">
            <div class="g-recaptcha" data-sitekey="6LcHlOwgAAAAADBlHyrlTXZbiFILT1MjeQIfj1Cd"></div>
            <label id="grecaperrors" class="error d-none" for="grecaperrors"></label>
          </div>
        </div>
        <div class="form-group">
          <button class="btn btn-secondary btn-block" type="submit">Reset</button>
        </div>
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
      $.LoadingOverlay("show");
      var recap = grecaptcha.getResponse();
      if (recap.length != 0) {
        $('#grecaperrors').removeClass("d-block");
        $('#grecaperrors').addClass("d-none");
        $(form).ajaxSubmit({
          success: function(res) {
            $.LoadingOverlay("hide");
            $('[name=<?= csrf_token() ?>]').val(res.csrf);

            swal({
              title: res.success ? 'Berhasil' : 'Error',
              text: res.message,
              icon: res.success ? 'success' : 'error',
              button: 'Ok',
            }).then((result) => {
              if (res.success) {
                location.href = "<?php echo base_url('/login') ?>";
              }
            });
          },
          dataType: 'json'
        });
      } else {
        $('#grecaperrors').removeClass("d-none");
        $('#grecaperrors').addClass("d-block");
        $('#grecaperrors').text("Wajib diisi!");
      }
    },
    rules: {
      nik: {
        required: true,
      }
    },
    messages: {
      nik: {
        required: "Wajib diisi!",
      },
    }
  });
</script>
<?= $this->endSection() ?>