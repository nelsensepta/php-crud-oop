<?php
// memanggil file siswa.php
include 'mahasiswa.php';
// Nama  : Nelsen Septa Henidar
// NIM   : 2003040125
// Kelas : B1
// cek jika ada $_POST['ubah'] maka proses dilanjutkan
// $_POST['ubah'] berasal dari input type "submit" dengan name "ubah" pada file form-ubah.php
if (isset($_POST['ubah'])) {
    // membuat objek mahasiswa
    $dataMahasiswa = new Mahasiswa();

    // ambil data hasil submit dari form
    $nim = trim($_POST['nim']);
    $nama = trim($_POST['nama']);
    $tanggal = $_POST['tanggal_lahir'];
    $tgl = explode('-', $tanggal);
    $tanggal_lahir = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = trim($_POST['alamat']);

    // delete data siswa
    $dataMahasiswa->updateData($nim, $nama, $tanggal_lahir, $jenis_kelamin, $alamat);
}