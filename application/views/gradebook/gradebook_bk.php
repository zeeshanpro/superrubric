<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo $header;
$RubricCatID 	= (isset($SelectedRubricCatID) && !empty($SelectedRubricCatID)) ? $SelectedRubricCatID :  false;
$classID 		= (isset($SelectedclassID) && !empty($SelectedclassID)) ? $SelectedclassID :  false;

$stnd_dev				= 0;
$cummulative_average	= 0;
?>
<style>
.iconBackStyle{
	height: 50px;
    width: 60px;
}
.iconReportStyle{
	height: 50px;
    width: 50px;
}
.iconDownloadStyle{
	height: 50px;
    width: 50px;
}
.charts_divs{
	margin-left:10px;
}
.charts_divs > table {
	margin: 0 auto;
}
</style>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>var students_count = <?php echo count(explode(',',$class[0]['student_names'])); ?>;</script> 
	<div class="action">
        <div class="from-section">
		
            <form  action="<?= base_url('GradeBook/saveMarksSheet/'.$class[0]['id']);?>" method="post" id="gradebook-form">  
                <div class="from-box">
                    
                    <div class="professional mt-5">
                        <h4><a href="<?= base_url('gradebook/'.$class[0]['id']);?>"><img class="iconBackStyle" src="<?php echo base_url('assets/img/Icon_back.png'); ?>"></a><?= $class[0]['class_name'] ?></h4>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="from-field">
                                <div class="form-group">
									<select class="form-control" name="rubric_cat" id="rubric_cat" onchange="showChartsByRubricCatID(this)">
                                       <!--<option value="">Ruric/ Category</option>-->
										<?php foreach($gradings as $index => $cat): 
										
												$cummulative_average 	+= $cat['overall_score_avg'] * ($cat['perc_weight']/100);
												$stnd_dev 				+= $cat['overall_score_dev'] * ($cat['perc_weight']/100);
												$selected = "";
												if(!empty($RubricCatID))
												{
													if($RubricCatID == $cat['rubric_cat_id'])
														$selected = "selected";
												}
												else
												{
													if($index == 0)
														$selected = "selected";
												}
										?>
										<option value="<?= $cat['rubric_cat_id'] ?>" <?= $selected; ?>><?= $cat['name'] ?></option>
										<?php endforeach; ?>
                                    </select>
								</div>
                            </div> 
                        </div>
						<div class="col-md-8" style="display: block;top: -55px;"> 
                            <div class="from-field form-inline">
                                <div class="form-group average">
									<h4>Cumulative Average: </h4>
									<input type="text" class="form-control" style="font-weight: bold;font-size: 22px;background-color: #fce13375 !important;" id="cummulative_average" placeholder="" name=""  value="<?php echo number_format($cummulative_average,1);?>" readonly >
								</div>
								<div class="form-group deviation">
									<h4>Standard Deviation: </h4>
									<input type="text" class="form-control" style="font-weight: bold;font-size: 22px;background-color: #fce13375 !important;" id="stnd_dev" placeholder="" name=""  value="<?php echo number_format($stnd_dev,1);?>" readonly>
								</div>	
                            </div>
                        </div>						
                    </div>
					
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
									<th class="bg-yellow">Book Report</th>
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
								
									<input id="avg_criteria_1_<?= $gradings[$i]['rubric_cat_id'] ?>" type="hidden" name="book_summary_avg[<?= $gradings[$i]['rubric_cat_id'] ?>]">
									<input id="avg_criteria_2_<?= $gradings[$i]['rubric_cat_id'] ?>" type="hidden" name="assessment_text_avg[<?= $gradings[$i]['rubric_cat_id'] ?>]">
									<input id="avg_criteria_3_<?= $gradings[$i]['rubric_cat_id'] ?>" type="hidden" name="presentation_idea_avg[<?= $gradings[$i]['rubric_cat_id'] ?>]">
									<input id="avg_criteria_4_<?= $gradings[$i]['rubric_cat_id'] ?>" type="hidden" name="langual_conversation_avg[<?= $gradings[$i]['rubric_cat_id'] ?>]">
									<input id="avg_criteria_5_<?= $gradings[$i]['rubric_cat_id'] ?>" type="hidden" name="word_choice_avg[<?= $gradings[$i]['rubric_cat_id'] ?>]">
									<input id="avg_criteria_6_<?= $gradings[$i]['rubric_cat_id'] ?>" type="hidden" name="overall_score_avg[<?= $gradings[$i]['rubric_cat_id'] ?>]">
									
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
								
									<input id="dev_score_1_<?= $gradings[$i]['rubric_cat_id'] ?>" type="hidden" name="book_summary_dev[<?= $gradings[$i]['rubric_cat_id'] ?>]">
									<input id="dev_score_2_<?= $gradings[$i]['rubric_cat_id'] ?>" type="hidden" name="assessment_text_dev[<?= $gradings[$i]['rubric_cat_id'] ?>]">
									<input id="dev_score_3_<?= $gradings[$i]['rubric_cat_id'] ?>" type="hidden" name="presentation_idea_dev[<?= $gradings[$i]['rubric_cat_id'] ?>]">
									<input id="dev_score_4_<?= $gradings[$i]['rubric_cat_id'] ?>" type="hidden" name="langual_conversation_dev[<?= $gradings[$i]['rubric_cat_id'] ?>]">
									<input id="dev_score_5_<?= $gradings[$i]['rubric_cat_id'] ?>" type="hidden" name="word_choice_dev[<?= $gradings[$i]['rubric_cat_id'] ?>]">
									<input id="dev_score_6_<?= $gradings[$i]['rubric_cat_id'] ?>" type="hidden" name="overall_score_dev[<?= $gradings[$i]['rubric_cat_id'] ?>]">
							 
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
    <div class="right-panel">
      <div class="board">
        <div class="templateSelection" style="margin-top: 162px; width:100% !Important;color: black;display:block;">
			<div class="row download-btn" style="TEXT-ALIGN: LEFT;">
				<div class="col-6" style="padding: 0px 54px;cursor: pointer;" onclick="GoToRubricDB('<?php echo $class[0]['id']; ?>');">
					<h4 class="">Rubrics & Reports</h4>
					<img class="iconReportStyle" style="float: right;margin-top: -50px;" src="<?php echo base_url('assets/img/Icon_report.png'); ?>">
					<!--<i class="fas fa-file-alt" style="float: right;font-size: 40px;margin-top: -40px;"></i>-->
				</div>
				<div class="col-6" style="padding: 0px 54px 0px 0px;cursor: pointer;" id="DownloadReportBtn" onclick="DownloadReports('<?php echo $class[0]['id']; ?>');">
					<h4>Download Reports</h4>
					<img class="iconDownloadStyle" style="float: right;margin-top: -50px;" src="<?php echo base_url('assets/img/Icon_download.png'); ?>">
					<!--<i class="fas fa-save" style="float: right;font-size: 40px;margin-top: -40px;"></i> -->
				</div>
			</div>
		
			<div class="row download-btn" style="TEXT-ALIGN: LEFT;">
				<div class="col-6">&nbsp;</div>
				<div class="col-6"><button class="btn-default save-btn">SAVE</button></div>
			</div>
			<!-- <div id="charts_2">
				<table >
					<tr style="width:100%">
						<td style="width:50%">
							<div class="chart-container" style="position: relative; width:100%"> ffff
								<canvas id="myChart" style="width: 360px; height: 200px;  margin-left:8%"></canvas>
							</div>
						</td>
						<td style="width:50%">
							<div class="chart-container" style="position: relative; width:100%"> gggg
								<canvas id="myChart2" style="width: 360px; height: 200px margin-left:7%"></canvas>
							</div>
						</td>
					</tr>
				</table>
			</div>	-->	
			<?php
				if(isset($rubricCatIds) && !empty($rubricCatIds))
				{
					for($i=0;$i<count($rubricCatIds);$i++)
					{
			?>
						<div id="charts_<?php echo $rubricCatIds[$i]?>" class="charts_divs" >
							<table >
								<tr style="width:100%">
									<td style="width:50%"><div class="chart" id="chart_div_<?php echo $rubricCatIds[$i]; ?>_1" style="width: 360px; height: 200px;"></div></td>
									<td style="width:50%"><div class="chart" id="chart_div_<?php echo $rubricCatIds[$i]; ?>_2" style="width: 360px; height: 200px;"></div></td>	
								</tr>
								<tr><td colspan="2"><br></td></tr>
								<tr style="width:100%">
									<td style="width:50%"><div class="chart" id="chart_div_<?php echo $rubricCatIds[$i]; ?>_3" style="width: 360px; height: 200px;"></div></td>
									<td style="width:50%"><div class="chart" id="chart_div_<?php echo $rubricCatIds[$i]; ?>_4" style="width: 360px; height: 200px;"></div></td>	
								</tr>
								<tr><td colspan="2"><br></td></tr>
								<tr style="width:100%">
									<td style="width:50%"><div class="chart" id="chart_div_<?php echo $rubricCatIds[$i]; ?>_5" style="width: 360px; height: 200px;"></div></td>
									<td style="width:50%"><div class="chart" id="chart_div_<?php echo $rubricCatIds[$i]; ?>_6" style="width: 360px; height: 200px;"></div></td>	
								</tr>
							</table>
					</div>
			<?php
					}
				}
			?>
			
        </div>
      </div>
      <div class="introFooter">All Rights Reserved</div>
    </div>
  </div>

