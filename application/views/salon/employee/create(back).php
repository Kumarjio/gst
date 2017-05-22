<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>

<div class="panel-body">
<?php //echo validation_errors();?>
<?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form','enctype'=>"multipart/form-data"))?>

                      <div id="more_pic" style="display:none"></div>
<div class="form-body">                    
	<div class="col-md-12">						                        
	
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,16);?></label>
        <div class="col-lg-10">
			<?=form_input('first_name', set_value('first_name', $users->{'first_name'}), 'class="form-control " id="address-input" placeholder=""')?>
    	    <span class="error-span"><?php echo form_error('first_name'); ?></span>
        </div>
    </div>

    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,17);?></label>
        <div class="col-lg-10">
			<?=form_input('last_name', set_value('last_name', $users->{'last_name'}), 'class="form-control " id="address-input" placeholder=""')?>
    	    <span class="error-span"><?php echo form_error('last_name'); ?></span>
        </div>
    </div>

	<div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,18);?></label>
        <div class="col-lg-10">
			<?=form_input('email', set_value('email', $users->{'email'}), 'class="form-control " id="address-input" placeholder=""')?>
    	    <span class="error-span"><?php echo form_error('email'); ?></span>
        </div>
    </div>
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,20);?></label>
        <div class="col-lg-10">
	        <input type="password" name="password" class="form-control " value="<?=set_value('password');?>">
    	    <span class="error-span"><?php echo form_error('password'); ?></span>
        </div>
    </div>
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1020);?>Access</label>
        <div class="col-lg-10">
<div class="checkbox-list" style="margin-left:20px">
                        <label class="checkbox-inline">
<?=form_checkbox('is_analysis', '1', set_value('is_analysis', $this->input->post('is_analysis')), 'id="inputDefault" class=""')?> Analysis</label>&nbsp;&nbsp;

                        <label class="checkbox-inline">
<?=form_checkbox('is_report', '1', set_value('is_report', $this->input->post('is_report')), 'id="inputDefault" class=""')?> Report</label>                        

                        
                    </div>        </div>
    </div>

<div class="form-group">
                      <label class="col-lg-2 control-label"><?=show_static_text($lang_id,88);?></label>
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




<link href="assets/plugins/select2/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="assets/plugins/select2/select2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#select_size').select2({placeholder: "Select"});
});
</script>

