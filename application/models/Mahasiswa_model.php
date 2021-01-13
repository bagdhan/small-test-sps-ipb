<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    private $_table = "mahasiswa";

    public $id_mahasiswa;
    public $nomor_mahasiswa;
    public $nama;
    public $semester;
    public $jurusan;

    public function rules()
    {
        return [
            ['field' => 'nomor_mahasiswa',
            'label' => 'Nomor Mahasiswa',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],
            
            ['field' => 'semester',
            'label' => 'Semester',
            'rules' => 'numeric'],
            
            ['field' => 'jurusan',
            'label' => 'Jurusan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["nomor_mahasiswa" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_mahasiswa = uniqid();
        $this->nomor_mahasiswa = $post["nomor_mahasiswa"];
        $this->nama = $post["nama"];
        $this->semester = $post["semester"];
        $this->jurusan = $post["jurusan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nomor_mahasiswa = $post["nomor_mahasiswa"];
        $this->nama = $post["nama"];
        $this->semester = $post["semester"];
        $this->jurusan = $post["jurusan"];
        $this->db->update($this->_table, $this, array('nomor_mahasiswa' => $post['nomor_mahasiswa']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("nomor_mahasiswa" => $id));
    }
}
