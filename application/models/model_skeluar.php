
<?php
class model_skeluar extends CI_Model {

	function tampil_data()
	{
		return $this->db->get('surat_keluar');
	}

	function delete($id)
	{
		$this->db->where('id_keluar',$id);
		$this->db->delete('surat_keluar');
	}

	function get_one($id)
	{
		$param = array('id_keluar'=>$id);
		return $this->db->get_where('surat_keluar',$param);
	}

	function laporan_default()
	{
		return $this->db->get('surat_keluar');
	}

	function agenda($tanggal1,$tanggal2)
	{
		$query ="SELECT * FROM surat_keluar as k
				 WHERE k.tanggal_kirim between '$tanggal1' and '$tanggal2'
				 GROUP BY k.no_agenda";
		return $this->db->query($query);
	}

	function agenda_default()
	{
		$query="SELECT * FROM surat_keluar as k
				GROUP BY k.no_agenda";
		return $this->db->query($query);
	}

	function getSuratById($id)
	{
		if(!empty($id))
		{
			$query=$this->db->query("SELECT * FROM surat_keluar WHERE id_keluar=".$id)->row();
			if(empty($query))
			{
				return $query;
			}
		}
		return "ID Belum Terpilih !!";
	}
}