<?php echo $footer; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.chartjs.org/dist/master/chart.min.js"></script>
<script>
$('document').ready(function(){
	$('div.charts_divs').hide();
	$('div#charts_'+$("#rubric_cat").val()).show();
});

function showChartsByRubricCatID(e)
{
	var RubricCatID = $(e).val();
	if(RubricCatID == "")
		return false;
		
	var classId = "<?php echo $classID; ?>";
	window.location.href = "<?php echo base_url()?>gradebook/marks-sheet/"+classId+"/"+RubricCatID;
	
	//$('div.charts_divs').addClass('hide');
	//$('div#charts_'+RubricCatID).removeClass('hide');
	
	//$('div.charts_divs').hide();
	//$('div#charts_'+RubricCatID).show();
}

function GoToRubricDB(classId)
{
	if(classId == "")
		return false;
		
	window.location.href = "<?php echo base_url()?>gradebook/rubric-database/"+classId;
}

google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawBarChart);

function drawBarChart() {
	
	<?php
		if(isset($rubricCatIds) && !empty($rubricCatIds))
		{
			for($i=0;$i<count($rubricCatIds);$i++)
			{		
				if(isset($criteriaHeadings))
				{
					for($k=0; $k < sizeof($criteriaHeadings[$rubricCatIds[$i]]); $k++)
					{ 
						$n = $k + 1;
						$marksArray = (isset($criteriaHeadings[$rubricCatIds[$i]][$k]['marks']) && !empty($criteriaHeadings[$rubricCatIds[$i]][$k]['marks'])) ? array_count_values(explode(",",$criteriaHeadings[$rubricCatIds[$i]][$k]['marks'])) : 0;
		?>
						var data = google.visualization.arrayToDataTable([
							['Marks', '# of Students'],
							<?php 
								for($l=1;$l<=100;$l++)
								{
									$mark = 0;
									if(!empty($marksArray) && isset($marksArray[$l]))
										$mark = $marksArray[$l];
									
									echo "[".$l.", ". $mark ."],";
								}
							?>
						]);

						var options = {
							width : "360",
							title : "<?php echo $criteriaHeadings[$rubricCatIds[$i]][$k]['assessment_criteria_name']; ?>",
							legend: { position: 'none' },
							// titleTextStyle: {
								 // textStyle: 'center',
							  // },
							isStacked: true,
							bars: 'vertical', // Required for Material Bar Charts.
							hAxis: { title: 'Marks' },
							vAxis: { title: '# of Students' },
						};

						var chart = new google.charts.Bar(document.getElementById('<?php echo "chart_div_".$rubricCatIds[$i]."_".$n; ?>'));
						chart.draw(data, google.charts.Bar.convertOptions(options));
		<?php
					}
				}
			}
		}
	?>

}

