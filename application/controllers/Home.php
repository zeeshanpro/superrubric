<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		 
    
    } 
	public function index()
	{
		$data =  array();
		
		$data['loginURL'] 	= $this->googleplus->loginURL(); 
		$data['header'] 	= $this->load->view('inc/header',$data,true);
		$data['footer'] 	= $this->load->view('inc/footer',$data,true);
		
		$this->load->view('home',$data);
	} 
	
	public function login()
	{
		$data =  array();
		$data['loginURL'] 	= $this->googleplus->loginURL(); 
		$data['header'] 	= $this->load->view('inc/header',$data,true);
		$data['footer'] 	= $this->load->view('inc/footer',$data,true);
		$data['type'] 		= "login";
		
		$this->load->view('home',$data);
	}
}
