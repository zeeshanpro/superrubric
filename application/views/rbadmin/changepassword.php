<?php echo $header; ?>
    <div class="c-body">
        <main class="c-main">
          <div class="container-fluid">
            <div class="fade-in">             
              <div class="row">
               <div class="col-md-8">
                  <div class="card">
                    <div class="card-header"><strong>Change</strong> Password
                    <?php if($this->session->flashdata('success')){?>
						<span style="font-size:12px;color:#f00;">  <?php echo $this->session->flashdata('success');?> </span>
					<?php }?>
                    </div>
                    
                     <?php echo form_open_multipart('admin/updatepassword'); ?>
                    <div class="card-body">                     
                        <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="hf-email">New-Password</label>
                          <div class="col-md-9">
                            <input class="form-control" id="newpassword" type="password" name="newpassword" placeholder="Enter New-Password.." required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="hf-password">Confirm Password</label>
                          <div class="col-md-9">
                            <input class="form-control" id="confpassword" type="password" name="confpassword" placeholder="Confirm Password.." required>
                          </div>
                        </div>
                     
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                      <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                    </div>
                     <?php echo form_close(); ?> 
                  </div>
               </div>
                <!-- /.col-->
              </div>
              <!-- /.row-->
           
            </div>
          </div>
        </main>
         
<?php echo $footer; ?>            
  


