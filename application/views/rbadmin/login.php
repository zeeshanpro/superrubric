<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.2.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Superrubric Login</title>
     
    <!-- Main styles for this application-->
    <link href="<?php echo base_url('coreui/css/style.css'); ?>" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    
  </head>
  <body class="c-app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                  
                <h1 style="font-size:1.6rem;">Superrubric Login</h1>
                <p class="text-muted">Sign In to your account</p>
                 <?php if(isset($error) && $error !=''){ ?>
                    	<p class="text-muted"  style="color:#f00 !important;"> <?php echo $error; ?> </p>
                <?php } ?>
                <?php if($this->session->flashdata('success')){?>
						<p style="font-size:12px;color:#f00;">  <?php echo $this->session->flashdata('success');?> </p>
					<?php }?>
                 <?php $array = array('name'=>'loginfrm','id'=>'loginform','class'=>'login');?>
                       <?php echo form_open_multipart('admin/login',$array);?>       
                <div class="input-group mb-3">
                  <div class="input-group-prepend"><span class="input-group-text">
                      <svg class="c-icon">
                        <use xlink:href="<?php echo base_url('coreui/vendors/@coreui/icons/svg/free.svg#cil-user'); ?>"></use>
                      </svg></span></div>
                  <input class="form-control" type="text" placeholder="Username" name="username">
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend"><span class="input-group-text">
                      <svg class="c-icon">
                        <use xlink:href="<?php echo base_url('coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked'); ?>"></use>
                      </svg></span></div>
                  <input class="form-control" type="password" placeholder="Password" name="password">
                </div>
                <div class="row">
                  <div class="col-6">
                    <button class="btn btn-primary px-4" type="submit" name="submit" id="submit">Login</button>
                  </div>
                 <!-- <div class="col-6 text-right">
                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                  </div>-->
                </div>
                <?php echo form_close();?>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?php echo base_url('coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js'); ?>"></script>
    <!--[if IE]><!-->
    <script src="<?php echo base_url('coreui/vendors/@coreui/icons/js/svgxuse.min.js'); ?>"></script>
    <!--<![endif]-->

  </body>
</html>
