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
                      <label class="col-lg-2 control-label">Category</label>
                      <div class="col-lg-10">
                        <?php echo form_dropdown('type', $product_type, $this->input->post('type') ? $this->input->post('type') : $products->type, 'class="form-control"'); ?>
                      </div>
                    </div>
                        
                                                
                          <div class="form-group">
      <label class="col-lg-2 control-label"><?=show_static_text($lang_id,263);?></label>
      <div class="col-lg-10">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                <?php echo !isset($products->image) ? '<img src="assets/uploads/no-image.gif">' :'<img src="'.base_url('assets/uploads/products/thumbnails').'/'.$products->image.'" >'; ?>
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

                    
				
                
				<div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,41);?></label>
                  <div class="col-lg-10">
                    <?=form_input('price', set_value('price', $products->{'price'}), 'class="form-control " id="" placeholder=""')?>
                  </div>
                </div>
                
				<div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,271);?></label>
                  <div class="col-lg-10">
                    <?=form_input('discount_price', set_value('discount_price', $products->{'discount_price'}), 'class="form-control " id="" placeholder=""')?>
                  </div>
                </div>
                           
                <div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>Tax %</label>
                  <div class="col-lg-10">
                    <?=form_input('tax', set_value('tax', $products->{'tax'}), 'class="form-control " id="" placeholder=""')?>
                  </div>
                </div>
                <div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>Vat %</label>
                  <div class="col-lg-10">
                    <?=form_input('vat', set_value('vat', $products->{'vat'}), 'class="form-control " id="" placeholder=""')?>
                  </div>
                </div>
                <div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>Stock</label>
                  <div class="col-lg-10">
                    <?=form_input('quantity', set_value('quantity', $products->{'quantity'}), 'class="form-control " id="" placeholder=""')?>
                  </div>
                </div>                                                         
                <div class="form-group" >
                  <label class="col-lg-2 control-label"><?=show_static_text($lang_id,4001);?>Danger level</label>
                  <div class="col-lg-10">
                    <?=form_input('danger_level', set_value('danger_level', $products->{'danger_level'}), 'class="form-control " id="" placeholder=""')?>
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
                        foreach($this->product_model->languages_icon as $key_lang=>$val_lang):

                          $i++;?>
                        <li class="<?=$i==1?'active':''?>">
                          <a data-toggle="tab" href="#<?=$key_lang?>"><img src="<?php echo base_url('assets/uploads/language').'/'.$val_lang; ?>" height="15" width="20" ></a></li>
                        <?php endforeach;?>
                      </ul>
                      <div style="padding-top: 9px; border-bottom: 1px solid #ddd;" class="tab-content">
                        <?php $i=0;foreach($this->product_model->languages as $key_lang=>$val_lang):$i++;?>
                        <div id="<?=$key_lang?>" class="tab-pane <?=$i==1?'active':''?>">
                            <div class="form-group">
                              <label class="col-lg-2 control-label"><?=show_static_text($lang_id,16);?></label>
                              <div class="col-lg-10">
                                <?=form_input('title_'.$key_lang, set_value('title_'.$key_lang, $products->{'title_'.$key_lang}), 'class="form-control copy_to_next" id="inputTitle'.$key_lang.'" placeholder="Name"')?>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label"><?=show_static_text($lang_id,276);?></label>
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
<div class="col-md-12">
	    <div class="portlet box blue-hoki">
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=show_static_text($lang_id,277);?></h4>
            </div>
            <div class="panel-body">
<div class="col-md-12" style="">

              <div class="widget wlightblue">
                <div class="widget-content">

			<form role="form" action="ajax/set_video_comment" id="comment_form">
<input type="hidden" name="comment_form" value="set">                    	
<div class="form-group">
<label class="col-sm-2 control-label"><?=show_static_text($lang_id,277);?>:</label>  
<span>Please upload more then  200 * 300</span>
<div class="col-sm-4">
<div id="fileuploader" class="fileuploader" style="background-color:#52B6EC"><?=show_static_text($lang_id,278);?></div>
<span id="filesUpload" class="filesUpload"></span>
<div id="status"></div>        		            
</div>
</div>
<div style="clear:both"></div>                    
</form>


			<div id="product_files_content">

<?php
if(isset($products_file)&&!empty($products_file)){
foreach($products_file as $set_products_file){
?>
<div class="product-item col-md-3" style="padding:4px;margin:5px;width:23%" id="product_image_<?=$set_products_file->id?>">
<div class="pi-img-wrapper">
<img style="height:100px;width:100%" alt="" class="img-responsive" src="assets/uploads/products/<?=$set_products_file->filename?>"></a>
</div>
<a  class="btn btn-default" onclick="delete_image('<?=$set_products_file->id?>')" href="javascript:void(0)" style="margin-top:10px">Delete</a>

<!--<div class="sticker sticker-sale"></div>-->
</div>
<?php
}
}
?>    
</div>
                  
                </div>
                  
              </div>  
              
            </div>

            </div>
        </div>


        
    </div>
    </div>
        <!--end col-md-12-->
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



<script>
function get_process(id){	
	$.ajax({
		type:"POST",
		url:"ajax/ajaxGetSubcategory",
		data:{id:id,lang_code:'<?=$lang_id?>',<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		dataType: 'json',
		success: function(json) {	
			if(json.status=='ok'){
				$('#sub-category').html(json.msge);
			}
			if(json.status=='error'){
				$('#sub-category').html('<option value="">Select</option>');
			}
		}
		
	});
}

</script>

<link href="assets/plugins/uploader/css/uploadfile.css" rel="stylesheet">
<script src="assets/plugins/uploader/js/jquery.uploadfile.min.js"></script>
<script>
$(document).ready(function(){
	$(".fileuploader").uploadFile({
		url:"ajax/ajax_upload1",
		fileName:"myfile",
		showStatusAfterSuccess:false,
		uploadButtonClass:"ajax-file-upload-blue",
		allowedTypes:"*",
		multiple: false,
		onSuccess:function(files,data,xhr){
			var obj = jQuery.parseJSON(data);
			if(obj.result=='error'){
				$('.ajax-file-upload-statusbar').hide();
				$("#status").html("<font color='red'>"+obj.msg+"</font>");
			}
			else if(obj.result=='success'){
				//$("#status").html("<font color='red'>image is uploaded. </font>");
				var pic_id = '<input type="hidden" name="more_pic[]" value="'+obj.msg+'" />';
				$('#more_pic').append(pic_id);
				refresh_image(obj.msg);
				//window.location.href = "front/videos/"+$("#video_id").val();
			}
			
		},
		onError: function(files,status,errMsg){		
			$("#status").html("<font color='red'>Upload is Failed</font>");
		}

	});
});
function refresh_image(id){
	$.ajax({
		type:"POST",
		url:"ajax/refresh_product_image1",
		data:{id:id,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		success:function(data){
			$('#product_files_content').append(data);
		}
	});

}
function delete_image(id){
	$.ajax({
		type:"POST",
		url:"ajax/delete_product_image",
		data:{id:id,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		success:function(data){
			$('#product_image_'+id).hide();
		}
	});

}
</script>


<link href="assets/plugins/select2/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="assets/plugins/select2/select2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#select_brand').select2({placeholder: "Select"});
	$('#select_com').select2({placeholder: "Select"});
});

</script>






