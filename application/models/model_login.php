<?php
class model_login extends CI_Model {

	function login($username,$password)
	{
		$chek= $this->db->get_where('petugas',array('username'=>$username,'password'=>md5($password),'status'=>'1'));
		if ($chek->num_rows()>0)
		{
			foreach ($chek->result() as $c) {
					$sess_data['hak'] = $c->hak;
					$this->session->set_userdata($sess_data);
					return 1;
				}
		}else{
			return 0;
		}			 
	}

	function register()
	{
		$password 	= $this->input->post('password');
		$data 		= array('nama_petugas'=>$this->input->post('nama'),
							'username'=>$this->input->post('username'),
							'password'=>md5($password),
							'hak'=>'admin',
							'status'=>'0');
		$this->db->insert('petugas',$data);
	}
}