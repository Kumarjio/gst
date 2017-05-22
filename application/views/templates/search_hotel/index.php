<?php
$home_slider_s = $this->comman_model->get_lang('services',$lang_id,NULL,array('enabled'=>1),'service_id',false);
?>
<?php $this->load->view('templates/includes/header.php'); ?>

<link href="assets/global/css/product_list/2.css" rel="stylesheet">    

<link rel="stylesheet" href="assets/global/plugins/bootstrap-select/css/bootstrap-select.css" >
<script src="assets/global/plugins/bootstrap-select/js/bootstrap-select.js"></script>


<link rel="stylesheet" href="assets/global/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css" >
<script src="assets/global/plugins/bootstrap-slider/dist/bootstrap-slider.min.js"></script>

<link href="assets/plugins/star_rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/star_rating/js/star-rating.js" type="text/javascript"></script>

<link href="assets/frontend/css/s_hotel.css"  rel='stylesheet' type='text/css' >
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyATD-1Cy4a5ltcel9jRVXGePRNxVB7A_Go"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>-->


<script type="text/javascript" src="assets/plugins/gmap/jquery.gmap.js"></script> 
<script type="text/javascript" src="assets/plugins/gmap/jquery.ui.map.js"></script>


<script src = "assets/global/plugins/angular/js/angular.min.js"></script>
<script src = "assets/global/plugins/angular/js/autocomplete.js"></script>
<link rel="stylesheet" href="assets/global/plugins/angular/css/autocomplete.css">
<script>
angular.module('example', ['google.places'])

		// Setup a basic controller with a scope variable 'place'
		.controller('MainCtrl', function ($scope) {
			$scope.place = '<?=$this->input->get('city')?>';
		});
</script>

<style>
.google-map{
  width: 100%;
}
.google-map.affix{
	position:fixed !important;
}

.results-map .ui-map-view {
  border-color: #d7d7d7;
  border-style: solid;
  border-width: 0 0 0 1px;
  display: block;
}
.acf-map {
  border: 1px solid #ccc;
  height: 680px;
  margin: 0;
  width: 100%;
}
</style>

<script type="text/javascript">
function infoOpen(i){
	google.maps.event.trigger(gmarkers[i], 'click');
}

var gmarkers = [];
var infowindow = new google.maps.InfoWindow;
var map = '';

function render_map( $el ) {
	// var
	var $markers = $el.find('.marker');
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};

	// create map	        	
	map = new google.maps.Map( $el[0], args);

	// add a markers reference
	map.markers = [];

	// add markers
	$markers.each(function(){
	   	add_marker( $(this), map );
	});

	// center map
	center_map( map );
	initialize1(map);	

}

function add_marker( $marker, map ) {
	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );
	gmarkers.push(marker);
	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		infowindow = new google.maps.InfoWindow({maxHeight: 100});
		var content = $marker.html();
		google.maps.event.addListener(marker, 'click', (function(marker, content) {
			return function() {
				infowindow.close();
				infowindow.setContent(content);
				infowindow.open(map, marker);
			}
		})(marker, content));
	}
}

function center_map( map ) {
	// vars
	var bounds = new google.maps.LatLngBounds();
	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){
		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
		bounds.extend( latlng );
	});

	// only 1 marker?
	if( map.markers.length == 1 ){
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else{
		// fit to bounds
		map.fitBounds( bounds );
	}

}
function initialize() {
	//alert('sdf');
 var map = document.getElementById("map_canvas");
    google.maps.event.trigger(map, 'resize');         // fixes map display
   // map.setCenter(center); 
	google.maps.event.trigger(document.getElementById("map_canvas"), 'resize');
/*	map.setZoom( map.getZoom() );
	google.maps.event.addDomListener(window, 'resize', function() {
		//map.setCenter(homeLatlng);
	});*/

}



$(document).ready(function(){
	$(window).load(function() { 
/*	$('.acf-map').each(function(){
		render_map( $(this) );
		
	});*/
	reloadMap(); 
	});
});
function reloadMap(){
	$('.acf-map').each(function(){
		render_map( $(this) );
	});	
}

