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
                        <label class="col-lg-2 col-md-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2055);?>Email</label>
                        <div class="col-lg-10 col-md-10">
                           <?=form_input('email', set_value('email'), 'class="form-control " id="" placeholder=""')?>
                        </div>
                    </div>      
            	<div class="form-group" >
                        <label class="col-lg-2 col-md-2 control-label"><?=show_static_text($adminLangSession['lang_id'],255);?></label>
                        <div class="col-lg-10 col-md-10">
                           <?=form_input('subject', set_value('subject', $news->subject), 'class="form-control " id="" placeholder="Subject"')?>
                        </div>
                    </div>
                <div class="form-group">
                    <label class="col-md-2 col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],55);?></label>
                    <div class="col-lg-10 col-md-10">
				<?=form_textarea('desc', set_value('desc', $news->{'desc'}), 'placeholder="Message" rows="3" class="cleditor2 form-control"')?>
                    </div>
                </div>
		    </div>
    		<div class="form-actions">
        <div class="row">
            <div class="col-md-offset-2 col-md-9">
            <?=form_submit('submit',show_static_text($adminLangSession['lang_id'],230), 'class="btn btn-primary"')?>
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





<script src="assets/plugins/ckeditor/ckeditor.js" type="text/javascript" language="javascript"></script> 
<script src="assets/plugins/ckeditor/adapters/jquery.js" type="text/javascript" language="javascript"></script> 
<script>
/* CL Editor */
$(document).ready(function(){
    $('.cleditor2').ckeditor({
	});
});
</script>