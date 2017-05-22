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
				<?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form', 'enctype'=>"multipart/form-data",'data-parsley-validate'=>"true"))?>
                    <div class="form-body">
                        <div class="form-group">
                      <label class="col-lg-2 control-label"><?=lang('').'Category'?></label>
                      <div class="col-lg-10">
                        <select class="form-control " name="category_id" id="select_category"  required>
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
	                    <div class="form-group" >
                        <label class="col-lg-2 control-label"><?=lang('')?>Name</label>
                        <div class="col-lg-10">
                           <?=form_input('name', set_value('name', $categories->name), 'class="form-control " id="" placeholder="" required')?>
                        </div>
                    </div>
	                    <div class="form-group" >
                        <label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                           <?=form_textarea('description', set_value('description', $categories->description), 'placeholder="Body" rows="3" class="form-control"')?>
                        </div>
                    </div>
                        	
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-9">
                                <?=form_submit('submit', 'Next', 'class="btn btn-success"')?>
                                    <a href="<?=$_cancel;?>" class="btn btn-default" type="button"><?=show_static_text($adminLangSession['lang_id'],22);?></a>
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

<link href="assets/admin_temp/plugins/parsley/src/parsley.css" rel="stylesheet" />
<script src="assets/admin_temp/plugins/parsley/dist/parsley.js"></script>
<script>		
$('#form').parsley();
</script>