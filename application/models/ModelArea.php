<?php

    class ModelArea extends CI_Model{

        public function getDataArea(){
            return $this->db->get_where('tb_wilayah')->result_array();
        }

        public function addData($data){
            return $this->db->insert('tb_wilayah',$data);
        }

        public function updateData($data,$id_wilayah){
            return $this->db->update('tb_wilayah',$data,array('id_wilayah'=>$id_wilayah));
        }

        public function deleteData($id_wilayah){
            return $this->db->delete('tb_wilayah',array('id_wilayah' => $id_wilayah));
        }
    }