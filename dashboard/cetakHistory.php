<?php
require_once __DIR__ . "/template/navbar.php";
if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] != 'siswa') {
        $sql = $init->tampil("SELECT * FROM tb_pembayaran JOIN tb_petugas ON tb_petugas.id_petugas = tb_pembayaran.id_petugas JOIN tb_siswa ON tb_siswa.nisn = tb_pembayaran.nisn AND tb_siswa.id_spp = tb_pembayaran.id_spp JOIN tb_spp ON tb_spp.id_spp = tb_siswa.id_spp");
    } else {
        echo "<script>alert('level tidak diketahui!')</script>";
        echo "<script>document.location='/ukk/index.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('anda tidak punya akses!')</script>";
    echo "<script>document.location='/ukk/index.php'</script>";
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak History Pembayaran</title>
</head>

<body onload="tablePrinted()">

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-3">
                <h2>Cetak History Pembayaran</h2>
            </div>

            <div class="col-12 col-lg-12">
                <table class="table table-bordered" border="1" id="tablePrinted">
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

<script>
    function tablePrinted() {
        let print = document.getElementById('tablePrinted');
        buka = window.open("");
        buka.document.write(print.outerHTML);
        buka.print();
        buka.close();
    }
</script>