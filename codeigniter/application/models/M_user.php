<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_model {

    // fungsi simpan data register
    public function simpan_register($data) 
    {
        return $this->db->insert("tbl_users", $data);
    }

    // fungsi cek login
	function cek_login($username, $password)
	{
		// var_dump($password);die;
		$this->db->select("*");
		$this->db->from("tbl_users");
		$this->db->where("username", $username);
		$query = $this->db->get();
		$user  = $query->row();
		// var_dump($user->password);
		// var_dump($password);die;
		/**
		* Check password
		*/
		if (!empty($user)) 
		{
			// echo 'tidak empty user';
			// var_dump($user);die;
			// if (password_hash($password, PASSWORD_DEFAULT)) 				
			if($password === $password)
			{
				// echo 'berhasil';
				// var_dump($query->result());die;
			  return $query->result();
			}
			else 
			{
				// echo "error";
			  return FALSE;
			}
		}
		else 
		{
			// echo 'test ah';
			return FALSE;
		}
	}


}