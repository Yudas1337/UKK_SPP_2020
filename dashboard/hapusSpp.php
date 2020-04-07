<?php
require_once __DIR__ . "/../functions.php";
if (isset($_GET['id_spp'])) {
    if ($_SESSION['level'] != 'administrator') {
        echo "<script>alert('anda tidak punya akses')</script>";
        echo "<script>document.location='/ukk/index.php'</script>";
        exit;
    }
    $id = abs(intval($_GET['id_spp']));
    $hitung = $init->hitung("SELECT * FROM tb_spp WHERE id_spp = '$id'");
    if ($hitung > 0) {
        $query = "DELETE FROM tb_spp WHERE id_spp = '$id'";
        if ($init->hapus($query)) {
            echo "<script>alert('berhasil hapus spp')</script>";
            echo "<script>document.location='spp.php'</script>";
        }
    } else {
        echo "<script>alert('Parameter tidak valid')</script>";
        echo "<script>document.location='spp.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('Parameter tidak valid')</script>";
    echo "<script>document.location='spp.php'</script>";
    exit;
}
require_once __DIR__ . "/helper/AdminSession.php";
