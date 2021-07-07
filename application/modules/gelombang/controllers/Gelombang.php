<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Gelombang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->login     = $this->session->userdata('log_admin')['is_logged_in'];
        $this->id        = $this->session->userdata('log_admin')['id'];
        $this->level    = $this->session->userdata('log_admin')['id_groups'];
        $this->username    = $this->session->userdata('log_admin')['username'];
        if (empty($this->login) && ($this->level != 1 || $this->level != 2)) {
            redirect('Admin_login', 'refresh');
        }
        $this->logout   = base_url('Admin_login/logout');
        $this->u2        = $this->uri->segment(2);
        $this->u3        = $this->uri->segment(3);
        $this->u4        = $this->uri->segment(4);
        $this->load->model('M_Universal', 'universal');
        $data = $this->universal->getOne(array("id" => $this->id), "users");
        if (file_exists('upload/profil/' . $data->foto)) {
            $this->foto = base_url('upload/profil/' . $data->foto);
        } else {
            $this->foto = base_url('assets/admin/images/avatar/avatar5.png');
        }
    }
    public function index()
    {
        if ($this->u2 == "create") {
            $config_rules = [
                [
                    'field' => 'name',
                    'label' => "Name Gelombang",
                    'rules' => 'required|trim'
                ],
                [
                    'field' => 'status',
                    'label' => 'Status',
                    'rules' => 'required|trim|numeric'
                ],
            ];
            $this->form_validation->set_rules($config_rules);
            if ($this->form_validation->run() == TRUE) {
                if ($this->input->post('status') == 1) {
                    $getActive = $this->universal->getOneSelect('status', ['status' => 1], 'gelombang');
                    if (!$getActive) {
                        $data = [
                            'nama_gel' => htmlspecialchars($this->input->post('name'), true),
                            'status' => htmlspecialchars($this->input->post('status'), true)
                        ];
                    } else {
                        $this->session->set_flashdata('flash-error', 'Maaf masih ada gelombang yang active');
                        redirect('gelombang', 'refresh');
                    }
                } else {
                    $data = [
                        'nama_gel' => htmlspecialchars($this->input->post('name'), true),
                        'status' => htmlspecialchars($this->input->post('status'), true)
                    ];
                }
                $insert = $this->universal->insert($data, 'gelombang');
                if ($insert) {
                    $this->session->set_flashdata('flash-sukses', 'Berhasil tambah gelombang');
                } else {
                    $this->session->set_flashdata('flash-error', 'Gagal tambah gelombang');
                }
                redirect('gelombang', 'refresh');
            } else {
                $this->notifikasi->gagalAdd(validation_errors());
                redirect('gelombang');
            }
        } else if ($this->u2 == "delete") {
            $id_gelombang = dekrips($this->input->post('id_gelombang'));
            $delete = $this->universal->delete(['id' => $id_gelombang], 'gelombang');
            $this->input->post($this->security->get_csrf_token_name(), true);
            $response['token'] = $this->security->get_csrf_hash();
            if ($delete) {
                $response = [
                    'status' => true,
                    'messege' => "Berhasil hapus data",
                    'token' => $this->security->get_csrf_hash()
                ];
            } else {
                $response = [
                    'status' => false,
                    'messege' => "Gagal hapus data",
                    'token' => $this->security->get_csrf_hash()
                ];
            }
            echo json_encode($response, true);
        } else if ($this->u2 == 'update') {
            $config_rules = [
                [
                    'field' => 'name_gel',
                    'label' => "Nama Groups",
                    'rules' => "required|trim"
                ],
            ];
            $this->form_validation->set_rules($config_rules);
            if ($this->form_validation->run() == TRUE) {
                $id_gelombang = dekrips($this->input->post('id_input', true));
                $data = [
                    'nama_gel' => htmlspecialchars($this->input->post('name_gel', true)),
                    'update_created' => date('Y-m-d H:i:s')
                ];
                $update = $this->universal->update($data, ['id' => $id_gelombang], 'gelombang');
                ($update) ?  $this->notifikasi->suksesEdit("") : $this->notifikasi->gagalEdit();
                redirect('gelombang');
            } else {
                $this->notifikas->gagalEdit(validation_errors());
                redirect('gelombang', 'refresh');
            }
        } else if ($this->u2 == "non_active") {
            $id_gelombang = dekrip($this->u3);
            $data = [
                'status' => 0,
                'update_created' => date('Y-m-d H:i:s')
            ];
            $non_active = $this->universal->update($data, ['id' => $id_gelombang], 'gelombang');
            if ($non_active) {
                $this->session->set_flashdata('flash-sukses', 'Berhasil non active');
            } else {
                $this->session->set_flashdata('flash-error', 'Gagal non active');
            }
            redirect('gelombang');
        } else if ($this->u2 == "active") {
            $id_gelombang = dekrip($this->u3);
            $getActive = $this->universal->getOneSelect('status', ['status' => 1], 'gelombang');
            if (!$getActive) {
                $data = [
                    'status' => 1,
                    'update_created' => date('Y-m-d H:i:s')
                ];
            } else {
                $this->session->set_flashdata('flash-error', 'Maaf masih ada gelombang yang active!!');
                redirect('gelombang');
            }
            $non_active = $this->universal->update($data, ['id' => $id_gelombang], 'gelombang');
            if ($non_active) {
                $this->session->set_flashdata('flash-sukses', 'Berhasil active');
            } else {
                $this->session->set_flashdata('flash-error', 'Gagal active');
            }
            redirect('gelombang');
        } else {
            $get_gelombang = $this->universal->getMulti('', 'gelombang');
            $params = [
                'title' => "Gelombang",
                'page' => "v_gelombang",
                'gelombang' => $get_gelombang,
            ];
            template($params, $this->level);
        }
    }
}

/* End of file Gemlombang.php */
