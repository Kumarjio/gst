<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyATD-1Cy4a5ltcel9jRVXGePRNxVB7A_Go"></script>

<script src = "assets/global/plugins/angular/js/angular.min.js"></script>
<script src = "assets/global/plugins/angular/js/autocomplete.js"></script>
<link rel="stylesheet" href="assets/global/plugins/angular/css/autocomplete.css">
<script>
angular.module('example', ['google.places'])
		// Setup a basic controller with a scope variable 'place'
		.controller('MainCtrl', function ($scope) {
			$scope.place = null;
		});
</script>


<link rel="stylesheet" href="assets/global/plugins/bootstrap-select/css/bootstrap-select.css" >
<script src="assets/global/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<?php
$service_icon = array('hajj.png','hand.png','notepad.png','cruises.png');
?>

<?php
$home_slider_s = $this->comman_model->get_lang('services',$lang_id,NULL,array('enabled'=>1),'service_id',false);
?>
<link rel="stylesheet" href="assets/frontend/css/home_search.css" />
<script type="text/javascript" src="assets/global/plugins/typeahead/js/bootstrap-typeahead.js"></script> 
<link rel="stylesheet" href="assets/global/plugins/touchspin/jquery.bootstrap-touchspin.css" />
<script type="text/javascript" src="assets/global/plugins/touchspin/jquery.bootstrap-touchspin.js"></script> 

<script>
$(document).ready(function() {
           
$("#advance-search-form .f-place").typeahead({
	onSelect: function(item) {
		$('#i-fid').val(item.value);
        console.log(item.value);
    },

    ajax: {
        url: "ajax_product/api",
        timeout: 500,
        displayField: "value",
  		valueField: "id",
        triggerLength: 1,
        method: "get",
        loadingClass: "loading-circle",
        preDispatch: function (query) {
            //showLoadingMask(true);
            return {
                query: query
            }
        },
        preProcess: function (data) {
          //  showLoadingMask(false);
            if (data.success === false) {
                // Hide the list, there was some error
                return false;
            }
            // We good!
            return data.results;
        }
    },
});

$("#advance-search-form .t-place").typeahead({
	onSelect: function(item) {
		$('#i-tid').val(item.value);
        console.log(item.value);
    },

    ajax: {
        url: "ajax_product/api",
        timeout: 500,
        displayField: "value",
  		valueField: "id",
        triggerLength: 1,
        method: "get",
        loadingClass: "loading-circle",
        preDispatch: function (query) {
            //showLoadingMask(true);
            return {
                query: query
            }
        },
        preProcess: function (data) {
          //  showLoadingMask(false);
            if (data.success === false) {
                // Hide the list, there was some error
                return false;
            }
            // We good!
            return data.results;
        }
    },
});


})
</script>

<style>
.home-slider-wrapper div.adult-select {
	background: #FFF;
}
.home-slider-wrapper .adult-select span {
  padding: 10px 4px !important;
}

.home-slider-wrapper .adult-select > span {
  background: transparent none repeat scroll 0 0;
  color: #000 !important;
}

