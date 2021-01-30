<?php

class Jenis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function addJenis()
    {
        $type_name = $this->input->post('type_name');
        if ($type_name != null) {
            $data = array(
                "nama_jenis"     => $type_name
            );

            $this->db->insert('tbl_jenis', $data);
            $this->session->set_flashdata('icon', "success");
            $this->session->set_flashdata('title', "Tambah Sukses !");
            $this->session->set_flashdata('text', "Data Jenis berhasil ditambahkan");
            redirect(base_url('dashboard/list_jenis'));
        } else {
            $this->session->set_flashdata('icon', "warning");
            $this->session->set_flashdata('title', "Tambah Gagal !");
            $this->session->set_flashdata('text', "Maaf, Data tidak boleh kosong !");
            redirect(base_url('dashboard/list_jenis'));
        }
    }

    public function deleteJenis()
    {
        $id = $this->uri->segment(3);
        $this->db->delete('tbl_jenis', array('id_jenis' => $id));
        $this->session->set_flashdata('icon', "success");
        $this->session->set_flashdata('title', "Hapus Sukses !");
        $this->session->set_flashdata('text', "Data Jenis berhasil dihapus");
        redirect(base_url('dashboard/list_jenis'));
    }

    public function updateJenis()
    {
        $nama = $this->input->post('jenis');
        $id_jenis = $this->input->post('id_jenis');

        if ($nama != null) {
            $data = array(
                "nama_jenis"     => $nama
            );

            $this->db->update('tbl_jenis',$data,array('id_jenis' => $id_jenis));
            $this->session->set_flashdata('icon', "success");
            $this->session->set_flashdata('title', "Ubah Sukses !");
            $this->session->set_flashdata('text', "Data Jenis berhasil diubah");
            redirect(base_url('dashboard/list_jenis'));
        } else {
            $this->session->set_flashdata('icon', "warning");
            $this->session->set_flashdata('title', "Tambah Gagal !");
            $this->session->set_flashdata('text', "Maaf, Data tidak boleh kosong !");
            redirect(base_url('dashboard/list_jenis'));
        }
    }
}
