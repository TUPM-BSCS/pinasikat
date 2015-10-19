<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Articles extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function upload(){

		$this->db->where("username",$_SESSION['username']);
		$this->db->from("articles");
		$count = $this->db->count_all_results();

		$id = $_SESSION['username'].'-'.'article-'.$count;

		$data = array(

			'id' => $id,
			'name' => $_POST['art_name'],
			'addr' => $_POST['art_addr'],
			'desc' => $_POST['art_desc'],
			'username' => $_SESSION['username']

		);

		$this->db->insert("articles",$data);

		$i = 0;
		foreach ($_FILES['file']['error'] as $key => $error) {
			if($error == UPLOAD_ERR_OK){
				move_uploaded_file($_FILES["file"]["tmp_name"][$key], 'uploads/'.$id.'-'.$i.'.png');
				$i++;
			}
		}
	}

	function fetch_from_all($start, $end){
		$data = array( 
			'query' => $this->db->get("articles",$start,$end)
		);
		return $data;
	}
}

?>