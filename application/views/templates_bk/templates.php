<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo $header; ?>
	<div class="action">
      <div class="action-introWrapper">
        <div class="body">
          <div class="imageleft">
            <h1 class="bg-text">Select your<br>
              <span class="ribbon-highlight-1">free rubric</span><br>
               template.</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="right-panel">
      <div class="board">
        <div class="templateSelection">
         <!--  <h3>Select your rubric</h3>
         <p class="orcls">or</p> -->
          <p> <button id="sfs" onclick="window.location.href='<?php echo base_url('templates/blankrubric/11'); ?>';" class="btn-default">Start from Scratch</button></p>
          <div class="templatesList">
			<?php foreach($template as $temp) : ?>  
				<div class="template">
					<?php 	
							$slug = "";
							
							if($temp['template_id']==1){
								$slug = base_url('/templates/artsproject/'.$temp['template_id']);
							}
							if($temp['template_id']==2){
								$slug = base_url('/templates/bookreport/'.$temp['template_id']);
							}
							if($temp['template_id']==3){
								$slug = base_url('/templates/highschoolessay/'.$temp['template_id']);
							}
							if($temp['template_id']==4){
								$slug = base_url('/templates/discussionforum/'.$temp['template_id']);
							}
							if($temp['template_id']==5){
								$slug = base_url('/templates/literacycheck/'.$temp['template_id']);
							}
							if($temp['template_id']==6){
								$slug = base_url('/templates/numeracycheck/'.$temp['template_id']);
							}
							if($temp['template_id']==7){
								$slug = base_url('/templates/physedrubric/'.$temp['template_id']);
							}
							if($temp['template_id']==8){
								$slug = base_url('/templates/readingresponse/'.$temp['template_id']);
							}
							if($temp['template_id']==9){
								$slug = base_url('/templates/researchpaper/'.$temp['template_id']);
							}
							if($temp['template_id']==10){
								$slug = base_url('/templates/journalentry/'.$temp['template_id']);
							}
							 
					?>
				  <div class="cv"><a href="<?php echo $slug; ?>"><img src="<?php echo base_url('upload/'.$temp['template_thumb']); ?>"></a></div>
				</div>
            <?php endforeach; ?>
              
          </div>
        </div>
      </div>
      <div class="introFooter">All Rights Reserved</div>
    </div>
  </div>
  
<?php echo $footer; ?>
