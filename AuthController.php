<?php

require_once __DIR__ . "/configuration.php";

class AuthController extends config
{

    function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $username = trim(htmlspecialchars($_POST['username']));
        $password = trim(htmlspecialchars($_POST['password']));

        if (!$username) {
            echo "<script>alert('username tidak boleh kosong')</script>";
        } elseif (!$password) {
            echo "<script>alert('password tidak boleh kosong')</script>";
        } else {
            $this->cek_login($username, $password);
        }
    }

    private function cek_login($username, $password)
    {
        $username   = $this->db->real_escape_string($username);
        $password   = $this->db->real_escape_string($password);

        $cek = $this->db->query("SELECT * FROM tb_petugas WHERE username = '$username' ");
        $hitung = $cek->num_rows;
        $assoc = $cek->fetch_assoc();

        if ($hitung > 0) {
            if (password_verify($password, $assoc['password'])) {
                $_SESSION['tb_petugas'] = TRUE;
                $_SESSION['kode_petugas'] = $assoc['kode_petugas'];
                $_SESSION['id_petugas'] = $assoc['id_petugas'];
                $_SESSION['username'] = $assoc['username'];
                $_SESSION['nama_petugas'] = $assoc['nama_petugas'];
                $_SESSION['level'] = $assoc['level'];

                echo "<script>document.location='/ukk/dashboard/index.php'</script>";
            } else {
                echo "<script>alert('password tidak cocok')</script>";
            }
        } else {
            echo "<script>alert('username atau password salah')</script>";
        }
    }
}

$auth = new AuthController();
