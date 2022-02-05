<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_m extends CI_Model
{
    public function AllKondisi($asset_id)
    {
        $this->db->select("*");
        $this->db->from("kondisi");
        $this->db->join("status_cek", "status_cek.status_cek_id = kondisi.status");
        // $this->db->join("assets", "assets.status_kondisi = kondisi.status");
        $this->db->where("id_asset", $asset_id);
        $this->db->order_by('kondisi_id', 'DESC');
        return $this->db->get()->result();
    }

    public function KondisiId($id_kondisi)
    {
        $this->db->select("*");
        $this->db->from("kondisi");
        $this->db->join("status_cek", "status_cek.status_cek_id = kondisi.status");
        $this->db->where("kondisi_id", $id_kondisi);
        return $this->db->get()->row();
    }
}
