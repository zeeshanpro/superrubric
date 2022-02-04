</div>
</div>		
<script src="<?php echo base_url('assets/js/jQuery-3.3.1.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url('assets/js/custom.js'); ?>" type="text/javascript"></script>   	
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	
	
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "50%";
  jQuery('#headingOne, #sfs').addClass('d-none');
}

function closeNav() {
	 
  document.getElementById("mySidenav").style.width = "0";
  jQuery('#headingOne, #sfs').removeClass('d-none');
}
jQuery('div.action, div.right-panel').on('click', function(){
	 closeNav();
});

</script>
<style>
    .swal-footer {
        text-align: center !important;
    }
</style>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="form-title text-center">
        <h4 id="loginTitle">Login to Download</h4>
      </div>
      <div class="google-box" id="gSignIn"> <a href="javascript:void(0);"><img src="<?php echo base_url('assets/img/google.png'); ?>"> <span>Login with  Google</span></a></div>
      <div class="facebookAuthItem d-none"> <img src="<?php echo base_url('assets/img/facebook.png'); ?>"> <span>Login with Facebook</span> </div>
      <div class="text-center">
        <p class="mt-4 border-bo"> <span>Or</span> </p>
      </div>
      <div class="d-flex flex-column">
        <form id="loginForm" name="loginForm" method="post" action="" autocomplete="off">
          <div class="form-group"> <span>Email</span>
            <input type="email" class="form-control" name="user_email" id="user_email"placeholder="">
            <div id="error_login_email" class="signup_error"></div>
          </div>
          <div class="form-group"> <span>Password</span>
            <input type="password" class="form-control" name="user_password" id="user_password" placeholder="">
            <div id="error_login_password" class="signup_error"></div>
          </div>
          <div id="user_exist" class="signup_error"></div>
          <button type="button" onclick="return loginMember();" class="btn btn-block inputSubmit">Login</button>
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <div class="modalFooter">
        <p><span>Don't have and account? <a href="javascript:void(0);" onclick="return showSignup('signupModal');"> Sign up </a></span><br>
          <span>Lost your password? <a>Recover password</a></span></p>
      </div>
    </div>
  </div>
</div>
</div>
<!-- signup popup -->

<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="form-title text-center">
        <h4>Sign up</h4>
      </div>
       
      <div class="d-flex flex-column">
        <form id="signupForm" name="signupForm" method="post" action="" autocomplete="off">
          <div class="form-group"> <span>Email</span>
            <input type="email" class="form-control" id="user_email" name="user_email" autocomplete="off" placeholder="">
            <div id="error_email" class="signup_error"></div>
          </div>
          <div class="form-group"> <span>Password</span>
            <input type="password" class="form-control" name="user_password" id="user_password" autocomplete="off"  placeholder="">
            <div id="error_password" class="signup_error"></div>
          </div>
          <div class="form-group"> <span>Repeat Password</span>
            <input type="password" class="form-control" name="user_cnfpassword" id="user_cnfpassword" autocomplete="off" placeholder="">
            <div id="error_passconf" class="signup_error"></div>
          </div>
          <div class="form-group"> <span>User Type</span>
			<select class="form-control" name="user_type" id="user_type">
			   <option value="">Select Type</option>
			   <option value="1">Teacher</option>
			   <option value="2">Student</option>
			</select>
            <div id="error_type" class="signup_error"></div>
          </div>
          <button type="button" onClick="return signupMember();" class="btn btn-block inputSubmit">Sign up</button>
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <div class="modalFooter">
        <p><span>Already have an account? <a href="javascript:void(0);" onclick="return showSignup('loginModal');"> Sign in </a></span></p>
      </div>
    </div>
  </div>
