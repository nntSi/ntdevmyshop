<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function genNavbarMenu(){
        $navbarmenuQuery = $this->db->get('navbar_menu');
        return $navbarmenuQuery->result();
    }
    public function genSubMenu(){
        $navbarsubmenuQuery = $this->db->get('navbar_sub');
        return $navbarsubmenuQuery->result();
    }
    public function sideBarMenu(){
        $sidebarmenuQuery = $this->db->get('sidebar_menu');
        return $sidebarmenuQuery->result();
    }
}
