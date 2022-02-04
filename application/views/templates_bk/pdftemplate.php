<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
<link rel="stylesheet" type="text/css" href="<?php echo $url_style; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo $bt_style; ?>">
<style> 
@page { margin: 1.7cm 2cm; }
.right-panel{font-size: 12px !important; color: black;}
.table-bordered{
	position: relative;	
}
.table-section ul {
    display: table !important;
    width: 100%  !important;
    position: absolute;
	bottom: 0;
}
.table-section ul li {
    display: table-cell !important;
}    

.media-text h3 {
    font-size: 30px  !important;
    font-weight: bold  !important;
}
.resume table thead th p {
    font-size: 10px;
    font-weight: normal;
}
 
.resume {
    overflow-y: hidden;
    padding: 20px 30px;
    width: 100%;
    margin:0 auto;
    background:none;
    
}
.top-header{
	margin-top:10px;	
}
.innertable td{
	border: 2px dotted #000;
	border-collapse: collapse;
}
.topborder{
	border-top: none !important;
}
.bottomborder{
	border-bottom: none !important;
}

.right-panel {
	 
	<?php if($hd_templateid == 3 || $hd_templateid == 5) : ?>
	background: url(<?php echo base_url('assets/img/LITERACY-CHECK-pdf.jpg'); ?>)  #fff no-repeat;
	<?php elseif($hd_templateid == 1 || $hd_templateid == 4 || $hd_templateid == 6 || $hd_templateid == 7 || $hd_templateid == 11) : ?>
	background: url(<?php echo base_url('assets/img/DISCUSSION-FORU-pdf.jpg'); ?>) #fff no-repeat;
	<?php elseif($hd_templateid == 10) : ?>
	background: url(<?php echo base_url('assets/img/JOURNAL-ENTRY-pdf.jpg'); ?>) #fff no-repeat;
	<?php elseif($hd_templateid == 2 ||  $hd_templateid == 8 || $hd_templateid == 9) : ?>
	background: url(<?php echo base_url('assets/img/READING-RESPONSE-pdf.jpg'); ?>) #fff no-repeat; 
	<?php else : ?>
	background-image: url(<?php echo base_url('/assets/img/DISCUSSION-FORU-pdf.jpg'); ?>); 
	<?php endif; ?>
	
	background-color: #FFF; 
	background-position:center bottom !important; 
	background-repeat:no-repeat  !important;
	 
}
.media-text h3{
	background: #fce13375 !important;
	padding-right: 5px;
	text-transform: uppercase;
}
.thbold{
		font-weight: bold !important;
}
.bg-red{
    background: #fce13375 !important;
}
.bg-gry p{
    margin-top: 20px;

    background: transparent !important;
}
.table thead th img {
	max-width: 110px;
}
.fce175{
    background: #fce175;
}

.fs-12 {
    font-size: 12px !important;
}
</style>

