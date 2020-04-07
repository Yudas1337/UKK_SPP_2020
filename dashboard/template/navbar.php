<?php
require_once __DIR__ . "/../../functions.php";

if (!isset($_SESSION['nama_petugas'])) {
    echo "<script>alert('anda tidak punya akses!')</script>";
    echo "<script>document.location='/ukk/index.php'</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<header>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="navId">
        <li class="nav-item">
            <a href="<?= $init->base_url('dashboard/') ?>" class="nav-link">Home</a>
        </li>
        <?php if (isset($_SESSION['level'])) : ?>
            <?php if ($_SESSION['level'] == 'administrator') : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        Master
                    </a>
                    <div class="dropdown-menu">
                        <a href="<?= $init->base_url('dashboard/siswa.php') ?>" class="dropdown-item">Data Siswa</a>
                        <a href="<?= $init->base_url('dashboard/petugas.php') ?>" class="dropdown-item">Data Petugas</a>
                        <a href="<?= $init->base_url('dashboard/kelas.php') ?>" class="dropdown-item">Data Kelas</a>
                        <a href="<?= $init->base_url('dashboard/spp.php') ?>" class="dropdown-item">Data Spp</a>
                    </div>
                </li>
            <?php endif; ?>
            <?php if ($_SESSION['level'] == 'petugas' || $_SESSION['level'] == 'administrator') : ?>
                <li class="nav-item">
                    <a href="<?= $init->base_url('dashboard/pembayaran.php') ?>" class="nav-link">Entri transaksi Pembayaran</a>
                </li>
            <?php endif; ?>
            <?php if ($_SESSION['level'] == 'petugas' || $_SESSION['level'] == 'siswa' || $_SESSION['level'] == 'administrator') : ?>
                <li class="nav-item">
                    <a href="<?= $init->base_url('dashboard/history.php') ?>" class="nav-link">Lihat history pembayaran</a>
                </li>
            <?php endif; ?>

            <li class="nav-item">
                <a href="<?= $init->base_url('dashboard/logout.php') ?>" class="nav-link" onclick="return confirm('apa yakin akan logout?')">Logout</a>
            </li>
        <?php endif; ?>

    </ul>


</header>

<body>