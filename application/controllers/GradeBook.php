<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GradeBook extends MY_Controller {

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
		
		/*if (!$this->session->userdata('user_logged_in')){
			redirect('/');
		} */ 
		
		// print_R($this->session->userdata());
		// echo $this->session->userdata('user_type');die;
		if ($this->session->userdata('user_type') == 2){
			
			$student_id = $this->session->userdata('user_id');
			redirect('/gradebook/student-portal/'.$student_id);
		}

		$this->load->model("Generalmodel",'generalmodel');  
    }

	public function index(){
		
		$data =  array();
		
		$data['header'] = $this->load->view('inc/header',$data,true);
		$data['footer'] = $this->load->view('inc/footer',$data,true);
		
		$user_id =  $this->session->userdata('user_id');
		
		$data['classes'] = $this->generalmodel->get_by_condition('gradebook_class',['user_id' => $user_id]);
		$data['rubric_categories'] = $this->generalmodel->get('rb_rubric_categories');
		$data['user_id'] = $user_id;
		
		$this->load->view('gradebook/create_class',$data);
	}
	
	public function getClassIDbyStudentID()
	{
		$studentID = $this->session->userdata('user_id');
		if(!empty($studentID))
		{
			$getClassDataByStudentID = $this->generalmodel->get_by_condition_field('gradebook',['student_ids' => $studentID],'class_id','id','ASC','class_id');
			echo '<pre>'; print_r($getClassDataByStudentID); die;
		}
		echo 'getClassIDbyStudentID'; die;
		//redirect('/gradebook/student-portal/13/48');
	}
	
	public function saveGradeBook(){
		
		if($this->session->userdata('user_logged_in')){
			$post_data 	= $this->input->post();
			//echo '<pre>'; print_r($post_data); die;
			$rubric_cat = $post_data['rubric_cat'];
			/* echo '<pre>';
			print_r($post_data);die; */
			if(!empty($rubric_cat))
			{
				//print_r($post_data['student_names']);die;
				//$students = explode(',',$post_data['student_names']);
				$students = $post_data['student_names'];
				if(!empty($students))
				{
					$getStudentDataByEmails = $this->generalmodel->getStudentDataByEmails($students);
					//echo '<pre>'; print_r($getStudentDataByEmails); die;
					if(!empty($getStudentDataByEmails) && isset($getStudentDataByEmails['student_id']) && !empty($getStudentDataByEmails['student_id']))
					{
						$studentIDS = explode(",",$getStudentDataByEmails['student_id']);
						$diff_Email = array_diff($students,explode(",",$getStudentDataByEmails['student_email']));
					
						$percentage_weight = $post_data['percentage_weight'];
						$data  = [
							'user_id' => $this->session->userdata('user_id'),
							'class_name' => $post_data['class_name'],
							'class_detail' => $post_data['class_detail'],
							'student_names' => $getStudentDataByEmails['student_email'],
						];
						$class_id = $this->generalmodel->add('gradebook_class',$data);
							
						$studentsUpdateDataBatch = array();
						if(isset($rubric_cat) && sizeof($rubric_cat) > 0){
							for ($i = 0; $i < sizeof($rubric_cat); $i++) {
								for ($j = 0; $j < sizeof($studentIDS); $j++) {
									$studentsUpdateBatch = array(
										'class_id' => $class_id,
										'student_id' => $studentIDS[$j],
										'rubric_cat_id' =>  $rubric_cat[$i],
										'sequence_id' =>  $i + 1
									);
									array_push($studentsUpdateDataBatch, $studentsUpdateBatch);
								}
							}
						}
						// echo '<pre>';
						// print_r($studentsUpdateDataBatch);die;
							
						$result = $this->generalmodel->insertBatch('gradebook',$studentsUpdateDataBatch);
						if(isset($rubric_cat) && sizeof($rubric_cat) > 0){
							$gradingDataBatch = array();
							for ($i = 0; $i < sizeof($rubric_cat); $i++) {
								$gradingPushBatch = array(
									'gradebook_id' => $class_id,
									'rubric_cat_id' => $rubric_cat[$i],
									'sequenceID' => $i + 1,
									'perc_weight' => $percentage_weight[$i]
								);
								array_push($gradingDataBatch, $gradingPushBatch);
							}
						}
						
						$this->generalmodel->insertBatch('grading_scheme',$gradingDataBatch);
						
						//if(!empty($diff_Email))
						//	$this->session->set_flashdata('email_error', implode(",",$diff_Email));
					}
					else
					{
						if(!empty($students))
							$this->session->set_flashdata('email_error', implode(",",$students));
					}	
				}
			}
		}
		
		redirect('gradebook');
	}
	
	public function editGradeBook($id){
		$data =  array();
		
		$data['header'] = $this->load->view('inc/header',$data,true);
		$data['footer'] = $this->load->view('inc/footer',$data,true);
		
		$user_id =  $this->session->userdata('user_id');
		$classes = $this->generalmodel->get_by_condition('gradebook_class',['user_id' => $user_id]);
		$classesData = array();
		if(!empty($classes))
		{
			for($i=0;$i<count($classes);$i++)
			{
				$scoreData 			= $this->generalmodel->get_by_condition_field('grading_scheme',['gradebook_id' => $classes[$i]['id']],'round(avg(overall_score_avg),2) as score_avg , round(avg(overall_score_dev),2) as dev_avg','id','ASC');
				$avg_score 			= (!empty($scoreData) && isset($scoreData[0]['score_avg'])) ? $scoreData[0]['score_avg'] : 0;
				$dev_score 			= (!empty($scoreData) && isset($scoreData[0]['dev_avg'])) ? $scoreData[0]['dev_avg'] : 0;
				
				$classesData[$i] 				= $classes[$i];	
				$classesData[$i]['avg_score'] 	= $avg_score;
				$classesData[$i]['avg_dev'] 	= $dev_score;
			}
		}
		
		$data['classes'] = $classesData;
		
		if($this->session->userdata('user_logged_in')){
			if($this->input->server('REQUEST_METHOD') === 'POST'){
				$post_data = $this->input->post();
				//debug($post_data);
				$rubric_cat = $post_data['rubric_cat'];
				$sequenceIDs = $post_data['seqids'];
				$ids = $post_data['ids'];
				if(!empty($rubric_cat))
				{
					
					//$students = explode(',',$post_data['student_names']);
					$students = $post_data['student_names'];
					if(!empty($students))
					{
						$getStudentDataByEmails = $this->generalmodel->getStudentDataByEmails($students);
						if(!empty($getStudentDataByEmails) && isset($getStudentDataByEmails['student_id']) && !empty($getStudentDataByEmails['student_id']))
						{
							$studentIDS = explode(",",$getStudentDataByEmails['student_id']);
							$diff_Email = array_diff($students,explode(",",$getStudentDataByEmails['student_email']));
							
							$getAllStudentData = $this->generalmodel->get_by_condition_field('gradebook',['class_id' => $id],'GROUP_CONCAT(student_id) AS student_id','id','ASC');
							$OldStudentIDS = (!empty($getAllStudentData) && isset($getAllStudentData[0]) && isset($getAllStudentData[0]['student_id']) && !empty($getAllStudentData[0]['student_id'])) ? $getAllStudentData[0]['student_id'] : false;
							$OldUniqueStudentIDS = (!empty($OldStudentIDS)) ? array_unique(explode(",",$OldStudentIDS)) : false;
							$NewStudentIDS = array_diff($studentIDS,$OldUniqueStudentIDS);
							$DeleteStudentIDS = array_diff($OldUniqueStudentIDS,$studentIDS);
							
							//echo '<pre>'; print_r($getStudentDataByEmails); print_r($studentIDS); print_r($OldUniqueStudentIDS); print_r($NewStudentIDS); print_r($DeleteStudentIDS); print_r($diff_Email); die;
							
							$percentage_weight = $post_data['percentage_weight'];
							$data  = [
								'class_name' => $post_data['class_name'],
								'class_detail' => $post_data['class_detail'],
								'student_names' => $getStudentDataByEmails['student_email'],
							];
							
							//$this->generalmodel->delete('grading_scheme',['gradebook_id' => $id]);

							if(isset($rubric_cat) && sizeof($rubric_cat) > 0){
							$gradingUpdateDataBatch = array();
							//echo sizeof($rubric_cat);
							for ($i = 0; $i < sizeof($rubric_cat); $i++) {
								$gradingUpdateBatch = array(
									'gradebook_id' => $id,
									'rubric_cat_id' => $rubric_cat[$i],
									'sequenceID' => (isset($sequenceIDs[$i]) && !empty($sequenceIDs[$i])) ? $sequenceIDs[$i] : $i + 1,
									'perc_weight' => $percentage_weight[$i]
								);
								array_push($gradingUpdateDataBatch, $gradingUpdateBatch);
								$check = $this->generalmodel->get_by_condition('grading_scheme',['id' => $ids[$i]]);
								if(!empty($check))
									$this->generalmodel->update('grading_scheme',$gradingUpdateBatch,['id' => $ids[$i]]);
								else{
										$this->generalmodel->add('grading_scheme',$gradingUpdateBatch);
										
										if(!empty($studentIDS))
										{
											foreach($studentIDS as $studentID) {
												$dataArray = array(
													'class_id' => $id,
													'student_id' => $studentID,
													'rubric_cat_id' =>  $rubric_cat[$i],
													'sequence_id' => (isset($sequenceIDs[$i]) && !empty($sequenceIDs[$i])) ? $sequenceIDs[$i] : $i + 1,
												);
												$this->generalmodel->add('gradebook',$dataArray);
											}
										}
									
									}
								
								}
							}
							
							//print_r($gradingUpdateDataBatch);die;
							//$this->generalmodel->insertBatch('grading_scheme',$gradingUpdateDataBatch);
							
							$this->generalmodel->update('gradebook_class',$data,['id' => $id]);
				
							$studentsUpdateDataBatch = array();
							if(isset($rubric_cat) && sizeof($rubric_cat) > 0){
								for ($i = 0; $i < sizeof($rubric_cat); $i++) {
									
									$this->generalmodel->update('gradebook',array( "rubric_cat_id" => $rubric_cat[$i] ),['class_id' => $id , 'sequence_id' => $sequenceIDs[$i] ]);
									if(!empty($NewStudentIDS))
									{
										foreach($NewStudentIDS as $NewStudentID) {
											$studentsUpdateBatch = array(
												'class_id' => $id,
												'student_id' => $NewStudentID,
												'rubric_cat_id' =>  $rubric_cat[$i],
												'sequence_id' => (isset($sequenceIDs[$i]) && !empty($sequenceIDs[$i])) ? $sequenceIDs[$i] : $i + 1,
											);
											array_push($studentsUpdateDataBatch, $studentsUpdateBatch);
											$this->generalmodel->add('gradebook',$studentsUpdateBatch);
										}
									}
								}
							}
							
							if(!empty($DeleteStudentIDS)){
								foreach($DeleteStudentIDS as $DeleteStudentID) {
									$this->generalmodel->delete('gradebook',['class_id' => $id , 'student_id' => $DeleteStudentID]);
								}
							}
							
							if(!empty($diff_Email))
								$this->session->set_flashdata('email_error', implode(",",$diff_Email));
						}
						else
						{
							$this->session->set_flashdata('email_error', implode(",",$students));
						}
					}
				}

				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$class = $this->generalmodel->get_by_condition('gradebook_class',['id' => $id]);
				$data['rubric_categories'] = $this->generalmodel->get('rb_rubric_categories');
				$gradings = $this->generalmodel->get_by_condition_field('grading_scheme',['gradebook_id' => $id],'*','id','ASC');
				/* echo '<pre>';
				print_r($gradings);die; */
				$data['class'] = $class;
				$data['gradings'] = $gradings;
				$data['class_id'] = $id;
				$this->load->view('gradebook/edit_class',$data);
			}
		}else{
			redirect('gradebook');
		}
		
		
	}
	
	public function deleteGradingScheme($id){
		if($this->session->userdata('user_logged_in')){
			if($this->input->server('REQUEST_METHOD') === 'POST'){
				$gradingSeqNo = (isset($_POST['gradingSeqNo']) && !empty($_POST['gradingSeqNo'])) ? $_POST['gradingSeqNo'] : false;
				$class_id = (isset($_POST['class_id']) && !empty($_POST['class_id'])) ? $_POST['class_id'] : false;
				$rubricCatID = (isset($_POST['rubricCatID']) && !empty($_POST['rubricCatID'])) ? $_POST['rubricCatID'] : false;
				if(is_numeric($id) && $id != '' && !empty($gradingSeqNo) && !empty($class_id) && !empty($rubricCatID)){
					$this->generalmodel->delete('grading_scheme',['id' => $id,'rubric_cat_id' => $rubricCatID,'sequenceID' => $gradingSeqNo,'gradebook_id' => $class_id]);
					$this->generalmodel->delete('gradebook',['rubric_cat_id' => $rubricCatID,'sequence_id' => $gradingSeqNo,'class_id' => $class_id]);
					redirect($_SERVER['HTTP_REFERER']); 
				}
			}
		}
	}
	
	public function marksSheet($class_id,$rubric_cat_id = false,$sequenceID = false){
		$data =  array();
		
		$data['header'] = $this->load->view('inc/header',$data,true);
		$data['footer'] = $this->load->view('inc/footer',$data,true); 
		$data['class'] = $this->generalmodel->get_by_condition('gradebook_class',['id' => $class_id]);
		$data['rubric_categories'] = $this->generalmodel->get('rb_rubric_categories');
		
		$this->db->join('rb_rubric_categories','rb_rubric_categories.id = grading_scheme.rubric_cat_id');
		$allGradings = $this->generalmodel->get_by_condition_field('grading_scheme',['gradebook_id' => $class_id],'*','grading_scheme.id','ASC');
		if(empty($rubric_cat_id))
		{
			$rubric_cat_id 	= (!empty($allGradings) && isset($allGradings[0]['rubric_cat_id'])) ? $allGradings[0]['rubric_cat_id'] : false;
		}
		if(empty($sequenceID))
		{
			$sequenceID 	= (!empty($allGradings) && isset($allGradings[0]['sequenceID'])) ? $allGradings[0]['sequenceID'] : 1;
		}
		
		$data['allGradings'] 	= $allGradings; 
		
		$this->db->join('rb_rubric_categories','rb_rubric_categories.id = grading_scheme.rubric_cat_id');
		$gradings = $this->generalmodel->get_by_condition_field('grading_scheme',['gradebook_id' => $class_id,'rubric_cat_id' => $rubric_cat_id , 'sequenceID' => $sequenceID],'*','grading_scheme.id','ASC');
		$data['gradings'] 		= $gradings;
		// echo '<pre>';
		// print_r($gradings);die;
		//$data['gradebook'] = $this->generalmodel->get_by_condition('gradebook',['class_id' => $class_id]);

		$this->db->join('rb_users','rb_users.user_id = gradebook.student_id','left');
		$data['gradebook'] = $this->generalmodel->get_by_condition_field('gradebook',['gradebook.class_id' => $class_id,'gradebook.rubric_cat_id' => $rubric_cat_id, 'sequence_id' => $sequenceID ],'gradebook.*,rb_users.name as student_name','gradebook.id','ASC');
		//debug($data['gradebook']);
		//echo '<pre>';print_r($gradebook);die;
		$criteriaHeadingArray 	= array();
		$rubric_CatArray 		= array();
		
		$this->db->join('rb_criteria_category','rb_criteria_category.rub_cat_id = grading_scheme.rubric_cat_id','inner');
		$this->db->join('rb_assessment_criteria','rb_assessment_criteria.id = rb_criteria_category.criteria_id','inner');
		$this->db->join('rb_rubric_categories','rb_rubric_categories.id = grading_scheme.rubric_cat_id');
		$criteriaData = $this->generalmodel->get_by_condition_field('grading_scheme',['gradebook_id' => $class_id,'rubric_cat_id' => $rubric_cat_id , 'sequenceID' => $sequenceID ],'grading_scheme.rubric_cat_id,rb_criteria_category.percentage,rb_assessment_criteria.id as rb_assessment_criteria_id,rb_assessment_criteria.name as assessment_criteria_name','grading_scheme.id','ASC');
		
		//echo '<pre>';print_r($criteriaData);die;
		
		if(!empty($criteriaData))
		{
			for($i=0;$i<count($criteriaData);$i++)
			{
				if(!in_array($criteriaData[$i]['rubric_cat_id'],$rubric_CatArray))
					$rubric_CatArray[] = $criteriaData[$i]['rubric_cat_id'];
					
				$criteriaHeadingArray[$criteriaData[$i]['rubric_cat_id']][] = $criteriaData[$i];
			}	
			
			if(!empty($rubric_CatArray))
			{
				for($i=0;$i<count($rubric_CatArray);$i++)
				{
					$marksData = $this->generalmodel->get_by_condition_field('gradebook',['class_id' => $class_id,'rubric_cat_id' => $rubric_CatArray[$i],'sequence_id' => $sequenceID ],'GROUP_CONCAT(ROUND(book_summary)) as heading1_marks,GROUP_CONCAT(ROUND(assessment_text)) as heading2_marks,GROUP_CONCAT(ROUND(presentation_idea)) as heading3_marks,GROUP_CONCAT(ROUND(langual_conversation)) as heading4_marks,GROUP_CONCAT(ROUND(word_choice)) as heading5_marks,GROUP_CONCAT(ROUND(overall_score)) as heading6_marks');
					$marksDataArray =  (!empty($marksData) && isset($marksData[0]) && !empty($marksData[0])) ? $marksData[0] : false;
					if(!empty($marksDataArray))
					{
						for($k=0;$k<count($marksDataArray);$k++)
						{
							$n = $k + 1;
							$criteriaHeadingArray[$rubric_CatArray[$i]][$k]['marks'] = $marksDataArray['heading'.$n.'_marks'];
							if($k == count($marksDataArray)-1)
							{
								$criteriaHeadingArray[$rubric_CatArray[$i]][$k]['rubric_cat_id'] 			= $rubric_CatArray[$i];
								$criteriaHeadingArray[$rubric_CatArray[$i]][$k]['assessment_criteria_name'] = "Overall";
							}
						}
					}
				}
			}
		}
		
		//echo '<pre>'; print_r($criteriaHeadingArray); die;
		$data['criteriaHeadings'] 		= $criteriaHeadingArray;
		$data['rubricCatIds'] 			= $rubric_CatArray;
		$data['SelectedRubricCatID'] 	= $rubric_cat_id;
		$data['SelectedclassID'] 		= $class_id;
		$data['SelectedsequenceID'] 	= $sequenceID;
		//debug($data);
		echo '<pre>';print_r($criteriaHeadingArray);die;
		echo '<pre>';print_r($rubric_CatArray);
		echo '<pre>';print_r($rubric_cat_id);
		echo '<pre>';print_r($class_id);die;
		$this->load->view('gradebook/gradebook',$data);
	}
	
	
	public function saveMarksSheet($class_id){
		$post_data = $this->input->post();
		//debug($post_data); die;
		$marksUpdateDataBatch = array();
		//echo sizeof($rubric_cat);
		$ids = $post_data['ids'];
		$book_summary = $post_data['book_summary'];
		$assessment_text = $post_data['assessment_text'];
		$presentation_idea = $post_data['presentation_idea'];
		$langual_conversation = $post_data['langual_conversation'];
		$word_choice = $post_data['word_choice']; 
		$overall_score = $post_data['overall_score'];
		$book_summary_below_perc = $post_data['book_summary_below_perc'];
		$book_assessment_text_perc = $post_data['book_assessment_text_perc'];
		$book_presentation_idea_perc = $post_data['book_presentation_idea_perc'];
		$book_langual_conversation_perc = $post_data['book_langual_conversation_perc'];
		$book_word_choice_perc = $post_data['book_word_choice_perc'];
		$book_overall_score_perc = $post_data['book_overall_score_perc'];
		
		$rubric_cat 		= $post_data['rubric_cat_ids'];
		$rubric_cat_seq_id 	= $post_data['rubric_cat_seq_id'];
		for ($i = 0; $i < sizeof($book_summary); $i++) {
			$marksUpdateBatch = array(
				'id' => $ids[$i],
				'rubric_cat_id' => $rubric_cat[$i],
				'book_summary' => $book_summary[$i],
				'assessment_text' => $assessment_text[$i],
				'presentation_idea' => $presentation_idea[$i],
				'langual_conversation' => $langual_conversation[$i],
				'word_choice' => $word_choice[$i],
				'overall_score' => $overall_score[$i],
				'book_summary_below_perc' => $book_summary_below_perc[$i],
				'book_assessment_text_perc' => $book_assessment_text_perc[$i],
				'book_presentation_idea_perc' => $book_presentation_idea_perc[$i],
				'book_langual_conversation_perc' => $book_langual_conversation_perc[$i],
				'book_word_choice_perc' => $book_word_choice_perc[$i],
				'book_overall_score_perc' => $book_overall_score_perc[$i],
			);
			array_push($marksUpdateDataBatch, $marksUpdateBatch);
		}
		/* echo '<pre>';
		print_R($marksUpdateDataBatch);die; */	
		$result = $this->generalmodel->update_batch('gradebook',$marksUpdateDataBatch,'id');

		$book_summary_avg = $post_data['book_summary_avg'];
		$assessment_text_avg = $post_data['assessment_text_avg'];
		$presentation_idea_avg = $post_data['presentation_idea_avg'];
		$langual_conversation_avg = $post_data['langual_conversation_avg'];
		$word_choice_avg = $post_data['word_choice_avg'];
		$overall_score_avg = $post_data['overall_score_avg'];
		
		$book_summary_dev = $post_data['book_summary_dev'];
		$assessment_text_dev = $post_data['assessment_text_dev'];
		$presentation_idea_dev = $post_data['presentation_idea_dev'];
		$langual_conversation_dev = $post_data['langual_conversation_dev'];
		$word_choice_dev = $post_data['word_choice_dev'];
		$overall_score_dev = $post_data['overall_score_dev'];
		
		$rubricCatID = $post_data['rubric_cat'];
		if(!empty($rubricCatID) && isset($book_summary_avg[$rubricCatID]))
		{
			$UpdateArray = array(
				'book_summary_avg' => $book_summary_avg[$rubricCatID],
				'assessment_text_avg' => $assessment_text_avg[$rubricCatID],
				'presentation_idea_avg' => $presentation_idea_avg[$rubricCatID],
				'langual_conversation_avg' => $langual_conversation_avg[$rubricCatID],
				'word_choice_avg' => $word_choice_avg[$rubricCatID],
				'overall_score_avg' => $overall_score_avg[$rubricCatID],
				'book_summary_dev' => $book_summary_dev[$rubricCatID],
				'assessment_text_dev' => $assessment_text_dev[$rubricCatID],
				'presentation_idea_dev' => $presentation_idea_dev[$rubricCatID],
				'langual_conversation_dev' => $langual_conversation_dev[$rubricCatID],
				'word_choice_dev' => $word_choice_dev[$rubricCatID],
				'overall_score_dev' => $overall_score_dev[$rubricCatID],
			);
			
			$this->generalmodel->update('grading_scheme',$UpdateArray,['gradebook_id' => $class_id,'rubric_cat_id' => $rubricCatID,'sequenceID' => $rubric_cat_seq_id]);
		}
		
		if($result){
			echo 1;
			exit(1);
		}
		else
		{
			echo 0;exit(1);
		}
	}
	
	public function studentSuccessPortal($class_id,$student_id = false){
		
		$data =  array();
		$strengths = [];
		$areas_growth = [];
		
		if(empty($student_id))
			$student_id = $this->session->userdata('user_id');
	
										$this->db->join('gradebook_class','gradebook_class.id = gradebook.class_id');
		$getAllClassDataByStudentID = 	$this->generalmodel->get_by_condition_field('gradebook',['student_id' => $student_id],'gradebook_class.id,gradebook_class.class_name,','id','ASC','class_id');
		
		$this->db->join('gradebook_class','gradebook_class.id = gradebook.class_id');
		$student_classes = $this->generalmodel->get_by_condition_field('gradebook',['class_id' => $class_id , 'student_id' => $student_id],'gradebook_class.id as class_id,class_name,class_detail,overall_score,gradebook.rubric_cat_id');
		
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
		$data['grades'] = $result;
		$data['strengths'] = $strengths;
		$data['areas_growth'] = $areas_growth;
		$data['classes'] = $student_classes;
		$data['student_data'] = $student_data;
		$data['class_id'] = $class_id;
		$data['student_id'] = $student_id;
		$data['studentClasses'] = $getAllClassDataByStudentID;
		$data['header'] = $this->load->view('inc/header',$data,true);
		$data['footer'] = $this->load->view('inc/footer',$data,true);
		$this->load->view('gradebook/student_sucess_portal',$data);
	}
	
	public function rubricDatabases($class_id = false){
				
		$data =  array();
		$strengths = [];
		$areas_growth = [];
		
							$this->db->join('rb_rubric_categories','rb_rubric_categories.id = grading_scheme.rubric_cat_id');
		$data['gradings'] = $this->generalmodel->get_by_condition_field('grading_scheme',['gradebook_id' => $class_id],'*','grading_scheme.id','ASC');

		$this->db->join('users','users.user_id = gradebook.student_id');
		$data['student_data'] = $this->generalmodel->get_by_condition_field('gradebook',['class_id' => $class_id],'*','gradebook.id','ASC','gradebook.student_id');
		
		$data['strengths'] = $strengths;
		$data['areas_growth'] = $areas_growth;
		$data['classes'] = "";
		$data['class_id'] = $class_id;
		
		$data['header'] = $this->load->view('inc/header',$data,true);
		$data['footer'] = $this->load->view('inc/footer',$data,true);
		$this->load->view('gradebook/rubric_database',$data);
	}
		
	public function uploadRubric()
	{
		$path = dirname(dirname(dirname(__FILE__))).'/upload/';
		if ($_FILES['image']['name'] != "") {
					
			$post_data 	= $this->input->post();
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_tmp  = $_FILES['image']['tmp_name'];
			$file_type = $_FILES['image']['type'];
			$file_ext  = @strtolower(end(explode('.', $_FILES['image']['name'])));
			$fileformatArray = array('jpeg','jpg','png','tiff','bmp','pdf');
			if(!empty($fileformatArray))
			{
				if (in_array($file_ext, $fileformatArray))
				{
					$file_type_array = explode('/',$file_type);
					$filetype = (!empty($file_type_array) && isset($file_type_array[0]) && $file_type_array[0] == "application" ) ? $file_type_array[1] : $file_type_array[0];
					$newfilename = round(microtime(true)).rand(1000,9999) . '.' . $file_ext;
					if(move_uploaded_file($file_tmp, $path . $newfilename))
					{
						if(!empty($newfilename))
						{
							$data  = [
								'added_by' => $this->session->userdata('user_id'),
								'original_attachment_file' => $file_name,
								'attachemt_name' => $newfilename,
								'attachemt_type' => $filetype,
								'class_id' => $post_data['class_id'],
								'student_id' => $post_data['student_id'],
								'rubric_cat_id' => $post_data['rubric_cat_id'],
								'sequenceid' => $post_data['sequenceID'],
							];
							$this->generalmodel->add('attachemts',$data);
							
							echo json_encode(array("status" => 1, "msg" => "uploading successfully"));
							die;
						}
						else
						{
							echo json_encode(array("status" => 0 , "msg" => "something went wrong."));
							die;
						}
					}
					else
					{
						echo json_encode(array("status" => 0 , "msg" => "uploading issue"));
						die;
					}
				}
				else
				{
					echo json_encode(array("status" => 0 , "msg" => "invalid file type"));
					die;
				}
			}
			else
			{
				echo json_encode(array("status" => 0 , "msg" => "invalid file type"));
				die;
			}
		}
		else
		{
			echo json_encode(array("status" => 0 , "msg" => "file missing"));
			die;
		}
	}
	
	public function getUploadRubric()
	{
		$html = "";
		$rubric_cat_id 	= (!empty($_POST) && isset($_POST['rubric_cat_id']) && !empty($_POST['rubric_cat_id'])) ? $_POST['rubric_cat_id'] : false;
		$student_id 	= (!empty($_POST) && isset($_POST['student_id']) && !empty($_POST['student_id'])) ? $_POST['student_id'] : false;
		$class_id 		= (!empty($_POST) && isset($_POST['class_id']) && !empty($_POST['class_id'])) ? $_POST['class_id'] : false;
		$sequenceid 	= (!empty($_POST) && isset($_POST['sequenceid']) && !empty($_POST['sequenceid'])) ? $_POST['sequenceid'] : false;
		if(!empty($student_id) && !empty($class_id) && !empty($sequenceid))
		{
						  $this->db->join('users','users.user_id = attachemts.student_id','left');
			$getDocData = $this->generalmodel->get_by_condition_field('attachemts',['student_id'=>$student_id,'class_id'=>$class_id,'rubric_cat_id'=>$rubric_cat_id,'sequenceid'=>$sequenceid],'attachemts.*,users.name','id','DESC');
			if(!empty($getDocData))
			{
				$i = 0;
				foreach($getDocData as $doc)
				{
					$i++;
					//$html .= "<div class='template' style='background: white;color: black;border-radius: 15px;height: 250px;width: 200px;'><a href='".base_url()."/upload/".$doc['attachemt_name']."' download ><img src='".base_url()."/upload/".$doc['attachemt_name']."' width='180' height='230' /></a></div>";
					if($doc['attachemt_type'] == 'image') {  
					$file_type = 'JPG/PNG'; 
					} 
					else if($doc['attachemt_type'] == 'pdf'){
						$file_type = 'PDF' ;
					}
					else { $file_type = ucfirst($doc['attachemt_type']);
					}
					$html .= "<tr>
								<th>".$i."</th>
								<th>".$doc['original_attachment_file']."</th>
								<th>". $file_type ."</th>
								<th><a href='".base_url()."upload/".$doc['attachemt_name']."' download=".$doc['original_attachment_file']." >Download <img class='iconDtlStyle'  src='https://www.superrubric.com/assets/img/Icon_download.png'></a></th>
							</tr>";
				}
			}
		}
		
		echo json_encode(array("html" => $html));
		die;
	}
	
	public function downloadReports()
	{
		$charts_html 		= (!empty($_POST) && isset($_POST['charts_html']) && !empty($_POST['charts_html'])) ? $_POST['charts_html'] : false;
		$class_id 			= (!empty($_POST) && isset($_POST['classId']) && !empty($_POST['classId'])) ? $_POST['classId'] : false;
		$rubric_cat_id 		= (!empty($_POST) && isset($_POST['rubric_cat_id']) && !empty($_POST['rubric_cat_id'])) ? $_POST['rubric_cat_id'] : false;
		$sequenceID 		= (!empty($_POST) && isset($_POST['sequence_id']) && !empty($_POST['sequence_id'])) ? $_POST['sequence_id'] : false;
		$CustomSequenceID 	= (!empty($_POST) && isset($_POST['CustomSequenceID']) && !empty($_POST['CustomSequenceID'])) ? $_POST['CustomSequenceID'] : false;
		if(!empty($class_id) && !empty($rubric_cat_id) && !empty($sequenceID))
		{
		    //echo $class_id.' '.$rubric_cat_id.' '.$sequenceID;die;
			$data =  array();
			
			$filename = "Rubric_Reports_".$rubric_cat_id."_".$class_id.".jpg";
			$file_path = $this->exportTopng($charts_html,$filename);
			$chart_file_path = (isset($file_path) && !empty($file_path)) ? base_url('upload/').$filename : false;
			$data['chart_file_path'] = $chart_file_path;
			$data['file_path'] = $file_path;
			//$data['chart_file_path'] = (isset($file_path) && !empty($file_path)) ? $file_path : false;
			$data['class'] = $this->generalmodel->get_by_condition('gradebook_class',['id' => $class_id]);
			$data['rubric_categories'] = $this->generalmodel->get_by_condition('rb_rubric_categories',['id' => $rubric_cat_id]);
		
			$this->db->join('rb_users','rb_users.user_id = gradebook.student_id','left');
			$data['gradebook'] = $this->generalmodel->get_by_condition_field('gradebook',['gradebook.class_id' => $class_id,'gradebook.rubric_cat_id' => $rubric_cat_id,'gradebook.sequence_id' => $sequenceID],'gradebook.*,rb_users.name as student_name','gradebook.id','ASC');
			
			$this->db->join('rb_rubric_categories','rb_rubric_categories.id = grading_scheme.rubric_cat_id');
			$data['gradings'] = $this->generalmodel->get_by_condition_field('grading_scheme',['gradebook_id' => $class_id,'rubric_cat_id' => $rubric_cat_id , 'sequenceID' => $sequenceID],'*','grading_scheme.id','ASC');
			
			$criteriaHeadingArray 	= array();
			$rubric_CatArray 		= array();
			
			$this->db->join('rb_criteria_category','rb_criteria_category.rub_cat_id = grading_scheme.rubric_cat_id','inner');
			$this->db->join('rb_assessment_criteria','rb_assessment_criteria.id = rb_criteria_category.criteria_id','inner');
			$this->db->join('rb_rubric_categories','rb_rubric_categories.id = grading_scheme.rubric_cat_id');
			$criteriaData = $this->generalmodel->get_by_condition_field('grading_scheme',['gradebook_id' => $class_id,'rubric_cat_id' => $rubric_cat_id, 'sequenceID' => $sequenceID ],'grading_scheme.rubric_cat_id,rb_criteria_category.percentage,rb_assessment_criteria.name as assessment_criteria_name','grading_scheme.id','ASC');
			if(!empty($criteriaData))
			{
				for($i=0;$i<count($criteriaData);$i++)
				{
					if(!in_array($criteriaData[$i]['rubric_cat_id'],$rubric_CatArray))
						$rubric_CatArray[] = $criteriaData[$i]['rubric_cat_id'];
						
					$criteriaHeadingArray[$criteriaData[$i]['rubric_cat_id']][] = $criteriaData[$i];
				}	
				
				if(!empty($rubric_CatArray))
				{
					for($i=0;$i<count($rubric_CatArray);$i++)
					{
						$marksData = $this->generalmodel->get_by_condition_field('gradebook',['class_id' => $class_id,'rubric_cat_id' => $rubric_CatArray[$i], 'sequence_id' => $sequenceID],'GROUP_CONCAT(ROUND(book_summary)) as heading1_marks,GROUP_CONCAT(ROUND(assessment_text)) as heading2_marks,GROUP_CONCAT(ROUND(presentation_idea)) as heading3_marks,GROUP_CONCAT(ROUND(langual_conversation)) as heading4_marks,GROUP_CONCAT(ROUND(word_choice)) as heading5_marks,GROUP_CONCAT(ROUND(overall_score)) as heading6_marks');
						$marksDataArray =  (!empty($marksData) && isset($marksData[0]) && !empty($marksData[0])) ? $marksData[0] : false;
						if(!empty($marksDataArray))
						{
							for($k=0;$k<count($marksDataArray);$k++)
							{
								$n = $k + 1;
								$criteriaHeadingArray[$rubric_CatArray[$i]][$k]['marks'] = $marksDataArray['heading'.$n.'_marks'];
								if($k == count($marksDataArray)-1)
								{
									$criteriaHeadingArray[$rubric_CatArray[$i]][$k]['rubric_cat_id'] 			= $rubric_CatArray[$i];
									$criteriaHeadingArray[$rubric_CatArray[$i]][$k]['assessment_criteria_name'] = "Overall";
								}
							}
						}
					}
				}
			}
			
			$data['criteriaHeadings'] 		= $criteriaHeadingArray;
			$data['rubricCatIds'] 			= $rubric_CatArray;
			$data['SelectedRubricCatID'] 	= $rubric_cat_id;
			$data['SelectedclassID'] 		= $class_id;
			$data['SelectedsequenceID'] 	= $sequenceID;
			$data['CustomSequenceID'] 		= $CustomSequenceID;
			//echo '<pre>'; print_r($data); die;
			$html = html_entity_decode($this->load->view('gradebook/createpdfreports',$data,true));
			
			$html = preg_replace('/>\s+</', "><", $html);
			//echo $html; die;
			
			$this->load->library('pdf');
			$filename = "Rubric_Reports_".date('Ymdhisa');
			//$this->exportpng($html,$filename);
			$this->pdf->Create_Download($html,$filename,true);
			//$this->pdf->create($html,$filename,true);
			
		}		
	}
	
	public function exportTopng($html,$filename){
	    
		include APPPATH . 'third_party/pdfcrowd.php';
	    try {
            // create the API client instance
			//username: zeeshutech123 pass: Programmer@12 key: 43e72c6ab68a6ec66093894155e506a5
            $client = new \Pdfcrowd\HtmlToImageClient("superrubric", "ec6a1db5e9b34f866f43d763505ccb11");
    
            // configure the conversion
            $client->setOutputFormat("jpg");
            // run the conversion
			$path = dirname(dirname(dirname(__FILE__))).'/upload/'.$filename;
            $image = $client->convertStringToFile($html,$path);
			return $path;
        }
        catch(\Pdfcrowd\Error $why) {
            // report the error
            header("Content-Type: text/plain");
            http_response_code($why->getCode());
            echo "Pdfcrowd Error: {$why}";
        }
	}

	public function deleteClass($id){
		$this->generalmodel->delete("gradebook_class",["id" => $id]);		
		$this->generalmodel->delete("gradebook",["class_id" => $id]);		
		$this->generalmodel->delete("grading_scheme",["gradebook_id" => $id]);		
		redirect('gradebook');
	}

	public function updateDefaultCriteriaPercentage($id,$sequenceID){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$post_data = $this->input->post();
			$where = [
				'gradebook_id' 	=> $id,
				'rubric_cat_id' => $post_data['rubric_category_id'],
				'criteria_id'	=> $post_data['rubric_criteria_id'],
				'sequence_id' 	=> $sequenceID
			];
		  	$result	=	$this->generalmodel->get_by_condition('rb_gradebook_custom_criteria_percentage',$where);
			if(empty($result)){
				$data = [
					'gradebook_id' 	=> $id,
					'rubric_cat_id' 	=> $post_data['rubric_category_id'],
					'criteria_id'	=> $post_data['rubric_criteria_id'],
					'sequence_id' 	=> $sequenceID,
					'percentage' 	=> $post_data['percentage']
				];
				$this->generalmodel->add('rb_gradebook_custom_criteria_percentage',$data);
			}else{
				$this->generalmodel->update('rb_gradebook_custom_criteria_percentage',['percentage' => $post_data['percentage']],$where);
			}
		}

		redirect('gradebook/marks-sheet/'.$id);
	}
}