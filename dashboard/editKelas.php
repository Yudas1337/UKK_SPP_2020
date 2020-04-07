<?php
require_once __DIR__ . "/template/navbar.php";
if (isset($_GET['id_kelas'])) {
    $id = abs(intval($_GET['id_kelas']));
    $hitung = $init->hitung("SELECT * FROM tb_kelas WHERE id_kelas = '$id'");
    if ($hitung > 0) {
        $sql = $init->tampil("SELECT * FROM tb_kelas WHERE id_kelas = '$id'")[0];
    } else {
        echo "<script>alert('Parameter tidak valid')</script>";
        echo "<script>document.location='kelas.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('Parameter tidak valid')</script>";
    echo "<script>document.location='kelas.php'</script>";
    exit;
}
require_once __DIR__ . "/helper/AdminSession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-3">
                <h2>Tambah Kelas</h2>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <table class="table table-bordered">
                <form action="" method="POST">
                    <thead>
                        <tr>
                            <td>Nama Kelas</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="nama_kelas" autocomplete="off" class="form-control" value="<?= $sql['nama_kelas']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kompetensi Keahlian</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="kompetensi_keahlian" autocomplete="off" class="form-control" value="<?= $sql['kompetensi_keahlian']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="submit" class="btn btn-primary">Edit Data</button>
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
    if ($init->editKelas($id)) {
        echo "<script>alert('berhasil update kelas')</script>";
        echo "<script>document.location='kelas.php'</script>";
    }
}

?>