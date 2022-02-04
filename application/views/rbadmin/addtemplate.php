<?php echo $header; ?>
<div class="card">
	<div class="card-header">Add Templates</div>
	<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo $formaction; ?>" method="post">
	<div class="card-body">
		<?php if($this->session->flashdata('sucess_message')): ?>
			<div class="col-md-12 text-center mb-5">
				<?php echo $this->session->flashdata('sucess_message');?>
			</div>
		<?php endif; ?>
		<div class="form-group row">
		  <label class="col-sm-5 col-form-label" for="template_title">Template title</label>
		  <div class="col-sm-6">
			<input class="form-control" id="template_title" type="text" name="template_title" value="<?php echo $template_title; ?>" placeholder="" required>
		  </div>
		</div>
		<div class="form-group row">
		  <label class="col-sm-5 col-form-label" for="template_description">Template Description</label>
		  <div class="col-sm-6">
			<textarea rows="4" class="form-control" name="template_description" id="template_description" ><?php echo $template_description; ?></textarea> 
		  </div>
		</div>
		<div class="form-group row">
		  <label class="col-sm-5 col-form-label" for="template_thumb">Template Thumbnail</label>
		  <div class="col-sm-4">
			<input id="template_thumb" type="file" name="template_thumb" <?php if(!$template_thumb): ?> required <?php endif; ?>>
			<input type="hidden" name="hd_template_thumb" id="hd_template_thumb" value="<?php echo $template_thumb; ?>">
		  </div>
		  <div class="col-md-2">
			<?php if($template_thumb): ?><img style="max-width:100px;" src="<?php echo base_url(); ?>upload/<?php echo $template_thumb; ?>"> <?php endif; ?>
		  </div>
		</div>
		<div class="form-group row">
		  <label class="col-md-5 col-form-label" for="template_status">Status</label>
		  <div class="col-md-6">
			<select class="form-control" id="template_status" name="template_status">
			  <option <?php if($template_status==1): ?> selected <?php endif; ?> value="1">Active</option>
			  <option <?php if($template_status==2): ?> selected <?php endif; ?> value="2">In active</option>
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
   
  

