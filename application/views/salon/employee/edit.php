<div class="row">
	<div class="col-md-12">
		<div class="box-border" >
<h3 style="color:#666666;border-bottom:1px solid #e7e7e7"><?=$name;?></h3>
            <div class="Popular-Restaurants-grids" style="margin-top:10px">
            <div class="row user-form" id="customer-login">
        <div class="col-md-10 col-right" >        
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
        </div>
		</div>
	</div><!--// col-md-6 //-->

    <!--// col-md-6 //-->
</div>



<style>
.customer-login .col-md-4{
	margin-bottom:10px;
}
.error-span{
	color:#F00;
	margin:0px;
}
.error-span p{
	margin:0px;
}

.form-group{
	clear:both;
}

.form-group label{
  padding: 5px 0px 0px;
  font-size: 13px;
  font-weight: normal;
}

</style>      


<link href="assets/plugins/select2/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="assets/plugins/select2/select2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#select_size').select2({placeholder: "Select"});
});
</script>

