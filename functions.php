<?php

require_once __DIR__ . "/configuration.php";


class fungsi extends config
{
    private $base_url = "http://localhost/ukk/";

    function __construct()
    {
        parent::__construct();
    }

    public function escape_string($str)
    {
        return $this->db->real_escape_string($str);
    }

    public function hitung($query)
    {
        $sql = $this->db->query($query);
        return $sql->num_rows;
    }

    public function base_url($url = null)
    {
        return $this->base_url . $url;
    }

    public function tampil($query)
    {
        $sql = $this->db->query($query);
        $arr = array();
        while ($row = $sql->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }

    public function convertToRupiah($nominal)
    {
        $rupiah = "Rp " . number_format($nominal, 2, ',', '.');
        return $rupiah;
    }

    public function hapus($query)
    {
        return $this->db->query($query);
    }

    public function cariHistory($cari)
    {
        $sql = "SELECT * FROM tb_pembayaran JOIN tb_petugas ON tb_petugas.id_petugas = tb_pembayaran.id_petugas JOIN tb_siswa ON tb_siswa.nisn = tb_pembayaran.nisn AND tb_siswa.id_spp = tb_pembayaran.id_spp JOIN tb_spp ON tb_spp.id_spp = tb_siswa.id_spp WHERE tb_pembayaran.nisn LIKE '%$cari%' ";

        return $this->tampil($sql);
    }


    public function tambahKelas()
    {
        $nama_kelas = trim(htmlspecialchars($_POST['nama_kelas']));
        $kompetensi_keahlian = trim(htmlspecialchars($_POST['kompetensi_keahlian']));

        if (!$nama_kelas) {
            echo "<script>alert('nama kelas tidak boleh kosong')</script>";
        } elseif (!$kompetensi_keahlian) {
            echo "<script>alert('kompetensi keahlian tidak boleh kosong')</script>";
        } else {
            return $this->db->query("INSERT INTO tb_kelas VALUES(NULL,'$nama_kelas','$kompetensi_keahlian') ");
        }
    }

    public function editKelas($id)
    {
        $nama_kelas = trim(htmlspecialchars($_POST['nama_kelas']));
        $kompetensi_keahlian = trim(htmlspecialchars($_POST['kompetensi_keahlian']));

        if (!$nama_kelas) {
            echo "<script>alert('nama kelas tidak boleh kosong')</script>";
        } elseif (!$kompetensi_keahlian) {
            echo "<script>alert('kompetensi keahlian tidak boleh kosong')</script>";
        } else {
            return $this->db->query("UPDATE tb_kelas SET nama_kelas = '$nama_kelas' , kompetensi_keahlian = '$kompetensi_keahlian' WHERE id_kelas = '$id'  ");
        }
    }

    public function tambahPetugas()
    {
        $kode_petugas   = trim(htmlspecialchars($_POST['kode_petugas']));
        $username       = trim(htmlspecialchars($_POST['username']));
        $password       = trim(htmlspecialchars($_POST['password']));
        $hash           = password_hash($password, PASSWORD_DEFAULT);
        $nama_petugas   = trim(htmlspecialchars($_POST['nama_petugas']));
        $level          = trim(htmlspecialchars($_POST['level']));

        $cek = $this->db->query("SELECT * FROM tb_petugas WHERE username = '$username' ")->num_rows;

        if ($cek > 0) {
            echo "<script>alert('username atau kode petugas telah digunakan!')</script>";
        } elseif (!$kode_petugas) {
            echo "<script>alert('kode petugas tidak boleh kosong!')</script>";
        } elseif (!$username) {
            echo "<script>alert('username tidak boleh kosong')</script>";
        } elseif (!$password) {
            echo "<script>alert('password tidak boleh kosong')</script>";
        } elseif (strlen($password) < 6) {
            echo "<script>alert('password tidak boleh kurang dari 6 karakter')</script>";
        } elseif (!$nama_petugas) {
            echo "<script>alert('nama petugas tidak boleh kosong')</script>";
        } elseif (!$level) {
            echo "<script>alert('level tidak boleh kosong')</script>";
        } else {
            return $this->db->query("INSERT INTO tb_petugas VALUES(NULL,'$kode_petugas','$username','$hash','$nama_petugas','$level') ");
        }
    }

    public function editPetugas($id)
    {
        $kode_petugas = trim(htmlspecialchars($_POST['kode_petugas']));
        $username = trim(htmlspecialchars($_POST['username']));
        $password = trim(htmlspecialchars($_POST['password']));
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $nama_petugas = trim(htmlspecialchars($_POST['nama_petugas']));
        $level = trim(htmlspecialchars($_POST['level']));
        if (!$kode_petugas) {
            echo "<script>alert('kode petugas tidak boleh kosong')</script>";
        } elseif (!$username) {
            echo "<script>alert('username tidak boleh kosong')</script>";
        } elseif (!$nama_petugas) {
            echo "<script>alert('nama petugas tidak boleh kosong')</script>";
        } elseif (!$level) {
            echo "<script>alert('level tidak boleh kosong')</script>";
        } else {

            if (!$password) {
                return $this->db->query("UPDATE tb_petugas SET username = '$username' , kode_petugas = '$kode_petugas' , nama_petugas = '$nama_petugas' , level = '$level'  WHERE id_petugas = '$id' ");
            } else {

                if (strlen($password) < 6) {
                    echo "<script>alert('password tidak boleh kurang dari 6 karakter')</script>";
                } else {

                    return $this->db->query("UPDATE tb_petugas SET username = '$username' , nama_petugas = '$nama_petugas' , kode_petugas = '$kode_petugas' , password = '$hash' ,level = '$level'  WHERE id_petugas = '$id' ");
                }
            }
        }
    }

    public function tambahSpp()
    {
        $tahun = trim(htmlspecialchars($_POST['tahun']));
        $nominal = trim(htmlspecialchars($_POST['nominal']));

        if (!$tahun) {
            echo "<script>alert('tahun tidak boleh kosong')</script>";
        } elseif (!$nominal) {
            echo "<script>alert('nominal tidak boleh kosong')</script>";
        } elseif (!preg_match("/^[0-9]*$/", $tahun)) {
            echo "<script>alert('input tahun harus angka')</script>";
        } elseif (!preg_match("/^[0-9]*$/", $nominal)) {
            echo "<script>alert('input nominal harus angka')</script>";
        } else {
            return $this->db->query("INSERT INTO tb_spp VALUES(NULL,'$tahun','$nominal') ");
        }
    }

    public function editSpp($id)
    {
        $tahun = trim(htmlspecialchars($_POST['tahun']));
        $nominal = trim(htmlspecialchars($_POST['nominal']));

        if (!$tahun) {
            echo "<script>alert('tahun tidak boleh kosong')</script>";
        } elseif (!$nominal) {
            echo "<script>alert('nominal tidak boleh kosong')</script>";
        } elseif (!preg_match("/^[0-9]*$/", $tahun)) {
            echo "<script>alert('input tahun harus angka')</script>";
        } elseif (!preg_match("/^[0-9]*$/", $nominal)) {
            echo "<script>alert('input nominal harus angka')</script>";
        } else {
            return $this->db->query("UPDATE tb_spp SET tahun = '$tahun' , nominal = '$nominal' WHERE id_spp = '$id'");
        }
    }

    public function tambahSiswa()
    {
        $nisn       = trim(htmlspecialchars($_POST['nisn']));
        $nis        = trim(htmlspecialchars($_POST['nis']));
        $nama       = trim(htmlspecialchars($_POST['nama']));
        $id_kelas   = trim(htmlspecialchars($_POST['id_kelas']));
        $alamat     = trim(htmlspecialchars($_POST['alamat']));
        $no_telp    = trim(htmlspecialchars($_POST['no_telp']));
        $id_spp     = trim(htmlspecialchars($_POST['id_spp']));

        if (!$nisn) {
            echo "<script>alert('nisn tidak boleh kosong')</script>";
        } elseif (!preg_match("/^[0-9]*$/", $nisn)) {
            echo "<script>alert('nisn hanya angka saja')</script>";
        } elseif (!$nis) {
            echo "<script>alert('nis tidak boleh kosong')</script>";
        } elseif (!preg_match("/^[0-9]*$/", $nis)) {
            echo "<script>alert('nis hanya angka saja')</script>";
        } elseif (!$nama) {
            echo "<script>alert('nama tidak boleh kosong')</script>";
        } elseif (!preg_match("/^[a-z-A-Z_\s]*$/", $nama)) {
            echo "<script>alert('nama hanya boleh huruf')</script>";
        } elseif (!$id_kelas) {
            echo "<script>alert('kelas tidak boleh kosong')</script>";
        } elseif (!$alamat) {
            echo "<script>alert('alamat tidak boleh kosong')</script>";
        } elseif (!$no_telp) {
            echo "<script>alert('no telepon tidak boleh kosong')</script>";
        } elseif (!preg_match("/^[0-9]*$/", $no_telp)) {
            echo "<script>alert('no telepon hanya boleh angka')</script>";
        } elseif (!$id_spp) {
            echo "<script>alert('SPP tidak boleh kosong')</script>";
        } else {
            return $this->db->query("INSERT INTO tb_siswa VALUES(NULL,'$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp')");
        }
    }

    public function editSiswa($id)
    {
        $nisn       = trim(htmlspecialchars($_POST['nisn']));
        $nis        = trim(htmlspecialchars($_POST['nis']));
        $nama       = trim(htmlspecialchars($_POST['nama']));
        $id_kelas   = trim(htmlspecialchars($_POST['id_kelas']));
        $alamat     = trim(htmlspecialchars($_POST['alamat']));
        $no_telp    = trim(htmlspecialchars($_POST['no_telp']));
        $id_spp     = trim(htmlspecialchars($_POST['id_spp']));

        if (!$nisn) {
            echo "<script>alert('nisn tidak boleh kosong')</script>";
        } elseif (!preg_match("/^[0-9]*$/", $nisn)) {
            echo "<script>alert('nisn hanya angka saja')</script>";
        } elseif (!$nis) {
            echo "<script>alert('nis tidak boleh kosong')</script>";
        } elseif (!preg_match("/^[0-9]*$/", $nis)) {
            echo "<script>alert('nis hanya angka saja')</script>";
        } elseif (!$nama) {
            echo "<script>alert('nama tidak boleh kosong')</script>";
        } elseif (!preg_match("/^[a-z-A-Z]*$/", $nama)) {
            echo "<script>alert('nama hanya boleh huruf')</script>";
        } elseif (!$id_kelas) {
            echo "<script>alert('kelas tidak boleh kosong')</script>";
        } elseif (!$alamat) {
            echo "<script>alert('alamat tidak boleh kosong')</script>";
        } elseif (!$no_telp) {
            echo "<script>alert('no telepon tidak boleh kosong')</script>";
        } elseif (!preg_match("/^[0-9]*$/", $no_telp)) {
            echo "<script>alert('no telepon hanya boleh angka')</script>";
        } elseif (!$id_spp) {
            echo "<script>alert('SPP tidak boleh kosong')</script>";
        } else {
            return $this->db->query("UPDATE tb_siswa SET nisn = '$nisn' , nis = '$nis' , nama = '$nama', id_kelas = '$id_kelas' , alamat = '$alamat' , no_telp = '$no_telp' , id_spp = '$id_spp' WHERE id_siswa = '$id' ");
        }
    }

    public function logout()
    {
        $_SESSION['tb_petugas'] = FALSE;
        unset($_SESSION['nama_petugas']);
        unset($_SESSION['username']);
        unset($_SESSION['level']);

        echo "<script>document.location='/ukk/index.php'</script>";
    }

    public function addTransaksi()
    {
        $id_petugas = $_SESSION['id_petugas'];
        $nisn   = trim(htmlspecialchars($_POST['nisn']));
        $tgl_bayar = trim(htmlspecialchars($_POST['tgl_bayar']));
        $bulan_dibayar = trim(htmlspecialchars($_POST['bulan_dibayar']));
        $tahun_dibayar = trim(htmlspecialchars($_POST['tahun_dibayar']));
        $id_spp = trim(htmlspecialchars($_POST['id_spp']));
        $jumlah_bayar = trim(htmlspecialchars($_POST['jumlah_bayar']));

        if (!$nisn) {
            echo "<script>alert('nisn tidak boleh kosong')</script>";
        } elseif (!preg_match("/^[0-9]*$/", $nisn)) {
            echo "<script>alert('nisn hanya angka saja')</script>";
        } elseif (!$tgl_bayar) {
            echo "<script>alert('input tanggal bayar tidak boleh kosong')</script>";
        } elseif (!$bulan_dibayar) {
            echo "<script>alert('input Bulan bayar boleh kosong')</script>";
        } elseif (!$tahun_dibayar) {
            echo "<script>alert('input tahun bayar tidak boleh kosong')</script>";
        } elseif (!$id_spp) {
            echo "<script>alert('SPP tidak boleh kosong')</script>";
        } elseif (!$jumlah_bayar) {
            echo "<script>alert('jumlah bayar tidak boleh kosong')</script>";
        } else {
            return $this->db->query("INSERT INTO tb_pembayaran VALUES(NULL,'$id_petugas','$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar','$id_spp','$jumlah_bayar') ");
        }
    }
}
$init = new fungsi();
