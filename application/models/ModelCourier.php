<?php 

    class ModelCourier extends CI_Model{

        public function getDataCourier(){
            $sql = "SELECT * FROM tb_courier,tb_wilayah WHERE
                    tb_courier.id_wilayah = tb_wilayah.id_wilayah";
            return $this->db->query($sql)->result_array();
        }

        public function addData($data){
            return $this->db->insert('tb_courier',$data);
        }

        public function updateData($data,$username){
            return $this->db->update('tb_courier',$data,array('username' => $username));
        }

        public function getDataCourierByUsername($username){
            return $this->db->get_where('tb_courier',array('username' => $username))->row_array();
        }
        public function getDataCourierByIdCourier($id_courier){
            return $this->db->get_where('tb_courier',array('id_kurir' => $id_courier))->row_array();
        }

        public function deleteData($idCourier){
            return $this->db->delete('tb_courier',array('id_kurir' => $idCourier));
        }
    }