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
    <title><?php if(isset($pagetitle)){ echo $pagetitle. "-" ; } ?> Resume builder</title>
     
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/all.css'); ?>">
    <link href="<?php echo base_url('coreui/css/style.css'); ?>" rel="stylesheet">    
      <link href="<?php echo base_url('coreui/css/customstyle.css'); ?>" rel="stylesheet">   
    <link href="<?php echo base_url('coreui/vendors/@coreui/chartjs/css/coreui-chartjs.css'); ?>" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
  </head>
  <input type="hidden" name="basePathForAjax" id="basePathForAjax" value="<?php echo base_url(); ?>" />

<input type="hidden" name="userroleid" id="userroleid" value="<?php echo $this->session->userdata('is_admin_login'); ?>" />

<input type="hidden" name="userid" id="userid" value="<?php echo $this->session->userdata('id'); ?>" />
<?php $this->load->view('rbadmin/inc/nav'); ?>
