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
    
    <div class="form-group">
                          <label class="col-lg-2 control-label">Date</label>
                          <div class="col-lg-10">
<?=form_input('s_date', set_value('s_date', $products->{'s_date'}), 'class="form-control " id="input-e-date" placeholder="" data-date-format="yyyy-mm-dd" data-date-start-date="+0d"  required ')?>
							
                          </div>
                        </div>

    <!--<div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1700);?>Start Time</label>
        <div class="col-lg-10">
<select name="s_time" class="form-control" id="input-time">
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>"><?=$setTime?></option>
<?php
}
?>
</select>
    	    <span class="error-span"><?php echo form_error('last_name'); ?></span>
        </div>
    </div>-->

    <!--<div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1017);?>End Time</label>
        <div class="col-lg-10">
<select name="e_time" class="form-control" id="input-time">
<?php
foreach($time_data as $setTime){
?>
<option value="<?=$setTime?>"><?=$setTime?></option>
<?php
}
?>
</select>
    	    <span class="error-span"><?php echo form_error('e_time'); ?></span>
        </div>
    </div>-->

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

