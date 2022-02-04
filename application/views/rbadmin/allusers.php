<?php echo $header; ?> 
 <div class="c-body">
        <main class="c-main">
          <div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
						<div class="row">
							<div class="col-md-10"><i class="fa fa-align-justify"></i> All Users Grid</div>
							<!--<div class="col-md-2"><a href="<?php //echo base_url('rbadmin/users/adduser');?>">Add</a></div>-->
						</div>
					</div>
                    <div class="card-body">
						<?php if($this->session->flashdata('sucess_message')): ?>
							<div class="col-md-12 text-center mb-5">
								<?php echo $this->session->flashdata('sucess_message');?>
							</div>
						<?php endif; ?>	
                      <table class="table table-responsive-sm">
                        <thead>
                          <tr>
                            <th>Sr. no.</th>
                            <th>User email</th>
                            <th>User type</th>
                            <th>Status</th>
                            <th>Expiry Date</th>
                            <th>Created on</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($posts as $post){ ?>
                             <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $post['user_email']; ?></td>
                            <td><?php if($post['is_google_user']){ echo "Google user";}else{ echo "Standard user"; } ?></td>
                            <td><?php if($post['is_active']==1){ ?>
								<span class="badge badge-secondary">Active</span>                                
                            <?php } else if($post['is_active']==2){?>
								<span class="badge badge-danger">Inactive</span>
								<?php }  ?> 
                            </td>
                            <td>
								<?php echo $post['expiry_date']; ?>
                            </td>
                            <td>
								<?php echo $post['created_on']; ?>
                            </td>
                            <td>									 	
                                <a href="<?php echo base_url('rbadmin/users/edituser/'.$post['user_id']); ?>">Edit</a> | <a href="<?php echo base_url('rbadmin/users/deleteuser/'.$post['user_id']);?>">Delete</a> 
                            </td>
                          </tr>
                            
                        <?php $i++; }?>                          
                         
                        </tbody>
                      </table>
                      <?php echo $links;?>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                
              </div>
              <!-- /.row-->
             
            </div>
          </div>
        </main>      
    
    <?php echo $footer; ?>     