var autocomplete;
function initialize1(map) {
			
	 autocomplete = new google.maps.places.Autocomplete(
		  /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
		  { types: ['geocode'] });
		google.maps.event.addListener(autocomplete, 'place_changed', function() {
			var place = autocomplete.getPlace();
			var gps = place.geometry.location.lat()+', '+place.geometry.location.lng();
			var latitude = place.geometry.location.lat();
			var longitude = place.geometry.location.lng();
			
			if (place.geometry.viewport) {
				//console.log(place.geometry.viewport);
				map.fitBounds(place.geometry.viewport);
			} else {
				//console.log(place.geometry.location);
				map.setCenter(place.geometry.location);
				map.setZoom(17);  // Why 17? Because it looks good.
			}

			searchMapdata('current',latitude,longitude);
	  });
}

function selectCountry(ids) {
	var address = ids;
	var geocoder = new google.maps.Geocoder();
	geocoder.geocode({address: address}, function(results, status) {

	if (status == google.maps.GeocoderStatus.OK) {
		map.setCenter(results[0].geometry.location);
		map.setZoom(5);  // Why 17? Because it looks good.
		searchMapdata('country',address,address);
	} else {
	//	 alert(address + ' not found');
	}
	});
}

function add_markers(){
	//console.log('asd');
	// var
	var latlng = new google.maps.LatLng( 22.30228751349172, 76.21589389376999 );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );
	gmarkers.push(marker);
	// if marker contains HTML, add it to an infoWindow
		// create info window
		infowindow = new google.maps.InfoWindow({maxHeight: 100});
		var content = 'Hello';
		google.maps.event.addListener(marker, 'click', (function(marker, content) {
			return function() {
				infowindow.close();
				infowindow.setContent(content);
				infowindow.open(map, marker);
			}
		})(marker, content));

}

</script>

<style>

.search-section{
  background-image: url("<?='assets/uploads/sites/'.$settings['background_hotel_search'];?>");
  background-attachment: fixed;
  background-position: center center;
  background-size: cover;
}
</style>

<body onLoad="" ng-app="example">
<div id="fh5co-wrapper">
<div id="fh5co-page">
<!-- BEGIN HEADER -->
<?php $this->load->view('templates/includes/menu.php'); ?>
<?php $this->load->view('templates/includes/menu_tab.php'); ?>
<!-- END global-header -->




<!-- END HEADER -->
<div class="search-section">

<div class="search-wrapper">
    <div class="search-form-wp" >
	    <div class="search-container bg-sys" style="margin-bottom:0"  ng-controller="MainCtrl">
        	<div class="container">
	    	    <form action="hotels/ajax" id="advance-search-form" method="get">
				<div class="row">
        <div class="form-group">
            <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
                <label class="input"><?=show_static_text($lang_id,84);?>:</label>
    	        <div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                    <input type="text" name="city" value="<?=$this->input->get('city')?>" class="form-control"  g-places-autocomplete ng-model="place" autocomplete="off"  required>
                </div>
            </div>
            
            <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
                <label class="input"><?=show_static_text($lang_id,304);?>:</label>
	            <div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
				    <input class="form-control" type="text" id="input-s-date" name="in_date" value="<?=$this->input->get('in_date')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
                </div>
            </div>
            
            <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
                <label class="input"><?=show_static_text($lang_id,305);?>:</label>
	            <div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
					    <input class="form-control" type="text" id="input-e-date" name="out_date" value="<?=$this->input->get('out_date')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
                </div>
            </div>
    
            <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
                <label class="input"><?=show_static_text($lang_id,130);?>:</label>
                    <select class="selectpicker show-tick" name="adult" >
    <?php
    $get_adult = $this->input->get('adult');
    for($i=1;$i<8;$i++){
    ?>
        <option value="<?=$i?>" <?=$get_adult==$i?'selected':''?> ><?=$i?></option>
    <?php
    }
    ?>                
</select>
            </div>
            <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
                <label class="input"><?=show_static_text($lang_id,138);?>:</label>
                <select class="selectpicker show-tick" name="children" >
    <?php
    $get_adult = $this->input->get('children');
    for($i=0;$i<4;$i++){
    ?>
        <option value="<?=$i?>" <?=$get_adult==$i?'selected':''?> ><?=$i?></option>
    <?php
    }
    ?>                
</select>

                    
            </div>
    
            
        <div class="col-md-2 col-sm-12 col-xs-12 search-btns" >
            <button type="submit" class="btn btn-sys btn-sm pull-right" style=""><i class="fa fa-search"></i> <?=show_static_text($lang_id,3);?></button>
            <button type="button" id="save-btn" class="btn btn-info btn-sm pull-right" onClick="save_data();" style="margin-right:5px"><i class="fa fa-floppy-o"></i> <?=show_static_text($lang_id,235);?></button>
    
            </div>
            
           
        </div>
        
            <div class="clearfix"></div>
    </div>	
	        </form>
            </div>
    
    </div>
    
    <div class="search-container filter-wrapper bg-purple3">
    <div class="container">
    
