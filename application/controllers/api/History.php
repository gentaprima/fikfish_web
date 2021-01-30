<?php

use chriskacerguis\RestServer\RestController;
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';
class History extends RestController{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelShipping');
    }

    public function getDataHistory_post(){
        $id_courier = $this->input->post('id_courier');
        $month = date('m');

        $getData = $this->ModelShipping->getDataHistoryByIdCourier($id_courier,$month);

        $this->response([
            'status'        => true,
            'data_history'  => $getData
        ],200);
    }

    public function getDataHistoryByDate_post(){
        $id_courier = $this->input->post('id_courier');
        $date = $this->input->post('date');

        $getData = $this->ModelShipping->getDataShippingByIdCourierAndDate($id_courier,$date);

        $this->response([
            'status'        => true,
            'data_history'  => $getData
        ],200);
    }
}