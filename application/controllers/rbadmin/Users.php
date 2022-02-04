<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {   // USER CONTROLLER TO MANAGE USER
 
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin');
        }
		 
		$this->load->library('pagination'); 
		$this->load->library('form_validation');
		$this->load->model("Usersmodel",'usersmdl');  
    }

   public function index() {
	   
	   //......................................................
		$limit = 0;
		
		$config['full_tag_open'] 	= '<div class="text-center"><ul class="pagination">';
		$config['full_tag_close'] 	= '</ul></div>';
		$config['prev_link'] 		= '&lt;&lt; Previous';
		$config['prev_tag_open'] 	= '<li class="previous page-item">';
		$config['prev_tag_close']	= '</li>';
		$config['next_link'] 		= 'Next &gt;&gt;';
		$config['next_tag_open'] 	= '<li class="next page-item">';
		$config['next_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="page-item active"><a href="javascript:;" class="page-link">';
		$config['cur_tag_close'] 	= '</a></li>';
		$config['num_tag_open'] 	= '<li class="page-item">';
		$config['num_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last &gt;';
		$config['last_tag_open'] 	= '<li class="next page-item">';
		$config['last_tag_close'] 	= '</li>';
		$config['first_link'] 		= '&lt; First';
		$config['first_tag_open'] 	= '<li class="previous page-item">';
		$config['first_tag_close'] 	= '</li>';
		$config['attributes'] 		= array('class' => 'page-link');
		
		$config['per_page'] 	= 100;
		$config['uri_segment'] 	= 4;
		$config['base_url'] 	= base_url("rbadmin/users/index/");
		
		if ($this->uri->segment(4) != '')
		{
			$limit = $this->uri->segment(4);
		} 
		
		$records = $this->usersmdl->getallusers($limit,$config['per_page']);   //FUNCTION TO GET ALL POSTS
		
		$data['posts'] = array();
	 
		if(count($records['all_results'])>0)
		{
			foreach($records['all_results'] as $record)
			{
				$is_google_user	= false;
				if($record['google_auth_id'] != ""){
					$is_google_user	= true;
				}
				
				$data['posts'][] = array(
					'user_id'  						=> 	$record['user_id'],
					'user_email'  				=> 	$record['user_email'],
					'is_active'  					=> 	$record['is_active'],
					'is_google_user'  				=> 	$is_google_user,
					'created_on'  					=> 	date('d-m-Y', strtotime($record['created_on'])),
					'expiry_date'  					=> 	date('d-m-Y', strtotime($record['expiry_date'])),
					 
					
				);
			}
		}
		
		$config['total_rows'] 	= $records['total_array'];
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		
        $data['page'] = 'Users';
       
        $data['i'] = $limit+1;
        
        $data['count_start'] = $limit;
        
        $data['pagetitle'] = "ALL USERS";
		$data['header'] = $this->load->view('rbadmin/inc/header',$data,true);
		$data['footer'] = $this->load->view('rbadmin/inc/footer',$data,true);   
       
        $this->load->view('rbadmin/allusers',$data);
    } 
    
    //----------EDIT OR VIEW USER--------------------
    
     
	public function edituser(){
		
		$data = array();
		$errorarray = array();
		$editId = $this->uri->segment(4, 0); // return the number zero in the event of failure
		
		$data['password_error']	 	=	"";
		$data['passconf_error']	 	=	"";
		 
		if($this->input->post()){
			
			if($this->input->post('user_password') != "" || $this->input->post('user_cnfpassword') != "" ):
			
				$this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('user_cnfpassword', 'Password Confirmation', 'trim|required|matches[user_password]');
			
			
			 
				if($this->form_validation->run()==false):
					
					$errorarray['password_error']	 	=	form_error('user_password');	
					$errorarray['passconf_error']	 	=	form_error('user_cnfpassword');	
					
					$data['password_error']	 	=	form_error('user_password');
					$data['passconf_error']	 	=	form_error('user_cnfpassword');
				 
				endif;
				
			endif;
		 
		 
			 
			if(count($errorarray) == 0)
			{
				$this->usersmdl->editSingleUser($this->input->post(),$editId);
				$this->session->set_flashdata('sucess_message', 'User is Updted.');
				redirect('rbadmin/users/edituser/'.$editId);
			}
		}
		 
		$data['pagetitle'] 	= "Edit User";
		$data['formaction'] = base_url('rbadmin/users/edituser/'.$editId);
		
		$this->viewForm($data,$editId);
			
	}
	
	public function viewform($data, $editId = 0){
		 
		
		$templateinfo = array();
		
		if($editId != 0){
			$templateinfo = $this->usersmdl->getSingleUser($editId);
		}
		 
		if($this->input->post('is_active')){
			$data['is_active'] = $this->input->post('is_active');
		}
		else if(isset($templateinfo['is_active']))
		{
			$data['is_active'] = $templateinfo['is_active'];
		}
		else
		{
			$data['is_active'] = "";
		}
		
		$data['user_email'] = $templateinfo['user_email'];
		$data['expiry_date'] = $templateinfo['expiry_date'];
		 	
			
		$data['header'] = $this->load->view('rbadmin/inc/header',$data,true);
		$data['footer'] = $this->load->view('rbadmin/inc/footer',$data,true); 
		
		//~ echo "<pre>";
		//~ print_r($data);
		//~ echo "</pre>";
		//~ die;
		
		$this->load->view('rbadmin/edituser',$data);
	}
	
	public function deleteuser(){
	
		if($this->uri->segment(4))
		{
			$this->usersmdl->deleteSingleUser($this->uri->segment(4));
			$this->session->set_flashdata('sucess_message', 'User is deleted.');
		}
		redirect('rbadmin/users');
			
	}
	
	
	
	
     
}

/* End of file */
/* Location: ./application/controllers/rbadmin*/
