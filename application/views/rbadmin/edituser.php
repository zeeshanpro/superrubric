<?php echo $header; ?>
<div class="card">
	<div class="card-header"><?php echo $pagetitle; ?></div>
	<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo $formaction; ?>" method="post">
	<div class="card-body">
		<?php if($this->session->flashdata('sucess_message')): ?>
			<div class="col-md-12 text-center mb-5">
				<?php echo $this->session->flashdata('sucess_message');?>
			</div>
		<?php endif; ?>
		<div class="form-group row">
		  <label class="col-sm-5 col-form-label" for="user_email">User email</label>
		  <div class="col-sm-6">
			<input class="form-control" id="user_email" type="text" name="user_email" value="<?php echo $user_email; ?>" placeholder="" readonly required>
		  </div>
		</div>
		<div class="form-group row">
		  <label class="col-sm-5 col-form-label" for="user_password">Password</label>
		  <div class="col-sm-6">
			<input type="password" class="form-control" name="user_password" id="user_password" autocomplete="off" >
			<?php if($password_error): ?>
			<div style="color:#F00;"><?php echo $password_error; ?></div>
		  <?php endif; ?>
		  
		  </div>
		  
		</div>
		<div class="form-group row">
		  <label class="col-sm-5 col-form-label" for="user_cnfpassword">Confirm password</label>
		  <div class="col-sm-6">
			<input type="password" class="form-control" name="user_cnfpassword" id="user_cnfpassword" autocomplete="off" > 
			<?php if($passconf_error): ?>
			<div style="color:#F00;"><?php echo $passconf_error; ?></div>
			<?php endif; ?>
			<input type="checkbox" onclick="return myFunction();">Show Password 
		  </div>
		  
		</div>
		
		 
		<div class="form-group row">
		  <label class="col-md-5 col-form-label" for="is_active">Status</label>
		  <div class="col-md-6">
			<select class="form-control" id="is_active" name="is_active">
			  <option <?php if($is_active == 1): ?> selected <?php endif; ?> value="1">Active</option>
			  <option <?php if($is_active == 2): ?> selected <?php endif; ?> value="2">In active</option>
			 </select>
		  </div>
		</div>
		
		<div class="form-group row">
		  <label class="col-md-5 col-form-label" for="expiry_date">Expiry Date</label>
		  <div class="col-md-6">
			<input class="form-control" id="expiry_date" type="date" name="expiry_date" value="<?php echo $expiry_date; ?>" placeholder="" required>
		  </div>
		</div>
		 
	  
	</div>
	<div class="card-footer">
	  <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
	</div>
	</form>
  </div>
  <script>
	function myFunction() {
	  var x = document.getElementById("user_cnfpassword");
	  if (x.type === "password") {
		x.type = "text";
	  } else {
		x.type = "password";
	  }
	} 
  
  </script>
          
<?php echo $footer; ?>
   
  

