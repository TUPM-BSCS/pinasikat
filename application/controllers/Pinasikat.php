<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pinasikat extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	public function index($page = 1){
		$this->load->model('articles');
		$this->load->view('header-nav-v2');
		$this->load->view('modals');
		$this->load->view('content', $this->articles->fetch_from_all(($page*10)-10));
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
			$this->load->view('upload_form');
			$this->load->view('footer');
		}
		else
			redirect(base_url());
	}

	public function upload(){
		$this->load->model('articles');
		$this->articles->upload();
		redirect(base_url("article/new"));
	}

	public function view($id){
		$this->load->model('articles');
		$data = $this->articles->fetch($id);
		$this->load->view('header-nav-v2');
		$this->load->view('modals');
		$this->load->view('overview',$data);
		$this->load->view('footer');
	}

	public function category($category, $page){
		$this->load->model('articles');
		$data = $this->articles->fetch_from($category,($page*10)-10);
		$this->load->view('header-nav-v2');
		$this->load->view('content',$data);
		$this->load->view('footer');
	}

	public function load_comments(){

	}
}

?>