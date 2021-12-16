<?php

class karyawan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_karyawan');
	}

	function index() 
	{
		chek_session();
		$data['record'] = $this->model_karyawan->tampil_data()->result();
		$this->template->load('template','karyawan/aktif',$data);
	}

	function post()
	{
		chek_session();
		if (isset($_POST['submit']))
		{
			$nama 		= $this->input->post('nama');
			$username 	= $this->input->post('username');
			$password	= $this->input->post('pass');
			$hak		= $this->input->post('hak');
			$data 		= array('nama_petugas'=>$nama,'username'=>$username,'password'=>md5($password),'hak'=>$hak);
			$this->db->insert('petugas',$data);
			redirect('karyawan');
		}
		$this->template->load('template','karyawan/tambah_data');
	}

	function delete()
	{
		$id = $this->uri->segment(3);
		$this->model_karyawan->delete($id);
		redirect('karyawan');
	}

	function edit()
	{
		chek_session();
		if (isset($_POST['submit']))
		{
			$id 		= $this->input->post('id',true);
			$nama		= $this->input->post('nama',true);
			$username	= $this->input->post('username',true);
			$password	= $this->input->post('password',true);
			$hak		= $this->input->post('hak',true);
			if(empty($password)){
				$data 		=array('nama_petugas'=>$nama,'username'=>$username);
			}else{
				$data 		=array('nama_petugas'=>$nama,'username'=>$username,'password'=>md5($password));
			}
			$this->db->where('id_petugas',$id);
			$this->db->update('petugas',$data);
			redirect('karyawan');
		}else{
			$id = $this->uri->segment(3);
			$this->load->model('model_karyawan');
           	$data['record']= $this->model_karyawan->get_one($id)->row_array();
			$this->template->load('template','karyawan/edit_data',$data);
		}
	}

	function aktifkan()
	{
		$id = $this->uri->segment(3);
		$this->db->where('id_petugas',$id);
		$this->db->update('petugas',array('status'=>'1'));
		redirect('karyawan/belum_aktif');
	}

	function belum_aktif()
	{
		$data['record'] = $this->model_karyawan->belum_aktif()->result();
		$this->template->load('template','karyawan/belum_aktif',$data);
	}

}