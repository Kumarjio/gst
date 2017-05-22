<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
            <?php echo validation_errors();?>
            <form class="form-horizontal" method="post"  action=""  enctype="multipart/form-data">   
					<input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
                	<input type="hidden" name="operation" value="set" />
<?php
if(isset($form_data)&&!empty($form_data)){
?>
    <div class="form-body">
<?php
	foreach($form_data as $set_form){
		$case_value = $this->comman_model->get_by('u_services_value',array('field_id'=>$set_form->id,'s_id'=>$products->id),false,false,true);
/*		echo $this->db->last_query();
		echo '<pre>';
		print_r($case_value);
		echo '</pre>';*/
?>
        <div class="form-group">
      <label class="col-lg-2 col-md-2 control-label"><?=$set_form->name;?></label>
      <div class="col-lg-8 col-md-8">
<?php
if($set_form->type=='textarea'){
?>
<textarea class="form-control" name="field[<?=$set_form->id?>]" ><?=!empty($case_value)?$case_value->value:'';?></textarea>
<?php	
}
if($set_form->type=='textfield'){
?>
<input type="text" placeholder="" name="field[<?=$set_form->id?>]" class="form-control" value="<?=!empty($case_value)?$case_value->value:'';?>" />
<?php	
}
if($set_form->type=='mdroplist'){
	$arrayList = explode(',',$set_form->values);
	if($arrayList){
?>
<select class="input-field" name="field[<?=$set_form->id?>][mult][]" multiple="multiple" style="width:100%">
<?php
foreach($arrayList as $setArry){
	if(!empty($case_value)){
		$setValue = explode(',',$case_value->value);
		if(!empty($setValue)&&in_array($setArry,$setValue)){
?>
<option value="<?=$setArry; ?>" selected="selected" ><?=$setArry?></option>
<?php
		}
		else{
?>
<option value="<?=$setArry; ?>" ><?=$setArry?></option>
<?php
		}
	}
	else{
?>
<option value="<?=$setArry; ?>" ><?=$setArry?></option>
<?php
	}
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
		if(!empty($case_value)&&$case_value->value==$setArry){
?>
    <option value="<?=$setArry; ?>" selected="selected" ><?=$setArry?></option>
<?php
		}
		else{
?>
    <option value="<?=$setArry; ?>" ><?=$setArry?></option>
<?php
		}
	}
?>
</select>
<?php
	}
}
if($set_form->type=='date_time'){
?>
<input type="text" name="field[<?=$set_form->id?>]" class="form-control datetimepicker1" id="datetimepicker1" value="<?=!empty($case_value)?$case_value->value:'';?>" />

<!--<input type="text" placeholder="yyyy-mm-dd" name="field[<?=$set_form->id?>]" data-date-format="yyyy-mm-dd" class="form-control date-picker " />-->
<?php
}

if($set_form->type=='date'){
?>
<input type="text" placeholder="dd-mm-yyyy" name="field[<?=$set_form->id?>]" data-date-format="dd-mm-yyyy" value="<?=!empty($case_value)?$case_value->value:'';?>" readonly=""class="form-control date-picker " />
<?php
}
if($set_form->type=='attachment'){
?>
<input type="file" name="files-<?=$set_form->id?>" />
<?php
	if(!empty($case_value)&&$case_value->value!=''){
		echo '<div class="remove_'.$case_value->id.'" >'.$case_value->value.' <a href="javascript:void(0);" class="" onclick="delete_file('.$case_value->id.')" >Remove</a></div>';
	}
}
if($set_form->type=='yes_no'){
?>
<div class="radio-list">

<label class="radio-inline">
	<input type="radio" name="field[<?=$set_form->id?>]" class="" value="Yes" <?=(!empty($case_value)&&$case_value->value=='Yes')?'checked="checked"':'';?>  /> Yes
</label>

<label class="radio-inline">
	<input type="radio" name="field[<?=$set_form->id?>]" class="" value="No" <?=(!empty($case_value)&&$case_value->value=='No')?'checked="checked"':'';?> /> No
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
    </div>							
<?php
}
?>

<div class="form-actions">
		<button type="submit" class="btn btn-success pull-right"><?=show_static_text($lang_id,235);?></button>
	</div>
				</form>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>



<link href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css" type="text/css">
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/global/js/general.js"></script>
<script>
jQuery(document).ready(function() {       
	$('.date-picker').datepicker({
		orientation: "left",
		autoclose: true
	});

});   

</script>
<script type="text/javascript">
function delete_file(id){
	var id = id;
	if(id){
		$.ajax({
			type: "POST",
			url: "<?=$lang_code?>/cases/remove_value", /* The country id will be sent to this file */
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

<link href="assets/admin_temp/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<script src="assets/admin_temp/plugins/bootstrap-daterangepicker/moment.js"></script>
<!--<script src="assets/admin_temp/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>-->
<script src="assets/admin_temp/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$(function () {
	$('.datetimepicker1').datetimepicker({
		format: 'DD-MM-YYYY H:m'
	});
});
</script>
<link href="assets/plugins/select2/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="assets/plugins/select2/select2.js"></script>
<script>
$(document).ready(function() {
	$('.input-field').select2({placeholder: "Select"});
});

$(document).ready(function(){
	var breadcrumb_html = '<li><a href="<?=$lang_code?>/user">Home</a></li><li><a href="<?=$lang_code?>/cases"><?=show_static_text($lang_id,34);?></a></li><li class="active"><?=$name;?></li>';
	$('#top-breadcrumb').html(breadcrumb_html);
	//$('div.dataTables_filter').appendTo('<button id="refresh">Refresh</button>');
});
</script>
