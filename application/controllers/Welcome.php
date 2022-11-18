<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('Menu_model');
		$this->load->model('Product_model');
		if ($this->session->userdata('fullname') == ''){
			redirect('Login', 'refresh');
		}else{
			return 'success';
		}
	}
	
	public function index()
	{
		$data['sidebarmenuQuery'] = $this->Menu_model->sideBarMenu();
		$this->load->view('head');
		$this->load->view('components/navbar', $data);
		$this->load->view('components/sidebar', $data);
		/* contents */
		/* contents */
		$this->load->view('footer');
	}

}
