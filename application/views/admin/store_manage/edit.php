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

                      <div id="more_pic" style="display:none"></div>
<div class="form-body">                    
	<div class="col-md-12">						                        

    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],401);?>Room Number</label>
        <div class="col-lg-10">
            <?=form_input('room', set_value('room', $stores->{'room'}), 'class="form-control " id="address-input" placeholder=""')?>
        </div>
    </div>

    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],401);?>Price Per Day</label>
        <div class="col-lg-10">
            <?=form_input('price', set_value('price', $stores->{'price'}), 'class="form-control " id="zip-input" placeholder="" ')?>
        </div>
    </div>

 <!--<div class="form-group">
                      <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],260);?></label>
                      <div class="col-lg-10">
                        <?=form_checkbox('default', '1', set_value('default', $stores->{'default'}), 'id="inputDefault"')?>
                      </div>
                    </div>-->   
<div class="form-group">
  <label class="col-lg-2 control-label">Tag</label>
  <div class="col-lg-10">

    <select  multiple="multiple" class="s2_with_tag" name="tag_id[]" id="select_size" style="width:100%">
<?php
$set_feature = explode(',',$stores->tag_id);

if(isset($tag_data)&&!empty($tag_data)){
	foreach($tag_data as $set_department){
		if(!empty($set_feature)&&in_array($set_department->id,$set_feature)){

?>
	<option value="<?=$set_department->id; ?>" selected="selected" ><?=$set_department->title; ?></option>
<?php
		}
		else{
?>
	<option value="<?=$set_department->id; ?>" ><?=$set_department->title; ?></option>
<?php
		}
	}
}
?>

    </select>
  </div>
</div>

<div class="form-group" >
<label class="col-lg-2 control-label">Description</label>
<div class="col-lg-10">
<?=form_textarea('description', html_entity_decode(set_value('description', $stores->{'description'})), 'placeholder="Description" rows="3" class="cleditor2 form-control"')?>
</div>
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

	<!--col-md-12-->

    
    
    

    
    <!--end col-md-12-->
</div>

<link href="assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript" language="javascript"></script> 




<link href="assets/plugins/select2/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="assets/plugins/select2/select2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#select_size').select2({placeholder: "Select"});
});

</script>

