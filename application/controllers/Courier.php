<?php

class Courier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCourier');
    }

    public function addData()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $username = $this->input->post('username');
        $wilayah = $this->input->post('wilayah');

        if ($nama != null && $email != null && $no_hp != null && $username != null) {
            $hashPassword = password_hash($username, PASSWORD_DEFAULT);
            $data = array(
                'username'  => $username,
                'email'     => $email,
                'phone'     => $no_hp,
                'password'  => $hashPassword,
                'courier_name' => $nama,
                'id_wilayah'   => $wilayah
            );
            $this->ModelCourier->addData($data);
            $this->session->set_flashdata('icon', "success");
            $this->session->set_flashdata('title', "Tambah Data Berhasil !");
            $this->session->set_flashdata('text', "Data Kurir berhasil ditambahkan ");
            redirect(base_url('dashboard/list_kurir'));
        } else {
            $this->session->set_flashdata('icon', "error");
            $this->session->set_flashdata('title', "Tambah Data Gagal !");
            $this->session->set_flashdata('text', "Mohon Lengkapi Data terlebih dahulu");
            redirect(base_url('dashboard/list_kurir'));
        }
    }

    public function updateData()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $username = $this->input->post('username');
        $wilayah = $this->input->post('wilayah');

        if ($nama != null && $email != null && $no_hp != null && $username != null) {
            $hashPassword = password_hash($username, PASSWORD_DEFAULT);
            $data = array(
                'email'     => $email,
                'phone'     => $no_hp,
                'password'  => $hashPassword,
                'courier_name' => $nama,
                'id_wilayah'    => $wilayah
            );
            $this->ModelCourier->updateData($data, $username);
            $this->session->set_flashdata('icon', "success");
            $this->session->set_flashdata('title', "Ubah Data Berhasil !");
            $this->session->set_flashdata('text', "Data Kurir berhasil diubah ");
            redirect(base_url('dashboard/list_kurir'));
        } else {
            $this->session->set_flashdata('icon', "error");
            $this->session->set_flashdata('title', "Ubah Data Gagal !");
            $this->session->set_flashdata('text', "Mohon Lengkapi Data terlebih dahulu");
            redirect(base_url('dashboard/list_kurir'));
        }
    }

    public function deleteCourier()
    {
        $idCourier = $this->uri->segment(3);

        $this->ModelCourier->deleteData($idCourier);
        $this->session->set_flashdata('icon', "success");
        $this->session->set_flashdata('title', "Hapus Data Berhasil !");
        $this->session->set_flashdata('text', "Data Kurir berhasil hapus ");
        redirect(base_url('dashboard/list_kurir'));
    }
}
