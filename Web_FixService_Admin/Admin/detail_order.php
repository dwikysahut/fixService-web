<?php
//memasukkan koneksi database

session_start();

if ($_SESSION['password'] == '') {
    header("location:login.php");
}
include 'koneksi.php';
error_reporting(0);

if ($_POST['id']) {
    $id = $_POST['id'];
    // echo $id;
    $view = mysqli_query($conn, "SELECT * FROM service_order WHERE ID_order='$id'");
    $row_view = mysqli_fetch_array($view);

    // echo $row_view['nama_client'];
    if ($view->num_rows) {
        //fetch data ke dalam veriabel $row_view
        $row_view = $view->fetch_assoc();
        //menampilkan data dengan table
        ?>
		<html>
        
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

<div class="row mt-3">
  <div class="col-md-1">

  </div>

  <div class="col-md-10 col-sm-12 col-xs-12">
<button type="submit" class="btn btn-primary btn-lg btn-block" name='ganti'>Edit</button>

        </html>
        <?php


if (isset($_POST['ganti'])) {
    
    $editOrder = mysqli_query($conn, "UPDATE service_order SET

status ='".$_POST['status_order']."',
pegawai ='".$_POST['pegawai']."'
WHERE ID_order ='" . $id . "'
");

    if ($editOrder) {
        header("location: data_order.php");
    } else {

        echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
        echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
        echo "<p><center>Mengedit Data Gagal</center></p>";
        echo "</div>";
        echo "</div>";

    }

}

    }
}

?>