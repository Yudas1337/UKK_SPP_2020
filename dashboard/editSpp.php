<?php
require_once __DIR__ . "/template/navbar.php";
if (isset($_GET['id_spp'])) {
    $id = abs(intval($_GET['id_spp']));
    $hitung = $init->hitung("SELECT * FROM tb_spp WHERE id_spp = '$id'");
    if ($hitung > 0) {
        $sql = $init->tampil("SELECT * FROM tb_spp WHERE id_spp = '$id'")[0];
    } else {
        echo "<script>alert('Parameter tidak valid')</script>";
        echo "<script>document.location='spp.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('Parameter tidak valid')</script>";
    echo "<script>document.location='spp.php'</script>";
    exit;
}
require_once __DIR__ . "/helper/AdminSession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Spp</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-3">
                <h2>Edit Spp</h2>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <table class="table table-bordered">
                <form action="" method="POST">
                    <thead>
                        <tr>
                            <td>Tahun</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="tahun" autocomplete="off" class="form-control" value="<?= htmlspecialchars($sql['tahun']); ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nominal</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="nominal" autocomplete="off" class="form-control" value="<?= htmlspecialchars($sql['nominal']); ?>">
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
    if ($init->editSpp($id)) {
        echo "<script>alert('berhasil edit spp')</script>";
        echo "<script>document.location='spp.php'</script>";
    }
}

?>