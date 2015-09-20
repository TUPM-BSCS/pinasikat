<?php

class Pinasaya extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('prereq');
		if(isset($_SESSION['data']))
			$this->load->view('header-nav');
		else
			$this->load->view('header-nav');
		$this->load->view('parallax');
		$this->load->view('footer');

	}

	public function test(){
		$this->load->view('prereq');
		$this->load->view('test');
	}

	public function logout(){
		if(isset($_SESSION['username'])){
			session_destroy();
			redirect(base_url());	
		}
	}

	public function signin(){
		$this->load->model('account');
		if($this->account->signin()){
			//load view with profile enabled
			$_SESSION['msg'] = 'Welcome '.$_SESSION['username'].'!';
			$_SESSION['notified'] = FALSE;
			redirect(base_url());
		}else{
			//show error message and redirect
			$_SESSION['msg'] = 'Username or password is invalid!';
			$_SESSION['notified'] = FALSE;
			redirect(base_url());
		}
	}

	public function create(){
		$this->load->view('upload_form');
	}

	public function signup(){
		$this->load->model('account');
		if($this->account->signup()){
			//load view welcome
			$_SESSION['msg'] = 'Sign-up was successful! You may now sign-in.';
			$_SESSION['notified'] = FALSE;
			redirect(base_url());
		}else{
			//load view error message and redirect
			$_SESSION['msg'] = 'The username is already taken. Please try again.';
			$_SESSION['notified'] = FALSE;
			redirect(base_url());
		}
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