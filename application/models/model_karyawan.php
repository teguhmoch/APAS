<?php

class model_karyawan extends CI_Model{

	function tampil_data()
	{
		$sql ="SELECT * FROM petugas WHERE status='1'";
		return $this->db->query($sql);
	}

	function delete($id)
	{
		$this->db->where('id_petugas',$id);
		$this->db->delete('petugas');
	}

	function get_one($id)
	{
		$param = array('id_petugas'=>$id);
		return $this->db->get_where('petugas',$param);
	}

	function belum_aktif()
	{
		$sql ="SELECT * FROM petugas WHERE status='0'";
		return $this->db->query($sql);	
	}
}