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
                <div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>Name</label>
                  <div class="col-lg-10">
                    <?=form_input('first_name', set_value('first_name',$products->first_name), 'class="form-control " id="" placeholder="" required')?>
                  </div>
                </div>
                <div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>Surname</label>
                  <div class="col-lg-10">
                    <?=form_input('last_name', set_value('last_name',$products->last_name), 'class="form-control " id="" placeholder="" required')?>
                  </div>
                </div>
                <div class="form-group">
                              <label class="col-lg-2 control-label"><?=show_static_text($lang_id,276);?></label>
                              <div class="col-lg-10">
                                <?=form_textarea('description', html_entity_decode(set_value('description', $products->{'description'})), 'placeholder="Body" rows="3" class="cleditor2 form-control"')?>
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

<script src="assets/plugins/ckeditor/ckeditor.js" type="text/javascript" language="javascript"></script> 
<script src="assets/plugins/ckeditor/adapters/jquery.js" type="text/javascript" language="javascript"></script>
<script>
/* CL Editor */
$(document).ready(function(){
    $('.cleditor2').ckeditor();
});
</script>


