<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transkrip_model extends CI_Model
{
    private $_table = "transkrip_nilai";

    public $id_transkrip;
    public $nomor_mahasiswa;
    public $nama_mahasiswa;
    public $semester;
    public $kode_mata_kuliah;
    public $huruf_mutu_mata_kuliah;

    public function rules()
    {
        return [
            ['field' => 'nomor_mahasiswa',
            'label' => 'Nomor Mahasiswa',
            'rules' => 'required'],

            ['field' => 'nama_mahasiswa',
            'label' => 'Nama Mahasiswa',
            'rules' => 'required'],
            
            ['field' => 'semester',
            'label' => 'Semester',
            'rules' => 'numeric'],
            
            ['field' => 'kode_mata_kuliah',
            'label' => 'Kode Mata Kuliah',
            'rules' => 'required'],
            
            ['field' => 'huruf_mutu_mata_kuliah',
            'label' => 'Huruf Mutu Mata Kuliah',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_transkrip" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_transkrip = uniqid();
        $this->nomor_mahasiswa = $post["nomor_mahasiswa"];
        $this->nama_mahasiswa = $post["nama_mahasiswa"];
        $this->semester = $post["semester"];
        $this->kode_mata_kuliah = $post["kode_mata_kuliah"];
        $this->huruf_mutu_mata_kuliah = $post["huruf_mutu_mata_kuliah"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nomor_mahasiswa = $post["nomor_mahasiswa"];
        $this->nama_mahasiswa = $post["nama_mahasiswa"];
        $this->semester = $post["semester"];
        $this->kode_mata_kuliah = $post["kode_mata_kuliah"];
        $this->huruf_mutu_mata_kuliah = $post["huruf_mutu_mata_kuliah"];
        $this->db->update($this->_table, $this, array('id_transkrip' => $post['id_transkrip']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_transkrip" => $id));
    }

    public function get_mahasiswa(){
        $query = $this->db->get('mahasiswa')->result();
        return $query;
       }

       public function get_kodemk(){
        $query = $this->db->get('mata_kuliah')->result();
        return $query;
       }
}
