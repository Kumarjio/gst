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
                 	<input type="hidden" name="solve_time" id="sub-category" value="<?=$tickets->{'solve_time'}?>" />
                     <div class="form-body">                    
                      <div id="more_pic" style="display:none"></div>
                    <div class="col-md-12">						                                                
                        
                      
                
				<div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1600);?>Company name</label>
                  <div class="col-lg-10">
                    <?=form_input('company_name', set_value('company_name', $tickets->{'company_name'}), 'class="form-control " id="" placeholder="" readonly="readonly" ')?>
                  </div>
                </div>

				<div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1600);?>User name</label>
                  <div class="col-lg-10">
                    <?=form_input('user_name', set_value('user_name', $tickets->{'user_name'}), 'class="form-control " id="" placeholder="" readonly="readonly" ')?>
                  </div>
                </div>

				<div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1600);?>Timing</label>
                  <div class="col-lg-10">
<?php
$dayShow = '';
if($time_setting){
	if($time_setting->is_mon==1){
		$dayShow .= 'Monday, ';
	}
	if($time_setting->is_tue==1){
		$dayShow .= 'Tuesday, ';
	}
	if($time_setting->is_wed==1){
		$dayShow .= 'Wednesday, ';
	}
	if($time_setting->is_thr==1){
		$dayShow .= 'Thrusday, ';
	}
	if($time_setting->is_fri==1){
		$dayShow .= 'Friday, ';
	}
	if($time_setting->is_sat==1){
		$dayShow .= 'Saturday, ';
	}
	if($time_setting->is_sun==1){
		$dayShow .= 'Sunday, ';
	}
}
/*$cstartTime  = rtrim($time_setting->start_time,':00');
$cendTime  = rtrim($time_setting->end_time,':00');
$startTime = 
$endTime = $time_setting->end_time;
if($cstartTime<12){
	$startTime = $time_setting->start_time.' am';
}
else{
	$startTime = $time_setting->start_time.' pm';
}
if($cendTime<12){
	$endTime = $time_setting->end_time.' am';
}
else{
	$endTime = $time_setting->end_time.' pm';
}
*/
echo $time_setting->start_time.' am to '.$time_setting->end_time.' pm ( '.rtrim($dayShow,', ').' )';
?>
                  </div>
                </div>

                <!--<div class="form-group">
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,2706);?>Help</label>
                  <div class="col-lg-10">
                    <?=form_textarea('help', set_value('help', $tickets->{'help'}), 'placeholder="" rows="1" style="height:100px" class=" form-control"')?>
                  </div>
                </div>-->
                
                <div class="form-group">
                  <label class="col-lg-2 control-label">Date</label>
                  <div class="col-lg-5">
                    <input class="form-control" type="text" id="" name="date" data-date-format="dd-mm-yyyy" value="<?= set_value('date', $tickets->{'date'})?>" readonly="readonly" />
	          </div>
                  <div class="col-lg-5">
                    <input class="form-control" type="text" name="time"  value="<?= set_value('time', $tickets->{'time'})?>" readonly="readonly" />
                  </div>
	          </div>
              <!--<div class="form-group" >
<label class="col-lg-2 control-label"><?=show_static_text($lang_id,8009);?>Time</label>
<div class="col-lg-10">
<?=form_dropdown('time', $time_data, $this->input->post('time') ? $this->input->post('time') : $tickets->time, 'class="form-control"')?>
</div>
</div>-->
				
                
                <div class="form-group">
              <label class="col-lg-2 control-label"><?=show_static_text($lang_id,8000);?>Ticket Type</label>
              <div class="col-lg-10 col-md-8">
                <select class="form-control " name="ticket_id" id="select_category" onChange="get_process(this.value);"  required >
                    <option value="">Select</option>
<?php
//$set_category = unserialize($products->category);
if(isset($ticket_data)&&!empty($ticket_data)){
foreach($ticket_data as $setCategory){
?>
    <option value="<?php echo $setCategory->id; ?>" <?=$tickets->ticket_id==$setCategory->id?'selected="selected"':'';?> ><?php echo $setCategory->name?></option>
<?php
}
}
?>

                </select>
              </div>
            </div>
				
                                                              
<!--<div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1600);?>Title</label>
                  <div class="col-lg-10">
                    <?=form_input('name', set_value('name', $tickets->{'name'}), 'class="form-control " id="" placeholder=""')?>
                  </div>
                </div>-->

<div class="form-group show-ticket" style="display:none">
  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,2706);?>Help</label>
  <div class="col-lg-10">
	<div class="show-desc"></div>
  </div>
</div>	

<div class="form-group">
  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,2706);?>Information</label>
  <div class="col-lg-10">
    <?=form_textarea('desc', html_entity_decode(set_value('desc', $tickets->{'desc'})), 'placeholder="" id="information" rows="3" class="cleditor2 form-control"')?>
  </div>
</div>
<!--			<div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,2071);?>Response Time</label>
                  <div class="col-lg-2">
                    <?=form_input('solve_time', set_value('solve_time', $tickets->{'solve_time'}), 'class="form-control " readonly="readonly" id="sub-category" placeholder=""')?>
                  </div>-->

                	<!--<div class="col-lg-4">
                	<?=form_checkbox('is_responsive', '1', set_value('is_responsive', $tickets->is_responsive), 'id="is-responsive" class=""')?>
                    <span>I require a response quicker if possible</span>

                  </div>-->
                	
                </div>
                <!--<div class="form-group" style="display:none" id="custom_time" >
                  <label class="col-lg-2 control-label">&nbsp;</label>                  
                	<div class="col-lg-4"><span>I require a response with</span>
							<select class="" name="solve_user_time" id="solve-user-time" style="width:150px"  >
