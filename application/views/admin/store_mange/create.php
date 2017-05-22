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
        <input type="hidden" value="<?=set_value('gps', $stores->{'gps'})?>" id="inputGps" name="gps">

                      <div id="more_pic" style="display:none"></div>
<div class="form-body">                    
	<div class="col-md-12">						                        
    	<div class="form-group" >
            <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],401);?>Hotel Name</label>
            <div class="col-lg-10">
    	        <?=form_input('name', set_value('name', $stores->{'name'}), 'class="form-control " id="" placeholder=""')?>
            </div>
		</div>

        <div class="form-group">
                      <label class="col-lg-2 control-label">Department</label>
                      <div class="col-lg-10">

                        <select  multiple="multiple" class="s2_with_tag" name="department_id[]" id="select_size" style="width:100%">
<?php
if(isset($department_data)&&!empty($department_data)){
foreach($department_data as $set_department){
?>
    <option value="<?=$set_department->id; ?>" ><?=$set_department->title; ?></option>
<?php
}
}
?>
        
                        </select>
                      </div>
                    </div>

        <div class="form-group">
          <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],167);?></label>
          <div class="col-lg-10">

            <select class="form-control" name="category_id" id="select_category" onChange="get_process(this.value);"  required>
                <option value="" >Select</option>
<?php
if(isset($categories_data)&&!empty($categories_data)){
foreach($categories_data as $setCategory){
?>
<option value="<?=$setCategory->id;?>"  <?=($setCategory->id==$stores->category_id)?'selected="selected"':'';?> ><?=$setCategory->title;?></option>
<?php
}
}
?>

            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],269);?></label>
          <div class="col-lg-10">

            <select class="form-control" name="sub_category_id" id="sub-category" style=""  >
                <option value="">Select</option>
<?php
if(!empty($stores->sub_category_id)&&$stores->sub_category_id!=0){
$subCat = $this->comman_model->get_lang('categories',$content_language_id,$stores->sub_category_id,false,'category_id',true);
if($subCat){
?>
<option value="<?=$subCat->id;?>" selected="selected"><?=$subCat->title;?></option>
<?php
}
}
?>

            </select>
          </div>
        </div>


    <div class="form-group" >
        <label class="col-lg-2 control-label">Name</label>
        <div class="col-lg-10">
            <?=form_input('first_name', set_value('first_name', $stores->{'first_name'}), 'class="form-control " id="" placeholder=""')?>
        </div>
    </div>
	<div class="form-group" >
        <label class="col-lg-2 control-label">Surname</label>
        <div class="col-lg-10">
            <?=form_input('last_name', set_value('last_name', $stores->{'last_name'}), 'class="form-control " id="" placeholder=""')?>
        </div>
    </div>

	<div class="form-group" >
        <label class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
            <?=form_input('email', set_value('email', $stores->{'email'}), 'class="form-control " id="" placeholder=""')?>
        </div>
    </div>

	<div class="form-group" >
        <label class="col-lg-2 control-label">Password</label>
        <div class="col-lg-10">
            <?=form_input('password', set_value('password', $stores->{'password'}), 'class="form-control " id="" placeholder=""')?>
        </div>
    </div>
   
                          

    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],401);?>Address</label>
        <div class="col-lg-10">
            <?=form_input('address', set_value('address', $stores->{'address'}), 'class="form-control " id="address-input" placeholder=""')?>
        </div>
    </div>

    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],401);?>Post Code</label>
        <div class="col-lg-10">
            <?=form_input('zip', set_value('zip', $stores->{'zip'}), 'class="form-control " id="zip-input" placeholder="" ')?>
        </div>
    </div>
    
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],401);?>City</label>
        <div class="col-lg-10">
            <?=form_input('city', set_value('city', $stores->{'city'}), 'class="form-control " id="" placeholder=""')?>
        </div>
    </div>

    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],401);?>Country</label>
        <div class="col-lg-10">
            <?=form_input('country', set_value('country', $stores->{'country'}), 'class="form-control " id="" placeholder=""')?>
        </div>
    </div>

	<!--<div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],991);?>Distance</label>
        <div class="col-lg-10">
            <?=form_input('distance', set_value('distance', $stores->{'distance'}), 'class="form-control " id="zip-input" placeholder=""')?>
        </div>
    </div>-->
    
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],401);?>Phone Number</label>
        <div class="col-lg-10">
            <?=form_input('phone', set_value('phone', $stores->{'phone'}), 'class="form-control " id="" placeholder=""')?>
        </div>
    </div>

