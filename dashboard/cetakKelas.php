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

<body onload="tablePrinted()">

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-3">
                <h2>Cetak Kelas</h2>
            </div>

            <div class="col-12 col-lg-12">
                <table class="table table-bordered" border="1" id="tablePrinted">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Kompetensi Keahlian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($sql as $s) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= htmlspecialchars($s['nama_kelas']); ?></td>
                                <td><?= htmlspecialchars($s['kompetensi_keahlian']); ?></td>

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