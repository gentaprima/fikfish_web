<?php

use chriskacerguis\RestServer\RestController;


require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';
class Shipping extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelShipping');
        $this->load->model('ModelOrder');
        $this->load->model('ModelCart');
        $this->load->model('ModelIkan');
    }

    public function getDataShipping_post()
    {
        $id_courier = $this->input->post('id_courier');
        // $date = date('Y-m-d');
        $date = $this->input->post('date');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $getDataShipping = $this->ModelShipping->getDataShippingByIdCourier($id_courier, $date, $latitude, $longitude, 0);

        $this->response([
            'message'       => "Data Sukses",
            'status'        => true,
            'data_shipping' => $getDataShipping
        ], 200);
    }

    public function delayShipping_post()
    {
        $id_shipping = $this->input->post('id_shipping');

        $updateShipping = array(
            'is_delayed'    => 1
        );
        $getDataShipping = $this->ModelShipping->getDataShippingByIdShipping($id_shipping);
        $getDataOrder = $this->ModelOrder->getDataOrderByNumber($getDataShipping['id_order']);
        $order_id = $getDataOrder['order_id'];

        if($getDataShipping['resend'] == 0 ){
            $updateBiaya = array(
                'additional_costs'  => '5000',
                'status'            => 'Ditunda'
            );
            $changeStatusResend = [
                'resend'    => 1
            ];
            $this->ModelShipping->updateData($changeStatusResend,$id_shipping);
        }else if($getDataShipping['resend'] == 1){
            $updateBiaya = array(
                'additional_costs'  => '10000',
                'status'            => 'Ditunda'
            );
            $changeStatusResend = [
                'resend'    => 2
            ];
            $this->ModelShipping->updateData($changeStatusResend,$id_shipping);
        }
        
        $this->ModelShipping->updateData($updateShipping, $id_shipping);
        $this->ModelOrder->updateData($updateBiaya, $order_id);

        $this->response([
            'message'   => "Pengiriman berhasil di tunda !!",
            'status'    => true
        ], 200);
    }

    public function getDataShippingDelay_post()
    {
        $id_courier = $this->input->post('id_courier');
        // $date = date('Y-m-d');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $getDataShipping = $this->ModelShipping->getDataShippingDelay($id_courier, $latitude, $longitude, 1);

        $this->response([
            'message'       => "Data Sukses",
            'status'        => true,
            'data_shipping' => $getDataShipping
        ], 200);
    }

    public function getCountPengiriman_post()
    {
        $id_courier = $this->input->post('id_courier');
        // $date = date('Y-m-d');
        $date =  $this->input->post('date');

        $getDataShippingAll = $this->ModelShipping->getCountShipping($id_courier, 0, $date);
        $getDataShippingDelay = $this->ModelShipping->getCountShippingDelay($id_courier, 1);
        $getDataShippingDone = $this->ModelShipping->getCountShippingByStatus($id_courier, 0, $date);

        $this->response([
            'status'            => true,
            'count_shipping'    => count($getDataShippingAll),
            'count_delay'       => count($getDataShippingDelay),
            'count_shipping_done'   => count($getDataShippingDone)
        ], 200);
    }

    public function changeDelay_post()
    {
        $id_shipping = $this->input->post('id_shipping');
        // $date = date('Y-m-d');
        $getDataShipping = $this->ModelShipping->getDataShippingByIdShipping($id_shipping);
        $number_order = $getDataShipping['id_order'];
        $getDataOrder = $this->ModelOrder->getDataOrderByNumber($number_order);
        $id_order = $getDataOrder['order_id'];

        $updateShipping = array(
            'is_delayed'    => 0
        );

        $updateStatusOrder = array(
            'status'    => 'Sedang Dikirim'
        );

        $this->ModelShipping->updateData($updateShipping, $id_shipping);
        $this->ModelOrder->updateData($updateStatusOrder, $id_order);

        $this->response([
            'message'   => "Pengiriman berhasil dilanjutkan",
            'status'    => true
        ], 200);
    }
    public function resumeShipping_post()
    {
        $number_order = $this->input->post('number_order');
        $date = $this->input->post('date');

        if ($date != null) {
            $getDataShipping = $this->ModelShipping->getDataShippingByNumberOrder($number_order);
            $id_shipping = $getDataShipping['id_shipping'];
            $getDataOrder = $this->ModelOrder->getDataOrderByNumber($number_order);
            $id_order = $getDataOrder['order_id'];

            $updateShipping = array(
                'is_delayed'    => 1,
                'date_shipping' => $date
            );

            $updateStatusOrder = array(
                'status'    => 'Menunggu Pengiriman'
            );

            $this->ModelOrder->updateData($updateStatusOrder, $id_order);
            $this->ModelShipping->updateData($updateShipping, $id_shipping);

            $this->response([
                'message'   => "Jadwal Pengiriman berhasil diubah",
                'status'    => true
            ], 200);
        } else {
            $this->response([
                'message'   => "Mohon maaf, Tanggal pengiriman tidak boleh kosong ",
                'status'    => false
            ], 200);
        }
    }

    function randomHex() {
        $chars = 'ABCDEF0123456789';
        $color = '#';
        for ( $i = 0; $i < 6; $i++ ) {
           $color .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $color;
     }
     
     

    public function orderAccepted_post()
    {
        $id_shipping = $this->input->post('id_shipping');
        $receiver = $this->input->post('receiver');
        $date_received = date('Y-m-d');
        $order_id = $this->input->post('order_id');
        $month = date('m');
        $hex = "#"; 
       
        if ($id_shipping != null && $receiver != null && $order_id != null) {
            $updateShipping = array(
                'status_shipping'   => 1,
                'date_received'     => $date_received,
                'receiver'          => $receiver
            );

            $data = array(
                'status'    => "Sudah Diterima"
            );


            $this->ModelOrder->updateData($data, $order_id);
            $this->ModelShipping->updateData($updateShipping, $id_shipping);

            $getDataOrder = $this->ModelOrder->getDataOrderByIdOrder($order_id);
            $arrayInput = [];
            $newArray = [];
            $compareArray = [];
            $arrayDataPerhitungan = [];
            foreach ($getDataOrder as $gdo) {
                $idCart = $gdo['id_cart'];
                $getDataCart = $this->ModelCart->getDataCartByIdCart($idCart);
                $idProduk = $getDataCart['id_product'];
                $qty = $getDataCart['quantity'];
                $jumlahInput = 1 * $qty;
                array_push($arrayInput, $idProduk);

                $getDataPerhitungan = $this->ModelIkan->getDataPerhitunganByIdResult($idProduk,$month);
                if ($getDataPerhitungan != null) {
                    $perhitunganProduk = $this->ModelIkan->getDataPerhitunganByIdRow($idProduk,$month);
                    array_push($arrayDataPerhitungan, $perhitunganProduk['id_product']);
                }
            }
            $compareArray = array_diff($arrayInput, $arrayDataPerhitungan);
            if ($compareArray == null) {
                //update data 
                for ($i = 0; $i < count($arrayDataPerhitungan); $i++) {
                    $idProduk = $arrayDataPerhitungan[$i];
                    $getDataProduk = $this->ModelIkan->getDataPerhitunganByIdRow($idProduk,$month);
                    $oldJumlah = $getDataProduk['jumlah'];
                    $newJumlah = $oldJumlah + 1;

                    $data = array(
                        'jumlah'        => $newJumlah,
                        
                    );
                    $this->db->update('tbl_perhitunganproduk',$data,array('id_product' => $idProduk,'month' => $month));
                    // $this->db->update_batch('tbl_perhitunganproduk', $data, array('id_product'));
                }
            } else {
                for ($i = 0; $i < count($arrayDataPerhitungan); $i++) {
                    $idProduk = $arrayDataPerhitungan[$i];
                    $getDataProduk = $this->ModelIkan->getDataPerhitunganByIdRow($idProduk,$month);
                    $oldJumlah = $getDataProduk['jumlah'];
                    $newJumlah = $oldJumlah + 1;

                    $data = array(
                        'jumlah'      => $newJumlah,
                    );

                    $this->db->update('tbl_perhitunganproduk',$data,array('id_product' => $idProduk,'month' => $month));
                    // $this->db->update_batch('tbl_perhitunganproduk', $data, 'id_product');
                }
                $newArray = array_values(array_filter($compareArray));

                for ($j = 0; $j < count($newArray); $j++) {
                    $idProduk = $newArray[$j];

                    $insertData = array([
                        'id_product'    => $idProduk,
                        'jumlah'        => 1,
                        'date_product'  => $date_received,
                        'month'         => $month,
                        'warna_chart'   => $this->randomHex()
                    ]);

                    $this->db->insert_batch('tbl_perhitunganproduk', $insertData);
                }
            }

            $message = "Terimakasih, Pesanan anda sudah diterima oleh " . $receiver;
            $this->sendNotification($message, $order_id);
            $this->response([
                'message'   => "Pesanan berhasil dikirim !!",
                'status'    => true
            ], 200);
        } else {
            $this->response([
                'message'   => "Data Tidak Boleh kosong !!",
                'status'    => false
            ], 200);
        }
    }

    public function cancelShipping_post(){
        $id_shipping = $this->input->post('id_shipping');
        if($id_shipping != null){
            $changeStatusShipping = [
                'status_shipping'    => 2
            ];
            $getDataShipping = $this->ModelShipping->getDataShippingByIdShipping($id_shipping);
            $getDataOrder = $this->ModelOrder->getDataOrderByNumber($getDataShipping['id_order']);
            $order_id = $getDataOrder['order_id'];

            $changeStatusOrder = [
                'status'    => "Dibatalkan"
            ];

            $this->ModelShipping->updateData($changeStatusShipping,$id_shipping);
            $this->ModelOrder->updateData($changeStatusOrder,$order_id);
            $this->response([
                'message'   => "Pengiriman berhasil dibatalkan",
                'status'    => true
            ],200);
        }else{
            $this->response([
                'message'   => "gagal",
                'status'    => true
            ],200);
        }
    }

    public function getDataShippingByNumber_post()
    {
        $number_order = $this->input->post('number_order');
        if ($number_order != null) {
            $dataShipping = $this->ModelShipping->getDataShippingByNumberOrder($number_order);
            if ($dataShipping != null) {
                $this->response([
                    'message'   => "Data ditemukan",
                    'status'    => true,
                    'dataShipping' => $dataShipping
                ], 200);
            } else {
                $this->response([
                    'message'   => "Data tidak ada !",
                    'status'    => false
                ], 200);
            }
        } else {
            $this->response([
                'message'   => "No order tidak boleh kosong",
                'status'    => false
            ], 200);
        }
    }

    public function sendNotification($message, $order_id)
    {
        $token = 'fOn4_-A8QpadUOYSTPQKlf:APA91bGV4l6EKjeY5uCIgXk3ej9r7nUel_ekVnb7fdhKfvQVpgO3qt1EuokTBEJlPoNWtvzGLDVjRxTeRBG0cnT0OQaJb68s-1m30JOG9K9GOOsYl-efnliw6r_b_gXkwRr9PmCZQvVP'; // push token


        $this->load->library('fcm');
        $this->fcm->setTitle('Transaksi ' . $order_id);
        $this->fcm->setMessage($message);

        /**
         * set to true if the notificaton is used to invoke a function
         * in the background
         */
        $this->fcm->setIsBackground(false);

        /**
         * payload is userd to send additional data in the notification
         * This is purticularly useful for invoking functions in background
         * -----------------------------------------------------------------
         * set payload as null if no custom data is passing in the notification
         */
        $payload = array('notification' => '');
        $this->fcm->setPayload($payload);


        /**
         * Get the compiled notification data as an array
         */
        $json = $this->fcm->getPush();

        $p = $this->fcm->send($token, $json);
    }
}
