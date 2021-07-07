<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profil extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {

    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['judul'] = 'Halaman Profil | SIMALEJA';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('user/profil', $data);
    $this->load->view('templates/footer');
  }
}
