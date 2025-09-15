<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Sistem Pendukung Keputusan Pemilihan Toko Penyewaan Tenda</title>

    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= base_url('assets/') ?>img/favicon.ico" type="image/x-icon">
</head>

<body class="bg-white">
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-success shadow-lg pb-3 pt-3 font-weight-bold">
        <div class="container">
            <a class="navbar-brand text-white mx-auto text-center" style="font-weight: 900;" href="<?= base_url('') ?>"> <i class="fa fa-database mr-2 rotate-n-15"></i> Sistem Pendukung Keputusan Pemilihan Toko Penyewaan Tenda</a>
        </div>
    </nav>

    <div class="container">
        <div class="row d-plex justify-content-between mt-2">
            <div class="col-xl-5 col-lg-5 col-md-5 mt-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Account</h1>
                                        <img src="assets/img/mapala.png" alt="" width="60%" style="margin-bottom: 15px;">
                                    </div>
                                    <?php $error = $this->session->flashdata('message');
                                    if ($error) { ?>
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <?php echo $error; ?>
                                        </div>
                                    <?php } ?>

                                    <form class="user" action="<?php echo site_url('Login/login'); ?>" method="post">
                                        <div class="form-group">
                                            <input required autocomplete="off" type="text" class="form-control form-control-user" id="exampleInputUser" placeholder="Username" name="username" />
                                        </div>
                                        <div class="form-group">
                                            <input required autocomplete="off" type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" />
                                        </div>
                                        <button name="submit" type="submit" class="btn btn-success btn-user btn-block"><i class="fas fa-fw fa-sign-in-alt mr-1"></i> Masuk</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 mt-5">
                <div class="card bg-none o-hidden border-0 my-5 text-gray-900" style="background: none;">
                    <div class="text-justify card-body p-0">
                        <h3 style="font-weight: 800;">Sistem Pendukung Keputusan</h3>
                        <h5 class="pt-4">
                            Sistem Pendukung Keputusan (SPK) merupakan suatu sistem informasi spesifik yang ditujukan untuk membantu manajemen dalam mengambil keputusan yang berkaitan dengan persoalan yang bersifat semi terstruktur.
                        </h5>
                        <h5 class="pt-4">
                            Langkah penggunaan aplikasi bagi admin : <br>
                            1. Login menggunakan username dan password yang sesuai <br>
                            2. Inputkan kriteria pada menu kriteria <br>
                            3. Lakukan Penilaian sesuai dengan data setiap alternatif <br>
                            4. Lihat hasil perhitungan dan lakukan cetak laporan hasil bila diperlukan <br>
                        </h5>
                        <h5 class="pt-4">
                            Langkah penggunaan aplikasi bagi user : <br>
                            1. Login menggunakan username dan password yang sesuai <br>
                            2. Inputkan alternatif pada menu alternatif <br>
                            3. Lakukan Penilaian sesuai dengan data setiap alternatif <br>
                            4. Lihat hasil akhir dan lakukan cetak laporan hasil bila diperlukan <br>
                        </h5>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
</body>

</html>