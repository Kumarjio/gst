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
<input type="hidden" value="<?=set_value('gps',$user_details->gps)?>" id="inputGps" name="gps">
                      <div id="more_pic" style="display:none"></div>
<div class="form-body">                    
	<div class="col-md-12">						                        
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,16);?></label>
        <div class="col-lg-10">
            <?=form_input('first_name', set_value('first_name', $user_details->{'first_name'}), 'class="form-control " id="" placeholder=""')?>
        </div>
    </div>
	<div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,17);?></label>
        <div class="col-lg-10">
            <?=form_input('last_name', set_value('last_name', $user_details->{'last_name'}), 'class="form-control " id="" placeholder=""')?>
        </div>
    </div>

	<div class="form-group" >
        <label class="col-lg-2 control-label" style="padding-top:0px"><?=show_static_text($lang_id,18);?></label>
        <div class="col-lg-10"><?=$user_details->email;?></div>
    </div>
<?php
$date_array = array(date('Y'),date('m'),date('d'));
if($user_details->dob){
	$date_array = explode('-',$user_details->dob);
}
?>
<div class="form-group">
    <label class="col-md-2 control-label" for=""><?=show_static_text($lang_id,83);?></label>
    <div class="col-md-10" >
    	<div class="row">
        	<div class="col-md-4" >
            <select name="day" class="form-control " style="">
    <option value="">Select</option>
<?php
for($i=1;$i<=31;$i++){	if($date_array[2]==$i){
echo '<option value="'.$i.'" selected >'.$i.'</option>';
}
else{
echo '<option value="'.$i.'" >'.$i.'</option>';
}
}
?>
    </select>
		</div>
    	    <div class="col-md-4" >
            <select name="month"  class="form-control " style="">
            <option value="">Select</option>
<option value="1" <?=$date_array[1]==1?'selected="selected"':''?> >January</option>
<option value="2" <?=$date_array[1]==2?'selected="selected"':''?>>February</option>
<option value="3" <?=$date_array[1]==3?'selected="selected"':''?>>March</option>
<option value="4" <?=$date_array[1]==4?'selected="selected"':''?>>April </option>
<option value="5" <?=$date_array[1]==5?'selected="selected"':''?>>May</option>
<option value="6" <?=$date_array[1]==6?'selected="selected"':''?>>June</option>
<option value="7" <?=$date_array[1]==7?'selected="selected"':''?>>July</option>
<option value="8" <?=$date_array[1]==8?'selected="selected"':''?>>August</option>
<option value="9" <?=$date_array[1]==9?'selected="selected"':''?>>September</option>
<option value="10" <?=$date_array[1]==10?'selected="selected"':''?>>October</option>
<option value="11" <?=$date_array[1]==11?'selected="selected"':''?>>November</option>
<option value="12" <?=$date_array[1]==12?'selected="selected"':''?>>December</option>
        </select>
		</div>
	        <div class="col-md-4" >
            <select name="year"  class="form-control "  style="">
		        <option value="">Select</option>
<?php
for($i=date('Y');$i>=1900;$i--){
	if($date_array[0]==$i){
		echo '<option value="'.$i.'" selected >'.$i.'</option>';
	}
	else{
		echo '<option value="'.$i.'" >'.$i.'</option>';
	}
}
?>
        </select>            
        </div>
        </div>
	</div>
</div>

    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,4010);?>Phone</label>
        <div class="col-lg-10">
            <?=form_input('phone', set_value('phone', $user_details->{'phone'}), 'class="form-control " id="" placeholder=""')?>
        </div>
    </div>
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,2000);?>Address</label>
        <div class="col-lg-10">
	        <input type="text" name="address" class="form-control " value="<?=set_value('address',$user_details->address);?>" id="input-address">
    	    <span class="error-span"><?php echo form_error('address'); ?></span>
        </div>
    </div>
    
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,2000);?>City</label>
        <div class="col-lg-10">
	        <input type="text" name="city" class="form-control " value="<?=set_value('city',$user_details->city);?>" id="">
                    
    	    <span class="error-span"><?php echo form_error('city'); ?></span>
        </div>
    </div>
    
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,20000);?>Country</label>
        <div class="col-lg-10">
<select class="form-control" name="country" id="country" style="" >
<option value="">Select</option>
<?php

if($country_data){
	foreach($country_data as $setCate){
?>
<option value="<?=$setCate;?>"  <?=($setCate==$user_details->country)?'selected="selected"':'';?> ><?=$setCate;?></option>
<?php
	}
}
?>
</select>                    
    	    <span class="error-span"><?php echo form_error('country'); ?></span>
        </div>
    </div>
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,2000);?>Map</label>
        <div class="col-lg-10">
			  <div class="gmap" id="mapsAddress" style="width:100%;height:300px"></div>
        </div>
    </div>


