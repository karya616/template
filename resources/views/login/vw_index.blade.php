
@extends('template.vw_template_portal_login')



@section('content')


<div class="wrapper wrapper-login wrapper-login-full p-0">
  <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
    <div class="mb-2">
      <img src="{{ url('assets/portal_depan') }}/img/logo.png" alt="Logo" class="img-float">
    </div>
    <h1 class="title fw-bold text-white mb-3">E-KIN PEMDES</h1>
    <h1 class="fw-bold text-white op-7">(e-Kinerja Pemerintah Desa)</h1>
    <!-- <p class="subtitle text-white op-7">e-Kinerja Pemerintah Desa</p> -->
  </div>
  <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
    <div class="container container-login container-transparent animated fadeIn" style="display: block;">
      <h3 class="text-center">Login</h3>
      <form id="form_submit" action="" method="post">
        @csrf
        <div class="login-form">
          <div class="form-group">
            <label for="email" class="placeholder"><b></b></label>
            <input id="email" name="email" type="text" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="password" class="placeholder"><b>Password</b></label>
            <!-- <a href="#" class="link float-right">Forget Password ?</a> -->
            <div class="position-relative">
              <input id="password" name="password" type="password" class="form-control" required="">
              <div class="show-password" onclick="showPass()">
                <i id="icon-pass" class="far fa-eye-slash"></i>
              </div>
            </div>
          </div>
          <div class="form-group">
            <!-- Button trigger modal -->
            <a href="" id="forgotpass" class="link">
              Lupa Password?
            </a>
          </div>
          <div class="form-group">
            <div class="position-relative">
              <div class="g-recaptcha" data-sitekey="6LcHlOwgAAAAADBlHyrlTXZbiFILT1MjeQIfj1Cd"></div>
              <label id="grecaperrors" class="error d-none" for="grecaperrors"></label>
            </div>
          </div>
          <div class="form-group">
            <div id="response" class="alert" hidden></div>
          </div>
          <div class="form-group form-action-d-flex mb-3">
            <button type="submit" class="btn btn-secondary btn-block">Sign In</button>
          </div>
          <div class="login-account">
            <span class="msg">Belum punya akun ?</span>
            <a href="" id="show-signup" class="link">Daftar</a>
          </div>
        </div>
      </form>
    </div>
  </div>


</div>
</div>
@endsection

@section('javascript')
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

            if (res.success) {
              $('#response').removeAttr("hidden");
              $('#response').removeClass("alert-danger");
              $('#response').addClass("alert-success");
              $('#response').html(res.message).show();
              window.setTimeout(function() {
                window.location = res.url;
              }, 3000);
            } else {
              grecaptcha.reset();
              $('#response').removeAttr("hidden");
              $('#response').addClass("alert-danger");
              $('#response').html(res.message).show();
            }
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
      'username': {
        required: true,
      },
      password: {
        required: true
      },
      'g-recaptcha-response': {
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
      'g-recaptcha-response': {
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
@endsection