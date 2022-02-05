<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_cek_m extends CI_Model
{
    public function Status()
    {
        $this->db->select("*");
        $this->db->from("status_cek");
        return $this->db->get()->result_array();
    }
}
