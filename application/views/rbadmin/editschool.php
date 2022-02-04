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
		<table class="table table-responsive-sm">
			<thead>
			  <tr>
				<th><?= $school['id']; ?></th>
				<th><?= $school['school_name']; ?></th>
				<th><?= $school['email']; ?></th>
				<th><?php if($school['status']==1){ ?>
								<span class="badge badge-secondary">Active</span>                                
                            <?php } else if($school['status']==2){?>
								<span class="badge badge-success">In active</span>
								<?php }  ?></th>
				<th><?= $school['created_at']; ?></th>
				<th>200 Users</th>
			  </tr> 
			</thead>
		</table>
		
		
		<table class="table table-responsive-sm" id="student-teacher-table">
                        <thead>
                          <tr>
                            <th>Sr. no.</th>
                            <th>User email</th>
                            <th>User type</th>
                            <th>Status</th>
                            <th>Created on</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($posts as $post){ ?>
                             <tr>
                            <td><?php echo $post['user_id'];?></td>
                            <td><?php echo $post['user_email']; ?></td>
                            <td><?php if($post['user_type'] == 1) { echo "Teacher";}else{ echo "Student"; } ?></td>
                            <td><?php if($post['is_active']==1){ ?>
								<span class="badge badge-secondary">Active</span>                                
                            <?php } else if($post['is_active']==2){?>
								<span class="badge badge-success">In active</span>
								<?php }  ?> 
                            </td>
                            <td>
								<?php echo $post['created_on']; ?>
                            </td>
                            <td>									 	
                                <a href="<?php echo base_url('rbadmin/users/edituser/'.$post['user_id']); ?>">Edit</a> | <a href="<?php echo base_url('rbadmin/users/deleteuser/'.$post['user_id']);?>">Delete</a> 
                            </td>
                          </tr>
                            
                        <?php  }?>                          
                         
                        </tbody>
                      </table>
		 
	  
	</div>
	<div class="card-footer"> 
	  
	</div>
	</form>
  </div>
          
<?php echo $footer; ?>
   
  

