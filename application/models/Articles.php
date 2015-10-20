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

		$this->db->where('id',$id)->set('photos',$i)->insert('articles');
	}

	function fetch_from_all($offset){
		$data = array( 
			'query' => $this->db->get("articles",$offset,10)
		);
		return $data;
	}

	function fetch_from($category, $offset){
		$data = array(
			'query' => $this->db->where('category',$category)->get("articles",$offset)
		);
		return $data;
	}

	function fetch($id){
		$data = array(
			'query' => $this->db->where('id',$id)->get('articles')
		);
		return $data;
	}
}

?>