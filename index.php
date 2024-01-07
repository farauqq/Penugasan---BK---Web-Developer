<?php

if (!isset($_SESSION)) {
  session_start();
}

include_once("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg py-3 navbar-dark " style="background-color: #0C4C93;">
        <div class="container d-flex align-items-center">
            <a class="navbar-brand" href="#">Poliklinik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                
                <?php
                if (isset($_SESSION['username'])) {
                    // Jika pengguna sudah login, tampilkan tombol "Logout"
                ?>
                    <ul class="navbar-nav d-flex align-items-lg-center ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="index.php?page=dokter">Dokter</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <button class="btn dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                                Dokter
                            </button>
                            <ul class="dropdown-menu dropdown-menu-light">
                                <li><a class="dropdown-item" href="index.php?page=dokter">Data Dokter</a></li>
                                <li><a class="dropdown-item" href="index.php?page=jadwalDokter">Jadwal Dokter</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php?page=poli">Poli</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php?page=obat">Obat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php?page=pasien">Pasien</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="Logout.php">Logout (<?php echo $_SESSION['username'] ?>)</a>
                        </li>
                    </ul>
                <?php
                } else {
                    // Jika pengguna belum login, tampilkan tombol "Login" dan "Register"
                ?>
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php?page=loginUser">Login</a>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
    

    <main role="main">
    <?php
    if (isset($_GET['page'])) {
        include($_GET['page'] . ".php");
    } else {
        echo "<div style='background-color: #0C4C93; padding: 120px 0; text-align: center; color: white; width: 100vw; '>
            <h1 class='display-5 fw-bolder text-white mb-2'>Sistem Temu Janji <br>Pasien - Dokter</h1>
            <p class='lead text-white-70 mb-4'>Bimbingan Karir 2023 Bidang Web</p>
            </div>";

        if (isset($_SESSION['username'])) {
            // Jika sudah login, tampilkan username
            echo "<h1 style='margin-top: 2rem; text-align: center; color: #0C4C93; font-family: Arial, sans-serif; font-size: 32px; font-weight: bold; '>Selamat Datang " . $_SESSION['username'] . "</h1>";

        } else {
            echo '<section  id="features">
                <div class="container px-5 my-5">
                    <div class="row g-5">
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"></div>
                            <h2 class="h4 fw-bolder">Login Sebagai Admin</h2>
                            <p>Apabila Anda adalah seorang Admin, silahkan Login terlebih dahulu untuk mengelola data website!</p>
                            <a class="text-decoration-none" href="index.php?page=loginUser">
                                Klik Link Berikut >
                            </a>
                        </div>
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"></div>
                            <h2 class="h4 fw-bolder">Login Sebagai Dokter</h2>
                            <p>Apabila Anda adalah seorang Dokter, silahkan Login terlebih dahulu untuk memulai melayani Pasien!</p>
                            <a class="text-decoration-none" href="index.php?page=loginDokter">
                                Klik Link Berikut >
                            </a>
                        </div>
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"></div>
                            <h2 class="h4 fw-bolder">Login Sebagai Pasien</h2>
                            <p>Apabila Anda adalah seorang Pasien, silahkan Login terlebih dahulu untuk mulai menggunakan layanan kami!</p>
                            <a class="text-decoration-none" href="index.php?page=cekRM">
                                Klik Link Berikut >
                            </a>
                        </div>
                    </div>
                </div>
            </section>';
        }
    }
    ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/71c2ab2c83.js" crossorigin="anonymous"></script>
  </body>
</html>