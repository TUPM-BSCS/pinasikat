<?php

class Account extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function register(){
		$data = $_POST;
		$status = FALSE;
		if(isset($data['username']) && isset($data['password'])){
			unset($_POST);
			$query = $this->db->get_where('account',$data);
			if(!$query->num_rows()){
				$status = TRUE;
				$this->db->insert('account',$data);
			}
		}
		unset($data);
		return $status;
	}

	function login(){
		$data = $_POST;
		$status = FALSE;
		if(isset($data['username']) && isset($data['password'])){
			unset($_POST);
			$query = $this->db->get_where('account',$data);
			if($query->num_rows()){
				$status = TRUE;
				$_SESSION['username'] = $query->row()->username;
				$_SESSION['is_login'] = TRUE;
			}
		}
		unset($data);
		return $status;
	}
}

?>