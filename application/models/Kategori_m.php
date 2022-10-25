<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_m extends CI_Model
{
    public function all_kategori()
    {
        $this->db->select("*");
        $this->db->from("kategori");
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
