<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h4>
        <i class="glyphicon glyphicon-edit"></i>
        Update Data
      </h4>
    </div> <!-- /.page-header -->
    <?php

include 'koneksi.php';
$sql = "SELECT * FROM mahasiswa WHERE Nim = " . $_GET['nim'];
// membuat objek db dengan nama $db
$db = new Database();
// membuka koneksi ke database
$mysqli = $db->connect();
$data = $mysqli->query($sql);
$result = mysqli_fetch_assoc($data);

$tanggal = $result['Tgl_Lahir'];
$tgl = explode('-', $tanggal);
$tanggal_lahir = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];
// menutup koneksi database
$mysqli->close();
?>
    <div class="panel panel-default">
      <div class="panel-body">
        <!-- Nama  : Nelsen Septa Henidar
               NIM   : 2003040125
               Kelas : B1

               form dengan method="POST" dengan action="proses-ubah.php"
               method POST jadi data form tidak di tampilkan di url

               action="proses-ubah.php" proses pengubahan data dengan
               memanggil method updateData() pada Class mahasiswa yang implements
               ke interface kelolaData
-->
        <!-- Nama : Nelsen Septa Henidar
        NIM : 2003040125
        Kelas : B1 -->
        <form class="form-horizontal" method="POST" action="proses-ubah.php">
          <div class="form-group">
            <label class="col-sm-2 control-label">NIM</label>
            <div class="col-sm-2">
              <!-- Data Nim Tidak Boleh Diubah Karena Untuk menjadi data Uniq yang digunakan dalam update database -->
              <input type="text" class="form-control" maxlength="12" disabled autocomplete="off" required
                value="<?=$result['Nim'];?>">
              <!-- Tetap Dikirimkan Tetapi dengan type="hidden" -->
              <input type="hidden" name="nim" value="<?=$result['Nim'];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Mahasiswa</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="nama" autocomplete="off" required
                value="<?=$result['Nama_Mhs'];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Tanggal Lahir</label>
            <div class="col-sm-2">
              <div class="input-group">
                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_lahir"
                  autocomplete="off" required value="<?=$tanggal_lahir;?>">
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-calendar"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Jenis Kelamin</label>
            <div class="col-sm-4">
              <label class="radio-inline">

                <input type="radio" name="jenis_kelamin" value="Laki-laki"
                  <?=$result['Jenis_Kelamin'] == 'Laki-laki' ? 'checked' : "";?>> Laki-laki
              </label>
              <label class="radio-inline">
                <input type="radio" name="jenis_kelamin" value="Perempuan"
                  <?=$result['Jenis_Kelamin'] == 'Perempuan' ? 'checked' : "";?>> Perempuan
              </label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Alamat</label>
            <div class="col-sm-3">
              <textarea class="form-control" name="alamat" rows="3" required><?=$result['Alamat'];?></textarea>
            </div>
          </div>
          <hr />
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-success btn-submit" name="ubah" value="Ubah">
              <a href="index.php" class="btn btn-default btn-reset">Batal</a>
            </div>
          </div>
        </form>
      </div> <!-- /.panel-body -->
    </div> <!-- /.panel -->
  </div> <!-- /.col -->
</div> <!-- /.row -->