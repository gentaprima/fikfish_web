<?php

class ModelUsers extends CI_Model
{

    public function getDataByUsersId($users_id)
    {
        $sql = "SELECT * from tbl_users,tbl_detail_users WHERE
                        tbl_users.id_users = tbl_detail_users.users_id AND
                        tbl_users.id_users = $users_id";
        return $this->db->query($sql, $users_id)->row_array();
    }

    public function addData($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function getAllData($role)
    {
        $sql = "SELECT * from tbl_users,tbl_detail_users WHERE
                         tbl_users.id_users = tbl_detail_users.users_id AND role = ?";
        return $this->db->query($sql,$role)->result_array();
    }

    public function updateProfile($data, $id_users)
    {
        return $this->db->update('tbl_users', $data, array('id_users' => $id_users));
    }

    public function updateDetailProfile($data, $id_users)
    {
        return $this->db->update('tbl_detail_users', $data, array('users_id' => $id_users));
    }
}
