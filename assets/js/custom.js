/* custom js */
jQuery('.right-panel btn-default').click(function(){
	 var id = jQuery(this).attr('id');
	 jQuery('.imageleft').addClass('hiddenclass');
	 jQuery('.'+id).removeClass('hiddenclass');
});

function setTextToDiv(id){
	 var txtval = $.trim($('#txt_'+id).val());	
	$('#txtdiv_'+id).html(txtval.replace(/\r?\n/g,'<br/>'));
}



$(function () {
	$( "#datepicker").datepicker({ 
		minDate: 0,
		dateFormat: 'dd-mm-yy', 
		changeMonth: true, 
		changeYear: true,  
		onSelect: function(dateText) {
				$('#txtdiv_5').html(dateText);
			}
		});
});

function showSignup(id,type = 0){
	$('.modal').modal('hide');
	if(type==2){
		$('#loginTitle').html('Login to Download');
		$('#logtodown').val(1);
	}
	else
	{
		$('#loginTitle').html('Login to Download');
	}
	
	$('#'+id).modal('show');
}

function signupMember(){
	$('.signup_error').html('');

	var frm = $('#signupForm');
    
	var formData = frm.serialize();
	
	$.ajax({
	  method: "POST",
	  url: "users/signup",
	  data: formData,
	  dataType:'json'
	}).done(function( response ) {
		var obj	=	eval(response);
		if(obj.success == 0)
		{
			$('#error_name').html(obj.name);
			$('#error_email').html(obj.email);
			$('#error_password').html(obj.password);
			$('#error_passconf').html(obj.passconf);
			$('#error_type').html(obj.type);
		}
		else
		{
			getNewHeader();
			jQuery('.modal').modal('hide');
		}
	});
	
}
function loginMember(){
	
	$('.signup_error').html('');

	var frm = $('#loginForm');
    
	var formData = frm.serialize();
	
	$.ajax({
	  method: "POST",
	  url: "users/userlogin",
	  data: formData,
	  dataType:'json'
	}).done(function( response ) {
		var obj	=	eval(response);
		if(obj.success == 0)
		{
			$('#error_login_email').html(obj.email);
			$('#error_login_password').html(obj.password);
			$('#user_exist').html(obj.user_exist);
			 
		}
		else if(obj.success == -1)
		{
			$('#error_login_email').html(obj.email);
			$('#error_login_password').html(obj.password);
			$('#user_exist').html("<p>"+obj.user_exist+"</p>");
			swal({
				title: "Attention Teacher",
				text: obj.user_exist,
				button: "Upgrade",
				icon: "error",
			}).then(function() {
				window.open('https://subscriptions.zoho.com/subscribe/2176a7b6f042d75719ba435810a746c7b9de07abf9a0975fad482bf477cf719e/SRC-P', '_blank');
			});
		}
		else
		{
			
			if(obj.stdlink != "")
			{				
				window.location.href = obj.stdlink;
				return false;
			}
			
			getNewHeader();
			jQuery('.modal').modal('hide');
		}
	});
	
}

function getNewHeader(){
 
	$.ajax({
	  method: "POST",
	  url: "users/userheader",
	  dataType:'json',
	}).done(function( response ) {
		var obj	=	eval(response);
		$('#authhead').html(obj.html);
		
		if($("#download_btn").length != 0) {
			$('#download_btn').html(obj.download_btn);
		}
// 		if($('#logtodown').val()==1){
// 		    var path = 'https://www.superrubric.com/templates/domconvertpdf/pdf';
// 		    $('#pdfgenrate').attr('action',path);
// 			document.getElementById("pdfgenrate").submit(); 
// 		}
	});

}

// Google Login ************
// Render Google Sign-in button
function renderButton() {
    gapi.signin2.render('gSignIn', {
        'scope': 'profile email',
        'width': 240,
        'height': 30,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
    });
}
 

// Sign-in failure callback
function onFailure(error) {
    //alert(error);
}

// Sign out the user
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
	 
        document.getElementById("loginbutton").style.display = "block";
        document.getElementById("googlelogout").style.display = "none";
        googleLogoutCI();
    });
   
    auth2.disconnect();
    location.reload(); 
}
// Save user data to the database
function saveUserData(userData){
	$.post('loginWithGooglePlus/ajaxgoogleLogin', { oauth_provider:'google', userData: JSON.stringify(userData) }).done(function(response) {
		
		var response = jQuery.parseJSON(response);
		
		if(response.error != 0)
		{
			if(response.error == -1)
			{
				swal({
					title: "Attention Teacher",
					text: response.user_exist,
					button: "Upgrade",
					icon: "error",
				}).then(function() {
					window.open('https://subscriptions.zoho.com/subscribe/2176a7b6f042d75719ba435810a746c7b9de07abf9a0975fad482bf477cf719e/SRC-P', '_blank');
				});				
			}
			else
			{
				swal({
					title: "Error",
					text: response.user_exist,
					button: "close",
					icon: "error",
				});
			}
		}
		else
		{
			getNewHeader();
			//console.log(response); return false;
			if(response != '' && response.new_user == 0){
				swal("Select user type", {
			  buttons: {
				  pdf: {
					  text: "Student",
					  value: "2"
				  },
				  png: {
					  text: "Teacher",
					  value: "1"
				  }
				},
			}).then((value) => {
				  switch (value) {
				 
					case "1":
					 //Save user data
					console.log('Teacher');
					$.post('loginWithGooglePlus/updateUserType', { user_type: 1 , user_id: response.user_id }).done(function(response) {
						console.log(response);
					});
					break;
				 
					case "2":
					 //Save user data
					console.log('Student'); 

					$.post('loginWithGooglePlus/updateUserType', { user_type: 2 , user_id: response.user_id }).done(function(response) {
						console.log(response);			
					});				
					break;
				 
				  }
			});
			}	
		}
		
		
	});
    
}

