<?php $this->load->view('templates/includes/header'); ?>
<link href="assets/frontend/css/form.css" rel="stylesheet" type="text/css" media="all" />
<style>
.margin-bottom-10{
	margin-bottom:10px;
}
.ajax-loading{
	display:none;
	text-align:center;
}
</style>

<body>
<?php $this->load->view('templates/includes/menu'); ?>
<div class="login" style="padding:1% 0 ">
         <div class="wrap">     	    
         <div class="row">
				<div class="col-md-12">
        	<h2 style="font-size:26px;margin-bottom:5px;"><?=show_static_text($lang_id,3);?></h2>
<div class="mens-toolbar">
<div class="row">
<form action="<?=$lang_code?>/search/ajax" id="advance-search-form" method="get">
	<div class="form-group">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 margin-bottom-10">
	        <label class="input">Name:</label>
            <div>
				<input type="text" name="q" value="<?=$this->input->get('q')?>" class="form-control"  aria-required="true">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 margin-bottom-10">
	        <label class="input">City:</label>
            <div>

		<select class=" form-control search-keyword-select" name="city" style="" onChange="">
            <option value="">Select</option>
<?php
if(!empty($countries)){
	foreach($countries as $set_cat){
		$get_cities_o= $this->comman_model->get_by('cities',array('country'=>$set_cat->country),false,false,false);
?>
	<optgroup label="<?=$set_cat->country?>">
<?php
		if($get_cities_o){
			foreach($get_cities_o as $set_c){	
?>
        <option value="<?=$set_c->id?>" <?=$set_c->id==$this->input->get('city')?'selected="selected"':''?>><?=$set_c->name?></option>
<?php
			}
		}
?>
</optgroup>
<?php	
	}
}
?>
		</select>
		
            </div>
        </div>


        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 margin-bottom-10">
	        <label class="input">Type of activity:</label>
            <div>
		<select class=" form-control search-keyword-select" name="category" style=""  id="">
            <option value="">Select</option>
<?php
if(!empty($categories)){
	foreach($categories as $set_c){	
?>
        <option value="<?=$set_c->id?>" <?=$set_c->id==$this->input->get('category')?'selected="selected"':''?>><?=$set_c->title?></option>
<?php	
	}
}
?>
		</select>
		
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 margin-bottom-10">
	        <label class="input">Tour:</label>
            <div>
<?php
$get_duration = $this->input->get('duration');
?>
		<select class=" form-control search-keyword-select" name="duration" style=""  id="">
            <option value="">Half day & Full day</option>
            <option value="Full Day" <?=$get_duration=='Full Day'?'selected':''?> >Full Day</option>
            <option value="Half Day" <?=$get_duration=='Half Day'?'selected':''?> >Half Day</option>
		</select>
		
            </div>
        </div>

<!--//col-md-4//-->
        

	<div style="clear:both"></div>	
	<div class="col-md-offset-8 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-top:0px;">
        <button type="submit" class="my_btn pull-right" style="">Search</button>
        </div>
		
       
    </div>

            
        

	<div class="form-group">
    </div>
        <div class="clearfix"></div>

    </form>
</div>
	          
     	    <div class="clear"></div>
	       </div>
<div class="ajax-loading recent-loading"><img src="assets/uploads/loading.gif" alt="loading..."></div>
<div class="row">
<div class="box1 category-products" id="result-data">
<?php $this->load->view('templates/search/ajax_search'); ?>
</div>
</div>
<div class="clear"></div>
<?php
if(isset($products)&&!empty($products)){
?>
<div class="container" style="text-align: center">
<button class="my_btn" id="ajax-more" onClick="ajax_more()" value="loadmore">
Load more..<img style="display: none" id="loader" src="assets/uploads/loading.gif"> 
</button>
<input type="hidden" name="limit" id="limit" value="12"/>
<input type="hidden" name="offset" id="offset" value="12"/>
    </div>
<?php
}
else{
?>
<div class="container" style="text-align: center;display:none" id="more-btn-cont">
<button class="my_btn" id="ajax-more" onClick="ajax_more()" value="loadmore">
Load more..<img style="display: none" id="loader" src="assets/uploads/loading.gif"> 
</button>
<input type="hidden" name="limit" id="limit" value="12"/>
<input type="hidden" name="offset" id="offset" value="12"/>
    </div>
<?php
}
?>
			  </div>
              </div>
  <div class="clear"></div>
</div>
</div>
<?php $this->load->view('templates/includes/footer'); ?>


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
        },
        'json'
    );

  });

  jQuery('.load-more-recent').click(function(e){
      e.preventDefault();
      var next = parseInt(recent_count)+parseInt(per_page);

      var url = jQuery('#advance-search-form').attr('action');
      url = url.replace('/'+recent_count,'/'+next);
      jQuery('#advance-search-form').attr('action',url);
      recent_count = next;

      jQuery('#advance-search-form').submit();  
  });

  jQuery('.result-grid').click(function(e){
      e.preventDefault();
      jQuery('.result-grid').addClass('selected');
      jQuery('.result-list').removeClass('selected');

      var url = jQuery('#advance-search-form').attr('action');
      var action = url.replace('/list/','/grid/');
      jQuery('#advance-search-form').attr('action',action);
      jQuery('#advance-search-form').submit();
    });

  jQuery('.result-list').click(function(e){
    e.preventDefault();
    jQuery('.result-grid').removeClass('selected');
    jQuery('.result-list').addClass('selected');

    var url = jQuery('#advance-search-form').attr('action');
    var action = url.replace('/grid/','/list/');
    jQuery('#advance-search-form').attr('action',action);
    jQuery('#advance-search-form').submit();

  });

  jQuery('.result-map').click(function(e){
    e.preventDefault();
    jQuery('#toggle-form').submit();
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

			if(data.more_data==0){
				$('#ajax-more').hide();
			}
			
            $('#offset').val(data.offset);
            $('#limit').val(data.limit);
        }
    })
}
</script>
<style>
#result-data .span_1_of_single1 {
  width: 100%;
}
.mens-toolbar {
  width: 100%;
}
.view1 .mask1, .view1 .content {
  left: 140px;
}
.list2 {
  padding:0.69% 0;
}
</style>
</body>
</html>
