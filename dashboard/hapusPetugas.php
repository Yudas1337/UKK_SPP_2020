<?php
require_once __DIR__ . "/../functions.php";
if (isset($_GET['id_petugas'])) {

    if ($_SESSION['level'] != 'administrator') {
        echo "<script>alert('anda tidak punya akses')</script>";
        echo "<script>document.location='/ukk/index.php'</script>";
        exit;
    }
    $id = abs(intval($_GET['id_petugas']));
    $hitung = $init->hitung("SELECT * FROM tb_petugas WHERE id_petugas = '$id'");
    if ($hitung > 0) {
        $query = "DELETE FROM tb_petugas WHERE id_petugas = '$id'";
        if ($init->hapus($query)) {
            echo "<script>alert('berhasil hapus petugas')</script>";
            echo "<script>document.location='petugas.php'</script>";
        }
    } else {
        echo "<script>alert('Parameter tidak valid')</script>";
        echo "<script>document.location='petugas.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('Parameter tidak valid')</script>";
    echo "<script>document.location='petugas.php'</script>";
    exit;
}
require_once __DIR__ . "/helper/AdminSession.php";
