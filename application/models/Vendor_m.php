<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor_m extends CI_Model
{
    public function AllVendors()
    {
        $this->db->select("*");
        $this->db->from("vendor");
        $this->db->where("vendor_id !=", 1);
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
