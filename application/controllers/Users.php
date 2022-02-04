<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		
		$this->load->model("Usersmodel",'usersmdl');  
		$this->load->model("Generalmodel",'generalmodel'); 

		
    
    }
	public function index()
	{
		$data =  array();
		
		$data['template'] = $this->tempmdl->getAllTemplates(); 
		 
		$data['loginURL'] = $this->googleplus->loginURL();
		$data['header'] = $this->load->view('inc/header',$data,true);
		$data['footer'] = $this->load->view('inc/footer',$data,true);
		
		$this->load->view('templates',$data);
	}
	
	public function signup(){
		
		if($this->input->post()){
			
			$this->form_validation->set_rules('user_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email|is_unique[users.user_email]');
			$this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('user_cnfpassword', 'Password Confirmation', 'trim|required|matches[user_password]');
			$this->form_validation->set_rules('user_type', 'Type', 'trim|required');
			
			$errorarray = array();
			
			if($this->form_validation->run()==false){
				
				
				$errorarray['name']	 	=	form_error('user_name');	
				$errorarray['email']	=	form_error('user_email');	
				$errorarray['password']	=	form_error('user_password');	
				$errorarray['passconf']	=	form_error('user_cnfpassword');	
				$errorarray['type']		=	form_error('user_type');	
				
			}
			 
			if(count($errorarray) == 0)
			{
				$post_data = $this->input->post();
				
				$domain_name = substr(strrchr($post_data['user_email'], "@"), 1);
				$domain_name = explode(".",$domain_name);
				$domain_name =  $domain_name[0];
					
				$school =  $this->generalmodel->get_by_condition('schools',['domain_name' => $domain_name]);
				if($school){
					// print_R($school[0]);
					$post_data['school_id'] 	= $school[0]['id'];
				}
				
				$post_data['expiry_date'] 	= date('Y-m-d', strtotime('+1 month', strtotime(date("Y-m-d"))));
				//die;
				//print_r($post_data);die;
				
				$user_id 	= $this->usersmdl->saveUserDetails($post_data);
				$res 		= $this->usersmdl->getUserDetailsById($user_id);
				
				$datauser = array(
							  'user_id' 		=> $res['user_id'],
							  'name' 			=> $res['name'],
							  'user_email' 		=> $res['user_email'],
							  'user_type'   	=> $res['user_type'],
							  'created_on'   	=> $res['created_on'],
							  'user_logged_in'  => true, 
							  'google_login'  	=> false, 
                     );
 
                 
				$this->session->set_userdata($datauser);
				
				$errorarray['success']	=	1;
			}
			else
			{
				$errorarray['success']	=	0;
			}
			
			echo json_encode($errorarray);
			
			
			
		}
		
		
	}
	
	public function userlogin(){

		if($this->input->post()){
			 
			$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('user_password', 'Password', 'trim|required');
			 
			
			$errorarray = array(); 
			
			if($this->form_validation->run() == false){
				
				$errorarray['email']	 	=	form_error('user_email');	
				$errorarray['password']	 	=	form_error('user_password');	
				
			}
			 
			
			if(count($errorarray) == 0)
			{
				 
				$userExist 	= $this->usersmdl->checkUserExist($this->input->post());
				
				if(count($userExist) > 0)
				{
					if($userExist['user_type'] == 1)
					{
						if($userExist['expiry_date'] > date("Y-m-d"))
						{
							if($userExist['is_active'] == 1)
							{
								$datauser = array(
								  'user_id' 		=> $userExist['user_id'],
								  'name' 			=> $userExist['name'],
								  'user_email' 		=> $userExist['user_email'],
								  'user_type'   	=> $userExist['user_type'],
								  'created_on'   	=> $userExist['created_on'],
								  'user_logged_in'  => true, 
								  'google_login'  	=> false, 
								);
				 
								$this->session->set_userdata($datauser);
								
								$errorarray['success']	=	1;
								$errorarray['stdlink'] = "";
							}
							else
							{
								$errorarray['user_exist']	=	'<p>Email and password does not exist.</p>';
								$errorarray['success']	=	0;
							}
						}
						else
						{
							$errorarray['user_exist']	=	'Your FREE month access has expired. To continue, upgrade to a Premium Subscription. Your account will be updated within 24 hours of purchase.';
							$errorarray['success']	=	-1;
						}
					}
					else
					{
						if($userExist['is_active'] == 1)
						{
							$datauser = array(
							  'user_id' 		=> $userExist['user_id'],
							  'name' 			=> $userExist['name'],
							  'user_email' 		=> $userExist['user_email'],
							  'user_type'   	=> $userExist['user_type'],
							  'created_on'   	=> $userExist['created_on'],
							  'user_logged_in'  => true, 
							  'google_login'  	=> false, 
							);
			 
							$this->session->set_userdata($datauser);
							
							$errorarray['success']	=	1;
							$errorarray['stdlink'] = base_url('gradebook/student-portal/').$userExist['user_id'];
						}
						else
						{
							$errorarray['user_exist']	=	'<p>Email and password does not exist.</p>';
							$errorarray['success']	=	0;
						}
					}
				}
				else
				{
					$errorarray['user_exist']	=	'<p>Email and password does not exist.</p>';
					$errorarray['success']	=	0;	
				}
			}
			else
			{
				
				$errorarray['success']	=	0;
			}
		}
		
		echo json_encode($errorarray);	 
		
	}
	
	public function userlogout() 
	{
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('name');
			$this->session->unset_userdata('user_email');
			$this->session->unset_userdata('user_type');
			$this->session->unset_userdata('user_logged_in'); 
			if($this->session->userdata('google_login')==true)
			{
				$this->session->unset_userdata('google_login'); 
			}  
			$this->session->sess_destroy();
		 	redirect('/');
            exit;
    }
	
	
	public function userheader(){
		$data = array();
		$data = $this->session->userdata();
		$data['html'] 			=	$this->load->view('inc/userheader',$data,true);
		$data['download_btn'] 	=	$this->load->view('inc/download_btn',$data,true);
		echo json_encode($data);	 
	}
	 
	public function checkLogin(){
		$data = $this->session->userdata();
		if ($this->session->userdata('user_logged_in')){
			echo 1;
			exit(1);
		}else{
			echo 0;
			exit(1);
		}
	} 
	
	public function checkExpiryDate()
	{
		return $this->usersmdl->updateExpiryDate();
	}
}
