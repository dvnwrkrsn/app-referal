<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/dist/css/AdminLTE.min.css">

  <!-- JS -->
  <script src="<?= base_url(); ?>assets/template/js/jquery-3.6.0.min.js"></script>
  <script src="<?= base_url() ?>assets/template/back/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/template/js/app.min.js"></script>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <p><b>Pembayaran SPP</b></p>
      <p><b>SMA Plus Yaspida Sukabumi</b></p>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Login Administrator</p>

      <?= $this->session->flashdata('message'); ?>
      <form method="post" action="<?= base_url() ?>login/auth">


        <div class="form-group has-feedback">
          <input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off" value="<?= set_value('username'); ?>">
          <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
          <span class=" glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">

          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <script>
    $(document).ready(function() {
      $('#username').focus();

      <?php if (!empty($error_password)) { ?>
        $('#password').focus();
      <?php } ?>

    });
  </script>

</body>

</html>