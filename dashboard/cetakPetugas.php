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
    <title>Cetak Petugas</title>
</head>

<body onload="tablePrinted()">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-5">
                <h2>Cetak Petugas</h2>
            </div>


            <div class="col-12 col-lg-12 text-center">
                <table class="table table-bordered" border="1" id="tablePrinted">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Kode Petugas</th>
                            <th>username</th>
                            <th>nama petugas</th>
                            <th>level</th>
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