<div class="form-group">
  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,263);?></label>
  <div class="col-lg-10">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
            <?php echo !isset($user_details->image) ? '<img src="assets/uploads/profile.jpg">' :'<img src="'.base_url('assets/uploads/users/thumbnails').'/'.$user_details->image.'" >'; ?>
        </div>
        <div>
        <span class="btn btn-default btn-file"><span class="fileinput-new"><?=show_static_text($lang_id,159);?></span><span class="fileinput-exists"><?=show_static_text($lang_id,160);?></span>
        <input type="file" name="image" id="logo"></span>
        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?=show_static_text($lang_id,109);?></a>
    </div>
    </div>
        <!--<input type="file" name="logo" id="logo" />-->
  </div>
</div>

<div class="form-group">
  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,26300);?>Logo</label>
  <div class="col-lg-10">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
            <?php echo !isset($user_details->logo) ? '<img src="assets/uploads/profile.jpg">' :'<img src="'.base_url('assets/uploads/users/thumbnails').'/'.$user_details->logo.'" >'; ?>
        </div>
        <div>
        <span class="btn btn-default btn-file"><span class="fileinput-new"><?=show_static_text($lang_id,159);?></span><span class="fileinput-exists"><?=show_static_text($lang_id,160);?></span>
        <input type="file" name="logo" id="logo"></span>
        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?=show_static_text($lang_id,109);?></a>
    </div>
    </div>
        <!--<input type="file" name="logo" id="logo" />-->
  </div>
</div>


<div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,2000);?>Description</label>
        <div class="col-lg-10">
	        <textarea  name="desc" class="form-control "><?=$user_details->desc?></textarea>
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

<div class="col-md-12">
	    <div class="portlet box blue-hoki">
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=show_static_text($lang_id,277);?></h4>
            </div>
            <div class="panel-body">
<div class="col-md-12" style="">

              <div class="widget wlightblue">
                <div class="widget-content">

			<form role="form" action="ajax/set_video_comment" id="comment_form">
<input type="hidden" name="comment_form" value="set">                    	
<div class="form-group">
<label class="col-sm-2 control-label"><?=show_static_text($lang_id,277);?>:</label>  
<span>Please upload more then  200 * 300</span>
<div class="col-sm-4">
<div id="fileuploader" class="fileuploader" style="background-color:#52B6EC"><?=show_static_text($lang_id,278);?></div>
<span id="filesUpload" class="filesUpload"></span>
<div id="status"></div>        		            
</div>
</div>
<div style="clear:both"></div>                    
</form>


			<div id="product_files_content">
<?php
if(isset($products_file)&&!empty($products_file)){
foreach($products_file as $set_products_file){
?>
<div class="product-item col-md-3" style="padding:4px;margin:5px;width:23%" id="product_image_<?=$set_products_file->id?>">
<div class="pi-img-wrapper">
<img style="height:100px;width:100%" alt="" class="img-responsive" src="assets/uploads/users/<?=$set_products_file->filename?>"></a>
</div>
<a  class="btn btn-default" onclick="delete_image('<?=$set_products_file->id?>')" href="javascript:void(0)" style="margin-top:10px">Delete</a>

<!--<div class="sticker sticker-sale"></div>-->
</div>
<?php
}
}
?>    
            
            </div>
                  
                </div>
                  
              </div>  
              
            </div>

            </div>
        </div>


        
    </div>
    </div>    
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

<link href="assets/plugins/uploader/css/uploadfile.css" rel="stylesheet">
<script src="assets/plugins/uploader/js/jquery.uploadfile.min.js"></script>
<script>
$(document).ready(function(){
	$(".fileuploader").uploadFile({
		url:"<?=$_cancel?>/ajax_upload",
		fileName:"myfile",
		showStatusAfterSuccess:false,
		uploadButtonClass:"ajax-file-upload-blue",
		allowedTypes:"*",
		multiple: true,
		onSuccess:function(files,data,xhr){
			var obj = jQuery.parseJSON(data);
			if(obj.result=='error'){
				$('.ajax-file-upload-statusbar').hide();
				$("#status").html("<font color='red'>"+obj.msg+"</font>");
			}
			else if(obj.result=='success'){
				//$("#status").html("<font color='red'>image is uploaded. </font>");
				var pic_id = '<input type="hidden" name="more_pic[]" value="'+obj.msg+'" />';
				$('#more_pic').append(pic_id);
				refresh_image(obj.msg);
				//window.location.href = "front/videos/"+$("#video_id").val();
			}
			
		},
		onError: function(files,status,errMsg){		
			$("#status").html("<font color='red'>Upload is Failed</font>");
		}

	});
});
function refresh_image(id){
	$.ajax({
		type:"POST",
		url:"<?=$_cancel?>/refresh",
		data:{id:id,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		success:function(data){
			$('#product_files_content').append(data);
		}
	});

}
function delete_image(id){
	$.ajax({
		type:"POST",
		url:"<?=$_cancel?>/remove_store_image",
		data:{id:id,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		success:function(data){
			$('#product_image_'+id).hide();
		}
	});

}
</script>