</style>
<div class="home-slider-wrapper" ng-app="example">
<?php
if($set_home_background=='image'){
	$setHomeBackground = $settings['background'];			
?>

<style>
.fh5co-cover{
background-image: url('<?='assets/images/'.$settings['background'];?>') ;
background-repeat:no-repeat;
	
background-attachment: fixed;
background-position: center center !important;
}
.tabulation{
	margin-top:0
}
</style>
<div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="">
				<div class="desc">
					<div class="container">
						<div class="row">
								<div class="col-sm-12  col-md-12 ">
							<div class="desc2 animate-box">
									<h2><?=show_static_text($lang_id,342);?></h2>
									<h3><?=show_static_text($lang_id,343);?></h3>
									<!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
								</div>
							</div>
                            <div class="col-sm-12 col-md-12">
								<div class="tabulation animate-box">

								  <!-- Nav tabs -->
<ul class="search-tab nav nav-tabs nav-justified" role="tablist">
  <li role="presentation" class="active">
    <a href="#flights" aria-controls="flights" role="tab" data-toggle="tab"><span class="icons-png flight"></span> <span class="hidden-xs"><?=show_static_text($lang_id,335);?></span></a>
  </li>
  <li role="presentation">
       <a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab"><span class="icons-png hotel"></span>  <span class="hidden-xs"><?=show_static_text($lang_id,336);?></span></a>
  </li>
  <li role="presentation">
       <a href="#carhire" aria-controls="tab3" role="tab" data-toggle="tab"><span class="icons-png car"></span> <span class="hidden-xs"><?=show_static_text($lang_id,348);?></span></a>
  </li>
  <li role="presentation">
       <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"><!--<i class="icon-png"><img src="assets/frontend/images/icons/holiday.png"  style=" " /></i>--> <span class="icons-png holiday"></span> 
       
        <span class="hidden-xs"><?=show_static_text($lang_id,285);?></span></a>
  </li>
<?php
if($home_slider_s){
	$i=0;
	foreach($home_slider_s as $set_s){
?>
  <li role="presentation">
       <a href="#s-tab-<?=$set_s->id?>" aria-controls="s-tab-<?=$set_s->id?>" role="tab" data-toggle="tab">
       <span class="icons-png i-<?=$i?>"></span>
        <span class="hidden-xs"><?=$set_s->title?></span></a>
  </li>

<?php
$i++;
	}
}
?>  

</ul>

<?php $this->load->view('templates/includes/slider_tab');?>


								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

		</div>
        

<?php
}
else if($set_home_background=='slider'){
	if($sliders&&!empty($sliders)){

		$this->db->order_by('order','asc');
		$sliders = $this->comman_model->get('sliders',false);		
		if($sliders&&!empty($sliders)){
			$h_image = '';
			foreach($sliders as $set_btm_slider){
				$h_image .= "'assets/images/".$set_btm_slider->image."',";
			}
			$h_image = rtrim($h_image,',');
?>
<link rel="stylesheet" href="assets/plugins/slide/jquery.fadeshow-0.1.1.min.css" />
<script src="assets/plugins/slide/jquery.fadeshow-0.1.1.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function(){
		var fadeShow = $(".background").fadeShow({		
			correctRatio: true,
			shuffle: true,
			speed: 10000,
			images: [<?=$h_image?>]
		});
	});
	</script>
<style>
.background{
background: #333;
position: absolute;
width: 100%;
height: 800px;
z-index: 0;
min-height:528px;
}
.fadeShow-container .image{
	background-size:100% 100%;
}
.banner .container,.banner-pos{
	position:relative;
	z-index:12px;
}
.tabulation{
	margin-top:0px
}


</style>

<div class="fh5co-hero">
	<div class="background"></div>
			<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="">
				<div class="desc">
					<div class="container">
						<div class="row">
								<div class="col-sm-12  col-md-12 ">
							<div class="desc2 animate-box">
									<h2><?=show_static_text($lang_id,342);?></h2>
									<h3><?=show_static_text($lang_id,343);?></h3>
									<!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
								</div>
							</div>
                            <div class="col-sm-12 col-md-12">
								<div class="tabulation animate-box">

								  <!-- Nav tabs -->
<ul class="nav nav-tabs search-tab nav-justified" role="tablist">
  <li role="presentation" class="active">
    <a href="#flights" aria-controls="flights" role="tab" data-toggle="tab"><!--<i class="icon-png"><img src="assets/frontend/images/icons/flight.png" /></i>-->  <span class="icons-png flight"></span> <span class="hidden-xs"><?=show_static_text($lang_id,335);?></span></a>
  </li>
  <li role="presentation">
       <a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab"><span class="icons-png hotel"></span>  <span class="hidden-xs"><?=show_static_text($lang_id,336);?></span></a>
  </li>
  <li role="presentation">
       <a href="#carhire" aria-controls="tab3" role="tab" data-toggle="tab"><!--<i class="icon-png"><img src="assets/frontend/images/icons/car.png" /></i>--> <span class="icons-png car"></span> <span class="hidden-xs"><?=show_static_text($lang_id,348);?></span></a>
  </li>
  <li role="presentation">
       <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"><!--<i class="icon-png"><img src="assets/frontend/images/icons/holiday.png"  style=" " /></i>--> <span class="icons-png holiday"></span> 
       
        <span class="hidden-xs"><?=show_static_text($lang_id,285);?></span></a>
  </li>
<?php
if($home_slider_s){
	$i=0;
	foreach($home_slider_s as $set_s){
?>
  <li role="presentation">
       <a href="#s-tab-<?=$set_s->id?>" aria-controls="s-tab-<?=$set_s->id?>" role="tab" data-toggle="tab">
       <span class="icons-png i-<?=$i?>"></span>
        <span class="hidden-xs"><?=$set_s->title?></span></a>
  </li>

<?php
$i++;
	}
}
?>  
</ul>


<?php $this->load->view('templates/includes/slider_tab');?>


								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

		</div>
<?php
		}
	}
}
else if($set_home_background=='video'){
//	$homeVideo = $this->comman_model->get_by('settings_images',array('is_active'=>1),false,false,true);
	$homeVideo = $this->comman_model->get_by('home_images',array('id'=>1),false,false,true);
	if($homeVideo&&!empty($homeVideo)){

?>


<div id="videoDiv">
 <div id="videoBlock">
    <video poster="assets/images/<?=$homeVideo->image?>" preload="auto" loop autoplay muted>
        <source src="assets/uploads/home/<?=$homeVideo->video?>" type="video/webm" />
    </video>
<!-- <video preload="preload" id="video" autoplay="autoplay" loop="loop">
 <source src="/video/t12.mp4" type="video/mp4"></source>
 </video>-->
 <div id="videoMessage">
        <div class="container">
						<div class="row">
								<div class="col-sm-12  col-md-12 ">
							<div class="desc2 animate-box">
									<h2><?=show_static_text($lang_id,342);?></h2>
									<h3><?=show_static_text($lang_id,343);?></h3>
									<!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
								</div>
							</div>
                            <div class="col-sm-12 col-md-12">
								<div class="tabulation animate-box">

<ul class="nav nav-tabs search-tab nav-justified" role="tablist">
  <li role="presentation" class="active">
    <a href="#flights" aria-controls="flights" role="tab" data-toggle="tab"><!--<i class="icon-png"><img src="assets/frontend/images/icons/flight.png" /></i>-->  <span class="icons-png flight"></span> <span class="hidden-xs"><?=show_static_text($lang_id,335);?></span></a>
  </li>
  <li role="presentation">
       <a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab"><span class="icons-png hotel"></span>  <span class="hidden-xs"><?=show_static_text($lang_id,336);?></span></a>
  </li>
  <li role="presentation">
       <a href="#carhire" aria-controls="tab3" role="tab" data-toggle="tab"><!--<i class="icon-png"><img src="assets/frontend/images/icons/car.png" /></i>--> <span class="icons-png car"></span> <span class="hidden-xs"><?=show_static_text($lang_id,348);?></span></a>
  </li>
  <li role="presentation">
       <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"><!--<i class="icon-png"><img src="assets/frontend/images/icons/holiday.png"  style=" " /></i>--> <span class="icons-png holiday"></span> 
       
        <span class="hidden-xs"><?=show_static_text($lang_id,285);?></span></a>
  </li>
<?php
if($home_slider_s){
	$i=0;
	foreach($home_slider_s as $set_s){
?>
  <li role="presentation">
       <a href="#s-tab-<?=$set_s->id?>" aria-controls="s-tab-<?=$set_s->id?>" role="tab" data-toggle="tab">
       <span class="icons-png i-<?=$i?>"></span>
        <span class="hidden-xs"><?=$set_s->title?></span></a>
  </li>

<?php
$i++;
	}
}
?>  
</ul>

								   <!-- Tab panes -->
<?php $this->load->view('templates/includes/slider_tab');?>


								</div>
							</div>
							
						</div>
					</div>
 </div>
 </div>
 </div>
 
 <style>
#videoDiv {width: 100%; height: 671px; position: relative;}
#videoBlock,#videoMessage {width: 100%; height: 360px; position: absolute; top: 0; left: 0;}
#videoMessage{
	top:30px;
}
#videoMessage {color:white;z-index:99;margin:90px 0 }
#videoMessage h1{font-size: 3em;color:#ffffff;}
#videoMessage h2{font-size: 2.5em;color:#ffffff;}
#videoMessage h3{font-size: 2.0em;color:#ffffff;}
.videoClick {text-align:center}
.videoClick a{color:white;background-color:rgba(241, 241, 241, 0.25);font-size: 1.7em;cursor:pointer;cursor:hand}
.tabulation{
	margin-top:0px
}

@media (max-width: 768px) {
	#videoMessage{
        top:5px;
		margin-top:0;
    }
/*	#videoMessage .desc2{
        display:none;
    }*/
  
#videoMessage .desc2 h2{
    font-size:15px;
	margin-bottom:4px
  }
