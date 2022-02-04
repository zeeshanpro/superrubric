<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$RubricCatID 	= (isset($SelectedRubricCatID) && !empty($SelectedRubricCatID)) ? $SelectedRubricCatID :  false;
$classID 		= (isset($SelectedclassID) && !empty($SelectedclassID)) ? $SelectedclassID :  false;
?>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/web-style.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/all.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/web-responsive.css'); ?>">	 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>var students_count = <?php echo count(explode(',',$class[0]['student_names'])); ?>;</script> 
	<div class="action">
        <div class="from-section">
		
            <form  action="<?= base_url('GradeBook/saveMarksSheet/'.$class[0]['id']);?>" method="post" id="gradebook-form">  
                <div class="from-box">
                    
                    <table>
                        <tr>
							<td>
								<div class="from-field form-inline">
									<div class="form-group average">
										<h4>Class Name: </h4>
										<input type="text" class="form-control" style="font-weight: bold;" id="" placeholder="" name=""  value="<?= $class[0]['class_name'] ?>" readonly >
									</div>
									<div class="form-group average">
										<h4>Cummulative Average: </h4>
										<input type="text" class="form-control" style="font-weight: bold;" id="cummulative_average" placeholder="" name=""  value="" readonly >
									</div>
								</div> 
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6" > 
									<div class="from-field form-inline">
										<div class="form-group average">
											<h4>Category Name: </h4>
											<input type="hidden" name="rubric_cat" id="rubric_cat" value="<?= $rubric_categories[0]['id'] ?>"/>
											<input type="text" class="form-control" style="font-weight: bold;" id="" placeholder="" name="" value="<?= $rubric_categories[0]['name'] ?>" readonly >
										</div>
										<div class="form-group deviation">
											<h4>Standard Deviation: </h4>
											<input type="text" class="form-control" style="font-weight: bold;" id="stnd_dev" placeholder="" name=""  value="" readonly>
										</div>	
									</div>
								</div>	
							</td>
						</tr>						
                    </table>
					
					<div class="row">
						<table id="gradebook-table" class="table table-bordered" style="width:100%;font-size:11px;border: 1px solid black;">
							
							<?php for($i=0; $i < sizeof($gradings); $i++) { 
							
								$attri = "";
								if(!empty($RubricCatID))
								{
									if($RubricCatID != $gradings[$i]['rubric_cat_id'])
										$attri = "display:none";
								}
								else
								{
									if($i > 0)
										$attri = "display:none";
								}
							?>
							
							<thead id="thead-category-<?= $gradings[$i]['rubric_cat_id'] ?>" style="<?= $attri; ?>">
								<tr>
									<th class="bg-yellow">SUPERRUBRIC.COM <br> Book Report</th>
									<?php 
										if(isset($criteriaHeadings))
										{
											for($k=0; $k < sizeof($criteriaHeadings[$gradings[$i]['rubric_cat_id']]); $k++)
											{ 
												if(strtolower($criteriaHeadings[$gradings[$i]['rubric_cat_id']][$k]['assessment_criteria_name']) == "overall")
													continue;
									?>
												<th class="text-white" colspan="2"><?php echo $criteriaHeadings[$gradings[$i]['rubric_cat_id']][$k]['assessment_criteria_name']; ?></th>
								<?php 		} 
										}
								?>
								<!--<th class="text-white" colspan="2">Book Summary</th>
									<th class="text-white" colspan="2">Assesment of<br>Text</th>
									<th class="text-white" colspan="2">Presentation of<br>ideas</th>
									<th class="text-white" colspan="2">Langual<br>Converstation</th>
									<th class="text-white" colspan="2">Word Choice</th>-->
									<th class="bg-yellow" colspan="2">Overall Score</th>
								</tr> 
							</thead>
							
							<tbody id="tbody-category-<?= $gradings[$i]['rubric_cat_id'] ?>" style="<?= $attri; ?>"> 
							<?php //$students = explode(',',$class[0]['student_names']);
								  for($j=0; $j<sizeof($gradebook); $j++) {
									  $value = $gradebook[$j];
									  // print_r($value);die;
									  if($value['rubric_cat_id'] == $gradings[$i]['rubric_cat_id']) {
								  
							?>
							
							<tr>  
								<td><?php echo (!empty($value['student_name'])) ? $value['student_name'] : $value['student_id']; ?><input name="ids[]" type="hidden" value="<?= $value['id'] ?>"><input name="rubric_cat_ids[]" type="hidden" value="<?= $value['rubric_cat_id'] ?>"></td>
								
								<td>
								<input type="text" name="book_summary[]" class="input-score criteria_1 criteria_1_<?= $gradings[$i]['rubric_cat_id'] ?> student_<?= $j?>" data-criteria="1" data-SchemeID="<?= $gradings[$i]['rubric_cat_id'] ?>" data-student-name="<?= $j?>" data-percentage="<?php echo (isset($criteriaHeadings[$gradings[$i]['rubric_cat_id']][0]['percentage'])) ? $criteriaHeadings[$gradings[$i]['rubric_cat_id']][0]['percentage'] : '0'; ?>" value="<?= $value['book_summary'] ?>">
								</td>
								
								<td class="<?= ($value['book_summary_below_perc'] > 0) ? 'above_average' : 'below_average'; ?>" id="score-below-up-criteria_1-student-<?= $j ?>"3><?= $value['book_summary_below_perc'] ?></td>
								<input id="input-score-below-up-criteria_1-student-<?= $j ?>" type="hidden" name="book_summary_below_perc[]">
								
								<td>
								<input type="text" name="assessment_text[]" class="input-score criteria_2 criteria_2_<?= $gradings[$i]['rubric_cat_id'] ?> student_<?= $j?>" data-criteria="2" data-SchemeID="<?= $gradings[$i]['rubric_cat_id'] ?>" data-student-name="<?= $j?>" data-percentage="<?php echo (isset($criteriaHeadings[$gradings[$i]['rubric_cat_id']][1]['percentage'])) ? $criteriaHeadings[$gradings[$i]['rubric_cat_id']][1]['percentage'] : '0'; ?>" value="<?= $value['assessment_text'] ?>">
								</td>
								
								<td class="<?= ($value['book_assessment_text_perc'] > 0) ? 'above_average' : 'below_average'; ?>" id="score-below-up-criteria_2-student-<?= $j?>"><?= $value['book_assessment_text_perc'] ?></td>
								<input id="input-score-below-up-criteria_2-student-<?= $j ?>" type="hidden" name="book_assessment_text_perc[]"> 
								<td>
								<input type="text" name="presentation_idea[]" class="input-score criteria_3 criteria_3_<?= $gradings[$i]['rubric_cat_id'] ?> student_<?= $j?>" data-criteria="3" data-SchemeID="<?= $gradings[$i]['rubric_cat_id'] ?>" data-student-name="<?= $j?>" data-percentage="<?php echo (isset($criteriaHeadings[$gradings[$i]['rubric_cat_id']][2]['percentage'])) ? $criteriaHeadings[$gradings[$i]['rubric_cat_id']][2]['percentage'] : '0'; ?>" value="<?= $value['presentation_idea'] ?>"></td>
								
								<td class="<?= ($value['book_presentation_idea_perc'] > 0) ? 'above_average' : 'below_average'; ?>" id="score-below-up-criteria_3-student-<?= $j?>">
								<?= $value['book_presentation_idea_perc'] ?></td>
								<input id="input-score-below-up-criteria_3-student-<?= $j ?>" type="hidden" name="book_presentation_idea_perc[]">
								
								<td>
								<input type="text" name="langual_conversation[]" class="input-score criteria_4 criteria_4_<?= $gradings[$i]['rubric_cat_id'] ?> student_<?= $j?>" data-criteria="4" data-SchemeID="<?= $gradings[$i]['rubric_cat_id'] ?>" data-student-name="<?= $j?>" data-percentage="<?php echo (isset($criteriaHeadings[$gradings[$i]['rubric_cat_id']][3]['percentage'])) ? $criteriaHeadings[$gradings[$i]['rubric_cat_id']][3]['percentage'] : '0'; ?>" value="<?= $value['langual_conversation'] ?>"></td>
								
								<td class="<?= ($value['book_langual_conversation_perc'] > 0) ? 'above_average' : 'below_average'; ?>" id="score-below-up-criteria_4-student-<?= $j?>"><?= $value['book_langual_conversation_perc'] ?></td>
								<input id="input-score-below-up-criteria_4-student-<?= $j ?>" type="hidden" name="book_langual_conversation_perc[]">
								
								<td>
								<input type="text" name="word_choice[]" class="input-score criteria_5 criteria_5_<?= $gradings[$i]['rubric_cat_id'] ?> student_<?= $j?>" data-criteria="5" data-SchemeID="<?= $gradings[$i]['rubric_cat_id'] ?>" data-student-name="<?= $j?>" data-percentage="<?php echo (isset($criteriaHeadings[$gradings[$i]['rubric_cat_id']][4]['percentage'])) ? $criteriaHeadings[$gradings[$i]['rubric_cat_id']][4]['percentage'] : '0'; ?>" value="<?= $value['word_choice'] ?>"></td>
								
								<td class="<?= ($value['book_word_choice_perc'] > 0) ? 'above_average' : 'below_average'; ?>" id="score-below-up-criteria_5-student-<?= $j?>"><?= $value['book_word_choice_perc'] ?></td>
								<input id="input-score-below-up-criteria_5-student-<?= $j ?>" type="hidden" name="book_word_choice_perc[]">
								
								<td>
								<input type="text" class="input-score overall-score_<?= $gradings[$i]['rubric_cat_id'] ?>" name="overall_score[]" data-student-name="<?= $j?>"  id="overall-score-<?= $j ?>" value="<?= $value['overall_score'] ?>" readonly="readonly">
								</td> 	
								<td id="overall-score-below-up-student-<?= $j?>"></td><input id="input-overall-score-below-up-student-<?= $j ?>" type="hidden" name="book_overall_score_perc[]" >
							</tr>
								
									  <?php }else{ continue 1;} } ?>
							</tbody>
							
							<tfoot id="tfoot-category-<?= $gradings[$i]['rubric_cat_id'] ?>" style="<?= $attri;; ?>">
								<tr style="background: grey;">
									<th style="background: black;color: white;">AVERAGE</th>
									<th class="input-score average_criteria_1_<?= $gradings[$i]['rubric_cat_id'] ?>"></th>
									<th>&nbsp;</th>
									<th class="input-score average_criteria_2_<?= $gradings[$i]['rubric_cat_id'] ?>"></th>
									<th>&nbsp;</th> 
									<th class="input-score average_criteria_3_<?= $gradings[$i]['rubric_cat_id'] ?>"></th>
									<th>&nbsp;</th>
									<th class="input-score average_criteria_4_<?= $gradings[$i]['rubric_cat_id'] ?>"></th>
									<th>&nbsp;</th>
									<th class="input-score average_criteria_5_<?= $gradings[$i]['rubric_cat_id'] ?>"></th>
									<th>&nbsp;</th>
									<th class="input-score average_criteria_6_<?= $gradings[$i]['rubric_cat_id'] ?>"></th>
									<th>&nbsp;</th>
								</tr>
								<tr>
									<th style="background: black;color: white;">STANDARD DEV</th>
									<th class="input-score deviation-score_<?= $gradings[$i]['rubric_cat_id'] ?> std_criteria_1_<?= $gradings[$i]['rubric_cat_id'] ?>"></th>
									<th>&nbsp;</th>
									<th class="input-score deviation-score_<?= $gradings[$i]['rubric_cat_id'] ?> std_criteria_2_<?= $gradings[$i]['rubric_cat_id'] ?>"></th>
									<th>&nbsp;</th> 
									<th class="input-score deviation-score_<?= $gradings[$i]['rubric_cat_id'] ?> std_criteria_3_<?= $gradings[$i]['rubric_cat_id'] ?>"></th>
									<th>&nbsp;</th>
									<th class="input-score deviation-score_<?= $gradings[$i]['rubric_cat_id'] ?> std_criteria_4_<?= $gradings[$i]['rubric_cat_id'] ?>"></th>
									<th>&nbsp;</th>
									<th class="input-score deviation-score_<?= $gradings[$i]['rubric_cat_id'] ?> std_criteria_5_<?= $gradings[$i]['rubric_cat_id'] ?>"></th>
									<th>&nbsp;</th>
									<th class="input-score std_criteria_6_<?= $gradings[$i]['rubric_cat_id'] ?>"></th>
									<th>&nbsp;</th>
								</tr>
							</tfoot>
					
						<?php } ?>
														
						</table>
					</div>
                </div>
            </form>
        </div>
    </div>
<?php echo $footer; ?>