<?php

class ModelIkan extends CI_Model
{

    public function getProduct($limit)
    {
        $sql = "SELECT * from tbl_ikan,tbl_jenis WHERE
                        tbl_ikan.id_jenis = tbl_jenis.id_jenis  ORDER BY id_ikan DESC LIMIT ?";
        return $this->db->query($sql, $limit)->result_array();
        // return $this->db->get('tbl_ikan',$limit)->result_array();
    }

    public function getProductByCategory($category)
    {
        $sql = "SELECT * from tbl_ikan,tbl_jenis WHERE
                        tbl_ikan.id_jenis = tbl_jenis.id_jenis AND
                        tbl_ikan.id_jenis = $category ORDER BY id_ikan DESC";
        return $this->db->query($sql, $category)->result_array();
    }

    public function getAllDataProduct()
    {
        $sql = "SELECT * from tbl_ikan,tbl_jenis WHERE
                        tbl_ikan.id_jenis = tbl_jenis.id_jenis ORDER BY id_ikan DESC";
        return $this->db->query($sql)->result_array();
    }

    public function addProduct($data)
    {
        return $this->db->insert('tbl_ikan', $data);
    }

    public function updateProduct($data, $id)
    {
        return $this->db->update('tbl_ikan', $data, array('id_ikan' => $id));
    }

    public function deleteProduct($id)
    {
        return $this->db->delete('tbl_ikan', array('id_ikan' => $id));
    }

    public function readDataByIdProduct($id_product)
    {
        return $this->db->get_where('tbl_ikan', array('id_ikan' => $id_product))->row_array();
    }

    public function getDataPerhitunganByIdResult($idProduk, $month)
    {
        // return $this->db->get_where('tbl_perhitunganproduk',array('id_product' => $idProduk,'date_[r'))->result_array();
        $sql = "SELECT * FROM tbl_perhitunganproduk WHERE 
                        id_product = ? AND
                        MONTH(date_product) = ?";
        return $this->db->query($sql, array($idProduk, $month))->result_array();
    }

    public function getDataPerhitunganByIdRow($idProduk,$month)
    {
        $sql = "SELECT * FROM tbl_perhitunganproduk WHERE 
            id_product = ? AND
            MONTH(date_product) = ?";
        return $this->db->query($sql, array($idProduk, $month))->row_array();
        // return $this->db->get_where('tbl_perhitunganproduk', array('id_product' => $idProduk))->row_array();
    }

    public function getDataProductChart($month, $year)
    {
        $sql = "SELECT * FROM tbl_perhitunganproduk 
                        JOIN tbl_ikan ON tbl_perhitunganproduk.id_product = tbl_ikan.id_ikan 
                        WHERE
                            MONTH(date_product) = ? AND
                            YEAR(date_product) = ? ORDER BY jumlah ";
        return $this->db->query($sql, array($month, $year))->result_array();
    }
}
