<?php
require_once __DIR__ . "/template/navbar.php";
$kelas  = $init->tampil("SELECT * FROM tb_kelas ");
$spp    = $init->tampil("SELECT * FROM tb_spp");

if (isset($_GET['id_siswa'])) {
    $id_siswa = $init->escape_string($_GET['id_siswa']);
    $hitung = $init->hitung("SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa'");
    if ($hitung > 0) {
        $sql = $init->tampil("SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa'")[0];
    } else {
        echo "<script>alert('data tidak ditemukan')</script>";
        echo "<script>document.location='siswa.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('Parameter tidak valid')</script>";
    echo "<script>document.location='siswa.php'</script>";
    exit;
}
require_once __DIR__ . "/helper/AdminSession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-3">
                <h2>Edit Siswa</h2>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <table class="table table-bordered">
                <form action="" method="POST">
                    <thead>
                        <tr>
                            <td>NISN</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="nisn" autocomplete="off" class="form-control" value="<?= htmlspecialchars($sql['nisn']) ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="nis" autocomplete="off" class="form-control" value="<?= htmlspecialchars($sql['nis']) ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="nama" autocomplete="off" class="form-control" value="<?= htmlspecialchars($sql['nama']) ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>
                                <div class="form-group">

                                    <select name="id_kelas" class="form-control">
                                        <?php foreach ($kelas as $k) : ?>
                                            <option value="<?= htmlspecialchars($k['id_kelas']); ?>" <?= $data = ($sql['id_kelas'] == $k['id_kelas'] ? 'selected' : '') ?>><?= htmlspecialchars($k['nama_kelas']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="alamat" autocomplete="off" class="form-control" value="<?= htmlspecialchars($sql['alamat']); ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="no_telp" autocomplete="off" class="form-control" value="<?= htmlspecialchars($sql['no_telp']); ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>SPP</td>
                            <td>
                                <div class="form-group">

                                    <select name="id_spp" class="form-control">
                                        <?php foreach ($spp as $s) : ?>
                                            <option value="<?= htmlspecialchars($s['id_spp']); ?>" <?= $data = ($sql['id_spp'] == $s['id_spp']) ? 'selected' : '' ?>><?= htmlspecialchars($s['tahun']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
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
    if ($init->editSiswa($id_siswa) > 0) {
        echo "<script>alert('berhasil edit siswa')</script>";
        echo "<script>document.location='siswa.php'</script>";
    }
}

?>