<body>
 	<div class="right-panel" style="page-break-after: auto;">
      <div class="">
        <div class="resume">
          <div class="top-header">
            <div class="row align-items-center">
				<div class="col-md-8">
					<div class="media-main" style="margin-left: 30px;">
					  <div id="logoimg" class="media-logo"><img style="width:102px;" src="<?php echo $hd_logoimgpath; ?>"></div>
					  <div class="media-text" style="">
						<h3 id="txtdiv_1"><?php echo $txt_1; ?></h3>
						<p><?php if($txt_2 != "Student name"){ ?>| <span id="txtdiv_2"><?php echo $txt_2; ?></span> <?php }else{ echo "<br><br>";} ?></p>
					  </div>
					</div>
				</div>
				<div class="col-md-4" style="height:50px !important;">
					<h4><?php if($txt_3 != "Class Name"){ ?><span id="txtdiv_3"><?php echo $txt_3; ?></span> |<?php }else{echo "<br><br>";} ?></h4>
					<h4><?php if($txt_4 != "Teacher Name"){ ?><span id="txtdiv_4"><?php echo $txt_4; ?></span> |<?php }else{echo "<br><br>";} ?></h4>
					<h4><?php if($txt_5 != "dd-mm-yyyy"){ ?><span id="txtdiv_5"><?php echo $txt_5; ?></span> |<?php }else{echo "<br><br>";} ?></h4>
				</div>
            </div>
            <div class="table-section">
              <table class="table table-bordered school-table" <?php if($type == 'pdf') { echo 'style="margin-top:-30px;"'; } ?>>
                <thead>
                  <tr>
                    <th scope="col" id="txtdiv_6"><img src="<?php echo base_url('assets/img/headimg/assessment-criteria.jpg'); ?>"></th>
                    <th scope="col" id="txtdiv_7"><img src="<?php echo base_url('assets/img/headimg/developing.jpg'); ?>"></th>
                    <th scope="col" id="txtdiv_8"><img src="<?php echo base_url('assets/img/headimg/achieving.jpg'); ?>"></th>
                    <th scope="col" id="txtdiv_9"><img src="<?php echo base_url('assets/img/headimg/mastering.jpg'); ?>"></th>
                    <th class="bg-red" scope="col" id="txtdiv_10"><img src="<?php echo base_url('assets/img/headimg/score.jpg'); ?>"></th>
                 </tr>
                </thead>
                <tbody>
                  <!--Box 1--->
                  <tr>
                    <th class="bg-gry bottomborder" scope="row"><span id="txtdiv_11" class="thbold"><?php if($txt_11 != ""){ echo nl2br($txt_11); }else{ echo "<br><br><br><br><br><br><br><br>";} ?></span>
                      <p id="txtdiv_12"><?php echo $txt_12; ?></p></th>
                    <td><div class="pd5"><p id="txtdiv_13"><?php if($txt_13 != ""){ echo nl2br($txt_13); }else{ echo "<br><br><br>";} ?></p></div></td>
                    <td><div class="pd5"><p id="txtdiv_18"><?php echo nl2br($txt_18); ?></p></div></td>
                    <td><div class="pd5"><p id="txtdiv_23"><?php echo nl2br($txt_23); ?></p></div></td>
                    <td class="bottomborder"><p id="txtdiv_28"><?php if($txt_28 != "Score"){ echo $txt_28; } ?></p></td>
                  </tr>
                  <tr>
					<td class="topborder bg-gry"></td> 
					
					<td>
						<table class="innertable" width="100%">
							<tr>
								<td <?php if(isset($stanine_1) == true && $stanine_1  >= 15) { echo 'class="fce175"'; } ?> id="txtdiv_15">1</td>
								<td <?php if(isset($stanine_1) == true && $stanine_1 >= 16) { echo 'class="fce175"'; } ?> id="txtdiv_16">2</td>
								<td <?php if(isset($stanine_1) == true && $stanine_1 >= 17) { echo 'class="fce175"'; } ?> id="txtdiv_17">3</td>
							</tr>
						</table>
						
						
					</td>
					<td>
						<table class="innertable" width="100%">
							<tr>
							<td <?php if(isset($stanine_1) == true && $stanine_1 >= 20) { echo 'class="fce175"'; } ?> id="txtdiv_20">4</td>
							<td <?php if(isset($stanine_1) == true && $stanine_1 >= 21) { echo 'class="fce175"'; } ?> id="txtdiv_21">5</td>
							<td <?php if(isset($stanine_1) == true && $stanine_1 >= 22) { echo 'class="fce175"'; } ?> id="txtdiv_22">6</td>
							</tr>
						</table>
					</td>
					<td>
						<table class="innertable" width="100%">
							<tr>
							<td <?php if(isset($stanine_1) == true && $stanine_1 >= 25) { echo 'class="fce175"'; } ?> id="txtdiv_25">7</td>
							<td <?php if(isset($stanine_1) == true && $stanine_1 >= 26) { echo 'class="fce175"'; } ?> id="txtdiv_26">8</td>
							<td <?php if(isset($stanine_1) == true && $stanine_1 >= 27) { echo 'class="fce175"'; } ?> id="txtdiv_27">9</td>
							</tr>
						</table>
					</td>
					 
                  <td class="topborder"></td> 
                  </tr>
                  
                  <!--Box 2--->
                  <tr>
                    <th class="bg-gry bottomborder" scope="row"><span id="txtdiv_29" class="thbold"><?php if($txt_29 != ""){ echo nl2br($txt_29); }else{ echo "<br><br><br><br><br><br><br><br>";} ?></span>
                      <p id="txtdiv_30"><?php echo $txt_30; ?></p></th>
                    <td><div class="pd5"><p id="txtdiv_31"><?php echo nl2br($txt_31); ?></p></div></td>
                    <td><div class="pd5"><p id="txtdiv_35"><?php echo nl2br($txt_35); ?></p></div></td>
                    <td><div class="pd5"><p id="txtdiv_39"><?php echo nl2br($txt_39); ?></p></div></td>
                    <td class="bottomborder"><p id="txtdiv_43"><?php if($txt_43 != "Score"){ echo $txt_43; } ?></p></td>
                  </tr>
                  <tr>
					<td class="topborder bg-gry"></td> 
					
					 
					<td>
						<table class="innertable" width="100%">
							<tr>
								<td <?php if(isset($stanine_2) == true && $stanine_2 >= 32) { echo 'class="fce175"'; } ?> id="txtdiv_32">1</td>
								<td <?php if(isset($stanine_2) == true && $stanine_2 >= 33) { echo 'class="fce175"'; } ?> id="txtdiv_33">2</td>
								<td <?php if(isset($stanine_2) == true && $stanine_2 >= 34) { echo 'class="fce175"'; } ?> id="txtdiv_34">3</td>
							</tr>
						</table>
						
						
					</td>
					<td>
						<table class="innertable" width="100%">
							<tr>
							<td <?php if(isset($stanine_2) == true && $stanine_2 >= 36) { echo 'class="fce175"'; } ?> id="txtdiv_36">4</td>
							<td <?php if(isset($stanine_2) == true && $stanine_2 >= 37) { echo 'class="fce175"'; } ?> id="txtdiv_37">5</td>
							<td <?php if(isset($stanine_2) == true && $stanine_2 >= 38) { echo 'class="fce175"'; } ?> id="txtdiv_38">6</td>
							</tr>
						</table>
					</td>
					<td>
                       <table class="innertable" width="100%">
							<tr>
							<td <?php if(isset($stanine_2) == true && $stanine_2 >= 40) { echo 'class="fce175"'; } ?> id="txtdiv_40">7</td>
							<td <?php if(isset($stanine_2) == true && $stanine_2 >= 41) { echo 'class="fce175"'; } ?> id="txtdiv_41">8</td>
							<td <?php if(isset($stanine_2) == true && $stanine_2 >= 42) { echo 'class="fce175"'; } ?> id="txtdiv_42">9</td>
							</tr>
						</table>
					</td>
					 
                  <td class="topborder"></td> 
                  </tr>
                  
                  <!--Box 3--->
                  <tr>
                    <th class="bg-gry bottomborder" scope="row"><span id="txtdiv_44" class="thbold"><?php if($txt_44 != ""){ echo nl2br($txt_44); }else{ echo "<br><br><br><br><br><br><br><br>";} ?></span>
                      <p id="txtdiv_45"><?php echo $txt_45; ?></p></th>
                    <td><div class="pd5"><p id="txtdiv_46"><?php echo nl2br($txt_46); ?></p></div></td>
                    <td><div class="pd5"><p id="txtdiv_50"><?php echo nl2br($txt_50); ?></p></div></td>
                    <td><div class="pd5"><p id="txtdiv_54"><?php echo nl2br($txt_54); ?></p></div></td>
                    <td class="bottomborder"><p id="txtdiv_58"><?php if($txt_58 != "Score"){ echo $txt_58; } ?></p></td>
                  </tr>
                  <tr>
					<td class="topborder bg-gry"></td> 
					  
					<td>
						<table class="innertable" width="100%">
							<tr>
								<td <?php if(isset($stanine_3) == true && $stanine_3 >= 47) { echo 'class="fce175"'; } ?> id="txtdiv_47">1</td>
								<td <?php if(isset($stanine_3) == true && $stanine_3 >= 48) { echo 'class="fce175"'; } ?> id="txtdiv_48">2</td>
								<td <?php if(isset($stanine_3) == true && $stanine_3 >= 49) { echo 'class="fce175"'; } ?> id="txtdiv_49">3</td>
							</tr>
						</table>
						
						
					</td>
					<td>
						<table class="innertable" width="100%">
							<tr>
								<td <?php if(isset($stanine_3) == true && $stanine_3 >= 51) { echo 'class="fce175"'; } ?> id="txtdiv_51">4</td>
								<td <?php if(isset($stanine_3) == true && $stanine_3 >= 52) { echo 'class="fce175"'; } ?> id="txtdiv_52">5</td>
								<td <?php if(isset($stanine_3) == true && $stanine_3 >= 53) { echo 'class="fce175"'; } ?> id="txtdiv_53">6</td>
							</tr>
						</table>
					</td>
					<td>
                       <table class="innertable" width="100%">
							<tr>
							<td <?php if(isset($stanine_3) == true && $stanine_3 >= 55) { echo 'class="fce175"'; } ?> id="txtdiv_55">7</td>
							<td <?php if(isset($stanine_3) == true && $stanine_3 >= 56) { echo 'class="fce175"'; } ?> id="txtdiv_56">8</td>
							<td <?php if(isset($stanine_3) == true && $stanine_3 >= 57) { echo 'class="fce175"'; } ?> id="txtdiv_57">9</td>
							</tr>
						</table>
					</td>
					 
                  <td class="topborder"></td> 
                  </tr>
                  
                  
                  <!--Box 4--->
                  <tr>
                    <th class="bg-gry bottomborder" scope="row"><span id="txtdiv_59" class="thbold"><?php if($txt_59 != ""){ echo nl2br($txt_59); }else{ echo "<br><br><br><br><br><br><br><br>";} ?></span>
                      <p id="txtdiv_60"><?php echo $txt_60; ?></p></th>
                    <td><div class="pd5"><p id="txtdiv_61"><?php echo nl2br($txt_61); ?></p></div></td>
                    <td><div class="pd5"><p id="txtdiv_65"><?php echo nl2br($txt_65); ?></p></div></td>
                    <td><div class="pd5"><p id="txtdiv_69"><?php echo nl2br($txt_69); ?></p></div></td>
                    <td class="bottomborder"><p id="txtdiv_73"><?php if($txt_73 != "Score"){ echo $txt_73; } ?></p></td>
                  </tr>
                  <tr>
					<td class="topborder bg-gry"></td> 
					  
                       
					<td>
						<table class="innertable" width="100%">
							<tr>
								<td <?php if(isset($stanine_4) == true && $stanine_4 >= 62) { echo 'class="fce175"'; } ?> id="txtdiv_62">1</td>
								<td <?php if(isset($stanine_4) == true && $stanine_4 >= 63) { echo 'class="fce175"'; } ?> id="txtdiv_63">2</td>
								<td <?php if(isset($stanine_4) == true && $stanine_4 >= 64) { echo 'class="fce175"'; } ?> id="txtdiv_64">3</td>
							</tr>
						</table>
					</td>
					<td>
						<table class="innertable" width="100%">
							<tr>
								<td <?php if(isset($stanine_4) == true && $stanine_4 >= 66) { echo 'class="fce175"'; } ?> id="txtdiv_66">4</td>
								<td <?php if(isset($stanine_4) == true && $stanine_4 >= 67) { echo 'class="fce175"'; } ?> id="txtdiv_67">5</td>
								<td <?php if(isset($stanine_4) == true && $stanine_4 >= 68) { echo 'class="fce175"'; } ?> id="txtdiv_68">6</td>
							</tr>
						</table>
					</td>
					<td>
					   <table class="innertable" width="100%">
							<tr>
							<td <?php if(isset($stanine_4) == true && $stanine_4 >= 70) { echo 'class="fce175"'; } ?> id="txtdiv_70">7</td>
							<td <?php if(isset($stanine_4) == true && $stanine_4 >= 71) { echo 'class="fce175"'; } ?> id="txtdiv_71">8</td>
							<td <?php if(isset($stanine_4) == true && $stanine_4 >= 72) { echo 'class="fce175"'; } ?> id="txtdiv_72">9</td>
							</tr>
						</table>
					</td>
					 
                  <td class="topborder"></td> 
                  </tr>
                  
                  
                  <!--Box 5--->
                  <tr>
                    <th style="height: 30px !important;" class="bg-gry bottomborder" scope="row"><span id="txtdiv_74" class="thbold"><?php if($txt_74 != ""){ echo nl2br($txt_74); }else{ echo "<br><br><br><br><br><br><br><br>";} ?></span>
                      <p id="txtdiv_75"><?php echo $txt_75; ?></p></th>
                    <td><div class="pd5"><p id="txtdiv_76"><?php echo nl2br($txt_76); ?></p></div></td>
                    <td><div class="pd5"><p id="txtdiv_80"><?php echo nl2br($txt_80); ?></p></div></td>
                    <td><div class="pd5"><p id="txtdiv_84"><?php echo nl2br($txt_84); ?></p></div></td>
                    <td class="bottomborder"><div class="pd5"><p id="txtdiv_88"><?php if($txt_88 != "Score"){ echo $txt_88; } ?></p></td></div>
                  </tr>
                  <tr>
					<td class="topborder bg-gry"></td> 
					 
					<td>
						<table class="innertable" width="100%">
							<tr>
								<td <?php if(isset($stanine_5) == true && $stanine_5 >= 77) { echo 'class="fce175"'; } ?> id="txtdiv_77">1</td>
								<td <?php if(isset($stanine_5) == true && $stanine_5 >= 78) { echo 'class="fce175"'; } ?> id="txtdiv_78">2</td>
								<td <?php if(isset($stanine_5) == true && $stanine_5 >= 79) { echo 'class="fce175"'; } ?> id="txtdiv_79">3</td>
							</tr>
						</table>
					</td>
					<td>
					   <table class="innertable" width="100%">
							<tr>
								<td <?php if(isset($stanine_5) == true && $stanine_5 >= 81) { echo 'class="fce175"'; } ?> id="txtdiv_81">4</td>
								<td <?php if(isset($stanine_5) == true && $stanine_5 >= 82) { echo 'class="fce175"'; } ?> id="txtdiv_82">5</td>
								<td <?php if(isset($stanine_5) == true && $stanine_5 >= 83) { echo 'class="fce175"'; } ?> id="txtdiv_83">6</td>
							</tr>
						</table>
					</td>
					<td>
						<table class="innertable" width="100%">
							<tr>
							<td <?php if(isset($stanine_5) == true && $stanine_5 >= 85) { echo 'class="fce175"'; } ?> id="txtdiv_85">7</td>
							<td <?php if(isset($stanine_5) == true && $stanine_5 >= 86) { echo 'class="fce175"'; } ?> id="txtdiv_86">8</td>
							<td <?php if(isset($stanine_5) == true && $stanine_5 >= 87) { echo 'class="fce175"'; } ?> id="txtdiv_87">9</td>
							</tr>
						</table>
					</td>
					 
					<td class="topborder"></td> 
                  </tr>
                  
                  
                   </tbody>
                  <tfoot>
                  <tr>

                    <th></th>
                     <th <?php if($txt_89 == "Final Comment"){ ?> style="height:50px" <?php } ?> class="text-center" colspan="3" id="txtdiv_89"><?php if($txt_89 != "Final Comment"){ echo nl2br($txt_89); } ?></th>
                     <th <?php if($txt_90 == "Final Comment"){ ?> style="height:50px" <?php } ?>  class="bg-red text-center" id="txtdiv_90"><?php if($txt_90 != "Final Score"){ echo nl2br($txt_90); } ?></th>
                  </tr>
                  </tfoot>
               
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
 </body>
 </html>
