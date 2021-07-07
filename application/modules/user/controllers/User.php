<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['judul'] = 'Halaman Home | SIMALEJA';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('user/dashboard', $data);
    $this->load->view('templates/footer');
  }
}
