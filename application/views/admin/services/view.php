<style>
/*label.radio-inline.checked, label.checkbox-inline.checked, label.radio.checked, label.checkbox.checked {
  background-color: #266c8e;
  color: #fff !important;
}*/
</style>


<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
<div class="form-horizontal">
	<div class="form-body">
<h4 class="m-t-20" style="border-bottom:solid 1px #CCC;padding-bottom:10px">Process Info</h4>
    	<div class="form-group">
    		<label class="col-lg-2 control-label" style="padding-top:0px;">Name</label>
			<div class="col-lg-8"><?=$process->name;?></div>      
        </div>
    	<div class="form-group">
    		<label class="col-lg-2 control-label" style="padding-top:0px;">Category</label>
			<div class="col-lg-8"><?=$category->title;?></div>      
        </div>

    	<div class="form-group">
    		<label class="col-lg-2 control-label" style="padding-top:0px;">Description</label>
			<div class="col-lg-8"><?=$process->description;?></div>      
        </div>
<h4 class="m-t-20" style="border-bottom:solid 1px #CCC;padding-bottom:10px">Design Form</h4>
<?php
if(isset($form_data)&&!empty($form_data)){

	foreach($form_data as $set_form){
	if($set_form->level==2){
?>
    <div class="form-group">
      <label class="col-lg-2 control-label"><?=$set_form->name;?></label>
      <div class="col-lg-3">
<?php
if($set_form->type=='textarea'){
?>
<textarea class="form-control" ></textarea>
<?php	
}
if($set_form->type=='textfield'){
?>
<input type="text" placeholder="" class="form-control" />
<?php	
}
if($set_form->type=='date_time'){
?>
<input type="text" name="" class="form-control datetimepicker1" id="datetimepicker1" value="" placeholder="dd-mm-yyyy h:i a"  />

<!--<input type="text" placeholder="yyyy-mm-dd" name="field[<?=$set_form->id?>]" data-date-format="yyyy-mm-dd" class="form-control date-picker " />-->
<?php
}
if($set_form->type=='date'){
?>
<input type="text" placeholder="yyyy-mm-dd" class="form-control" />
<?php
}
if($set_form->type=='mdroplist'){
	$arrayList = explode(',',$set_form->values);
	if($arrayList){
?>
<select class="input-field"  multiple="multiple" style="width:100%">
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
}
if($set_form->type=='droplist'){
	$arrayList = explode(',',$set_form->values);
	if($arrayList){
?>
<select class="form-control " name="" >
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

if($set_form->type=='attachment'){
?>
<input type="file" name="" />
<?php
}
if($set_form->type=='yes_no'){
?>
<div class="radio-list">

<label class="radio-inline">
	<input type="radio" name="" class="" value="Yes"   /> Yes
</label>

<label class="radio-inline">
	<input type="radio" name="" class="" value="No"  /> No
</label>
</div>

<?php
	}
?>                        

      </div>
      
        </div>

<?php
	}
	}
}
?>

<h4 class="m-t-20" style="border-bottom:solid 1px #CCC;padding-bottom:10px">Workflow</h4>
<?php
if(isset($form_data)&&!empty($form_data)){
	foreach($form_data as $set_form){
	if($set_form->level==3){
?>
<div class="form-group">
	<label class="col-lg-2 control-label" style="padding-top:0px;"><?=$set_form->name;?></label>
    <div class="col-lg-3"><?=ucwords(str_replace('_',' ',$set_form->user_type))?></div>
</div>
<?php
		}
	}
}
?>
</div>							

	<div class="form-actions">
<button type="button" onclick="window.location='<?=$_cancel?>'" class="btn btn-info"><?=show_static_text($adminLangSession['lang_id'],360);?>Back</button>
	</div>
    
</div>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>



<link href="assets/global/css/custom.css" rel="stylesheet" />

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
<link href="assets/admin_temp/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<script src="assets/admin_temp/plugins/bootstrap-daterangepicker/moment.js"></script>
<!--<script src="assets/admin_temp/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>-->
<script src="assets/admin_temp/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$(function () {
	$('.datetimepicker1').datetimepicker({
		format: 'DD-MM-YYYY h:m a'
	});
});
</script>
<link href="assets/plugins/select2/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="assets/plugins/select2/select2.js"></script>
<script>
$(document).ready(function() {
	$('.input-field').select2({placeholder: "Select"});
});
</script>
