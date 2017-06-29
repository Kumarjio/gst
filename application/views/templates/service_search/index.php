<?php
$home_slider_s = $this->comman_model->get_lang('services',$lang_id,NULL,array('enabled'=>1),'service_id',false);
?>
<?php $this->load->view('templates/includes/header.php'); ?>
<link href="assets/global/css/product_list/2.css" rel="stylesheet">
<link rel="stylesheet" href="assets/frontend/css/s_service.css" >
<link rel="stylesheet" href="assets/global/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css" >
<script src="assets/global/plugins/bootstrap-slider/dist/bootstrap-slider.min.js"></script>
<link href="assets/plugins/star_rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/star_rating/js/star-rating.js" type="text/javascript"></script>

<link href="assets/global/css/product_list/2.css" rel="stylesheet">    
<link href="assets/frontend/css/s_m_flight.css"  rel='stylesheet' type='text/css' >
<style>

.col-centered {
	display: inline-block;
	float: none;
	text-align: left;
	margin-right: -4px;
}
.col-fixed {
	width: 320px;
}
.col-min {
	min-width: 320px;
}
.col-max {
	max-width: 320px;
}
.item {
	display: table;
}
.search-section {
	background-image: url("<?='assets/uploads/sites/'.$settings['background_service_search'];?>");
	background-attachment: fixed;
	background-position: center center;
	background-size: cover;
}
.left-side-content {
	background: #251435;
	color: #FFF;
}
.left-side-content .side-c .l-title {
	color: #FFF;
}
.rating-sm {
	font-size: 1.8em;
}
.search-form-wp label {
	color: #000;
}
.ajax-loading {
	display: none;
	text-align: center;
}
.margin-bottom-10{
	margin-bottom:10px;
}
.glyphicon { margin-right:5px; }
.thumbnail
{
    margin-bottom: 20px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 10px;
}
.item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
{
    background: #428bca;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
}
.item.list-group-item .caption
{
    padding: 9px 9px 0px 9px;
}
.item.list-group-item:nth-of-type(odd)
{
    background: #eeeeee;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item img
{
    float: left;
}
.item.list-group-item:after
{
    clear: both;
}
.list-group-item-text
{
    margin: 0 0 11px;
}
.srb{
	margin-top: -47px;
padding: 0px 3px 20px 2px;
}
@media (max-width: 768px)
{
	.srb
	{
		margin-top:0px;
		padding: 4px 100px 7px 100px;
	}
	.pcen{
		padding-left: 40px;
padding-right: 40px;
	}
	.search-content
	{
		width:100%;
	}
	input-field
	{
		display:grid;
	}
}
@media (max-width: 360px)
{
	.srb
	{
		padding: 4px 80px 7px 80px;
	}
}
</style>
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
<body>
<div id="fh5co-wrapper">
  <div id="fh5co-page"> 
    <?php $this->load->view('templates/includes/menu.php'); ?>
    <?php $this->load->view('templates/includes/menu_tab.php'); ?>

    <div class="search-section">
	
    <section id="aa-banner" style="padding:10px 0">
        <div class="container search-content">
          <div class="row">
            <?php
$slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'bottom'),'banner_id',false);
if($slider_banner){
	$i=0;
	foreach($slider_banner as $set_sl){
			
?>
            <div class="col-md-12 text-center">
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
    
      <div class="search-wrapper">
	  
	  <div class="search-main-wrapper">
<div class="container">
<div class="row">
    	<div class="col-md-12">

<ul class="search-tab nav nav-tabs nav-justified hidden-sm hidden-xs" role="tablist">
  <li class="">
    <a href="flights"><span class="fa fa-fw fa-plane"></span> <span class="hidden-xs"><?=show_static_text($lang_id,335);?></span></a>
  </li>
  <li>
       <a href="javscript:;" ><span class="fa fa-fw fa-hotel"></span>  <span class="hidden-xs"><?=show_static_text($lang_id,336);?></span></a>
  </li>
  <li >
       <a href="carhire"><span class="fa fa-fw fa-car"></span> <span class="hidden-xs"><?=show_static_text($lang_id,348);?></span></a>
  </li>
  <li >
       <a href="holidays" ><span class="fa fa-fw fa-umbrella"></span> <span class="hidden-xs"><?=show_static_text($lang_id,285);?></span></a>
  </li>

<?php
$get=$_SERVER['REQUEST_URI']; $test=explode('/',$get); //print_r($test); 
$service = $test['1']; //echo $service;//die;
if($home_slider_s){
	$i=0;
	foreach($home_slider_s as $set_s){
		 $name=$set_s->name;
?>
  <li role="presentation" <?php 
if ($service == $name) {
    echo 'class="active"';
} 
?>>
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
  <?php
$get_post = $this->input->get('field');
if(isset($service_search_form)&&!empty($service_search_form)){
?>
            <form action="<?=site_url('searchs/ajax/')?>" method="get" id="advance-search-form" class="service_menu">
              <input type="hidden" name="min_price" id="min-price" value="<?=$this->input->get('min_price')?>" >
              <input type="hidden" name="max_price" id="max-price" value="<?=$this->input->get('max_price')?>" >
              <input type="hidden" name="service_id" value="<?=$service_search->id?>"  />
              <div class="row row-centered pcen">
                <?php
//echo '<pre>';
//print_r($service_search_form);
//echo '</pre>';
foreach($service_search_form as $set_form){
?>
                <div class="col-md-6 col-xs-12 <?=count($service_search_form)>=5?'':'col-centered'?> mt">
                  <div class="input-field">
                    <label for="from">
                      <?=$set_form->name;?>
                      :</label>
                    <?php
if($set_form->type=='textfield'){
?>

                    <input type="text" placeholder="" name="field[<?=$set_form->id?>]" class="form-control" value="<?=isset($get_post[$set_form->id])?$get_post[$set_form->id]:''?>" />
                    <?php	
}
if($set_form->type=='mdroplist'){
$arrayList = explode(',',$set_form->values);
if($arrayList){
?>
                    <select class="input-field" name="field[<?=$set_form->id?>]" style="">
                      <?php
foreach($arrayList as $setArry){
	$select = '';
	if(isset($get_post[$set_form->id])&&$setArry==$get_post[$set_form->id]){
		$select = 'selected';
	}
?>
                      <option value="<?=$setArry; ?>"  <?=$select?> >
                      <?=$setArry?>
                      </option>
                      <?php
}//foreach
?>
                    </select>
                    <?php
}//arrayList
}//type
if($set_form->type=='droplist'){
$arrayList = explode(',',$set_form->values);
if($arrayList){
?>
                    <select class="form-control " name="field[<?=$set_form->id?>]" >
                      <option value="">Select</option>
                      <?php
foreach($arrayList as $setArry){
	$select = '';
	if(isset($get_post[$set_form->id])&&$setArry==$get_post[$set_form->id]){
		$select = 'selected';
	}

?>
                      <option value="<?=$setArry; ?>"  <?=$select?> >
                      <?=$setArry?>
                      </option>
                      <?php
}
?>
                    </select>
                    <?php
}
}
if($set_form->type=='date_time'){
?>
                    <input type="text" name="field[<?=$set_form->id?>]" class="form-control datetimepicker1" data-date-format="dd-mm-yyyy"  id="" value="<?=isset($get_post[$set_form->id])?$get_post[$set_form->id]:''?>" />
                    
                    <!--<input type="text" placeholder="yyyy-mm-dd" name="field[<?=$set_form->id?>]" data-date-format="yyyy-mm-dd" class="form-control date-picker " />-->
                    <?php
}

if($set_form->type=='date'){
?>
         <span class="font_icon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                    <input type="text" placeholder="dd-mm-yyyy" name="field[<?=$set_form->id?>]" data-date-format="dd-mm-yyyy" value="<?=isset($get_post[$set_form->id])?$get_post[$set_form->id]:''?>" class="form-control date-picker datetimepicker1 " />
                    <?php
}
if($set_form->type=='yes_no'){

?>
                    <div class="radio-list">
                      <label class="radio-inline">
                        <input type="radio" name="field[<?=$set_form->id?>]" class="" value="Yes"  <?=isset($get_post[$set_form->id])&&$get_post[$set_form->id]=='Yes'?'checked':''?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input type="radio" name="field[<?=$set_form->id?>]" class="" value="No"  <?=isset($get_post[$set_form->id])&&$get_post[$set_form->id]=='NO'?'checked':''?> />
                        No </label>
                    </div>
                    <?php
}
?>
                  </div>
                </div>
                <?php
}
?>
                <div style="clear:both"></div>
                <div class="col-md-3 col-sm-12 col-xs-12 pull-right adv_btn srb">
                  <input type="submit" class="btn btn-blck-sys btn-block" value="<?=show_static_text($lang_id,3);?>">
                </div>
              </div>
            </form>            
            <?php
}
?></div>
     	    <div class="clear"></div>
	       </div>        	
		</div><!--//left search content//-->
  </div>
</div><!-- END container -->
</div>

        <div class="products-section-0114">
		
          <div style="position:relative">
            <div id="leftBanner" class="hidden-ms leftBanner" title="See best prices for hotels and flights.">
              <?php
$slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'left'),'banner_id',false);
if($slider_banner){
	$i=0;
	foreach($slider_banner as $set_sl){
			
?>
              <div class="col-md-12 ">
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
            <div class="container search-content">
              <div class="row" >
                <div class="col-md-3">
                  <div class="sidebox-container side-content left-side-content">
                    <?php
$min_price =$this->input->get('min_price');
$max_price =$this->input->get('max_price');
?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="side-c">
                          <h4 class="l-title">
                            <?=show_static_text($lang_id,41);?>
                          </h4>
                          <div class="case-header">
                            <div class="items">
                              <?=$lang_currency?>
                              <span class="s-min-price">
                              <?=$min_price?$min_price:0?>
                              </span></div>
                            <div class="items text-right ">
                              <?=$lang_currency?>
                              <span class="s-max-price">
                              <?=$max_price?$max_price:10000?>
                              </span></div>
                          </div>
                          <input id="ex2" type="text" name="price"  style="width:100%" value="" data-slider-min="50" data-slider-max="10000" data-slider-step="5" data-slider-value="[<?=$min_price?$min_price:0?>,<?=$max_price?$max_price:10000?>]"/>
                        </div>
                         <div class="side-c">
                          <h4 class="l-title">
                            <?=show_static_text($lang_id,4100);?>
                            Type</h4>
                          <div class="case-header">
                            <div class="stop-radio">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="optradio">
                                  Budget</label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="optradio">
                                  Deluxe Offer</label>
                              </div>
                              <div class="checkbox ">
                                <label>
                                  <input type="checkbox" name="optradio" >
                                  Super Deluxe</label>
                              </div>
                              <div class="checkbox ">
                                <label>
                                  <input type="checkbox" name="optradio" >
                                  All Inclusive</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="side-c">
                          <h4 class="l-title">
                            <?=show_static_text($lang_id,4100);?>
                            Hotels</h4>
                          <div class="case-header">
                            <div class="stop-radio">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="optradio">
                                  Burj Al Sultan</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="side-c">
                          <h4 class="l-title">
                            <?=show_static_text($lang_id,4100);?>
                            Flight</h4>
                          <div class="case-header">
                            <div class="stop-radio">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="optradio">
                                  Middle East Airline</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="side-c">
                          <h4 class="l-title">
                            <?=show_static_text($lang_id,4100);?>
                            Visa</h4>
                          <div class="case-header">
                            <div class="stop-radio">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="optradio">
                                  Yes</label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="optradio">
                                  No</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="side-c">
                          <h4 class="l-title">
                            <?=show_static_text($lang_id,4100);?>
                            Transport</h4>
                          <div class="case-header">
                            <div class="stop-radio">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="optradio">
                                  Yes</label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="optradio">
                                  No</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--//row//--> 
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="ajax-loading recent-loading"><img src="assets/uploads/loading.gif" alt="loading..."></div>
                  <div class="">
                    <div class="filter-page__content">
                      <div class="filter-item-wrapper" id="result-data">
                        <?php $this->load->view('templates/service_search/ajax_search'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="clear"></div>
                  <?php
if(isset($products)&&!empty($products)){
?>
                  <div class="" style="text-align: center;display:none">
                    <button class="btn btn-primary" id="ajax-more" onClick="ajax_more()" value="loadmore"> Load more..<img style="display: none" id="loader" src="assets/uploads/loading.gif"> </button>
                    <input type="hidden" name="limit" id="limit" value="12"/>
                    <input type="hidden" name="offset" id="offset" value="12"/>
                  </div>
                  <?php
}
else{
?>
                  <div class="" style="text-align: center;display:none" id="more-btn-cont">
                    <button class="btn btn-primary" id="ajax-more" onClick="ajax_more()" value="loadmore"> Load more..<img style="display: none" id="loader" src="assets/uploads/loading.gif"> </button>
                    <input type="hidden" name="limit" id="limit" value="12"/>
                    <input type="hidden" name="offset" id="offset" value="12"/>
                  </div>
                  <?php
}
?>
                </div>
              </div>
            </div>
            <!--//search-content//--> 
          </div>
        </div>
      </div>
    <section id="aa-banner" style="padding:10px 0">
        <div class="container search-content">
          <div class="row">
            <?php
$slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'bottom'),'banner_id',false);
if($slider_banner){
	$i=0;
	foreach($slider_banner as $set_sl){
			
?>
            <div class="col-md-12 text-center">
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
    </div>
   

   <?php $this->load->view('templates/includes/footer.php'); ?>
  </div>
</div>
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

function ajax_more(){
    var data = jQuery('#advance-search-form').serialize();
	$("#loader").show();
    $('.recent-loading').show(); 
    $.ajax({
        url:'searchs/ajax',
		data:data+'&offset='+$('#offset').val()+'&limit='+$('#limit').val(),
        type:'get', 
		dataType: 'json',
        success:function(data){
	        $("#loader").hide();
		    $('.recent-loading').hide(); 
	         $('#result-data').append(data.content);
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
	$('.sell-btn').attr("disabled", true);
    $.ajax({
        url:'searchs/save',
		data:{url:window.location.href,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
        type:'post', 
		dataType: 'json',
        success:function(data){
		$('.sell-btn').attr("disabled", false);
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
$(document).ready(function(){
$('.datetimepicker1').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});

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
	
  });
</script>
</body>
</html>