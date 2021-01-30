<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('login') == true) {
            redirect(base_url('dashboard/'));
        }
        $this->load->view('login/index');
    }

    public function proses_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username == null) {
            $this->session->set_flashdata('icon', "warning");
            $this->session->set_flashdata('title', "Login Gagal !");
            $this->session->set_flashdata('text', "Maaf, Username tidak boleh kosong !!");
            redirect(base_url());
        }

        if ($password == null) {
            $this->session->set_flashdata('icon', "warning");
            $this->session->set_flashdata('title', "Login Gagal !");
            $this->session->set_flashdata('text', "Maaf, Password tidak boleh kosong !!");
            redirect(base_url());
        }

        $getData = $this->db->get_where('tbl_users', array("username" => $username))->row_array();

        if ($getData > 0) {
            $password_db = $getData['password'];
            if (password_verify($password, $password_db)) {
                $role = $getData['role'];
                if ($role == 2) {
                    $this->session->set_userdata('users_id', $getData['username']);
                    $this->session->set_userdata('full_name', $getData['full_name']);
                    $this->session->set_userdata('login_admin', true);
                    $this->session->set_userdata('login', true);
                    redirect(base_url('dashboard/'));
                } else {
                    // $this->session->set_userdata('users_id', $getData['username']);
                    // $this->session->set_userdata('full_name', $getData['full_name']);
                    // $this->session->set_userdata('login', true);
                    // redirect(base_url('dashboard/'));
                    $this->session->set_flashdata('icon', "error");
                    $this->session->set_flashdata('title', "Login Gagal !");
                    $this->session->set_flashdata('text', "Maaf, Anda tidak bisa masuk ke sistem kami !!");
                    redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('icon', "error");
                $this->session->set_flashdata('title', "Login Gagal !");
                $this->session->set_flashdata('text', "Maaf, Password tidak cocok !!");
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('icon', "error");
            $this->session->set_flashdata('title', "Login Gagal !");
            $this->session->set_flashdata('text', "Maaf, Username tidak ditemukan !!");
            redirect(base_url());
        }
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url());
    }
}
