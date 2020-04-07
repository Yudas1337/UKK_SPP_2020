<?php
require_once __DIR__ . "/template/navbar.php";
require_once __DIR__ . "/helper/TransaksiSession.php";

$siswa = $init->tampil("SELECT * FROM tb_siswa");
$spp = $init->tampil("SELECT * FROM tb_spp");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entri Transaksi Pembayaran</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-3">
                <h2>Entri Transaksi Pembayaran</h2>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <table class="table table-bordered">
                <form action="" method="POST">
                    <thead>

                        <tr>
                            <td>NISN / Nama Siswa</td>
                            <td>
                                <div class="form-group">

                                    <select name="nisn" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <?php foreach ($siswa as $s) : ?>
                                            <option value="<?= htmlspecialchars($s['nisn']); ?>"><?= htmlspecialchars($s['nisn']) . " / " . htmlspecialchars($s['nama']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Dibayar</td>
                            <td>
                                <div class="form-group">

                                    <input type="date" name="tgl_bayar" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Bulan Dibayar</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="bulan_dibayar" class="form-control" autocomplete="off">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Tahun Dibayar</td>
                            <td>
                                <div class="form-group">

                                    <input type="number" name="tahun_dibayar" class="form-control" autocomplete="off">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>SPP</td>
                            <td>
                                <div class="form-group">

                                    <select name="id_spp" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <?php foreach ($spp as $s) : ?>
                                            <option value="<?= htmlspecialchars($s['id_spp']); ?>"><?= htmlspecialchars($s['tahun']) . " / " . htmlspecialchars($init->convertToRupiah($s['nominal'])); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Bayar</td>
                            <td>
                                <div class="form-group">

                                    <input type="number" name="jumlah_bayar" class="form-control" autocomplete="off">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                            </td>
                        </tr>
                    </thead>
                </form>

            </table>
        </div>
    </div>

</body>

</html>

<?php
require_once __DIR__ . "/template/footer.php";

if (isset($_POST['submit'])) {
    if ($init->addTransaksi($_POST) > 0) {
        echo "<script>alert('berhasil entri transaksi')</script>";
        echo "<script>document.location='history.php'</script>";
    }
}

?>