<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Person extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Person_model');
        $this->check_login();
        if ($this->session->userdata('id_role') != '1') {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data            = konfigurasi('Person', 'Kelola Person');
        $data['persons'] = $this->Person_model->get_all();
        $this->template->load('layouts/template', 'admin/persons/index', $data);
    }

    public function add()
    {
        $data = konfigurasi('Tambah Person', 'Tambah Person');
        $this->template->load('layouts/template', 'admin/persons/create', $data);
    }

    public function create()
    {
        $name    = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $photo = $this->input->post('photo');
        $activated = $this->input->post('activated');

        $data = [
            'name'    => $name,
            'email' => $email,
            'phone' => $phone,
            'photo' => $photo,
            'activated' => $activated,
        ];
        $this->Person_model->insert($data);
        redirect('admin/person');
    }

    public function edit($id)
    {
        $data           = konfigurasi('Edit Person', 'Edit Person');
        $data['person'] = $this->Person_model->get_by_id($id);
        $this->template->load('layouts/template', 'admin/persons/update', $data);
    }

    public function update()
    {
        $id      = $this->input->post('id');
        $name    = $this->input->post('id_role');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $photo = $this->input->post('photo');
        $activated = $this->input->post('activated');

        $data = [
            'name'    => $name,
            'email' => $email,
            'phone' => $phone,
            'photo' => $photo,
            'activated' => $activated,
        ];
        $this->Person_model->update(['id' => $id], $data);
        redirect('admin/person');
    }

    public function detail($id)
    {
        $data           = konfigurasi('Detail Person', 'Detail Person');
        $data['person'] = $this->Person_model->get_by_id($id);
        $this->template->load('layouts/template', 'admin/persons/detail', $data);
    }

    public function delete($id)
    {
        $this->Person_model->delete($id);
        redirect('admin/person');
    }
}

/* End of file Person.php */
