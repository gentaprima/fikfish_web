<?php

class ModelShipping extends CI_Model
{

    public function getDataShippingByIdCourier($id_courier, $date, $latitude, $longtide, $status)
    {
        $sql = "SELECT *, ((6371*ACOS(SIN(RADIANS(tbl_detail_users.latitude))*SIN(RADIANS('$latitude'))+COS(RADIANS(tbl_detail_users.longtitude - '$longtide'))*COS(RADIANS(tbl_detail_users.latitude))*COS(RADIANS('$latitude'))) + 1.4)) as jarak FROM  
                    tb_shipping,tb_order,tbl_cart,tbl_detail_users,tbl_users,tbl_ikan
                        WHERE
                        tb_shipping.id_order = tb_order.number AND
                        tb_order.id_cart = tbl_cart.id_cart AND
                        tbl_cart.id_product = tbl_ikan.id_ikan AND
                        tbl_cart.id_users = tbl_users.id_users AND
                        tbl_users.id_users = tbl_detail_users.users_id AND
                        date_shipping = ? AND
                        id_courier = ? AND
                        is_delayed = ? AND
                        status_shipping = 0 ORDER BY jarak ASC";
        return $this->db->query($sql, array($date, $id_courier, $status))->result_array();
    }

    public function getDataShippingDelay($id_courier, $latitude, $longitude, $status)
    {
        $sql = "SELECT *, ((6371*ACOS(SIN(RADIANS(tbl_detail_users.latitude))*SIN(RADIANS('$latitude'))+COS(RADIANS(tbl_detail_users.longtitude - '$longitude'))*COS(RADIANS(tbl_detail_users.latitude))*COS(RADIANS('$latitude'))) + 1.4)) as jarak FROM  
                        tb_shipping,tb_order,tbl_cart,tbl_detail_users,tbl_users,tbl_ikan
                            WHERE
                            tb_shipping.id_order = tb_order.number AND
                            tb_order.id_cart = tbl_cart.id_cart AND
                            tbl_cart.id_product = tbl_ikan.id_ikan AND
                            tbl_cart.id_users = tbl_users.id_users AND
                            tbl_users.id_users = tbl_detail_users.users_id AND
                            id_courier = ? AND
                            is_delayed = ? AND
                            status_shipping = 0 ORDER BY jarak ASC";
        return $this->db->query($sql, array($id_courier, $status))->result_array();
    }

    public function getDataShippingByStatus($status)
    {
        $sql = "SELECT * FROM tb_shipping,tb_order,tbl_cart,tbl_users,tbl_ikan,tbl_detail_users,tb_courier,tb_wilayah WHERE
                        tb_shipping.id_order = tb_order.number AND
                        tb_shipping.id_courier = tb_courier.id_kurir AND
                        tb_order.id_cart = tbl_cart.id_cart AND
                        tbl_cart.id_users = tbl_users.id_users AND
                        tbl_cart.id_product = tbl_ikan.id_ikan AND
                        tbl_users.id_users = tbl_detail_users.users_id AND
                        tb_courier.id_wilayah = tb_wilayah.id_wilayah AND
                        status = ? AND
                        is_delayed = 0  ORDER BY id_shipping DESC";
        return $this->db->query($sql, $status)->result_array();
    }

    public function getDataResumeShipping($status)
    {
        $sql = "SELECT * FROM tb_shipping,tb_order,tbl_cart,tbl_users,tbl_ikan,tbl_detail_users,tb_courier,tb_wilayah WHERE
            tb_shipping.id_order = tb_order.number AND
            tb_shipping.id_courier = tb_courier.id_kurir AND
            tb_order.id_cart = tbl_cart.id_cart AND
            tbl_cart.id_users = tbl_users.id_users AND
            tbl_cart.id_product = tbl_ikan.id_ikan AND
            tbl_users.id_users = tbl_detail_users.users_id AND
            tb_courier.id_wilayah = tb_wilayah.id_wilayah AND
            status = ? AND
            is_delayed = 1  ORDER BY id_shipping DESC";
        return $this->db->query($sql, $status)->result_array();
    }

    public function getDataShippingBy2Status($status, $status2)
    {
        $sql = "SELECT * FROM tb_shipping,tb_order,tbl_cart,tbl_users,tbl_ikan,tbl_detail_users,tb_courier,tb_wilayah WHERE
                        tb_shipping.id_order = tb_order.number AND
                        tb_shipping.id_courier = tb_courier.id_kurir AND
                        tb_order.id_cart = tbl_cart.id_cart AND
                        tbl_cart.id_users = tbl_users.id_users AND
                        tbl_cart.id_product = tbl_ikan.id_ikan AND
                        tbl_users.id_users = tbl_detail_users.users_id AND
                        tb_courier.id_wilayah = tb_wilayah.id_wilayah AND
                        is_delayed = 0 AND
                        tb_order.status = ? OR tb_order.status = ?
                        ORDER BY id_shipping DESC";
        return $this->db->query($sql, array($status, $status2))->result_array();
    }

