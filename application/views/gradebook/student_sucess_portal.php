<?php

//echo '<pre>'; print_r($student_attachments); die;

defined('BASEPATH') OR exit('No direct script access allowed');
echo $header; 
$classID = (isset($class_id) && !empty($class_id)) ? $class_id : false;
$studentID = (isset($student_id) && !empty($student_id)) ? $student_id : false;
?>
<style>
.SemesterCat{
	font-size: 14px !important;
    font-weight: bold !important;
}
.iconDtlStyle{
	height: 50px;
    width: 50px;
}
.iconDownloadStyle{
	height: 50px;
    width: 50px;
}
</style>
	<div class="action">
        <div class="from-section">
            <form  action="<?= base_url('GradeBook/saveGradeBook');?>" method="post" name="">  
                <div class="from-box mt_mobile">
                    
                    <div class="professional mt-3">
                        <h4>Student Details</h4>
                    </div>
                    <div class="row">
                        
						
                        <div class="col-sm-6 col-md-6 col-lg-8">
						
							<div class="from-field">
                                <div class="form-group">
									<select class="form-control" name="class_id" id="class_id" onchange="getClassID()">
										<?php foreach($studentClasses as $index => $class): 
												$selected = "";
												if($classID == $class['id'])
													$selected = "selected";
										?>
										<option value="<?= $class['id'] ?>" <?= $selected; ?>><?= $class['class_name'] ?></option>
										<?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
							
							<div class="from-field">
                                <div class="form-group">
									<select class="form-control" name="rubric_cat" id="rubric_cat" onchange="getStudentData()">
										<?php foreach($gradings as $index => $cat): 
												$selected = "";
												if($index == 0)
													$selected = "selected";
												
											$newSequenceID[$cat['rubric_cat_id']] = (isset($newSequenceID[$cat['rubric_cat_id']]) && !empty($newSequenceID[$cat['rubric_cat_id']])) ? $newSequenceID[$cat['rubric_cat_id']] + 1 : 1;
										?>
										<option value="<?= $cat['rubric_cat_id'] ?>" <?= $selected; ?> data-sequenceID="<?= $cat['sequenceID']; ?>" data-CustomSequenceID="<?= $newSequenceID[$cat['rubric_cat_id']]; ?>" ><?= $cat['name']." - ". $newSequenceID[$cat['rubric_cat_id']]; ?></option>
										<?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
							
                            <div class="from-field">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" name="name" readonly value="<?php echo (!empty($student_data) && isset($student_data[0]['name'])) ? $student_data[0]['name'] : ''; ?>">
                                </div>
                            </div> 
                            <div class="from-field">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Grade" id="grade" name="grade" readonly value="">
                                </div>
                            </div>

                            <div class="from-field">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Contact" name="contact" readonly value="<?php echo (!empty($student_data) && isset($student_data[0]['user_email'])) ? $student_data[0]['user_email'] : ''; ?>">
                                </div>
                            </div>
                            
                        
                        </div> 
						<div class="col-md-4 col-lg-4 overall-grade-rubric"><h4>Overall Grade</h4>
						<div class="form-field">
							<div class="form-group"><h5 style="font-weight: bold;" id="overall-grade-student-portal"></h6></div>
						</div>
						</div>       
                    </div>

					<div id="strengthsHtmlDiv">
						
					</div>
					
					<div id="growthHtmlDiv">
						
					</div>
					
					<?php /*if($strengths): ?>
                    <div class="professional mt-3">
                        <h4>Strengths</h4>
                    </div>
                    <div class="row">  
					<?php foreach($strengths as $key) : ?>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group  from-field">
								<form class="display-inline" action="#" method="post">
									<i class="fas fa-check-circle" style="color: #019201;font-size: 30px;"></i>
									<span style="color:#019201;margin-left:10px;"><?= $key['name']; ?></span><span style="font-weight: 100;text-decoration: underline;margin-left: 5px;"><?= $key['val']; ?>% Heigher than the  majority of the class</span>
								</form>
                            </div> 
                        </div>    
					<?php endforeach;?>						
                    </div>
					<?php endif; ?>
					
					<?php if($areas_growth): ?>
					<div class="professional mt-3">
                        <h4>Areas of Growth</h4>
                    </div>
					
                    <div class="row"> 
					<?php foreach($areas_growth as $key) : ?>					
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group  from-field">
								<form class="display-inline" action="#" method="post">
									<i class="fas fa-times-circle"  style="color: #ca2f39;font-size: 30px;"></i>
									<span style="color:#ca2f39;margin-left:10px;"><?= $key['name']; ?></span><span style="font-weight: 100;text-decoration: underline;margin-left: 5px;"><?= $key['val']; ?>% Lower than the  majority of the class</span>
								</form>
                            </div> 
                        </div>  
					<?php endforeach;?>
                    </div>
					<?php endif; */?>
                </div>
            </form>
        </div>
    </div>
    <div class="right-panel show_left_panel">
      <div class="board">
        <div class="templateSelection">
         <!--  <h3>Select your rubric</h3>
         <p class="orcls">or</p> -->
            <div class="templatesList">	
				<?php 
				$total_overall_score 	= 0;
				$total_subject 			= 0;
				if($classes): 
				?>
				<?php 
		
					foreach($classes as $class): 
					if($class['overall_score'] > 0)
					{
						$total_overall_score += $class['overall_score'];
						$total_subject = $total_subject + 1;
					}
				?>
				<div class="template" id="template_<?php echo $class['rubric_cat_id']?>" style="background: white;color: black;border-radius: 15px;height: 250;width: 200px;">
				  <div class="cv" style="font-size: 20px;padding: 15px;">
                    <p class="subject" style="font-weight: bold;margin-bottom:10px;"><?= $class['class_name']; ?></p>
                    <p class="Semester" style="font-size:15px;"><?= $class['class_detail']; ?></p>
                    <p class="SemesterCat"><?= $class['cat_name']; ?></p>
                    <p class="Semester" style="font-weight: bold;margin-bottom: 15px;"><?= $class['overall_score']; ?>% <br>My Grade</p>
                    <!--<p class="Semester">74% Average</p>-->
					<?php
							if(isset($student_attachments[$class['rubric_cat_id']]) && !empty($student_attachments[$class['rubric_cat_id']]))
							{
								$original_file_nameArray 	= array();
								$file_nameArray 			= array();
								foreach($student_attachments[$class['rubric_cat_id']] as $attachment)
								{
									$original_file_nameArray[] 	= $attachment['original_attachment_file'];
									$file_nameArray[] 			= $attachment['attachemt_name'];									
								}
								
								
					?>
								<!--<i class="fas fa-arrow-alt-circle-down" style="font-size: 30px;"></i>-->	
								<a href="javascript:void(0)" onclick="downloadFiles(this)" data-rubric_cat_id="<?php echo $class['rubric_cat_id'];?>" data-original_file_name="<?php echo (!empty($original_file_nameArray)) ? implode("|",$original_file_nameArray) : false ?>" data-unique_file_name="<?php echo (!empty($file_nameArray)) ? implode("|",$file_nameArray) : false ?>" class="cursor" style="text-decoration: underline;"><img class="iconDownloadStyle" style="" src="<?php echo base_url('assets/img/Icon_download.png'); ?>"> RUBRICS</a>
					<?php	}
					?>
                  </div>
				</div>
				<?php endforeach; endif;
				$student_avg = 0;
				if(!empty($total_overall_score) && !empty($total_subject))
				{
					$student_avg  = $total_overall_score / $total_subject;
				}
				?>
            </div>
        </div>
      </div>
      <div class="introFooter">All Rights Reserved</div>
    </div>
  </div>
  
