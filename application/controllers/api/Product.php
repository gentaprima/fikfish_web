<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

class Product extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelIkan');
    }

    public function index_get()
    {
        $data_product = $this->ModelIkan->getProduct(5);
        $this->response([
            'message'       => "sukses",
            'status'        => true,
            'data_product'  => $data_product
        ], 200);
    }

    public function categoryProduct_post()
    {
        $id_category = $this->input->post('id_jenis');

        if ($id_category != null) {
            $data_product =  $this->ModelIkan->getProductByCategory($id_category);
        } else {
            $data_product = $this->ModelIkan->getProduct(10);
        }

        $this->response([
            'message'       => "sukses",
            'status'        => true,
            'data_product'  => $data_product
        ], 200);
    }
}
