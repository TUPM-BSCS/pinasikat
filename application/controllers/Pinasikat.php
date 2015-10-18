<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pinasikat extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('header-nav-v2');
		$this->load->view('modals');
		$this->load->view('content');
		$this->load->view('footer');
	}

	public function logout(){
		if(isset($_SESSION['username'])){
			session_destroy();
			redirect(base_url());
		}
	}

	public function login(){
		$this->load->model('accounts');
		if($this->accounts->login()){
			$_SESSION['msg'] = 'Welcome '.$_SESSION['fname'].' '.$_SESSION['lname'].'!';
			$_SESSION['notified'] = FALSE;
			echo $result = 1;
		}else{
			echo $result = 0;
		}
	}

	public function registration(){
		if(!isset($_SESSION['username'])){
			$this->load->view('header-nav-v2');
			$this->load->view('modals');
			$this->load->view('register');
			$this->load->view('footer');
		}else
			redirect(base_url());
	}

	public function register(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->load->model('accounts');
			if($this->accounts->register()){
				$_SESSION['notified'] = FALSE;
				$_SESSION['msg'] = 'Registration succesful! You can now login.';
				//redirect(base_url());
				echo $result = 1;
			}else{
				//$_SESSION['notified'] = FALSE;
				//redirect(base_url());
				echo $result = 0;
			}
		}
		else
			redirect(base_url());
	}

	public function profile($username){
		if(isset($_SESSION['username'])){
			$this->load->view('header-nav-v2');
			$this->load->view('modals');
			$this->load->view('profile');
			$this->load->view('footer');
		}
		else
			redirect(base_url());
	}
	
	public function uploadform(){
		if(isset($_SESSION['username'])){
			$this->load->view('header-nav-v2');
			$this->load->view('modals');
			if(isset($_SESSION['data']))
				$this->load->view('upload_form',$_SESSION['data']);
			else
				$this->load->view('upload_form');
			$this->load->view('footer');
		}
		else
			redirect(base_url());
	}

	public function upload(){
		$this->load->model('articles');
		if($this->articles->upload()){
			unset($_FILE);
			unset($_POST);
			unset($_SESSION['data']);
			$_SESSION['data'] = array(
				'successful' => TRUE
				);
			redirect(base_url("uploadform"));
		}
		else{
			$_SESSION['data'] = array(
				'art_name' => $_POST['art_name'],
				'art_desc' => $_POST['art_desc'],
				'art_addr' => $_POST['art_addr'],
				'art_city' => $_POST['art_city'],
				'successful' => FALSE
				);
			unset($_FILE);
			unset($_POST);
			redirect(base_url("uploadform"));
		}
		
	}

}

?>