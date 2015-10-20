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
		$addr = $_POST['art_addr'].', '.$_POST['art_city'];

		$data = array(
			'id' => $id,
			'name' => $_POST['art_name'],
			'addr' => $addr,
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

		$data['photos'] = $i;

		$this->db->where('id',$id);
		$this->db->update('articles',$data);
	}

	function fetch_from_all($offset){
		$data = array( 
			'query' => $this->db->where('approved',1)->get("articles",$offset,10)
		);
		return $data;
	}

	function fetch_from($category, $offset){
		$data = array(
			'query' => $this->db->where('category',$category)->where('approved',1)->get("articles",$offset,10)
		);
		return $data;
	}

	function fetch($id){
		$data = array(
			'query' => $this->db->where('id',$id)->where('approved',1)->get('articles'),
		);
		return $data;
	}

	function load_comments($art_id){
		$data = array(
			//'comments' = $this->db->where('art_id',$art_id)->
		);
	}
}

?>