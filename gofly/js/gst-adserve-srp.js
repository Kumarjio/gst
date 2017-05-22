$(document).ready(function () {
	//var isDesktop = !(/Android|webOS|iPhone|iPad|BlackBerry|Windows Phone|Opera Mini|IEMobile|Mobile/i.test(navigator.userAgent));
	var getClientWidth = document.body.clientWidth;
	var interval = 60000;
	//top banner refresh function
	var TopRefresh = function () {
		if (getClientWidth >= 468) {
			$.ajax({
				url: "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=3",
				cache: false,
				success: function (html) {
					$('#topBanner').html(html);
					setTimeout(function () {
					  TopRefresh();
					}, interval);
					console.log("more than 468");
				}
			});
		} 
		
		if (getClientWidth < 468){			
			if (getClientWidth < 420) {
				$.ajax({
					url: "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=5",
					cache: false,
					success: function (html) {
						$('.isDesktop').hide();
						$('#topBanner').html(html);
						setTimeout(function () {
							TopRefresh();
						}, interval);
						console.log("less than 370");
					}
				});
			}
			
			else {
				$.ajax({
					url: "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=6",
					cache: false,
					success: function (html) {
						$('.isDesktop').hide();
						$('#topBanner').html(html);
						setTimeout(function () {
							TopRefresh();
						}, interval);
						console.log("more than 370");
					}
				});
			}
		}
	};
	TopRefresh();

//left banner refresh function
	var LeftRefresh = function () {
		//only show if its desktop
		if (getClientWidth >= 468) {
			$.ajax({
				url: "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=4",
				cache: false,
				success: function (html) {
					$('#leftBanner').html(html);
					setTimeout(function () {
						RightRefresh();
					}, interval);
					//console.log("leftRefresh called ");
				}
			});
		}
	};
	LeftRefresh();

	//right banner refresh function
	var RightRefresh = function () {
		//only show if its desktop
		if (getClientWidth >= 468) {
			$.ajax({
				url: "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=2",
				cache: false,
				success: function (html) {
					$('#rightBanner').html(html);
					setTimeout(function () {
						RightRefresh();
					}, interval);
					//console.log("RightRefresh called ");
				}

			});
		}
	};
	RightRefresh();

$(window).scroll(function() {
	 if ($(this).scrollTop() > 650){  
	    $('.leftBanner').addClass("sticky");
	    $('.rightBanner').addClass("sticky");
	  }
	  else{
	    $('.leftBanner').removeClass("sticky");
	    $('.rightBanner').removeClass("sticky");
	  }
	});

});

