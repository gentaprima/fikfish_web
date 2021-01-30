<?php

use chriskacerguis\RestServer\RestController;
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';
class Courier extends RestController{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCourier');
    }

    public function loginCourier_post(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if($username != null && $password != null){
            $getDataCourier = $this->ModelCourier->getDataCourierByUsername($username);
            if($getDataCourier != null){
                $hash = $getDataCourier['password'];
                if(password_verify($password,$hash)){
                    $this->response([
                        'message'   => "sukses",
                        'status'    => true,
                        'user_data' => $getDataCourier
                    ],200);
                }else{
                    $this->response([
                        'message'   => 'Maaf, Password tidak cocok !',
                        'status'    => false
                    ],200);
                }
            }else{
                $this->response([
                    'message'   => 'Maaf, Username tidak ditemukan !',
                    'status'    => false
                ],200);
            }
        }else{
            $this->response([
                'message'   => 'Maaf, Data tidak boleh kosong !',
                'status'    => false
            ],200);
        }
        
    }

    public function updateProfile_post(){
        $id_user = $this->input->post('id_users');
        $username = $this->input->post('username');
        $full_name = $this->input->post('full_name');
        $no_hp = $this->input->post('no_hp');

        if($username != null && $full_name != null && $no_hp != null){
            $data = array(
                'courier_name'  => $full_name,
                'phone'         => $no_hp
            );

            $this->ModelCourier->updateData($data,$username);
            $this->response([
                'message'   => "Data Profil berhasil diubah",
                'status'    => true
            ],200);
        }else{
            $this->response([
                'message'   => "Maaf, data tidak boleh kosong",
                'status'    => false
            ],200);
        }
    }

    public function changeEmail_post(){
        $oldEmail = $this->input->post('oldEmail');
        $newEmail = $this->input->post('newEmail');
        $confirmEmail = $this->input->post('confirmEmail');
        $id_users = $this->input->post('id_users');
        $username = $this->input->post('username');

        if($oldEmail != null && $newEmail != null && $confirmEmail != null && $username != null){
            if($newEmail == $confirmEmail){
                $cekData = $this->ModelCourier->getDataCourierByUsername($username);
                $dbEmail = $cekData['email'];
                if($oldEmail == $dbEmail){
                    $data = array(
                        'email' => $newEmail
                    );

                    $this->ModelCourier->updateData($data,$username);
                    $this->response([
                        'message'   => "Data Email berhasil diperbarui",
                        'status'    => true
                    ],200);
                }else{
                    $this->response([
                        'message'   => "Maaf, email lama yang anda input tidak cocok",
                        'status'    => false
                    ],200);
                }
            }else{
                $this->response([
                    'message'   => "Maaf, email baru dengan konfirmasi email tidak cocok",
                    'status'    => false
                ],200);
            }
        }else{
            $this->response([
                'message'   => "Maaf, data tidak boleh kosong",
                'status'    => false
            ],200);
        }
    }

    public function changePassword_post(){
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');
        $id_users = $this->input->post('id_users');
        $username = $this->input->post('username');

        if($old_password != null && $new_password != null && $confirm_password != null && $username != null){
            if($new_password == $confirm_password ){
                $cekData = $this->ModelCourier->getDataCourierByUsername($username);
                $dbPassword = $cekData['password'];
                if(password_verify($old_password,$dbPassword)){
                    $data = array(
                        'password'  => password_hash($new_password,PASSWORD_DEFAULT)
                    );
                    $this->ModelCourier->updateData($data,$username);
                    $this->response([
                        'message'   => "Data Password berhasil diperbarui",
                        'status'    => true
                    ],200);
                }else{
                    $this->response([
                        'message'   => "Maaf, password lama yang anda input tidak cocok",
                        'status'    => false
                    ],200);
                }
            }else{
                $this->response([
                    'message'   => "Maaf, password baru dengan konfirmasi password tidak cocok",
                    'status'    => false
                ],200);
            }
        }else{
            $this->response([
                'message'   => "Maaf, data tidak boleh kosong",
                'status'    => false
            ],200);
        }
    }
}