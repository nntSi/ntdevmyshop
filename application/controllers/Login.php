<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Authen_model');
	}
	
	public function index()
	{
        $this->load->view('head');
        $this->load->view('components/login_view');
	}
    public function loginauth(){
        $result = $this->Authen_model->fetch_user_login($this->input->post('username'), sha1($this->input->post('password')));
        if(empty($result))
		{
			redirect('?act=F', 'refresh');
		}else{
            $dataCurrentUserSession = array(
                'username'  => $result->username,
                'fullname'     => $result->fullname,
                'position' => $result->position,
                'tel' => $result->tel
            );
            $this->session->set_userdata('table_session', 'notapproveyet');
			$this->session->set_userdata($dataCurrentUserSession);
            redirect('Welcome', 'refresh');
		}
    }
    public function signout(){
        $this->session->sess_destroy();
        redirect('Login', 'refresh');
    }
}