    public function getDataShippingDelayWeb($status)
    {
        $sql = "SELECT * FROM tb_shipping,tb_order,tbl_cart,tbl_users,tbl_ikan,tbl_detail_users,tb_courier,tb_wilayah WHERE
                        tb_shipping.id_order = tb_order.number AND
                        tb_shipping.id_courier = tb_courier.id_kurir AND
                        tb_order.id_cart = tbl_cart.id_cart AND
                        tbl_cart.id_users = tbl_users.id_users AND
                        tbl_cart.id_product = tbl_ikan.id_ikan AND
                        tbl_users.id_users = tbl_detail_users.users_id AND
                        tb_courier.id_wilayah = tb_wilayah.id_wilayah AND
                        is_delayed = 1 and
                        tb_order.status = ? ORDER BY id_shipping DESC";
        return $this->db->query($sql,$status)->result_array();
    }

    public function getDataJadwalPengiriman($date)
    {
        $sql = "SELECT *,COUNT(id_order) as jumlah_antar FROM tb_shipping,tb_order,tbl_cart,tbl_users,tbl_ikan,tbl_detail_users,tb_courier,tb_wilayah WHERE
                        tb_shipping.id_order = tb_order.number AND
                        tb_shipping.id_courier = tb_courier.id_kurir AND
                        tb_order.id_cart = tbl_cart.id_cart AND
                        tbl_cart.id_users = tbl_users.id_users AND
                        tbl_cart.id_product = tbl_ikan.id_ikan AND
                        tbl_users.id_users = tbl_detail_users.users_id AND
                        tb_courier.id_wilayah = tb_wilayah.id_wilayah AND
                        date_shipping = ? GROUP BY id_courier";
        return $this->db->query($sql, $date)->result_array();
    }

    public function updateData($data, $id_shipping)
    {
        return $this->db->update('tb_shipping', $data, array('id_shipping' => $id_shipping));
    }

    public function getDataShippingByIdShipping($id_shipping)
    {
        return $this->db->get_where('tb_shipping', array('id_shipping' => $id_shipping))->row_array();
    }

    public function getCountShipping($id_courier, $status, $date)
    {
        return $this->db->get_where('tb_shipping', array('id_courier' => $id_courier, 'is_delayed' => $status, 'date_shipping' => $date))->result_array();
    }

    public function getCountShippingDelay($id_courier, $status)
    {
        return $this->db->get_where('tb_shipping', array('id_courier' => $id_courier, 'is_delayed' => $status))->result_array();
    }

    public function getCountShippingByStatus($id_courier, $delay, $date)
    {
        return $this->db->get_where('tb_shipping', array('id_courier' => $id_courier, 'is_delayed' => $delay, 'date_shipping' => $date, 'status_shipping' => 1))->result_array();
    }

    public function getDataHistoryByIdCourier($id_courier, $month)
    {
        $sql = "SELECT * FROM tb_shipping,tb_order,tbl_cart,tbl_users,tbl_ikan,tbl_detail_users,tb_courier WHERE
                        tb_shipping.id_order = tb_order.number AND
                        tb_shipping.id_courier = tb_courier.id_kurir AND
                        tb_order.id_cart = tbl_cart.id_cart AND
                        tbl_cart.id_users = tbl_users.id_users AND
                        tbl_cart.id_product = tbl_ikan.id_ikan AND
                        tbl_users.id_users = tbl_detail_users.users_id AND
                        tb_shipping.id_courier = ? AND
                        MONTH(date_shipping) = ?  GROUP BY date_shipping ORDER BY date_shipping";
        return $this->db->query($sql, array($id_courier, $month))->result_array();
    }

    public function getDataShippingByIdCourierAndDate($id_courier, $date)
    {
        $sql = "SELECT * FROM tb_shipping,tb_order,tbl_cart,tbl_users,tbl_ikan,tbl_detail_users,tb_courier WHERE
                        tb_shipping.id_order = tb_order.number AND
                        tb_shipping.id_courier = tb_courier.id_kurir AND
                        tb_order.id_cart = tbl_cart.id_cart AND
                        tbl_cart.id_users = tbl_users.id_users AND
                        tbl_cart.id_product = tbl_ikan.id_ikan AND
                        tbl_users.id_users = tbl_detail_users.users_id AND
                        tb_shipping.id_courier = ? AND
                        date_shipping = ? ";
        return $this->db->query($sql, array($id_courier, $date))->result_array();
    }

    public function getCountShippingByDate($date, $status)
    {
        return $this->db->get_where('tb_shipping', array('date_shipping' => $date, 'is_delayed' => $status))->result_array();
    }

    public function getCountShippingDelayByStatus($status)
    {
        return $this->db->get_where('tb_shipping', array('is_delayed' => $status))->result_array();
    }

    public function getDataShippingByNumberOrder($number_order)
    {
        return $this->db->get_where('tb_shipping', array('id_order' => $number_order))->row_array();
    }

    public function getCountPerWilayah($id_wilayah,$status,$month,$year){
        $sql = "SELECT COUNT(id_shipping)as jumlah FROM tb_shipping 
                    JOIN tb_courier ON tb_shipping.id_courier = tb_courier.id_kurir 
                    JOIN tb_wilayah ON tb_courier.id_wilayah = tb_wilayah.id_wilayah 
                    WHERE
                        tb_wilayah.id_wilayah = ? AND
                        tb_shipping.status_shipping = ? AND
                        MONTH(date_shipping) = ?  AND
                        YEAR(date_shipping) = ?";
        return $this->db->query($sql,array($id_wilayah,$status,$month,$year))->row_array();
    }

   
}
