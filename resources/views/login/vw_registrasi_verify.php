<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">

  <div class="container-xxl py-5 bg-primary hero-header-od mb-5">
    <div class="container my-5 px-lg-5">
      <div class="row g-5 py-5">
        <div class="col-12 text-center">
          <div class="card px-5 py-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
              <h2 class="mt-2">Verifikasi Akun</h2>
            </div>
            <div class="wow fadeInUp" data-wow-delay="0.3s">
              <form id="form_submit" action="<?php echo site_url("registrasiVerify") ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input name="id" value="<?php echo $data['id']; ?>" hidden>
                <input name="verification_token" value="<?php echo $data['verification_token']; ?>" hidden>
                <div class="row g-3">
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="nik" class="form-control" id="nik" name="nik" value="<?php echo $data['nik']; ?>" placeholder="nik" disabled>
                      <label for="nik">Nik</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="nama_lengkap" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" placeholder="Nama" disabled>
                      <label for="nama_lengkap">Nama</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="desakel" class="form-control" id="desakel" name="desakel" value="<?php echo $data['ket_desa']; ?>" placeholder="desakel" disabled>
                      <label for="desakel">Desa/Kelurahan</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="jabatan" class="form-control" id="jabatan" name="jabatan" value="<?php echo $data['jabatan']; ?>" placeholder="jabatan" disabled>
                      <label for="jabatan">Jabatan</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">Aktivkan Akun</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Navbar & Hero End -->

<script>
  $('#form_submit').validate({
    submitHandler: function(form, event) {
      $.LoadingOverlay("show");
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
    },
    rules: {
      nik: {
        required: true,
      },
    },
    messages: {
      nik: {
        required: "Wajib diisi!"
      },
    }
  });
</script>