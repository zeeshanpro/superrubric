<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Schools extends CI_Controller {   // USER CONTROLLER TO MANAGE USER
 
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin');
        }
		$this->load->model("Generalmodel",'generalmodel'); 

    }

   public function index() {
		$data['pagetitle'] = "ALL SCHOOLS";
		$data['header'] = $this->load->view('rbadmin/inc/header',$data,true);
		$data['footer'] = $this->load->view('rbadmin/inc/footer',$data,true);   
       
		$data['schools'] = $this->generalmodel->get('schools');
        $this->load->view('rbadmin/allschools',$data);
   }
   
   public function addSchool() {
		$data['pagetitle'] = "Add SCHOOLS";
		$data['formaction'] = base_url('rbadmin/schools/addSchool');
		  
		
		if($this->input->post()){
			$postData = $this->input->post();
			
			$domain_name = substr(strrchr($postData['email'], "@"), 1);
			$domain_name = explode(".",$domain_name);
			$postData['domain_name'] =  $domain_name[0];	
			$this->generalmodel->add('schools',$postData);
			$this->session->set_flashdata('sucess_message', 'School is added.');
			redirect('rbadmin/schools/');
		}
		
		$data['header'] = $this->load->view('rbadmin/inc/header',$data,true);
		$data['footer'] = $this->load->view('rbadmin/inc/footer',$data,true); 
        $this->load->view('rbadmin/addschool',$data);
   }
   
    public function editSchool($id) {
		$data['pagetitle'] = "Edit SCHOOL";
		$data['formaction'] = base_url('rbadmin/schools/editSchool');
		  
		
		if($this->input->post()){
			$postData = $this->input->post();
			print_R($postData);die;
		}
		$school = $this->generalmodel->get_by_condition('schools',['id' => $id]);
		$data['school'] = $school[0];
		$data['posts'] = $this->generalmodel->get_by_condition('users',['school_id' => $school[0]['id']]);
		$data['header'] = $this->load->view('rbadmin/inc/header',$data,true);
		$data['footer'] = $this->load->view('rbadmin/inc/footer',$data,true); 
        $this->load->view('rbadmin/editschool',$data);
   }
   
   public function deleteSchool($id) {
	   if($id)
		{
			$this->generalmodel->delete('schools',['id' => $id]);
			$this->session->set_flashdata('sucess_message', 'School is deleted.');
		}
		redirect('rbadmin/schools');
   }
}