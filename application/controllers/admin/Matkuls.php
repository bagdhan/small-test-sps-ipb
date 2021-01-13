<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Matkuls extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
        $this->load->model("matkul_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["matkul"] = $this->matkul_model->getAll();
        $this->load->view("admin/matkul/list", $data);
    }

    public function add()
    {
        $matkul = $this->matkul_model;
        $validation = $this->form_validation;
        $validation->set_rules($matkul->rules());

        if ($validation->run()) {
            $matkul->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/matkul/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/matkuls');
       
        $matkul = $this->matkul_model;
        $validation = $this->form_validation;
        $validation->set_rules($matkul->rules());

        if ($validation->run()) {
            $matkul->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["matkul"] = $matkul->getById($id);
        if (!$data["matkul"]) show_404();
        
        $this->load->view("admin/matkul/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->matkul_model->delete($id)) {
            redirect(site_url('admin/matkuls'));
        }
    }
}