function drawBarChartOLD() {
	
	var data = google.visualization.arrayToDataTable([
		['Marks', 'Students'],
		<?php 
			for($k=1;$k<=100;$k++)
			{
				echo "[".$k.", ". rand(1,100) ."],";
			}
		?>
	]);

	var options = {
		width : "360",
		title : "Book Summary",
		legend: { position: 'none' },
		
		isStacked: true,
		bars: 'vertical', // Required for Material Bar Charts.
		hAxis: { title: 'Marks' },
		vAxis: { title: 'Students' },
	};

	var chart = new google.charts.Bar(document.getElementById('chart_div_2_1_old'));
	chart.draw(data, google.charts.Bar.convertOptions(options));

}

function DownloadReports(classId)
{	
	if(classId == "")
		return false;
		
	var charts_html = $("#charts_"+$("#rubric_cat").val()).html();
	var form_html = $("#gradebook-form").html();
	if(classId == "")
		return false;
	/*	
	$("#charts_html").val(charts_html);
	$("#form_html").val(form_html);
	$("#classId").val(classId);
	$("#rubric_cat_id").val($("#rubric_cat").val());
	document.getElementById("pdfgenrateReport").submit(); 
	*/
	//alert(charts_html);
	
	$.ajax({
		url: "<?php echo base_url('gradebook/downloadReports'); ?>",
		type: 'post',
		data: { 'charts_html' : charts_html },
		success: function(response){
			if(response != 0){

			}
			else{
				alert('Something went wrong.!');
			}
		}
   });
   
} 

