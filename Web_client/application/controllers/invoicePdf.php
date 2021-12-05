<?php

defined('BASEPATH') or exit('No direct script access allowed');
Class InvoicePdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->library('session');
        $this->load->model('welcome_model');
    }
    
    function index(){
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(71 ,10,'',0,0);
        $pdf->Cell(59 ,5,'Invoice',0,0);
        $pdf->Cell(59 ,10,'',0,1);
        
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(71 ,5,'Fix Service',0,0);
        $pdf->Cell(59 ,5,'',0,0);
        $pdf->Cell(59 ,5,'Details',0,1);
        
        $pdf->SetFont('Arial','',10);
        
        $pdf->Cell(130 ,5,'',0,0);
        $pdf->Cell(25 ,5,'Customer ID:',0,0);
        $pdf->Cell(34 ,5,$this->session->userdata('id_member'),0,1);
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
$now = date('Y-m-d H:i:s');

        $pdf->Cell(130 ,5,'Malang,',0,0);
        $pdf->Cell(25 ,5,'Invoice Date:',0,0);
        $pdf->Cell(34 ,5,$now,0,1);
         
        $pdf->Cell(130 ,5,'',0,0);
        $pdf->Cell(25 ,5,'Invoice No:',0,0);
        $pdf->Cell(34,5,$this->session->userdata('id_member'),0,1);
        
        
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(130 ,5,'Bill To',0,0);
        $pdf->Cell(59 ,5,'',0,0);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(189 ,10,'',0,1);
        
     
        
        $pdf->Cell(50 ,10,'',0,1);
        
        $pdf->SetFont('Arial','B',10);
        /*Heading Of the table*/
        $pdf->Cell(10 ,6,'ID',1,0,'C');
        $pdf->Cell(60 ,6,'Nama',1,0,'C');
        $pdf->Cell(30 ,6,'keterangan',1,0,'C');
        $pdf->Cell(23 ,6,'pegawai',1,0,'C');
        $pdf->Cell(34 ,6,'Tanggal Service',1,1,'C');
      /*end of line*/
        $id_order = 4;
        // $this->db->where('ID_order', $id_order);
        // $query = $this->welcome_model->get('service_order');
        $pdf->SetFont('Arial','',10);
        $query = 
			$this->welcome_model->get_track_service()
			// 'service' => $this->welcome_model->get_service()
		;
        // $service_order = $this->db->get_where('service_order', array('ID_order' => '$'))->result();
        foreach ($query as $row){
            $pdf->Cell(10,6,$row->ID_order,1,0);
            $pdf->Cell(60,6,$this->session->userdata('nama'),1,0);
            $pdf->Cell(30,6,$row->Nama_service,1,0);
            $pdf->Cell(23,6,$row->pegawai,1,0);
            $pdf->Cell(34,6,$row->waktu_service,1,1);
           

        //     $pdf->Cell(20,6,$row->ID_order,1,0);
        //     $pdf->Cell(85,6,$row->nama_client,1,0);
        //     $pdf->Cell(27,6,$row->no_telpon_client,1,0);
        //     $pdf->Cell(25,6,$row->waktu_service,1,1); 
        }
        // if ($query->num_rows() > 0) {
          

        //     // $pdf->Cell(85,6,$row->nama_client,1,0);
        //     // $pdf->Cell(27,6,$row->no_telpon_client,1,0);
        //     // $pdf->Cell(25,6,$row->waktu_service,1,1); 
        //     return $query->row();
        // } else {
        //     return false;
        // }
        $pdf->Output();
    }
}