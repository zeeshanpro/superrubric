<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo $header; ?>
<style>
.delete{
	margin-left : 10px;
}
.iconDltStyle{
	height: 40px;
    width: 40px;
}
.iconAddStyle{
	height: 60px;
    width: 60px;
}
.iconEditStyle{
	height: 50px;
    width: 50px;
}
.iconDtlStyle{
	height: 50px;
    width: 50px;
}
.ribbonhighlight {
    background-color: #fce13375;
    height: 16px;
}
.bg-text {
    width: max-content;
    display: initial;
}

.bg-text .ribbon-highlight:before {
    content: "";
    z-index: -1;
    left: 0;
    top: 13px;
    border-width: 0.6em;
    border-color: #fce13375;
    position: absolute;
    width: 100%;
    background-color: #fce13375;
    height: 16px;
}
</style>
	<input id="user_in_session" type="hidden" value="<?= $user_id; ?>">
	<div class="action">
        <div class="from-section">
            <form  action="<?= base_url('GradeBook/saveGradeBook');?>" method="post" id="ClassForm">  
                <div class="from-box mt_mobile">
                    
                    <div class="professional mt-3">
                        <h4>Class Detail</h4>
                    </div>
					
					<?php
							if(!empty($this->session->flashdata('email_error')))
							{
					?>
								<div class="row">
									<div class="alert alert-danger alert-dismissible">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>There are following emails did not exist our system </strong>
										<br>
										<?php
											$emails = explode(",",$this->session->flashdata('email_error'));
											if(!empty($emails))
											{
												$i = 0;
												foreach($emails as $email)
												{
													$i++;
													echo $i.". ".$email."<br>";
												}
											}
										?>
									</div>
								</div>
					<?php
							}
					?>
					
                    <div class="row">
                        
                        <div class="col-sm-6 col-md-6 col-lg-12">
                            <div class="from-field">
                                <div class="form-group">
                                    <input type="text" class="form-control require" placeholder="Class Name" name="class_name"  value="" required style="width: 92%;">
                                </div>
                            </div> 
                            <div class="from-field">
                                <div class="form-group">
                                    <input type="text" class="form-control require" placeholder="Class Details" name="class_detail" value="" required style="width: 92%;">
                                </div>
                            </div>

                            <div class="from-field">
                                <div class="form-group col-md-6 display-inline">
                                    <input type="text" class="form-control require" placeholder="Student Email (comma seperated)."  id="student_names" value="" required="" style="width: 92%;">
                                </div>
                            
                                <a onclick="javascript:;" id="add-email-btn" class="cursor"><img class="iconAddStyle" src="<?php echo base_url('assets/img/Icon_add.png'); ?>"> Add Students Email</a>
                                
                            </div>
                            
                            <div class="form-field">
                                <fieldset id="student-email-fieldset">
                                    <legend>Emails</legend>
                                </fieldset>
                            </div>
                        </div>        
                    </div>


                    <div class="professional mt-5">
                        <h4>Grading Scheme</h4>
                    </div>
                    <div class="row">
                        
                        <div class="col-sm-12 col-md-12 col-lg-12 grading_scheme_row" id="grading_scheme_row_1">
                            <div class="from-field">
                                <div class="form-group col-md-5 display-inline">
                                    <select class="form-control require" name="rubric_cat[]">
                                       <?php $this->load->view('helpers/rubric_categories'); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 display-inline">
                                    <input type="text" class="form-control percentage_weight require number_only" name="percentage_weight[]" placeholder="% weight">
                                </div>
								<a class="delete" data-rowId="1"><img class="iconDltStyle" src="<?php echo base_url('assets/img/Icon_delete.png'); ?>"><!--<i class="fas fa-trash-alt cursor"></i>--></a>
								<!--<form class="display-inline" action="#" method="post">
									<button class="delete"><i class="fas fa-trash-alt cursor"></i></button>
								</form>-->
                            </div> 
                        </div>  

                        <div class="col-sm-12 col-md-12 col-lg-12 grading_scheme_row" id="grading_scheme_row_2">    
                            <div class="from-field">
                                <div class="form-group col-md-5 display-inline">
                                    <select class="form-control require" name="rubric_cat[]">
                                        <?php $this->load->view('helpers/rubric_categories'); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 display-inline">
                                    <input type="text" class="form-control percentage_weight require number_only" name="percentage_weight[]" placeholder="% weight">
                                </div>
								<a class="delete" data-rowId="2"><img class="iconDltStyle" src="<?php echo base_url('assets/img/Icon_delete.png'); ?>"><!--<i class="fas fa-trash-alt cursor"></i>--></a>
								<!--<form class="display-inline" action="#" method="post">
									<button class="delete"><i class="fas fa-trash-alt cursor"></i></button>
								</form>-->
                            </div> 
                        </div>    

                        <div class="col-sm-12 col-md-12 col-lg-12 grading_scheme_row" id="grading_scheme_row_3">
                            <div class="from-field">
                                <div class="form-group col-md-5 display-inline">
                                    <select class="form-control require" name="rubric_cat[]">
                                        <?php $this->load->view('helpers/rubric_categories'); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 display-inline">
                                    <input type="text" class="form-control percentage_weight require number_only" name="percentage_weight[]" placeholder="% weight">
                                </div>
								<a class="delete" data-rowId="3"><img class="iconDltStyle" src="<?php echo base_url('assets/img/Icon_delete.png'); ?>"><!--<i class="fas fa-trash-alt cursor"></i>--></a>
								<!--<form class="display-inline" action="#" method="post">
									<button class="delete"><i class="fas fa-trash-alt cursor"></i></button>
								</form>-->
                            </div> 
                        </div>    

                        <div class="col-sm-12 col-md-12 col-lg-12 add_rubric_category">
                            <div class="from-field">
                                <div class="form-group col-md-5 display-inline">
                                    <a onclick="addCategory();" id="" class="cursor"><img class="iconAddStyle" src="<?php echo base_url('assets/img/Icon_add.png'); ?>"> Add Rubric/ Category</a>
                                </div>
                                <div class="form-group col-md-6 display-inline">
                                    <p class="remaining"></p>
                                </div>
                            </div> 

                            <div class="from-field mt-3">
                                <div class="form-group col-md-5 display-inline">
                                    <a onclick="submitClassForm()" style="color:white" class="btn-default">Save</a>
                                </div>
                            </div> 
                        </div>       
                    </div>
                    
                </div>
            </form>
        </div>
    </div>



    <div class="right-panel show_left_panel">
      <div class="board">
        <div class="templateSelection">
         <!--  <h3>Select your rubric</h3>
         <p class="orcls">or</p> -->
          <p> <button id="sfs" onclick="window.location.href='<?php echo base_url('gradebook'); ?>';" class="btn-default">New Gradebook</button></p>
            <div class="templatesList">
			
				<?php foreach($classes as $class): 
					$GradingStatistics = GetGradingStatisticsByClassID($class['id']);
				?>
				<div class="template" style="background: white;color: black;border-radius: 15px;height: 270px;width: 200px;overflow-y: auto;">
				  <div class="cv" style="font-size: 20px;padding: 15px;">
				  <h4 class="bg-text"><span class="subject ribbon-highlight" style="font-weight: bold;"><?= $class['class_name']; ?></span></h4>
                   <!-- <p class="subject ribbon-highlight" style="font-weight: bold;"><?= $class['class_name']; ?></p>-->
                    <p class="Semester" style="font-size:13px;"><?= $class['class_detail']; ?></p>
                    <p class="Semester" style="font-weight: bold;"><?php echo (isset($GradingStatistics['cum_avg'])) ? $GradingStatistics['cum_avg'] : "0"?>% Average</p>
                    <p class="Semester"><?php echo (isset($GradingStatistics['stnd_dev'])) ? $GradingStatistics['stnd_dev'] : "0"?>% SD</p>

                    <a href="javascript:;" onclick="return deleteClass(this)" class="cursor" style="text-decoration: underline;" data-href="<?= base_url().'gradebook/delete-class/'.$class['id']; ?>"><img class="iconEditStyle" src="<?php echo base_url('assets/img/Icon_delete.png'); ?>"></a>
                    <a href="<?= base_url().'gradebook/'.$class['id']; ?>" class="cursor" style="text-decoration: underline;"><img class="iconEditStyle" src="<?php echo base_url('assets/img/Icon_edit.png'); ?>"></a>
                    <a href="<?= base_url().'gradebook/marks-sheet/'.$class['id']; ?>" class="cursor" style="text-decoration: underline;"><img class="iconDtlStyle" src="<?php echo base_url('assets/img/Icon_detail.png'); ?>"></a>
                  </div>
				</div>
				<?php endforeach; ?>
            </div>
        </div>
      </div>
      <div class="introFooter">All Rights Reserved</div>
    </div>
  </div>
  
<?php echo $footer; ?>