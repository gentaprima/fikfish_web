<?php

class ModelOrder extends CI_Model
{

    public function addOrder($data)
    {
        return $this->db->insert_batch('tb_order', $data);
    }

    public function getDataOrderByStatus($status)
    {
        $sql = "SELECT * FROM tb_order,tbl_cart,tbl_users,tbl_ikan,tbl_detail_users WHERE
                        tb_order.id_cart = tbl_cart.id_cart AND
                        tbl_cart.id_users = tbl_users.id_users AND
                        tbl_cart.id_product = tbl_ikan.id_ikan AND
                        tbl_users.id_users = tbl_detail_users.users_id AND
                        tb_order.status = ?  GROUP BY order_id ORDER BY number DESC";
        return $this->db->query($sql, $status)->result_array();
    }

    public function getDataOrderByTwoStatus($status, $status2)
    {
        $sql = "SELECT * FROM tb_order
                JOIN tbl_cart ON tb_order.id_cart = tbl_cart.id_cart 
                JOIN tbl_users ON tbl_cart.id_users = tbl_users.id_users 
                JOIN tbl_detail_users ON tbl_users.id_users = tbl_detail_users.users_id
                JOIN tbl_ikan ON tbl_cart.id_product = tbl_ikan.id_ikan WHERE
                tb_order.status = ? OR 
                tb_order.status = ?  GROUP BY order_id DESC";
        return $this->db->query($sql,array($status,$status2))->result_array();
    }

    public function getDataOrderByIdOrder($id_order)
    {
        $sql = "SELECT * FROM tb_order,tbl_cart,tbl_users,tbl_ikan,tbl_detail_users WHERE
                        tb_order.id_cart = tbl_cart.id_cart AND
                        tbl_cart.id_users = tbl_users.id_users AND
                        tbl_cart.id_product = tbl_ikan.id_ikan AND
                        tbl_users.id_users = tbl_detail_users.users_id AND
                        tb_order.order_id = ?";
        return $this->db->query($sql, $id_order)->result_array();
    }
    

    public function getDataOrderByIdUsers($id_users)
    {
        $sql = "SELECT * FROM tb_order,tbl_cart,tbl_users,tbl_ikan WHERE
                        tb_order.id_cart = tbl_cart.id_cart AND
                        tbl_cart.id_users = tbl_users.id_users AND
                        tbl_cart.id_product = tbl_ikan.id_ikan AND
                        tbl_cart.id_users = ? GROUP BY order_id ORDER BY number DESC";
        return $this->db->query($sql, $id_users)->result_array();
    }

    public function updateData($data, $id_order)
    {
        return $this->db->update('tb_order', $data, array('order_id' => $id_order));
    }

    public function getTotalHargaOrder($id_order)
    {
        $sql = "SELECT SUM(harga*quantity)as total_harga FROM tb_order,tbl_ikan,tbl_cart WHERE
                        tb_order.id_cart = tbl_cart.id_cart AND
                        tbl_ikan.id_ikan = tbl_cart.id_product AND
                        tb_order.order_id = ?";
        return $this->db->query($sql, $id_order)->row_array();
    }

    public function sendCourier($data){
        return $this->db->insert('tb_shipping',$data);
    }

    public function getDataOrderByNumber($number_order){
        return $this->db->get_where('tb_order',array('number' => $number_order))->row_array();
    }

    public function  getDataOrderByIdCourier($number_courier,$date_shipping){
        $sql = "SELECT * FROM tb_shipping,tb_order,tbl_cart,tbl_users,tbl_ikan,tbl_detail_users WHERE
                    tb_shipping.id_order = tb_order.number AND 
                    tb_order.id_cart = tbl_cart.id_cart AND
                    tbl_cart.id_users = tbl_users.id_users AND
                    tbl_cart.id_product = tbl_ikan.id_ikan AND
                    tbl_users.id_users = tbl_detail_users.users_id AND
                    id_courier = ? AND
                    date_shipping = ?";
        return $this->db->query($sql,array($number_courier,$date_shipping))->result_array();
    }

    public function getDataByIdOrderOrderDesc($id_order){
        $sql = "SELECT * FROM tb_order WHERE order_id = ? ORDER BY number DESC";
        return $this->db->query($sql,$id_order)->row_array();
    }
}
