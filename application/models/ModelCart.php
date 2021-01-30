<?php

class ModelCart extends CI_Model
{

    public function getDataCartById($id_product, $id_users)
    {
        return $this->db->get_where('tbl_cart', array('id_product' => $id_product, 'id_users' => $id_users, 'is_order' => 0))->row_array();
    }

    public function getDataCartByIdCart($id_cart)
    {
        return $this->db->get_where('tbl_cart', array('id_cart' => $id_cart))->row_array();
    }

    public function insertData($data)
    {
        return $this->db->insert('tbl_cart', $data);
    }

    public function updateData($data, $id_cart)
    {
        return $this->db->update('tbl_cart', $data, array('id_cart' => $id_cart));
    }

    public function getDataCart($id_users)
    {
        $sql = "SELECT * FROM tbl_cart,tbl_ikan WHERE
                        tbl_cart.id_product = tbl_ikan.id_ikan AND
                        tbl_cart.id_users = ? AND
                        tbl_cart.is_order = 0";
        return $this->db->query($sql, $id_users)->result_array();
    }

    public function deleteData($id_users,$status)
    {
        return $this->db->delete('tbl_cart', array('id_users' => $id_users,'is_order' => $status));
    }

    public function deleteDataByIdCart($id_cart)
    {
        return $this->db->delete('tbl_cart', array('id_cart' => $id_cart));
    }

    public function getTotalHarga($id_users)
    {
        $sql = "SELECT SUM(harga*quantity)as total_harga FROM tbl_ikan,tbl_cart WHERE
                        tbl_ikan.id_ikan = tbl_cart.id_product AND
                        tbl_cart.id_users = ? AND
                        tbl_cart.is_order = 0";
        return $this->db->query($sql, $id_users)->row_array();
    }

    public function getDataCartByIdUsersAndStatus($id_users, $status)
    {
        return $this->db->get_where('tbl_cart', array('id_users' => $id_users, 'is_order' => $status))->result_array();
    }
}
