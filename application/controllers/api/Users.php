<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

class Users extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('ModelUsers');
    }

    public function register_post()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $full_name = $this->input->post('full_name');
        $password = $this->input->post('password');
        $hash = password_hash($password,PASSWORD_DEFAULT);

        if ($username != null && $email != null && $full_name != null && $password != null) {

            $checkUsername = $this->db->get_where('tbl_users', array("username" => $username))->row_array();
            if ($checkUsername == null) {

                $checkemail = $this->db->get_where('tbl_users', array("email" => $email))->row_array();
                if ($checkemail == null) {

                    $data = array(
                        "username"      => $username,
                        "full_name"     => $full_name,
                        "password"      => $hash,
                        "email"         => $email
                        
                    ); 
                    $this->ModelUsers->addData('tbl_users',$data);
                    $getData = $this->db->get_where('tbl_users',array("username" => $username))->row_array();
                    $users_id = $getData['id_users'];  
                    $insertDetail = array(
                        "users_id"      => $users_id
                    );
                    $this->ModelUsers->addData('tbl_detail_users',$insertDetail);
                    $this->response([
                        'message'   => "Pendaftaran Akun berhasil, Silahkan login !",
                        'status'    => true
                    ], 200);

                } else {
                    $this->response([
                        'message'   => "Maaf, Email sudah digunakan",
                        'status'    => false
                    ], 200);
                }
            } else {

                $this->response([
                    'message'   => "Maaf, Username sudah digunakan",
                    'status'    => false
                ], 200);
            }
        } else {

            $this->response([
                'message'   => "Maaf, Data tidak boleh kosong",
                'status'    => false
            ], 200);
        }
    }

    public function login_post()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username == null) {
            $this->response([
                'message'   => "Username tidak boleh kosong",
                'status'    => false
            ], 200);
        }

        if ($password == null) {
            $this->response([
                'message'   => "Password tidak boleh kosong",
                'status'    => false
            ], 200);
        }

        $checkUsername = $this->db->get_where('tbl_users', array('username' => $username))->row_array();
        if ($checkUsername > 0) {
            $id_users = $checkUsername['id_users'];
            
            $users_data = $this->ModelUsers->getDataByUsersId($id_users);

            $checkPassword = $checkUsername['password'];
            if (password_verify($password, $checkPassword)) {

                $this->response([
                    'message'       => "sukses",
                    'status'        => true,
                    'users_data'    => $users_data
                ], 200);
            } else {
                $this->response([
                    'message'   => "Maaf, Username atau Password tidak cocok",
                    'status'    => false
                ], 200);
            }
        } else {
            $this->response([
                'message'   => "Maaf, Username yang anda masukan tidak terdaftar",
                'status'    => false
            ], 200);
        }
    }
}
