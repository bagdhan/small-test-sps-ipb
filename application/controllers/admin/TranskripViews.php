<?php
Class TranskripViews extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'Transkrip Nilai Mahasiswa',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'Nomor Mahasiswa',1,0);
        $pdf->Cell(85,6,'Nama Mahasiswa',1,0);
        $pdf->Cell(27,6,'Semester',1,0);
        $pdf->Cell(25,6,'Kode Mata Kuliah',1,0);
        $pdf->Cell(25,6,'Huruf Mutu Mata Kuliah',1,1);
        $pdf->SetFont('Arial','',10);
        $transkrip = $this->db->get('transkrip_nilai')->result();
        foreach ($transkrip as $row){
            $pdf->Cell(20,6,$row->nomor_mahasiswa,1,0);
            $pdf->Cell(85,6,$row->nama_mahasiswa,1,0);
            $pdf->Cell(27,6,$row->semester,1,0);
            $pdf->Cell(25,6,$row->kode_mata_kuliah,1,0);
            $pdf->Cell(25,6,$row->huruf_mutu_mata_kuliah,1,1); 
        }
        $pdf->Output();
    }
}