
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History_m extends CI_Model
{

    public function AllUsers()
    {
        $this->db->select("*");
        $this->db->from("penempatan");
        $this->db->order_by('jenis', 'DESC');
        // $this->db->where("jenis", 1);
        return $this->db->get()->result_array();
    }

    public function HistoryId($id_asset)
    {
        $this->db->select("*");
        $this->db->from("history");
        $this->db->where("id_asset", $id_asset);
        $this->db->order_by('tgl', 'DESC');
        $this->db->join("penempatan", "penempatan.user_id = history.id_users");
        return $this->db->get()->result_array();
    }
}
