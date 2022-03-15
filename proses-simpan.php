 <!-- Aplikasi CRUD -->
 <?php
// memanggil file mahasiswa.php
include 'mahasiswa.php';
// Nama  : Nelsen Septa Henidar
// NIM   : 2003040125
// Kelas : B1

// cek jika ada $_POST['simpan'] maka proses dilanjutkan
// $_POST['simpan'] berasal dari input type "submit" dengan name "simpan" pada file form-tambah.php
if (isset($_POST['simpan'])) {

    // membuat objek Mahasiswa
    $dataMahasiswa = new Mahasiswa();

    // ambil data hasil submit dari form
    $nim = trim($_POST['nim']);
    $nama = trim($_POST['nama']);
    $tanggal = $_POST['tanggal_lahir'];
    $tgl = explode('-', $tanggal);
    $tanggal_lahir = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = trim($_POST['alamat']);

    // insert data mahasiswa
    $dataMahasiswa->tambahData($nim, $nama, $tanggal_lahir, $jenis_kelamin, $alamat);
}
?>