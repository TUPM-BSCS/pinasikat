<?php

class Pinasaya extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('content');
	}

	public function login(){
	}

	public function register(){
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