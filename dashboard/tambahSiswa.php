<?php
require_once __DIR__ . "/template/navbar.php";
$kelas  = $init->tampil("SELECT * FROM tb_kelas ");
$spp    = $init->tampil("SELECT * FROM tb_spp");
require_once __DIR__ . "/helper/AdminSession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-3">
                <h2>Tambah Siswa</h2>
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

                                    <input type="text" name="nisn" autocomplete="off" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="nis" autocomplete="off" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="nama" autocomplete="off" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>
                                <div class="form-group">

                                    <select name="id_kelas" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <?php foreach ($kelas as $k) : ?>
                                            <option value="<?= htmlspecialchars($k['id_kelas']); ?>"><?= htmlspecialchars($k['nama_kelas']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="alamat" autocomplete="off" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="no_telp" autocomplete="off" class="form-control">
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
                                            <option value="<?= htmlspecialchars($s['id_spp']); ?>"><?= htmlspecialchars($s['tahun']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
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
    if ($init->tambahSiswa($_POST) > 0) {
        echo "<script>alert('berhasil tambah siswa')</script>";
        echo "<script>document.location='siswa.php'</script>";
    }
}

?>