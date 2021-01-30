<?php

class ModelCategory extends CI_Model
{

    public function getDataCategory()
    {
        return $this->db->get('tbl_jenis')->result_array();
    }
}
