<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if($this->session->userdata('user_logged_in')==true): ?><a onClick="return submitLeftForm();" href="javascript:void(0);"> DOWNLOAD </a><!--<a style="margin-top:70px;" onclick="return submitLeftForm('png');" href="javascript:void(0);"> DOWNLOAD PNG </a>-->
<?php else: ?> 
<a onClick="showSignup('loginModal',2);" href="javascript:void(0);"> Login to Download </a>
<?php endif; ?>

