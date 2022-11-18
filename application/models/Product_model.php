<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
	public function getAllProduct()
	{
		$queryAllproduct = $this->db->get('products');
		return $queryAllproduct->result();
	}
	public function addProduct()
	{

		$count = count($_FILES['files']['name']);

		for ($i = 0; $i < $count; $i++) {

			if (!empty($_FILES['files']['name'][$i])) {

				$_FILES['file']['name'] = $_FILES['files']['name'][$i];
				$_FILES['file']['type'] = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['files']['error'][$i];
				$_FILES['file']['size'] = $_FILES['files']['size'][$i];
				/* print_r($_FILES['file']); */

				$config['upload_path'] = './img/products_img/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = '5000';
				$config['max_width'] = '900';
				$config['max_height'] = '900';
				$config['encrypt_name'] = TRUE;
				$config['file_name'] = $_FILES['files']['name'][$i];

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
					$data['totalFiles'][] = $filename;
				} else {
					echo $this->upload->display_errors();
				}
			} else {
				echo 'No File';
			}
		}

		/* echo $data['totalFiles'][0]; forget filename */
		$dataforInsert = array(
			'p_name' => $this->input->post('p_name'),
			'p_code' => $this->input->post('p_code'),
			'p_stock' => $this->input->post('p_stock'),
			'p_weight' => $this->input->post('p_weight'),
			'p_cost' => $this->input->post('p_cost'),
			'p_price' => $this->input->post('p_price'),
			'p_discount' => $this->input->post('p_discount'),
			'p_type' => $this->input->post('p_type'),
			'p_brand' => $this->input->post('p_brand'),
			'p_discount' => $this->input->post('p_discount')
		);
		for ($j = 0; $j < $count; $j++) {
			$dataforInsert['img_' . $j] = $data['totalFiles'][$j];
		}
		$this->db->insert('products', $dataforInsert);
		redirect('Stock', 'refresh');
	}
	public function getProductByp_name()
	{
		$this->db->where('p_name', $this->input->post("p_name"));
		$query = $this->db->get('products');
		return $query->result();
	}
	public function updateProduct()
	{
		$data = array(
			'p_name' => $this->input->post('p_name'),
			'p_code' => $this->input->post('p_code'),
			'p_stock' => $this->input->post('p_stock'),
			'p_weight' => $this->input->post('p_weight'),
			'p_cost' => $this->input->post('p_cost'),
			'p_price' => $this->input->post('p_price'),
			'p_discount' => $this->input->post('p_discount'),
			'p_type' => $this->input->post('p_type'),
			'p_brand' => $this->input->post('p_brand'),
			'p_discount' => $this->input->post('p_discount')
		);
		$this->db->where('p_id', $this->input->post('p_id'));
		$this->db->update('products', $data);
	}
	public function deleteProduct()
	{
		$this->db->where('p_name', $this->input->post('p_name'));
		$this->db->delete('products');
	}
	public function getProductByCode()
	{
		$this->db->where('p_code', $this->input->post("p_code"));
		$query = $this->db->get('products');
		return $query->result();
	}
	public function whithdrawlog($reportcode)
	{
		/* echo $firstCode.$lastCode; */
		$data = array(
			'code_report' => $reportcode,
			'moderator' => $this->input->post('moderator'),
			'picker' => $this->input->post('picker'),
			'origin' => $this->input->post('origin'),
			'reason' => $this->input->post('reason'),
			'total_qty' => $this->input->post('total_qty'),
			'total_price' => $this->input->post('total_price'),
			'status' => 'ยังไม่ได้รับการอนุมัติ'
		);
		$this->db->insert('withdraw_log', $data);

		/* product withdraw list */
		foreach ($this->cart->contents() as $items) {
			$dataPWDLOG = array(
				'code_report' => $reportcode,
				'product_name' => $items['p_name'],
				'qty' => $items['qty'],
				'p_code' => $items['id'],
				'p_price' => $items['price'],
				'p_cost' => $items['p_cost'],
				'subtotal' => $items['subtotal'],
			);
			$this->db->insert('products_withdraw_log', $dataPWDLOG);
		}
		unset($_SESSION['cart_contents']);
	}

	public function decreaseStock($codereport)
	{
		$this->db->where('code_report', $codereport);
		$query = $this->db->get('products_withdraw_log');
		foreach ($query->result() as $qr) {
			$qtyWanttoDecrease = $qr->qty;
			$this->db->select('p_stock');
			$this->db->where('p_code', $qr->p_code);
			$qtyofProductBeforeDecrease = $this->db->get('products');
			foreach ($qtyofProductBeforeDecrease->result() as $qtyBeforel) {
				$qtyBefore = $qtyBeforel->p_stock;
			}
			if ($qtyBefore >= $qtyWanttoDecrease) {
				$qtyfinal = $qtyBefore - $qtyWanttoDecrease;
				echo $qtyfinal;
				$data = array(
					'p_stock' => $qtyfinal
				);
				$this->db->where('p_code', $qr->p_code);
				$this->db->update('products', $data);
			} else {
				echo "สินค้ามีจำนวนไม่พอ";
			}
		}
	}

	public function increaseStock()
	{
		$this->db->where('p_code', $this->input->post('ProductCode'));
		$qtyofProductBeforeIncrease = $this->db->get('products');
		foreach ($qtyofProductBeforeIncrease->result() as $qtyPI){
			$qtybefore = $qtyPI->p_stock;
		}
		$qtyTotal = $qtybefore + $this->input->post('qtyModal');
		$data = array(
			'p_stock' => $qtyTotal,
		);
		$this->db->where('p_code', $this->input->post('ProductCode'));
		$this->db->update('products', $data);

		// insert log
		$logData = array(
			'operator' => $this->session->userdata('fullname'),
			'origin' => $this->input->post('origin'),
			'p_code' => $this->input->post('ProductCode'),
			'qty' => $this->input->post('qtyModal')
		);
		$this->db->insert('addstock_log', $logData);
	}
}
