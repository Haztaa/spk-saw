<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url() ?>/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/libs/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center" style="background-color:#0E0C28;"><a href="#"><img src="<?= base_url() ?>assets/images/logo.png" style="width:80; height:80px; " style="" class="ml-4"></a><span class="splash-description text-center"> Silahkan Masuk</span></div>
            <div class="card-body">

                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('auth'); ?>" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" type="text" name="username" placeholder="Nama Pengguna" autocomplete="off">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="Kata Sandi">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">

                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block " style="background-color: #0E0C28;">Masuk</button>
                    <a href="<?= base_url('landing') ?>" class="btn btn-danger btn-lg btn-block ">Kembali</a>
                </form>
            </div>

        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?= base_url() ?>/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>