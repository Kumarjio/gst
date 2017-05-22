<?php
$home_slider_s = $this->comman_model->get_lang('services',$lang_id,NULL,array('enabled'=>1),'service_id',false);
?>

<?php $this->load->view('templates/includes/header.php'); ?>
<link rel="stylesheet" href="assets/global/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css" >
<script src="assets/global/plugins/bootstrap-slider/dist/bootstrap-slider.min.js"></script>

<link href="assets/plugins/star_rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/star_rating/js/star-rating.js" type="text/javascript"></script>



<style>

.search-wrapper .filter-page__content{
	min-height:230px;
}

.rating-sm {
  font-size: 1.8em;
}
.flight-item.travelpayouts .item-media .image-cover img {
    width: 100%;
    height: 85px;
}
.flight-item.skyscanner .item-media .image-cover img {
    width: 100%;
    height: 105px;
}

</style>




<link href="assets/global/css/product_list/2.css" rel="stylesheet">    
<style>
.nav-tabs { border-bottom: 2px solid #CCC !important;justify-content:space-between;background:transparent;margin-bottom:10px; }
.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
.nav-tabs > li > a { border: none; color: #393939;font-size:17px }
.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li > a:hover { border: none; color: #000 !important; background: transparent; }
.nav-tabs > li > a::after { content: ""; background: #000; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
.nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 15px 0; }
.tab-content{padding:20px 13px;background:transparent}
.card {margin-bottom: 30px; }

.card .nav-tabs{
	border-bottom:none;
}


</style>
<style>


.ajax-loading{
	display:none;
	text-align:center;
}

</style>
<body >
<!-- BEGIN HEADER -->
<?php $this->load->view('templates/includes/menu.php'); ?>
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

<section id="aa-banner" style="padding:10px 0">
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
<!-- END HEADER -->
<div class="search-wrapper">

<div class="container search-content">
<div class="row">

  <div class="products-section-0114">
    
    <div class="row" >
    	
    	<div class="col-md-12">

<ul class="nav nav-tabs">
  <li class="">
    <a href="<?=$lang_code.'/search'?>" ><?=show_static_text($lang_id,335);?></a>
  </li>
  <li >
    <a href="<?=$lang_code.'/search_hotel'?>" ><?=show_static_text($lang_id,336);?></a>
  </li>
  <li role="presentation">
       <a href="javascript:;"  aria-controls="tab3" role="tab" data-toggle="tab"><?=show_static_text($lang_id,348);?></a>
  </li>
  <li role="presentation">
       <a href="javascript:;"  aria-controls="tab4" role="tab" data-toggle="tab"><?=show_static_text($lang_id,285);?></a>
  </li>
  
<?php
if($home_slider_s){
	foreach($home_slider_s as $set_s){
?>
  <li role="presentation" class="<?=$set_s->id==$service_search->id?'active':''?>">
       <a href="<?=$set_s->id==$service_search->id?'javascript:;':$lang_code.'/searchs/l/'.$set_s->id?>" ><?=$set_s->title?></a>
  </li>

<?php
	}
}
?>  
  
</ul>
<div class="sidebox-container">
<div class="row">
<?php
if(isset($service_search_form)&&!empty($service_search_form)){
?>
<form action="<?=$lang_code.'/searchs/l/'.$service_search->id?>" method="get">
 <input type="hidden" name="service_id" value="<?=$service_search->id?>"  />
<div class="">
    
<?php
foreach($service_search_form as $set_form){
?>
<div class="col-xxs-12 col-xs-3 mt">
        <div class="input-field">
            <label for="from"><?=$set_form->name;?>:</label>
<?php
if($set_form->type=='textfield'){
?>
<input type="text" placeholder="" name="field[<?=$set_form->id?>]" class="form-control" value="" />
<?php	
}
if($set_form->type=='mdroplist'){
$arrayList = explode(',',$set_form->values);
if($arrayList){
?>
<select class="input-field" name="field[<?=$set_form->id?>][mult][]" multiple="multiple" style="width:100%">
<?php
foreach($arrayList as $setArry){
?>
<option value="<?=$setArry; ?>" ><?=$setArry?></option>
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
?>
<option value="<?=$setArry; ?>" ><?=$setArry?></option>
<?php
}
?>
</select>
<?php
}
}
if($set_form->type=='date_time'){
?>
<input type="text" name="field[<?=$set_form->id?>]" class="form-control datetimepicker1" data-date-format="dd-mm-yyyy"  id="" value="" />


<!--<input type="text" placeholder="yyyy-mm-dd" name="field[<?=$set_form->id?>]" data-date-format="yyyy-mm-dd" class="form-control date-picker " />-->
<?php
}

if($set_form->type=='date'){
?>
<input type="text" placeholder="dd-mm-yyyy" name="field[<?=$set_form->id?>]" data-date-format="dd-mm-yyyy" value="" readonlyclass="form-control date-picker datetimepicker1 " />
<?php
}
if($set_form->type=='yes_no'){
?>
<div class="radio-list">

<label class="radio-inline">
<input type="radio" name="field[<?=$set_form->id?>]" class="" value="Yes" /> Yes
</label>

<label class="radio-inline">
<input type="radio" name="field[<?=$set_form->id?>]" class="" value="No"  /> No
</label>
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
    <div class="col-xs-3 pull-right">
        <input type="submit" class="btn btn-primary btn-block" value="<?=show_static_text($lang_id,3);?>">
    </div>
</div>
</form>
<?php
}
?>

</div>
     	    <div class="clear"></div>
	       </div>        	
		</div><!--//left search content//-->

<div class="col-md-3">
<div class="sidebox-container">
	<div class="row">
		<div class="col-md-12">
    <div class="side-c">
    <h4 class="l-title">Price</h4>
    <div class="case-header">
        <div class="items"><b><?=$lang_currency?> 10</b></div>
        <div class="items text-right "><b><?=$lang_currency?> 1000</b></div>
    </div>
    
    <input id="ex2" type="text" name="price"  style="width:100%" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/> 
    </div>

    <div class="side-c">
    <h4 class="l-title">Star</h4>
    
        <input id="rating-input" name="rate" type="number" value="3" class="rating rating-input" min=0 max=5 step=1 data-size="sm" data-show-clear="false" data-show-caption="false" data-stars="5" />			  
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
</div>
  </div>
</div><!-- END container -->
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

<?php $this->load->view('templates/includes/footer.php'); ?>
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
        url:'<?=$lang_code?>/search/ajax',
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
	$('.sell-btn').attr("disabled", true);
    $.ajax({
        url:'<?=$lang_code?>/search/save',
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

<style>
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

</style>

<link href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css"  rel='stylesheet' type='text/css' >
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
$('.datetimepicker1').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});

});
</script>


<script>
$("#ex2").slider({});
</script>
        
</body>
</html>

