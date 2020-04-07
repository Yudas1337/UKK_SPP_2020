<?php
require_once __DIR__ . "/template/navbar.php";
require_once __DIR__ . "/helper/AdminSession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Spp</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mt-3">
                <h2>Tambah Spp</h2>
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

                                    <input type="text" name="tahun" autocomplete="off" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nominal</td>
                            <td>
                                <div class="form-group">

                                    <input type="text" name="nominal" autocomplete="off" class="form-control">
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
    if ($init->tambahSpp($_POST) > 0) {
        echo "<script>alert('berhasil tambah spp')</script>";
        echo "<script>document.location='spp.php'</script>";
    }
}

?>