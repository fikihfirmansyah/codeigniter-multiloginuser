<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Auth_model');
    }

    public function profile()
    {
        $data = konfigurasi('Profile', 'Kelola Profile');
        $this->template->load('layouts/template', 'authentication/profile', $data);
    }

    public function updateProfile()
    {
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('nipp', 'NIPP', 'trim|required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('branch', 'Branch', 'trim|required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('phone', 'Nomor HP', 'trim|required|numeric|min_length[5]|max_length[15]');

        $id = $this->session->userdata('id');
        $data = array(
            'username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'nipp' => $this->input->post('nipp'),
            'branch' => $this->input->post('branch'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
        );
        if ($this->form_validation->run() == true) {
            if (!empty($_FILES['photo']['name'])) {
                $upload = $this->_do_upload();

                //delete file
                $user = $this->Auth_model->get_by_id($this->session->userdata('id'));
                if (file_exists('assets/uploads/images/foto_profil/' . $user->photo) && $user->photo) {
                    unlink('assets/uploads/images/foto_profil/' . $user->photo);
                }

                $data['photo'] = $upload;
            }
            $result = $this->Auth_model->update($data, $id);
            if ($result > 0) {
                $this->updateProfil();
                $this->session->set_flashdata('msg', show_succ_msg('Data Profil Berhasil diubah'));
                redirect('auth/profile');
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
                redirect('auth/profile');
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/profile');
        }
    }

    public function updatePassword()
    {
        $this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required|min_length[5]|max_length[25]');

        $id = $this->session->userdata('id');
        if ($this->form_validation->run() == true) {
            if (password_verify($this->input->post('passLama'), $this->session->userdata('password'))) {
                if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
                    $this->session->set_flashdata('msg', show_err_msg('Password Baru dan Konfirmasi Password harus sama'));
                    redirect('auth/profile');
                } else {
                    $data = ['password' => get_hash($this->input->post('passBaru'))];
                    $result = $this->Auth_model->update($data, $id);
                    if ($result > 0) {
                        $this->updateProfil();
                        $this->session->set_flashdata('msg', show_succ_msg('Password Berhasil diubah'));
                        redirect('auth/profile');
                    } else {
                        $this->session->set_flashdata('msg', show_err_msg('Password Gagal diubah'));
                        redirect('auth/profile');
                    }
                }
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Password Salah'));
                redirect('auth/profile');
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/profile');
        }
    }

    private function _do_upload()
    {
        $config['upload_path']          = 'assets/uploads/images/foto_profil/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('auth/profile');
        }
        return $this->upload->data('file_name');
    }

    public function register()
    {
        $data = konfigurasi('Register');
        $this->template->load('authentication/layouts/template', 'authentication/register', $data);
    }

    public function check_register()
    {
        $data = konfigurasi('Register');
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules(
            'nipp',
            'NIPP',
            'trim|required|valid_email|min_length[5]|max_length[50]|is_unique[tbl_user.nipp]',
            array(
                'required'      => 'Kamu harus mengisi NIPP.',
                'is_unique'     => 'NIPP sudah digunakan.'
            )
        );
        $this->form_validation->set_rules('branch', 'Branch', 'trim|required|min_length[5]|max_length[100]');

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|min_length[5]|max_length[50]|is_unique[tbl_user.username]',
            array(
                'required'      => 'Kamu harus mengisi Username.',
                'is_unique'     => 'Username sudah digunakan.'
            )
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email|min_length[5]|max_length[50]|is_unique[tbl_user.email]',
            array(
                'required'      => 'Kamu harus mengisi Email.',
                'is_unique'     => 'Email sudah digunakan.'
            )
        );
        $this->form_validation->set_rules('phone', 'Nomor HP', 'trim|required|numeric|min_length[5]|max_length[15]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|min_length[5]|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->register();
        } else {
            $this->Auth_model->reg();
            $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box alert-warning">
              <div class="info-box-icon">
              <i class="fa fa-check-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">SUKSES</b><br>Pendaftaran berhasil, Status Akun Anda <b>PENDING</b>.</div>
              </div>
              </p>
            ');
            redirect('auth/login', 'refresh', $data);
        }
    }

    public function check_account()
    {
        //validasi login
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        //ambil data dari database untuk validasi login
        $query = $this->Auth_model->check_account($email, $password);

        if ($query === 1) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Email yang Anda masukkan tidak terdaftar.</div>
        			</div>
        			</p>
            ');
        } elseif ($query === 2) {
            $this->session->set_flashdata(
                'alert',
                '<p class="box-msg">
              <div class="info-box alert-warning">
              <div class="info-box-icon">
              <i class="fa fa-info-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">GAGAL</b><br>Akun yang Anda masukkan <b>TIDAK AKTIF</b>, silakan hubungi Administrator.</div>
              </div>
              </p>'
            );
        } elseif ($query === 3) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Password yang Anda masukkan salah.</div>
        			</div>
        			</p>
              ');
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
                'is_login'    => true,
                'id'          => $query->id,
                'password'    => $query->password,
                'id_role'     => $query->id_role,
                'username'    => $query->username,
                'name'  => $query->name,
                'nipp'  => $query->nipp,
                'branch'  => $query->branch,
                'role_name'  => $query->role_name,
                'email'       => $query->email,
                'phone'       => $query->phone,
                'photo'       => $query->photo,
                'last_login'  => $query->last_login,
                'created_at'  => $query->created_at,
                'updated_at'  => $query->updated_at,
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }
    public function login()
    {
        $data = konfigurasi('Login');
        //melakukan pengalihan halaman sesuai dengan levelnya
        if ($this->session->userdata('id_role') == "1") {
            redirect('admin/home');
        }
        if ($this->session->userdata('id_role') == "2") {
            redirect('member/home');
        }

        //proses login dan validasi nya
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');
            $error = $this->check_account();

            if ($this->form_validation->run() && $error === true) {
                $data = $this->Auth_model->check_account($this->input->post('email'), $this->input->post('password'));

                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
                if ($data->id_role == '1') {
                    redirect('admin/home');
                } elseif ($data->id_role == '2') {
                    redirect('member/home');
                }
            } else {
                $this->template->load('authentication/layouts/template', 'authentication/login', $data);
            }
        } else {
            $this->template->load('authentication/layouts/template', 'authentication/login', $data);
        }
    }
    public function logout()
    {
        date_default_timezone_set('ASIA/JAKARTA');
        $date = array('last_login' => date('Y-m-d H:i:s'));
        $id = $this->session->userdata('id');
        $this->Auth_model->logout($date, $id);
        $user_data = $this->session->userdata();
        foreach ($user_data as $key => $value) {
            if ($key != '__ci_last_regenerate' && $key != '__ci_vars')
                $this->session->unset_userdata($key);
        }
        $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box alert-success">
              <div class="info-box-icon">
              <i class="fa fa-check-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">SUKSES</b><br>Log Out Berhasil</div>
              </div>
              </p>
			');
        redirect('auth/login');
    }
}
