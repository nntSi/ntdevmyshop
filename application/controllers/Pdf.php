<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->model('Product_model');
        include APPPATH . 'third_party/tcpdf/tcpdf.php';
        
    }

    public function index()
    {
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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
        $pdf->MultiCell(100, 10, 'ผู้ดำเนินการ : '.$this->session->userdata('fullname') , 0, 'L', false, 0, 20, 35);
        $pdf->MultiCell(100, 10, 'รหัสเอกสาร : ' , 0, 'L', false, 0, 140, 35);

        // output
        $pdf->Output('mindphp02.pdf', 'I');

    }
}
