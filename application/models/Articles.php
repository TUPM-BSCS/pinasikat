<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Articles extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function upload(){
		try{
		foreach ($_FILES["images"]["error"] as $key => $error) {
		    if ($error == UPLOAD_ERR_OK) {

		        $tmp_name = $_FILES["images"]["tmp_name"][$key];
		        $name = $_FILES["images"]["name"][$key];
		        $size = $_FILES["images"]["size"][$key];
		        $type = $_FILES["images"]["type"][$key];

		    	$fp = fopen($tmp_name, 'r');

		    	$content = fread($fp, filesize($tmp_name));
				$content = addslashes($content);
				fclose($fp);

				if(!get_magic_quotes_gpc()){
					$name = addslashes($name);
				}

		        $data = array(
					'name' => $name,
					'type' => $type,
					'size' => $size,
					'content' => $content
				);

		        $this->db->insert('images',$data);
		    }
		}

		return TRUE;
		}
		catch(Exception $ex){
			return FALSE;
		}
	}
}

?>