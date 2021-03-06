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
                    
                    <div class="form-group" >
                      <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],16);?></label>
                      <div class="col-lg-10">
                        <?=form_input('name', set_value('name', $page->{'name'}), 'class="form-control " id="" placeholder="'.lang('Name').'"')?>
                      </div>
                </div>
                    
                    <!--<div class="form-group">
                      <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],291);?></label>
                      <div class="col-lg-10">
                        <?php echo form_dropdown('type', $slider_position, $this->input->post('type') ? $this->input->post('type') : $page->type, 'class="form-control"'); ?>
                      </div>
                    </div>-->
                    <div class="form-group">
                      <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],263);?></label>
                      <div class="col-lg-10">
				      	<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                <img src="<?=!isset($page->image)?'assets/uploads/no-image.gif':base_url('assets/images').'/'.$page->image;?>" id="b-img">
                            </div>
							<div>
						    <span class="btn btn-default btn-file"><span class="fileinput-new"><?=show_static_text($adminLangSession['lang_id'],159);?></span><span class="fileinput-exists"><?=show_static_text($adminLangSession['lang_id'],160);?></span>
    	    	            <input type="file" name="logo" id="logo"></span>
						    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?=show_static_text($adminLangSession['lang_id'],109);?></a>
                     	</div>
                   		</div>
                            <!--<input type="file" name="logo" id="logo" />-->
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-lg-2 control-label" style="padding-top:0"><?=show_static_text($adminLangSession['lang_id'],2503);?>Or Media</label>
                      <div class="col-lg-3">
				      		<a href="javascript:;" onclick="open_modals();">Select Image</a>
                            <span class="selected-image"></span>
                            <!--<input type="file" name="logo" id="logo" />-->
                      </div>                      
                      
                    </div>
                    
					<div class="form-group">
                              <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2716);?>Description</label>
                              <div class="col-lg-10">
                                <?=form_textarea('description', set_value('description', $page->{'description'}), 'placeholder="" rows="3" class="cleditor2 form-control"')?>
                              </div>
                            </div>                                        
    
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-9">
                            <?=form_submit('submit', show_static_text($adminLangSession['lang_id'],235), 'class="btn btn-primary"')?>
                            <a href="<?=$_cancel;?>" class="btn btn-default" type="button"><?=show_static_text($adminLangSession['lang_id'],22);?></a>
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
<!--<script src="assets/plugins/ckeditor/ckeditor.js" type="text/javascript" language="javascript"></script> 
<script src="assets/plugins/ckeditor/adapters/jquery.js" type="text/javascript" language="javascript"></script> 
<script>
/* CL Editor */
$(document).ready(function(){
    $('.cleditor2').ckeditor({
	    filebrowserUploadUrl : '<?=site_url("ajax/upload_editor_image")?>'	
	});
});
</script>
-->


<script>
var open_model =true;
function open_modals(){
	$('#media-modal').modal({
        show: 'true',
    }); 
	
	if(open_model){
		$('#modal-loader').show();      // load ajax loader
		$('#dynamic-content').html(''); // leave it blank before ajax call
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