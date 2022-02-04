
<a <?php if($this->session->userdata('user_logged_in')==true): ?> style="display:none;" <?php else : ?> style="display:block;" <?php endif; ?> id="loginbutton" class="authenticationButton" href="#"  data-toggle="modal" data-target="#loginModal">Login</a>
							 
<a class="authenticationButton googlelogout" id="googlelogout" <?php if($this->session->userdata('user_logged_in')==true): ?> style="display:block;" <?php else : ?> style="display:none;" <?php endif ?> <?php if($this->session->userdata('google_login')==true): ?>  href="javasript:void(0);" onclick="signOut();" <?php else: ?> href="users/userlogout" <?php endif; ?> >Logout</a>
