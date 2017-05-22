<?php
$home_slider_s = $this->comman_model->get_lang('services',$lang_id,NULL,array('enabled'=>1),'service_id',false);
$get_trtip_type = $this->input->get('trip_type');

?>
<?php $this->load->view('templates/includes/header.php'); ?>


<link rel="stylesheet" href="assets/global/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css" >
<script src="assets/global/plugins/bootstrap-slider/dist/bootstrap-slider.min.js"></script>

<link rel="stylesheet" href="assets/global/plugins/touchspin/jquery.bootstrap-touchspin.css" />
<script type="text/javascript" src="assets/global/plugins/touchspin/jquery.bootstrap-touchspin.js"></script> 


<!--<link href="assets/plugins/star_rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/star_rating/js/star-rating.js" type="text/javascript"></script>-->
<link href="assets/global/css/product_list/2.css" rel="stylesheet">    
<link href="assets/frontend/css/s_flight.css"  rel='stylesheet' type='text/css' >



<style>
.search-section{
  background-image: url("<?='assets/uploads/sites/'.$settings['background_flight_search'];?>");
  background-attachment: fixed;
  background-position: center center;
  background-size: cover;
}

</style>

<style>

.filter-page__content {
  margin-bottom: 32px;
}

.typeahead-devs, .tt-hint, .country, .allcountry {
  border: 2px solid #cccccc;
  border-radius: 8px;
  font-size: 14px;
  height: 44px;
  line-height: 30px;
  outline: medium none;
  padding: 8px 18.4px;
  width: 100%;
}

/*.typeahead-devs, .tt-hint,.country,.allcountry  {
 	border: 2px solid #CCCCCC;
    border-radius: 8px 8px 8px 8px;
    font-size: 24px;
    height: 45px;
    line-height: 30px;
    outline: medium none;
    padding: 8px 12px;
    width: 400px;
}*/

.tt-dropdown-menu {
  width: 400px;
  margin-top: 5px;
  padding: 8px 12px;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px;
  font-size: 18px;
  color: #111;
  background-color: #F1F1F1;
}

</style>

<style>



</style>
<!--<script src="assets/global/plugins/typeahead/js/bloodhound.min.js"></script>-->
<script type="text/javascript" src="assets/global/plugins/typeahead/js/bootstrap-typeahead.js"></script> 

<script>
$(document).ready(function() {

/*$('#advance-search-form .f-place').typeahead({
	ajax: {
		url: '<?='ajax_product/api'?>',
		triggerLength: 1 
	}
});*/
           
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
.ajax-loading{
	display:none;
	text-align:center;
}

</style>
<body >
<div id="fh5co-wrapper">
<div id="fh5co-page">

<!-- BEGIN HEADER -->
<?php $this->load->view('templates/includes/menu.php'); ?>
<?php $this->load->view('templates/includes/menu_tab.php'); ?>

<!-- END global-header -->
<div id="leftBanner" class="hidden-ms leftBanner" title="See best prices for hotels and flights.">
<?php
$slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'left'),'banner_id',false);
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

<div id="rightBanner" class="hidden-ms rightBanner" title="See best prices for hotels and flights.">
<?php
$slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'right'),'banner_id',false);
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

<div class="search-section">
<!-- END HEADER -->
<div class="search-wrapper ">
  <div class="products-section-0114">
<div class="sidebox-container search-form-wp">
<form action="flights/ajax" id="advance-search-form" method="get">
    <input type="hidden" name="min_price" id="min-price" value="<?=$this->input->get('min_price')?>" >
    <input type="hidden" name="max_price" id="max-price" value="<?=$this->input->get('max_price')?>" >
    <input type="hidden" name="fId" id="i-fid" value="<?=$this->input->get('fId')?>" >
    <input type="hidden" name="tId" id="i-tid" value="<?=$this->input->get('tId')?>" >
