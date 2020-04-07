<?php
require_once __DIR__ . "/../../configuration.php";

class TransaksiSession extends config
{
    function __construct()
    {
        parent::__construct();
        $this->sessionCheck();
    }

    public function sessionCheck()
    {
        if (isset($_SESSION['level'])) {
            if ($_SESSION['level'] == 'siswa') {
                echo "<script>alert('anda tidak punya akses!')</script>";
                echo "<script>document.location='/ukk/index.php'</script>";
                exit;
            }
        }
    }
}

$transaksi = new TransaksiSession;
