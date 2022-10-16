<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">

  <div class="container-xxl py-5 bg-primary hero-header-od mb-5">
    <div class="container my-5 px-lg-5">
      <div class="row g-5 py-5">
        <div class="col-12 text-center">
          <div class="card px-5 py-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
              <h2 class="mt-2">Daftar Akun</h2>
            </div>
            <div class="wow fadeInUp" data-wow-delay="0.3s">
              <form id="form_submit" action="<?php echo site_url("registrasi") ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="row g-3">
                  <div class="col-md-6">
                    <div class="form-floating" id="form_nama">
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" style="text-transform:uppercase">
                      <label for="nama">Nama Lengkap</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                      <label for="email">Email</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK" maxlength="16">
                      <label for="nik">NIK</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="number" class="form-control" id="nokk" name="nokk" placeholder="No KK" maxlength="16">
                      <label for="nokk">No KK</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="number" class="form-control" id="nohp" name="nohp" placeholder="No HP">
                      <label for="nohp">No HP</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">Daftar</button>
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
              location.href = "<?php echo base_url('/') ?>";
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
      nama: {
        required: true
      },
      nokk: {
        required: true,
      },
      email: {
        required: true
      },
      nohp: {
        required: true
      },
    },
    messages: {
      nik: {
        required: "Wajib diisi!"
      },
      nama: {
        required: "Wajib diisi!"
      },
      nokk: {
        required: "Wajib diisi!"
      },
      email: {
        required: "Wajib diisi!"
      },
      nohp: {
        required: "Wajib diisi!"
      },
    }
  });
</script>