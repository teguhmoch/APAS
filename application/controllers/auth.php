<?php
class auth extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_login');
	}

	function login()
	{
		if (isset($_POST['submit']))
	{
		//proses login
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$hasil		= $this->model_login->login($username,$password);
		if ($hasil==1) 
		{	
			$this->db->where('username',$username);
			$this->db->update('petugas',array('last_login'=>date('Y,m,d')));
			$this->session->set_userdata(array('status_login'=>'oke','username'=>$username));
			redirect('dashboard');
		}else{
			redirect('auth/login'); 
		}
	}else{
		chek_session_login();
		$this->load->view('form_login');
		}

		
		}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

	function register()
	{
		if(isset($_POST['submit']))
		{
			$this->model_login->register();
			redirect('auth/login');
		}else{
			$this->load->view('register');
		}
	}
}
	
