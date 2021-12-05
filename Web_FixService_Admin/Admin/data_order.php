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
<h2><center> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Data Pesanan Fix Service</center></h2>
</div>
</div>

<!-- <p class="ml-5">Keuntungan Dagang: &nbsp; <?php echo "Rp." . number_format($jumlahd['tor']) . "" . "-" . "Rp." . number_format($total['total']) . ""; ?></p>
<p class="ml-5">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Total: <?php echo "<b> Rp." . number_format($untung) . ""; ?></p> -->

  <div class="card shadow  ml-4 mr-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Pesanan Service</h6>
  </div>




<div class="row mt-3">


<div class="col-md-8  mt-4">


</div>

<div class="col-md-4 mt-5">
  <form class="form-inline my-2 my-lg-0" action="<?php echo $_SERVER['$PHP_SELF']; ?>" method="get" name='cari'>
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name='cari'  required>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
</div>

</div>

<?php

$hmm = $jum;
$tampil = 10;
$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
$start = ($page > 1) ? ($page * $tampil) - $tampil : 0;
$sql = mysqli_query($conn, "select * from service_order");
$total = mysqli_num_rows($sql);
$pages = ceil($total / $tampil);

?>


<div class="col-md-12 col-sm-12 col-xs-12 ">
  <a href="report_order.php">
<button type="submit" name="finish" class="btn btn-success">Cetak Laporan Order</button>
</a>
  <div class="table-responsive service">
  <table class="table table-bordered table-hover  mt-3 text-nowrap css-serial">
  <thead>
    <tr>

      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">No Telepon</th>
      <th scope="col">Email</th>
      <th scope="col">Alamat</th>
      <th scope="col">Waktu Service</th>
      <th scope="col">Jenis Service</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Status</th>
      <th scope="col">Pegawai bertugas</th>
      <th scope="col">Action</th>



    </tr>

  </thead>
  <?php
