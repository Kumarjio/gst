$(document).ready(function () {
	//var isDesktop = !(/Android|webOS|iPhone|iPad|BlackBerry|Windows Phone|Opera Mini|IEMobile|Mobile/i.test(navigator.userAgent));
	//var getURL = window.location.href;
	var getURLPath = window.location.pathname;
	var getClientWidth = document.body.clientWidth;
	var interval = 60000;
	
	//switch to check what page is being viewed:
	switch (getURLPath) {
	 case "/flights":
        setPath = "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=7";
        break; 
    case "/hotels":
    		setPath = "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=8";
    		break;
    case "/carhire":
    		setPath = "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=9";
    		break;
    case "/holidays":
    		setPath = "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=10";
    		break;
    case "/hajj":
    		setPath = "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=11";
    		break;
		case "/umrah":
    		setPath = "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=12";
				break;
		case "/travel-insurance":
    		setPath = "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=13";
    		break;
    case "/cruises":
    		setPath = "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=14";
    		break;

    default: 
        setPath = "/";
	}

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
				url: setPath,
				cache: false,
				success: function (html) {
					$('#leftBanner').html(html);
					setTimeout(function () {
						LeftRefresh();
					}, interval);
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
				//url: "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=2",
				url: setPath,
				cache: false,
				success: function (html) {
					$('#rightBanner').html(html);
					setTimeout(function () {
						RightRefresh();
					}, interval);
				}

			});
		}
	};
	RightRefresh();

$(window).scroll(function() {
	 if ($(this).scrollTop() > 280){
	    $('.leftBanner').addClass("sticky");
	    $('.rightBanner').addClass("sticky");
	  }
	  else{
	    $('.leftBanner').removeClass("sticky");
	    $('.rightBanner').removeClass("sticky");
	  }

	if ($(this).scrollTop() > 100){
	    $('.navbar-default').addClass("fixed");
	  }
	  else{
	    $('.navbar-default').removeClass("fixed");
	  }
	});

});


