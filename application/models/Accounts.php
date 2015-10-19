<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accounts extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function register(){
		$data = $_POST;
		unset($_POST);
		$data['password'] = $this->encrypt->encode($data['password']);
		if($this->db->insert('accounts',$data)){
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
		if(isset($data['username']) && isset($data['password'])){
			$query = $this->db->where('username',$data['username'])->get('accounts');
			if($query->num_rows() && ($this->encrypt->decode($query->row()->password) == $data['password']) && ($query->row()->username == $data['username']) ){
				$_SESSION['username'] = $query->row()->username;
				$_SESSION['fname'] = $query->row()->fname;
				$_SESSION['lname'] = $query->row()->lname;
				return TRUE;
			}
		}
		return FALSE;
	}
}

?>