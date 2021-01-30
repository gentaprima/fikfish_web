<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';
class Order extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCart');
        $this->load->model('ModelOrder');
    }

    public function addOrder_post(){
        $id_users = $this->input->post('id_users');
        $order_id = "ORD-". date('Ymd'). rand(000,999);
        $ongkir = $this->input->post('ongkir');
        if($id_users != null){
            $getDataCart = $this->ModelCart->getDataCartByIdUsersAndStatus($id_users,0);
            foreach ($getDataCart as $key) {
                # code...
                $data = array([
                    'order_id'      => $order_id,
                    'id_cart'       => $key['id_cart'],
                    'date_order'    => date('Y-m-d'),
                    'image_payment' => "",
                    'status'        => "Menunggu Diproses",
                    'shipping_costs' => $ongkir
                ]);
                
                $this->ModelOrder->addOrder($data);
                $updateData = array(
                    'is_order'  => 1 
                );
                $this->ModelCart->updateData($updateData,$key['id_cart']);
            }
            $this->response([
                'message'   => "Terimakasih, Pesanan anda akan segara diproses",
                'status'    => true
            ],200);
        }else{
            $this->response([
                'message'   => "Silahkan login terlebih dahulu ...",
                'status'    => true
            ],200);
        }
    }


    public function getDataOrder_post(){
        $id_users = $this->input->post('id_users');
        $getDataUsers = $this->ModelOrder->getDataOrderByIdUsers($id_users);
        $this->response([
            'status'    => true,
            'data'      => $getDataUsers
        ],200);
    }

    public function getDataOrderByOrderId_post(){
        $id_order = $this->input->post('id_order');
        $getDataOrder = $this->ModelOrder->getDataOrderByIdOrder($id_order);
        $total_harga = $this->ModelOrder->getTotalHargaOrder($id_order);
        $this->response([
            'status'    => true,
            'data'      => $getDataOrder,
            'total_harga'   => $total_harga['total_harga']
        ],200);
    }

    public function payment_post(){
        $image = $_FILES['image']['name'];
        $id_order = $this->input->post('id_order');
        
        
        $config['upload_path']          = './assets/image_payment/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->upload->initialize($config);

        if($this->upload->do_upload('image')){
            $data = array(
                'image_payment'         => $image,
                'status'                => "Sedang Diproses"
            );
            $this->ModelOrder->updateData($data,$id_order);
            $this->response([
                'message'   => "Pembayaran Berhasil dilakukan",
                'status'    => true
            ],200);
        }else{
            
            $this->response([
                'message'   => "Foto Profil gagal diperbarui",
                'status'    => false
            ],200);
        }
        
    }

    public function cancelOrder_post(){
        $id_order = $this->input->post('id_order');
        $data = array(
            'status'    => "Dibatalkan"
        );
        $this->ModelOrder->updateData($data,$id_order);
            $this->response([
                'message'   => "Pesanan berhasil dibatalkan",
                'status'    => true
        ],200);
    }
}
