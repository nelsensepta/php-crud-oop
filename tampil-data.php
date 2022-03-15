  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-user"></i> Data Mahasiswa
          <a class="btn btn-success pull-right" href="?page=tambah">
            <i class="glyphicon glyphicon-plus"></i> Tambah
          </a>
        </h4>
      </div>
      <?php

if (empty($_GET['alert'])) {
    echo "";
} elseif (1 == $_GET['alert']) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
          </div>";
} elseif (2 == $_GET['alert']) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Mahasiswa berhasil disimpan.
          </div>";
} elseif (3 == $_GET['alert']) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Mahasiswa berhasil diubah.
          </div>";
} elseif (4 == $_GET['alert']) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Mahasiswa berhasil dihapus.
          </div>";
}
?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Data Mahasiswa TI UMP</h3>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
// memanggil file siswa.php
include 'mahasiswa.php';

// membuat objek mahasiswa
$dataMahasiswa = new Mahasiswa();

// mengambil seluruh data mahasiswa
$result = $dataMahasiswa->tampilData();

$no = 1;

if (!empty($result)) {
    foreach ($result as $data) {
        $tanggal = $data['Tgl_Lahir'];
        $tgl = explode('-', $tanggal);
        $tanggal_lahir = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];
        echo "  <tr>
                      <td width='50' class='center'>$no</td>
                      <td width='60'>$data[Nim]</td>
                      <td width='150'>$data[Nama_Mhs]</td>
                      <td width='180'>$tanggal_lahir</td>
                      <td width='120'>$data[Jenis_Kelamin]</td>
                      <td width='250'>$data[Alamat]</td>
                      <td width='100'>
                      <div class=''>"
        ;?>

              <!-- Nama  : Nelsen Septa Henidar
           NIM   : 2003040125
           Kelas : B1
    -->
              <!-- Edit Bagian href  -->
              <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px'
                href="?page=ubah&nim=<?=$data['Nim'];?>" class='btn btn-success btn-sm' href='?page=ubah&id=$data[Nim]'>
                <i class='glyphicon glyphicon-edit'></i>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm"
                href="proses-hapus.php?id=<?=$data['Nim'];?>"
                onclick="return confirm('Anda yakin ingin menghapus siswa <?=$data['Nama_Mhs'];?>?');">
                <i class="glyphicon glyphicon-trash"></i>
              </a>
              <?="
                        </div>
                      </td>
                    </tr>";
        $no++;
    }
}
?>
            </tbody>
          </table>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->