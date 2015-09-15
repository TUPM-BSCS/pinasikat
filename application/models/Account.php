<?php

class Account extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function register(){
		$data = $_POST;
		$user['username'] = $data['username'];
		if(isset($data['username']) && isset($data['password'])){
			unset($_POST);
			$query = $this->db->get_where('account',$user);
			if(!$query->num_rows()){
				$status = TRUE;
				$this->db->insert('account',$data);
			}
		}
		return $status;
	}

	function login(){
		$data = $_POST;
		$status = FALSE;
		$user['username'] = $data['username'];
		if(isset($data['username']) && isset($data['password'])){
			unset($_POST);
			$query = $this->db->get_where('account',$user);
			if($query->num_rows() && ($this->encrypt->decode($query->row()->password) == $data['password']) ){
				$status = TRUE;
				$_SESSION['username'] = $query->row()->username;
				$_SESSION['is_login'] = TRUE;
			}
		}
		return $status;
	}
}

?>