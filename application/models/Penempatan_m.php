<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penempatan_m extends CI_Model
{
    public function AllLantai()
    {
        $this->db->select("*");
        $this->db->from("penempatan");
        $this->db->where("jenis", 2);
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
