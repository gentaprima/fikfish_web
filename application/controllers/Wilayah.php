<?php

class Wilayah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelArea');
    }

    public function addData()
    {
        $nama = $this->input->post('nama_wilayah');
        if ($nama != null) {
            $data = array(
                'nama_wilayah'  => $nama
            );
            $this->ModelArea->addData($data);
            $this->session->set_flashdata('icon', "success");
            $this->session->set_flashdata('title', "Tambah Berhasil !");
            $this->session->set_flashdata('text', "Data Wilayah berhasil ditambahkan");
            redirect(base_url('dashboard/list_wilayah'));
        } else {
            $this->session->set_flashdata('icon', "warning");
            $this->session->set_flashdata('title', "Tambah Gagal !");
            $this->session->set_flashdata('text', "Maaf, Data tidak boleh kosong !");
            redirect(base_url('dashboard/list_wilayah'));
        }
    }

    public function updateWilayah()
    {
        $nama = $this->input->post('wilayah');
        $id = $this->input->post('id_wilayah');
        if ($nama != null) {
            $data = array(
                'nama_wilayah'  => $nama
            );
            $this->ModelArea->updateData($data, $id);
            $this->session->set_flashdata('icon', "success");
            $this->session->set_flashdata('title', "Ubah Berhasil !");
            $this->session->set_flashdata('text', "Data Wilayah berhasil diubah");
            redirect(base_url('dashboard/list_wilayah'));
        } else {
            $this->session->set_flashdata('icon', "error");
            $this->session->set_flashdata('title', "Ubah Gagal !");
            $this->session->set_flashdata('text', "Maaf, Data tidak boleh kosong !");
            redirect(base_url('dashboard/list_wilayah'));
        }
    }

    public function deleteWilayah()
    {
        $id = $this->uri->segment(3);

        $this->ModelArea->deleteData($id);
        $this->session->set_flashdata('icon', "success");
        $this->session->set_flashdata('title', "Hapus Berhasil !");
        $this->session->set_flashdata('text', "Data Wilayah berhasil dihapus");
        redirect(base_url('dashboard/list_wilayah'));
    }
}
