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
                      
                    <div class="col-md-12">
				<div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>Link</label>
                  <div class="col-lg-10">
                    <?=form_input('link', set_value('link', $products->{'link'}), 'class="form-control " id="" placeholder=""')?>
                  </div>
                </div>                    
<div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>City</label>
                  <div class="col-lg-10">
                    <?=form_input('city', set_value('city', $products->{'city'}), 'class="form-control " id="" placeholder=""')?>
                  </div>
                </div>
                
<div class="form-group" >
    <label class="col-lg-2 control-label"><?=show_static_text($lang_id,41);?></label>
    <div class="col-lg-10">
	    <?=form_input('price', set_value('price', $products->{'price'}), 'class="form-control " id="" placeholder=""')?>
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
                        <a href="javascript:;" onclick="open_modals();">Select Image</a>
                        </div>
                        </div>
                        <!--<input type="file" name="logo" id="logo" />-->
                        </div>
                        </div>
					</div>
            
               <div style="clear:both"></div>

                   <h5><?=show_static_text($lang_id,268);?></h5>
                   <div style="margin-bottom: 0px;" class="tabbable">
                      <ul class="nav nav-tabs">
                        <?php $i=0;
                      //   debugger($this->page_m->languages_icon);
                      //  foreach($this->page_m->languages as $key_lang=>$val_lang):
                        foreach($this->deal_model->languages_icon as $key_lang=>$val_lang):

                          $i++;?>
                        <li class="<?=$i==1?'active':''?>">
                          <a data-toggle="tab" href="#<?=$key_lang?>"><img src="<?php echo base_url('assets/uploads/language').'/'.$val_lang; ?>" height="15" width="20" ></a></li>
                        <?php endforeach;?>
                      </ul>
                      <div style="padding-top: 9px; border-bottom: 1px solid #ddd;" class="tab-content">
                        <?php $i=0;foreach($this->deal_model->languages as $key_lang=>$val_lang):$i++;?>
                        <div id="<?=$key_lang?>" class="tab-pane <?=$i==1?'active':''?>">
                            <div class="form-group">
                              <label class="col-lg-2 control-label"><?=show_static_text($lang_id,16);?></label>
                              <div class="col-lg-10">
                                <?=form_input('title_'.$key_lang, set_value('title_'.$key_lang, $products->{'title_'.$key_lang}), 'class="form-control copy_to_next" id="inputTitle'.$key_lang.'" placeholder="Name"')?>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label"><?=show_static_text($lang_id,2760);?>Note</label>
                              <div class="col-lg-10">
                                <?=form_textarea('body_'.$key_lang, html_entity_decode(set_value('body_'.$key_lang, $products->{'body_'.$key_lang})), 'placeholder="Body" rows="3" class="cleditor2 form-control"')?>
                              </div>
                            </div>
                                                        

                        </div>
                        <?php endforeach;?>
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
        <!-- end panel -->
    </div>

	<!--col-md-12-->

        <!--end col-md-12-->
</div>

<link href="assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript" language="javascript"></script> 

<script>
var open_model =true;

function open_modals(){
	$('#media-modal').modal({
        show: 'true',
    }); 

	if(open_model){
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		$.ajax({
		   type: "POST",
		   url: "<?=$admin_link?>/media/ajax_modal", /* The country id will be sent to this file */
		   data: {type:'image',<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
			dataType: 'json',
			success:function(data){
				open_model =false;
				$('#modal-loader').hide();      // load ajax loader
			   	if(data.status='ok'){
					$('#dynamic-content').html(data.content); // leave it blank before ajax call
				}
		   }
		 });
	}
} 


function select_image(id){
	$('.selected-image').html('<input type="hidden" name="media_image" value="'+id+'">'+id+' <a href="javascript:;" onclick="empty_image();">remove</a>');
	$('#b-img').attr('src','assets/images/'+id);
	$('#media-modal').modal('hide'); 
}

function empty_image(){
	$('.selected-image').html('');
}
</script>

