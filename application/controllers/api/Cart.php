<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';
class Cart extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCart');
    }

    public function addCart_post()
    {
        $id_product = $this->input->post('id_product');
        $id_users = $this->input->post('id_users');
        $date = date('Y-m-d');

        $cekProduct = $this->ModelCart->getDataCartById($id_product, $id_users);
        if ($cekProduct == null) {
            $qty = 1;
            $data = array(
                'id_product'    => $id_product,
                'id_users'      => $id_users,
                'quantity'      => $qty,
                'date'          => $date
            );
            $this->ModelCart->insertData($data);
        } else {
            $getQty = $cekProduct['quantity'];
            $qty = $getQty + 1;
            $id_cart = $cekProduct['id_cart'];
            $data = array(
                'quantity'      => $qty
            );
            $this->ModelCart->updateData($data, $id_cart);
        }
        $this->response([
            'message'   => "Produk berhasil dimasukan kedalam keranjang anda",
            'status'    => true
        ], 200);
    }

    public function getDataCart_post()
    {
        $id_users = $this->input->post('id_users');

        $getData = $this->ModelCart->getDataCart($id_users);
        $data_total = $this->ModelCart->getTotalHarga($id_users);
        $total_harga = $data_total['total_harga'];
        $this->response([
            'status'        => true,
            'data'          => $getData,
            'total_harga'   => $total_harga
        ], 200);
    }

    public function deleteCart_post()
    {
        $id_users = $this->input->post('id_users');
        if ($id_users != null) {
            $this->ModelCart->deleteData($id_users,0);
            $this->response([
                'message'   => "Produk dalam keranjang berhasil dihapus",
                'status'    => true
            ], 200);
        } else {
            $this->response([
                'message'   => "Silahkan login terlebih dahulu ...",
                'status'    => false
            ], 200);
        }
    }

    public function plusCart_post()
    {
        $id_cart = $this->input->post('id_cart');

        $getDataCart = $this->ModelCart->getDataCartByIdCart($id_cart);
        $beforeQty = $getDataCart['quantity'];
        $afterQty = $beforeQty + 1;
        $data = array(
            'quantity'  => $afterQty
        );
        $this->ModelCart->updateData($data, $id_cart);
        $this->response([
            'message'   => "Jumlah quantity berhasil ditambahkan",
            'status'    => true
        ], 200);
    }

    public function minCart_post()
    {
        $id_cart = $this->input->post('id_cart');

        $getDataCart = $this->ModelCart->getDataCartByIdCart($id_cart);
        $beforeQty = $getDataCart['quantity'];
        $afterQty = $beforeQty - 1;
        if ($afterQty > 0) {
            $data = array(
                'quantity'  => $afterQty
            );
            $this->ModelCart->updateData($data, $id_cart);
        } else {
            $this->ModelCart->deleteDataByIdCart($id_cart);
        }

        $this->response([
            'message'   => "Jumlah quantity berhasil dikurangi",
            'status'    => true
        ], 200);
    }
}