<div class="form-group" >
<label class="col-lg-2 control-label">Start Time</label>
<div class="col-lg-10">
<?=form_dropdown('start_time', $time_data, $this->input->post('start_time') ? $this->input->post('start_time') : $stores->start_time, 'class="form-control"')?>
</div>
</div>
<div class="form-group" >
<label class="col-lg-2 control-label">End Time</label>
<div class="col-lg-10">
<?=form_dropdown('end_time', $time_data, $this->input->post('end_time') ? $this->input->post('end_time') : $stores->end_time, 'class="form-control"')?>
</div>
</div>

<div class="form-group" >
<label class="col-lg-2 control-label">Description</label>
<div class="col-lg-10">
<?=form_textarea('description', html_entity_decode(set_value('description', $stores->{'description'})), 'placeholder="Description" rows="3" class="cleditor2 form-control"')?>
</div>
</div>



<div class="form-group">
  <label class="col-lg-2 control-label">Main Image</label>
  <div class="col-lg-3">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
            <?php echo (isset($stores->image)&&!empty($stores->image)) ? '<img src="'.base_url('assets/uploads/stores/thumbnails').'/'.$stores->image.'" >':'<img src="assets/uploads/no-image.gif">'; ?>
        </div>
        <div>
        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
        <input type="file" name="image" id="logo"></span>
        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
    <?php echo !isset($stores->image) ? '' :'<a href="'.$_cancel.'/remove_file/image/'.$stores->id.'" class="btn btn-default" >Remove Image</a>'; ?>
    </div>
    </div>
        <!--<input type="file" name="logo" id="logo" />-->
  </div>
  <div class="col-lg-7">
	  <div class="gmap" id="mapsAddress" style="width:100%;height:300px"></div>
   </div>
</div>

<div class="form-group">
  <label class="col-lg-2 control-label">Logo</label>
  <div class="col-lg-10">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
            <?php echo (isset($stores->image)&&!empty($stores->image)) ? '<img src="'.base_url('assets/uploads/stores/thumbnails').'/'.$stores->image.'" >':'<img src="assets/uploads/no-image.gif">'; ?>
        </div>
        <div>
        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
        <input type="file" name="logo" id="logo"></span>
        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
    <?php echo !isset($stores->image) ? '' :'<a href="'.$_cancel.'/remove_file/image/'.$stores->id.'" class="btn btn-default" >Remove Image</a>'; ?>
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

	<!--col-md-12-->

    
<div class="col-md-12">
	    <div class="portlet box blue-hoki">
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=show_static_text($adminLangSession['lang_id'],277);?></h4>
            </div>
            <div class="panel-body">
<div class="col-md-12" style="">

              <div class="widget wlightblue">
                <div class="widget-content">

			<form role="form" action="ajax/set_video_comment" id="comment_form">
<input type="hidden" name="comment_form" value="set">                    	
<div class="form-group">
<label class="col-sm-2 control-label"><?=show_static_text($adminLangSession['lang_id'],277);?>:</label>  
<span>Please upload more then  200 * 300</span>
<div class="col-sm-4">
<div id="fileuploader" class="fileuploader" style="background-color:#52B6EC"><?=show_static_text($adminLangSession['lang_id'],278);?></div>
<span id="filesUpload" class="filesUpload"></span>
<div id="status"></div>        		            
</div>
</div>
<div style="clear:both"></div>                    
</form>


			<div id="product_files_content"></div>
                  
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
}
</script>

<link href="assets/plugins/select2/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="assets/plugins/select2/select2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#select_size').select2({placeholder: "Select"});
});
</script>


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
			center: [<?php echo isset($stores->{'gps'})?$stores->{'gps'}:'45.81, 15.98'?>],
			zoom: 12
		  },
		}
	  });
}

$('#address-input').keyup(function (e) {
	clearTimeout(timerMap);
		timerMap = setTimeout(function () {
			$address = $('#address-input').val();
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
		}, 200);
	});
$('#zip-input').keyup(function (e) {
	clearTimeout(timerMap);
		timerMap = setTimeout(function () {
			$address = $('#address-input').val();
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

<script>
function get_process(id){	
	$.ajax({
		type:"POST",
		url:"ajax/ajaxGetSubcategory",
		data:{id:id,lang_code:'<?=$content_language_id?>',<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		dataType: 'json',
		success: function(json) {	
			if(json.status=='ok'){
				$('#sub-category').html(json.msge);
			}
			if(json.status=='error'){
				$('#sub-category').html('<option value="">Select</option>');
			}
		}
		
	});
}

</script>