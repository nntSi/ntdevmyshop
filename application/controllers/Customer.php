<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model');
		$this->load->model('Customer_model');
		if ($this->session->userdata('fullname') == ''){
			redirect('Login', 'refresh');
		}else{
			return 'success';
		}
	}
	public function index()
	{
		$data['sidebarmenuQuery'] = $this->Menu_model->sideBarMenu();
		$data['CustomerQuery'] = $this->Customer_model->getallUser_pre();
		$this->load->view('head');
		$this->load->view('components/navbar', $data);
		$this->load->view('components/sidebar', $data);
		$this->load->view('components/customer_view', $data);
		$this->load->view('footer');
	}
	public function posttest(){
		echo '<pre>';
		print_r($_SESSION);
		echo '</pre>';
	}
	public function addNewCustomer(){
		$this->Customer_model->addCustomer();
		redirect('Customer','refresh');
	}
	public function myCustomer(){
		$data['sidebarmenuQuery'] = $this->Menu_model->sideBarMenu();
		$data['CustomerQuery'] = $this->Customer_model->getallUser_pre();
		$this->load->view('head');
		$this->load->view('components/navbar', $data);
		$this->load->view('components/sidebar', $data);
		$this->load->view('components/mycustomer_view', $data);
		$this->load->view('footer');
	}
}