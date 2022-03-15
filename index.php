<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Aplikasi CRUD</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.png">

  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/datepicker.min.css" rel="stylesheet">
  <link href="assets/js/dataTables/css/dataTables.bootstrap.css" rel="stylesheet">

  <!-- styles -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Fungsi untuk membatasi karakter yang diinputkan -->
  <script language="javascript">
  function getkey(e) {
    if (window.event)
      return window.event.keyCode;
    else if (e)
      return e.which;
    else
      return null;
  }

  function goodchars(e, goods, field) {
    var key, keychar;
    key = getkey(e);
    if (key == null) return true;

    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();
    goods = goods.toLowerCase();

    // check goodkeys
    if (goods.indexOf(keychar) != -1)
      return true;
    // control keys
    if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
      return true;

    if (key == 13) {
      var i;
      for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
          break;
      i = (i + 1) % field.form.elements.length;
      field.form.elements[i].focus();
      return false;
    };
    // else return false
    return false;
  }
  </script>
</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand -->
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">
          <i class="glyphicon glyphicon-check"></i>
          Aplikasi CRUD PHP OOP dan MySQLi
        </a>
      </div>
    </div> <!-- /.container-fluid -->
  </nav>

  <!-- Nama  : Nelsen Septa Henidar
       NIM   : 2003040125
       Kelas : B1
-->
  <div class="container-fluid">
    <!-- Cek Page Jika page = tambah maka akan pindah halaman http://localhost/namaproject/index.php?page=tambah -->
    <!-- include "form-tambah.php" panggil file php dengan nama "form-tambah.php" -->
    <!-- method get jadi muncul di url http://localhost/namaproject/index.php?page=tambah -->
    <?php
if (empty($_GET["page"])) {
    include "tampil-data.php";
} else if ('tambah' == $_GET['page']) {
    include "form-tambah.php";
} else if ('ubah' == $_GET['page']) {
    include "form-ubah.php";
}
?>
  </div> <!-- /.container-fluid -->

  <footer class="footer">
    <div class="container-fluid">
      <p class="text-muted pull-left">&copy; 2020 CI-AKADEMIK TI UMP</p>
      <p class="text-muted pull-right ">Theme by <a href="http://www.getbootstrap.com" target="_blank">Bootstrap</a></p>
    </div>
  </footer>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="assets/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>
  <!-- DataTables -->
  <script src="assets/js/dataTables/js/jquery.dataTables.js"></script>
  <script src="assets/js/dataTables/js/dataTables.bootstrap.js"></script>

  <script type="text/javascript">
  $(function() {

    //datepicker plugin
    $('.date-picker').datepicker({
      autoclose: true,
      todayHighlight: true
    });

    // toolip
    $('[data-toggle="tooltip"]').tooltip();

    $('#dataTables-example').dataTable({
      "lengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],
      "pageLength": 5
    });
  })
  </script>
</body>

</html>