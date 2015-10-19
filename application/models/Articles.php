<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Articles extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function upload(){

		$data = array(

			'name' => $_POST['art_name'],
			'addr' => $_POST['art_addr'],
			'desc' => $_POST['art_desc'],
			'username' => $_SESSION['username'],
			'path' => $_SESSION['path']

		);

		$this->db->insert("articles",$data);
		unset($_POST);
		unset($_SESSION['path']);
	}

	function dzupload(){

		if(!isset($_SESSION['path'])){
			$this->db->where("username",$_SESSION['username']);
			$this->db->from("articles");
			$count = $this->db->count_all_results() + 1;

			$_SESSION['path'] = 'users/'.$_SESSION['username'].'/article'.$count;
		}

		mkdir($_SESSION['path']);			

		foreach ($_FILES['images']['error'] as $key => $error) {
			if($error == UPLOAD_ERR_OK){
				move_uploaded_file($_FILES["images"]["tmp_name"][$key], $_SESSION['path'].'/'.$_FILES['images']['name'][$key]);
			}
		}
		
	}
}

?>