<?php
require_once __DIR__ . "/../functions.php";
if (isset($_GET['id_siswa'])) {
    $id = abs(intval($_GET['id_siswa']));
    $hitung = $init->hitung("SELECT * FROM tb_siswa WHERE id_siswa = '$id'");
    if ($hitung > 0) {
        $query = "DELETE FROM tb_siswa WHERE id_siswa = '$id'";
        if ($init->hapus($query)) {
            echo "<script>alert('berhasil hapus siswa')</script>";
            echo "<script>document.location='siswa.php'</script>";
        }
    } else {
        echo "<script>alert('Parameter tidak valid')</script>";
        echo "<script>document.location='siswa.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('Parameter tidak valid')</script>";
    echo "<script>document.location='siswa.php'</script>";
    exit;
}
require_once __DIR__ . "/helper/AdminSession.php";
