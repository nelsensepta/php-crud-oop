<?php
include 'interface_sample.php';
//include 'koneksi.php';

// instance objek db
//$db = new database();
// koneksi ke MySQL dengan memanggil method connect pada class database
//$db->connect();

// implements interface kelolaData jadi class Mahasiswa
// Wajib punya 4 method dari interface kelolaData
// Nama  : Nelsen Septa Henidar
// NIM   : 2003040125
// Kelas : B1
class Mahasiswa implements kelolaData
{
    public function tambahData($nim, $nama, $tanggal_lahir, $jenis_kelamin, $alamat)
    {
        // memanggil file database.php
        include "koneksi.php";
        // membuat objek db dengan nama $db
        $db = new Database();
        // membuka koneksi ke database
        $mysqli = $db->connect();
        $nim = $mysqli->real_escape_string($nim);
        $nama = $mysqli->real_escape_string($nama);
        $alamat = $mysqli->real_escape_string($alamat);
        // sql statement untuk insert data siswa
        $sql = "INSERT INTO mahasiswa (Nim,Nama_Mhs,Tgl_Lahir,Alamat,Jenis_Kelamin)
                VALUES ('$nim','$nama','$tanggal_lahir','$alamat','$jenis_kelamin')";

        $result = $mysqli->query($sql);
        // cek hasil query
        if ($result) {
            /* jika data berhasil disimpan alihkan ke halaman mahasiswa dan tampilkan pesan = 2 */
            header("Location: index.php?alert=2");
        } else {
            /* jika data gagal disimpan alihkan ke halaman mahasiswa dan tampilkan pesan = 1 */
            header("Location: index.php?alert=1");
        }
        // menutup koneksi database
        $mysqli->close();
    }

    public function tampilData()
    {
        include "koneksi.php";

        // membuat objek db dengan nama $db
        $db = new Database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk mengambil semua data siswa
        $sql = "SELECT * FROM mahasiswa ORDER BY Nim ASC";

        $result = $mysqli->query($sql);

        while ($data = $result->fetch_assoc()) {
            $hasil[] = $data;
        }

        // menutup koneksi database
        $mysqli->close();

        // nilai kembalian dalam bentuk array
        return $hasil;

    }
    public function updateData($nim, $nama, $tanggal_lahir, $jenis_kelamin, $alamat)
    {
        include "koneksi.php";
        // Nama  : Nelsen Septa Henidar
        // NIM   : 2003040125
        // Kelas : B1
        // membuat objek db dengan nama $db
        $db = new Database();

        // membuka koneksi ke database
        $mysqli = $db->connect();
        $nama = $mysqli->real_escape_string($nama);
        $alamat = $mysqli->real_escape_string($alamat);

        // sql statement untuk update data siswa
        $sql = "UPDATE mahasiswa SET Nim = '$nim', Nama_Mhs = '$nama', Tgl_Lahir = '$tanggal_lahir', Alamat = '$alamat', Jenis_Kelamin= '$jenis_kelamin' WHERE Nim = '$nim'";

        $result = $mysqli->query($sql);
        // cek hasil query
        if ($result) {
            /* jika data berhasil disimpan alihkan ke halaman mahasiswa dan tampilkan pesan = 3 */
            header("Location: index.php?alert=3");
        } else {
            /* jika data gagal disimpan alihkan ke halaman mahasiswa dan tampilkan pesan = 1 */
            header("Location: index.php?alert=1");
        }
        // menutup koneksi database
        $mysqli->close();
    }
    public function hapusData($NIM)
    {
        // memanggil file database.php
        include "koneksi.php";

        // membuat objek db dengan nama $db
        $db = new Database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk delete data siswa
        $sql = "DELETE FROM mahasiswa WHERE Nim = '$NIM'";

        $result = $mysqli->query($sql);

        // cek hasil query
        if ($result) {
            /* jika data berhasil disimpan alihkan ke halaman siswa dan tampilkan pesan = 4 */
            header("Location: index.php?alert=4");
        } else {
            /* jika data gagal disimpan alihkan ke halaman siswa dan tampilkan pesan = 1 */
            header("Location: index.php?alert=1");
        }

        // menutup koneksi database
        $mysqli->close();
    }
}