<?php echo $footer; ?>
<script>
getStudentData();
function getStudentData()
{
	$("#strengthsHtmlDiv").html("");
	$("#growthHtmlDiv").html("");
	$("#grade").val("");
	$("#contact").val("");
			
	//$(".template").hide();
	//studentID rubric_catID
	var rubric_cat_id = $("#rubric_cat").val();
	
	if(rubric_cat_id == '')
		return false;
		
	var sequenceid = $("#rubric_cat option:selected").attr('data-sequenceid');
	
	$("#template_"+rubric_cat_id).show();
	
	$.ajax({
		type: "POST",
		data: { "rubric_cat_id" : rubric_cat_id , "student_id" : "<?php echo $studentID;?>", "sequenceid" : sequenceid, "class_id" : "<?php echo $classID; ?>" },
		url: "<?php echo base_url('gradebook/student-data'); ?>",
		success: function (data) {
			$("#strengthsHtmlDiv").html("");
			$("#growthHtmlDiv").html("");
			$("#grade").val("");
			$("#contact").val("");
			var myobj  = $.parseJSON(data);
			
			$("#grade").val(myobj.studentData.overall_score);
			$("#contact").val(myobj.studentData.user_email);
			$('#overall-grade-student-portal').text(myobj.gradings.overall_score_avg+'%');
			
			$("#strengthsHtmlDiv").html(myobj.strengthsandgrowthhtml.strengthsHtml);
			$("#growthHtmlDiv").html(myobj.strengthsandgrowthhtml.growthHtml);
			
			$("#grade").val("<?php echo number_format($student_avg,2); ?>");
			
		},
		error: function (data) {
			console.log('Error:', data);
		}
	});
}

function getClassID()
{
	var class_id = $("#class_id").val();
	if(class_id == '')
		return false;
		
	window.location.href = "<?php echo base_url('gradebook/student-portal'); ?>/<?php echo $studentID?>/"+class_id;
}

function downloadFiles(e)
{
	var original_file_names = $(e).attr('data-original_file_name');
	var unique_file_names = $(e).attr('data-unique_file_name');
	if(unique_file_names == "")
		return false;
		
	var original_file_names_array = original_file_names.split('|');
	var unique_file_names_array = unique_file_names.split('|');

	var temporaryDownloadLink = document.createElement("a");
	temporaryDownloadLink.style.display = 'none';

	document.body.appendChild( temporaryDownloadLink );
	
	for(var i = 0; i < unique_file_names_array.length; i++) {
	
		var unique_file_name 	= unique_file_names_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
		var original_file_name 	= original_file_names_array[i].replace(/^\s*/, "").replace(/\s*$/, "");

		temporaryDownloadLink.setAttribute( 'href', '<?php echo base_url()."upload/";?>'+unique_file_name );
        temporaryDownloadLink.setAttribute( 'download', original_file_name );

        temporaryDownloadLink.click();	
	}

	document.body.removeChild( temporaryDownloadLink );
}

</script>