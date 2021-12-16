<?php

class model_disposisi extends CI_Model{

	function tampil_data()
	{
		return $this->db->get('disposisi');
	}

	function delete($id)
	{
		$this->db->where('no_disposisi',$id);
		$this->db->delete('disposisi');
	}

	function get_one($id)
	{
		$param = array('no_disposisi'=>$id);
		return $this->db->get_where('disposisi',$param);
	}

	function get($id)
	{
		$param = array('id_masuk'=>$id);
		return $this->db->get_where('surat_masuk',$param);
	}

	function get_onej()
	{

		return $this->db->get('jenis_surat');
	}

	function belum_ditanggapi()
	{
		$sql ="SELECT * FROM disposisi WHERE status_surat='0'";
		return $this->db->query($sql);
	}

	function sudah_ditanggapi()
	{
		$sql ="SELECT * FROM disposisi WHERE status_surat='1'";
		return $this->db->query($sql);
	}

	function tanggapi()
	{
		$kepada 	= $this->input->post('kepada',true);
		$keterangan	= $this->input->post('keterangan',true);
		$tanggapan	= $this->input->post('tanggapan',true);
		$catatan	= $this->input->post('catatan',true);
		$data = array('kepada'=>$kepada,'keterangan'=>$keterangan,'tanggapan'=>$tanggapan,'catatan'=>$catatan,'status_surat'=>'1');
		$this->db->where('no_disposisi');
		$this->db->update('disposisi',$data);

	}

	function getSuratById($id)
	{
		if(!empty($id))
		{
			$query=$this->db->query("SELECT * FROM disposisi WHERE no_disposisi=".$id)->row();
			if(empty($query))
			{
				return $query;
			}
		}
		return "ID Belum Terpilih !!";
	}
}