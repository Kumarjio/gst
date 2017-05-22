
<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
				<div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
<!--                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>-->
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
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
				<?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form', 'enctype'=>"multipart/form-data"))?>                              
                    <div class="form-body">
                        <div class="form-group">
                      <label class="col-lg-2 control-label"><?=lang('').'Category'?></label>
                      <div class="col-lg-10">
                        <select class="form-control " name="category_id" id="select_category" >
<?php
//$set_category = unserialize($products->category);
if(isset($categories_data)&&!empty($categories_data)){
foreach($categories_data as $setCategory){
?>
            <option value="<?php echo $setCategory->id; ?>" <?=$categories->category_id==$setCategory->id?'selected="selected"':'';?> ><?php echo $setCategory->title?></option>
<?php
}
}
?>
        
                        </select>
                      </div>
                    </div>
                        <div class="form-group">
                  <label class="col-lg-2 control-label">Field</label>
                  <div class="col-lg-10">
                    <?=form_dropdown('type', $templates, $this->input->post('type') ? $this->input->post('type') : $categories->type, 'class="form-control"')?>
                  </div>
                </div>	
                        <div class="form-group" >
                        <label class="col-lg-2 control-label"><?=lang('')?>Name</label>
                        <div class="col-lg-10">
                           <?=form_input('field_name', set_value('field_name', $categories->field_name), 'class="form-control " id="" placeholder=""')?>
                        </div>
                    </div>
                    
            <!--<div class="form-group">
              <label class="col-lg-2 control-label"></label>
              <div class="col-lg-10" style="padding-top:10px">
                <?=form_checkbox('free_shipping', '1', set_value('free_shipping', $products->free_shipping), 'id="inputDefault" class="form-control "')?>
              </div>
            </div>-->
                       
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-9">
                                <?=form_submit('submit', lang('Save'), 'class="btn btn-success"')?>
                                <a href="<?=site_url('admin/attribute')?>" class="btn btn-default" type="button"><?=lang('Cancel')?></a>
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


<link href="assets/admin_temp/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />

<link href="assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript" language="javascript"></script> 