<?php
$min_price =$this->input->get('min_price');
$max_price =$this->input->get('max_price');
?>    

    <div class="row">
        <div class="col-md-3">
        	<div class="side-c">
	        <h4 class="l-title"><?=show_static_text($lang_id,41);?></h4>
        <div class="case-header">
        <div class="items"><?=$lang_currency?> <span class="s-min-price"><?=$min_price?$min_price:0?></span></div>
        <div class="items text-right "><?=$lang_currency?> <span class="s-max-price"><?=$max_price?$max_price:200?></span></div>
        </div>
        
        <input id="ex2" type="text" name="price"  style="width:100%" value="" data-slider-min="1" data-slider-max="200" data-slider-step="1" data-slider-value="[1,200]"/> 
        </div>
    </div>
        
        <div class="col-md-2 hotels-toolbar-filter">
            <div class="side-c">
            <h4 class="l-title"><?=show_static_text($lang_id,68);?></h4>
                <input id="rating-input" name="rate" type="number" value="0" class="rating rating-input" min=0 max=5 step=1 data-size="sm" data-show-clear="true" data-show-caption="false" data-stars="5" onChange="filter_data();" />  
            </div>
        </div>

        <div class="col-md-2 hotels-toolbar-filter">
    <div class="side-c">
    <h4 class="l-title"><?=show_static_text($lang_id,6800);?>Area</h4>
        <div class="input-field">
                        <div class="dropdown  mega-dropdown passenger">
                            <a href="javascript:;" class="dropdown-toggle " > Any <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-lr animated mega-dropdown-menu pull-right" role="menu">
                            <div class="col-lg-12" style="margin-bottom:5px" >
	                            <div class="checkbox">
  <label><input type="checkbox" name="optradio" checked> field 1</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="optradio" checked> field 1</label>
</div>

                            </div>
                            
                            </ul>
                        </div>

                    </div>  
    </div>

        </div>
        
        <div class="col-md-2 hotels-toolbar-filter">
    <div class="side-c">
    <h4 class="l-title"><?=show_static_text($lang_id,6800);?>Amenities</h4>
        <div class="input-field">
            <div class="dropdown  mega-dropdown passenger">
                <a href="javascript:;" class="dropdown-toggle " > Any <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-lr animated mega-dropdown-menu pull-right" role="menu">
                <div class="col-lg-12" style="margin-bottom:5px" >
                    <div class="checkbox">
					  <label><input type="checkbox" name="optradio" checked> Swimming pool</label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" name="optradio" checked> Parking</label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" name="optradio" checked> Air conditioned</label>
					</div>

                </div>
                
                </ul>
            </div>

                    </div>  
    </div>

        </div>

        <div class="col-md-2 hotels-toolbar-filter">
    <div class="side-c">
    <h4 class="l-title"><?=show_static_text($lang_id,6800);?>Property type</h4>
        <div class="input-field">
            <div class="dropdown  mega-dropdown passenger">
                <a href="javascript:;" class="dropdown-toggle " > Any <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-lr animated mega-dropdown-menu pull-right" role="menu">
                <div class="col-lg-12" style="margin-bottom:5px" >
                    <div class="checkbox">
					  <label><input type="checkbox" name="optradio" checked> Hotel</label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" name="optradio" checked> Guest House</label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" name="optradio" checked> Homestay</label>
					</div>

                </div>
                
                </ul>
            </div>

                    </div>  
    </div>

        </div>
        
        
    </div>
    </div>
    </div>
      </div><!--//search-form-wp//-->

                   	
    <div class="search-container search-contents" >
    <div class="row"  >

        
        <div class="col-md-7 col-sm-12 result-wrapper">
<div class="ajax-loading recent-loading"><img src="assets/uploads/loading.gif" alt="loading..."></div>
<div class="">
<div class="filter-page__content">
	<div class="filter-item-wrapper" id="result-data">
<?php $this->load->view('templates/search_hotel/ajax_search'); ?>
	</div>
