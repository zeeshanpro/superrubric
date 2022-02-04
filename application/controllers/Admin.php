<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
		parent::__construct();     
    
    }

    public function index() {
       
        $data["errors"]	=	array();
	 		
		if($this->session->userdata('admin_userrole') != FALSE && $this->session->userdata('admin_userrole') == 1)
		{	
			$data['pagetitle'] 			= "Dashboard";
			 
			$data['header'] = $this->load->view('rbadmin/inc/header',$data,true);
			$data['footer'] = $this->load->view('rbadmin/inc/footer',$data,true);			
			$this->load->view('rbadmin/dashboard',$data);
		}
		else
		{
			$this->load->view('rbadmin/login',$data);
		}
	}
	
	//...........................Login.................
	
	public function login()
	{
		$data 		= array();
		$errorinfo = array();
		
		
		$username =  $this->input->post('username');
		$password =  $this->input->post('password');
		
			
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        $errorinfo['username'] = "";
		$errorinfo['password'] = "";
		$errorinfo['error']		= "";
		
		if ($this->form_validation->run() == FALSE) 
		{
			$errorinfo['username'] = form_error('username');
			$errorinfo['password'] = form_error('password');
			
			$this->load->view('rbadmin/login',$errorinfo);
			
        }
		else
		{
				$role = array(1);
				$vals = $this->common->adminlogin($username,$password,$role);
				
                if($vals==true)
                {
                   redirect('admin/'); 
                }
                else 
                {
                    $errorinfo['error'] = '<strong>Access Denied</strong> Invalid Username/Password';
					
					$this->load->view('rbadmin/login', $errorinfo);  
                }
		}

	}
	
	//...........................Logout.................
	
	public function logout() 
	{
			$this->session->unset_userdata('admin_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('is_admin_login');   
			$this->session->sess_destroy();

			redirect('admin/', 'refresh');
    }	
    

	public function changepassword()
	{
		$data['pagetitle'] 		= "Change Password";
	 
		$data['header'] 			= $this->load->view('rbadmin/inc/header',$data,true);
	 
		$data['footer'] 			= $this->load->view('rbadmin/inc/footer',$data,true);   
	 
		
		$this->load->view('rbadmin/changepassword',$data);
	}
	
	public function updatepassword()
	{
		$user_id		=  $this->session->userdata('admin_id');
		$password 		=  $this->input->post('newpassword');
		$confpassword 	=  $this->input->post('confpassword');
		
		if($password != $confpassword)
		{
			$this->session->set_flashdata('success','Password not matched!');
			redirect('rbadmin/admin/changepassword');
		}
		else
		{
			$data= array('admin_password' => MD5($password));			
	
			$this->db->where('admin_id',$user_id);				

			$this->db->update('admin',$data);
			
			$this->session->unset_userdata('admin_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('is_admin_login');   
			$this->session->sess_destroy();
			$this->session->set_flashdata('success','Password changed successfully!');
			redirect('admin/', 'refresh');
		}
		
	}
}
