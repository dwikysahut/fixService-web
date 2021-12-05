<?php
session_start();

if ($_SESSION['password'] == '') {
    header("location:login.php");
}
include 'koneksi.php';
error_reporting(0);
?>
<!doctype html>
<html lang="en">


<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- SidebarBrand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-tools"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <br/>Fix Service</div>
      </a>

      <!-- Divider -->
      <?php
			include 'sidebar.php';
			?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- <li class="nav-item active">
        <a class="nav-link" href="charts.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Chart</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Table</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          <?php
           include('header.php');
           ?>
        <!-- End of Topbar -->


<!--ini bagian konten-->
 





<?php
if (isset($_POST['kirim'])) {
    $id = $_POST['id'];
    $nama = htmlspecialchars($_POST['nama']);
    $jenis = htmlspecialchars($_POST['jenis_barang']);
    $tanggal = $_POST['tanggal_masuk'];
    $harga = htmlspecialchars($_POST['harga']);
    $stok = htmlspecialchars($_POST['jumlah']);

    $wet = mysqli_query($conn, "select * from barang where id='$id' and nama ='$nama' and jenis ='$jenis'");
    $chak = mysqli_num_rows($wet);
    if ($chak > 0) {

        $rew = mysqli_fetch_array($wet);
        $id === $rew['id'];
        $nama === $rew['nama'];
        $jenis === $rew['jenis'];

        echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
        echo "<div class='alert alert-warning mt-4 ml-5' role='alert'>";
        echo "<p><center>Data Yang Anda Kirim Sudah Tersedia</center></p>";
        echo "</div>";
        echo "</div>";

    } else {

        $insert = mysqli_query($conn, "INSERT INTO barang VALUES (
        '$id',
       '$nama',
       '$jenis',
       '$harga',
       '$tanggal',
       '$stok'
         )");

        if ($insert) {

            echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
            echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
            echo "<p><center>Menambakan Data Sukses</center></p>";
            echo "</div>";
            echo "</div>";

        } else {

            echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
            echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
            echo "<p><center>Menambakan Data Gagal</center></p>";
            echo "</div>";
            echo "</div>";

        }

    }

}
?>






<div class="col-md-1">

</div>

</div>

<?php
$jumlah_produk = mysqli_query($conn, "SELECT COUNT(*) as id from masuk");
$row = mysqli_fetch_array($jumlah_produk);
$jum = $row['id'];

?>

<?php

$Jumlah_modal = mysqli_query($conn, "select sum(jumlah_modal) as total from modal");
$total = mysqli_fetch_array($Jumlah_modal);

?>

<?php

$Jumlah_pemasukan = mysqli_query($conn, "select sum(hargaJ * JumlahB) as dari from masuk");
$pemasukan = mysqli_fetch_array($Jumlah_pemasukan);

?>


<?php

$jumlahBarang = mysqli_query($conn, "SELECT COUNT(*) as jumlah from barang");
$jumlah_barang = mysqli_fetch_array($jumlahBarang);

$JumlahTotalStockQuery = mysqli_query($conn, "select sum(stok) as stok from barang");
$jumlah_total_stock = mysqli_fetch_array($JumlahTotalStockQuery);

?>


<?php

$untung = ($jumlahd['tor']) - ($total['total']);

?>


<div class="row">
<div class="col-md-8  mt-4">
<h2><center> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Data Pegawai Fix Service</center></h2>
</div>
</div>

<!-- <p class="ml-5">Keuntungan Dagang: &nbsp; <?php echo "Rp." . number_format($jumlahd['tor']) . "" . "-" . "Rp." . number_format($total['total']) . ""; ?></p>
<p class="ml-5">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Total: <?php echo "<b> Rp." . number_format($untung) . ""; ?></p> -->

  <div class="card shadow  ml-4 mr-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
  </div>




<div class="row mt-3">


<div class="col-md-8  mt-4">
<br>



</div>

<div class="col-md-4 mt-5">
  <form class="form-inline my-2 my-lg-0" action="<?php echo $_SERVER['$PHP_SELF'];?>" method="get" name='cari'>
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name='cari'  required>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
</div>

</div>

<div class="row">
  <div class="col-md-8  mt-4">

</div>
</div>
<?php

$hmm = $jum;
$tampil = 10;
$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
$start = ($page > 1) ? ($page * $tampil) - $tampil : 0;
$sql = mysqli_query($conn, "select * from worker");
$total = mysqli_num_rows($sql);
$pages = ceil($total / $tampil);

?>


<div class="col-md-12 col-sm-12 col-xs-12  mt-5">
  <div class="table-responsive service">
  <table class="table table-bordered table-hover  mt-3 text-nowrap css-serial">
  <thead>
    <tr>

      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">No Telepon</th>
      <th scope="col">Bidang Ahli</th>
      <th scope="col">Opsi</th>

    </tr>

  </thead>
  <?php
if (isset($_GET['cari'])) {
    $cari = mysqli_real_escape_string($conn, $_GET['cari']);
    $brg = mysqli_query($conn, "select * from worker where ID_admin like '%" . $cari . "%' or nama_admin like '%" . $cari . "%'");

    if (mysqli_num_rows($brg) > 0) {
        echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
        echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
        echo "<p><center>Data Yang Anda Cari  Ditemukan</center></p>";
        echo "</div>";
        echo "</div>";

    } else {

        echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
        echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
        echo "<p><center>$cari Yang Anda Cari Tidak Ditemukan</center></p>";
        echo "</div>";
        echo "</div>";

    }

} else {
    $brg = mysqli_query($conn, "select * from worker limit $start, $tampil");
}

if (mysqli_num_rows($brg)) {

    while ($row = mysqli_fetch_array($brg)) {

        ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['ID_worker'] ?></th>
      <td><?php echo $row['nama_worker'] ?></td>
      <td><?php echo $row['no_telpon'] ?></td>
      <td><?php echo $row['Bidang_ahli'] ?></td>

      <td>&nbsp;<a href="editPegawai.php?id=<?php echo $row['ID_worker']; ?>"><button type="button" class="btn btn-success">Edit</button></a> &nbsp; <a href="hapus_pegawai.php?id=<?php echo $row['ID_worker']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a> &nbsp; </td>

    </tr>

  </tbody>

<?php }} elseif (mysqli_num_rows($brg) <= 0 and !$cari) {

    echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
    echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
    echo "<p><center>Data Anda Masih Kosong</center></p>";
    echo "</div>";
    echo "</div>";

}?>


</table>

<div class="row">
    <div class="col-md-5">

    </div>

    <div class="col-md-5">

    </div>
    <?php
$cep = mysqli_query($conn, "select * from masuk");
$tesd = mysqli_num_rows($cep);

if ($tesd > 0) {
    echo "<div class='col-md-2'>";
    echo " <a href='hapus_all_modal.php'><button type='button' class='btn btn-danger'>Hapus Semua</button></a>";
    echo "</div>";
} else {

}?>

</div>


<nav aria-label="Page navigation example">
<ul class="pagination">
  <?php
for ($x = 1; $x <= $pages; $x++) {
    $isActive = '';

    ?>
    <?php
if ($x == $page) {
        ?>
    <li class="page-item active"><a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
   <?php
} else {
        ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
    <?php

    }
    ?>
  <!-- //  echo"<li class='.$isActive'><a class='page-link' href='page=.$x.' ""</a>""</li>" -->

    <?php
}

?>



</ul>
</nav>
</div>
</div>







</div>


      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Jika Keluar Anda Harus Login Terlebih Dahulu !</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="logout.php">Keluar</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

  </body>

  </html>
