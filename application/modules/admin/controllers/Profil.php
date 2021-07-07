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

    $data['judul'] = 'Halaman Profil';
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/profil', $data);
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }
}
