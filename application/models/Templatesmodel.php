<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Templatesmodel extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
	}
	
	 
	
	public function getalltemplates(){
		 			
			$query = $this->generalmodel->custom_query('SELECT * FROM `rb_templates` WHERE is_deleted = 0 AND template_status = 1 ORDER BY `template_id` ASC ');
			
			return $query;
			
	}
	
	public function getSingleTemplate($id){
	
		$quer = 'SELECT * FROM rb_templates where template_id = '.$id;
		 
		$query=$this->db->query($quer);
	
		return $query->row_array();
			
	}
	
	public function addSingleTemplate($data){
			
			$inst_data = array();
			 
			$template_thumb = '';
			if(isset($_FILES['template_thumb']['name']))
			{
				$name  		= $_FILES['template_thumb']['name'];  
				$temp_name  = $_FILES['template_thumb']['tmp_name'];  
			  
				 
				 $location = './upload/';
				 $filename = date('d_h_i_s').$name;
				
				if(move_uploaded_file($temp_name, $location.$filename)){
					$template_thumb = $filename; 
				} 
			}
			
			
			$inst_data['template_title'] 		= (string)$data['template_title'];
			$inst_data['template_description'] 	= (string)$data['template_description'];
			$inst_data['template_thumb'] 		= (string)$template_thumb;
			$inst_data['template_status'] 		= (int)$data['template_status'];
			$inst_data['is_deleted'] 			= 0;
			$inst_data['created_on'] 			= date('Y-m-d H:i:s');
			$inst_data['updated_on'] 			= date('Y-m-d H:i:s');
			
			$this->db->insert('templates',$inst_data);
		
			return $this->db->insert_id();
	}
	
	public function editSingleTemplate($data, $id){
			
			$inst_data = array();
			 
			$template_thumb = '';
			
			if(isset($_FILES['template_thumb']['name']) && !empty($_FILES['template_thumb']['name']))
			{
				$name  		= $_FILES['template_thumb']['name'];  
				$temp_name  = $_FILES['template_thumb']['tmp_name'];  
			  
				 
				 $location = './upload/';
				 $filename = date('d_h_i_s').$name;
				
				if(move_uploaded_file($temp_name, $location.$filename)){
					$template_thumb = $filename;
					unlink('./upload/'.$data['hd_template_thumb']); 
				} 
			}
			else
			{
				$template_thumb = $data['hd_template_thumb'];
			}
			
			$inst_data['template_title'] 		= (string)$data['template_title'];
			$inst_data['template_description'] 	= (string)$data['template_description'];
			$inst_data['template_thumb'] 		= (string)$template_thumb;
			$inst_data['template_status'] 		= (int)$data['template_status'];
			$inst_data['updated_on'] 			= date('Y-m-d H:i:s');
			
			$this->db->update('templates',$inst_data,array('template_id' => $id));
		
			return $id;
			
	}
	
	public function deleteSingleTemplate($id){
		
			$inst_data['is_deleted'] 		= 1;
			$inst_data['updated_on'] 		= date('Y-m-d H:i:s');
			
			$this->db->update('templates', $inst_data, array('template_id' => $id));
			
	}
	
	
	
}
