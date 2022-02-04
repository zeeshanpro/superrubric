<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Templates extends CI_Controller {   // USER CONTROLLER TO MANAGE USER
 
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin');
        }
		 
		$this->load->library('pagination'); 
		$this->load->library('form_validation');
		$this->load->model("rbadmin/Templatesmodel",'tempmdl');  
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
		
		$config['per_page'] 	= 50;
		$config['uri_segment'] 	= 4;
		$config['base_url'] 	= base_url("admin/templates");
		
		if ($this->uri->segment(4) != '')
		{
			$limit = $this->uri->segment(4);
		} 
		
		$records = $this->tempmdl->getalltemplates($limit,$config['per_page']);   //FUNCTION TO GET ALL POSTS
		
		$data['posts'] = array();
	 
		if(count($records['all_results'])>0)
		{
			foreach($records['all_results'] as $record)
			{
				$data['posts'][] = array(
					'template_id'  					=> 	$record['template_id'],
					'template_title'  				=> 	$record['template_title'],
					'template_thumb'  				=> 	$record['template_thumb'],
					'template_status'  				=> 	$record['template_status'],
					'created_on'  					=> 	$record['created_on'],
					'updated_on'  					=> 	date('d-m-Y', strtotime($record['updated_on'])),
					 
					
				);
			}
		}
		
		$config['total_rows'] 	= $records['total_array'];
		
		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		
        $data['page'] = 'Templates';
       
        $data['i'] = $limit+1;
        
        $data['count_start'] = $limit;
        
        $data['pagetitle'] = "ALL TEMPLATES";
		$data['header'] = $this->load->view('rbadmin/inc/header',$data,true);
		$data['footer'] = $this->load->view('rbadmin/inc/footer',$data,true);   
       
        $this->load->view('rbadmin/alltemplates',$data);
    }
    
    //----------EDIT OR VIEW USER--------------------
    
    public function addtemplate(){
		
		$data = array();
		
		if($this->input->post()){
			
			$editId = $this->tempmdl->addSingleTemplate($this->input->post());
			$this->session->set_flashdata('sucess_message', 'Template is added.');
			redirect('rbadmin/templates/edittemplate/'.$editId);
		}
		$data['pagetitle'] 	= "Add TEMPLATES";
		$data['formaction'] = base_url('rbadmin/templates/addtemplate');
		$this->viewForm($data);
	}
	public function edittemplate(){
		
		$data = array();
		$editId = $this->uri->segment(4, 0); // return the number zero in the event of failure
		 
		if($this->input->post()){
			
			$this->tempmdl->editSingleTemplate($this->input->post(),$editId);
			$this->session->set_flashdata('sucess_message', 'Template is Updted.');
			redirect('rbadmin/templates/edittemplate/'.$editId);
		}
		
		$data['pagetitle'] 	= "Add TEMPLATES";
		$data['formaction'] = base_url('rbadmin/templates/edittemplate/'.$editId);
		
		$this->viewForm($data,$editId);
			
	}
	
	public function viewform($data, $editId = 0){
		
		
		
		$templateinfo = array();
		
		if($editId != 0){
			
			$templateinfo = $this->tempmdl->getSingleTemplate($editId);
		}
		 
		
		if($this->input->post('template_title')){
			$data['template_title'] = $this->input->post('template_title');
		}
		else if(isset($templateinfo['template_title']))
		{
			$data['template_title'] = $templateinfo['template_title'];
		}
		else
		{
			$data['template_title'] = "";
		}
		
		if($this->input->post('template_description')){
			$data['template_description'] = $this->input->post('template_description');
		}
		else if(isset($templateinfo['template_description']))
		{
			$data['template_description'] = $templateinfo['template_description'];
		}
		else
		{
			$data['template_description'] = "";
		}
		
		if($this->input->post('template_thumb')){
			$data['template_thumb'] = $this->input->post('template_thumb');
		}
		else if(isset($templateinfo['template_thumb']))
		{
			$data['template_thumb'] = $templateinfo['template_thumb'];
		}
		else
		{
			$data['template_thumb'] = "";
		}
		
		if($this->input->post('template_status')){
			$data['template_status'] = $this->input->post('template_status');
		}
		else if(isset($templateinfo['template_status']))
		{
			$data['template_status'] = $templateinfo['template_status'];
		}
		else
		{
			$data['template_status'] = "";
		}
		
		
			
			
		$data['header'] = $this->load->view('rbadmin/inc/header',$data,true);
		$data['footer'] = $this->load->view('rbadmin/inc/footer',$data,true); 
		
		//~ echo "<pre>";
		//~ print_r($data);
		//~ echo "</pre>";
		//~ die;
		$this->load->view('rbadmin/addtemplate',$data);
	}
	
	public function deletetemplate(){
	
		if($this->uri->segment(4))
		{
			$this->tempmdl->deleteSingleTemplate($this->uri->segment(4));
			$this->session->set_flashdata('sucess_message', 'Template is deleted.');
		}
		redirect('rbadmin/templates');
			
	}
	
	
	
	
     
}

/* End of file */
/* Location: ./application/controllers/rbadmin*/