<div class="row">
	<div class="form-group">
    
    
            
            

		<div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
	        <label class="input"><?=show_static_text($lang_id,94);?>:</label>
            
            <!--<div class="icon-addon addon-lg">
                    <input type="text" placeholder="Email" class="form-control" id="email">
                    <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
                </div>-->
            <div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
				<input type="text" name="from_place" value="<?=$this->input->get('from_place')?>" class="form-control f-place" autocomplete="off"  aria-required="true" required>
            </div>
        </div>
		

		<div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
	        <label class="input"><?=show_static_text($lang_id,95);?>:</label>
            <div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
				<input type="text" name="to_place" value="<?=$this->input->get('to_place')?>" class="form-control t-place"  autocomplete="off"  aria-required="true" required>
			</div>                
        </div>
		
		<div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
	        <label class="input"><?=show_static_text($lang_id,108);?>:</label>
            <div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
				<input class="form-control" type="text" id="input-s-date" name="d_date" value="<?=$this->input->get('d_date')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
            </div>
        </div>
		
		<div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10  return-date-box <?=$get_trtip_type=='one-way-trip'?'hidden':''?>">
	        <label class="input"><?=show_static_text($lang_id,339);?>:</label>
            <div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
				<input class="form-control" type="text" id="input-e-date" name="r_date"  value="<?=$this->input->get('r_date')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"    />
			</div>                
        </div>

		<div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10 ">
                
                    <div class="input-field">
		                <label for="i-h-e-date2"><?=show_static_text($lang_id,349);?>:</label>
                        <div class="dropdown  mega-dropdown passenger">
                            <a href="javascript:;" class="dropdown-toggle " ><span class="total-psgr">1</span> Passengers <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-lr animated mega-dropdown-menu pull-right" role="menu">
                            <div class="col-lg-12" style="margin-bottom:5px" >
	                            <section>
                <label for="class"><?=show_static_text($lang_id,130);?>:</label>
                <input id="demo0" type="text" value="<?=$this->input->get('adults')?>" name="adults" onChange="total_passenger()" data-bts-min="1" data-bts-max="8" data-bts-step="1">
            </section>
                            </div>
                            <div class="col-lg-12">
	                            <section>
                <label for="class"><?=show_static_text($lang_id,138);?>:</label>
                <input id="demo1" type="text" value="<?=$this->input->get('children')?>" name="children" onChange="total_passenger();child_age();" data-bts-min="0" data-bts-max="7" data-bts-step="1">
            </section>
                            </div>
	                            <div class="col-lg-12 child-box-content" style="">
	                            <div class="child-age-content">
                                    <label for="class">Age of child 1:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" onChange="total_passenger();" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>

            					<div class="child-age-content">
                                    <label for="class">Age of child 2:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" onChange="total_passenger();" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>

                                
                                <div class="child-age-content">
                                    <label for="class">Age of child 3:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>
                                <div class="child-age-content">
                                    <label for="class">Age of child 4:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>
                                <div class="child-age-content">
                                    <label for="class">Age of child 5:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>

                                <div class="child-age-content">
                                    <label for="class">Age of child 6:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>
                                
                                <div class="child-age-content">
                                    <label for="class">Age of child 7:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>

                            </div>
                            </ul>
                        </div>

                    </div>
        </div>
		        

<!--//col-md-4//-->
        

	<div class="col-md-2 col-sm-12 col-xs-12 search-btns ">
        <button type="submit" class="btn btn-sys btn-sm pull-right" style=""><i class="fa fa-search"></i> <?=show_static_text($lang_id,3);?></button>
        <button type="button" id="save-btn" class="btn btn-info btn-sm pull-right" onClick="save_data();" style="margin-right:10px"><i class="fa fa-floppy-o"></i> <?=show_static_text($lang_id,235);?></button>
        </div>
		
       
    </div>
</div>    
    <div class="row">
    <div class="col-sm-3">
        <section>
        	<span class="label"><?=show_static_text($lang_id,310);?>:</span>
<?php

?>
            <select class="cs-select input-trip-type cs-skin-border" name="trip_type">
                <option value="one-way-trip" <?=$get_trtip_type=='one-way-trip'?'selected':''?>  >One-way trip</option>
                <option value="return-trip" <?=$get_trtip_type=='return-trip'?'selected':''?>>Return trip</option>
            </select>
        </section>
    </div>
    <div class="col-sm-3">
        <section>
        	<span class="label"><?=show_static_text($lang_id,310);?>:</span>
            <select class="cs-select cs-selects cs-skin-border">
            	<option value="Economy">Economy</option>
                <option value="Premium economy">Premium economy</option>
                <option value="Business class">Business class</option>
                <option value="First class">First class</option>
            </select>
        </section>
    </div>
    <div class="col-sm-6">
        <input type="checkbox" name="direct_preferred" value="1"> <span class="labels"><?=show_static_text($lang_id,314);?> &nbsp;&nbsp;&nbsp;&nbsp;</span>
        <input type="checkbox" name="Include nearby airports" value="1"> <span class="labels"><?=show_static_text($lang_id,317);?></span>
    </div>
    
	</div>
        <div class="clearfix"></div>
</form>
    <div class="clear"></div>
</div>    
<div class="container search-content">
<div class="row" >
    	

