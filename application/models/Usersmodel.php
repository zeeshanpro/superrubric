<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usersmodel extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
	}
	 
	public function saveUserDetails($data){
		 			
		$user['name'] 			= $data['user_name'];
		$user['user_email'] 	= $data['user_email'];
		if(isset($data['school_id'])){
			$user['school_id'] 	= $data['school_id'];
		}
		$user['user_password'] 	= MD5($data['user_cnfpassword']);
		$user['is_active'] 		= 1;
		$user['is_deleted'] 	= 0;
		$user['user_type'] 		= $data['user_type'];
		$user['expiry_date'] 	= $data['expiry_date'];
		$user['created_on'] 	= date('Y-m-d H:i:s');

		$this->db->insert('users',$user);

		return $this->db->insert_id();
			
	}
	
	public function getUserDetailsById($id){
	
		$query	=	$this->db->query('SELECT * FROM rb_users where user_id = '.$id.' AND is_active = 1 AND is_deleted = 0');
		 
		return $query->row_array();
			
	}
	
	public function checkGoogleUser($data){
		
		$whereArray['user_email'] = $data['email'];
		$whereArray['is_deleted'] = 0;
		 
		$this->db->where($whereArray);
		$this->db->from('users');
		$query	= $this->db->get();
		
		if($query->num_rows() > 0){
			
			$setArray['google_auth_id'] = $data['id'];
			 
			
			$this->db->where($whereArray);
			$this->db->set($setArray);
			$this->db->update('users');
			$user_id	=	$query->row_array()['user_id'];
			$user_type  = $query->row_array()['user_type'];
			$result['user_type'] =  $user_type;
			$result['user_id'] =  $user_id; 
			$result['new_user'] = 1;
			$result['is_active'] = $query->row_array()['is_active'];
			if($query->row_array()['user_type'] == 1)
				$result['expiry_date'] = $query->row_array()['expiry_date'];
		}
		else
		{
			
			$user['user_email'] 	= $data['email'];
			$user['user_password'] 	= "";
			$user['is_active'] 		= 1;
			$user['is_deleted'] 	= 0;
			$user['created_on'] 	= date('Y-m-d H:i:s');
			$user['expiry_date'] 	= date('Y-m-d', strtotime('+1 month', strtotime(date("Y-m-d"))));
			
			$this->db->insert('users',$user);
			$user_id	=	$this->db->insert_id();
			$result['user_id'] =  $user_id;
			$result['new_user'] = 0;
			$result['expiry_date'] = "";
			$result['is_active'] = 1;

 		}
		
		return $result;
		
	}
	
	public function checkUserExist($data){
		
		$this->db->where('user_email',$data['user_email']);
		$this->db->where('user_password',MD5($data['user_password']));
		//$this->db->where('is_active',1);
		//$this->db->where('expiry_date > ',date("Y-m-d"));
		$this->db->where('is_deleted',0);
		$this->db->from('users');
		
		$query= $this->db->get();
		if($query->num_rows() > 0){
			return $query->row_array();
		}else{
			return array();
        }
      }
      
    
    /****------ For admin -----------******/
      
    public function getallusers($start=0,$end=100){
			
			$total_query = $this->generalmodel->custom_query('SELECT count(*) as total FROM `rb_users` WHERE is_deleted = 0 ORDER BY `rb_users`.`created_on` DESC');
			
						
			$query = $this->generalmodel->custom_query('SELECT * FROM `rb_users` WHERE is_deleted = 0 ORDER BY `rb_users`.`created_on` DESC LIMIT '.$start.','.$end);
			
			return array('total_array' => $total_query[0]['total'], 'all_results' => $query);
			
	}
	
    public function getSingleUser($id){
	
		$quer = 'SELECT * FROM rb_users where user_id = '.$id;
		 
		$query=$this->db->query($quer);
	
		return $query->row_array();
			
	}
	
	public function editSingleUser($data, $id){
			
			$inst_data = array();
			 
			 
			if($data['user_password'] != ""){
				$inst_data['user_password'] 		= MD5($data['user_password']);
			}
			$inst_data['is_active'] 			= (int)$data['is_active'];
			$inst_data['expiry_date'] 			= date('Y-m-d', strtotime($data['expiry_date']));
			
			$this->db->update('users', $inst_data, array('user_id' => $id));
		
			return $id;
			
	}
	
	public function deleteSingleUser($id){
		
			$inst_data['is_deleted'] 		= 1;
			
			$this->db->update('users', $inst_data, array('user_id' => $id));
			
	}
	
	 
	public function updateExpiryDate(){
		$data['is_active'] = 2;
		$date = date("Y-m-d");
		$this->db->update('users', $data, array('expiry_date < ' => $date , 'user_type' => 1 ));
		return true;
	}
	
	 
	
	
}