/*
LoadGraph();
function LoadGraph()
{
	ChartAbc();
}
function ChartAbc()
{
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [0,10,20,30,40,50,60,70,80,90,100],
			datasets: [{
				label: 'Book Summary',
				data: [0,10,20,30,40,50,60,70,80,90,100],
				backgroundColor: [
					'rgba(0,0,255, 0.2)',
				],
				borderColor: [
					//'rgba(0,0,128, 1)',
					'rgba(0,0,255, 1)',
				],
				borderWidth: 0.1
			}]
		},
		options: {
			scales: {
				y: {
					//beginAtZero: true
				}
			}
		}
	});
	
	var ctx = document.getElementById('myChart2').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [0,10,20,30,40,50,60,70,80,90,100],
			datasets: [{
				label: 'Book Summary',
				data: [0,10,20,30,40,50,60,70,80,90,100],
				backgroundColor: [
					'rgba(0,0,255, 0.2)',
				],
				borderColor: [
					//'rgba(0,0,128, 1)',
					'rgba(0,0,255, 1)',
				],
				borderWidth: 0.1
			}]
		},
		options: {
			scales: {
				y: {
					//beginAtZero: true
				}
			}
		}
	});
}
*/
</script>


<form id="pdfgenrateReport" action="<?php echo base_url('gradebook/downloadReports'); ?>" method="post" name=""> 
	<input type="hidden" id="charts_html" name="charts_html" />
	<input type="hidden" id="form_html" name="form_html" />
	<input type="hidden" id="classId" name="classId" />
	<input type="hidden" id="rubric_cat_id" name="rubric_cat_id" />
</form>
