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
			'username' => $_SESSION['username'],
			'category' => $_POST['category']
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
		$query = $this->db->where('approved',1)->get("articles",999999,$offset);
		$count = $query->num_rows();
		if($count % 10){
			$count = (($count - ($count % 10))/10) +1 ;
		}else{
			$count = $count / 10;
		}
		$data = array( 
			'query' => $this->db->where('approved',1)->get("articles",10,$offset),
			'count' => $count
		);
		return $data;
	}

	function fetch_all(){
		$data = array( 
			'query' => $this->db->get("articles")
		);
		return $data;
	}

	function fetch_from($category, $offset){
		$query = $this->db->where('category',$category)->where('approved',1)->get("articles",999999,$offset);
		$count = $query->num_rows();
		if($count % 10){
			$count = (($count - ($count % 10))/10) +1 ;
		}else{
			$count = $count / 10;
		}
		$data = array(
			'query' => $this->db->where('category',$category)->where('approved',1)->get("articles",10,$offset),
			'count' => $count
		);
		return $data;
	}

	function fetch($id){
		$data = array(
			'query' => $this->db->where('id',$id)->where('approved',1)->get('articles')
		);
		return $data;
	}

	function inspect($id){
		$data = array(
			'query' => $this->db->where('id',$id)->get('articles')
		);
		return $data;
	}

	function fetch_articles_of($username){
		$data = array(
			'approved' => $this->db->where('username',$username)->where('approved',1)->get('articles'),
			'pending' => $this->db->where('username',$username)->where('approved',0)->get('articles'),
			'rejected' => $this->db->where('username',$username)->where('approved',-1)->get('articles')
		);
		return $data;
	}

	function load_comments($art_id,$offset){
		return $this->db->where('art_id',$art_id)->order_by('date','DESC')->get('comments',10,$offset);
	}

	function count_comments($art_id,$offset){
		$query = $this->db->where('art_id',$art_id)->get('comments',999999999,$offset);
		return $query->num_rows();
	}

	function submit_comment(){
		if(isset($_POST['comment']) && strlen($_POST['comment']) >= 4){
			$data = array(
				'username' => $_SESSION['username'],
				'comment' => $_POST['comment'],
				'art_id' => $_POST['art_id']
			);
			$this->db->insert("comments",$data);
			return true;
		}
		else
			return false;
	}

	function has_commented(){
		$data = array(
			'username' => $_SESSION['username'],
			'art_id' => $_POST['art_id']
		);
		$query = $this->db->get_where("comments",$data);
		$count = $query->num_rows();
		if($count > 0)
			return true;
		else
			return false;
	}

	function approve($id){
		$this->db->where('id',$id);
		$this->db->update("articles",array( 'approved' => 1));
	}

	function reject($id){
		$this->db->where('id',$id);
		$this->db->update("articles",array( 'approved' => -1));
	}

	function hold($id){
		$this->db->where('id',$id);
		$this->db->update("articles",array( 'approved' => 0));
	}

	function adminsearch($item){
		$this->db->like('name',$item);
		$this->db->or_like('category',$item);
		$data = array(
			'query' => $this->db->get('articles')
		);
		return $data;
	}

	function usersearch($item){
		$this->db->like('name',$item);
		$this->db->or_like('category',$item);
		$this->db->where('approved',1);
		$query = $this->db->get('articles');
		$count = $query->num_rows();
		if($count % 10){
			$count = (($count - ($count % 10))/10) +1 ;
		}else{
			$count = $count / 10;
		}
		$data = array(
			'query' => $query,
			'count' => $count,

		);
		return $data;
	}
}

?>