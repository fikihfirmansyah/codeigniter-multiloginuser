
<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Kualatanjung extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DiagramModel');
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {

        $data = konfigurasi('Dashboard');
        $data1 = $this->DiagramModel->kualatanjung();
        $data['data'] = json_encode($data1);
        $this->template->load('layouts/template', 'member/diagram/kualatanjung', $data);
    }
}
