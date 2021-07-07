<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Legalisir extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('M_legalisir');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['judul'] = 'Halaman Legalisir | SIMALEJA';
    $data['prodi'] = $this->M_legalisir->getProdi();
    $data['userr'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('user/legalisir', $data);
    $this->load->view('templates/footer');
  }

  public function upload_file()
  {
    $config['upload_path'] = './upload/';
    $config['allowed_types'] = 'pdf';
    // $config['max_size']  = '0';
    // $config['max_width']  = '1024';
    // $config['max_height']  = '768';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('fileijazah')) {
      return [
        'error' => $this->upload->display_errors(),
        'file_ijazah' => ''
        // 'file_transkrip' => '',
      ];
    } else {
      // upload foto baru
      return [
        'error' => '',
        'file_ijazah' => $this->upload->data('file_name'),
        // 'file_transkrip' => $this->upload->data('filetranskrip')
      ];
    }
  }


  public function save()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('nim', 'Nim', 'required|numeric|max_length[8]');
    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('hp', 'No HP', 'required|numeric|max_length[13]');
    $this->form_validation->set_rules('prodi', 'Prodi', 'required');
    $this->form_validation->set_rules('tahun', 'Tahun_Lulus', 'required');
    $this->form_validation->set_rules('ijazah', 'No Ijazah', 'required');
    // $this->form_validation->set_rules('file_ijazah', 'File Ijazah', 'required');
    // $this->form_validation->set_rules('filetranskrip', 'File Transkrip', 'required');
    $this->form_validation->set_rules('jmlijazah', 'Jumlah ijazah', 'required');
    $this->form_validation->set_rules('jmltranskrip', 'Jumlah transkrip', 'required');
    $this->form_validation->set_rules('alasan', 'Alasan', 'required');
    $this->form_validation->set_rules('option', 'Option', 'required');


    if ($this->form_validation->run() == true) {
      $upload = $this->upload_file();
      // $data = [
      //   'file_ijazah'   => $upload['fileijazah']
      //   // 'file_transkrip'   => $upload['filetranskrip']

      // ];
      $config['upload_path'] = './upload/';
      $config['allowed_types'] = 'pdf';
      // $config['max_size']  = '0';
      // $config['max_width']  = '1024';
      // $config['max_height']  = '768';

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('fileijazah')) {
        $error = array('error' => $this->upload->display_errors());
        $dataDokumen = "";
      } else {
         $dataDokumens = $this->upload->data();
         $dataDokumen = $dataDokumens['file_name'];
      }


      $configs['upload_path'] = './upload/';
      $configs['allowed_types'] = 'pdf';
      // $config['max_size']  = '0';
      // $config['max_width']  = '1024';
      // $config['max_height']  = '768';

      $this->load->library('upload', $configs);

      if (!$this->upload->do_upload('filetranskrip')) {
        $error = array('error' => $this->upload->display_errors());
        $dataDokumen1 = "";
      } else {
         $dataDokumens1 = $this->upload->data();
         $dataDokumen1 = $dataDokumens1['file_name'];
      }
      $data['id_user'] = $this->input->post('id_user');
      $data['nama'] = $this->input->post('nama');
      $data['nim'] = $this->input->post('nim');
      $data['jenis_kelamin'] = $this->input->post('jk');
      $data['alamat'] = $this->input->post('alamat');
      $data['no_hp'] = $this->input->post('hp');
      $data['prodi'] = $this->input->post('prodi');
      $data['tahun_lulus'] = $this->input->post('tahun');
      $data['no_ijazah'] = $this->input->post('ijazah');
      $data['file_ijazah'] = $dataDokumen;
      $data['file_transkrip'] = $dataDokumen1;
      $data['jumlah_ijazah'] = $this->input->post('jmlijazah');
      $data['jumlah_transkrip'] = $this->input->post('jmltranskrip');
      $data['alasan'] = $this->input->post('alasan');
      $data['pengiriman'] = $this->input->post('option');
      $this->M_legalisir->save($data);
      redirect('user/legalisir');
    } else {

      $data['judul'] = 'Halaman Legalisir | SIMALEJA';
      $data['prodi'] = $this->M_legalisir->getProdi();
      $data['userr'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('user/legalisir', $data);
      $this->load->view('templates/footer');
    }
  }
}