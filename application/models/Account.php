<?php

class Account extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function register(){
		$data = $_POST;
		if(isset($data)){
			$this->db->insert('account',$data);
		}
		unset($data);
		unset($_POST);
	}

	function login(){
		$data = $_POST;
		if(isset($data)){
			$query = $this->db->get_where('account',$data);
		}
		unset($data);
		unset($_POST);
	}
}

?>