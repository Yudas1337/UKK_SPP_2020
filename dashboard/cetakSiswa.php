<?php
require_once __DIR__ . "/template/navbar.php";
$sql = $init->tampil("SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas JOIN tb_spp ON tb_siswa.id_spp = tb_spp.id_spp ");

require_once __DIR__ . "/helper/AdminSession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Siswa</title>
</head>

<body onload="tablePrinted()">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-5">
                <h2>Cetak Siswa</h2>
            </div>
            <div class="col-12 col-lg-12 mt-3">
                <table class="table table-bordered" border="1" id="tablePrinted">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nisn</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Spp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($sql as $s) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= htmlspecialchars($s['nisn']); ?></td>
                                <td><?= htmlspecialchars($s['nis']); ?></td>
                                <td><?= htmlspecialchars($s['nama']); ?></td>
                                <td><?= htmlspecialchars($s['nama_kelas']); ?></td>
                                <td><?= htmlspecialchars($s['alamat']); ?></td>
                                <td><?= htmlspecialchars($s['no_telp']); ?></td>
                                <td><?= htmlspecialchars($init->convertToRupiah($s['nominal'])); ?></td>
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
    <script>
        function tablePrinted() {
            let print = document.getElementById('tablePrinted');
            buka = window.open("");
            buka.document.write(print.outerHTML);
            buka.print();
            buka.close();
        }
    </script>