<?php
$home_slider_s = $this->comman_model->get_lang('services',$lang_id,NULL,array('enabled'=>1),'service_id',false);
?>
<?php $this->load->view('templates/includes/header.php'); ?>
<link rel="stylesheet" href="assets/global/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css" >
<script src="assets/global/plugins/bootstrap-slider/dist/bootstrap-slider.min.js"></script>


<link rel="stylesheet" href="assets/global/plugins/bootstrap-select/css/bootstrap-select.css" >
<script src="assets/global/plugins/bootstrap-select/js/bootstrap-select.js"></script>

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


<link href="assets/global/css/product_list/2.css" rel="stylesheet">    
<link href="assets/frontend/css/s_m_flight.css"  rel='stylesheet' type='text/css' >

<style>
.search-section{
  background-image: url("<?='assets/uploads/sites/'.$settings['background_hotel_search'];?>");
  background-attachment: fixed;
  background-position: center center;
  background-size: cover;
}
.search-form-wp .row{
	margin:0;
}

.search-form-wp .margin-bottom-10{
	padding:0 2px;
}
@media (max-width: 768px) {
.search-form-wp{
	padding:10px;
}
}
</style>




<style>
.ajax-loading{
	display:none;
	text-align:center;
}

</style>
<body ng-app="example" >
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
  <li class="active" >
       <a href="javscript:;" ><span class="icons-png hotel"></span>  <span class="hidden-xs"><?=show_static_text($lang_id,336);?></span></a>
  </li>
  <li >
       <a href="carhire"><span class="icons-png car"></span> <span class="hidden-xs"><?=show_static_text($lang_id,348);?></span></a>
  </li>
  <li >
       <a href="holidays" ><span class="icons-png holiday"></span> <span class="hidden-xs"><?=show_static_text($lang_id,285);?></span></a>
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


<div class="search-form-wp" ng-controller="MainCtrl">
<div class="row">
<form action="hotels" id="advance-search-form" method="get" >
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
    <input class="form-control" type="text" id="input-s-date" name="in_date" value="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
			    </div>
            </div>
            
            <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10">
	                <label class="input"><?=show_static_text($lang_id,305);?>:</label>
	            <div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
    <input class="form-control" type="text" id="input-e-date" name="out_date" value="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
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

