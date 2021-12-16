<?php
class disposisi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_disposisi');
		chek_session();
	}

	function index()
	{
		
		$data['record'] = $this->model_disposisi->tampil_data()->result();
		$this->template->load('template','disposisi/lihat_data',$data);
	}

	function post()
	{
		chek_session();
		if (isset($_POST['submit']))
		{
			$agenda		= $this->input->post('agenda');
			$nosurat	= $this->input->post('nosurat');
			$kepada		= $this->input->post('kepada');
			$keterangan	= $this->input->post('keterangan');
			$status		= $this->input->post('status');
			$tanggapan	= $this->input->post('tanggapan');
			$data 		= array('no_agenda'=>$agenda,'no_surat'=>$nosurat,'kepada'=>$kepada,'keterangan'=>$keterangan,'status_surat'=>$status,'tanggapan'=>$tanggapan);
			$this->db->insert('disposisi',$data);
			redirect('disposisi');
		}
		$this->template->load('template','disposisi/tambah_data');
	}

	function delete()
	{
		$id = $this->uri->segment(3);
		$this->model_disposisi->delete($id);
		redirect('disposisi/sudah_ditanggapi');
	}

	function edit()
	{
		chek_session();
		if (isset($_POST['submit']))
		{
			$id 		= $this->input->post('id',true);
			$agenda		= $this->input->post('agenda',true);
			$jenis_surat= $this->input->post('nosurat',true);
			$tkirim		= $this->input->post('kepada',true);
			$nosurat	= $this->input->post('keterangan',true);
			$pengirim	= $this->input->post('status',true);
			$perihal	= $this->input->post('tanggapan',true);
			$data 		= array('no_agenda'=>$agenda,'no_surat'=>$nosurat,'kepada'=>$kepada,'keterangan'=>$keterangan,'status_surat'=>$status,'tanggapan'=>$tanggapan);
			$this->db->where('no_disposisi',$id);
			$this->db->update('disposisi',$data);
			redirect('disposisi');
		}else{
			$id = $this->uri->segment(3);
			$this->load->model('model_disposisi');
           	$data['record']= $this->model_disposisi->get_one($id)->row_array();
			$this->template->load('template','disposisi/edit_data',$data);
		}
	}

	function pdf()
	{
		$this->load->library('fpdf/fpdf');
		$pdf=new FPDF('L','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B','L');
		$pdf->SetFontSize(14);
		$pdf->Text(10,10,'Disposisi','C');
		$pdf->SetFont('Arial','B','L');
		$pdf->SetFontSize(10);
		$pdf->Cell(10,10,'','',1);
		$pdf->Cell(10,7,'No',1,0);
		$pdf->Cell(25,7,'No Disposisi',1,0);
		$pdf->Cell(25,7,'No agenda',1,0);
		$pdf->Cell(25,7,'Pengirim',1,0);
		$pdf->Cell(25,7,'Kode Surat',1,0);
		$pdf->Cell(30,7,'Tanggal Kirim',1,0);
		$pdf->Cell(30,7,'Tanggal Terima',1,0);
		$pdf->Cell(35,7,'No Surat',1,0);
		$pdf->Cell(25,7,'Kepada',1,0);
		$pdf->Cell(25,7,'Keterangan',1,0);
		$pdf->Cell(20,7,'Sifat',1,1);
	//tampilkan dari databas
		$pdf->SetFont('Arial','','L');
		$data= $this->model_disposisi->tampil_data();
		$no=1;
		$total=0;
		foreach ($data->result() as $m)
		{
		$pdf->Cell(10,7,$no,1,0);
		$pdf->Cell(25,7,$m->no_disposisi,1,0);
		$pdf->Cell(25,7,$m->no_agenda,1,0);
		$pdf->Cell(25,7,$m->pengirim,1,0);
		$pdf->Cell(25,7,$m->kode_surat,1,0);
		$pdf->Cell(30,7,$m->tanggal_kirim,1,0);
		$pdf->Cell(30,7,$m->tanggal_terima,1,0);
		$pdf->Cell(35,7,$m->no_surat,1,0);
		$pdf->Cell(25,7,$m->kepada,1,0);
		$pdf->Cell(25,7,$m->keterangan,1,0);
		$pdf->Cell(20,7,$m->sifat,1,1);

		
		$no++;	
		}
		$pdf->Output();
	}

	function excel()
	{
		header("Content-type=application/vnd.ms-excel");
		header("content-disposition:attachment;filename=laporan_disposisi.xls");
		$data['record']= $this->model_disposisi->tampil_data();
		$this->load->view('Disposisi/laporan_excel',$data);
	}

	function tanggapi()
	{
		$id 			= $this->input->post('id',true);
		$kepada 		= $this->input->post('kepada',true);
		$keterangan 	= $this->input->post('keterangan',true);
		$tanggapan 		= $this->input->post('tanggapan',true);
		$catatan 		= $this->input->post('catatan',true);
		$data 			= array('kepada'=>$kepada,'keterangan'=>$keterangan,'tanggapan'=>$tanggapan,'catatan'=>$catatan,'status_surat'=>'1');

		$this->db->where('no_disposisi',$id);
		$this->db->update('disposisi',$data);
		redirect('disposisi/belum_ditanggapi');
 	}

	function belum_ditanggapi()
	{
		$id = $this->input->post('id');
		$data ['record'] = $this->model_disposisi->belum_ditanggapi();
		//$data['disposisi']= $this->model_disposisi->get_one($id)->row_array();
		$this->template->load('template','disposisi/belum_ditanggapi',$data);
	}

	function sudah_ditanggapi()
	{
		$data ['record'] = $this->model_disposisi->sudah_ditanggapi()->result();
		//$data['disposisi']= $this->model_disposisi->get_one($id)->row_array();
		$this->template->load('template','disposisi/sudah_ditanggapi',$data);
	}

	function lembar_disposisi()
	{
		$this->load->library('fpdf');
		$pdf = new FPDF('P','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B','C');
		$pdf->SetFontSize(16);
		$pdf->Text(75,10,'Lembar Disposisi');
		//untuk kepala tabel
		$id = $this->uri->segment(3);
		$data= $this->model_disposisi->get_one($id)->row_array();
		$pdf->SetFont('Arial','B','L');
		$pdf->SetFontSize(12);
		$pdf->Cell(10,20,'','',1);
		$pdf->Line(0,20,215,20);
		//1
		$pdf->Cell(35,10,'Surat Dari',0,0);
		$pdf->Cell(3,10,':',0,0);
		$pdf->Cell(55,10,$data['pengirim'],0,0);
		$pdf->Cell(40,10,'Diterima Tanggal',0,0);
		$pdf->Cell(3,10,':',0,0);
		$pdf->Cell(40,10,$data['tanggal_terima'],0,1);
		$pdf->Line(0,65,215,65);
		//2
		$pdf->Cell(35,10,'No Surat',0,0);
		$pdf->Cell(3,10,':',0,0);
		$pdf->Cell(55,10,$data['no_surat'],0,0);
		$pdf->Cell(40,10,'Nomor Kode Surat',0,0);
		$pdf->Cell(3,10,':',0,0);
		$pdf->Cell(40,10,$data['kode_surat'],0,1);
		$pdf->Line(0,100,215,100);
		//3
		$pdf->Cell(35,10,'Tanggal Surat',0,0);
		$pdf->Cell(3,10,':',0,0);
		$pdf->Cell(55,10,$data['tanggal_kirim'],0,0);
		$pdf->Cell(40,10,'Sifat Surat',0,0);
		$pdf->Cell(3,10,':',0,0);
		$pdf->Cell(40,10,$data['sifat'],0,1);
		$pdf->Line(0,150,215,150);
		//4
		$pdf->Cell(40,10,'',0,1);
		//5
		$pdf->Cell(20,0,'Perihal :',0,0);
		$pdf->Cell(120,0,$data['perihal'],0,1);
		//6
		$pdf->Cell(93,80,'Diteruskan Kepada :',0,0);
		$pdf->Cell(83,80,'Dengan Hormat Harap :',0,1);
		$pdf->Cell(176,10,'',0,1);
		//7
		$pdf->Cell(40,0,'Catatan :',0,0);
		$pdf->Cell(135,10,'',0,1);
		//output
		$pdf->Output();

   }

}		