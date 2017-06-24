$(document).ready(function(){
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
var checkin = $('#input-s-date').datepicker({
    beforeShowDay: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkout.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setDate(newDate);		
    }
    else {
        checkout.setDate(ev.date + 1);
    }
    
    checkin.hide();
    $('#input-e-date')[0].focus();
}).data('datepicker');
var checkout = $('#input-e-date').datepicker({
    beforeShowDay: function(date) {
        return date.valueOf() <= checkin.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    checkout.hide();
}).data('datepicker');

$('.dropdown.mega-dropdown a').on('click', function (event) {
    $(this).parent().toggleClass("open");
});

$('body').on('click', function (e) {
    if (!$('.dropdown.mega-dropdown').is(e.target) && $('li.dropdown.mega-dropdown').has(e.target).length === 0 && $('.open').has(e.target).length === 0) {
        $('.dropdown.mega-dropdown').removeClass('open');
    }
});
	
});

   [].slice.call( document.querySelectorAll( 'select.input-trip-type' ) ).forEach( function(el) {  
      new SelectFx(el, {
  onChange: function(val) {
	if(val=='one-way-trip'){
		$('.return-date-box').addClass('hidden');
	}
	else{
		$('.return-date-box').removeClass('hidden');
	}
  }
});
   } );

$("#demo0").TouchSpin({
 verticalbuttons: true
});
$("#demo1").TouchSpin({
 verticalbuttons: true
});

$(".input-child-spin").TouchSpin({
 verticalbuttons: true
});

function total_passenger(){
	$v1 = parseInt($('#demo0').val());
	$v2 = parseInt($('#demo1').val());
	$('.total-psgr').html($v1+$v2);
}

function child_age(){
	$v2 = parseInt($('#demo1').val());
	if($v2!=0){
		$('.child-box-content .child-age-content').slice(0,$v2).addClass('active');
		$('.child-box-content .child-age-content').slice(($v2),7).removeClass('active');
	}
	else{
		$('.child-box-content .child-age-content').removeClass('active');
	}
}