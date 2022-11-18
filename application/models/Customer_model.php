<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    public function getallUser_pre(){
        $CustomerQuery = $this->db->get('customer_pre');
        return $CustomerQuery->result();
    }
    public function addCustomer(){

        // gen user code
        $date = explode("/", date("Y/m/d"));
		$firstCode = "CS00";
		$query = $this->db->get('customer_pre');
		$lastCode = $query->num_rows();
		$customercode = $date[0].$date[1].$date[2].$firstCode.$lastCode;

        // check data duplicate
        $this->db->where('fullname', $this->input->post('fullname'));
        $this->db->or_where('customer_id', $customercode);
        $this->db->or_where('telephone_number', $this->input->post('telephone_number'));
        $queryCheck = $this->db->get('customer_pre');

        if($queryCheck->num_rows() > 1){
            echo "<script type='text/javascript'>alert('มีข้อมูลผู้ใช้อยู่แล้ว ไม่สามารถเพิ่มข้อมูลได้');</script>";
        }else{
            $data = array(
                'customer_id' => $customercode,
                'fullname' => $this->input->post('fullname'),
                'telephone_number' => $this->input->post('telephone_number'),
                'location' => $this->input->post('location'),
                'status' => $this->input->post('status'),
                'job' => $this->input->post('job'),
                'age' => $this->input->post('age'),
                'agent' => $this->session->userdata('fullname'),
                'source' => $this->input->post('source')
            );
            $this->db->insert('customer_pre', $data);
            echo "<script type='text/javascript'>alert('ลงชื่อลูกค้าสำเร็จ');</script>";
        }
    }
}