<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accounts extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function register(){

		$errors = array();
		$has_error = false;

		if(strlen($_POST['username_r']) < 5 || strlen($_POST['username_r']) > 20){
			$errors[] = 'Username must be at least 5 characters but not more than 20.';
			$has_error = true;
		}
		if(strlen($_POST['password1']) < 5 || strlen($_POST['password1']) > 20){
			$errors[] = 'Password must be at least 5 characters but not more than 20.';
			$has_error = true;
		}
		if($_POST['password1'] != $_POST['password2']){
			$errors[] = 'Passwords do not match.';
			$has_error = true;
		}
		if( stripos($_POST['username_r'], ' ') > -1){
			$errors[] = 'Username can not contain whitespace.';
			$has_error = true;
		}
		if( !ctype_alpha($_POST['fname']) || !ctype_alpha($_POST['lname'])){
			$errors[] = 'Seriously? Your name contains a number?';
			$has_error = true;
		}
		if(strlen($_POST['fname']) < 3){
			$errors[] = 'At least a 3-letter firt name would suffice.'; 
			$has_error = true;
		}
		if(strlen($_POST['lname']) < 3){
			$errors[] = 'At least a 3-letter last name would suffice.'; 
			$has_error = true;
		}

		if(!$has_error){
			$data = array(
			'username' => $_POST['username_r'],
			'password' => $this->encrypt->encode($_POST['password1']),
			'fname' => $_POST['fname'],
			'lname' => $_POST['lname']
			);
			if($this->db->insert('accounts',$data)){
				$_SESSION['msg'] = 'Sign-up was successful! You may now sign-in.';
				$_SESSION['has_error'] = false;
				return TRUE;
			}
			else{
				$errors[] = 'Username is already taken.';
				$_SESSION['last_input'] = $_POST;
				$_SESSION['last_input']['has_error'] = true;
				$_SESSION['last_input']['errors'] = $errors;
				return FALSE;
			}	
		}else{
				$_SESSION['last_input'] = $_POST;
				$_SESSION['last_input']['has_error'] = true;
				$_SESSION['last_input']['errors'] = $errors;
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