</div>
</div>
<input type="hidden" name="logtodown" id="logtodown" value="0">
<script>
 
  function saveUploadedFile(){
      
		var fd = new FormData();
        var files = $('#myfile')[0].files;
        jQuery('#imgoverlay').removeClass('d-none');
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);

           $.ajax({
              url: '<?php echo base_url('templates/uploadfile'); ?>',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
				 jQuery('#imgoverlay').addClass('d-none'); 
                 if(response != 0){
                    $("#logoimg img").attr("src",response).css('max-width','102px');
                    $("#hd_logoimgpath").val(response);
                      // Display image element
                 }
                 else{
                    alert('File not uploaded. Please check file size or type.');
                 }
              },
           });
        }else{
           alert("Please select a file.");
        }
      
  }
  function submitLeftForm(){
      swal("Select your preferred file type", {
          buttons: {
              pdf: {
                  text: "PDF",
                  value: "pdf"
              },
              png: {
                  text: "PNG",
                  value: "png"
              }
            },
        }).then((value) => {
              switch (value) {
             
                case "pdf":
                   var path = '<?php echo base_url('/templates/domconvertpdf/pdf'); ?>';
                   $('#pdfgenrate').attr('action',path);document.getElementById("pdfgenrate").submit(); 
                  break;
             
                case "png":
                  var path = '<?php echo base_url('/templates/domconvertpdf/png'); ?>';
                  $('#pdfgenrate').attr('action',path);
                  document.getElementById("pdfgenrate").submit(); 
                  break;
             
              }
            });
    //   if(type == 'pdf'){
    //       var path = '<?php echo base_url('/templates/domconvertpdf/pdf'); ?>';
    //   }else if(type == 'png'){
    //       var path = '<?php echo base_url('/templates/domconvertpdf/png'); ?>';
    //   }
       
       
	}	
	
	function addCategory(){
		
		var rowNo = $('.grading_scheme_row').length + 1;	
		var html =	'<div class="col-sm-12 col-md-12 col-lg-12 new-scheme grading_scheme_row" id="grading_scheme_row_'+rowNo+'">'+
                            '<div class="from-field">'+
                                '<div class="form-group col-md-5 display-inline">'+
									'<select class="form-control require" name="rubric_cat[]">'+
                                    '<option value="">Ruric/ Category</option>'+
									'<option value="1">Arts Project</option>'+
									'<option value="2">Book Report</option>'+
									'<option value="3">High School Essay</option>'+
									'<option value="4">Discussion Forum</option>'+
									'<option value="5">Literacy Check</option>'+
									'<option value="6">Numeracy Check</option>'+
									'<option value="7">PHYS Ed Rubric</option>'+
									'<option value="8">READING RESPONSE</option>'+
									'<option value="9">RESEARCH PAPER</option>'+
									'<option value="10">JOURNAL ENTRY</option>'+  
                                    '</select>'+
                                '</div>'+ 
                                '&nbsp;<div class="form-group col-md-6 display-inline">'+
                                    '<input type="text" class="form-control percentage_weight require number_only" name="percentage_weight[]" placeholder="% weight">'+
                                '</div>'+
								'<a class="delete" style="margin-left:15px" href="javascript:void(0)" data-rowId="'+rowNo+'"><i class="fas fa-trash-alt cursor"></i></a>'+
                            '</div> '+
                        '</div>';
		
		$( html).insertBefore( ".add_rubric_category" ); 
		init();
		
	}
	
	$('document').ready(function(){
		
		$('.number_only').keyup(function () { 
		   this.value = this.value.replace(/[^0-9]/g,'');
		});	
			
		init();
		$("input.criteria_1,input.criteria_2,input.criteria_3,input.criteria_4,input.criteria_5").trigger("blur");
		/* let number_students = students_count;
		let sum = 0;
		let average = 0;
		$('.criteria_1').each(function(){
				sum += +$(this).val();
		});
		average = sum / number_students;
		$('.average_criteria_1').text(average.toFixed(2));  */
		$('select[name="rubric_cat"]').on('change',function(){
			//alert($(this).val());
			$('table#gradebook-table thead').css('display','none');	
			$('table#gradebook-table tbody').css('display','none');
			$('table#gradebook-table tfoot').css('display','none');	
			$('table#gradebook-table thead#thead-category-'+$(this).val()).css('display','table-row-group');	
			$('table#gradebook-table tbody#tbody-category-'+$(this).val()).css('display','table-row-group');	
			$('table#gradebook-table tfoot#tfoot-category-'+$(this).val()).css('display','table-row-group');

			$("#stnd_dev").val($(".std_criteria_6_"+$(this).val()).text());
			$("#cummulative_average").val($(".average_criteria_6_"+$(this).val()).text());
			
		});
	});
	
	function init(){
		//console.log(dev([1,2,3,4,5,6,7,8,9,10]));
		$('.percentage_weight').on('change',function(){
			var sum = 0;
			$(".percentage_weight").each(function(){
				sum += +$(this).val();
			});
			console.log(sum);
			if(sum <= 100){
				sum = 100 - sum; 
				$('.remaining').text('+'+sum);
				$('.remaining').css('color','green');
			}else{
				sum = 100 - sum; 
				$('.remaining').text(sum);
				$('.remaining').css('color','red');
			}
		});
		
		$('.delete').on('click',function(){
			$(this).closest('.new-scheme,.grading_scheme_row').remove();
			
			var sum = 0;
			$(".percentage_weight").each(function(){
				sum += +$(this).val();
			});
			console.log(sum);
			if(sum <= 100){
				sum = 100 - sum; 
				$('.remaining').text('+'+sum);
				$('.remaining').css('color','green');
			}else{
				sum = 100 - sum; 
				$('.remaining').text(sum);
				$('.remaining').css('color','red');
			}
			
		});
		
		$('input.criteria_1,input.criteria_2,input.criteria_3,input.criteria_4,input.criteria_5').on('blur',function(){
			let SchemeID = $(this).attr('data-schemeid');
			let average_field_id = 'average_criteria_'+ $(this).attr('data-criteria')+'_'+SchemeID;
			let overall_score_id = 'overall-score-'+ $(this).attr('data-student-name');
			
			console.log(SchemeID);
			console.log(overall_score_id);
			console.log(overall_score_id);
			let number_students = students_count;
			let sum = 0;
			let average = 0;
			let overall_score = 0;
			let score = 0;
			var commaSeparatedValues = [];
			let sum_overall_score = 0;
			$('.criteria_'+ $(this).attr('data-criteria')+"_"+SchemeID ).each(function(){
				sum += +$(this).val();
				commaSeparatedValues.push(parseInt($(this).val()));
			});
			
			average = sum / number_students;
			console.log(sum + 'sum');
			console.log(average + ' average');
			
			$('.student_'+ $(this).attr('data-student-name') ).each(function(){
				let criteria_perc = $(this).attr('data-percentage');
				score += +$(this).val()*criteria_perc;
			});
			
			overall_score = score;
			console.log(overall_score + ' overall_score');
			
			$('.'+average_field_id).text(average.toFixed(2)); 
			$('#'+overall_score_id).val(overall_score.toFixed(2)); 
			
			
			//Average of overall score
			$('.overall-score_'+SchemeID ).each(function(){
				sum_overall_score += +$(this).val();
			});
			average_overall_score = (sum_overall_score / number_students).toFixed(2);
			$('.average_criteria_6_'+SchemeID).text(average_overall_score);
			
			//Standard deviation formula
			var sum_deviation_score = 0;
			var average_deviation_score = 0;
			var Std_Dev = dev(commaSeparatedValues).toFixed(2);
			$('.std_criteria_'+ $(this).attr('data-criteria')+"_"+SchemeID ).text(Std_Dev);
			$('.deviation-score_'+SchemeID ).each(function(){
				sum_deviation_score += +$(this).text();
			});
			average_deviation_score = (sum_deviation_score / 5).toFixed(2);
			$('.std_criteria_6_'+SchemeID).text(average_deviation_score);
			
			if( SchemeID == $("#rubric_cat").val())
			{
				$("#stnd_dev").val(average_deviation_score);
				$("#cummulative_average").val(average_overall_score);
			}

			$('.criteria_'+ $(this).attr('data-criteria')+"_"+SchemeID  ).each(function(){
				let student_criteria_analytics_id = 'score-below-up-criteria_'+$(this).attr('data-criteria')+'-student-'+$(this).attr('data-student-name');
				let student_criteria_analytics_id_td = 'input-score-below-up-criteria_'+$(this).attr('data-criteria')+'-student-'+$(this).attr('data-student-name');
				let below_up_score = $(this).val()  - average;
				let student_score  = $(this).val();
				
				$('#'+student_criteria_analytics_id).text(below_up_score.toFixed(2));
				$('#'+student_criteria_analytics_id_td).val(below_up_score.toFixed(2));
			
				
				console.log(student_criteria_analytics_id + ' student_criteria_analytics_id');
				console.log(average + ' average');
				console.log(below_up_score + ' below_up_score');
				if(student_score > average){
					$('#'+student_criteria_analytics_id).css('background','#aee6ae');
				}else {
					$('#'+student_criteria_analytics_id).css('background','pink');
				}

				
			});	
			
			
			$('.overall-score').each(function(){
				below_up_overall_score = $(this).val() - average_overall_score;
				
				if($(this).val() > average_overall_score){
					$('#overall-score-below-up-student-'+$(this).attr('data-student-name')).css('background','#aee6ae');
				}else {
					$('#overall-score-below-up-student-'+$(this).attr('data-student-name')).css('background','pink');
				}

				$('#overall-score-below-up-student-'+$(this).attr('data-student-name')).text(below_up_overall_score.toFixed(2));
			});


			
			
		});
		
		$('.save-btn').on('click',function(){
		    var form_data =	$('#gradebook-form').serialize();
			console.log(form_data);
			$.ajax({
				url: $('#gradebook-form').attr('action'),
				data: form_data,
				type: 'POST',
				success: function(response){
					if(response == 1){
						alert('Marks sheet has been updated!');
					}else{
						alert('Something went wrong!');
					}
					console.log(response);
				}
			})
		})
		
		
	}
	
	$('.require').on('blur',function(){
		$(this).removeClass('highlight');
	});
	
	function submitClassForm() {
		
		var check = true;
		$(".require").each(function (item) {
			if($(this).val() == "" || $(this).val() == " ")
			{
				$(this).addClass('highlight');
				check = false;
			}
		});
				
		if(check)
		{
			var sum = 0;
			$(".percentage_weight").each(function(){
				sum += +$(this).val();
			});
			
			if(sum == 100)
			{
				$("#ClassForm").submit();
			}
			else
			{
				swal("Error", "Grading Scheme weight should be 100%", "error");
				return false;
			}
		}
		else
		{
			swal("Error", "Please fill all requried fields", "error");
			return false;
		}
	}

	function dev(arr){
	  // Creating the mean with Array.reduce
	  let mean = arr.reduce((acc, curr)=>{
		return acc + curr
	  }, 0) / arr.length;
		
	  // Assigning (value - mean) ^ 2 to every array item
	  arr = arr.map((k)=>{
		return (k - mean) ** 2
	  })
		
	  // Calculating the sum of updated array 
	 let sum = arr.reduce((acc, curr)=> acc + curr, 0);
	   
	 // Calculating the variance
	 let variance = sum / arr.length
	   
	 // Returning the Standered deviation
	 return Math.sqrt(sum / arr.length)
	}
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type = "text/javascript">
         google.charts.load('current', {packages: ['corechart']});     
      </script>
    <script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Student Roll No', 'height'],
               ['1', 80],['2', 55],['3', 68],['4', 80],['5', 54],
               ['6', 70],['7', 85],['8', 78],['9', 70],['10', 58],
               ['11', 90],['12', 65],['13', 88],['14', 82],['15', 65],
               ['16', 86],['17', 45],['18', 62],['19', 84],['20', 75],
               ['21', 82],['22', 75],['23', 58],['24', 70],['25', 85]		  
            ]);
              
            // Set chart options
            var options1 = {
               legend: { position: 'none' },
			   bar: { gap: 0 },
               'chartArea': {'width': '80%', 'height': '70%'},
			   histogram: {
				  bucketSize: 0.01,
				  minValue: 0,
				  maxValue: 100
				},
				hAxis: {
					title: 'Book Summary'
				}
            };				

			var options2 = {
               legend: { position: 'none' },
			   bar: { gap: 0 },
               'chartArea': {'width': '80%', 'height': '70%'},
			   histogram: {
				  bucketSize: 0.01,
				  minValue: 0,
				  maxValue: 100
				},
				hAxis: {
					title: 'Assesment of Text'
				}
            };	
			
			var options3 = {
               legend: { position: 'none' },
			   bar: { gap: 0 },
               'chartArea': {'width': '80%', 'height': '70%'},
			   histogram: {
				  bucketSize: 0.01,
				  minValue: 0,
				  maxValue: 100
				},
				hAxis: {
					title: 'Presentation of ideas'
				}
            };	
			
			var options4 = {
               legend: { position: 'none' },
			   bar: { gap: 0 },
               'chartArea': {'width': '80%', 'height': '70%'},
			   histogram: {
				  bucketSize: 0.01,
				  minValue: 0,
				  maxValue: 100
				},
				hAxis: {
					title: 'Langual Converstation'
				}
            };	
			
			var options5 = {
               legend: { position: 'none' },
			   bar: { gap: 0 },
               'chartArea': {'width': '80%', 'height': '70%'},
			   histogram: {
				  bucketSize: 0.01,
				  minValue: 0,
				  maxValue: 100
				},
				hAxis: {
					title: 'Word Choice'
				}
            };	
            // Instantiate and draw the chart.
            var chart1 = new google.visualization.Histogram(document.getElementById
            ('chart_div_1'));
			var chart2 = new google.visualization.Histogram(document.getElementById
            ('chart_div_2'));
			var chart3 = new google.visualization.Histogram(document.getElementById
            ('chart_div_3'));
			var chart4 = new google.visualization.Histogram(document.getElementById
            ('chart_div_4'));
			var chart5 = new google.visualization.Histogram(document.getElementById
            ('chart_div_5'));
            chart1.draw(data, options1);
            chart2.draw(data, options2);
            chart3.draw(data, options3);
            chart4.draw(data, options4);
            chart5.draw(data, options5);
         }
         google.charts.setOnLoadCallback(drawChart);
		 
		 
		//google.charts.load('current', {'packages':['corechart']});
		LoadGraph();
		function LoadGraph()
		{
			ChartAbc();
			/*
			//alert('com');
			var MarksArray = [
				['No. of Students','Marks'],
				[2,10],
				[5,20],
				[10,55],
				[5,48],
				[3,75],
				[10,65],
				[50,33],
			];
			
			google.charts.setOnLoadCallback(drawChartNew); */
		}
		function ChartAbc()
		{
			var ctx = document.getElementById('myChart').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
					datasets: [{
						label: 'Book Summary',
						data: [12, 19, 3, 5, 2, 3],
						backgroundColor: [
							'rgba(255,255,255, 0.2)',
						],
						borderColor: [
							'rgba(0,0,128, 1)',
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			});
		}
		//google.charts.setOnLoadCallback(drawChartNew);
		function drawChartNew333() {
			//alert(id);
			/*
			$('.criteria_1_'+$("#rubric_cat").val()).each(function(){
				sum += +$(this).val();
				commaSeparatedValues.push(parseInt($(this).val()));
			});
			*/
			var MarksArray = [
				['No. of Students','Marks'],
				[2,10],
				[5,20],
				[10,55],
				[5,48],
				[3,75],
				[10,65],
				[50,33],
			];
			//alert(MarksArray);
			var data = google.visualization.arrayToDataTable(MarksArray);

			var options = {
				title: 'Book Summary',
				hAxis: { title: 'No. of Students', minValue: 0}, //  maxValue: 100
				vAxis: { title: 'Marks', minValue: 0 }, //  maxValue: 100
				chartArea: {width:'80%'},
				trendlines: {
					0: {
					type: 'linear',
					showR2: true,
					//visibleInLegend: true
					}
				}
			};

			var chartLinear = new google.visualization.ScatterChart(document.getElementById('chart_div_1'));
			chartLinear.draw(data, options);
		}
      </script>
	  
	  
		<script>
			/* google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			  var data = google.visualization.arrayToDataTable([
				['Age', 'Diameter'],
				[1, 80], [2, 85], [3, 75], [4, 65], [5, 55], [6, 45], [7, 35],[8, 88],[9, 85],[10, 85]]);

			  var options = {
				title: 'Age of sugar maples vs. trunk diameter, in inches',
				hAxis: {title: 'Diameter',
						viewWindow: {
						  min: 0,
						  max: 10
					  }
				},
				vAxis: {title: 'Age'},
				legend: 'none',
				trendlines: {
      0: {
        color: 'purple',
        lineWidth: 10,
        opacity: 0.2,
        type: 'exponential'
      }
    }    // Draw a trendline for data series 0.
			  };

			  var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
			  chart.draw(data, options);
			} */
		</script>
	
</body>
</html>
