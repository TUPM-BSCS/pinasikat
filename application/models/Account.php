<?php

class Account extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function signup(){
		$data = $_POST;
		$user['username'] = $data['username'];
		$status = FALSE;
		if(isset($data['username']) && isset($data['password'])){
			unset($_POST);
			$query = $this->db->get_where('account',$user);
			if(!$query->num_rows()){
				$data['password'] = $this->encrypt->encode($data['password']);
				$this->db->insert('account',$data);
				$status = TRUE;
			}
		}
		return $status;
	}

	function signin(){
		$data = $_POST;
		$status = FALSE;
		$user['username'] = $data['username'];
		if(isset($data['username']) && isset($data['password'])){
			unset($_POST);
			$query = $this->db->get_where('account',$user);
			if($query->num_rows() && ($this->encrypt->decode($query->row()->password) == $data['password']) ){
				$status = TRUE;
				$_SESSION['username'] = $query->row()->username;
			}
		}
		return $status;
	}
}

?>