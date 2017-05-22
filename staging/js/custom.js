$(document).ready(function(){
	$(window).trigger('resize');
	
	/** select dropdown - all pages **/
	$('.selectpicker').on('change', function(){
		var selected = $(this).find("option:selected").val();
		//alert(selected);
	});
	
	/** user dropdown - all pages **/
	$('#userBtn').click(function(){
		if($('#loginBlock').is(":visible")){
			$('#loginBlock').slideUp();
			$('#closeLoginPop').removeClass('active');
		}
		else{
			$('#loginBlock').slideDown();
			$('#closeLoginPop').addClass('active');
		}
	});
	
	$('#closeLoginPop').click(function(){
		$('#loginBlock').slideUp();
		$(this).removeClass('active');
	});
		
	$('#signUp').click(function(){
		$('#loginBlock').hide();
		$('#signupBlock').slideDown();
		$('#closeSignupPop').addClass('active');
	});
	
	$('#forgotPass').click(function(){
		$('#loginBlock').hide();
		$('#forgotpasswordBlock').slideDown();
		$('#closeForgotpasswordPop').addClass('active');
	});
	
	$('#logIn').click(function(){
		$('#signupBlock').hide();
		$('#loginBlock').slideDown();
		$('#closeLoginPop').addClass('active');
	});
	
	$('#closeSignupPop').click(function(){
		$('#signupBlock').slideUp();
		$(this).removeClass('active');
	});
	
	$('#userBtn').click(function(){
		if($('#signupBlock').is(":visible")){
			$('#signupBlock').slideUp();
			$('#closeSignupPop').removeClass('active');
			$('#loginBlock').hide();
		}
	});
	
	$('#closeForgotpasswordPop').click(function(){
		$('#forgotpasswordBlock').slideUp();
		$(this).removeClass('active');
	});
	
	$('#userBtn').click(function(){
		if($('#forgotpasswordBlock').is(":visible")){
			$('#forgotpasswordBlock').slideUp();
			$('#closeForgotpasswordPop').removeClass('active');
			$('#loginBlock').hide();
		}
	});
		
	$(document).mouseup(function (e)
	{
		var containerLogin = $("#loginBlock");		
		if (!containerLogin.is(e.target)
			&& containerLogin.has(e.target).length === 0)
		{
			containerLogin.slideUp();
			$('#closeLoginPop').removeClass('active');
		}
		
		var containerSignup = $("#signupBlock");		
		if (!containerSignup.is(e.target)
			&& containerSignup.has(e.target).length === 0)
		{
			containerSignup.slideUp();
			$('#closeSignupPop').removeClass('active');
		}
		
		var containerForgotPass = $("#forgotpasswordBlock");		
		if (!containerForgotPass.is(e.target)
			&& containerForgotPass.has(e.target).length === 0)
		{
			containerForgotPass.slideUp();
			$('#closeForgotpasswordPop').removeClass('active');
		}
	});
	
	if(window.innerWidth <= 1024){ 
		$(document).on('touchstart',function(event){				    
			if (!$(event.target).closest('#loginBlock').length) {
				$('#loginBlock').slideUp();
				$('#closeLoginPop').removeClass('active');
			}
			else if (!$(event.target).closest('#signupBlock').length) {
				$('#signupBlock').slideUp();
				$('#closeSignupPop').removeClass('active');
			}
			else if (!$(event.target).closest('#forgotpasswordBlock').length) {
				$('#forgotpasswordBlock').slideUp();
				$('#closeForgotpasswordPop').removeClass('active');
			}														
		});
	}
	
	/** scrolltop - all pages **/
	$('#toTop').click(function() {
    	$('body,html').animate({scrollTop:0},1200);
	});			
});

$(window).scroll(function(){
	if ($(this).scrollTop() != 0) {
	   $('.navbar-default').addClass('fixed');
	   $('#toTop').fadeIn();  
	   
	   	/** form validation - focus **/
		topbar_height = $('nav').height();
		var delay = 0;
		var offset = topbar_height;
	
		document.addEventListener('invalid', function(e){
			$(e.target).addClass("invalid");
			$('html, body').animate({scrollTop: $($(".invalid")[0]).offset().top - offset }, delay);
		}, true);
		
		document.addEventListener('change', function(e){
			$(e.target).removeClass("invalid")
		}, true);	   		   
	}
	else {
	   $('.navbar-default').removeClass('fixed');
	   $('#toTop').fadeOut();
	}
});

$(window).on('resize',function() {
   	var footerHeight = $('footer').outerHeight();
	$('body').css('margin-bottom', footerHeight+'px');
});
