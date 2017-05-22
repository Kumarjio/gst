<?php 
$GLOBALS['option_value_count']	= 0;
?>
<script>
function remove_option(id){
	if(confirm('Are you sure you want to remove this option?')){
		$('#option-'+id).remove();
	}
}

</script>

<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
<ol class="bwizard-steps clearfix clickable" >
	<li style="z-index: 5;" class="<?=$set_level==1?'active':''?>" ><span class="label <?=$set_level==1?'badge-inverse':''?>">1</span> Name Your Process</li>
    <li style="z-index: 4;" class="<?=$set_level==2?'active':''?>" ><span class="label <?=$set_level==2?'badge-inverse':''?>">2</span> Design Form</li>
    <li style="z-index: 3;" class="<?=$set_level==3?'active':''?>" ><span class="label <?=$set_level==3?'badge-inverse':''?>">3</span> Define Workflow</li>
    <li style="z-index: 2;" class="<?=$set_level==4?'active':''?>" ><span class="label <?=$set_level==4?'badge-inverse':''?>">4</span> Configure Permission</li>
    <li style="z-index: 1;" class="<?=$set_level==5?'active':''?>" ><span class="label <?=$set_level==5?'badge-inverse':''?>">5</span> Final Step</li>
</ol>
<br />

    	        <?php echo validation_errors();?>
<form action="" method="post" class="form-horizontal">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
	<input type="hidden" name="operation" value="set">
    <div id="product_options">
<?php
if(isset($form_data)&&!empty($form_data)){
	foreach($form_data as $set_form){
		
?>
<input type="hidden" name="option[<?=$set_form->id?>][id]" value="<?=$set_form->id?>" />
<div class="form-body">
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
if($set_form->type=='date_time'){
?>
<input type="text" placeholder="dd-mm-yyyy h:i a" class="form-control datetimepicker1" id="datetimepicker1" />
<?php
}
if($set_form->type=='date'){
?>
<input type="text" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" readonly="" class="form-control date-picker "  />
<?php
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
      <div class="col-lg-7">
          <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-success  <?=$set_form->editable=='editable'?'active':''?>" >
                <input type="radio" name="option[<?=$set_form->id?>][editable]"  value="editable" <?=$set_form->editable=='editable'?'checked':''?> > Editable
              </label>
              <label class="btn btn-success <?=$set_form->editable=='read-only'?'active':''?>" >
                <input type="radio" name="option[<?=$set_form->id?>][editable]" value="read-only" <?=$set_form->editable=='read-only'?'checked':''?> > Read-only
              </label>
              <label class="btn btn-success <?=$set_form->editable=='hidden'?'active':''?>" >
                <input type="radio" name="option[<?=$set_form->id?>][editable]" value="hidden" <?=$set_form->editable=='hidden'?'checked':''?> > hidden
              </label>
          </div>
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-success <?=$set_form->is_visible==1?'active':''?>" >
                <input type="radio" name="option[<?=$set_form->id?>][is_visible]" value="1" <?=$set_form->is_visible==1?'checked':''?> > Visible
              </label>
              <label class="btn btn-success <?=$set_form->is_visible==0?'active':''?>">
                <input type="radio" name="option[<?=$set_form->id?>][is_visible]" value="0" <?=$set_form->is_visible==0?'checked':''?>  > Invisible
              </label>                                  
          </div>
    </div>
        </div>
</div>							

<?php
	}
}
?>
                    <div style="clear:both"></div>
        
        
    </div>

	<div class="form-actions">
<?php
if($set_level!=1){
?>
<button type="button" onclick="window.location='<?=$_cancel.'/step3/'.$id?>'" class="btn btn-success"><?=show_static_text($adminLangSession['lang_id'],360);?>Back</button>
<?php
}
?>        
		<button type="submit" class="btn btn-success pull-right"><?php echo 'Next';?></button>
	</div>
    
</form>


            </div>
        </div>
        <!-- end panel -->
    </div>
</div>


<link href="assets/admin_temp/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />



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
