<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_level_m extends CI_Model
{
    public function All_user_level()
    {
        $this->db->select("*");
        $this->db->from("user_level");
        return $this->db->get()->result_array();
    }

    public function AllUsers()
    {
        $this->db->select("*");
        $this->db->from("penempatan");
        $this->db->where("jenis", 1);
        return $this->db->get()->result_array();
    }
}