// Sign-in success callback
function onSuccess(googleUser) {
    // Get the Google profile data (basic)
    //var profile = googleUser.getBasicProfile();
    
    // Retrieve the Google account data
    gapi.client.load('oauth2', 'v2', function () {
        var request = gapi.client.oauth2.userinfo.get({
            'userId': 'me'
        });
        request.execute(function (resp) {
			
            // Display the user details
            //var profileHTML = '<h3>Welcome '+resp.given_name+'! <a href="javascript:void(0);" onclick="signOut();">Sign out</a></h3>';
            //profileHTML += '<img src="'+resp.picture+'"/><p><b>Google ID: </b>'+resp.id+'</p><p><b>Name: </b>'+resp.name+'</p><p><b>Email: </b>'+resp.email+'</p><p><b>Gender: </b>'+resp.gender+'</p><p><b>Locale: </b>'+resp.locale+'</p><p><b>Google Profile:</b> <a target="_blank" href="'+resp.link+'">click to view profile</a></p>';
				
				//document.getElementsByClassName("userContent")[0].innerHTML = profileHTML;
            	//document.getElementById("gSignIn").style.display = "none";
				//document.getElementsByClassName("userContent")[0].style.display = "block";
				//alert(resp.id+' '+resp.name);
				if(resp.id != ""){
					//console.log('resp.id ' + resp.id);
					$('a#loginbutton').css('display','none');
					$('a#googlelogout').css('display','block');
					//document.getElementById("loginbutton").style.display = "none";
					//document.getElementById("googlelogout").style.display = "block";
					jQuery('.modal').modal('hide');
					//alert(resp.id);
					// Save user data
					saveUserData(resp); 
				}
        });
    });
}
function googleLogoutCI(){
	
	$.post('users/userlogout', { oauth_provider:'google'}).done(function() {
		window.location.href='';
	});
	
}

$('#txt_28, #txt_43, #txt_58, #txt_73, #txt_88').on('focus', function(){
	$(this).val('');
});

function setScale(id,value){
	
	setScales(id,value);
	/*
	 var dropdownval = value;
	 //console.log(dropdownval);
	 //console.log($('#txtdiv_'+dropdownval).text());
	 var scale = $('#txtdiv_'+dropdownval).text();
	 $('.criteria_'+id).removeClass('fce175');
	$('.criteria_'+id).each(function() {
         console.log($(this).text());
		 alert($(this).text());
         if($(this).text() <= scale){
         $(this).addClass(' fce175');
         }else{
             //console.log($(this).text());
         }
    });
	*/

}

function setScales(id,value){
	var dropdownval = value;
	//console.log(dropdownval);
	//console.log($('#txtdiv_'+dropdownval).text());
	var scale = $('#txtdiv_'+dropdownval).text();
	$('.criteria_'+id).removeClass('fce175');
	const scaleArray = ["D-","D","D+","C-","C","C+","B-","B","B+","A-","A","A+"];
	var ScaleNo = scaleArray.indexOf(scale); 
	var tempNo = 0;
	$('.criteria_'+id).each(function() {
         if( tempNo <= ScaleNo){
			 $(this).addClass(' fce175');
			 tempNo++;
         }else{
             //console.log($(this).text());
         }
    });
}

function showHideDetailDiv(e){
	
	var id = $(e).attr('data-id');
	var value = $(e).val();

	if(value == 1)
		$("#criteria_detail_"+id).show();
	else
		$("#criteria_detail_"+id).hide();
}

function calculateScore(rateId,scoreId)
{
	var  rateValue = $("#txt_"+rateId).val().replace(/[^0-9]|%/g,'');
	var  scoreValue = $("#txt_"+scoreId).val().replace(/[^0-9]|%/g,'');
	var rate = 0;
	if(rateValue != "")
		rate = rateValue / 100;
		
	var  score = (scoreValue * rate);
	//$("#txtdiv_"+scoreId).text(scoreValue);
	$("#score_"+scoreId).val(score);
	
	var sumScore = 0;
	$(".score").each(function(){
		sumScore += +$(this).val().replace('%','');;
	});
	
	$("#txt_90").val(sumScore+"%");
	$("#txtdiv_90").text(sumScore+"%");
}

function displayCriteria(criteria,action){
	var input_name =  criteria+'_display';
	if(action == 'show'){
		$('.'+criteria).removeClass('hide').addClass('show');
		$('tr.'+criteria).removeClass('hide').addClass('show_tr');
		$('#show_'+criteria).hide();
		$('#hide_'+criteria).show();
		$('input[name='+input_name+']').val(1);
	}

	if(action == 'hide'){
		$('.'+criteria).removeClass('show').addClass('hide');
		$('tr.'+criteria).removeClass('show_tr').addClass('hide');
		$('#show_'+criteria).show();
		$('#hide_'+criteria).hide();
		$('input[name='+input_name+']').val(0);
	}
	return false;
}
