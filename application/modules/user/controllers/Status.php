<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Status extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['judul'] = 'Halaman Status | SIMALEJA';
    $data['status'] = $this->db->get_where('legalisir', ['id_user' => $this->session->userdata('id')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('user/status', $data);
    $this->load->view('templates/footer');
  }
}