#videoMessage .desc2 h3{
    font-size:13px;
	margin-bottom:10px
  }
}

</style>

<div style="clear:both"></div>



<?php
		}

}
else if($set_home_background=='Youtube'){
//	$homeVideo = $this->comman_model->get_by('settings_images',array('is_active'=>1),false,false,true);
	$homeVideo = $this->comman_model->get_by('home_images',array('id'=>1),false,false,true);
	if($homeVideo){

?>
<script type="text/javascript" src="assets/global/plugins/youtubebackground/jquery.youtubebackground.js"></script> 

<style>
.tabulation{
	margin-top:0
}

.fh5co-cover, .fh5co-hero {
  height: 850px;
}
@media (max-width: 768px) {
	.ytplayer-container iframe{
		height:683px !important;
	}
.fh5co-cover, .fh5co-hero {
  height: 683px;
}
}
</style>
<div class="fh5co-hero">
<div id="video"></div>
			<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="">
				<div class="desc">
					<div class="container">
						<div class="row">
								<div class="col-sm-12  col-md-12 ">
							<div class="desc2 animate-box">
									<h2><?=show_static_text($lang_id,342);?></h2>
									<h3><?=show_static_text($lang_id,343);?></h3>
									<!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
								</div>
							</div>
                            <div class="col-sm-12 col-md-12">
								<div class="tabulation animate-box">

								  <!-- Nav tabs -->
<ul class="nav nav-tabs search-tab nav-justified" role="tablist">
  <li role="presentation" class="active">
    <a href="#flights" aria-controls="flights" role="tab" data-toggle="tab"><!--<i class="icon-png"><img src="assets/frontend/images/icons/flight.png" /></i>-->  <span class="icons-png flight"></span> <span class="hidden-xs"><?=show_static_text($lang_id,335);?></span></a>
  </li>
  <li role="presentation">
       <a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab"><span class="icons-png hotel"></span>  <span class="hidden-xs"><?=show_static_text($lang_id,336);?></span></a>
  </li>
  <li role="presentation">
       <a href="#carhire" aria-controls="tab3" role="tab" data-toggle="tab"><!--<i class="icon-png"><img src="assets/frontend/images/icons/car.png" /></i>--> <span class="icons-png car"></span> <span class="hidden-xs"><?=show_static_text($lang_id,348);?></span></a>
  </li>
  <li role="presentation">
       <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"><!--<i class="icon-png"><img src="assets/frontend/images/icons/holiday.png"  style=" " /></i>--> <span class="icons-png holiday"></span> 
       
        <span class="hidden-xs"><?=show_static_text($lang_id,285);?></span></a>
  </li>
<?php
if($home_slider_s){
	$i=0;
	foreach($home_slider_s as $set_s){
?>
  <li role="presentation">
       <a href="#s-tab-<?=$set_s->id?>" aria-controls="s-tab-<?=$set_s->id?>" role="tab" data-toggle="tab">
       <span class="icons-png i-<?=$i?>"></span>
        <span class="hidden-xs"><?=$set_s->title?></span></a>
  </li>

<?php
$i++;
	}
}
?>  
</ul>

<?php $this->load->view('templates/includes/slider_tab');?>


								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

		</div>

<div style="clear:both"></div>
<script>
$('#video').YTPlayer({
    fitToBackground: true,
    videoId: '<?=$homeVideo->video_link?>'
});
</script>
<style>
#video{
 position: relative;
 background: transparent;
}

.ytplayer-container{
 position: absolute;
 top: 0;
 z-index: -1;
}
</style>

<?php
		}
}
?>