</div>    
</div>
<div class="clear"></div>
<?php
if(isset($products)&&!empty($products)){
?>
<div class="" style="text-align: center;display:none">
<button class="btn btn-primary" id="ajax-more" onClick="ajax_more()" value="loadmore">
Load more..<img style="display: none" id="loader" src="assets/uploads/loading.gif"> 
</button>
<input type="hidden" name="limit" id="limit" value="12"/>
<input type="hidden" name="offset" id="offset" value="12"/>
    </div>
<?php
}
else{
?>
<div class="" style="text-align: center;display:none" id="more-btn-cont">
<button class="btn btn-primary" id="ajax-more" onClick="ajax_more()" value="loadmore">
Load more..<img style="display: none" id="loader" src="assets/uploads/loading.gif"> 
</button>
<input type="hidden" name="limit" id="limit" value="12"/>
<input type="hidden" name="offset" id="offset" value="12"/>
    </div>
<?php
}
?>
        </div>
        
        <div class="col-md-5 hidden-sm hidden-xs map-wrapper">
<div class="google-map sticky " ><!--data-spy="affix" data-offset-top="205" -->
    <div class="ui-map-view">
<div class="acf-map" id="map_canvas"><?php $this->load->view('templates/search_hotel/ajax_map'); ?></div>
</div>
</div><!--//google-map//-->
        </div>
        
        
    	<!--///col-xs-6/-->
	</div>
    </div><!--//search-content//-->
</div>
<section id="aa-banner" class="bottom-banner hidden-sm hidden-xs" style="padding:10px 0">
    <div class="container search-content">
      <div class="row">

<?php
$slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'bottom'),'banner_id',false);
if($slider_banner){
	$i=0;
	foreach($slider_banner as $set_sl){
			
?>
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
<?php
if(!empty($set_sl->body)){
	echo $set_sl->body;
}
else{
?>
<a href="<?=$set_sl->link?>"><img src="<?='assets/uploads/banners/'.$set_sl->image?>" style="width:100%;height:auto" /></a>
<?php
}
?>    

          </div>
          </div>
        </div>

<?php
	}
}
?>
      </div>
    </div>
  </section>
</div><!--//search-section//-->

<?php $this->load->view('templates/includes/footer.php'); ?>
</div><!--//fh5co-page//-->
</div><!--//fh5co-wrapper//-->
<script type="text/javascript">
var submitCount = 0;
jQuery(document).ready(function(){

  jQuery('#advance-search-form').submit(function(e){
    e.preventDefault();
    var loadUrl = jQuery('#advance-search-form').attr('action');
    var data = jQuery('#advance-search-form').serialize();
    jQuery('.recent-loading').show(); 

    jQuery.get(
        loadUrl,
        data,
        function(result){
			//get_other_data();
           if(result.url!=window.location){
	             window.history.pushState({path:result.url},'',result.url);
           }
			if(result.result=='ok'){  
				submitCount = 0;
				jQuery('#offset').val(result.offset);
				jQuery('#limit').val(result.limit);
				jQuery('.recent-loading').hide(); 
				jQuery('#result-data').html(result.content);          
				jQuery('#map_canvas').html(result.content_map);          
				reloadMap();
				if(result.more_d){
					jQuery('#ajax-more').show();
				}
				else{
					jQuery('#ajax-more').hide();
				}
			}
			else{
				if(submitCount<5){
					submitCount++;
					setTimeout(function(){
						$('#advance-search-form').submit();
					}, 2000);
				}
			}
        },
        'json'
    );

  });



  var initialURL = location.href;

});

function get_other_data(){

    var data = jQuery('#advance-search-form').serialize();
	$("#loader").show();
    $('.recent-loading').show(); 
    $.ajax({
        url:'hotels/ajax2',
		data:data,
        type:'get', 
		dataType: 'json',
        success:function(data){
	        $("#loader").hide();
		    $('.recent-loading').hide(); 
	         $('#result-data').append(data.content);          

/*			if(data.more_data==0){
				$('#ajax-more').hide();
			}*/
			if(data.more_d){
			}
			else{
				$('#ajax-more').hide();
			}
			
            $('#offset').val(data.offset);
            $('#limit').val(data.limit);
        }
    })
}
</script>
<script>
$(document).ready(function(){
	$(window).load(function() {
		submit_form();
	});
});

var reload_count = 0;
function submit_form(){
	var data = jQuery('#advance-search-form').serialize();
    $('.recent-loading').show(); 
    $.ajax({
        url:'hotels/ajax',
		data:data,
        type:'get', 
		dataType: 'json',
        success:function(data){
			if(data.result=='ok'){
			    $('.recent-loading').hide(); 
				$('#offset').val(data.offset);
				$('#limit').val(data.limit);
				$('#result-data').html(data.content);          
				$('#map_canvas').html(data.content_map);          
				reloadMap();
			}
			else{
				if(reload_count<5){
					reload_count++;
					setTimeout(function(){
						submit_form();
					}, 2000);
				}
			}
        }
    })
}

