<?php

//deklarasi interface class
// siapa pun yang mendeklarikan interface tersebut maka class turunan nya wajib terdapat 4 method tersebut
interface kelolaData
{
    public function tambahData($nim, $nama, $tanggal_lahir, $jenis_kelamin, $alamat);
    public function tampilData();

    // Penambahan Parameter
    public function updateData($nim, $nama, $tanggal_lahir, $jenis_kelamin, $alamat);
    public function hapusData($x);
}