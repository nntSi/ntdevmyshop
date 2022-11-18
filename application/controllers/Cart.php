<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model');
		$this->load->model('Product_model');
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
		$data['queryAllproduct'] = $this->Product_model->getAllProduct();
		$this->load->view('head');
		$this->load->view('components/navbar', $data);
		$this->load->view('components/sidebar', $data);
		$this->load->view('components/cart_view', $data);
		$this->load->view('footer');
	}
	public function getProductByCode()
	{
		$data = $this->Product_model->getProductByCode();
		echo json_encode($data);
	}
	public function posttest()
	{
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
	}
	public function addingTocart()
	{
		/* echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		exit; */

/* 		$data = array(
			'id'      => $this->input->post('p_code'),
			'qty'     => 1,
			'price'   => 40,
			'name'    => 'น้ำตา',
			'options' => array('Size' => 'L', 'Color' => 'Red')
	);
	
	$this->cart->insert($data); */

		$data = array(
			'id'      => $this->input->post('p_code'),
			'qty'     => $this->input->post('qrt'),
			'price'   => $this->input->post('p_price_modal'),
			'name'    => $this->input->post('p_code'),
			'p_name' => $this->input->post('p_name_modal'),
			'p_cost'    => $this->input->post('p_cost'),
			'img_0' => $this->input->post('img_0'),
		);
		$this->cart->insert($data);
		/* echo '<pre>';
		print_r($_SESSION);
		echo '</pre>'; */
		redirect('Cart', 'refresh');
	}
}
