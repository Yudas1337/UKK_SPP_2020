<?php

require_once __DIR__ . "/../functions.php";

if (isset($_SESSION['nama_petugas'])) {

    $init->logout();
} else {
    echo "<script>alert('anda tidak punya akses!')</script>";
    exit;
}
