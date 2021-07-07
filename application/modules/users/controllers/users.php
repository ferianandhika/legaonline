<?php
class Users extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['title'] = 'index | users';
        $data['content'] = 'daftar list users akses';
        $page = 'users/v_show';
        echo modules::run('template/loadview', $data, $page);

        $query = $this->db->get('prodi');
        echo "<pre>";
        print_r($query->result());
        echo "</pre>";
    }
}
