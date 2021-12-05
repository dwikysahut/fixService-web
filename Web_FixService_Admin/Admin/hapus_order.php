<?php
include 'koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM service_order WHERE ID_order = '".$_GET['id']."'");

 if($delete){
	header('location: data_order.php');
}
else{
	echo "Gagal";
}
?>