<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">

<?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form','enctype'=>"multipart/form-data"))?>
<input type="hidden" value="<?=set_value('gps','51.5073509, -0.12775829999998223')?>" id="inputGps" name="gps">

<div class="form-body">                    
	<div class="col-md-12">						                        
	
    <div class="form-group">
      <label class="col-lg-2 control-label">Service</label>
      <div class="col-lg-10">
<select multiple="multiple" class="tag_field required-field" name="services[]" id="select_colour" style="width:100%">
<?php
$setWeek = explode(', ',$users->services);

if($services_data){
	foreach($services_data as $value){
		if(!empty($setWeek)&&in_array($value->id,$setWeek)){
?>
		<option value="<?=$value->id; ?>" selected="selected"><?=$value->title; ?></option>
<?php
		}
		else{
?>
		<option value="<?=$value->id; ?>"><?=$value->title; ?></option>
<?php
		}
	}
}
?>
</select>                    
      </div>
    </div>

    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],16);?></label>
        <div class="col-lg-10">
			<?=form_input('first_name', set_value('first_name', $users->{'first_name'}), 'class="form-control " id="" placeholder=""')?>
    	    <span class="error-span"><?php echo form_error('first_name'); ?></span>
        </div>
    </div>
    

    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],17);?></label>
        <div class="col-lg-10">
			<?=form_input('last_name', set_value('last_name', $users->{'last_name'}), 'class="form-control " id="" placeholder=""')?>
    	    <span class="error-span"><?php echo form_error('last_name'); ?></span>
        </div>
    </div>

	<!--<div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],16000);?>Username</label>
        <div class="col-lg-10">
			<?=form_input('username', set_value('username', $users->{'username'}), 'class="form-control " id="" placeholder=""')?>
    	    <span class="error-span"><?php echo form_error('username'); ?></span>
        </div>
    </div>-->
	
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],18);?></label>
        <div class="col-lg-10">
			<?=form_input('email', set_value('email', $users->{'email'}), 'class="form-control " id="" placeholder=""')?>
    	    <span class="error-span"><?php echo form_error('email'); ?></span>
        </div>
    </div>
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],20);?></label>
        <div class="col-lg-10">
	        <input type="text" name="password" class="form-control " value="<?=set_value('password',$users->password);?>">
    	    <span class="error-span"><?php echo form_error('password'); ?></span>
        </div>
    </div>
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2000);?>Phone</label>
        <div class="col-lg-10">
	        <input type="text" name="phone" class="form-control " value="<?=set_value('phone', $users->{'phone'});?>">
    	    <span class="error-span"><?php echo form_error('phone'); ?></span>
        </div>
    </div>
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2000);?>Address</label>
        <div class="col-lg-10">
	        <input type="text" name="address" class="form-control " value="<?=set_value('address', $users->{'address'});?>" id="input-address">
    	    <span class="error-span"><?php echo form_error('address'); ?></span>
        </div>
    </div>
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2000);?>City</label>
        <div class="col-lg-10">
	        <input type="text" name="city" class="form-control " value="<?=set_value('city', $users->{'city'});?>" id="input-address" required="required">
                    
    	    <span class="error-span"><?php echo form_error('city'); ?></span>
        </div>
    </div>
    
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],20000);?>Country</label>
        <div class="col-lg-10">
<select class="form-control" name="country" id="country" style="" >
<option value="">Select</option>
<?php

if($country_data){
	foreach($country_data as $setCate){
?>
	<option value="<?=$setCate; ?>" <?=($setCate==$users->country)?'selected="selected"':'';?> ><?=$setCate; ?></option>
<?php
	}
}
?>
</select>                    
    	    <span class="error-span"><?php echo form_error('country'); ?></span>
        </div>
    </div>
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2000);?>Map</label>
        <div class="col-lg-10">
			  <div class="gmap" id="mapsAddress" style="width:100%;height:300px"></div>
        </div>
    </div>


</div>






</div>
	                 <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-9">
                                    <?=form_submit('submit', show_static_text($adminLangSession['lang_id'],235), 'class="btn btn-primary"')?>
                                    <a href="<?=$_cancel;?>" class="btn btn-default" type="button"><?=show_static_text($adminLangSession['lang_id'],22);?></a>
                                </div>
                            </div>
                        </div>
                 <?=form_close()?>



      </div>
        </div>
        <!-- end panel -->
    </div>
</div>
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
			center: [<?php echo isset($users->{'gps'})?$users->{'gps'}:'51.5074, 0.1278'?>],
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
/*$('#zip-input').keyup(function (e) {
	clearTimeout(timerMap);
		timerMap = setTimeout(function () {
			$address = $('#input-address').val();
			$house_num = $('#zip-input').val();
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
		}, 2000);
	});
*/
});

function delete_file(id){
	var id = id;
	if(id){
		$.ajax({
			type: "POST",
			url: "<?=$admin_link?>/account/remove_image", /* The country id will be sent to this file */
			dataType: "json",
		   	data: {id:id,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
			success: function(msg){
				if(msg['result']=='success'){
				   $('.remove_'+id).remove();
				}
			}
	   });
		
	}
}

</script>

<link href="assets/plugins/select2/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="assets/plugins/select2/select2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.tag_field').select2({placeholder: "Select"});
});

</script>
