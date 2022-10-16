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
      <h3 class="text-center">Daftar Akun</h3>
      <form id="form_submit" action="<?php echo site_url("registrasi") ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="form-group" id="form_nik">
          <label for="nik">Nik</label>
          <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK">
        </div>
        <div class="form-group" id="form_nama">
          <label for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" style="text-transform:uppercase">
        </div>
        <div class="form-group">
          <label for="id_desa">Pilih Desa Atau Kelurahan</label>
          <select class="form-control" name="id_desa" id="desa" required>
            <option value=""></option>
            <?php foreach ($getdesa as $value) { ?>
              <option value="<?= $value['id_desa']; ?>"><?= $value['ket_desa']; ?></option>
            <?php } ?>


          </select>
        </div>
        <div class="form-group" id="form_nama">
          <label for="id_jabatan">Jabatan</label>
          <select class="form-control" name="id_jabatan" id="id_jabatan" required>

          </select>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">

        </div>
        <div class="form-group">
          <label for="ktp">Bukti KTP</label>
          <input type="file" class="form-control" id="ktp" name="ktp" placeholder="KTP">
        </div>
        <div class="form-group">
          <label for="sk">Bukti SK</label>
          <input type="file" class="form-control" id="sk" name="sk" placeholder="SK">
        </div>


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
          <button class="btn btn-secondary btn-block" type="submit">Daftar</button>
        </div>
        <div class="login-account">
          <a href="<?= base_url('login') ?>" id="show-login" class="link">Login Disini</a>
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
        remote: {
          url: "<?php echo site_url("checkNik") ?>",
          type: "post",
          data: {
            nik: function() {
              return $("[name=nik]").val();
            }
          },
        }
      },
      email: {
        required: true,
        remote: {
          url: "<?php echo site_url("checkEmail") ?>",
          type: "post",
          data: {
            email: function() {
              return $("[name=email]").val();
            }
          },
        }
      },
      nohp: {
        required: true
      },
      password: {
        required: true
      },
      v_password: {
        equalTo: "[name=password]"
      }
    },
    messages: {
      nik: {
        required: "Wajib diisi!",
        remote: "Nik Sudah Terdaftar!"
      },
      email: {
        required: "Wajib diisi!",
        remote: "Email telah digunakan! Mohon gunakan email lain!"
      },
      nohp: {
        required: "Wajib diisi!"
      },
      password: {
        required: "Wajib diisi!",
      },
      v_password: {
        equalTo: "Verifikasi password berbeda!",
      },
    }
  });

  $('#desa').select2({
    placeholder: "Pilih Desa",
    theme: "bootstrap-5"
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



  function FormSelectGolongan() {
    var output = [];
    output.push('<option value="">Pilih Golongan</option>');
    $.getJSON('/Login/ambilDataGolongan', function(data) {
      $.each(data, function(key, value) {
        output.push('<option value="' + value.id_jabatan + '">' + value.jabatan + '</option>');
      })

      $('#id_jabatan').html(output.join(''));
    })
  }
</script>
<?= $this->endSection() ?>