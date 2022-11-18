<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
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
		$data['navbarmenuQuery'] = $this->Menu_model->genNavbarMenu();
		$data['navbarsubmenuQuery'] = $this->Menu_model->genSubMenu();
		$data['sidebarmenuQuery'] = $this->Menu_model->sideBarMenu();
		$data['queryAllproduct'] = $this->Product_model->getAllProduct();
		$this->load->view('head');
		$this->load->view('components/navbar', $data);
		$this->load->view('components/sidebar', $data);
		$this->load->view('components/stock_view', $data);
		$this->load->view('footer');
	}

	public function addStock_view()
	{
		$data['navbarmenuQuery'] = $this->Menu_model->genNavbarMenu();
		$data['navbarsubmenuQuery'] = $this->Menu_model->genSubMenu();
		$data['sidebarmenuQuery'] = $this->Menu_model->sideBarMenu();
		$this->load->view('head');
		$this->load->view('components/navbar', $data);
		$this->load->view('components/sidebar', $data);
		/* contents */
		$this->load->view('components/addstock_view');
		/* contents */
		$this->load->view('footer');
	}
	public function addProduct(){
		/* echo '<pre>';
		print_r($_POST);
		echo '</pre>'; */
		$this->Product_model->addProduct();
	}
	public function posttest(){
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
	}
	public function editProductShowview(){
		$data = $this->Product_model->getProductByp_name();
		echo json_encode($data);
	}
	public function updateProduct(){
		$this->Product_model->updateProduct();
		redirect('Stock','refresh');
	}
	public function deleteProduct(){
		$this->Product_model->deleteProduct();
	}
	public function getProductbyCode(){
		$data = $this->Product_model->getProductByCode();
		echo json_encode($data);
	}
	public function increaseStock(){
		/* echo '<pre>';
		print_r($_POST);
		echo '</pre>'; */
		$this->Product_model->increaseStock();
		redirect('Stock','refresh');
	}
	public function setsessionStock($data){
		$this->session->set_userdata('StockTableName', $data);
		redirect('Stock','refresh');
	}
}