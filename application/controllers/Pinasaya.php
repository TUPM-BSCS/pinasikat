<?php

class Pinasaya extends CI_Controller{

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
		$this->load->model('account');
		if($this->account->login()){
			$_SESSION['msg'] = 'Welcome '.$_SESSION['username'].'!';
			$_SESSION['notified'] = FALSE;
			echo $result = 1;
		}else{
			echo $result = 0;
		}
	}

	public function registration(){
		if(!isset($_SESSION['username'])){
			$this->load->view('header-nav-v2');
			$this->load->view('register');
			$this->load->view('modals');
			$this->load->view('scripts');
		}else
			redirect(base_url());
	}

	public function register(){
		$this->load->model('account');
		if($this->account->register()){
			$_SESSION['notified'] = FALSE;
			redirect(base_url());
		}else{
			$_SESSION['notified'] = FALSE;
			redirect(base_url());
		}
	}

	public function profile($username){
		$this->load->view('header-nav-v2');
		$this->load->view('profile');
		$this->load->view('modals');
		$this->load->view('scripts');
	}
	
	public function upload(){
		$upload_path = './uploads/'.$this->session->username.'/';

		mkdir($upload_path);

		$config['upload_path']          = $upload_path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload_form', $error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                $this->load->view('upload_success', $data);
        }
	}
}

?>