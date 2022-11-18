<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_model extends CI_Model
{
    public function getWithdrawLog(){
        $WithdrawLogQuery = $this->db->get('withdraw_log');
        return $WithdrawLogQuery->result();
    }
    public function getnotApproveLog(){
        $this->db->where('status', 'ยังไม่ได้รับการอนุมัติ');
        $NotAPQuery = $this->db->get('withdraw_log');
        return $NotAPQuery->result();
    }
    public function changeStatus($status, $codereport){
        $this->db->where('code_report', $codereport);
        $data = array(
            'status' => $status
        );
        $this->db->update('withdraw_log', $data);
        //approvelog
        $dataapproveLog = array(
            'approver' => $this->session->userdata("fullname"),
            'code_report' => $codereport
        );
        $this->db->insert('approve_log', $dataapproveLog);
    }
}