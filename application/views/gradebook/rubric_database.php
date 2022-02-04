<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo $header;
$classID = (isset($class_id) && !empty($class_id)) ? $class_id : false;

$GradingStatistics 		= GetGradingStatisticsByClassID($classID);
$cummulative_average 	= (isset($GradingStatistics['cum_avg'])) ? $GradingStatistics['cum_avg'] : "0";
$stnd_dev 				= (isset($GradingStatistics['stnd_dev'])) ? $GradingStatistics['stnd_dev'] : "0";

 ?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.iconDtlStyle{
	height: 50px;
    width: 50px;
}

.templateSelection {
	max-height: 50%;
}
.professional h4 {
	display: flex;
    line-height: 40px;
}
</style>
 	<div class="action">
        <div class="from-section">
            <form  action="<?= base_url('GradeBook/saveGradeBook');?>" method="post" name="">  
                <div class="from-box mt_mobile">
                    
                    <div class="professional mt-3">
						<h4><a href="<?= base_url().'gradebook/marks-sheet/'.$classID; ?>" style="margin-right: 10px;"><i style="font-size: 40px;color: black;" class="far fa-arrow-alt-circle-left"></i></a>
                        Student Details</h4>
                    </div>
                    <div class="row">
                        
                        <div class="col-sm-6 col-md-6 col-lg-8">
                            <div class="from-field">
                                <div class="form-group">
                                    <select class="form-control" name="student_id" id="student_id" onchange="getStudentData(),getStudentDocData()">
                                       <option value="">Select Student</option>
										<?php foreach($student_data as $index => $std): 
										?>
										<option value="<?= $std['user_id'] ?>"><?= $std['name'] ?></option>
										<?php endforeach; ?>
                                    </select>
                                </div>
                            </div> 
							<div class="from-field">
                                <div class="form-group">
									<select class="form-control" name="rubric_cat" id="rubric_cat" onchange="getStudentData(),getStudentDocData()">
                                       <option value="">Rubric/Category</option>
										<?php foreach($gradings as $index => $cat): 
												$selected = "";
												//if($index == 0)
													//$selected = "selected";
												
											$newSequenceID[$cat['rubric_cat_id']] = (isset($newSequenceID[$cat['rubric_cat_id']]) && !empty($newSequenceID[$cat['rubric_cat_id']])) ? $newSequenceID[$cat['rubric_cat_id']] + 1 : 1;
										?>
										<option value="<?= $cat['rubric_cat_id'] ?>" <?= $selected; ?> data-sequenceID="<?= $cat['sequenceID']; ?>" data-CustomSequenceID="<?= $newSequenceID[$cat['rubric_cat_id']]; ?>" ><?= $cat['name']." - ". $newSequenceID[$cat['rubric_cat_id']]; ?></option>
										<?php endforeach; ?>
                                    </select>
                                </div>
                            </div> 
                            <div class="from-field">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Grade" id="grade" name="grade" readonly value="">
                                </div>
                            </div>

                            <div class="from-field">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Contact" id="contact" name="contact" readonly value="">
                                </div>
                            </div>
                            
                        
                        </div>
						<div class="col-md-4 col-lg-4 overall-grade-rubric"><h4>Overall Grade</h4>
						<div class="form-field">
							<div class="form-group"><h5 style="font-weight: bold;" id="overall-grade-rubric-database"><?= $cummulative_average ?>%</h6></div>
						</div>
						</div>
                    </div>
					
					<div id="strengthsHtmlDiv">
						
					</div>
					
					<div id="growthHtmlDiv">
						
					</div>
					
                </div>
            </form>
        </div>
    </div>
    <div class="right-panel show_left_panel">
      <div class="board">
        <div class="templateSelection" >
		<p> <button id="" onclick="FileUpload()" class="btn-default">Upload Rubric</button></p>
		<form action="javascript:void(0)" method="post" enctype="multipart/form-data" hidden id="uploadForm">
			<input type="text" name="rubric_cat_id" id="rubric_catID" />
			<input type="text" name="student_id" id="studentID" />
			<input type="text" name="sequenceID" id="sequenceID" />
			<input type="text" name="class_id" id="classID" value="<?php echo $classID; ?>" />
			<input type="file" id="image" accept="image/*" name = "image" hidden="hidden" onchange="uploadFile(this)" />
			<input type="submit" id="uploadFormBtn" value="Submit"/>
		</form>
		
         <!--  <h3>Select your rubric</h3>
         <p class="orcls">or</p> -->
            <div class="templatesLists">
				<table style="width:730px;color: black;background-color: white;">
					<thead>
						<tr>
							<th>#</th>
							<th>File Name</th>
							<th>Type</th>
							<th>Download</th>
						</tr>
					</thead>
					<tbody id="DocList">
						
					</tbody>
				</table>
            </div>
        </div>
      </div>
      <div class="introFooter">All Rights Reserved</div>
    </div>
  </div>
  
