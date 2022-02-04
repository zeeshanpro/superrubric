<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="">
		<meta name="author" content="">
		<meta name="description" content="">
		<meta name='og:image' content='images/home/ogg.png'>
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- For Window Tab Color -->
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#233D63">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#233D63">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#233D63">
		<meta name="google-signin-client_id" content="659017308237-vi0r22tit8oq8e5ru9g3se0kam3eca90.apps.googleusercontent.com">
		<title>Student Assessment Made Simple | SUPERRUBRIC</title>
		<base href="<?php echo base_url(); ?>" />
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/SOCIAL-FAVICON-TEXT.png'); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url('assets/img/SOCIAL-FAVICON-TEXT.png'); ?>" type="image/x-icon">
	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/web-style.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/all.css'); ?>">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/web-responsive.css'); ?>">
	 
	 <style>
		 
		.resume {
			<?php if($this->uri->segment(3)==3 || $this->uri->segment(3)==5) : ?>
			background: url(<?php echo base_url('assets/img/LITERACY-CHECK.jpg'); ?>)  #fff no-repeat;
			<?php elseif($this->uri->segment(3)==1 || $this->uri->segment(3)==4 || $this->uri->segment(3)==6 || $this->uri->segment(3)==7 || $this->uri->segment(3)==11) : ?>
			background: url(<?php echo base_url('assets/img/DISCUSSION-FORU.jpg'); ?>) #fff no-repeat;
			<?php elseif($this->uri->segment(3)==10) : ?>
			background: url(<?php echo base_url('assets/img/JOURNAL-ENTRY.jpg'); ?>) #fff no-repeat;
			<?php elseif($this->uri->segment(3)==2 ||  $this->uri->segment(3)==8 || $this->uri->segment(3)==9) : ?>
			background: url(<?php echo base_url('assets/img/READING-RESPONSE.jpg'); ?>) #fff no-repeat; 
			<?php endif; ?>
			background-position: bottom; 
			background-size: contain;
		}

		.average input[type="text"] {
			background: white !important;
			border-bottom: 3px solid #5b5b5b !important;
		}

		.deviation input[type="text"] {
			background: white !important;
			border-bottom: 3px solid #5b5b5b !important;
		}
		
		.highlight{
			border-style: solid !important;
			border-width: thin !important;
			border-color: red !important;
		}
		.hide{
			display:none !important;
		}
		.collapseBtn{
			width: 94% !important;
			margin-left: 2% !important;
			height:50px !important;
			text-align : left !important;
			font-size : 12px !important;
			background-color: white !important;
			border: none !important;
		}
		.collapseBtn:hover{
			color: #fce175 !important;
		}
	 </style>
	 
	</head>	
	
	<body>	
		<div id="root">
		  <div class="wrapper">
			<div class="navigation">
			  <div class="row align-items-center">
				<div class="col-lg-12">
				
					<!-- Mobile navbar -->
					<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
					  <div class="brand"><a href="<?php echo base_url('/'); ?>"><img class="logo" src="<?php echo base_url('assets/img/logo.png'); ?>"></a></div>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					  </button>

					  <div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
						  
						  
						  <li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="<?php echo base_url('/'); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  Create
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							  <a class="dropdown-item" href="https://www.superrubric.com/templates">Rubric</a>
							  <a class="dropdown-item" href="<?= base_url();?>gradebook">Gradebook</a>
							</div>
						  </li>
						  
						  <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="https://www.superrubric.com/src/how-it-works/" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  How it Works
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
							  <a class="dropdown-item" href="https://www.superrubric.com/src/rubric/">Rubric App</a>
							  <a class="dropdown-item" href="https://www.superrubric.com/src/gradebook/">Gradebook App</a>
							  <a class="dropdown-item" href="https://www.superrubric.com/src/student-reports/">Student Reports</a>
							</div>
						  </li>
						  
						  <li class="nav-item">
							<a class="nav-link" href="https://www.superrubric.com/src/pricing/">Pricing</a>
							<a class="nav-link" href="https://www.superrubric.com/src/our-mission/">Our Mission</a>
							<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="https://www.superrubric.com/src/category/resources/" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  Resources
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown3">
							  <a class="dropdown-item" href="https://www.superrubric.com/src/category/resources/">Blog</a>
							  <a class="dropdown-item" href="https://www.superrubric.com/src/case-studies/">Case Studies</a>
							  <a class="dropdown-item" href="https://www.superrubric.com/src/careers/">Careers</a>
							  <a class="dropdown-item" href="https://www.superrubric.com/src/privacy-policy-terms-of-service/">Privacy Policy & Terms of Service</a>
							</div>
							</li>
						  </li>
						</ul>
						
						<div class="loin">
							<div class="authentication" id="authhead">
							  <a <?php if($this->session->userdata('user_logged_in')==true): ?> style="display:none;" <?php else : ?> style="display:block;" <?php endif; ?> id="loginbutton" class="authenticationButton" href="javascript:void(0);" onClick="showSignup('loginModal',1);">Login</a>
															 
							  <a class="authenticationButton googlelogout" id="googlelogout" <?php if($this->session->userdata('user_logged_in')==true): ?> style="display:block;" <?php else : ?> style="display:none;" <?php endif ?> <?php if($this->session->userdata('google_login')==true): ?>  href="javasript:void(0);" onclick="signOut();" <?php else: ?> href="users/userlogout"  <?php endif; ?> >Logout</a>
								</div>
							</div>
						
					  </div>
					</nav>
				
				
				  <div class="header" id="myHeader">
					<div class="row align-items-center">  
						<div class="col-lg-11">
						    <div class="navigation-inner">
    						    <div class="brand"><a href="<?php echo base_url('/'); ?>"><img class="logo" src="<?php echo base_url('assets/img/logo.png'); ?>"></a></div>
    						    <ul class="navigation-menu">
    						        <li> <a href="<?php echo base_url('/'); ?>"> Create </a>
    						            <ul class="sub-menu">
    						                <li> <a href="https://www.superrubric.com/templates"> Rubric </a> </li>
    						                <li> <a href="<?= base_url();?>gradebook"> Gradebook </a> </li>
    						            </ul>
    						        </li>
    						        <li> <a href="https://www.superrubric.com/src/how-it-works/"> How it Works </a> 
    						                <ul class="sub-menu">
    						                    <li> <a href="https://www.superrubric.com/src/rubric/"> Rubric App </a> </li>
    						                    <li> <a href="https://www.superrubric.com/src/gradebook/"> Gradebook App </a> </li>
    						                    <li> <a href="https://www.superrubric.com/src/student-reports/"> Student Reports </a> </li>
    						                </ul>
    						        </li>
    						        <li> <a href="https://www.superrubric.com/src/pricing/"> Pricing </a> </li>
    						        <li> <a href="https://www.superrubric.com/src/our-mission/"> Our Mission </a> </li>
    						        <li> <a href="https://www.superrubric.com/src/category/resources/"> Resources </a> 
    						                <ul class="sub-menu">
    						                    <li> <a href="https://www.superrubric.com/src/category/resources/"> Blog </a> </li>
    						                    <li> <a href="https://www.superrubric.com/src/case-studies/"> Case Studies </a> </li>
    						                    <li> <a href="https://www.superrubric.com/src/careers/"> Careers </a> </li>
    						                    <li> <a href="https://www.superrubric.com/src/privacy-policy-terms-of-service/"> Privacy Policy & Terms of Service </a> </li>
    						                </ul>
    						        </li>
    						        
    						    </ul>
    						    <ul class="social-icons">
    						        
    						        <li> <a target="_blank" href="https://www.facebook.com/Superrubriccom-100264148767072" class="fa-fb"> <i class="fab fa-facebook-f"></i> </a> </li>
    						        <li> <a target="_blank" href="https://www.instagram.com/superrubric" class="fa-insta"> <i class="fab fa-instagram"></i> </a> </li>
    						        <li> <a target="_blank" href="https://www.superrubric.com/src/category/resources/" class="fa-q"> <i class="fas fa-question"></i> </a> </li>
    						    </ul>
								<!--<ul class="navigation-menu">
    						        <li> <a href="<?php echo base_url('/'); ?>"> Create </a>
    						            <ul class="sub-menu">
    						                <li> <a href="https://www.superrubric.com/templates"> Rubric </a> </li>
    						                <li> <a href="https://www.superrubric.com/src/gradebook"> Gradebook </a> </li>
    						            </ul>
    						        </li>
    						        <li> <a href="https://www.superrubric.com/src/services/"> Services </a> 
    						                <ul class="sub-menu">
    						                    <li> <a href="https://www.superrubric.com/src/how-to-use/"> How to Use </a> </li>
    						                    <li> <a href="https://www.superrubric.com/src/curriculum-based-rubrics/"> Curriculum-Based Rubrics </a> </li>
    						                    <li> <a href="https://www.superrubric.com/src/gradebook/"> Gradebook </a> </li>
    						                </ul>
    						        </li>
    						        <li> <a href="https://www.superrubric.com/src/about-us/"> Our Mission </a> </li>
    						        <li> <a href="https://www.superrubric.com/src/contact/"> Contact </a> </li>
    						        <li> <a href="https://www.superrubric.com/src/category/superrubric-blog/"> Blog </a> </li>
    						    </ul>
    						    <ul class="social-icons">
    						        
    						        <li> <a target="_blank" href="https://www.facebook.com/Superrubriccom-100264148767072" class="fa-fb"> <i class="fab fa-facebook-f"></i> </a> </li>
    						        <li> <a target="_blank" href="https://www.instagram.com/superrubric" class="fa-insta"> <i class="fab fa-instagram"></i> </a> </li>
    						        <li> <a target="_blank" href="https://www.superrubric.com/src/how-to-use/" class="fa-q"> <i class="fas fa-question"></i> </a> </li>
    						    </ul>-->
						    </div>
						</div>
						<div class="col-lg-1">
						  <div class="head-box">
							<div class="loin">
							<div class="authentication" id="authhead">
							  
							  <a <?php if($this->session->userdata('user_logged_in')==true): ?> style="display:none;" <?php else : ?> style="display:block;" <?php endif; ?> id="loginbutton" class="authenticationButton" href="javascript:void(0);" onClick="showSignup('loginModal',1);">Login</a>
							 
							  <a class="authenticationButton googlelogout" id="googlelogout" <?php if($this->session->userdata('user_logged_in')==true): ?> style="display:block;" <?php else : ?> style="display:none;" <?php endif ?> <?php if($this->session->userdata('google_login')==true): ?>  href="javasript:void(0);" onclick="signOut();" <?php else: ?> href="users/userlogout"  <?php endif; ?> >Logout</a>
							  
						 	  
							   
							  </div>
							</div>
						  </div>
						</div>
					</div>
				  </div>
				</div>
				<!--<div class="col-lg-6">-->
				<!--  <div class="menuToggle"><span style="font-size:30px; color: #5b5b5b; cursor:pointer" onclick="openNav()">&#9776;</span>-->
				<!--	<div id="mySidenav" class="sidenav"><a href="<?php // echo base_url(); ?>">Create</a><a href="<?php // echo base_url('/blog/'); ?>">Blog</a><a href="<?php // echo base_url('blog/contact-us/'); ?>">Contact</a><a href="<?php // echo base_url('blog/about-us/'); ?>">About</a><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></div>-->
				<!--  </div>-->
				<!--</div>-->
			  </div>
			</div>
		 <!-- <div class="userContent mt-5" style="display: none;"></div>-->
		

