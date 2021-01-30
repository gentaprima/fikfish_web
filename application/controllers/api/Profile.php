<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

class Profile extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUsers');
    }

    public function changeProfile_post()
    {
        $id_user = $this->input->post('id_users');
        $username = $this->input->post('username');
        $full_name = $this->input->post('full_name');
        $no_hp = $this->input->post('no_hp');

        if ($username != null && $full_name != null && $no_hp != null) {
            $data = array(
                "username"      => $username,
                "full_name"     => $full_name,
                "no_hp"         => $no_hp
            );
            $this->ModelUsers->updateProfile($data, $id_user);
            $this->response([
                'message'       => "Data Profile Berhasil Diubah !",
                'status'        => true
            ], 200);
        } else {
            $this->response([
                'message'   => "Data Tidak Boleh Kosong !",
                'status'    => false
            ], 200);
        }
    }

    public function changePassword_post(){
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');
        $id_users = $this->input->post('id_users');

        if($old_password != null && $new_password != null && $confirm_password != null){
            $dataUsers = $this->ModelUsers->getDataByUsersId($id_users);
            $db_pass = $dataUsers['password'];
            if(password_verify($old_password,$db_pass)){
                if($confirm_password == $new_password){
                    $hashPassword = password_hash($new_password,PASSWORD_DEFAULT);
                    $data = array(
                        'password'  => $hashPassword
                    );
                    $this->ModelUsers->updateProfile($data, $id_users);
                    $this->response([
                        'message'       => "Data Password Berhasil Diubah !",
                        'status'        => true
                    ], 200);
                }else{
                    $this->response([
                        'message'   => "Password tidak sama dengan konfirmasi password !!",
                        'status'    => false
                    ],200);
                }
            }else{
                $this->response([
                    'message'   => "Password lama tidak sama !!",
                    'status'    => false
                ],200);
            }
        }else{
            $this->response([
                'message'   => "Data tidak boleh kosong !!",
                'status'    => false
            ],200);
        }
    }

    public function changeEmail_post(){
        $oldEmail = $this->input->post('oldEmail');
        $newEmail = $this->input->post('newEmail');
        $confirmEmail = $this->input->post('confirmEmail');
        $id_users = $this->input->post('id_users');


        if($oldEmail != null && $newEmail != null && $confirmEmail != null){
            $dataUsers = $this->ModelUsers->getDataByUsersId($id_users);
            $dbEmail = $dataUsers['email'];

            if($oldEmail == $dbEmail){
                if($newEmail == $confirmEmail){
                    $data = array(
                        'email'  => $newEmail
                    );
                    $this->ModelUsers->updateProfile($data, $id_users);
                    $this->response([
                        'message'       => "Data Email Berhasil Diubah !",
                        'status'        => true
                    ], 200);
                }else{
                    $this->response([
                        'message'   => "Maaf, email baru dengan konfirmasi email tidak cocok !!",
                        'status'    => false
                    ],200);
                }
            }else{
                $this->response([
                    'message'   => "Maaf, Email lama tidak cocok !!",
                    'status'    => false
                ],200);
            }
        }else{
            $this->response([
                'message'   => "Data tidak boleh kosong !!",
                'status'    => false
            ],200);
        }
    }

    public function changeAddress_post(){
        $id_users = $this->input->post('id_users');
        $alamat = $this->input->post('alamat');
        $latitude = $this->input->post('latitude');
        $longtitude = $this->input->post('longtitude');

        if($alamat != null && $latitude != null && $longtitude != null){
            $data = array(
                'alamat'        => $alamat,
                'latitude'      => $latitude,
                'longtitude'    => $longtitude
            );
            $this->ModelUsers->updateDetailProfile($data,$id_users);
            $this->response([
                'message'   => "Data Alamat Pengiriman berhasil diperbarui",
                'status'    => true
            ],200);
        }else{
            $this->response([
                'message'   => "Data tidak boleh kosong !!!",
                'status'    => false    
            ],200);
        }

    }

    public function changePicture_post(){
        $image = $_FILES['image']['name'];
        $id_users = $this->input->post('id_users');
        
        
        $config['upload_path']          = './assets/image_profile/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->upload->initialize($config);

        if($this->upload->do_upload('image')){
            $data = array(
                'photo'         => $image,
            );
            $this->ModelUsers->updateDetailProfile($data,$id_users);
            $this->response([
                'message'   => "Foto Profil berhasil diperbarui",
                'status'    => true
            ],200);
        }else{
            
            $this->response([
                'message'   => "Foto Profil gagal diperbarui",
                'status'    => false
            ],200);
        }
        
    }

}
