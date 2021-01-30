<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

class Category extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCategory');
    }

    public function index_get()
    {
        $data_category = $this->ModelCategory->getDataCategory();
        $this->response([
            'message'   => 'sukses',
            'status'    => true,
            'data'      => $data_category
        ], 200);
    }
}
