<?php

class dashboard extends CI_Controller {

	function __construct(){

		parent::__construct();
			$this->load->model(array('model_karyawan','model_smasuk','model_skeluar','model_disposisi'));
			
	}

	function index() {
		
		chek_session();

		$data ['karyawan']	= $this->model_karyawan->tampil_data()->num_rows();
		$data ['masuk']		= $this->model_smasuk->tampil_data()->num_rows();
		$data ['keluar']	= $this->model_skeluar->tampil_data()->num_rows();
		$data ['disposisi']	= $this->model_disposisi->tampil_data()->num_rows();
		$this->template->load('template','index',$data);
	}
}