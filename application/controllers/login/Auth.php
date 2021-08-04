<?php

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('dashboard/dashboard');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == false) {
                $this->load->view('login/login_page');
            } else {
                // Validasi Success
                $this->_login();
            }
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        if ($user) {
            if ($user['is_active'] == 0) {
                if ($password == $user['password']) {
                    $data = [
                        'username' => $user['username']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard/dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                    redirect('login/auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User Tidak Aktif!</div>');
                redirect('login/auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Salah!</div>');
            redirect('login/auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login/auth');
    }

    // public function login()
    // {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');

    //     $spp_login = $this->login_model->login($username, $password);

    //     if ($spp_login->num_rows()) {
    //         $user    = $spp_login->row_array();

    //         $this->session->set_userdata('username', $user['username']);
    //         $this->session->set_userdata('id_user', $user['id_user']);
    //         $this->session->set_userdata('role', $user['role']);
    //         $this->session->set_userdata('nama_user', $user['nama_user']);

    //         redirect('dashboard/dashboard');
    //     } else {

    //         redirect(site_url('login/auth'), 'refresh');
    //     }
    // }
}
