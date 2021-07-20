<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DiagramModel');

        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('Dashboard');
        $datas['hasil'] = $this->DiagramModel->Jum_data();

        $this->template->load('layouts/template', 'member/dashboard', $data, $datas);
    }
}
