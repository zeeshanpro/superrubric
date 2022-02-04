<?php echo $header; ?>
<div class="card">
	<div class="card-header"><?php echo $pagetitle; ?></div>
	<form class="form-horizontal" enctype="multipart/form-data" action="<?= $formaction; ?>" method="post">
	<div class="card-body">
		<?php if($this->session->flashdata('sucess_message')): ?>
			<div class="col-md-12 text-center mb-5">
				<?php echo $this->session->flashdata('sucess_message');?>
			</div>
		<?php endif; ?>
		<div class="form-group row">
		  <label class="col-sm-5 col-form-label" for="">School Name</label>
		  <div class="col-sm-6">
			<input class="form-control" id="" type="text" name="school_name" value="" placeholder=""  required>
		  </div>
		</div>
		<div class="form-group row">
		  <label class="col-sm-5 col-form-label" for="">Primary Contact</label>
		  <div class="col-sm-6">
			<input type="text" class="form-control" name="email" id="" autocomplete="off" >
		  </div>
		</div>
		<div class="form-group row">
		  <label class="col-md-5 col-form-label" for="is_active">Status</label>
		  <div class="col-md-6">
			<select class="form-control" name="status">
			  <option value="1">Active</option>
			  <option value="2">In active</option>
			 </select>
		  </div>
		</div>
		 
	  
	</div>
	<div class="card-footer">
	  <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
	</div>
	</form>
  </div>
          
<?php echo $footer; ?>
   
  