<link href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css"  rel='stylesheet' type='text/css' >
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
$('.datetimepicker1').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});

$('.d-s-date').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});

$('.d-e-date').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});


/*$('#i-h-s-date').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});

$('#i-h-e-date').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});*/

});


var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('#i-h-s-date').datepicker({
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
    $('#i-h-e-date')[0].focus();
}).data('datepicker');

var checkout = $('#i-h-e-date').datepicker({
    beforeShowDay: function(date) {
        return date.valueOf() <= checkin.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    checkout.hide();
}).data('datepicker');

</script>

<script>

var checkin2 = $('#i-h-s-date2').datepicker({
    beforeShowDay: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkout2.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout2.setDate(newDate);		
    }
    else {
        checkout2.setDate(ev.date + 1);
    }
    
    checkin2.hide();
    $('#i-h-e-date2')[0].focus();
}).data('datepicker');

var checkout2 = $('#i-h-e-date2').datepicker({
    beforeShowDay: function(date) {
        return date.valueOf() <= checkin2.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    checkout2.hide();
}).data('datepicker');

</script>

<script>

var checkin3 = $('#i-h-s-date3').datepicker({
    beforeShowDay: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkout3.viewDate.valueOf()){
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout3.setDate(newDate);		
    }
    else {
        checkout3.setDate(ev.date + 1);
    }
    
    checkin3.hide();
    $('#i-h-e-date3')[0].focus();
}).data('datepicker');

