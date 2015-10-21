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
		if($data['query']->row() !== null){
			$this->load->view('header-nav-v2');
			$this->load->view('modals');
			$this->load->view('overview',$data);
			$this->load->view('footer');
		}
		else
			redirect(base_url());
	}

	public function inspect($id){
		if(isset($_SESSION['admin'])){
			$this->load->model('articles');
			$data = $this->articles->inspect($id);
			$this->load->view('header-nav-v2');
			$this->load->view('modals');
			$this->load->view('overview',$data);
			$this->load->view('footer');
		}else
			redirect(base_url());
	}

	public function category($category, $page){
		$this->load->model('articles');
		$data = $this->articles->fetch_from($category,($page*10)-10);
		$this->load->view('header-nav-v2');
		$this->load->view('content',$data);
		$this->load->view('footer');
	}

	public function count_comments(){
		$this->load->model('articles');
		$data = $this->articles->count_comments($_POST['art_id'],($_POST['offset']*10)-10);
		echo $data;
	}

	public function load_comments(){
		$this->load->model('articles');
		$query = $this->articles->load_comments($_POST['art_id'],($_POST['offset']*10)-10);
		$data = '';
		foreach ($query->result() as $row){
			$data = $data.  '<div class="row">
								<div class="col s12 m6 l6">
								  <div class="card-panel grey lighten-5 z-depth-1">
								    <div class="row valign-wrapper">
								      <div class="col s2">
								        <span>'.$row->username.':</span>
								      </div>
								      <div class="col s10">
								        <span class="black-text">'.$row->comment.'</span>
								      </div>
								    </div>
								  </div>
								</div>
							</div>';
		}
		echo $data;
	}

	public function submit_comment(){
		$this->load->model('articles');
		if($this->articles->submit_comment())
			echo $data = 1;
		else
			echo $data = 0;
	}

	public function has_commented(){
		$this->load->model('articles');
		if($this->articles->has_commented())
			echo $data = 1;
		else
			echo $data = 0;
	}

	public function admin(){
		if(!isset($_SESSION['admin'])){
			$this->load->view('adminlogin');
		}else {
			$this->load->model('articles');
			$data = $this->articles->fetch_all();
			$this->load->view('admin',$data);
		}
	}

	public function adminlogin(){
		if($_POST['admin-name'] == "admin" && $_POST['admin-password'] == "admin1234"){
			$_SESSION['admin'] = $_POST['admin-name'];
			redirect(base_url("admin"));
		}else
			redirect(base_url("admin"));
	}

	public function adminlogout(){
		unset($_SESSION['admin']);
		redirect(base_url("admin"));
	}

	public function approve($id){
		if(isset($_SESSION['admin'])){
			$this->load->model('articles');
			$this->articles->approve($id);
			redirect(base_url("admin"));
		}
		else{
			redirect(base_url());
		}
	}

	public function reject($id){
		if(isset($_SESSION['admin'])){
			$this->load->model('articles');
			$this->articles->reject($id);
			redirect(base_url("admin"));
		}
		else{
			redirect(base_url());
		}
	}

	public function hold($id){
		if(isset($_SESSION['admin'])){
			$this->load->model('articles');
			$this->articles->hold($id);
			redirect(base_url("admin"));
		}
		else{
			redirect(base_url());
		}
	}

	public function search(){
		$this->load->model('articles');
		if(isset($_SESSION['admin'])){
			$data = $this->articles->adminsearch($this->input->get('item'));
			$this->load->view('admin',$data);
		}else{
			$data = $this->articles->usersearch($this->input->get('item'));
			$this->load->view('header-nav-v2');
			$this->load->view('modals');
			$this->load->view('content', $data);
			$this->load->view('footer');
		}
	}

}

?>