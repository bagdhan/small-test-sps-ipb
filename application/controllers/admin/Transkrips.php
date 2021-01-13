<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transkrips extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
        $this->load->model("transkrip_model");
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }

    public function index()
    {
        $data["transkrip"] = $this->transkrip_model->getAll();
        $this->load->view("admin/transkrip/list", $data);
    }

    public function add()
    {
        $transkrip = $this->transkrip_model;
        $validation = $this->form_validation;
        $validation->set_rules($transkrip->rules());

        if ($validation->run()) {
            $transkrip->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/transkrip/new_form");
    }

    public function add2()
    {
        $this->data['mhs'] = $this->transkrip_model->get_mahasiswa();
        $this->data['kd_mk'] = $this->transkrip_model->get_kodemk();
        $this->load->view('admin/transkrip/new_form',$this->data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/transkrips');
       
        $transkrip = $this->transkrip_model;
        $validation = $this->form_validation;
        $validation->set_rules($transkrip->rules());

        if ($validation->run()) {
            $transkrip->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["transkrip"] = $transkrip->getById($id);
        if (!$data["transkrip"]) show_404();
        
        $this->load->view("admin/transkrip/edit_form", $data);
    }

    public function print($id=null){
        if (!isset($id)) redirect('admin/transkrips');

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
        //$data["transkrip"] = $transkrip->getById($id);
        $pdf->Output();
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->transkrip_model->delete($id)) {
            redirect(site_url('admin/transkrips'));
        }
    }
}
