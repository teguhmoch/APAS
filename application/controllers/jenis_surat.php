<?php
class jenis_surat extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('model_sjenis');
	}

	function index()
	{
		$data['record'] = $this->db->get('jenis_surat')->result();
		$this->template->load('template','jenis_surat/lihat_data',$data);
	}

	function post()
	{
		if(isset($_POST['submit']))
		{
			$njenis = $this->input->post('njenis');
			$kode 	= $this->input->post('kode');
			$data 	= array('nama_jenis'=>$njenis,'kode_surat'=>$kode);
			$this->db->insert('jenis_surat',$data);
			redirect('jenis_surat');
		}
			$this->template->load('template','jenis_surat/add');
	}

	function edit()
	{
		if(isset($_POST['submit']))
		{
			$id 	= $this->input->post('id');
			$njenis = $this->input->post('njenis');
			$kode 	= $this->input->post('kode');
			$data 	= array('nama_jenis'=>$njenis,'kode_surat'=>$kode);
			$this->db->where('id_surat',$id);
			$this->db->insert('jenis_surat',$data);
			redirect('jenis_surat');
		}
			$id = $this->uri->segment(3);
			$data['record'] = $this->model_sjenis->get_one($id)->row_array();		
			$this->template->load('template','jenis_surat/edit',$data);	
	}

	function delete()
	{
		$id = $this->uri->segment(3);
		$this->model_sjenis->delete($id);
		redirect('jenis_surat');
	}
}