<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">

<?php echo validation_errors();?>
<?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form','enctype'=>"multipart/form-data"))?>
		<input type="hidden" name="operation" value="set"  /> 
<div class="form-body">                    
	<div class="col-md-12">						                        
	
    


<div class="form-group">
  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,26300);?>Before Image</label>
  <div class="col-lg-10">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
            <?php echo !isset($products->b_image) ? '<img src="assets/uploads/no-image.gif">' :'<img src="'.base_url('assets/uploads/products/order').'/'.$products->b_image.'" >'; ?>
        </div>
        <div>
        <span class="btn btn-default btn-file"><span class="fileinput-new"><?=show_static_text($lang_id,159);?></span><span class="fileinput-exists"><?=show_static_text($lang_id,160);?></span>
<?php 
if(!isset($products->b_image)) {
?>
        <input type="file" name="b_image" id="logo" required>
<?php
}
else{
?>
        <input type="file" name="b_image" id="logo">
<?php
}
?>
        </span>
        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?=show_static_text($lang_id,109);?></a>
    </div>
    </div>
        <!--<input type="file" name="logo" id="logo" />-->
  </div>
</div>

<div class="form-group">
  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,26300);?>After Image</label>
  <div class="col-lg-10">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
            <?php echo !isset($products->a_image) ? '<img src="assets/uploads/no-image.gif">' :'<img src="'.base_url('assets/uploads/products/order').'/'.$products->a_image.'" >'; ?>
        </div>
        <div>
        <span class="btn btn-default btn-file"><span class="fileinput-new"><?=show_static_text($lang_id,159);?></span><span class="fileinput-exists"><?=show_static_text($lang_id,160);?></span>
<?php 
if(!isset($products->a_image)) {
?>
        <input type="file" name="a_image" id="logo" required>
<?php
}
else{
?>
        <input type="file" name="a_image" id="logo">
<?php
}
?>
        </span>
        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?=show_static_text($lang_id,109);?></a>
    </div>
    </div>
        <!--<input type="file" name="logo" id="logo" />-->
  </div>
</div>


    
    
</div>






</div>
	                 <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-9">
                                    <?=form_submit('submit', show_static_text($lang_id,235), 'class="btn btn-primary"')?>
                                </div>
                            </div>
                        </div>
                 <?=form_close()?>
            </div>
        </div>
        <!-- end panel -->
    </div>

	<!--col-md-12-->

    
    
    

    
    <!--end col-md-12-->
</div>

<link href="assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript" language="javascript"></script> 

<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script src="assets/plugins/gmap/gmap3.min.js"></script>
<script type="text/javascript">
var timerMap;
var firstSet = false;
var savedGpsData;

$(function () {
// If alredy selected
if($('#inputGps').length && $('#inputGps').val() != '')
{
	savedGpsData = $('#inputGps').val().split(", ");
	
	$("#mapsAddress").gmap3({
		map:{
		  options:{
			center: [parseFloat(savedGpsData[0]), parseFloat(savedGpsData[1])],
			zoom: 14
		  }
		},
		marker:{
		values:[
		  {latLng:[parseFloat(savedGpsData[0]), parseFloat(savedGpsData[1])]},
		],
		options:{
		  draggable: true
		},
		events:{
			dragend: function(marker){
			  $('#inputGps').val(marker.getPosition().lat()+', '+marker.getPosition().lng());
			}
	  }}});
	
	firstSet = true;
}
else
{
	$("#mapsAddress").gmap3({
		map:{
		  options:{
			center: [<?php echo isset($user_details->{'gps'})?$user_details->{'gps'}:'51.5074, 0.1278'?>],
			zoom: 12
		  },
		}
	  });
}

$('#input-address').keyup(function (e) {
	clearTimeout(timerMap);
		timerMap = setTimeout(function () {
			$address = $('#input-address').val();
			//$house_num = $('#zip-input').val();
			$house_num = '';
			$new_str = $house_num+' '+$address;
			//alert($new_str);
			$("#mapsAddress").gmap3({
			  getlatlng:{
				address:  $new_str,
				callback: function(results){
				  if ( !results ){
					//alert('Bad address!');
					return;
				  } 
				  
					if(firstSet){
						$(this).gmap3({
							clear: {
							  name:["marker"],
							  last: true
							}
						});
					}
				  
				  // Add marker
				  $(this).gmap3({
					marker:{
					  latLng:results[0].geometry.location,
					   options: {
						  id:'searchMarker',
						  draggable: true
					  },
					  events: {
						dragend: function(marker){
						  $('#inputGps').val(marker.getPosition().lat()+', '+marker.getPosition().lng());
						}
					  }
					}
				  });
				  
				  // Center map
				  $(this).gmap3('get').setCenter( results[0].geometry.location );
				  
				  $('#inputGps').val(results[0].geometry.location.lat()+', '+results[0].geometry.location.lng());
				  
				  firstSet = true;
	
				}
			  }
			});
		}, 200);
	});
});


</script>

