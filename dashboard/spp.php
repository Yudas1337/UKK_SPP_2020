<?php
require_once __DIR__ . "/template/navbar.php";
$sql = $init->tampil("SELECT * FROM tb_spp");
require_once __DIR__ . "/helper/AdminSession.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman SPP</title>
</head>

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-12 mt-3">
            <h2>Halaman SPP</h2>
        </div>
        <div class="col-12 col-lg-12 mb-3">
            <a href="<?= $init->base_url('dashboard/tambahSpp.php') ?>" class="btn btn-primary">Tambah Data</a>
            <a href="<?= $init->base_url('dashboard/cetakSpp.php') ?>" class="btn btn-success">Cetak Data</a>
        </div>

        <div class="col-12 col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($sql as $s) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= htmlspecialchars($s['tahun']); ?></td>
                            <td><?= htmlspecialchars($init->convertToRupiah($s['nominal'])); ?></td>
                            <td>
                                <a href="<?= $init->base_url('dashboard/editSpp.php?id_spp=' . htmlspecialchars($s['id_spp'])) ?>" class="btn btn-success m-2">Edit</a>
                                <a href="<?= $init->base_url('dashboard/hapusSpp.php?id_spp=' . htmlspecialchars($s['id_spp'])) ?>" class="btn btn-danger" onclick="return confirm('apa yakin akan menghapus ini ?')">Hapus</a>
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