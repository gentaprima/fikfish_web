<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';
class Wishlist extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelWishlist');
    }

    public function getData_post()
    {
        $id_users = $this->input->post('id_users');
        $getData = $this->ModelWishlist->getDataWishlist($id_users);
        $this->response([
            'data'      => $getData,
            'status'    => true
        ], 200);
    }

    public function addData_post()
    {
        $id_users = $this->input->post('id_users');
        $id_product = $this->input->post('id_product');

        if ($id_product != null && $id_users != null) {
            $cekData = $this->ModelWishlist->getDataWishlistById($id_product, $id_users);
            if ($cekData == null) {
                $data = array(
                    'id_product'    => $id_product,
                    'id_users'      => $id_users
                );
                $this->ModelWishlist->addData($data);
                $this->response([
                    'message'   => 'Produk berhasil ditambahkan ke dalam daftar favorit anda',
                    'status'    => 'true'
                ], 200);
            } else {
                $this->ModelWishlist->deleteData($id_product, $id_users);
                $this->response([
                    'message'   => 'Produk berhasil dihapus dari daftar favorit anda',
                    'status'    => 'false'
                ], 200);
            }
        } else {
            $this->response([
                'message'   => 'Produk gagal ditambahkan !!',
                'status'    => 'false'
            ], 200);
        }

        
    }

    public function cekDataWish_post()
    {
        $id_users = $this->input->post('id_users');
        $id_product = $this->input->post('id_product');

        $cekData = $this->ModelWishlist->getDataWishlistById($id_product, $id_users);
        if ($cekData != null) {
            $this->response([
                'message'   => 'produk ada',
                'status'    => 'true'
            ], 200);
        } else {
            $this->response([
                'message'   => 'produk gaada',
                'status'    => 'false'
            ], 200);
        }
    }

    public function deleteFavorite_post()
    {
        $id_product = $this->input->post('id_product');
        $id_users = $this->input->post('id_users');

        $this->ModelWishlist->deleteData($id_product, $id_users);
        $this->response([
            'message'   => 'Produk berhasil dihapus dari daftar favorit anda',
            'status'    => true
        ], 200);
    }
}
