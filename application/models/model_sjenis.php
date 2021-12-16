<?php
class model_sjenis extends CI_Model
{
	function delete($id)
	{
		$this->db->where('id_surat',$id);
		$this->db->delete('jenis_surat');
	}

	function get_one($id)
	{
		$param = array('id_surat'=>$id);
		return $this->db->get_where('jenis_surat',$param);
	}
}