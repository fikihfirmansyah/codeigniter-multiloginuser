
<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Gunungsitoli extends MY_Controller
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
        $data1 = $this->DiagramModel->gunungsitoli();
        $data['data'] = json_encode($data1);
        $this->template->load('layouts/template', 'member/diagram/gunungsitoli', $data);
    }
}
