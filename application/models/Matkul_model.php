<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul_model extends CI_Model
{
    private $_table = "mata_kuliah";

    public $kode_mata_kuliah;
    public $semester;
    public $nama_mata_kuliah;
    public $jurusan;

    public function rules()
    {
        return [
            ['field' => 'kode_mata_kuliah',
            'label' => 'Kode Mata Kuliah',
            'rules' => 'required'],
            
            ['field' => 'semester',
            'label' => 'Semester',
            'rules' => 'numeric'],
            
            ['field' => 'nama_mata_kuliah',
            'label' => 'Nama Mata Kuliah',
            'rules' => 'required'],
            
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
        return $this->db->get_where($this->_table, ["kode_mata_kuliah" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kode_mata_kuliah = uniqid();
        $this->kode_mata_kuliah = $post["kode_mata_kuliah"];
        $this->semester = $post["semester"];
        $this->nama_mata_kuliah = $post["nama_mata_kuliah"];
        $this->jurusan = $post["jurusan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kode_mata_kuliah = $post["kode_mata_kuliah"];
        $this->semester = $post["semester"];
        $this->nama_mata_kuliah = $post["nama_mata_kuliah"];
        $this->jurusan = $post["jurusan"];
        $this->db->update($this->_table, $this, array('kode_mata_kuliah' => $post['kode_mata_kuliah']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kode_mata_kuliah" => $id));
    }
}
