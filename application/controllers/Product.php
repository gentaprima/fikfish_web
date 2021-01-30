<?php

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelIkan');
    }

    public function addProduct()
    {
        $nama = $this->input->post('nama_ikan');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');
        $deskripsi = $this->input->post('deskripsi');
        $checkFoto = $_FILES['foto']['name'];


        if ($nama != null && $harga != null && $jenis != null  && $deskripsi != null && $checkFoto != "") {
            $foto = $this->__uploadFile();
            $data = array(
                "nama_ikan"      => $nama,
                "harga"             => $harga,
                "foto"              => $foto,
                "deskripsi"         => $deskripsi,
                "id_jenis"       => $jenis,
            );
            $this->ModelIkan->addProduct($data);
            $this->session->set_flashdata('icon', "success");
            $this->session->set_flashdata('title', "Tambah Sukses !");
            $this->session->set_flashdata('text', "Data Ikan berhasil ditambahkan");
            redirect(base_url('dashboard/list_product'));
        } else {
            $this->session->set_flashdata('icon', "warning");
            $this->session->set_flashdata('title', "Tambah Gagal !");
            $this->session->set_flashdata('text', "Data tidak boleh kosong");
            redirect(base_url('dashboard/list_product'));
        }
    }

    public function deleteProduct()
    {
        $id = $this->uri->segment(3);
        $this->ModelIkan->deleteProduct($id);
        $this->session->set_flashdata('icon', "success");
        $this->session->set_flashdata('title', "Hapus Sukses !");
        $this->session->set_flashdata('text', "Data Produk berhasil dihapus");
        redirect(base_url('dashboard/list_product'));
    }

    public function updateProduct()
    {
        $id = $this->input->post('id_product');
        $nama = $this->input->post('nama_ikan');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');
        $deskripsi = $this->input->post('deskripsi');
        $checkFoto = $_FILES['foto']['name'];

        $getDataProduct = $this->db->get_where('tbl_ikan',array('id_ikan' => $id))->row_array();
        if ($nama != null && $harga != null && $jenis != null && $deskripsi != null ) {
            $fotoDb = $getDataProduct['foto'];
            
            if($checkFoto == null){
                $foto = $fotoDb;
            }else{
                $foto = $this->__uploadFile();
            }

            $data = array(
                "nama_ikan"      => $nama,
                "harga"             => $harga,
                "foto"              => $foto,
                "deskripsi"         => $deskripsi,
                "id_jenis"          => $jenis,
            );
            $this->ModelIkan->updateProduct($data,$id);
            $this->session->set_flashdata('icon', "success");
            $this->session->set_flashdata('title', "Update sukses !");
            $this->session->set_flashdata('text', "Data Ikan Berhail diubah !!");
            redirect(base_url('dashboard/list_product'));
        }else{
            $this->session->set_flashdata('icon', "warning");
            $this->session->set_flashdata('title', "Update Gagal !");
            $this->session->set_flashdata('text', "Maaf, Data tidak boleh kosong !!");
            redirect(base_url('dashboard/list_product'));
        }
    }

    public function __uploadFile()
    {
        $config['upload_path']          = './assets/image_product/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->upload->initialize($config);
        if($this->upload->do_upload('foto')){
            $data = array("upload_data" => $this->upload->data());
            $foto = $data['upload_data']['file_name'];
            return $foto;
        }else{
            $this->session->set_flashdata('icon', "error");
            $this->session->set_flashdata('title', "Tambah Gagal !");
            $this->session->set_flashdata('text', "Foto tidak ter upload");
            redirect(base_url('dashboard/list_product'));
        }
    }

    public function readDataById(){
        $id = $this->uri->segment(3);
        $data = $this->ModelIkan->readDataByIdProduct($id);
        echo json_encode($data);
    }
}
