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
                     <div class="form-body">                    
                      <div id="more_pic" style="display:none"></div>
                    <div class="col-md-12">						                                                                        
						<div class="form-group">
                          <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1008);?>Type</label>
                          <div class="col-lg-10">
							<select class="form-control" name="s_id" id="select_category"   required>
                            	<option value="" >Select</option>
<?php
if(isset($services_data)&&!empty($services_data)){
	foreach($services_data as $setCategory){
?>
    	<option value="<?=$setCategory->id;?>"  <?=($setCategory->id==$products->s_id)?'selected="selected"':'';?> ><?=$setCategory->title;?></option>
<?php
	}
}
?>
            
							</select>
                          </div>
                        </div>
                        
<div class="form-group" >
	<label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>Title</label>
	<div class="col-lg-10">
		<?=form_input('name', set_value('name',$products->name), 'class="form-control " id="" placeholder="" required')?>
	</div>
</div>

<div class="form-group" >
	<label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>Price</label>
	<div class="col-lg-10">
		<?=form_input('price', set_value('price',$products->price), 'class="form-control " id="" placeholder="" required')?>
	</div>
</div>

<div class="form-group" >
	<label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>Link</label>
	<div class="col-lg-10">
		<?=form_input('link', set_value('link',$products->link), 'class="form-control " id="" placeholder="" required')?>
	</div>
</div>	                    
                        
                                                
                          <div class="form-group">
      <label class="col-lg-2 control-label"><?=show_static_text($lang_id,263);?></label>
      <div class="col-lg-10">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                <?php echo !isset($products->image) ? '<img src="assets/uploads/no-image.gif">' :'<img src="'.base_url('assets/uploads/services/thumbnails').'/'.$products->image.'" >'; ?>
            </div>
            <div>
            <span class="btn btn-default btn-file"><span class="fileinput-new"><?=show_static_text($lang_id,159);?></span><span class="fileinput-exists"><?=show_static_text($lang_id,160);?></span>
            <input type="file" name="logo" id="logo"></span>
            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?=show_static_text($lang_id,109);?></a>
        </div>
        </div>
            <!--<input type="file" name="logo" id="logo" />-->
      </div>
    </div>

                    
				
<div class="form-group">
	<label class="col-lg-2 control-label"><?=show_static_text($lang_id,38);?></label>
		<div class="col-lg-10">
		<?=form_textarea('description', html_entity_decode(set_value('description', $products->{'description'})), 'placeholder="" rows="3" class="cleditor2 form-control"')?>
		</div>
</div>                

                
				
                           
                                                                         
			</div>
            
               <div style="clear:both"></div>


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
        <!-- end panel -->
    </div>

</div>

<link href="assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript" language="javascript"></script> 

<script src="assets/plugins/ckeditor/ckeditor.js" type="text/javascript" language="javascript"></script> 
<script src="assets/plugins/ckeditor/adapters/jquery.js" type="text/javascript" language="javascript"></script>
<script>
/* CL Editor */
$(document).ready(function(){
    $('.cleditor2').ckeditor();
});
</script>




