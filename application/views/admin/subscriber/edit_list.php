
<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><!--<?=$name?>-->Create Mailing List</h4>
            </div>
            <div class="panel-body">
    	        <?php echo validation_errors();?>
        <?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form','enctype'=>"multipart/form-data", 'action'=>'/add'))?>
                 
	    	<div class="form-body">              
            	<div class="form-group" >
                        <label class="col-lg-2 col-md-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2550);?>List Title:</label>
                        <div class="col-lg-10 col-md-10">
						<?php
 if(count($edit_listing)){
	$i=1;
	foreach($edit_listing as $set_data){
		//echo "<pre>";
	//print_r($set_data);
 
		
?>
                        <!--   <?=form_input('email', set_value('email', $news->email), 'class="form-control " id="" placeholder=""')?> -->
						<input type="hidden" class="form-control" value="<?php echo $set_data->Id; ?>" name="id">
						<input required type="text" class="form-control" value="<?php echo $set_data->list_title; ?>" name="title">
                        </div>
                    </div>
					<div class="form-group" >
                        <label class="col-lg-2 col-md-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2550);?>Select Users</label>
                        <div class="col-lg-10 col-md-10">
                        <!--   <?=form_input('email', set_value('email', $news->email), 'class="form-control " id="" placeholder=""')?> -->
					
					<?php $x = $set_data->email;
					//echo $x; 
					$y=explode(',',$x);?><select required multiple="" class="form-control" name="emails[]">
					<?php
				
if(count($all_data)){
	$k=0;
	foreach($all_data as $set){
	//print_r($set_data); } } die;

?>
                    <option value="<?php echo $set->id;?>" <?php foreach($y as $s){ if($set->id == $s){ echo "selected";} } ?> ><?php echo $set->email;?></option>
	<?php  $k++; } }?>
                  </select>
                        </div>
                    </div>
                
		    </div>
    		<div class="form-actions">
        <div class="row">
            <div class="col-md-offset-2 col-md-9">
           <!-- <?=form_submit('submit',show_static_text($adminLangSession['lang_id'],235), 'class="btn btn-primary"')?>-->
		   <input name="submit" value="Save" class="btn btn-primary" type="submit" name="add_list">
            <a href="<?=$_cancel;?>" class="btn btn-default" type="button"><?=show_static_text($adminLangSession['lang_id'],22);?></a>
            </div>
        </div>
		 <?php $i++;  } }?>
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