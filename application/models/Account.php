<?php

class Account extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function register(){
		$data = $_POST;
		unset($_POST);
		$data['password'] = $this->encrypt->encode($data['password']);
		if($this->db->insert('account',$data)){
			$_SESSION['msg'] = 'Sign-up was successful! You may now sign-in.';
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	function login(){
		$data = $_POST;
		unset($_POST);
		$user['username'] = $data['username'];
		if(isset($data['username']) && isset($data['password'])){
			$query = $this->db->get_where('account',$user);
			if($query->num_rows() && ($this->encrypt->decode($query->row()->password) == $data['password']) ){
				$_SESSION['username'] = $query->row()->username;
				return TRUE;
			}
		}
		return FALSE;
	}
}

?>