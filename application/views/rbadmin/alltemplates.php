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
							<div class="col-md-10"><i class="fa fa-align-justify"></i> All Templates Grid</div>
							<div class="col-md-2"><a href="<?php echo base_url('rbadmin/templates/addtemplate');?>">Add</a></div>
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
                            <th>Template Name</th>
                            <th>Template Description</th>
                            <th>Status</th>
                            <th>Updated on</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($posts as $post){ ?>
                             <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $post['template_title']; ?></td>
                            <td><img style="max-width:100px;" src="<?php echo base_url(); ?>upload/<?php echo $post['template_thumb']; ?>"></td>
                            <td><?php if($post['template_status']==1){ ?>
								<span class="badge badge-secondary">Active</span>                                
                            <?php } else if($post['template_status']==2){?>
								<span class="badge badge-success">In active</span>
								<?php }  ?> 
                            </td>
                            <td>
								<?php echo $post['updated_on']; ?>
                            </td>
                            <td>									 	
                                <a href="<?php echo base_url('rbadmin/templates/edittemplate/'.$post['template_id']); ?>">Edit</a> | <a href="<?php echo base_url('rbadmin/templates/deletetemplate/'.$post['template_id']);?>">Delete</a> 
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

