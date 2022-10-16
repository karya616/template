<?= $this->extend('templates/vw_template_portal_login') ?>

<?= $this->section('content') ?>
<div class="wrapper wrapper-login wrapper-login-full p-0">
  <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
    <div class="mb-2">
      <img src="<?= base_url("assets/portal_depan") ?>/img/logo.png" alt="Logo" class="img-float">
    </div>
    <h1 class="title fw-bold text-white mb-3">E-KIN PEMDES</h1>
    <h1 class="fw-bold text-white op-7">(e-Kinerja Pemerintah Desa)</h1>

  </div>
  <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
    <div class="container container-login container-transparent animated fadeIn" style="display: block;">
      <h3 class="text-center">Reset Password</h3>
      <form id="form_submit" action="<?php echo site_url("resetpassword") ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input name="id" value="<?php echo $data['id']; ?>" hidden>
        <input name="verification_token" value="<?php echo $data['verification_token']; ?>" hidden>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          <div>
            <div id="password-strength-status"></div>
            <ul class="pswd_info" id="passwordCriterion">
              <li data-criterion="length" class="invalid">6-15 <strong>Karakter</strong></li>
              <li data-criterion="capital" class="invalid">Minimal <strong>Satu Huruf Besar</strong></li>
              <li data-criterion="small" class="invalid">Minimal <strong>Satu Huruf Kecil</strong></li>
              <li data-criterion="number" class="invalid">Minimal <strong>Satu Nomor</strong></li>
              <li data-criterion="special" class="invalid">Minimal <strong>Satu Karakter(!@#$%^&*) </strong></li>
            </ul>
          </div>
        </div>
        <div class="form-group">
          <label for="password">Verifikasi Password</label>
          <div class="position-relative">
            <input id="v_password" name="v_password" type="password" class="form-control" required="" placeholder="Konfirmasi Password">
            <div class="show-password" onclick="showPass('v_password')">
              <i id="icon-pass-v_password" class="far fa-eye-slash"></i>
            </div>
          </div>
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
<script type="text/javascript">
  $(document).ready(function() {

    FormSelectGolongan();
  });
  $('#password').keyup(function(event) {
    var password = $('#password').val();
    checkPasswordStrength(password);
  });
</script>
<script>
  $('#form_submit').validate({
    submitHandler: function(form, event) {
      var recap = grecaptcha.getResponse();
      if (recap.length != 0) {
        $('#grecaperrors').removeClass("d-block");
        $('#grecaperrors').addClass("d-none");
        $(form).ajaxSubmit({
          success: function(res) {
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
      password: {
        required: true
      },
      v_password: {
        equalTo: "[name=password]"
      }
    },
    messages: {
      password: {
        required: "Wajib diisi!",
      },
      v_password: {
        equalTo: "Verifikasi password berbeda!",
      },
    }
  });



  function showPass(id) {
    var type = $('[name=' + id + ']').get(0).type;
    if (type == "password") {
      $('[name=' + id + ']').get(0).type = 'text';
      $('#icon-pass-' + id).removeClass('far fa-eye-slash');
      $('#icon-pass-' + id).addClass('far fa-eye');
    } else {
      $('[name=' + id + ']').get(0).type = 'password';
      $('#icon-pass-' + id).removeClass('far fa-eye');
      $('#icon-pass-' + id).addClass('far fa-eye-slash');
    }
  }

  function getPasswordStrength(password) {
    let s = 0;
    if (password.length > 6) {
      s++;
    }
    if (password.length > 10) {
      s++;
    }
    if (/[A-Z]/.test(password)) {
      s++;
    }
    if (/[0-9]/.test(password)) {
      s++;
    }
    if (/[^A-Za-z0-9]/.test(password)) {
      s++;
    }
    return s;
  }
  document.querySelector(".pw-meter #password").addEventListener("focus", function() {
    document.querySelector(".pw-meter .pw-strength").style.display = "block";
  });
  document.querySelector(".pw-meter .pw-display-toggle-btn").addEventListener("click", function() {
    let el = document.querySelector(".pw-meter .pw-display-toggle-btn");
    if (el.classList.contains("active")) {
      document.querySelector(".pw-meter #password").setAttribute("type", "password");
      el.classList.remove("active");
    } else {
      document.querySelector(".pw-meter #password").setAttribute("type", "text");
      el.classList.add("active");
    }
  });

  document.querySelector(".pw-meter #password").addEventListener("keyup", function(e) {
    let password = e.target.value;
    let strength = getPasswordStrength(password);
    let passwordStrengthSpans = document.querySelectorAll(".pw-meter .pw-strength span");
    strength = Math.max(strength, 1);
    passwordStrengthSpans[1].style.width = strength * 20 + "%";
    if (strength < 2) {
      passwordStrengthSpans[0].innerText = "Weak";
      passwordStrengthSpans[0].style.color = "#111";
      passwordStrengthSpans[1].style.background = "#d13636";
    } else if (strength >= 2 && strength <= 4) {
      passwordStrengthSpans[0].innerText = "Medium";
      passwordStrengthSpans[0].style.color = "#111";
      passwordStrengthSpans[1].style.background = "#e6da44";
    } else {
      passwordStrengthSpans[0].innerText = "Strong";
      passwordStrengthSpans[0].style.color = "#fff";
      passwordStrengthSpans[1].style.background = "#20a820";
    }
  });
</script>
<?= $this->endSection() ?>