if (isset($_GET['cari'])) {
    $cari = mysqli_real_escape_string($conn, $_GET['cari']);
    $order = mysqli_query($conn, "SELECT * from service_order INNER JOIN status_service on service_order.status = status_service.id where service_order.nama_client like '%" . $cari . "%' or service_order.email_client like '%" . $cari . "%'or service_order.ID_order like '%" . $cari . "%'");

    if (mysqli_num_rows($order) > 0) {
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
    $order = mysqli_query($conn, "SELECT * from service_order INNER JOIN status_service on service_order.status = status_service.id Left Join worker on service_order.pegawai = worker.ID_worker order by service_order.waktu_service limit $start, $tampil");

}

if (mysqli_num_rows($order)) {

    while ($row = mysqli_fetch_array($order)) {

        ?>
  <tbody>
    <tr>
      <th scope="row"> INVOICE-00<?php echo $row['ID_order'] ?></th>
      <td><?php echo $row['nama_client'] ?></td>
      <td><?php echo $row['no_telpon_client'] ?></td>
      <td><?php echo $row['email_client'] ?></td>
      <td><?php echo $row['alamat_service'] ?></td>
      <td><?php echo $row['waktu_service'] ?></td>
      <td><?php echo $row['service'] ?></td>
      <td><?php echo $row['deskripsi'] ?></td>
      <td><?php echo $row['status'] ?></td>
      <td><?php echo $row['nama_worker'] ?></td>

      <?php
if ($row['status'] == 'diproses') {

            ?>
      <td>&nbsp;<button type="button" data-toggle="modal" id=<?php echo $row['ID_order']; ?> data-target="#myModal<?php echo $row['ID_order']; ?>" class="show_data btn btn-primary">Accept</button>&nbsp; <a href="hapus_order.php?id=<?php echo $row['ID_order']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a> &nbsp; </td>
     <?php
} else if ($row['status'] == 'dikerjakan') {
            ?>
 <form name='finish' action="edit_order.php"  method='post'>
 <input type="hidden" name="id" value="<?= $row['ID_order'] ?>" />
      <td>&nbsp;<button type="submit" name="finish" class="btn btn-success">Finish Now</button></a> &nbsp; <a href="hapus_order.php?id=<?php echo $row['ID_order']; ?>"><button type="button" class="btn btn-danger">Hapus</button> &nbsp; </td>
 </form>
<?php
} else {
            ?>
      <td>&nbsp;<a href="edit.php?id=<?php echo $row['ID_order']; ?>"><button type="button" disabled class="btn btn-dark">Ready </button></a> &nbsp; <a href="hapus_order.php?id=<?php echo $row['ID_order']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a> &nbsp; </td>

<?php
}
        ?>
    </tr>
    <div class="modal fade" id="myModal<?php echo $row['ID_order']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Order</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
				</div>
				<!-- memulai untuk konten dinamis -->
				<!-- lihat id="data_siswa", ini yang di pangging pada ajax di bawah -->
				<div class="modal-body">
        <form name='ganti' action="edit_order.php" method='post'>
        <?php
        $id = $row['ID_order'];
        // $query_edit = mysqli_query("SELECT * FROM ser WHERE id='$id'");
    // echo $id;
    $view = mysqli_query($conn, "SELECT * FROM service_order WHERE ID_order='$id'");
    // $row_view = mysqli_fetch_array($view);
  
    // echo $row_view['nama_client'];
    while ($row_view = mysqli_fetch_array($view)) {  
        //fetch data ke dalam veriabel $row_view
        // $row_view = $view->fetch_assoc();
        //menampilkan data dengan table
        ?>
		<html>
    <input type="hidden" name="id_order" value="<?php echo $row_view['ID_order'] ?>">
 
<div class="row">

  <div class="col-md-1">

  </div>
  <div class="col-md-5 col-sm-12 col-xs-12">
   <p><b>Status:</b></p>
   <select class="form-control" name='status_order'required>
   <?php
$query_jenis = mysqli_query($conn, "SELECT * FROM status_service");
        while ($data = mysqli_fetch_array($query_jenis)) {
            if ($data['status'] == $row_view['status']) {
                $sel = 'selected';
            } else {
                $sel = '';
            }

            echo "<option value='$data[id]' $sel>$data[status]</option>";
            ?>
    <?php
}
        ?>
   </select>
</div>
<div class="col-md-5 col-sm-12 col-xs-12">
   <p><b>Pegawai:</b></p>
   <select class="form-control" name='pegawai'required>
   <?php
$query_pegawai = mysqli_query($conn, "SELECT * FROM worker");
        while ($dataP = mysqli_fetch_array($query_pegawai)) {
            if ($dataP['ID_worker'] == $row_view['pegawai']) {
                $selP = 'selected';
            } else {
                $selP = '';
            }

            echo "<option value='$dataP[ID_worker]' $selP>$dataP[nama_worker]</option>";
            ?>
    <?php
}
        ?>
   </select>
</div>

</div>

        <?php




    }
    ?>
				</div>
				<!-- selesai konten dinamis -->
				<div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-lg btn-block" name='ganti'>Edit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
  </form>

   
  </tbody>

<?php }} elseif (mysqli_num_rows($order) <= 0 and !$cari) {

    echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
    echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
    echo "<p><center>Data Anda Masih Kosong</center></p>";
    echo "</div>";
    echo "</div>";

}?>


</table>
<?php
if (isset($_POST['finish'])) {

    $edit = mysqli_query($conn, "UPDATE service_order SET
    status =2
     WHERE ID_order ='".$_POST['id']."'
         ");

  
   

        if ($edit) {

            echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
            echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
            echo "<p><center>Berhasil Merubah status Order</center></p>";
            echo "</div>";
            echo "</div>";
            header("Refresh:2; url=data_order.php");

        } else {

            echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
            echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
            echo "<p><center>gagal Merubah status Order</center></p>";
            echo "</div>";
            echo "</div>";

        }

    

}
?>
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

    <!-- modal untuk edit -->
   
	

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
	// ini menyiapkan dokumen agar siap grak :)
	// $(document).ready(function(){
	// 	// yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
	// 	$('.show_data').click(function(){
	// 		// membuat variabel id, nilainya dari attribut id pada button
	// 		// id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
	// 		var id = $(this).attr("id");
			
	// 		// memulai ajax
	// 		$.ajax({
	// 			url: 'detail_order.php',	// set url -> ini file yang menyimpan query tampil detail data siswa
	// 			method: 'post',		// method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
	// 			data: {id:id},		// nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
	// 			success:function(data){		// kode dibawah ini jalan kalau sukses
	// 				$('#data_order').html(data);	// mengisi konten dari -> <div class="modal-body" id="data_siswa">
	// 				$('#myModal').modal("show");	// menampilkan dialog modal nya
	// 			}
	// 		});
	// 	});
	// });
	// </script>
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
$('.datatab').DataTable();
} );
</script>
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
