<?php $this->load->view('templates/includes/header.php'); ?>
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
<script src = "assets/global/plugins/angular/js/angular.min.js"></script>

<link href="assets/global/css/product_list/2.css" rel="stylesheet">    
<style>
.ajax-loading{
	display:none;
	text-align:center;
}
</style>

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
<body >
<!-- BEGIN HEADER -->
<?php $this->load->view('templates/includes/menu.php'); ?>
<!-- END global-header -->
<section id="aa-banner" style="padding:10px 0">
    <div class="container">
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
<div class="container">
<div class="row">
  <div class="products-section-0114">
    
    <div class="row" >
    	<div class="col-md-12">
			<h2>Search</h2>
        </div>
    	<div class="col-md-12">
<ul class="nav nav-tabs">
  <li >
    <a href="<?=$lang_code.'/search'?>" ><?=show_static_text($lang_id,335);?></a>
  </li>
  <li class="active">
       <a href="javascript:;" ><?=show_static_text($lang_id,336);?></a>
  </li>
  <li role="presentation">
       <a href="javascript:;"  aria-controls="tab3" role="tab" data-toggle="tab"><?=show_static_text($lang_id,3036);?>Car Hire</a>
  </li>
  <li role="presentation">
       <a href="javascript:;"  aria-controls="tab4" role="tab" data-toggle="tab"><?=show_static_text($lang_id,3306);?>Holdiday</a>
  </li>
</ul>
<div class="well">

<div class="row">
<form action="<?=$lang_code?>/search_hotel/ajax" id="advance-search-form" method="get">
	<div class="form-group">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 margin-bottom-10">
	        <label class="input">City:</label>
            <div>
				<input type="text" name="city" value="<?=$this->input->get('city')?>" class="form-control"  aria-required="true">
            </div>
        </div>
		
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 margin-bottom-10">
	        <label class="input">Checkin:</label>
            <div>
            
<input class="form-control" type="text" id="input-s-date" name="in_date" value="<?=$this->input->get('in_date')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
            </div>
        </div>
		
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 margin-bottom-10">
	        <label class="input">Checkout:</label>
            <div>
<input class="form-control" type="text" id="input-e-date" name="out_date" value="<?=$this->input->get('out_date')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 margin-bottom-10">
	        <label class="input">Adult:</label>
            <div>
            	<select name="adult" class="form-control">
<?php
$get_adult = $this->input->get('adult');
for($i=1;$i<10;$i++){
?>
	<option value="<?=$i?>" <?=$get_adult==$i?'selected':''?> ><?=$i?></option>
<?php
}
?>                
                </select>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 margin-bottom-10">
	        <label class="input">Children:</label>
            <div>
            	<select name="children" class="form-control">
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
        </div>

        

<!--//col-md-4//-->
        

	<div style="clear:both"></div>	
	<div class="col-md-offset-8 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-top:0px;">
        <button type="submit" class="btn btn-primary pull-right" style="">Search</button>
        </div>
		
       
    </div>

            
        

	<div class="form-group">
    </div>
        <div class="clearfix"></div>

    </form>
</div>
     	    <div class="clear"></div>
	       </div>        	
		</div><!--//left search content//-->


        <div class="col-md-3">
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
        <div class="col-md-6">
        

        
<div class="ajax-loading recent-loading"><img src="assets/uploads/loading.gif" alt="loading..."></div>
<div class="row">
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
        
        <div class="col-md-3">
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
    	<!--///col-xs-6/-->
	</div>
</div>
  </div>
</div><!-- END container -->

<section id="aa-banner" style="padding:10px 0">
    <div class="container">
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
/*$(document).ready(function(){
$('#input-s-date').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});

$('#input-e-date').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});

});*/


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
        
</body>
</html>

