<?php

class ModelWishlist extends CI_Model
{

    public function addData($data)
    {
        return $this->db->insert('tbl_wishlist', $data);
    }

    public function getDataWishlistById($id_product, $id_users)
    {
        return $this->db->get_where('tbl_wishlist', array('id_product' => $id_product, 'id_users' => $id_users))->row_array();
    }

    public function deleteData($id_product, $id_users)
    {
        return $this->db->delete('tbl_wishlist', array('id_product' => $id_product, 'id_users' => $id_users));
    }

    public function getDataWishlist($id_users)
    {
        $sql = "SELECT * FROM tbl_wishlist,tbl_ikan WHERE
                        tbl_ikan.id_ikan = tbl_wishlist.id_product AND
                        id_users = ?";
        return $this->db->query($sql, $id_users)->result_array();
    }
}
