<?php 


    class ModelLaporan extends CI_Model{

        public function getDataLaporan($month,$year){
            $sql = "SELECT * FROM tb_shipping
                        JOIN tb_order ON tb_shipping.id_order = tb_order.number
                        JOIN tb_courier ON tb_courier.id_kurir = tb_shipping.id_courier
                        JOIN tb_wilayah ON tb_courier.id_wilayah = tb_wilayah.id_wilayah
                        JOIN tbl_cart ON tb_order.id_cart = tbl_cart.id_cart
                        JOIN tbl_ikan ON tbl_cart.id_product = tbl_ikan.id_ikan 
                        JOIN tbl_users ON tbl_cart.id_users = tbl_users.id_users WHERE
                        tb_shipping.status_shipping = ? AND
                        MONTH(tb_shipping.date_shipping) = ? and 
                        YEAR(tb_shipping.date_shipping) = ? ORDER BY id_shipping DESC";
            return $this->db->query($sql,array(1,$month,$year))->result_array();
        }
    }