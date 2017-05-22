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
                        <label class="col-lg-2 col-md-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2550);?>Email</label>
                        <div class="col-lg-10 col-md-10">
                           <?=form_input('email', set_value('email', $news->email), 'class="form-control " id="" placeholder=""')?>
                        </div>
                    </div>
                
		    </div>
    		<div class="form-actions">
        <div class="row">
            <div class="col-md-offset-2 col-md-9">
            <?=form_submit('submit',show_static_text($adminLangSession['lang_id'],235), 'class="btn btn-primary"')?>
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




<link rel="stylesheet" href="assets/plugins/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="assets/plugins/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.multiselect').multiselect({
		buttonWidth: '100%',
		includeSelectAllOption: true,
		enableFiltering: true,
	});
});
</script>


<script src="assets/plugins/ckeditor/ckeditor.js" type="text/javascript" language="javascript"></script> 
<script src="assets/plugins/ckeditor/adapters/jquery.js" type="text/javascript" language="javascript"></script> 
<script>
/* CL Editor */
$(document).ready(function(){
    $('.cleditor2').ckeditor({
	    filebrowserUploadUrl : '<?=site_url("ajax/upload_editor_image")?>'	
	});
});
</script>