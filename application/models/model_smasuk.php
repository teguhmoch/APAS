<?php
class model_smasuk extends CI_Model {

	function tampil_data()
	{
		$query="SELECT * FROM surat_masuk WHERE status='0'";
		return $this->db->query($query);
	}

	function delete($id)
	{
		$this->db->where('id_masuk',$id);
		$this->db->delete('surat_masuk');
	}

	function get_one($id)
	{
		$param = array('id_masuk'=>$id);
		return $this->db->get_where('surat_masuk',$param);
	}

	function get_onej()
	{
		$query = "select * from surat_masuk as sm, jenis_surat as j where sm.jenis_surat=j.id_surat";
		return $this->db->query($query);
	}

	function laporan_default()
	{
		return $this->db->get('surat_masuk');
	}

	function disposisi()
	{

		$id_masuk 		= $this->input->post('id');
		$surat_masuk 	= $this->db->get_where('surat_masuk',array('id_masuk'=>$id_masuk))->row_array();
		$data = array('no_agenda' => $surat_masuk['no_agenda'],
					 'no_surat' => $surat_masuk['no_surat'],
					 'kode_surat'=>$surat_masuk['jenis_surat'],
					 'pengirim'=>$surat_masuk['pengirim'],
					 'tanggal_kirim'=>$surat_masuk['tanggal_kirim'],
					 'tanggal_terima'=>$surat_masuk['tanggal_terima'],
					 'sifat'=>$surat_masuk['sifat'],
					 'perihal'=>$surat_masuk['perihal'],
					 'status_surat'=>'0');
		$this->db->insert('disposisi',$data);
		$status = array('status'=>'1');
		$this->db->where('id_masuk',$id_masuk);
		$this->db->update('surat_masuk',$status);
	}

	function agenda($tanggal1,$tanggal2)
	{
		$query ="SELECT * FROM surat_masuk as k
				 WHERE k.tanggal_kirim between '$tanggal1' and '$tanggal2'
				 GROUP BY k.no_agenda";
		return $this->db->query($query);
	}

	function agenda_default()
	{
		$query="SELECT * FROM surat_masuk as k
				GROUP BY k.no_agenda";
		return $this->db->query($query);
	}

}

