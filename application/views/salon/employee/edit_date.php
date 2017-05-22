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

                      <div id="more_pic" style="display:none"></div>
<div class="form-body">                    
	<div class="col-md-12">						                        
	
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1006);?>Username</label>
        <div class="col-lg-10">
<select class="form-control" name="staff_id" id="select_category" required>
                            	<option value="" >Select</option>
<?php
if(isset($staff_data)&&!empty($staff_data)){
	foreach($staff_data as $set_store){
?>
		<option value="<?=$set_store->id;?>"  <?=($set_store->id==$products->staff_id)?'selected="selected"':'';?> ><?=$set_store->first_name.' '.$set_store->last_name;?></option>
<?php
	}
}
?>
            
							</select>
    	    <span class="error-span"><?php echo form_error('username'); ?></span>
        </div>
    </div>
    
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1020);?>Day</label>
        <div class="col-lg-10">
<div class="checkbox-list" style="margin-left:10px">
                        <label class="checkbox-inline">
<?=form_checkbox('is_mon', '1', set_value('is_mon', $products->is_mon), 'id="inputDefault" class=""')?> Monday</label>&nbsp;&nbsp;
                        <label class="checkbox-inline">
<?=form_checkbox('is_tue', '1', set_value('is_tue',$products->is_tue), 'id="inputDefault" class=""')?> Tuesday</label>&nbsp;&nbsp;
                        <label class="checkbox-inline">
<?=form_checkbox('is_wed', '1', set_value('is_wed',$products->is_wed), 'id="inputDefault" class=""')?> Wednesday</label>&nbsp;&nbsp;
                        <label class="checkbox-inline">
<?=form_checkbox('is_thr', '1', set_value('is_thr',$products->is_thr), 'id="inputDefault" class=""')?> Thursday</label>&nbsp;&nbsp;    
                        <label class="checkbox-inline">
<?=form_checkbox('is_fri', '1', set_value('is_fri',$products->is_fri), 'id="inputDefault" class=""')?> Friday</label>&nbsp;&nbsp;

                        <label class="checkbox-inline">
<?=form_checkbox('is_sat', '1', set_value('is_sat',$products->is_sat), 'id="inputDefault" class=""')?> Saturday</label>
                        <label class="checkbox-inline">
<?=form_checkbox('is_sun', '1', set_value('is_sun',$products->is_sun), 'id="inputDefault" class=""')?> Sunday</label>

                        
                    </div>        </div>
    </div>

    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1700);?>Monday Time</label>       
        <div class="col-lg-2">
<select name="mon_s_time" class="form-control" id="input-time">
<option value="" >From</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->mon_s_time==$setTime?'selected="selected"':''?> ><?=$setTime?></option>
<?php
}
?>
</select>
    	    <span class="error-span"><?php echo form_error('last_name'); ?></span>
        </div>
        <div class="col-lg-2">
<select name="mon_e_time" class="form-control" id="input-time">
<option value="" >To</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->mon_e_time==$setTime?'selected="selected"':''?>><?=$setTime?></option>
<?php
}
?>
</select>
        </div>
    </div>

	<div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1700);?>Tuesday Time</label>
        <div class="col-lg-2">
<select name="tue_s_time" class="form-control" id="input-time">
<option value="" >From</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->tue_s_time==$setTime?'selected="selected"':''?> ><?=$setTime?></option>
<?php
}
?>
</select>
    	    <span class="error-span"><?php echo form_error('last_name'); ?></span>
        </div>
        <div class="col-lg-2">
<select name="tue_e_time" class="form-control" id="input-time">
<option value="" >To</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->tue_e_time==$setTime?'selected="selected"':''?>><?=$setTime?></option>
<?php
}
?>
</select>
        </div>
    </div>
    
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1700);?>Wednesday Time</label>
        <div class="col-lg-2">
<select name="wed_s_time" class="form-control" id="input-time">
<option value="" >From</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->wed_s_time==$setTime?'selected="selected"':''?> ><?=$setTime?></option>
<?php
}
?>
</select>
    	    <span class="error-span"><?php echo form_error('last_name'); ?></span>
        </div>
        <div class="col-lg-2">
<select name="wed_e_time" class="form-control" id="input-time">
<option value="" >To</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->wed_e_time==$setTime?'selected="selected"':''?>><?=$setTime?></option>
<?php
}
?>
</select>
        </div>
    </div>
    
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1700);?>Thursday Time</label>
        <div class="col-lg-2">
<select name="thr_s_time" class="form-control" id="input-time">
<option value="" >From</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->thr_s_time==$setTime?'selected="selected"':''?> ><?=$setTime?></option>
<?php
}
?>
</select>
    	    <span class="error-span"><?php echo form_error('last_name'); ?></span>
        </div>
        <div class="col-lg-2">
<select name="thr_e_time" class="form-control" id="input-time">
<option value="" >To</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->thr_e_time==$setTime?'selected="selected"':''?>><?=$setTime?></option>
<?php
}
?>
</select>
        </div>
    </div>
    
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1700);?>Friday Time</label>
        <div class="col-lg-2">
<select name="fri_s_time" class="form-control" id="input-time">
<option value="" >From</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->fri_s_time==$setTime?'selected="selected"':''?> ><?=$setTime?></option>
<?php
}
?>
</select>
    	    <span class="error-span"><?php echo form_error('last_name'); ?></span>
        </div>
        <div class="col-lg-2">
<select name="fri_e_time" class="form-control" id="input-time">
<option value="" >To</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->fri_e_time==$setTime?'selected="selected"':''?>><?=$setTime?></option>
<?php
}
?>
</select>
        </div>
    </div>
	
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1700);?>Saturday Time</label>
        <div class="col-lg-2">
<select name="sat_s_time" class="form-control" id="input-time">
<option value="" >From</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->sat_s_time==$setTime?'selected="selected"':''?> ><?=$setTime?></option>
<?php
}
?>
</select>
    	    <span class="error-span"><?php echo form_error('last_name'); ?></span>
        </div>
        <div class="col-lg-2">
<select name="sat_e_time" class="form-control" id="input-time">
<option value="" >To</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->sat_e_time==$setTime?'selected="selected"':''?>><?=$setTime?></option>
<?php
}
?>
</select>
        </div>
    </div>    
    
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1700);?>Sunday Time</label>
        <div class="col-lg-2">
<select name="sun_s_time" class="form-control" id="input-time">
<option value="" >From</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->sun_s_time==$setTime?'selected="selected"':''?> ><?=$setTime?></option>
<?php
}
?>
</select>
    	    <span class="error-span"><?php echo form_error('last_name'); ?></span>
        </div>
        <div class="col-lg-2">
<select name="sun_e_time" class="form-control" id="input-time">
<option value="" >To</option>
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>" <?=$products->sun_e_time==$setTime?'selected="selected"':''?>><?=$setTime?></option>
<?php
}
?>
</select>
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
	</div><!--// col-md-6 //-->
    <!--// col-md-6 //-->
</div>



<link href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css"  rel='stylesheet' type='text/css' >
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
	//$('&nbsp;').appendTo('div.dataTables_filter');
	//$('div.dataTables_filter').appendTo('<button id="refresh">Refresh</button>');
	$('#input-e-date').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});
	$('#input-s-date').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});

});
</script>


<link href="assets/plugins/select2/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="assets/plugins/select2/select2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.select-multi-attribute').select2({placeholder: "Select"});
	$('.s2_with_tag').select2({placeholder: "Select"});
});

</script>

