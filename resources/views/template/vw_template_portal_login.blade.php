<html lang="en" class="wf-lato-n3-active wf-lato-n4-active wf-lato-n7-active wf-lato-n9-active wf-flaticon-n4-inactive wf-fontawesome5solid-n4-active wf-fontawesome5regular-n4-active wf-fontawesome5brands-n4-active wf-simplelineicons-n4-active wf-active">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
  <link rel="icon" href="assets/img/icon.ico" type="image/x-icon">

  <!-- Fonts and icons -->
  <script src="{{ url('assets/js/plugin/webfont/webfont.min.js') }}"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" media="all">
  <link rel="stylesheet" href="{{ url('assets/css/fonts.min.css') }}" media="all">
  <script>
    WebFont.load({
      google: {
        "families": ["Lato:300,400,700,900"]
      },
      custom: {
        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
        urls: ['assets/css/fonts.min.css']
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/atlantis.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css2/style.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/password-strength.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

  <script src="{{ url('assets/js/core/jquery.3.2.1.min.js') }}"></script>
  <script src="{{ url('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
  <script src="{{ url('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ url('assets/js/atlantis.min.js') }}"></script>
  <script src="{{ url('assets/js/select2.min.js') }}"></script>
  <script type="text/javascript" src="{{ url('assets/password-strength.js') }}"></script>


  <!-- jQuery Validate -->
  <script src="{{ url('assets/js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>
  <script src="{{ url('assets/js/plugin/jquery-validate/jquery.form.js') }}"></script>
  <script src="{{ url('assets/js/plugin/jquery-validate/additional-methods.min.js') }}"></script>
  <script src="{{ url('assets/js/plugin/jquery-validate/localization/messages_id.min.js') }}"></script>

  <!-- Sweet Alert -->
  <script src="{{ url('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

  <!-- reCAPTCHA -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <!-- loading -->
  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
</head>

<body class="login">
  @yield('content')
  @yield('javascript')
</body>

</html>