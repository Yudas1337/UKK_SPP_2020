<?php
require_once __DIR__ . "/template/navbar.php";
if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] != 'siswa') {

        if (isset($_POST['cari'])) {
            $cari = $init->escape_string(trim(htmlspecialchars($_POST['search'])));
            $sql = $init->cariHistory($cari);
        } else {

            $sql = $init->tampil("SELECT * FROM tb_pembayaran JOIN tb_petugas ON tb_petugas.id_petugas = tb_pembayaran.id_petugas JOIN tb_siswa ON tb_siswa.nisn = tb_pembayaran.nisn AND tb_siswa.id_spp = tb_pembayaran.id_spp JOIN tb_spp ON tb_spp.id_spp = tb_siswa.id_spp");
        }
    } elseif ($_SESSION['level'] == 'siswa') {
        $kode_petugas = $_SESSION['kode_petugas'];
        $uniq = $init->tampil("SELECT * FROM tb_siswa WHERE nisn = '$kode_petugas' ")[0];
        $nisn = $uniq['nisn'];
        $sql = $init->tampil("SELECT * FROM tb_pembayaran JOIN tb_petugas ON tb_petugas.id_petugas = tb_pembayaran.id_petugas JOIN tb_siswa ON tb_siswa.nisn = tb_pembayaran.nisn AND tb_siswa.id_spp = tb_pembayaran.id_spp JOIN tb_spp ON tb_spp.id_spp = tb_siswa.id_spp WHERE tb_pembayaran.nisn = '$kode_petugas' ");
    } else {
        echo "<script>alert('level tidak diketahui!')</script>";
        echo "<script>document.location='/ukk/index.php'</script>";
        exit;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pembayaran</title>
</head>

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-12 mt-3">
            <h2>History Pembayaran</h2>
        </div>
        <?php if ($_SESSION['level'] != 'siswa') : ?>
            <div class="col-12 col-lg-12 mb-3">
                <a href="<?= $init->base_url('dashboard/cetakHistory.php') ?>" class="btn btn-success">Cetak Data</a>
            </div>
        <?php endif; ?>
        <?php if ($_SESSION['level'] == 'administrator' || $_SESSION['level'] == 'petugas') : ?>
            <div class="col-12 col-lg-6">
                <form action="" method="POST">
                    <input type="text" name="search" class="form-control" autocomplete="off" placeholder="cari nisn">
                    <button type="submit" name="cari" class="btn btn-primary mt-3 mb-3">Search</button>
                </form>
            </div>
        <?php endif; ?>
        <div class="col-12 col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Petugas</th>
                        <th>NISN</th>
                        <th>Tanggal Bayar</th>
                        <th>Bulan Bayar</th>
                        <th>Tahun Bayar</th>
                        <th>SPP</th>
                        <th>Jumlah Bayar</th>
                        <?php if ($_SESSION['level'] == 'administrator' || $_SESSION['level'] == 'petugas') : ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>

                    <?php foreach ($sql as $s) : ?>

                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= htmlspecialchars($s['nama_petugas']) . " / " . htmlspecialchars($s['level']); ?></td>
                            <td><?= htmlspecialchars($s['nisn']); ?></td>
                            <td><?= htmlspecialchars($s['tgl_bayar']); ?></td>
                            <td><?= htmlspecialchars($s['bulan_dibayar']); ?></td>
                            <td><?= htmlspecialchars($s['tahun_dibayar']); ?></td>
                            <td><?= htmlspecialchars($init->convertToRupiah($s['nominal'])); ?></td>
                            <td><?= htmlspecialchars($init->convertToRupiah($s['jumlah_bayar'])); ?></td>
                            <td>
                                <?php if ($_SESSION['level'] == 'administrator' || $_SESSION['level'] == 'petugas') : ?>
                                    <a href="<?= $init->base_url('dashboard/hapusPembayaran.php?id_pembayaran=' . htmlspecialchars($s['id_pembayaran'])) ?>" class="btn btn-danger" onclick="return confirm('apa yakin akan menghapus ini ?')">Hapus</a>
                                <?php endif; ?>
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