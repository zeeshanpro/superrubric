<style>
.spanStyle {
    margin: 5px 0;
    color: #000;
    font-weight: 600;
    font-size: 14px;
}

</style>
<div class="mt-2">
  <div class="heading from-box">
	<h4>Assignment Details</h4>  
	
	<h3 class="mt-4">
		<input type="text" class="form-control"  name="txt_1" id="txt_1" placeholder="Title" value="<?php echo $template['template_title']; ?>" onKeyUp="return setTextToDiv('1');">
		<input type="hidden" name="hd_templateid" id="hd_templateid" value="<?php echo $template_id; ?>">
	</h3>
  </div>
  
  <div class="row assignment-detail">
	 
	<div class="col-6">
	  <div class="form-group" for="txt_4"><span class="spanStyle">Student Name</span>
		<input type="text" class="form-control" name="txt_2" id="txt_2" placeholder="Student name" onKeyUp="return setTextToDiv('2');">
	  </div>
	</div>
	<div class="col-6">
	  <div class="form-group" for="txt_3"><span class="spanStyle">Class Name</span>
		<input type="text" class="form-control" name="txt_3" id="txt_3" placeholder="Class Name" onKeyUp="return setTextToDiv('3');">
	  </div>
	</div>
	<div class="col-6">
	  <div class="form-group" for="txt_2"><span class="spanStyle">Teacher Name</span>
		<input type="text" class="form-control" name="txt_4" id="txt_4" placeholder="Teacher Name" onKeyUp="return setTextToDiv('4');">
	  </div>
	</div>
	
	
	<div class="col-6">
	  <div class="form-group" for="txt_5"><span class="spanStyle">Date</span>
		<input type="text" class="form-control datepicker" name="txt_5" id="datepicker" placeholder="dd-mm-yyyy" onKeyUp="return setTextToDiv('5');">
	  </div>
	</div>
	<div class="col-6">
	    <span class="spanStyle">Add Image</span>
	  <div class="upload">
		  <div id="imgoverlay" class="uploadlogo_overlay d-none">
			<img src="<?php echo base_url('assets/img/loadingAnimation.gif'); ?>">
		  </div>
		  <img src="<?php echo base_url('assets/img/upload.svg'); ?>">
		<p>Max file size: 5mb, accepted: jpg|png</p>
		 
		  <input onChange="return saveUploadedFile();" type="file" id="myfile" name="myfile">
		  <br>
		  <br>
		 <input type="hidden" name="hd_logoimgpath" id="hd_logoimgpath" value="">
	  </div>
	</div>
  </div>
 </div>          
