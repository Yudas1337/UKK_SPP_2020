<?php
require_once __DIR__ . "/../functions.php";
if (isset($_GET['id_pembayaran'])) {
    if ($_SESSION['level'] != 'administrator' || $_SESSION['level'] != 'petugas') {
        echo "<script>alert('anda tidak punya akses')</script>";
        echo "<script>document.location='/ukk/index.php'</script>";
        exit;
    }
    $id = abs(intval($_GET['id_pembayaran']));
    $hitung = $init->hitung("SELECT * FROM tb_pembayaran WHERE id_pembayaran = '$id'");
    if ($hitung > 0) {
        $query = "DELETE FROM tb_pembayaran WHERE id_pembayaran = '$id'";
        if ($init->hapus($query)) {
            echo "<script>alert('berhasil hapus history')</script>";
            echo "<script>document.location='history.php'</script>";
        }
    } else {
        echo "<script>alert('Parameter tidak valid')</script>";
        echo "<script>document.location='history.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('Parameter tidak valid')</script>";
    echo "<script>document.location='history.php'</script>";
    exit;
}