<div class="left-side-box">
<div class="sidebox-container side-content">
<?php
$min_price =$this->input->get('min_price');
$max_price =$this->input->get('max_price');
?>    

	<div class="row">
		<div class="col-md-12">
    <div class="side-c">
    <h4 class="l-title"><?=show_static_text($lang_id,41);?></h4>
    
    <input id="ex2" type="text" name="price"  style="width:100%" value="" data-slider-min="50" data-slider-max="10000" data-slider-step="10" data-slider-value="[<?=$min_price?$min_price:0?>,<?=$max_price?$max_price:10000?>]"/> 
    <div class="case-header">
        <div class="items"><?=$lang_currency?> <span class="s-min-price"><?=$min_price?$min_price:0?></span></div>
        <div class="items text-right "><?=$lang_currency?> <span class="s-max-price"><?=$max_price?$max_price:10000?></span></div>
    </div>
    </div>

	<div class="side-c">
	    <h4 class="l-title"><?=show_static_text($lang_id,4100);?>Stops</h4>
        <div class="case-header">
        <div class="stop-radio">
<div class="radio">
  <label><input type="radio" name="stop_filter" value="0" onChange="filter_data();">Non Stop</label>
</div>
<div class="radio">
  <label><input type="radio" name="stop_filter" value="1" onChange="filter_data();" >1 Stop</label>
</div>
<div class="radio">
  <label><input type="radio" name="stop_filter" value="2" onChange="filter_data();" >2 Stop</label>
</div>
<div class="radio ">
  <label><input type="radio" name="stop_filter" value="any" onChange="filter_data();" checked >Any Stop</label>
</div>
</div>




        </div>
    </div>

    
    <div class="side-c">
    <h4 class="l-title"><?=show_static_text($lang_id,4001);?>Max Flight Duration</h4>
    
    <input id="ex3" type="text" name="price"  style="width:100%" value="" data-slider-min="0" data-slider-max="60" data-slider-step="10" data-slider-value="60"/> 
    <div class="case-header">
        <div class="items">0</div>
        <div class="items text-right ">60m</div>
    </div>
    </div>
    
    <div class="side-c">
    <h4 class="l-title"><?=show_static_text($lang_id,4001);?>Time of day (Outbound)</h4>
    
    <input id="" class="si-range" type="text" name="price"  style="width:100%" value="" data-slider-min="0" data-slider-max="23" data-slider-step="1" data-slider-value="23"/> 
    <div class="case-header">
        <div class="items">0</div>
        <div class="items text-right ">23:00</div>
    </div>
    </div>
    
    

    

<div class="side-c">
	    <h4 class="l-title"><?=show_static_text($lang_id,4100);?> Origin Airports</h4>
        <div class="case-header">
        <div class="stop-radio">
<div class="checkbox">
  <label><input type="checkbox" name="optradio" checked><?=print_value('airports',array('id'=>$this->input->get('fId')),'cityCode','-');
?></label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="optradio" checked> Royal Brunei </label>
</div>


</div>

        </div>
    </div>
    
    <div class="side-c">
	    <h4 class="l-title"><?=show_static_text($lang_id,4100);?> Destination Airports</h4>
        <div class="case-header">
        <div class="stop-radio">
<div class="checkbox">
  <label><input type="checkbox" name="optradio" checked><?=print_value('airports',array('id'=>$this->input->get('tId')),'cityCode','-');
?></label>
</div>



</div>

        </div>
    </div>
    
    <div class="side-c">
	    <h4 class="l-title"><?=show_static_text($lang_id,4100);?>Via</h4>
        <div class="case-header">
        <div class="stop-radio">
<div class="checkbox">
  
</div>



</div>

        </div>
    </div>
    


	<div class="side-c">
	    <h4 class="l-title"><?=show_static_text($lang_id,4100);?> Airlines</h4>
        <div class="case-header">
        <div class="stop-radio">
<div class="checkbox">
  <label><input type="checkbox" name="optradio" checked> Emirates</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="optradio" checked> Royal Brunei </label>
</div>


</div>

        </div>
    </div>
    
    <!--<div class="side-c">
    <h4 class="l-title"><?=show_static_text($lang_id,68);?></h4>
<div class="stop-radio star-radio">
<div class="radio">
  <label><input type="radio" name="optradio"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio"><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio"><i class="fa fa-star"></i></label>
</div>


</div>    
    </div>-->

		
    

		</div>
</div><!--//row//-->
	       </div>
</div>
        <div class="right-side-box">
<div class="ajax-loading recent-loading"><img src="assets/uploads/loading.gif" alt="loading..."></div>
<div class="">
<div class="filter-page__content">
	<div class="filter-item-wrapper" id="result-data">
    
    
<?php $this->load->view('templates/search/ajax_search'); ?>
	</div>
