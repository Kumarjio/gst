<?php
$home_slider_s = $this->comman_model->get_lang('services',$lang_id,NULL,array('enabled'=>1),'service_id',false);
?>
<?php $this->load->view('templates/includes/header.php'); ?>
<link rel="stylesheet" href="assets/global/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css" >
<script src="assets/global/plugins/bootstrap-slider/dist/bootstrap-slider.min.js"></script>


<link rel="stylesheet" href="assets/global/plugins/bootstrap-select/css/bootstrap-select.css" >
<script src="assets/global/plugins/bootstrap-select/js/bootstrap-select.js"></script>


<link href="assets/global/css/product_list/2.css" rel="stylesheet">    
<link href="assets/frontend/css/s_m_flight.css"  rel='stylesheet' type='text/css' >

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

.search-wrapper .filter-page__content{
	min-height:230px;
}

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
<!-- BEGIN HEADER -->
<?php $this->load->view('templates/includes/menu.php'); ?>
<?php $this->load->view('templates/includes/menu_tab.php'); ?>
<!-- END global-header -->

<div class="search-section">

<section id="aa-banner" class="hidden-sm hidden-xs" style="padding:10px 0">
    <div class="container search-content ">
      <div class="row">

<?php
$slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'top'),'banner_id',false);
if($slider_banner){
	$i=0;
	foreach($slider_banner as $set_sl){
			
?>
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area text-center">
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
  </section><!--//top _banner//-->
<!-- END HEADER -->
<div class="search-main-wrapper">
<div class="container">
<div class="row">
    	<div class="col-md-12">

<ul class="search-tab nav nav-tabs nav-justified hidden-sm hidden-xs" role="tablist">
  <li class="">
    <a href="flights"><span class="icons-png flight"></span> <span class="hidden-xs"><?=show_static_text($lang_id,335);?></span></a>
  </li>
  <li class="" >
       <a href="hotels" ><span class="icons-png hotel"></span>  <span class="hidden-xs"><?=show_static_text($lang_id,336);?></span></a>
  </li>
  <li >
       <a href="carhire"><span class="icons-png car"></span> <span class="hidden-xs"><?=show_static_text($lang_id,348);?></span></a>
  </li>
  <li class="active" >
       <a href="javscript:;" ><span class="icons-png holiday"></span> <span class="hidden-xs"><?=show_static_text($lang_id,285);?></span></a>
  </li>
<?php
if($home_slider_s){
	$i=0;
	foreach($home_slider_s as $set_s){
?>
  <li role="presentation">
       <a href="<?=$active=='Search '.$set_s->id?'javascript:;':$set_s->name?>">
       <span class="icons-png i-<?=$i?>"></span>
        <span class="hidden-xs"><?=$set_s->title?></span></a>
  </li>

<?php
$i++;
	}
}
?>  
</ul>


<div class="search-form-wp">
<div class="row">
<form action="holidays" id="advance-search-form" method="get">
				<div class="">
        <div class="form-group">
            <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
                <label class="input"><?=show_static_text($lang_id,8400);?>Depart Form:</label>
                	<select name="form_place" class="selectpicker show-tick"> 
<option value="">Select</option>
<?php
if($city_data){
	foreach($city_data as $set_city){
?>
	<option value="<?=$set_city->id?>" ><?=$set_city->city_name?></option>
<?php		
	}
}
?>

                    </select>
            </div>
            <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
                <label class="input"><?=show_static_text($lang_id,8004);?>Holiday Destination:</label>
                	<input type="text" name="to_place" value="" class="form-control" >
                	
            </div>
            
            <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
                <label class="input"><?=show_static_text($lang_id,3004);?>Depart:</label>
            <div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
			    <input class="form-control" type="text" id="input-s-date" name="d_date" value="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
            </div>
            </div>
            
            <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
                <label class="input"><?=show_static_text($lang_id,1030);?>Night:</label>
                    <select class="selectpicker show-tick" name="night" >
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
                <label class="input"><?=show_static_text($lang_id,130);?>:</label>
                <select class="selectpicker show-tick" name="adult" >
    <?php
    for($i=1;$i<7;$i++){
    ?>
        <option value="<?=$i?>"  ><?=$i?></option>
    <?php
    }
    ?>                
</select>

                    
            </div>
    
            
        <div class="col-md-2 col-sm-12 col-xs-12 search-btns" >
            <button type="submit" class="btn btn-sys btn-sm pull-right" style=""><i class="fa fa-search"></i> <?=show_static_text($lang_id,3);?></button>
    
            </div>
            
           
        </div>
        
            <div class="clearfix"></div>
    </div>	
	        </form>
</div>
     	    <div class="clear"></div>
	       </div>        	
		</div><!--//left search content//-->
  </div>
</div><!-- END container -->
</div>
<div class="min-height">

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

</div>


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
<?php $this->load->view('templates/includes/home_place');?>
<?php $this->load->view('templates/includes/footer.php'); ?>




<link href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css"  rel='stylesheet' type='text/css' >
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
$('#input-s-date').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});

	
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


        
</body>
</html>