<?php
if(!empty($tickets->{'solve_time'})){
	for($i=1;$i<=($tickets->{'solve_time'}-1);$i++){
?>
<option value="<?=$i;?>" <?=($tickets->{'solve_user_time'}==$i)?'selected="selected"':''?>><?=$i;?></option>
<?php
	}
}
?>
							</select>
                  </div>
                	<div class="col-lg-4"><span>and I understand this may incur a charge.</span>
                	<?=form_checkbox('is_confirm', '1', set_value('is_confirm', $tickets->is_confirm), 'id="" class=""')?>
                    <span>confirm</span>
                  </div>
                </div>-->
                
<div class="form-group">
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,2706);?>Reason for urgency</label>
                  <div class="col-lg-10">
                    <?=form_textarea('urgency', set_value('urgency', $tickets->{'urgency'}), 'placeholder="" rows="3" class=" form-control"')?>
                  </div>
                </div>
                
                
                
  <div class="form-group">  
                    <label class="col-lg-2 control-label"><?=show_static_text($lang_id,60);?></label>
                    <div class="col-lg-10">
                        <div id="fileuploader" class="fileuploader" style="background-color:#268abe"><i class="fa fa-plus"></i> Upload a File</div>
                        <span id="filesUpload" class="filesUpload"></span>
		                <div id="status"></div>        		            
            <div style="clear:both"></div>                    
            <table  class="" style="margin-top:10px;">
                <tbody class="files" id="product_files_content">
<?php
if(isset($products_file)&&!empty($products_file)){
$modal =1;
foreach($products_file as $set_products_file){
?>
<tr class="fade in" id="product_image_<?=$set_products_file->id?>">
    <td width="60%" class="name"><?=$set_products_file->filename?></td>
    
                    
    <td width="10%" align="right" class="delete" >
        <a href="javascript:void(0);" class="btn default" onclick="delete_image('<?=$set_products_file->id?>'); return false;">
            <i class="fa fa-times"></i>
        </a>
    </td>
</tr>
<?php
$modal++;
}
}
?>    

                </tbody>
            </table>

        	        </div>
            </div>
                              
                			</div>



						</div>
	                 <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-9">
                                    <?=form_submit('submit', show_static_text($lang_id,235), 'class="btn btn-primary"')?>
                                    <a href="<?=$_cancel;?>" class="btn btn-default" type="button"><?=show_static_text($lang_id,22);?></a>
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

<!--<link href="assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript" language="javascript"></script> -->

<!--<script src="assets/plugins/ckeditor/ckeditor.js" type="text/javascript" language="javascript"></script> 
<script src="assets/plugins/ckeditor/adapters/jquery.js" type="text/javascript" language="javascript"></script>
<script>
$(document).ready(function(){
    $('.cleditor2').ckeditor();
});
</script>-->

<link href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css"  rel='stylesheet' type='text/css' >
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
	//$('&nbsp;').appendTo('div.dataTables_filter');
	//$('div.dataTables_filter').appendTo('<button id="refresh">Refresh</button>');
	$('#best_sellers_start').datepicker({ dateFormat: 'mm-dd-yy', altField: '#best_sellers_start_alt', altFormat: 'yy-mm-dd' });

});
</script>

<script>
function get_process(id){	
	$.ajax({
		type:"POST",
		url:"<?=$_cancel?>/ajax_get_hour",
		data:{id:id,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		dataType: 'json',
		success: function(json) {	
			if(json.status=='ok'){
				$('#sub-category').val(json.hour_time);
				$('.show-ticket').show();
				$('.show-desc').html(json.desc);
				$('#solve-user-time').html(json.option);
				$('#information').val(json.desc2);
				//createSelect(json.hour_time);
			}
			if(json.status=='error'){
				$('#sub-category').val('');
				$('.show-ticket').hide();
				$('.show-desc').html('');
				$('#information').val('');
			}
		}
		
	});
}
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
		multiple: false,
		onSuccess:function(files,data,xhr){
			var obj = jQuery.parseJSON(data);
			if(obj.result=='error'){
				$('.ajax-file-upload-statusbar').hide();
				$("#status").html("<font color='red'>"+obj.msg+"</font>");
			}
			else if(obj.result=='success'){
				//$("#status").html("<font color='red'>image is uploaded. </font>");
				//var pic_id = '<input type="hidden" name="more_pic[]" value="'+obj.msg+'" />';
				//$('#more_pic').append(pic_id);
				var pic_id = '<input type="hidden" name="more_pic[]" value="'+obj.msg+'" />';
				$('#more_pic').append(pic_id);
				refresh_image(obj.msg,obj.file_size,obj.duration);
				//window.location.href = "front/videos/"+$("#video_id").val();
			}
			
		},
		onError: function(files,status,errMsg){		
			$("#status").html("<font color='red'>Upload is Failed</font>");
		}

	});
});

function refresh_image(id,size,duration){
	$.ajax({
		type:"POST",
		url:"<?=$_cancel?>/ajax_refresh",
		data:{id:id,size:size,duration:duration,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		success:function(data){
			$('#product_files_content').append(data);
		}
	});

}
function delete_files(id){
	$('#'+id).remove();
}
function delete_image(id){
	$.ajax({
		type:"POST",
		url:"<?=$_cancel?>/remove_file",
		data:{id:id,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		success:function(data){
			$('#product_image_'+id).hide();
		}
	});

}
</script>
<script>
$(document).ready(function(){
$('#is-responsive').change(function(){
	if(this.checked)
		$('#custom_time').fadeIn('slow');
	else
		$('#custom_time').fadeOut('slow');

});
});
var atLeastOneIsChecked = $('#is-responsive:checkbox:checked').length > 0;
if(atLeastOneIsChecked ){
	$('#custom_time').fadeIn('slow');
}
</script>