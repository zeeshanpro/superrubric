<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo $header; ?>
    <Style>
        .action-introWrapper .body {
            align-items: flex-start !important;
        }
        
        .action-introWrapper .body button {
            margin-top: 10px;
        }
    </Style>
	<div class="action">
      <div class="action-introWrapper">
        <div class="body">
          <div class="imageleft">
            <h1 class="bg-text"><span class="ribbon-highlight">Student assessment
</span><br> made simple.</h1>
            <?php /*
            <ul class="d-none">
              <li>
                <div class="numberWrapper">1</div>
                <span>Select a template or assignment design.</span></li>
              <li>
                <div class="numberWrapper">2</div>
                <span>Customize it to your school, classroom and students (or leave it as is).</span></li>
              <li>
                <div class="numberWrapper">3</div>
                <span>Download your free rubric template.</span></li>
            </ul>
            */ ?> 
          </div>
          <button onclick="window.location.href='https://www.superrubric.com/src/how-it-works/';" class="btn-default">Get Started</button>
        </div>
      </div>
    </div>
    <div class="right-panel show_left_panel">
      <div class="board_landing_page">
		<?php /*
        <div class="introWrapper"><img class="introductionImage" src="<?php echo base_url('assets/img/edit.png'); ?>">
        */ ?>
          <!--<button id="headingOne" onClick="window.location.href='<?php echo base_url('templates'); ?>';" class="btn-default">Create</button>-->
        </div>
       
		<div class="introFooter">All Rights Reserved</div>
		</div>
    </div>
  
<?php echo $footer; ?>
<?php
if(isset($type) && $type == "login")
{
?>
<script>
$("#loginbutton").click();
</script>
<?php
}
?>