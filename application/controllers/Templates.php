<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MY_Controller {

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
		
		$this->load->model("Templatesmodel",'tempmdl');  
		
    
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
	
	public function createtemplate(){
			
		$data =  array();
		
		$data['loginURL'] = $this->googleplus->loginURL();
		$data['header'] = $this->load->view('inc/header',$data,true);
		$data['footer'] = $this->load->view('inc/footer',$data,true);
		
		if($this->uri->segment(3) && $this->uri->segment(3) != 0){
			$data['template'] 		= $this->tempmdl->getSingleTemplate($this->uri->segment(3)); 
			$data['template_id'] 	= $this->uri->segment(3); 
			$data['left_top'] 		= $this->load->view('inc/left-top',$data,true);
			$data['right_top'] 		= $this->load->view('inc/right-top',$data,true);
			$data['download_btn'] 	= $this->load->view('inc/download_btn',$data,true);
			$data['finalcomment'] 	= $this->load->view('inc/finalcomment',$data,true);
			
		
			$this->load->view('template-'.$this->uri->segment(3),$data);
		}
		else
		{
			$data['template'] = $this->tempmdl->getAllTemplates();
			$this->load->view('templates',$data); 
		}
			
	}
	
	public function uploadfile(){
	    
    	    if(isset($_FILES['file']['name'])){
    
               /* Getting file name */
               $filename = $_FILES['file']['name'];
            
               /* Location */
               $location = "upload/template/".$filename;
               $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
               $imageFileType = strtolower($imageFileType);
            
               /* Valid extensions */
               $valid_extensions = array("jpg","jpeg","png");
                
            
               $response = 0;
               /* Check file extension */
               if(in_array(strtolower($imageFileType), $valid_extensions)) {
                  /* Upload file */
                  if($_FILES['file']['size'] <= 5242880) {
						
					  if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
						 $response = $location;
					  }
				  }
			   }
                
				if($response != 0)
				{
					echo base_url($response);
				}
				else
				{
					echo $response;
				}
				
               exit;
            }

	    
	}
	
	public function domconvertpdf($type){
		
		$this->load->library('pdf');
		if($this->input->post()){
			$data =  $this->input->post();
			$data['type'] = $type;
			$filename = str_replace(" ", '_',$this->input->post('txt_1'))."_".str_replace(" ", '_',$this->input->post('txt_2'));
			
			$data['bt_style'] = base_url('/assets/css/bootstrap.min.css');
			$data['url_style'] = base_url('/assets/css/style.css');
			
			if($this->input->post('hd_logoimgpath'))
			{
				$data['hd_logoimgpath']	=	$this->input->post('hd_logoimgpath');
			}
			else
			{
				$data['hd_logoimgpath']	=	base_url('assets/img/pdf-logo.jpg');
			}
			 
			//echo '<pre>'; print_r($data); die;
			$html = html_entity_decode($this->load->view('pdftemplate',$data,true));
			
			$html = preg_replace('/>\s+</', "><", $html);
			 
			if($type == 'pdf'){
			$this->pdf->create($html, $filename);
			}else{
		    $this->exportpng($html,$filename); 
		    }
		}
		
	
	}
	
	public function exportpng($html,$filename){
	    
		include APPPATH . 'third_party/pdfcrowd.php';
	    try {
            // create the API client instance
			//username: zeeshutech123 pass: Programmer@12 key: 43e72c6ab68a6ec66093894155e506a5
            $client = new \Pdfcrowd\HtmlToImageClient("superrubric", "ec6a1db5e9b34f866f43d763505ccb11");
    
            // configure the conversion
            $client->setOutputFormat("png");
            // run the conversion
            $image = $client->convertString($html);
    
            // set HTTP response headers
            header("Content-Type: image/png");
            header("Cache-Control: no-cache");
            header("Accept-Ranges: none");
            header("Content-Disposition: attachment; filename*=UTF-8''" . rawurlencode($filename.".png"));
    
            echo $image;
        }
        catch(\Pdfcrowd\Error $why) {
            // report the error
            header("Content-Type: text/plain");
            http_response_code($why->getCode());
            echo "Pdfcrowd Error: {$why}";
        }
	}
	
}
