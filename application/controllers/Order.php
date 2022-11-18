<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model');
		$this->load->model('Product_model');
		include APPPATH . 'third_party/tcpdf/tcpdf.php';
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
		$this->load->view('components/order_view', $data);
		$this->load->view('footer');
	}
	public function posttest()
	{
		echo '<pre>';
		print_r($_SESSION['cart_contents']);
		echo '</pre>';

		foreach ($this->cart->contents() as $items) {
			echo $items['p_name'];
		}
	}

	public function addWithdrawLog()
	{
		// gen report code
		$firstCode = "WDRP00";
		$query = $this->db->get('withdraw_log');
		$lastCode = $query->num_rows();
		$reportcode = $firstCode . $lastCode;
		// log
		$this->Product_model->whithdrawlog($reportcode);

		// crate report
		$this->createWithdrawLogPDF($reportcode);

		redirect('Cart', 'refresh');
	}

	public function createWithdrawLogPDF($reportcode)
	{
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set timezone
		date_default_timezone_set("Asia/Bangkok");
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('HELENA THAILAND');
		$pdf->SetTitle('ใบเบิกสินค้า');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// mo header
		// กำหนดให้ไม่แสดงส่วนหัวของเอกสาร
		$pdf->setPrintHeader(false);
		// กำหนดให้ไม่แสดงส่วนท้ายของเอกสาร
		$pdf->setPrintFooter(false);

		//margin
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// font
		$pdf->SetFont('thsarabun', '', 16);
		$pdf->AddPage();

		// create page
		$pdf->SetFont('thsarabun', '', 18);
		$pdf->MultiCell(50, 10, 'เอกสารการเบิกสินค้า', 0, 'C', false, 0, 80, 20);
		$pdf->SetFont('thsarabun', '', 16);
		$pdf->MultiCell(100, 10, 'ผู้ดำเนินการ : ' . $this->session->userdata('fullname'), 0, 'L', false, 0, 20, 35);
		$pdf->MultiCell(100, 10, 'รหัสเอกสาร : ' . $reportcode, 0, 'L', false, 0, 140, 35);
		$pdf->MultiCell(100, 10, 'ผู้เบิกสินค้า : ' . $this->input->post('picker'), 0, 'L', false, 0, 20, 42);
		$pdf->MultiCell(100, 10, 'วันที่ : ' . date("d/m/Y"), 0, 'L', false, 0, 140, 42);
		$pdf->MultiCell(100, 10, 'เวลา : ' . date("h:i:sa"), 0, 'L', false, 0, 140, 49);
		$pdf->MultiCell(100, 10, 'เหตุผลในการเบิก : ' . $this->input->post('reason'), 0, 'L', false, 0, 20, 49);
		//table
		$pdf->SetFillColor(233, 234, 236);
		$pdf->MultiCell(13, 8, 'ลำดับ', 1, 'L', 1, 0, 21, 60,);
		$pdf->MultiCell(60, 8, 'รายการ', 1, 'L', 1, 0, 34, 60,);
		$pdf->MultiCell(20, 8, 'จำนวน', 1, 'L', 1, 0, 94, 60,);
		$pdf->MultiCell(32, 8, 'ราคาต้นทุน (บาท)', 1, 'L', 1, 0, 114, 60,);
		$pdf->MultiCell(33, 8, 'ราคาขาย (บาท)', 1, 'L', 1, 0, 146, 60,);
		// data
		$total_cost = 0;
		$j = 8;
		$number = 0;
		foreach ($this->cart->contents() as $items) {
			$number++;
			$total_cost += $items['p_cost']*$items['qty'];
			$pdf->MultiCell(13, 8, $number, 1, 'L', false, 0, 21, 60 + $j,);
			$pdf->MultiCell(60, 8, $items['name'], 1, 'L', false, 0, 34, 60 + $j,);
			/* mb_strimwidth( $items['name'], 0, 20, "..." ); */
			$pdf->MultiCell(20, 8, $items['qty'], 1, 'L', false, 0, 94, 60 + $j,);
			$pdf->MultiCell(32, 8, number_format($items['p_cost'] * $items['qty'], 2), 1, 'L', false, 0, 114, 60 + $j,);
			$pdf->MultiCell(33, 8, number_format($items['subtotal'], 2), 1, 'L', false, 0, 146, 60 + $j,);
			$j += 8;
		}
		// result all
		$pdf->SetFillColor(233, 234, 236);
		$pdf->MultiCell(73, 8, 'รวมทั้งสิ้น', 1, 'L', 1, 0, 21, 60 + $j,);
		$pdf->MultiCell(20, 8, $this->input->post('total_qty'), 1, 'L', 1, 0, 94, 60 + $j,);
		$pdf->MultiCell(32, 8, number_format($total_cost), 1, 'L', 1, 0, 114, 60 + $j,);
		$pdf->MultiCell(33, 8, number_format($this->input->post('total_price'), 2), 1, 'L', 1, 0, 146, 60 + $j,);
		//License operator
		$pdf->MultiCell(52, 25, 'ลงชื่อผู้ดำเนินการ', 1, 'C', false, 0, 21, 72 + $j,);
		$pdf->MultiCell(52, 8, '__________________', 0, 'C', false, 0, 21, 82 + $j,);
		$pdf->MultiCell(52, 8, '('.$this->session->userdata('fullname').')', 0, 'C', false, 0, 21, 89 + $j,);
		//License operator
		$pdf->MultiCell(52, 25, 'ลงชื่อผู้เบิกสินค้า', 1, 'C', false, 0, 73, 72 + $j,);
		$pdf->MultiCell(52, 8, '__________________', 0, 'C', false, 0, 73, 82 + $j,);
		$pdf->MultiCell(52, 8, '('.$this->input->post('picker').')', 0, 'C', false, 0, 73, 89 + $j,);
		//License checker
		$pdf->MultiCell(54, 25, 'ลงชื่อผู้เช็คสินค้า', 1, 'C', false, 0, 125, 72 + $j,);
		$pdf->MultiCell(54, 8, '__________________', 0, 'C', false, 0, 125, 82 + $j,);
		$pdf->MultiCell(54, 8, '(                               )', 0, 'C', false, 0, 125, 89 + $j,);

		// output
		$pdf->Output('เอกสารการเบิกสินค้า.pdf', 'I');
	}
}
