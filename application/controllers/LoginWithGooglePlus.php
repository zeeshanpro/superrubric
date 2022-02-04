<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginWithGooglePlus extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Usersmodel",'usersmdl');  
		$this->load->model("Generalmodel",'generalmodel'); 
	}
	
	public function index(){
		if(isset($_GET['code']))
		{
			$this->googleplus->getAuthenticate();
			$this->session->set_userdata('user_logged_in',true);
			$user_data = $this->googleplus->getUserInfo();
			 
			$user_id = $this->usersmdl->checkGoogleUser($user_data);
			
			$datauser = array(
				'user_id'			=> $user_id,		
				'user_email' 		=> $user_data['email'],
				'user_logged_in'  	=> true, 
				'google_login'		=> true,
					  
			 );
 
                 
			$this->session->set_userdata($datauser);
		 
			 redirect('/');
		}
		
		
	  
	}
	
	public function ajaxgoogleLogin(){
		
		// Get and decode the POST data
		$userData = json_decode($_POST['userData']);
		 
		if(!empty($userData)){
			// The user's profile info
			$oauth_provider = $_POST['oauth_provider'];
			$oauth_uid  = !empty($userData->id)?$userData->id:'';
			//$first_name = !empty($userData->given_name)?$userData->given_name:'';
			//$last_name  = !empty($userData->family_name)?$userData->family_name:'';
			$email      = !empty($userData->email)?$userData->email:'';
			//$gender     = !empty($userData->gender)?$userData->gender:'';
			//$locale     = !empty($userData->locale)?$userData->locale:'';
			//$picture    = !empty($userData->picture)?$userData->picture:'';
			//$link       = !empty($userData->link)?$userData->link:'';
			
			$user_data = array(
					'id' 	=>	$oauth_uid,
					'email' =>	$email,
				);
			
			 
			$result = $this->usersmdl->checkGoogleUser($user_data);
			
			if($result['user_type'] == 1)
			{
				if($result['expiry_date'] >= date("Y-m-d"))
				{
					if($result['is_active'] == 1)
					{
						$this->session->set_userdata('user_logged_in',true);
						$datauser = array(
							'user_id'			=> $result['user_id'],		
							'user_email' 		=> $user_data['email'],
							'user_type' 		=> (isset($result['user_type'])) ? $result['user_type'] : '',
							'google_login'		=> true, 
							'new_user'			=> $result['new_user']
								  
						 );
			 
							 
						$this->session->set_userdata($datauser);
						$datauser['error']	=	0;
						echo json_encode($datauser);
					}
					else
					{
						$errorarray['user_exist']	=	'Your Status is In-active. Please contact to admin';
						$errorarray['error']	=	1;
						echo json_encode($errorarray);	
					}
				}
				else
				{
					$errorarray['user_exist']	=	'Your FREE month access has expired. To continue, upgrade to a Premium Subscription. Your account will be updated within 24 hours of purchase.';
					$errorarray['error']	=	-1;
					echo json_encode($errorarray);
				}
			}
			else
			{
				if($result['is_active'] == 1)
				{
					$this->session->set_userdata('user_logged_in',true);
	
					$datauser = array(
						'user_id'			=> $result['user_id'],		
						'user_email' 		=> $user_data['email'],
						'user_type' 		=> (isset($result['user_type'])) ? $result['user_type'] : '',
						'google_login'		=> true, 
						'new_user'			=> $result['new_user']
							  
					 );
		 
						 
					$this->session->set_userdata($datauser);
					$datauser['error']	=	0;
					echo json_encode($datauser);
				}
				else
				{
					$errorarray['user_exist']	=	'Your Status is In-active. Please contact to admin';
					$errorarray['error']	=	1;
					echo json_encode($errorarray);
				}
			}

		}
			
	}
	
	public function updateUserType(){
		// Get and decode the POST data
		$userType = $_POST['user_type'];
		$user_id = $_POST['user_id'];
		$this->generalmodel->update('users',['user_type' => $userType],['user_id' => $user_id]);
		$datauser = array(
				'user_type' => $userType,
			 );
 
                 
		$this->session->set_userdata($datauser);
		echo json_encode($this->session->userdata());
	}
	 
}//class ends here
