<?php

    class Dashboard extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('login') == false){
                redirect(base_url());
            }
            $this->load->model('ModelIkan');
            $this->load->model('ModelUsers');
            $this->load->model('ModelOrder');
            $this->load->model('ModelCourier');
            $this->load->model('ModelArea');
            $this->load->model('ModelShipping');
            $this->load->model('ModelLaporan');
        }

        public function index(){
            $date = date('Y-m-d');
            $data = array(
                "title"             => "Dashboard - Toko Ikan Hias",
                "active_index"      => true,
                "count_jenis"       => $this->db->get('tbl_jenis')->result_array(),
                "count_pemesanan"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Diproses"),
                "count_proses"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Pembayaran"),
                "count_product"     => $this->ModelIkan->getAllDataProduct(),
                "count_users"       => $this->ModelUsers->getAllData(0),
                "count_courier"     => $this->ModelCourier->getDataCourier(),
                "count_pengemasan"  => $this->ModelOrder->getDataOrderByStatus("Sedang Dikemas"),
                "count_pembayaran"  => $this->ModelOrder->getDataOrderByTwoStatus("Sedang Diproses","Menunggu Pembayaran"),
                "count_shipping"    => $this->ModelShipping->getCountShippingByDate($date,0),
                "count_shippingDelay" => $this->ModelShipping->getCountShippingDelayByStatus(1),

            );
            $this->load->view('layout/header',$data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar',$data);
            $this->load->view('dashboard/index');
            $this->load->view('layout/footer');
        }

        public function list_product(){
            $data = array(
                "title"             => "Dashboard - Data Produk",
                "active_product"    => true,
                "data_product"      => $this->ModelIkan->getAllDataProduct(),
                "count_jenis"       => $this->db->get('tbl_jenis')->result_array(),
                "count_pemesanan"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Diproses"),
                "count_proses"      => $this->ModelOrder->getDataOrderByStatus("Menunggu Pembayaran"),
                "count_pengemasan"  => $this->ModelOrder->getDataOrderByStatus("Sedang Dikemas"),
                "count_pembayaran"  => $this->ModelOrder->getDataOrderByTwoStatus("Sedang Diproses","Menunggu Pembayaran")
            );
            $this->load->view('layout/header',$data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar',$data);
            $this->load->view('dashboard/product/data_product',$data);
            $this->load->view('layout/footer');
        }

        public function list_jenis(){
            $data = array(
                "title"             => "Dashboard - Data Jenis",
                "active_jenis"    => true,
                "count_jenis"    => $this->db->get('tbl_jenis')->result_array(),
                "count_pemesanan"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Diproses"),
                "count_proses"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Pembayaran"),
                "count_pengemasan"  => $this->ModelOrder->getDataOrderByStatus("Sedang Dikemas"),
                "count_pembayaran"  => $this->ModelOrder->getDataOrderByTwoStatus("Sedang Diproses","Menunggu Pembayaran")
            );
            $this->load->view('layout/header',$data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar',$data);
            $this->load->view('dashboard/lain/list_jenis',$data);
            $this->load->view('layout/footer');
        }

        

        public function list_users(){
            $data = array(
                "title"             => "Dashboard - Data Merk",
                "active_users"    => true,
                "count_jenis"    => $this->db->get('tbl_jenis')->result_array(),
                "data_users"    => $this->ModelUsers->getAllData(0),
                "count_pemesanan"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Diproses"),
                "count_proses"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Pembayaran"),
                "count_pengemasan"  => $this->ModelOrder->getDataOrderByStatus("Sedang Dikemas"),
                "count_pembayaran"  => $this->ModelOrder->getDataOrderByTwoStatus("Sedang Diproses","Menunggu Pembayaran")
            );
            $this->load->view('layout/header',$data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar',$data);
            $this->load->view('dashboard/users/data_users',$data);
            $this->load->view('layout/footer');
        }

        public function list_pemesanan(){
            $data = array(
                "title"             => "Dashboard - Data Pemesanan",
                "active_pemesanan"      => true,
                "count_jenis"       => $this->db->get('tbl_jenis')->result_array(),
                "count_pemesanan"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Diproses"),
                "count_proses"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Pembayaran"),
                "count_pengemasan"  => $this->ModelOrder->getDataOrderByStatus("Sedang Dikemas"),
                "count_pembayaran"  => $this->ModelOrder->getDataOrderByTwoStatus("Sedang Diproses","Menunggu Pembayaran")
            );  
            $this->load->view('layout/header',$data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar',$data);
            $this->load->view('dashboard/order/list_order_not',$data);
            $this->load->view('layout/footer');
        }

        public function list_pembayaran(){
            $data = array(
                "title"             => "Dashboard - Data Transaksi",
                "active_pembayaran"      => true,
                "count_jenis"       => $this->db->get('tbl_jenis')->result_array(),
                "count_pemesanan"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Diproses"),
                "count_proses"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Pembayaran"),
                "count_pengemasan"  => $this->ModelOrder->getDataOrderByStatus("Sedang Dikemas"),
                "count_pembayaran"  => $this->ModelOrder->getDataOrderByTwoStatus("Menunggu Pembayaran","Sedang Diproses")
            );  
            $this->load->view('layout/header',$data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar',$data);
            $this->load->view('dashboard/order/list_pembayaran',$data);
            $this->load->view('layout/footer');
        }

        public function list_pengemasan(){
            $data = array(
                "title"             => "Dashboard - Data Transaksi",
                "active_pengemasan"      => true,
                "count_jenis"       => $this->db->get('tbl_jenis')->result_array(),
                "count_pemesanan"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Diproses"),
                "count_proses"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Pembayaran"),
                "count_pengemasan"  => $this->ModelOrder->getDataOrderByStatus("Sedang Dikemas"),
                "count_pembayaran"  => $this->ModelOrder->getDataOrderByTwoStatus("Sedang Diproses","Menunggu Pembayaran"),
                "data_kurir"        => $this->ModelCourier->getDataCourier(),
            );  

            $this->load->view('layout/header',$data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar',$data);
            $this->load->view('dashboard/order/list_packaging',$data);
            $this->load->view('layout/footer');
        }

        public function list_pengiriman(){
            $data = array(
                "title"             => "Dashboard - Data Pengiriman",
                "active_pengiriman" => true,
                "count_jenis"       => $this->db->get('tbl_jenis')->result_array(),
                "count_pemesanan"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Diproses"),
                "count_proses"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Pembayaran"),
                "count_pengemasan"  => $this->ModelOrder->getDataOrderByStatus("Sedang Dikemas"),
                "count_pembayaran"  => $this->ModelOrder->getDataOrderByTwoStatus("Sedang Diproses","Menunggu Pembayaran"),
                "data_sedangdikirim"  => $this->ModelShipping->getDataShippingByStatus('Sedang Dikirim'),
                "data_akandikirim"  => $this->ModelShipping->getDataResumeShipping('Menunggu Pengiriman'),
                "data_tunda"  => $this->ModelShipping->getDataShippingDelayWeb('Ditunda'),
                "data_diterima"  => $this->ModelShipping->getDataShippingByStatus('Sudah diterima'),
                "data_kurir"        => $this->ModelCourier->getDataCourier(),
            );  
            $this->load->view('layout/header',$data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar',$data);
            $this->load->view('dashboard/order/list_shipping',$data);
            $this->load->view('layout/footer');
        }

        public function jadwal_pengiriman(){
            $number_courier = $this->uri->segment(3);
            $date_shipping = $this->uri->segment(4);
           
            $date = date('Y-m-d');
            $data = array(
                "title"             => "Dashboard - Jadwal Pengiriman",
                "active_jadwal" => true,
                "count_jenis"       => $this->db->get('tbl_jenis')->result_array(),
                "count_pemesanan"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Diproses"),
                "count_proses"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Pembayaran"),
                "count_pengemasan"  => $this->ModelOrder->getDataOrderByStatus("Sedang Dikemas"),
                "count_pembayaran"  => $this->ModelOrder->getDataOrderByTwoStatus("Sedang Diproses","Menunggu Pembayaran"),
                "data_kurir"        => $this->ModelCourier->getDataCourier(),
                "jadwal_pengiriman" => $this->ModelShipping->getDataJadwalPengiriman($date)
            );  
            if($number_courier != null){
                $data['detail_order'] = $this->ModelOrder->getDataOrderByIdCourier($number_courier,$date_shipping);
                $data['detail_courier'] = $this->ModelCourier->getDataCourierByIdCourier($number_courier);
            }
            $this->load->view('layout/header',$data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar',$data);
            $this->load->view('dashboard/jadwal/jadwal_pengiriman',$data);
            $this->load->view('layout/footer');
        }

        public function list_kurir(){
            $data = array(
                "title"             => "Dashboard - Data Kurir",
                "active_kurir"      => true,
                "count_jenis"       => $this->db->get('tbl_jenis')->result_array(),
                "count_pemesanan"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Diproses"),
                "data_kurir"        => $this->ModelCourier->getDataCourier(),
                "count_proses"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Pembayaran"),
                "count_pengemasan"  => $this->ModelOrder->getDataOrderByStatus("Sedang Dikemas"),
                "count_pembayaran"  => $this->ModelOrder->getDataOrderByTwoStatus("Sedang Diproses","Menunggu Pembayaran"),
                "data_wilayah"      => $this->ModelArea->getDataArea()
            );  
            $this->load->view('layout/header',$data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('dashboard/kurir/list_kurir');
            $this->load->view('layout/footer');
        }

        public function list_wilayah(){
            $data = array(
                "title"             => "Dashboard - Data Kurir",
                "active_kurir"      => true,
                "count_jenis"       => $this->db->get('tbl_jenis')->result_array(),
                "count_pemesanan"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Diproses"),
                "data_kurir"        => $this->ModelCourier->getDataCourier(),
                "count_proses"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Pembayaran"),
                "count_pengemasan"  => $this->ModelOrder->getDataOrderByStatus("Sedang Dikemas"),
                "count_pembayaran"  => $this->ModelOrder->getDataOrderByTwoStatus("Sedang Diproses","Menunggu Pembayaran"),
                "data_wilayah"      => $this->ModelArea->getDataArea()
            );  
            $this->load->view('layout/header',$data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('dashboard/kurir/list_wilayah');
            $this->load->view('layout/footer');
        }

        public function laporan(){
            if(isset($_POST['submit'])){
                $date = $this->input->post('bulan');
                $array = explode("-",$date);
                $year = $array[0];
                $month = $array[1];
            }else{
                $month = date('m');
                $year = date('Y');
            }

            $monthName = $this->getMonth($month);
            $wilayah  = $this->ModelArea->getDataArea();
            $namaWilayah = [];
            $jumlahPerWilayah = [];
            foreach($wilayah as $w){
                array_push($namaWilayah,$w['nama_wilayah']);
                $id_wilayah = $w['id_wilayah'];
                $getCountPerWilayah = $this->ModelShipping->getCountPerWilayah($id_wilayah,1,$month,$year);
                $jumlah = $getCountPerWilayah['jumlah'];
                array_push($jumlahPerWilayah,$jumlah);
            }
            $namaProduct = [];
            $getProduct = $this->ModelIkan->getDataProductChart($month,$year);
            foreach($getProduct as $product){
                array_push($namaProduct,$product['nama_ikan']);
            }

            // var_dump($getProduct);die;

           
            $data = array(
                "title"             => "Laporan FikFish",
                "active_laporan"    => true,
                "date"              => $monthName." ".$year,
                "count_jenis"       => $this->db->get('tbl_jenis')->result_array(),
                "count_pemesanan"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Diproses"),
                "data_kurir"        => $this->ModelCourier->getDataCourier(),
                "count_proses"   => $this->ModelOrder->getDataOrderByStatus("Menunggu Pembayaran"),
                "count_pengemasan"  => $this->ModelOrder->getDataOrderByStatus("Sedang Dikemas"),
                "count_pembayaran"  => $this->ModelOrder->getDataOrderByTwoStatus("Sedang Diproses","Menunggu Pembayaran"),
                "laporan"           => $this->ModelLaporan->getDataLaporan($month,$year),
                "nama_wilayah"      => $namaWilayah,
                "jumlahPerwilayah"  => $jumlahPerWilayah,
                "nama_product"      => $namaProduct,
                "productChart"      => $getProduct
            );  
            $this->load->view('layout/header',$data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('dashboard/laporan/laporan');
            $this->load->view('layout/footer');
        }

        function randomHex() {
            $chars = 'ABCDEF0123456789';
            $color = '#';
            for ( $i = 0; $i < 6; $i++ ) {
               $color .= $chars[rand(0, strlen($chars) - 1)];
            }
            return $color;
         }

        function getMonth($month){
            if($month == 1){
                $monthName = "Januari";
            }else if($month == 2){
                $monthName = "Februari";
            }else if($month == 3){
                $monthName = "Maret";
            }else if($month == 4){
                $monthName = "April";
            }else if($month == 5){
                $monthName = "Mei";
            }else if($month == 6){
                $monthName = "Juni";
            }else if($month == 7){
                $monthName = "Juli";
            }elseif($month == 8){
                $monthName = "Agustus";
            }else if($month == 9){
                $monthName = "September";
            }else if($month == 10){
                $monthName = "Oktober";
            }else if($month == 11){
                $monthName = "November";
            }else if($month == 12){
                $monthName = "Desember";
            }

            return $monthName;
        }
       
    }