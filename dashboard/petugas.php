<?php
require_once __DIR__ . "/template/navbar.php";
$sql = $init->tampil("SELECT * FROM tb_petugas");
require_once __DIR__ . "/helper/AdminSession.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Petugas</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-5">
                <h2>Halaman Petugas</h2>
            </div>
            <div class="col-12 col-lg-12 mb-3">
                <a href="<?= $init->base_url('dashboard/tambahPetugas.php') ?>" class="btn btn-primary">Tambah Data</a>
                <a href="<?= $init->base_url('dashboard/cetakPetugas.php') ?>" class="btn btn-success">Cetak Data</a>
            </div>


            <div class="col-12 col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Kode Petugas</th>
                            <th>username</th>
                            <th>nama petugas</th>
                            <th>level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($sql as $s) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= htmlspecialchars($s['kode_petugas']); ?></td>
                                <td><?= htmlspecialchars($s['username']); ?></td>
                                <td><?= htmlspecialchars($s['nama_petugas']); ?></td>
                                <td><?= htmlspecialchars($s['level']); ?></td>
                                <td>
                                    <a href="<?= $init->base_url('dashboard/editPetugas.php?id_petugas=' . htmlspecialchars($s['id_petugas'])) ?>" class="btn btn-success m-2">Edit</a>
                                    <a href="<?= $init->base_url('dashboard/hapusPetugas.php?id_petugas=' . htmlspecialchars($s['id_petugas'])) ?>" class="btn btn-danger" onclick="return confirm('apa yakin akan menghapus ini ?')">Hapus</a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    require_once __DIR__ . "/template/footer.php";


    ?>