<?php echo $footer; ?>
<script>
function getStudentData()
{
	$("#strengthsHtmlDiv").html("");
	$("#growthHtmlDiv").html("");
	$("#grade").val("");
	$("#contact").val("");
			
	//studentID rubric_catID
	var rubric_cat_id = $("#rubric_cat").val();
	var student_id = $("#student_id").val();
	
	var sequenceid = $("#rubric_cat option:selected").attr('data-sequenceid');
	
	if(rubric_cat_id == '')
		return false;
	if(student_id == '')
		return false;
	if(sequenceid == '')
		return false;
		
	$("#rubric_catID").val(rubric_cat_id);
	$("#studentID").val(student_id);
	$("#sequenceID").val(sequenceid);
	
	$.ajax({
		type: "POST",
		data: { "rubric_cat_id" : rubric_cat_id , "student_id" : student_id, "sequenceid" : sequenceid, "class_id" : "<?php echo $classID; ?>" },
		url: "<?php echo base_url('gradebook/student-data'); ?>",
		success: function (data) {
			$("#strengthsHtmlDiv").html("");
			$("#growthHtmlDiv").html("");
			$("#grade").val("");
			$("#contact").val("");
			var myobj  = $.parseJSON(data);
			
			$("#grade").val(myobj.studentData.overall_score + '%');
			$("#contact").val(myobj.studentData.user_email);
			$('#overall-grade-rubric-database').text(myobj.gradings.overall_score_avg+'%');
			$("#strengthsHtmlDiv").html(myobj.strengthsandgrowthhtml.strengthsHtml);
			$("#growthHtmlDiv").html(myobj.strengthsandgrowthhtml.growthHtml);
		},
		error: function (data) {
			console.log('Error:', data);
		}
	});
}

function getStudentDocData()
{
	$("#DocList").html("");
	
	//studentID rubric_catID
	var rubric_cat_id = $("#rubric_cat").val();
	var student_id = $("#student_id").val();
	
	var sequenceid = $("#rubric_cat option:selected").attr('data-sequenceid');
	
	if(rubric_cat_id == '')
		return false;
	if(student_id == '')
		return false;
	if(sequenceid == '')
		return false;
		
	$("#rubric_catID").val(rubric_cat_id);
	$("#studentID").val(student_id);
	$("#sequenceID").val(sequenceid);
	
	$.ajax({
		type: "POST",
		data: { "rubric_cat_id" : rubric_cat_id , "student_id" : student_id, "sequenceid" : sequenceid, "class_id" : "<?php echo $classID; ?>" },
		url: "<?php echo base_url('gradebook/get-upload-rubric'); ?>",
		success: function (data) {
			var myobj  = $.parseJSON(data);
			$("#DocList").html(myobj.html);
		},
		error: function (data) {
			console.log('Error:', data);
		}
	});
}

function FileUpload()
{
	var rubric_cat = $("#rubric_cat").val();
	if(rubric_cat == '')
	{
		swal("Error", "Please Select Rubric Category", "error");
		return false;
	}
	
	var student_id = $("#student_id").val();
	if(student_id == '')
	{
		swal("Error", "Please Select Student", "error");
		return false;
	}
	
	document.getElementById('image').click();	
}

function uploadFile(e)
{
	var id = e.id;
	if(id == '')
		return false;
	
	var files = $('#'+id)[0].files[0];
	if(files)
	{
		var filename = files.name;
		var filesize = files.size;
		if( filesize <= 2097152 ){
			var fileNameExt = filename.substr(filename.lastIndexOf('.') + 1).toLowerCase();
			var validExtensions = ['jpeg','jpg','png','tiff','bmp','pdf']; //array of valid extensions
			if ($.inArray(fileNameExt, validExtensions) == -1)
			{
			   swal("Error", "Invalid file type", "error");
			   $("#"+id).val('');
			   return false;
			}
			else{
				document.getElementById('uploadFormBtn').click();
			}
		}else{
			swal("Error", "Your file size should not be greater than 2 MB", "error");
			$("#"+id).val('');
			return false;
		}
	}
}

$("form#uploadForm").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: "<?php echo base_url('gradebook/upload-rubric'); ?>",
        type: 'POST',
        data: formData,
        success: function (data) {
			$("#image").val('');
			var myobj  = $.parseJSON(data);
            if(myobj.status)
			{
				getStudentDocData();
			}
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

</script>