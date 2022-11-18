<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authen_model extends CI_Model
{
    public function fetch_user_login($username,$password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
        return $query->row();
    }
}