<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ass_number_m extends CI_Model
{
    public function asset_number()
    {
        $this->db->select("*");
        $this->db->from("asset_number");
        // $this->db->where("vendor_id !=", 1);
        return $this->db->get()->result();
    }

    public function AllUsers()
    {
        $this->db->select("*");
        $this->db->from("penempatan");
        $this->db->where("jenis", 1);
        return $this->db->get()->result_array();
    }
}
