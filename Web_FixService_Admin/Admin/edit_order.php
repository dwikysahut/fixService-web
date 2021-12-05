<?php
//include('dbconnected.php');
include 'koneksi.php';
if (isset($_POST['ganti'])) {

    $editOrder = mysqli_query($conn, "UPDATE service_order SET status ='" . $_POST['status_order'] . "',pegawai ='" . $_POST['pegawai'] . "' WHERE ID_order ='" . $_POST['id_order'] . "'
");

    if ($editOrder) {
        // echo $_POST['id_order'];
        // var_dump($editOrder);
          header("location: data_order.php");
       
    } else {

        echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
        echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
        echo "<p><center>Mengedit Data Gagal</center></p>";
        echo "</div>";
        echo "</div>";

    }

}

else if (isset($_POST['finish'])) {

    $edit = mysqli_query($conn, "UPDATE service_order SET
    status =2
     WHERE ID_order ='".$_POST['id']."'
         ");

  
   

        if ($edit) {

            // echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
            // echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
            // echo "<p><center>Berhasil Merubah status Order</center></p>";
            // echo "</div>";
            // echo "</div>";
            header("location: data_order.php");

        } else {

            echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
            echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
            echo "<p><center>gagal Merubah status Order</center></p>";
            echo "</div>";
            echo "</div>";

        }

    

    }

//mysql_close($host);
