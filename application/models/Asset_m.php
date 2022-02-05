<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asset_m extends CI_Model
{

    public function AllAsset()
    {
        $this->db->select("*");
        $this->db->from("assets");
        $this->db->join("kategori", "kategori.kategoris_id = assets.kategori_id");
        $this->db->join("penempatan", "penempatan.user_id = assets.id_user");
        $this->db->join("status_cek", "status_cek.status_cek_id = assets.status_kondisi");
        $this->db->join("vendor", "vendor.vendor_id = assets.kepemilikan");
        $this->db->order_by('asset_id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function AssetOnCategory($id)
    {
        $this->db->select("*");
        $this->db->from("assets");
        $this->db->join("kategori", "kategori.kategoris_id = assets.kategori_id");
        $this->db->join("penempatan", "penempatan.user_id = assets.id_user");
        $this->db->join("status_cek", "status_cek.status_cek_id = assets.status_kondisi");
        $this->db->join("vendor", "vendor.vendor_id = assets.kepemilikan");
        $this->db->order_by('asset_id', 'DESC');
        $this->db->where("kategori_id", $id);
        return $this->db->get()->result_array();
    }

    public function AssetWithCondition()
    {
        $this->db->select("status_cek.nama_status as ns");
        $this->db->from("assets");
        $this->db->join("status_cek", "status_cek.status_cek_id = assets.status_kondisi");
        $this->db->order_by('asset_id', 'DESC');
        $this->db->where("kategori_id", 1);
        $this->db->group_by("status_cek.nama_status");
        return $this->db->get()->result();
    }

    public function AssetId($asset_id)
    {
        $this->db->select("*");
        $this->db->from("assets");
        $this->db->where("asset_id", $asset_id);
        return $this->db->get()->row();
    }

    public function AllKategori()
    {
        $this->db->select("*");
        $this->db->from("kategori");
        return $this->db->get()->result_array();
    }

    public function AllVendor()
    {
        $this->db->select("*");
        $this->db->from("vendor");
        return $this->db->get()->result_array();
    }
}
