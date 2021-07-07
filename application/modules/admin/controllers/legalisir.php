<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Legalisir extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("M_legalisir");

    is_logged_in();
  }

  public function index()
  {

    $data['judul'] = 'Halaman Legalisir';
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['legalisir'] = $this->M_legalisir->getAll();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/legalisir', $data);
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }
}
