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
                      <label class="col-lg-2 control-label">Product</label>
                      <div class="col-lg-10">
<select class="form-control" name="product_id" id="select_category" required>
                            	<option value="" >Select</option>
<?php
if(isset($product_data)&&!empty($product_data)){
	foreach($product_data as $set_store){
?>
		<option value="<?=$set_store->id;?>"  <?=($set_store->id==$products->product_id)?'selected="selected"':'';?> ><?=$set_store->title;?></option>
<?php
	}
}
?>
            
							</select>
                      </div>
                    </div>
                        
                                                
                <div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>Quantity</label>
                  <div class="col-lg-10">
                    <?=form_input('qty', set_value('qty'), 'class="form-control " id="" placeholder="" required')?>
                  </div>
                </div>
                <div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>Tax</label>
                  <div class="col-lg-10">
                    <?=form_input('tax', set_value('tax',0), 'class="form-control " id="" placeholder="" required')?>
                  </div>
                </div>
                <div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>vat</label>
                  <div class="col-lg-10">
                    <?=form_input('vat', set_value('vat',0), 'class="form-control " id="" placeholder="" required')?>
                  </div>
                </div>                                                         
			</div>
            
               <div style="clear:both"></div>

						</div>
	                 <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-9">
                                    <?=form_submit('submit', show_static_text($lang_id,235), 'class="btn btn-primary"')?>
<!--                                    <a href="<?=$_cancel;?>" class="btn btn-default" type="button"><?=show_static_text($lang_id,22);?></a>
-->
                                </div>
                            </div>
                        </div>
                 <?=form_close()?>
            </div>
        </div>
        <!-- end panel -->
    </div>

</div>

