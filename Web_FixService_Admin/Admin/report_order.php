
<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html><head>
  <title>Laporan Penjualan</title>
</head><body>
  <style type="text/css">
    body {
      font-family: sans-serif;
    }

    .table {
      width: 100%;
    }

    .table,
    .table th,
    .table td {
      padding: 5px;
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
<h1 style="text-align:center">LAPORAN ORDER</h1>
<p><?php echo "Date : ". date("d-m-Y") ." ". date("h:i:s a") ?></p>
    <br />
    <table class="table table-bordered table-striped" style="table-layout:fixed;" id="table-datatable">
        <tr>
          <th width="1%">NO</th>
          <th>INVOICE</th>
          <th>Nama</th>
          <th>No Telepon</th>
        
          <th>Alamat</th>
          <th>Waktu Service</th>
          <th>Service</th>
          <th>Nama Pegawai</th>
        </tr>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "SELECT * from service_order INNER JOIN status_service on service_order.status = status_service.id Left Join worker on service_order.pegawai = worker.ID_worker INNER JOIN service on service.ID_service=service_order.service WHERE status_service.status='selesai' order by service_order.waktu_service");
        while ($row = mysqli_fetch_array($data)) {
        ?>
          <tr >
            <td><?php echo $no++ ?></td>
            <td>INVOICE-00<?php echo $row['ID_order'] ?></td>
      <td><?php echo $row['nama_client'] ?></td>
      <td><?php echo $row['no_telpon_client'] ?></td>
  
      <td><?php echo $row['alamat_service'] ?></td>
      <td><?php echo $row['waktu_service'] ?></td>
      <td><?php echo $row['service'] ?></td>    
      <td><?php echo $row['nama_worker'] ?></td>
    
          </tr>
        <?php
        }
        ?>
     
    </table>
    <?php
    $res= mysqli_query($conn,"SELECT SUM(biaya_service) as total from service_order_view");
    $data=mysqli_fetch_assoc($res);
    
    ?>
    <h3 style="text-align:right">Total : <?php echo $data['total'] ?></h3>
    </body></html>
<?php
include 'koneksi.php';
require_once("./library/dompdf/dompdf_config.inc.php");

$dompdf = new Dompdf();
// $query = mysqli_query($koneksi,"select * from tb_siswa");
// $html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br/>';
// $html .= '<table border="1" width="100%">
//  <tr>
//  <th>No</th>
//  <th>Nama</th>
//  <th>Kelas</th>
//  <th>Alamat</th>
//  </tr>';
// $no = 1;
// while($row = mysqli_fetch_array($query))
// {
//  $html .= "<tr>
//  <td>".$no."</td>
//  <td>".$row['nama']."</td>
//  <td>".$row['kelas']."</td>
//  <td>".$row['alamat']."</td>
//  </tr>";
//  $no++;
// }
// $html .= "</html>";
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$dompdf->stream("Laporan Order.pdf");
?>