var checkout3 = $('#i-h-e-date3').datepicker({
    beforeShowDay: function(date) {
        return date.valueOf() <= checkin3.viewDate.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    checkout3.hide();
}).data('datepicker');

</script>

<script>
   [].slice.call( document.querySelectorAll( 'select.input-trip-type' ) ).forEach( function(el) {  
      new SelectFx(el, {
  onChange: function(val) {
	if(val=='one-way-trip'){
		$('.return-date-box').addClass('hidden');
	}
	else{
		$('.return-date-box').removeClass('hidden');
	}
//    console.log('val', val); //callback for value change
  }
});
   } );

/*jQuery(document).ready(function(){
new SelectFX('.input-trip-type', {
  onChange: function(val) {
    console.log('val', val); //callback for value change
  }
});
});*/

/*function select_trip_type(id){
	alert('sdf');
	if(id=='one-way-trip'){
		$('.return-date-box').addClass('hidden');
		
	}
}*/
</script>
</div>

<script>
    $("#demo0").TouchSpin({
		 verticalbuttons: true
    });
    $("#demo1").TouchSpin({
		 verticalbuttons: true
    });

    $(".input-child-spin").TouchSpin({
		 verticalbuttons: true
    });

$(document).ready(function(){

$('.dropdown.mega-dropdown a').on('click', function (event) {
    $(this).parent().toggleClass("open");
});

$('body').on('click', function (e) {
    if (!$('.dropdown.mega-dropdown').is(e.target) && $('li.dropdown.mega-dropdown').has(e.target).length === 0 && $('.open').has(e.target).length === 0) {
        $('.dropdown.mega-dropdown').removeClass('open');
    }
});
});


function total_passenger(){
	$v1 = parseInt($('#demo0').val());
	$v2 = parseInt($('#demo1').val());
	$('.total-psgr').html($v1+$v2);
}

function child_age(){
	$v2 = parseInt($('#demo1').val());
//	$('.child-box-content .child-age-content:lt('+($v2+4)+')').addClass('active');
	if($v2!=0){
		$('.child-box-content .child-age-content').slice(0,$v2).addClass('active');
		$('.child-box-content .child-age-content').slice(($v2),7).removeClass('active');
	}
	else{
		$('.child-box-content .child-age-content').removeClass('active');
	}
/*	dk = $v2+1;
	for(i=dk;i<=7;i++){
		console.log(i);
//		$('.child-box-content .child-age-content:lt('+i+')').removeClass('active');
	}*/
}

function set_return(){
	if($('#i-c-d-l').is(':checked')){
		$('.car-return-text-box').removeClass('hidden');
	}
	else{
		$('.car-return-text-box').addClass('hidden');
	}
}

</script>
<!-- /.navbar -->


