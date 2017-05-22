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
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1006);?>Username</label>
        <div class="col-lg-10">
			<?=form_input('username', set_value('username', $users->{'username'}), 'class="form-control " id="address-input" placeholder=""')?>
    	    <span class="error-span"><?php echo form_error('username'); ?></span>
        </div>
    </div>
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
  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,263);?></label>
  <div class="col-lg-10">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
            <?php echo !isset($users->image) ? '<img src="assets/uploads/profile.jpg">' :'<img src="'.base_url('assets/uploads/users/thumbnails').'/'.$users->image.'" >'; ?>
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

<div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1020);?>Crendential</label>
        <div class="col-lg-10">
<div class="checkbox-list" style="margin-left:20px">

                        <label class="checkbox-inline">
<?=form_checkbox('is_calender', '1', set_value('is_calender', $this->input->post('is_calender')), 'id="inputDefault" class=""')?> Calender</label>&nbsp;&nbsp;
                        <label class="checkbox-inline">
<?=form_checkbox('is_staff', '1', set_value('is_staff', $this->input->post('is_staff')), 'id="inputDefault" class=""')?> Staff</label>&nbsp;&nbsp;
                        <label class="checkbox-inline">
<?=form_checkbox('is_product', '1', set_value('is_product', $this->input->post('is_product')), 'id="inputDefault" class=""')?> Product management</label>&nbsp;&nbsp;
                        <label class="checkbox-inline">
<?=form_checkbox('is_order', '1', set_value('is_order', $this->input->post('is_order')), 'id="inputDefault" class=""')?> Sell Management</label>&nbsp;&nbsp;    
<!--                        <label class="checkbox-inline">
<?=form_checkbox('is_danger', '1', set_value('is_danger', $this->input->post('is_danger')), 'id="inputDefault" class=""')?> Danger</label>&nbsp;&nbsp;
-->
                        <label class="checkbox-inline">
<?=form_checkbox('is_customer', '1', set_value('is_customer', $this->input->post('is_customer')), 'id="inputDefault" class=""')?> Customer</label>
                        <label class="checkbox-inline">
<?=form_checkbox('is_domain', '1', set_value('is_domain', $this->input->post('is_domain')), 'id="inputDefault" class=""')?> Domain</label>&nbsp;&nbsp;

                        <label class="checkbox-inline">
<?=form_checkbox('is_market', '1', set_value('is_market', $this->input->post('is_market')), 'id="inputDefault" class=""')?> Marketing</label>
                        <label class="checkbox-inline">
<?=form_checkbox('is_ticket', '1', set_value('is_ticket', $this->input->post('is_ticket')), 'id="inputDefault" class=""')?> Ticket</label>

                        
                    </div>        </div>
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

<link href="assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript" language="javascript"></script> 



<link href="assets/plugins/select2/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="assets/plugins/select2/select2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#select_size').select2({placeholder: "Select"});
});
</script>

