<?php
$home_slider_s = $this->comman_model->get_lang('services',$lang_id,NULL,array('enabled'=>1),'service_id',false);
$get_trtip_type = $this->input->get('trip_type');
$time_data = $this->custom_model->get_time_hour_min();

?>
<?php $this->load->view('templates/includes/header.php'); ?>


<link rel="stylesheet" href="assets/global/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css" >
<script src="assets/global/plugins/bootstrap-slider/dist/bootstrap-slider.min.js"></script>

<link rel="stylesheet" href="assets/global/plugins/bootstrap-select/css/bootstrap-select.css" >
<script src="assets/global/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!--<link href="assets/plugins/star_rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/star_rating/js/star-rating.js" type="text/javascript"></script>-->
<link href="assets/global/css/product_list/2.css" rel="stylesheet">    
<link href="assets/frontend/css/s_car.css"  rel='stylesheet' type='text/css' >



<style>
.search-section{
  background-image: url("<?='assets/uploads/sites/'.$settings['background_flight_search'];?>");
  background-attachment: fixed;
  background-position: center center;
  background-size: cover;
}

</style>

<style>
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
<div id="leftBanner" class="hidden-sm hidden-xs leftBanner" title="See best prices for hotels and flights.">
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

<div id="rightBanner" class="hidden-sm hidden-xs rightBanner" title="See best prices for hotels and flights.">
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
<form action="carhire/ajax" id="advance-search-form" method="get">
    <input type="hidden" name="min_price" id="min-price" value="<?=$this->input->get('min_price')?>" >
    <input type="hidden" name="max_price" id="max-price" value="<?=$this->input->get('max_price')?>" >
    <input type="hidden" name="fId" id="i-fid" value="<?=$this->input->get('fId')?>" >
    <input type="hidden" name="tId" id="i-tid" value="<?=$this->input->get('tId')?>" >
<div class="row">
	<div class="form-group">
    
    
            
            

		<div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
	        <label class="input"><?=show_static_text($lang_id,9400);?>Pick-Up Location:</label>
            
            <!--<div class="icon-addon addon-lg">
                    <input type="text" placeholder="Email" class="form-control" id="email">
                    <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
                </div>-->
            <div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
				<input type="text" name="from_place" value="<?=$this->input->get('from_place')?>" class="form-control f-place" autocomplete=""  aria-required="true">
            </div>
        </div>
		

		<div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
	        <label class="input"><?=show_static_text($lang_id,9500);?>Drop-Off Location:</label>
            <div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
				<input type="text" name="to_place" value="<?=$this->input->get('to_place')?>" class="form-control t-place"  aria-required="true">
			</div>                
        </div>
        
        
		
		<div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
	        <label class="input"><?=show_static_text($lang_id,1008);?>Pick-Up Date:</label>
            <div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
				<input class="form-control" type="text" id="input-s-date" name="d_date" value="<?=$this->input->get('d_date')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
            </div>
        </div>
        
		<div class="col-md-1 col-sm-12 col-xs-12 margin-bottom-10">
<label class="input"><?=show_static_text($lang_id,10008);?>Time:</label>
<select class="selectpicker show-tick select-time" name="d_time">
<?php
foreach($time_data as $key=>$vl){
?>
<option value="<?=$key?>"><?=$vl?></option>
<?php
}
?>
</select>
</div>
        
		<div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10  ">
	        <label class="input"><?=show_static_text($lang_id,3309);?>Drop-Off Date:</label>
            <div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
				<input class="form-control" type="text" id="input-e-date" name="r_date" value="<?=$this->input->get('r_date')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"    />
			</div>                
        </div>

		<div class="col-md-1 col-sm-12 col-xs-12 margin-bottom-10">
<label class="input"><?=show_static_text($lang_id,10008);?>Time:</label>
<select class="selectpicker show-tick select-time" name="r_time">
<?php
foreach($time_data as $key=>$vl){
?>
<option value="<?=$key?>"><?=$vl?></option>
<?php
}
?>
</select>
</div>        

<!--//col-md-4//-->
        

	<div class="col-md-2 col-sm-12 col-xs-12 search-btns ">
        <button type="submit" class="btn btn-sys btn-sm pull-right" style=""><i class="fa fa-search"></i> <?=show_static_text($lang_id,3);?></button>
        <button type="button" id="save-btn" class="btn btn-info btn-sm pull-right" onClick="save_data();" style="margin-right:10px"><i class="fa fa-floppy-o"></i> <?=show_static_text($lang_id,235);?></button>
        </div>
		
       
    </div>
</div>    
    
        <div class="clearfix"></div>
</form>
    <div class="clear"></div>
</div>    
<div class="container search-content">
<div class="row" >
    	

<div class="col-md-3">
<div class="sidebox-container side-content">
<?php
$min_price =$this->input->get('min_price');
$max_price =$this->input->get('max_price');
?>    

	<div class="row">
		<div class="col-md-12">
    <div class="side-c">
    <h4 class="l-title"><?=show_static_text($lang_id,41);?></h4>
    <div class="case-header">
        <div class="items"><?=$lang_currency?> <span class="s-min-price"><?=$min_price?$min_price:0?></span></div>
        <div class="items text-right "><?=$lang_currency?> <span class="s-max-price"><?=$max_price?$max_price:10000?></span></div>
    </div>
    <input id="ex2" type="text" name="price"  style="width:100%" value="" data-slider-min="50" data-slider-max="10000" data-slider-step="5" data-slider-value="[<?=$min_price?$min_price:0?>,<?=$max_price?$max_price:10000?>]"/> 
    </div>

    <div class="side-c">
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
<!--        <input id="rating-input" name="rate" type="number" value="0" class="rating rating-input" min=0 max=5 step=1 data-size="sm" data-show-clear="false" data-show-caption="false" data-stars="5" />			 --> 
    </div>
    
    

		</div>
</div><!--//row//-->
	       </div>
</div>
        <div class="col-md-9">
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
        
        
    	<!--///col-xs-6/-->
	</div>
</div><!-- END container -->
</div>
</div><!--//search-wrapper//-->

<section id="aa-banner" class="hidden-sm hidden-xs" style="padding:10px 0">
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
           jQuery('#more-btn-cont').show();
           if(result.url!=window.location){
             window.history.pushState({path:result.url},'',result.url);
           }
           
            jQuery('#offset').val(result.offset);
            jQuery('#limit').val(result.limit);
		    jQuery('.recent-loading').hide(); 
           jQuery('#result-data').html(result.content);          
			if(result.more_d){
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
</script>
<script>
function ajax_more(){
    var data = jQuery('#advance-search-form').serialize();
	$("#loader").show();
    $('.recent-loading').show(); 
    $.ajax({
        url:'flights/ajax',
		data:data+'&offset='+$('#offset').val()+'&limit='+$('#limit').val(),
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

function submit_form(){
	    // select the form and submit
	$('#advance-search-form').submit();
}


function save_data(){
	return false;
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
$("#ex2").slider({}).on('slideStop', function(ev){
	vl = $('#ex2').val();
	tmpA = vl.split(',');
	$('#min-price').val(tmpA[0]);
	$('#max-price').val(tmpA[1]);
//	$('#advance-search-form').trigger('click');
	 $( "#advance-search-form" ).submit();
	
  }).on('slide', function(ev){
	vl = $('#ex2').val();
	tmpA = vl.split(',');
	$('.s-min-price').html(tmpA[0]);
	$('.s-max-price').html(tmpA[1]);
	
  });
</script>
        


</body>
</html>

