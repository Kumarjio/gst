
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
	<input type="hidden" name="operation" value="set"  /> 
	<!-- Text input-->
    <div class="form-group">
<label class="col-sm-2 control-label" for="textinput">Plan</label>
<div class="col-sm-10">
    <select name="plan" class="form-control">
        <option value="">Select</option>
<?php
if(isset($plan_data)&&!empty($plan_data)){
foreach($plan_data as $set_data){
echo '<option value="'.$set_data->id.'">'.$set_data->name.' ( '.$set_data->member.' member(s) $'.$set_data->price.' for '.$set_data->month.' months )</option>';
}		
}
?>
    
    </select>
</div>

</div>
     <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-2 col-md-9">
                    <?=form_submit('submit','Upgrade' , 'class="btn btn-primary"')?>
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
