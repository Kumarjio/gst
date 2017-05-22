<style>
.form-horizontal .control-label{
	padding-top:0px;
}

</style>
<?php 
$GLOBALS['option_value_count']	= 0;
?>
<script>
function remove_option(id){
	if(confirm('Are you sure you want to remove this option?')){
		$('#option-'+id).remove();
	}
}

</script>

<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
				
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
<ol class="bwizard-steps clearfix clickable" >
	<li style="z-index: 5;" class="<?=$set_level==1?'active':''?>" ><span class="label <?=$set_level==1?'badge-inverse':''?>">1</span> Name Your Process</li>
    <li style="z-index: 4;" class="<?=$set_level==2?'active':''?>" ><span class="label <?=$set_level==2?'badge-inverse':''?>">2</span> Design Form</li>
    <li style="z-index: 3;" class="<?=$set_level==3?'active':''?>" ><span class="label <?=$set_level==3?'badge-inverse':''?>">3</span> Define Workflow</li>
    <li style="z-index: 2;" class="<?=$set_level==4?'active':''?>" ><span class="label <?=$set_level==4?'badge-inverse':''?>">4</span> Configure Permission</li>
    <li style="z-index: 1;" class="<?=$set_level==5?'active':''?>" ><span class="label <?=$set_level==5?'badge-inverse':''?>">5</span> Final Step</li>
</ol>
<br />
    	        <?php echo validation_errors();?>
<form action="" method="post" class="form-horizontal">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
	<input type="hidden" name="operation" value="set">
		<div class="form-body">    		
            <div class="form-group">
				<label class="col-lg-2 control-label">Step1</label>
			    <div class="col-lg-10">Process Name, Process Description</div>
	        </div>
            <div class="form-group">
				<label class="col-lg-2 control-label">Step2</label>
			    <div class="col-lg-10">
<?php
$fieldString ='';
if(isset($form_data)&&!empty($form_data)){
	foreach($form_data as $set_form){
		if($set_form->level!=3){
			$fieldString .= $set_form->name.', ';
		}
	}
}
echo $fieldString;
?>

               	</div>
	        </div>
            <div class="form-group">
				<label class="col-lg-2 control-label">Step3</label>
			    <div class="col-lg-10">
<?php
$fieldString1 ='';
if(isset($form_data)&&!empty($form_data)){
	foreach($form_data as $set_form){
		if($set_form->level==3){
			$fieldString1 .= $set_form->name.', ';
		}
	}
}
echo $fieldString1;
?>

               	</div>
	        </div>
            <div class="form-group">
				<label class="col-lg-2 control-label">Step4</label>
			    <div class="col-lg-10">Editable, Visibale</div>
	        </div>
		</div>							

        <div style="clear:both"></div>

	<div class="form-actions">
<?php
if($set_level!=1){
?>
<button type="button" onclick="window.location='<?=$_cancel.'/step4/'.$id?>'" class="btn btn-success"><?=show_static_text($adminLangSession['lang_id'],360);?>Back</button>
<?php
}
?>        
		<button type="submit" class="btn btn-success pull-right"><?php echo 'Done';?></button>
	</div>
    
</form>


            </div>
        </div>
        <!-- end panel -->
    </div>
</div>

<link href="assets/admin_temp/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
