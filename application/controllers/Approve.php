<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Approve extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model');
		$this->load->model('Product_model');
        $this->load->model('Log_model');
		$this->load->library('cart');
		if ($this->session->userdata('fullname') == ''){
			redirect('Login', 'refresh');
		}else{
			return 'success';
		}
	}

	public function index()
	{
		$data['sidebarmenuQuery'] = $this->Menu_model->sideBarMenu();
		/* $data['queryAllproduct'] = $this->Product_model->getAllProduct(); */
        $data['WithdrawLogQuery'] = $this->Log_model->getWithdrawLog();
		$data['NotAPQuery'] = $this->Log_model->getnotApproveLog();
		$this->load->view('head');
		$this->load->view('components/navbar', $data);
		$this->load->view('components/sidebar', $data);
        $this->load->view('components/approve_view', $data);
		$this->load->view('footer');
	}
    public function setsessionTable($tablesession){
        $this->session->set_userdata('table_session', $tablesession);
        redirect('Approve', 'refresh');
        /* echo '<pre>';
        print_r($_SESSION);
        echo '</pre>'; */
        /* redirect('Approve','refresh'); */
    }
	public function changestatus($array){
		$pieces = explode("_", $array);
		/* echo '<pre>';
        print_r($pieces);
        echo '</pre>'; */
		$status = urldecode($pieces[0]);
/* 		echo $status; */
		$codereport = $pieces[1];
		$this->Log_model->changeStatus($status, $codereport);
		if($status == 'ได้รับการอนุมัติแล้ว'){
			$this->Product_model->decreaseStock($codereport);
		}
		redirect('Approve', 'refresh');

		// decrease stock

	}	
}