<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Setting extends CI_Controller
{
  public function index()
  {
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['judul'] = 'Halaman Prodi';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/setting');
    $this->load->view('templates/rightbar');
    $this->load->view('templates/footer');
  }
}
