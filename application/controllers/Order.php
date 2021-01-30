<?php

class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelOrder');
        $this->load->model('ModelCart');
        $this->load->model('ModelIkan');
    }

    public function readDataByIdOrder()
    {
        $id_order = $this->uri->segment(3);

        $getData = $this->ModelOrder->getDataOrderByIdOrder($id_order);
        echo json_encode($getData);
    }

    public function confirm_order()
    {
        $id_order = $this->uri->segment(3);
        if ($id_order != null) {
            $data = array(
                'status'    => "Menunggu Pembayaran"
            );
            $this->ModelOrder->updateData($data, $id_order);
            $this->session->set_flashdata('icon', "success");
            $this->session->set_flashdata('title', "Konfirmasi Pesanan ");
            $this->session->set_flashdata('text', "Pesanan dengan ID Pesanan " . $id_order . " Berhasil Dikonfirmasi");
            $message = "Terimakasih, Pesanan Anda Sudah Di Konfirmasi";
            $this->sendNotification($message, $id_order);
            redirect(base_url('dashboard/list_pemesanan/'));
        } else {
            redirect(base_url('dashboard/list_pemesanan/'));
        }
    }

    public function cancelOrder()
    {
        $id_order = $this->uri->segment(3);
        $data = array(
            'status'    => "Dibatalkan"
        );
        $this->ModelOrder->updateData($data, $id_order);
        $this->session->set_flashdata('icon', "success");
        $this->session->set_flashdata('title', "Konfirmasi Pesanan ");
        $this->session->set_flashdata('text', "Pesanan dengan No Pesanan " . $id_order . " Telah dibatalkan");
        $message = "Mohon maaf, Pesanan anda telah dibatalkan";
        $this->sendNotification($message, $id_order);
        redirect(base_url('dashboard/list_pemesanan/'));
    }

    public function packaging_order()
    {
        $id_order = $this->uri->segment(3);
        if ($id_order != null) {
            $data = array(
                'status'    => "Sedang Dikemas"
            );
            $this->ModelOrder->updateData($data, $id_order);
            $this->session->set_flashdata('icon', "success");
            $this->session->set_flashdata('title', "Konfirmasi Pesanan ");
            $this->session->set_flashdata('text', "Pesanan dengan ID Pesanan " . $id_order . " Berhasil Dikonfirmasi");
            $message = "Terimakasih, Pesanan Anda Sedang Dikemas";
            $this->sendNotification($message, $id_order);
            redirect(base_url('dashboard/list_pembayaran/'));
        } else {
            redirect(base_url('dashboard/list_pembayaran/'));
        }
    }

    public function sendCourier()
    {
        $number_order = $this->input->post('number_order');
        $id_kurir = $this->input->post('kurir');
        $getDataOrder = $this->ModelOrder->getDataOrderByNumber($number_order);
        $id_order = $getDataOrder['order_id'];
        $getDataOrder2 = $this->ModelOrder->getDataByIdOrderOrderDesc($id_order);
        $newNumberOrder = $getDataOrder2['number'];
        $date = date('Y-m-d');
        if ($id_kurir != null) {
            $data = array(
                'id_order'      => $number_order,
                'id_courier'    => $id_kurir,
                'date_shipping' => $date
            );
            $this->ModelOrder->sendCourier($data);
            $updateStatus = array(
                'status'    => "Sedang Dikirim"
            );
            $this->ModelOrder->updateData($updateStatus, $id_order);
            $message = "Terimakasih, Pesanan Anda Sedang Dikirim oleh kurir kami";
            $this->sendNotification($message, $id_order);
            $this->session->set_flashdata('icon', "success");
            $this->session->set_flashdata('title', "Penyerahan Pesanan Sukses ");
            $this->session->set_flashdata('text', "Pesanan Berhasil diserahkan kepada kurir !");
            redirect(base_url('dashboard/list_pengemasan/'));
        } else {
            $this->session->set_flashdata('icon', "error");
            $this->session->set_flashdata('title', "Pengiriman Pesanan Gagal ");
            $this->session->set_flashdata('text', "Maaf, Data tidak boleh kosong");
            redirect(base_url('dashboard/list_pengemasan/'));
        }
    }

    public function test()
    {
        $order_id = "ORD-20201212513";
        $getDataOrder = $this->ModelOrder->getDataOrderByIdOrder($order_id);
        $arrayInput = [];
        $arrayDataPerhitungan = [];
        foreach ($getDataOrder as $gdo) {
            $idCart = $gdo['id_cart'];
            $getDataCart = $this->ModelCart->getDataCartByIdCart($idCart);
            $idProduk = $getDataCart['id_product'];
            $qty = $getDataCart['quantity'];
            $jumlahInput = 1 * $qty;
            array_push($arrayInput, $idProduk);

            $getDataPerhitungan = $this->ModelIkan->getDataPerhitunganByIdResult($idProduk);
            if ($getDataPerhitungan != null) {
                $perhitunganProduk = $this->ModelIkan->getDataPerhitunganByIdRow($idProduk);
                array_push($arrayDataPerhitungan, $perhitunganProduk['id_product']);
            }
        }
        $compareArray = array_diff($arrayInput, $arrayDataPerhitungan);
        if ($compareArray == null) {
            //update data 
            for ($i = 0; $i < count($arrayDataPerhitungan); $i++) {
                $idProduk = $arrayDataPerhitungan[$i];
                $getDataProduk = $this->ModelIkan->getDataPerhitunganByIdRow($idProduk);
                $oldJumlah = $getDataProduk['jumlah'];
                $newJumlah = $oldJumlah + 1;

                $data = array([
                    'id_product'  => $idProduk,
                    'jumlah'      => $newJumlah
                ]);

                $this->db->update_batch('tbl_perhitunganproduk', $data, 'id_product');
            }
        } else {
            for ($i = 0; $i < count($arrayDataPerhitungan); $i++) {
                $idProduk = $arrayDataPerhitungan[$i];
                $getDataProduk = $this->ModelIkan->getDataPerhitunganByIdRow($idProduk);
                $oldJumlah = $getDataProduk['jumlah'];
                $newJumlah = $oldJumlah + 1;

                $data = array([
                    'id_product'  => $idProduk,
                    'jumlah'      => $newJumlah
                ]);

                $this->db->update_batch('tbl_perhitunganproduk', $data, 'id_product');
            }
            $newArray = array_diff($arrayInput, $arrayDataPerhitungan);

            for ($j = 0; $j < count($newArray); $j++) {
                $idProduk = $compareArray[$j];

                $insertData = array([
                    'id_product'    => $idProduk,
                    'jumlah'        => 1
                ]);

                $this->db->insert_batch('tbl_perhitunganproduk', $insertData);
            }
        }
    }

    public function test_notif()
    {
        $this->sendNotification("cacad", 'ORD-123124');
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

        print_r($p);
    }
}
