<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function login($username)
    {
        $this->db->select('*');
        $this->db->from('user_level');
        $this->db->where('username', $username);
        return $this->db->get('');
    }
}