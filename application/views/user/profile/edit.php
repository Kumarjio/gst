<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">

<?php echo validation_errors();?>
<?=form_open(NULL, array('class' => 'form-horizontal edit-form', 'role'=>'form','enctype'=>"multipart/form-data"))?>
<div class="form-body">                    
	<div class="col-md-12">						                        
        <!--<div class="form-group" >
            <label class="col-lg-2 control-label"><?=show_static_text($lang_id,8007);?>Company name</label>
            <div class="col-lg-10">
    	        <?=form_input('company_name', set_value('company_name', $user_details->{'company_name'}), 'class="form-control " id="" placeholder=""')?>
            </div>
		</div>

		<div class="form-group" >
            <label class="col-lg-2 control-label"><?=show_static_text($lang_id,8007);?>Website Link</label>
            <div class="col-lg-10">
    	        <?=form_input('website', set_value('website', $user_details->{'website'}), 'class="form-control " id="" placeholder=""')?>
            </div>
		</div>
        -->
  


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
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,82);?></label>
        <div class="col-lg-10">
            <?=form_input('phone', set_value('phone', $user_details->{'phone'}), 'class="form-control " id="" placeholder=""')?>
        </div>
    </div>
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,46);?></label>
        <div class="col-lg-10">
                    <input type="text" class="form-control" title="" value="<?=set_value('address',$user_details->{'address'}); ?>" id="address" name="address">
                    <span class="error-span"><?php echo form_error('address'); ?></span>
            </div>
        </div>
        
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,84);?></label>
        <div class="col-lg-10">
            <input type="text" class="form-control" title="" value="<?=set_value('city',$user_details->{'city'}); ?>" id="address" name="city">
                    <span class="error-span"><?php echo form_error('city'); ?></span>
            </div>
        </div>

    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,85);?></label>
        <div class="col-lg-10">
                    <select class="form-control" title="" name="country" required>
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

</div>






</div>
	                 <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-9">
                            		<button type="submit" class="btn btn-primary submitBtn" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> <?=show_static_text($lang_id,235)?>"><?=show_static_text($lang_id,235)?></button>
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

<link href="assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript" language="javascript"></script> 

<script>
$('.edit-form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
$(document).ready(function () {
    $(".edit-form").submit(function () {
//        $(".submitBtn").attr("disabled", true);
		$(".submitBtn").button('loading');
        return true;
    });
});

</script>