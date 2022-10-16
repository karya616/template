<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Ganti Password</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <form id="form_submit" action="<?php echo site_url("/gantiPass"); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="id_user" value="<?= ($data) ? $data["id_user"] : "" ?>">
    <div class="modal-body">
      <div class="tab-content">
        <div class="row">
          <div class="col-md">
            <div class="form-group">
              <label>Password Lama</label>
              <div class="input-group">
                <input class="form-control" type="password" name="password_lama" placeholder="Masukkan password lama">
                <div class="input-group-prepend">
                  <button class="btn btn-light" type="button" onclick="seePass('password_lama')"><i id="password_lama" class="far fa-eye-slash"></i></button>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Password Baru</label>
              <div class="input-group">
                <input id="password" class="form-control" type="password" name="password" value="" placeholder="Masukkan password baru">
                <div class="input-group-prepend">
                  <button class="btn btn-light" type="button" onclick="seePass('password')"><i id="password" class="far fa-eye-slash"></i></button>
                </div>
              </div>
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
              <label>Verifikasi Password Baru</label>
              <div class="input-group">
                <input class="form-control" type="password" name="v_password" value="" placeholder="Masukkan verifikasi password baru">
                <div class="input-group-prepend">
                  <button class="btn btn-light" type="button" onclick="seePass('v_password')"><i id="v_password" class="far fa-eye-slash"></i></button>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="alert" id="response" hidden>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      <button type="submit" class="btn btn-success">Simpan</button>
    </div>
  </form>

</div>

<script>
  $('#form_submit').validate({
    submitHandler: function(form, event) {
      swal({
        title: 'Konfirmasi',
        text: 'Apakah anda ingin menyimpan perubahaan password ini?',
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
                  get_data();
                  $("#myModal").modal("hide");
                }
              });
            },
            dataType: 'json'
          });
        }
      });
    },
    rules: {
      password_lama: {
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
      password_lama: {
        required: "Wajib diisi!",
      },
      password: {
        required: "Wajib diisi!",
      },
      v_password: {
        equalTo: "Verifikasi password berbeda!",
      },
    }
  });

  $('#password').keyup(function(event) {
    var password = $('#password').val();
    checkPasswordStrength(password);
  });

  function seePass(name) {
    var type = $('[name=' + name + ']').get(0).type;
    if (type == "password") {
      $('[name=' + name + ']').get(0).type = 'text';
      $('#' + name + '').removeClass('far fa-eye-slash');
      $('#' + name + '').addClass('far fa-eye');
    } else {
      $('[name=' + name + ']').get(0).type = 'password';
      $('#' + name + '').removeClass('far fa-eye');
      $('#' + name + '').addClass('far fa-eye-slash');
    }
  }
</script>