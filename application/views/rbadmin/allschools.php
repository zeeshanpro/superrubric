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
							<div class="col-md-10"><i class="fa fa-align-justify"></i> All Schools</div>
							<div class="col-md-2"> <a href="<?php echo base_url('rbadmin/schools/addSchool');?>"><i class="fas fa-plus-circle">&nbsp;Add New School</i></a></div>
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
                            <th>School Name</th>
                            <th>Primary Contact</th>
                            <th>Status</th>
                            <th>Created on</th>
                            <th>Action</th>
                          </tr> 
                        </thead>
                        <tbody>
                             <?php foreach($schools as $school){ ?>
                             <tr>
                            <td><?php echo $school['id'];?></td>
                            <td><?php echo $school['school_name']; ?></td>
                            <td><?php echo $school['email']; ?></td>
                            <td><?php if($school['status']==1){ ?>
								<span class="badge badge-secondary">Active</span>                                
                            <?php } else if($school['status']==2){?>
								<span class="badge badge-success">In active</span>
								<?php }  ?> 
                            </td>
                            <td>
								<?php echo $school['created_at']; ?>
                            </td>
                            <td>									 	
                                <a href="<?php echo base_url('rbadmin/schools/editSchool/'.$school['id']); ?>">Edit</a> | <a href="<?php echo base_url('rbadmin/schools/deleteSchool/'.$school['id']);?>">Delete</a> 
                            </td>
                          </tr>
                            
                        <?php  }?>                            
                         
                        </tbody>
                      </table>
                 
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

