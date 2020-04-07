<?php
require_once __DIR__ . "/template/navbar.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-12 mt-3">
            <h2>Selamat Datang <?= $_SESSION['nama_petugas']; ?></h2>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . "/template/footer.php";

?>