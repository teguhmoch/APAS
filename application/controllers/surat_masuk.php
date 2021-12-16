<?php
class surat_masuk extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_smasuk');
		chek_session();
	}

	function index()
	{
		$data ['record'] = $this->model_smasuk->tampil_data()->result();
		$this->template->load('template','surat_masuk/lihat_data',$data);
	}

	function post()

	{
		chek_session();
		if (isset($_POST['submit']))
		{
			$agenda		= $this->input->post('agenda');
			$jenis		= $this->input->post('jenis');
			$tkirim		= $this->input->post('tkirim');
			$tterima	= $this->input->post('tterima');
			$nosurat	= $this->input->post('nosurat');
			$pengirim	= $this->input->post('pengirim');
			$sifat		= $this->input->post('sifat');
			$perihal	= $this->input->post('perihal');
			$lampiran	= $this->input->post('lampiran');
			$petunjuk	= $this->input->post('petunjuk');
			$data 		= array('no_agenda'=>$agenda,'jenis_surat'=>$jenis,'tanggal_kirim'=>$tkirim,'tanggal_terima'=>$tterima,'no_surat'=>$nosurat,'pengirim'=>$pengirim,'sifat'=>$sifat,'perihal'=>$perihal,'lampiran'=>$lampiran,'nomor_petunjuk'=>$petunjuk);
			$this->db->insert('surat_masuk',$data);
			redirect('surat_masuk');
		}else{
			$this->load->model('model_smasuk');
			$data['record']= $this->db->get('jenis_surat')->result();
			$this->template->load('template','surat_masuk/tambah_data',$data);
		}
	}

	function delete()
	{
		$id = $this->uri->segment(3);
		$this->model_smasuk->delete($id);
		redirect('surat_masuk');
	}

	function edit()
	{
		chek_session();
		if (isset($_POST['submit']))
		{
			$id 		= $this->input->post('id',true);
			$agenda		= $this->input->post('agenda',true);
			$jenis_surat= $this->input->post('jenis',true);
			$tkirim		= $this->input->post('tkirim',true);
			$tterima	= $this->input->post('tterima',true);
			$nosurat	= $this->input->post('nosurat',true);
			$pengirim	= $this->input->post('pengirim',true);
			$sifat		= $this->input->post('sifat',true);
			$perihal	= $this->input->post('perihal',true);
			$lampiran	= $this->input->post('lampiran',true);
			$petunjuk	= $this->input->post('petunjuk',true);
			if(empty($sifat)){
			$data 		= array('no_agenda'=>$agenda,'jenis_surat'=>$jenis_surat,'tanggal_kirim'=>$tkirim,'tanggal_terima'=>$tterima,'		no_surat'=>$nosurat,'pengirim'=>$pengirim,'perihal'=>$perihal,'lampiran'=>$lampiran,'nomor_petunjuk'=>$petunjuk);
			}else{
			$data 		= array('no_agenda'=>$agenda,'jenis_surat'=>$jenis_surat,'tanggal_kirim'=>$tkirim,'tanggal_terima'=>$tterima,'		no_surat'=>$nosurat,'pengirim'=>$pengirim,'sifat'=>$sifat,'perihal'=>$perihal,'lampiran'=>$lampiran,'nomor_petunjuk'=>$petunjuk);	
			}
			$this->db->where('id_masuk',$id);
			$this->db->update('surat_masuk',$data);
			redirect('surat_masuk');
		}else{
			$id = $this->uri->segment(3);
			$this->load->model('model_smasuk');
			$data['jenis']= $this->db->get('jenis_surat')->result();
           	$data['record']= $this->model_smasuk->get_one($id)->row_array();
			$this->template->load('template','surat_masuk/edit_data',$data);
		}	
	}

		function simpan()
	{
		if(isset($_POST['submit']))
		{
			$this->model_smasuk->disposisi();
			redirect('surat_masuk'); 	
		}else{


			$id = $this->uri->segment(3);
			$this->load->model('model_smasuk');
           	$data['record']= $this->model_smasuk->get_one($id)->row_array();
			$this->template->load('template','disposisi/confirm',$data);
	}
}

	function pdf()
	{
		$this->load->library('fpdf/fpdf');
		$pdf=new FPDF('L','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B','L');
		$pdf->SetFontSize(14);
		$pdf->Text(10,10,'Surat Masuk','C');
		$pdf->SetFont('Arial','B','L');
		$pdf->SetFontSize(10);
		$pdf->Cell(10,10,'','',1);
		$pdf->Cell(10,7,'No',1,0);
		$pdf->Cell(45,7,'Pengirim',1,0);
		$pdf->Cell(45,7,'No. Surat',1,0);
		$pdf->Cell(38,7,'Tanggal Kirim',1,0);
		$pdf->Cell(38,7,'Tanggal Terima',1,0);
		$pdf->Cell(38,7,'Perihal',1,0);
		$pdf->Cell(25,7,'lampiran',1,0);
		$pdf->Cell(38,7,'No.Petunjuk',1,1);
		//tampilkan dari databas
		$pdf->SetFont('Arial','','L');
		$data= $this->model_smasuk->laporan_default();
		$no=1;
		$total=0;
		foreach ($data->result() as $m)
		{
		$pdf->Cell(10,7,$no,1,0);
		$pdf->Cell(45,7,$m->pengirim,1,0);
		$pdf->Cell(45,7,$m->no_surat,1,0);
		$pdf->Cell(38,7,$m->tanggal_kirim,1,0);
		$pdf->Cell(38,7,$m->tanggal_terima,1,0);
		$pdf->Cell(38,7,$m->perihal,1,0);
		$pdf->Cell(25,7,$m->lampiran,1,0);
		$pdf->Cell(38,7,$m->nomor_petunjuk,1,1);
		
		$no++;	
		}
		$pdf->Output();
	}

	function excell()
	{
		header("Content-type=application/vnd.ms-excel");
		header("content-disposition:attachment;filename=laporan_suratmasuk.xls");
		$data['record']= $this->model_smasuk->laporan_default();
		$this->load->view('surat_masuk/laporan_excel',$data);
	}
	

	function agenda()
	{
		if(isset($_POST['submit']))
		{
			$tanggal1 = $this->input->post('tanggal1');
			$tanggal2 = $this->input->post('tanggal2');
			$data['record'] = $this->model_smasuk->agenda($tanggal1,$tanggal2)->result();
			$this->template->load('template','surat_masuk/agenda',$data);
		}else if(isset($_POST['cetak'])){
			$this->load->library('fpdf/fpdf');
			$this->load->library('fpdf');
				$pdf=new FPDF('L','mm','A4');
				$pdf->AddPage();
				$pdf->SetFont('Arial','B','L');
				$pdf->SetFontSize(14);
				$pdf->Text(80,10,'Agenda Surat Masuk');
				$pdf->SetFont('Arial','B','L');
				$pdf->SetFontSize(11);
				$pdf->Cell(10, 10, '','', 1);
				$pdf->Cell(9, 7, 'No', 1,0);
				$pdf->Cell(30, 7, 'No Agenda', 1,0);
				$pdf->Cell(30, 7, 'Jenis Surat', 1,0);
				$pdf->Cell(30, 7, 'Tanggal Kirim', 1,0);
				$pdf->Cell(30, 7, 'Tanggal Terima', 1,0);
				$pdf->Cell(30, 7, 'No Surat', 1,0);
				$pdf->Cell(30, 7, 'Pengirim', 1,0);
				$pdf->Cell(35, 7, 'Perihal', 1,1);
				//tampilkan dari database
				$pdf->setFont('Arial','','L');
				$tanggal1=$this->input->post('tanggal1');
				$tanggal2=$this->input->post('tanggal2');
				$data=$this->model_smasuk->agenda($tanggal1,$tanggal2);
				$no=1;
				$total=0;
				foreach($data->result()as $r)
				{
				$pdf->Cell(9, 7, $no, 1,0);
				$pdf->Cell(30, 7, $r->no_agenda, 1,0);
				$pdf->Cell(30, 7, $r->jenis_surat, 1,0);
				$pdf->Cell(30, 7, $r->tanggal_kirim, 1,0);
				$pdf->Cell(30, 7, $r->tanggal_terima, 1,0);
				$pdf->Cell(30, 7, $r->no_surat, 1,0);
				$pdf->Cell(30, 7, $r->pengirim, 1,0);
				$pdf->Cell(35, 7, $r->perihal, 1,1);
				}
				//end
				$pdf->Output();
			}else if (isset($_POST['excel'])){
				header("Content-type=appalication/vnd.ms-excel");
				header("content-disposition:attachment;filename=agendasuratmasuk.xls");
				$tanggal1=$this->input->post('tanggal1');
				$tanggal2=$this->input->post('tanggal2');
				$data['excel']= $this->model_smasuk->agenda($tanggal1,$tanggal2);
				$this->load->view('surat_masuk/agenda_excel',$data);
			}else{
				$data['record'] = $this->model_smasuk->agenda_default()->result();
				$this->template->load('template','surat_masuk/agenda',$data);
			}
		}

		function invoice()
		{
			$this->load->view('surat_masuk/invoice');
		}
		}