<?php
require_once __DIR__ . "/template/navbar.php";
$sql = $init->tampil("SELECT * FROM tb_kelas");
require_once __DIR__ . "/helper/AdminSession.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Kelas</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-3">
                <h2>Halaman Kelas</h2>
            </div>
            <div class="col-12 col-lg-12 mb-3">
                <a href="<?= $init->base_url('dashboard/tambahKelas.php') ?>" class="btn btn-primary">Tambah Data</a>
                <a href="<?= $init->base_url('dashboard/cetakKelas.php') ?>" class="btn btn-success">Cetak Data</a>
            </div>

            <div class="col-12 col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Kompetensi Keahlian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($sql as $s) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= htmlspecialchars($s['nama_kelas']); ?></td>
                                <td><?= htmlspecialchars($s['kompetensi_keahlian']); ?></td>
                                <td>
                                    <a href="<?= $init->base_url('dashboard/editKelas.php?id_kelas=' . htmlspecialchars($s['id_kelas'])) ?>" class="btn btn-success">Edit</a>
                                    <a href="<?= $init->base_url('dashboard/hapusKelas.php?id_kelas=' . htmlspecialchars($s['id_kelas'])) ?>" class="btn btn-danger" onclick="return confirm('apa yakin akan menghapus ini ?')">Hapus</a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>


<?php
require_once __DIR__ . "/template/footer.php";

?>