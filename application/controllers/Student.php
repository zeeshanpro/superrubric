<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {

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
		
		if (!$this->session->userdata('user_logged_in')){
			redirect('/gradebook');
		}
		
		$this->load->model("Generalmodel",'generalmodel');  
    }
	
	public function studentSuccessPortal($student_id = false,$class_id = false)
	{
		
		$data =  array();
		$strengths = [];
		$areas_growth = [];
		
		if(empty($student_id))
			$student_id = $this->session->userdata('user_id');
	
										$this->db->join('gradebook_class','gradebook_class.id = gradebook.class_id');
		$getAllClassDataByStudentID = 	$this->generalmodel->get_by_condition_field('gradebook',['student_id' => $student_id],'gradebook_class.id,gradebook_class.class_name,','id','ASC','class_id');
		
		if(empty($class_id))
			$class_id = (!empty($getAllClassDataByStudentID) && isset($getAllClassDataByStudentID[0]['id'])) ? $getAllClassDataByStudentID[0]['id'] : false;
			
		$this->db->join('gradebook_class','gradebook_class.id = gradebook.class_id');
		$this->db->join('rb_rubric_categories','rb_rubric_categories.id = gradebook.rubric_cat_id');
		$student_classes = $this->generalmodel->get_by_condition_field('gradebook',['class_id' => $class_id,'student_id' => $student_id],'gradebook_class.id as class_id,class_name,class_detail,overall_score,gradebook.rubric_cat_id,rb_rubric_categories.name as cat_name');
		
		$result = $this->generalmodel->get_by_condition('gradebook',['class_id' => $class_id, 'student_id' => $student_id]);
		$student_data = $this->generalmodel->get_by_condition('users',['user_id' => $student_id]);
		
							$this->db->join('rb_rubric_categories','rb_rubric_categories.id = grading_scheme.rubric_cat_id');
		$data['gradings'] = $this->generalmodel->get_by_condition_field('grading_scheme',['gradebook_id' => $class_id],'*','grading_scheme.id','ASC');
		
		if($result){
			$result = $result[0];
			if($result['book_summary_below_perc'] > 0 ){
				$strengths[] = ['name' => 'Book Summary' , 'val' => $result['book_summary_below_perc']];
			}else{
				$areas_growth[] = ['name' => 'Book Summary' , 'val' => $result['book_summary_below_perc']];
			}
			if($result['book_assessment_text_perc'] > 0 ){
				$strengths[] = ['name' => 'Assessment of Text' , 'val' => $result['book_assessment_text_perc']];
			}else{
				$areas_growth[] = ['name' => 'Assessment of Text' , 'val' => $result['book_assessment_text_perc']];
			}
			if($result['book_presentation_idea_perc'] > 0 ){
				$strengths[] = ['name' => 'Presenation of Ideas' , 'val' => $result['book_presentation_idea_perc']];
			}else{
				$areas_growth[] = ['name' => 'Presenation of Ideas' , 'val' => $result['book_presentation_idea_perc']];
			}
			if($result['book_langual_conversation_perc'] > 0 ){
				$strengths[] = ['name' => 'Language and Conventions' , 'val' => $result['book_langual_conversation_perc']];
			}else{
				$areas_growth[] = ['name' => 'Language and Conventions' , 'val' => $result['book_langual_conversation_perc']];
			}
			if($result['book_word_choice_perc'] > 0 ){
				$strengths[] = ['name' => 'Word Choice' , 'val' => $result['book_word_choice_perc']];
			}else{
				$areas_growth[] = ['name' => 'Word Choice' , 'val' => $result['book_word_choice_perc']];
			}
		}
		// echo '<pre>';
		// print_r($strengths);
		// foreach($strengths as $key){
			// print_R($key['name']) .'<br>';
		// }
		// die;
		
		$student_attachments = array();
		$student_classes_attachments = $this->generalmodel->get_by_condition_field('rb_attachemts',['class_id' => $class_id,'student_id' => $student_id],'rb_attachemts.*');
		if(!empty($student_classes_attachments))
		{
			for($i=0;$i<count($student_classes_attachments);$i++)
			{
				$student_attachments[$student_classes_attachments[$i]['rubric_cat_id']][] = $student_classes_attachments[$i];
			}
		}
		
		$data['grades'] = $result;
		$data['strengths'] = $strengths;
		$data['areas_growth'] = $areas_growth;
		$data['student_attachments'] = $student_attachments;
		$data['classes'] = $student_classes;
		$data['student_data'] = $student_data;
		$data['class_id'] = $class_id;
		$data['student_id'] = $student_id;
		$data['studentClasses'] = $getAllClassDataByStudentID;		
		$data['header'] = $this->load->view('inc/header',$data,true);
		$data['footer'] = $this->load->view('inc/footer',$data,true);		
		$this->load->view('gradebook/student_sucess_portal',$data);
	}
	
	public function GetStrengthsAndGrowth($para)
	{
		$output 		= array();
		$strengths 		= array();
		$areas_growth 	= array();
		
		$class_id 		= (!empty($para) && isset($para['class_id']) && !empty($para['class_id'])) ? $para['class_id'] : false;
		$student_id 	= (!empty($para) && isset($para['student_id']) && !empty($para['student_id'])) ? $para['student_id'] : false;
		$rubric_cat_id 	= (!empty($para) && isset($para['rubric_cat_id']) && !empty($para['rubric_cat_id'])) ? $para['rubric_cat_id'] : false;
		$sequenceid 	= (!empty($para) && isset($para['sequenceid']) && !empty($para['sequenceid'])) ? $para['sequenceid'] : false;
		if(!empty($class_id) && !empty($student_id) && !empty($rubric_cat_id) && !empty($sequenceid))
		{
			/*
			//$this->db->join('rb_criteria_category','rb_criteria_category.rub_cat_id = gradebook.rubric_cat_id');	
			//$this->db->join('rb_assessment_criteria','rb_assessment_criteria.id = rb_criteria_category.criteria_id');
			$result = $this->generalmodel->get_by_condition('gradebook',['class_id' => $class_id , 'student_id' => $student_id , 'rubric_cat_id' => $rubric_cat_id]);
			//echo '<pre>';
			//print_r($result);die; 
			*/
			
			
			$result = $this->generalmodel->get_by_condition('gradebook',['class_id' => $class_id , 'student_id' => $student_id , 'rubric_cat_id' => $rubric_cat_id , 'sequence_id' => $sequenceid ]);
								 $this->db->join('rb_assessment_criteria','rb_assessment_criteria.id = rb_criteria_category.criteria_id');
			$criteria_category = $this->generalmodel->get_by_condition('rb_criteria_category',['rub_cat_id' => $rubric_cat_id]);
			
			if($result){
				$result = $result[0];
				if($result['book_summary_below_perc'] > 0 ){
					$strengths[] = ['name' => (isset($criteria_category[0]['name'])) ? $criteria_category[0]['name'] : 'Book Summary' , 'val' => $result['book_summary_below_perc']];
				}else{
					$areas_growth[] = ['name' => (isset($criteria_category[0]['name'])) ? $criteria_category[0]['name'] : 'Book Summary' , 'val' => $result['book_summary_below_perc']];
				}
				if($result['book_assessment_text_perc'] > 0 ){
					$strengths[] = ['name' => (isset($criteria_category[1]['name'])) ? $criteria_category[1]['name'] : 'Assessment of Text' , 'val' => $result['book_assessment_text_perc']];
				}else{
					$areas_growth[] = ['name' => (isset($criteria_category[1]['name'])) ? $criteria_category[1]['name'] : 'Assessment of Text' , 'val' => $result['book_assessment_text_perc']];
				}
				if($result['book_presentation_idea_perc'] > 0 ){
					$strengths[] = ['name' => (isset($criteria_category[2]['name'])) ? $criteria_category[2]['name'] : 'Presenation of Ideas' , 'val' => $result['book_presentation_idea_perc']];
				}else{
					$areas_growth[] = ['name' => (isset($criteria_category[2]['name'])) ? $criteria_category[2]['name'] : 'Presenation of Ideas' , 'val' => $result['book_presentation_idea_perc']];
				}
				if($result['book_langual_conversation_perc'] > 0 ){
					$strengths[] = ['name' => (isset($criteria_category[3]['name'])) ? $criteria_category[3]['name'] : 'Language and Conventions' , 'val' => $result['book_langual_conversation_perc']];
				}else{
					$areas_growth[] = ['name' => (isset($criteria_category[3]['name'])) ? $criteria_category[3]['name'] : 'Language and Conventions' , 'val' => $result['book_langual_conversation_perc']];
				}
				if($result['book_word_choice_perc'] > 0 ){
					$strengths[] = ['name' => (isset($criteria_category[4]['name'])) ? $criteria_category[4]['name'] : 'Word Choice' , 'val' => $result['book_word_choice_perc']];
				}else{
					$areas_growth[] = ['name' => (isset($criteria_category[4]['name'])) ? $criteria_category[4]['name'] : 'Word Choice' , 'val' => $result['book_word_choice_perc']];
				}
			}
		}
		
		$output['strengths'] = $strengths;
		$output['areas_growth'] = $areas_growth;
		
		return $output;
	}
	
	public function GetStrengthsAndGrowthHTML($para)
	{
		$output			= array();
		$strengths 		= (!empty($para) && isset($para['strengths']) && !empty($para['strengths'])) ? $para['strengths'] : false;
		$areas_growth 	= (!empty($para) && isset($para['areas_growth']) && !empty($para['areas_growth'])) ? $para['areas_growth'] : false;
		
		$strengthsHtml 	= "";
		$growthHtml 	= "";
		
		if(!empty($strengths)):
            $strengthsHtml .= '
				<div class="professional mt-3">
					<h4>Strengths</h4>
				</div>
				<div class="row">';
				foreach($strengths as $key) : 
				$strengthsHtml .= '
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="form-group  from-field">
							<form class="display-inline" action="#" method="post">
								<img class="iconDtlStyle"  src="https://www.superrubric.com/assets/img/Icon_checkmark.png">
								<span style="color:#cbe558;margin-left:10px;">'.$key['name'].'</span><span style="font-weight: 100;text-decoration: underline;margin-left: 5px;">'.$key['val'].'% Higher than the  majority of the class</span>
							</form>
						</div> 
					</div> ';  
				endforeach;						
				$strengthsHtml .= '</div>';
		endif;
		
		if($areas_growth):
			$growthHtml .='
				<div class="professional mt-3">
					<h4>Areas for Growth</h4>
				</div>
				<div class="row">';
				foreach($areas_growth as $key) :	
					$growthHtml 	.='
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="form-group  from-field">
							<form class="display-inline" action="#" method="post">
								<img class="iconDtlStyle"  src="https://www.superrubric.com/assets/img/Icon_incorrect.png">
								<span style="color:#feb2b2;margin-left:10px;">'.$key['name'].'</span><span style="font-weight: 100;text-decoration: underline;margin-left: 5px;">'.$key['val'].'% Lower than the  majority of the class</span>
							</form>
						</div> 
					</div> '; 
				endforeach;
                $growthHtml .='</div>';
			endif;
					
		$output['strengthsHtml'] = $strengthsHtml;
		$output['growthHtml'] = $growthHtml;
		return $output;
	}
	
	public function getStudentData()
	{
		$output = array();
		$rubric_cat_id 	= (!empty($_POST) && isset($_POST['rubric_cat_id']) && !empty($_POST['rubric_cat_id'])) ? $_POST['rubric_cat_id'] : false;
		$student_id 	= (!empty($_POST) && isset($_POST['student_id']) && !empty($_POST['student_id'])) ? $_POST['student_id'] : false;
		$class_id 		= (!empty($_POST) && isset($_POST['class_id']) && !empty($_POST['class_id'])) ? $_POST['class_id'] : false;
		$sequenceid 	= (!empty($_POST) && isset($_POST['sequenceid']) && !empty($_POST['sequenceid'])) ? $_POST['sequenceid'] : false;

		$para['rubric_cat_id'] = $rubric_cat_id;
		$para['student_id'] = $student_id;
		$para['class_id'] = $class_id;
		$para['sequenceid'] = $sequenceid;
		
		$GetStrengthsAndGrowthData = $this->GetStrengthsAndGrowth($para);
		$GetStrengthsAndGrowthHTML = $this->GetStrengthsAndGrowthHTML($GetStrengthsAndGrowthData);
		
						$this->db->join('users','users.user_id = gradebook.student_id');
		$studentData = 	$this->generalmodel->get_by_condition_field('gradebook',['class_id' => $class_id , 'student_id' => $student_id, 'rubric_cat_id' => $rubric_cat_id, 'sequence_id' => $sequenceid],'gradebook.id,class_id,overall_score,users.user_email');
		
		$this->db->join('rb_rubric_categories','rb_rubric_categories.id = grading_scheme.rubric_cat_id');
		$gradings = $this->generalmodel->get_by_condition_field('grading_scheme',['gradebook_id' => $class_id,'rubric_cat_id' => $rubric_cat_id , 'sequenceID' => $sequenceid],'*','grading_scheme.id','ASC');
		$output['gradings'] 		= $gradings[0];
		
		// echo '<pre>';
		// print_r($data['gradings']);die;
		$output['strengthsandgrowthhtml'] 	= $GetStrengthsAndGrowthHTML;
		$output['studentData'] 				= (!empty($studentData) && isset($studentData[0]) && !empty($studentData[0])) ? $studentData[0] : false;
		echo  json_encode($output);
		die;
	}
	
}