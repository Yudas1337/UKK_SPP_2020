<?php
require_once __DIR__ . "/template/navbar.php";
if (isset($_GET['id_petugas'])) {
    $id = abs(intval($_GET['id_petugas']));
    $hitung = $init->hitung("SELECT * FROM tb_petugas WHERE id_petugas = '$id'");
    if ($hitung > 0) {
        $sql = $init->tampil("SELECT * FROM tb_petugas WHERE id_petugas = '$id'")[0];
    } else {
        echo "<script>alert('Parameter tidak valid')</script>";
        echo "<script>document.location='petugas.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('Parameter tidak valid')</script>";
    echo "<script>document.location='petugas.php'</script>";
    exit;
}
require_once __DIR__ . "/helper/AdminSession.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Petugas</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-3">
                <h2>Edit Petugas</h2>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <table class="table table-bordered">
                <form action="" method="POST">
                    <thead>
                        <tr>
                            <td>Kode Petugas</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="kode_petugas" autocomplete="off" class="form-control" value="<?= htmlspecialchars($sql['kode_petugas']); ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="username" autocomplete="off" class="form-control" value="<?= htmlspecialchars($sql['username']); ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <div class="form-group">

                                    <input type="password" name="password" autocomplete="off" class="form-control" value="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Petugas</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="nama_petugas" autocomplete="off" class="form-control" value="<?= htmlspecialchars($sql['nama_petugas']); ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>
                                <div class="form-group">

                                    <select name="level" class="form-control">
                                        <option value="administrator" <?= $data = (htmlspecialchars($sql['level']) == 'administrator') ? 'selected' : '' ?>>administrator</option>
                                        <option value="petugas" <?= $data = (htmlspecialchars($sql['level']) == 'petugas') ? 'selected' : '' ?>>petugas</option>
                                        <option value="siswa" <?= $data = (htmlspecialchars($sql['level']) == 'siswa') ? 'selected' : '' ?>>siswa</option>
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
    if ($init->editPetugas($id)) {
        echo "<script>alert('berhasil edit petugas')</script>";
        echo "<script>document.location='petugas.php'</script>";
    }
}

?>