<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
            <!-- BEGIN FORM-->
            <?php echo validation_errors();?>
                    <?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form','enctype'=>"multipart/form-data"))?>                                                             
                        <div class="form-body">
	                       
                           <div class="form-group">
      <label class="col-lg-2 control-label">Account Type</label>
      <div class="col-lg-10">
<select class="form-control" name="type" id="country" style="" >
<?php

if($userTypes){
	foreach($userTypes as $setCate){
?>
	<option value="<?=$setCate; ?>" <?= set_select('type',$setCate); ?> ><?=$setCate; ?></option>
<?php
	}
}
?>
</select>                    
      </div>
    </div> 	
	                    <div class="form-group" >
                  			<label class="col-lg-2 control-label">Title</label>
                            <div class="col-lg-10">
                               <?=form_input('name', set_value('name', $categories->name), 'class="form-control " id="" placeholder=""')?>
                            </div>
                        </div>

                        <div class="form-group" >
                  			<label class="col-lg-2 control-label">Price</label>
                            <div class="col-lg-10">
                               <?=form_input('price', set_value('price', $categories->price), 'class="form-control " id="" placeholder="price"')?>
                            </div>
                        </div>
                        <div class="form-group" >
                  			<label class="col-lg-2 control-label">Member</label>
                            <div class="col-lg-10">
                        <?php echo form_dropdown('member', $member_data, $this->input->post('member') ? $this->input->post('member') : $categories->member, 'class="form-control"'); ?>
<!--                               <?=form_input('member', set_value('member', $categories->member), 'class="form-control " id="" placeholder=""')?>-->
                            </div>
                        </div>

                        <!--<div class="form-group" >
                  			<label class="col-lg-2 control-label">Credit Point</label>
                            <div class="col-lg-10">
                               <?=form_input('c_point', set_value('c_point', $categories->c_point), 'class="form-control " id="" placeholder=""')?>
                            </div>
                        </div>-->
                      
                        <div class="form-group" >
                  			<label class="col-lg-2 control-label">Month</label>
                            <div class="col-lg-10">
<!--                               <?=form_input('month', set_value('month', $categories->month), 'class="form-control " id="" placeholder=""')?>-->
                        <?php echo form_dropdown('month', $month, $this->input->post('month') ? $this->input->post('month') : $categories->month, 'class="form-control"'); ?>
                            </div>
                        </div>
	                        
            <div class="form-group">
              <label class="col-lg-2 control-label">Description</label>
              <div class="col-lg-10">
                <?=form_textarea('desc', set_value('desc', $categories->{'desc'}), 'placeholder="" rows="3" class="cleditor2 form-control"')?>
              </div>
            </div>
                        
                           
						</div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-9">
                                    <?=form_submit('submit', lang('Save'), 'class="btn btn-primary"')?>
                                    <a href="<?=$_cancel?>" class="btn btn-default" type="button"><?=lang('Cancel')?></a>
                                    <!--<button type="button" class="btn default">Cancl</button>-->
                                </div>
                            </div>
                        </div>
                    <?=form_close()?>
        </div>
        </div>
        <!-- end panel -->
    </div>
</div>

