<?php
require_once __DIR__ . "/../functions.php";
if (isset($_GET['id_kelas'])) {
    $id = abs(intval($_GET['id_kelas']));
    $hitung = $init->hitung("SELECT * FROM tb_kelas WHERE id_kelas = '$id'");
    if ($hitung > 0) {
        $query = "DELETE FROM tb_kelas WHERE id_kelas = '$id'";
        if ($init->hapus($query)) {
            echo "<script>alert('berhasil hapus kelas')</script>";
            echo "<script>document.location='kelas.php'</script>";
        }
    } else {
        echo "<script>alert('Parameter tidak valid')</script>";
        echo "<script>document.location='kelas.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('Parameter tidak valid')</script>";
    echo "<script>document.location='kelas.php'</script>";
    exit;
}
require_once __DIR__ . "/helper/AdminSession.php";
