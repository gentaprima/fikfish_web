<?php

class Merk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function addMerk()
    {
        $merk_name = $this->input->post('merk_name');
        if ($merk_name != null) {
            $data = array(
                "nama_merk"     => $merk_name
            );

            $this->db->insert('tbl_merk', $data);
            $this->session->set_flashdata('icon', "success");
            $this->session->set_flashdata('title', "Tambah Sukses !");
            $this->session->set_flashdata('text', "Data Merk berhasil ditambahkan");
            redirect(base_url('dashboard/list_merk'));
        } else {
            $this->session->set_flashdata('icon', "warning");
            $this->session->set_flashdata('title', "Tambah Gagal !");
            $this->session->set_flashdata('text', "Maaf, Data tidak boleh kosong !");
            redirect(base_url('dashboard/list_merk'));
        }
    }

    public function deleteMerk()
    {
        $id = $this->uri->segment(3);
        $this->db->delete('tbl_merk', array('id_merk' => $id));
        $this->session->set_flashdata('icon', "success");
        $this->session->set_flashdata('title', "Hapus Sukses !");
        $this->session->set_flashdata('text', "Data Merk berhasil dihapus");
        redirect(base_url('dashboard/list_merk'));
    }

    public function updateMerk()
    {
    }
}
