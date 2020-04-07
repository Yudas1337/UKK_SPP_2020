<?php
require_once __DIR__ . "/template/navbar.php";
require_once __DIR__ . "/helper/AdminSession.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Petugas</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-3">
                <h2>Tambah Petugas</h2>
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

                                    <input type="text" name="kode_petugas" autocomplete="off" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="username" autocomplete="off" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <div class="form-group">

                                    <input type="password" name="password" autocomplete="off" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Petugas</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="nama_petugas" autocomplete="off" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>
                                <div class="form-group">

                                    <select name="level" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="administrator">administrator</option>
                                        <option value="petugas">petugas</option>
                                        <option value="siswa">siswa</option>
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
    if ($init->tambahPetugas($_POST) > 0) {
        echo "<script>alert('berhasil tambah petugas')</script>";
        echo "<script>document.location='petugas.php'</script>";
    }
}

?>