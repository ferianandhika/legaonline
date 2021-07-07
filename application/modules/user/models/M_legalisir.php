<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_legalisir extends CI_Model
{

    private $table = "legalisir";

    public function getProdi()
    {
        return $this->db->get('prodi')->result_array();
    }

    public function getbyId($id)
    {
        return $this->db->get_where('user', ['id' => $id])->result_array();
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }
}

/* End of file M_legalisir.php */