function save_data(){

	$('#save-btn').attr("disabled", true);
    $.ajax({
        url:'hotels/save',
		data:{url:window.location.href,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
        type:'post', 
		dataType: 'json',
        success:function(data){
		$('#save-btn').attr("disabled", false);
			$('.alert-msge').html(data.msge);
			$('.popupmsgcontent').addClass('show_msge');
			
			if(data.status=='ok'){
				setTimeout(function(){		
					$('.alert-msge').html();
					$('.popupmsgcontent').removeClass('show_msge');
				  
				}, 3000);
			}
			else{
				setTimeout(function(){		
					$('.alert-msge').html();
					$('.popupmsgcontent').removeClass('show_msge');
				  
				}, 3000);
			}
        }
    })
	
}
</script>


<link href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css"  rel='stylesheet' type='text/css' >
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>

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

</script>

<!--<script type="text/javascript" src="assets/frontend/js/sticky.compile.js"></script>-->
<script>
$("#ex2").slider({}).on('slide', function(ev){
	vl = $('#ex2').val();
	tmpA = vl.split(',');
	$('.s-min-price').html(tmpA[0]);
	$('.s-max-price').html(tmpA[1]);
	
  }).on('slideStop', function(ev){
		filter_data();
/*		vl = $('#ex2').val();
		tmpA = vl.split(',');*/
	
  });
/*$(document).ready(function(){
      var sticky = new Sticky('.google-map', {});
});*/
</script>

<!--<script type="text/javascript" src="assets/frontend/js/jquery.sticky.js"></script>
<script>
  $(".google-map").sticky({ topSpacing: 230, center:true, className:"hey" }).on('sticky-end', function() { console.log("Ended"); }).on('sticky-bottom-reached', function() { console.log("Bottom reached"); });
</script>-->

<!--<script type="text/javascript" src="assets/frontend/js/sticky-kit.js"></script>

<script>
$(document).ready(function(){
$(".google-map").stick_in_parent({
        parent: ".search-content",
        spacer: ".manual_spacer"
      }).on("sticky_kit:stick", function(e) {
		  $('.google-map').css('top','230px');
		  console.log("has stuck!", e.target);
  })
  .on("sticky_kit:unstick", function(e) {
		  $('.google-map').css('top','auto');
		  console.log("has unstuck!", e.target);
  });;
});

</script>-->

<script>
function filter_data(){
	console.log('sdf');
	vl = $('#ex2').val();
	tmpA = vl.split(',');
	rating =$('#rating-input').val();
	
	min_price =tmpA[0];
	max_price =tmpA[1];
	console.log('min: '+min_price+'; Max : '+max_price+'; ratign: '+rating);
	
	$(".filter-item-wrapper .flight-item").each(function(index){			
		//$(this).fadeIn("slow");
		star_d = parseFloat($(this).attr("data-star"));
		price_d = parseFloat($(this).attr("data-price"));
		star_d = parseFloat($(this).attr("data-star"));
	//	console.log(priceID+' : '+checkID+':'+checkSubID);
		//console.log(id+' : '+sub_c+ ': '+price);
		if(rating!=0){
			if(min_price<=price_d&&price_d<=max_price&&rating==star_d){
				$(this).fadeIn("slow");
			}
			else{
				$(this).fadeOut("fast");
			}
		}
		else{
			if(min_price<=price_d&&price_d<=max_price){
				$(this).fadeIn("slow");
			}
			else{
				$(this).fadeOut("fast");
			}
		}


	}); 

}

$(document).ready(function(){
	$(".clear-rating-active").click(function(){
		filter_data();
	}); 
});

$(document).ready(function(){
	$(window).load(function() {
		$('.google-map').css('width',$('.google-map').width()); 
	});
});

$(document).ready(function(){
	$(window).load(function() {

var headerHeight = $('header').outerHeight(true); // true value, adds margins to the total height
var footerHeight = $('footer').innerHeight()+100;
$('.google-map').affix({
    offset: {
        top: headerHeight,
        bottom: footerHeight
    }
}).on('affix.bs.affix', function () {}).on('affix-bottom.bs.affix', function () {});	

});	
});	
</script>

<script>
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

</script>
</body>
</html>