</div>    
</div>
<div class="clear"></div>
<?php
if(isset($products)&&!empty($products)){
?>
<div class="" style="text-align: center;display:none" id="more-btn-cont">
<button class="btn btn-primary" id="ajax-more2" onClick="ajax_more()" value="loadmore">
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
<button class="btn btn-primary" id="ajax-more2" onClick="ajax_more()" value="loadmore">
Load more..<img style="display: none" id="loader" src="assets/uploads/loading.gif"> 
</button>
<input type="hidden" name="limit" id="limit" value="12"/>
<input type="hidden" name="offset" id="offset" value="12"/>
    </div>
<?php
}
?>

<div style="text-align: center">
<button class="btn btn-primary" id="ajax-more" onClick="ajax_more()" style="" value="loadmore">
Load more.. 
</button>
</div>
        </div>
        
        
    	<!--///col-xs-6/-->
	</div>
</div><!-- END container -->
</div>
</div><!--//search-wrapper//-->

<section id="aa-banner" style="padding:10px 0">
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
         //  jQuery('#more-btn-cont').show();
           if(result.url!=window.location){
             window.history.pushState({path:result.url},'',result.url);
           }
           
            jQuery('#offset').val(result.offset);
            jQuery('#limit').val(result.limit);
		    jQuery('.recent-loading').hide(); 
           	jQuery('#result-data').html(result.content);          
			//alert(result.counts);
			if(result.counts>=20){
				jQuery('#ajax-more').show();
			}
			else{
				jQuery('#ajax-more').hide();
			}

        },
        'json'
    );

  });



  var initialURL = location.href;

});

function ajax_more(){
	$("#result-data .flight-item:hidden").slice(0, 10).slideDown();
	if ($("#result-data .flight-item:hidden").length == 0) {
		$("#ajax-more").hide();
	}
/*	$('html,body').animate({
		scrollTop: $(this).offset().top
	}, 1500);*/
}


function get_tr_url(url,search_id){
    $.ajax({
        url:'flights/get_travelpaout_direct',
		data:{url:url,search_id:search_id,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
        type:'post', 
		dataType: 'json',
        success:function(data){
			if(data.status=='ok'){
//				window.location(data.s_url);
				window.location.href = data.s_url;

			}
			else{
				setTimeout(function(){		
					$('.alert-msge').html(data.msge);
					$('.popupmsgcontent').removeClass('show_msge');
				  
				}, 3000);
			}
        }
    });
}
</script>
<script>
$(document).ready(function(){
	$(window).load(function() {
		//submit_form();
	});
});

function submit_form(){
	    // select the form and submit
	$('#advance-search-form').submit();
}


function save_data(){
	$('#save-btn').attr("disabled", true);
    $.ajax({
        url:'flights/save',
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

<style>
</style>

<link href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css"  rel='stylesheet' type='text/css' >
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
/*$('#input-s-date').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});

$('#input-e-date').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});*/
	
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
	

});
</script>


<script>
$("#ex3").slider({});
$(".si-range").slider({});

$("#ex2").slider({}).on('slideStop', function(ev){
/*	vl = $('#ex2').val();
	tmpA = vl.split(',');
	$('#min-price').val(tmpA[0]);
	$('#max-price').val(tmpA[1]);
	 $( "#advance-search-form" ).submit();*/
	filter_data();

	
  }).on('slide', function(ev){
	vl = $('#ex2').val();
	tmpA = vl.split(',');
	$('.s-min-price').html(tmpA[0]);
	$('.s-max-price').html(tmpA[1]);
	
  });
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

</script>

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

total_passenger();
function total_passenger(){
	$v1 = parseInt($('#demo0').val());
	$v2 = parseInt($('#demo1').val());
	$('.total-psgr').html($v1+$v2);
}

child_age();
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
}

</script>

<script>
function filter_data(){
	//console.log('sdf');
	vl = $('#ex2').val();
	tmpA = vl.split(',');
//	rating =$('#rating-input').val();
	rating =0;
	
	max_stop = $('input[name=stop_filter]:checked').val();	
	console.log(max_stop);
	min_price =tmpA[0];
	max_price =tmpA[1];
	console.log('min: '+min_price+'; Max : '+max_price);
	
	$(".filter-item-wrapper .flight-item").each(function(index){			
		//$(this).fadeIn("slow");
		star_d = parseFloat($(this).attr("data-star"));
		price_d = parseFloat($(this).attr("data-price"));
		max_stop_d = parseFloat($(this).attr("data-max-stop"));
		//star_d = parseFloat($(this).attr("data-star"));
	//	console.log(priceID+' : '+checkID+':'+checkSubID);
		//console.log(id+' : '+sub_c+ ': '+price);
		if(max_stop=='any'){
			if(min_price<=price_d&&price_d<=max_price){
				$(this).fadeIn("slow");
			}
			else{
				$(this).fadeOut("fast");
			}
		}
		else{
			if(min_price<=price_d&&price_d<=max_price&&max_stop==max_stop_d){
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
</body>
</html>

