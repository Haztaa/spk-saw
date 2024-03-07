<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Pemilihan Monitor</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->

  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/bootstrap.min.css">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/font-awesome.min.css">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/owl.carousel.css">
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/owl.theme.css">
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/owl.transitions.css">
  <!-- meanmenu CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/meanmenu/meanmenu.min.css">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/animate.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/normalize.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- jvectormap CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/jvectormap/jquery-jvectormap-2.0.3.css">

  <!-- notika icon CSS
		============================================ -->
  <!-- wave CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/wave/waves.min.css">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/main.css">
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/notika-custom-icon.css">
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/dropzone/dropzone.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>/style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="<?= base_url('assets/landing/') ?>js/vendor/modernizr-2.8.3.min.js"></script>
  <script src="<?= base_url('assets/landing/') ?>js/vendor/jquery-1.12.4.min.js"></script>
</head>

<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
  <!-- Start Header Top Area -->
  <div class="header-top-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="">
            <a href="#"><img src="<?= base_url('assets/') ?>images/logo.png" alt="" style="width:100px; height:100px;"></a>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

          <ul class="nav navbar-nav notika-top-nav" style="margin-top: 20px;">
            <li class="nav-item ">
              <a href="<?= base_url('auth') ?>" class="btn"><span>Masuk</span></a>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </div>
  <?php error_reporting(0); ?>
  <script>
    function show() {

      $("#hasil").toggle('fade');
    }
  </script>