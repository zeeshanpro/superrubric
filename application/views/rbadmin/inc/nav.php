<body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
      <div class="c-sidebar-brand d-lg-down-none">
        <!--<img src="White-logo-no-background.png" style="width:56px;">-->
      </div>
      <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url('admin');?>">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?php echo base_url('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer'); ?>"></use>
            </svg> Dashboard</a></li>    
         
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url('rbadmin/users');?>">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?php echo base_url('coreui/vendors/@coreui/icons/svg/free.svg#cil-user'); ?>"></use>
            </svg> Users</a></li> 
             
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url('rbadmin/templates');?>">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?php echo base_url('coreui/vendors/@coreui/icons/svg/free.svg#cil-pencil'); ?>"></use>
            </svg> Templates</a></li>    
		<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url('rbadmin/schools');?>">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?php echo base_url('coreui/vendors/@coreui/icons/svg/free.svg#cil-house'); ?>"></use>
            </svg> Schools</a></li>   
      </ul>
      <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
    <div class="c-wrapper c-fixed-components">
      <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
          <svg class="c-icon c-icon-lg">
            <use xlink:href="<?php echo base_url('coreui/vendors/@coreui/icons/svg/free.svg#cil-menu'); ?>"></use>
          </svg>
        </button><a class="c-header-brand d-lg-none" href="#">
          <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="<?php echo base_url('coreui/assets/brand/coreui.svg#full'); ?>"></use>
          </svg></a>
        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
          <svg class="c-icon c-icon-lg">
            <use xlink:href="<?php echo base_url('coreui/vendors/@coreui/icons/svg/free.svg#cil-menu'); ?>"></use>
          </svg>
        </button>
         
        <ul class="c-header-nav ml-auto mr-4">
          
          <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="c-avatar" style="    width: 70px;
"><img class="c-avatar-img" src="<?php echo base_url('assets/img/logo.png'); ?>" alt="user@email.com"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
              <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
<!--
              <a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                  <use xlink:href="<?php //echo base_url('coreui/vendors/@coreui/icons/svg/free.svg#cil-user'); ?>"></use>
                </svg> Profile</a>
-->
                
                <a class="dropdown-item" href="<?php echo base_url('admin/changepassword');?>">
                <svg class="c-icon mr-2">
                  <use xlink:href="<?php echo base_url('coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked'); ?>"></use>
                </svg> Change Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url('admin/logout');?>">
                <svg class="c-icon mr-2">
                  <use xlink:href="<?php echo base_url('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout'); ?>"></use>
                </svg> Logout</a>
            </div>
          </li>
        </ul>
        <div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active"><?php echo $pagetitle; ?></li>
            <!-- Breadcrumb Menu-->
          </ol>
        </div>
      </header>
      
