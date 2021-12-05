<?php
include 'koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM worker WHERE ID_worker = '".$_GET['id']."'");

 if($delete){
	header('location: data_pegawai.php');
}
else{
	echo "Gagal";
}
?>