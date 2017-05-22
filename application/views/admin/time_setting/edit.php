<?php
$day = date('l');
$monDisabled = '';
$tueDisabled = '';
$wedDisabled = '';
$thrDisabled = '';
$friDisabled = '';
$satDisabled = '';
$sunDisabled = '';
if($day=='Monday'){
	$monDisabled='disabled ="disabled"';
}
if($day=='Tuesday'){
	$tueDisabled='disabled ="disabled"';
}
if($day=='Wednesday'){
	$wedDisabled='disabled ="disabled"';
}
if($day=='Thrusday'){
	$thrDisabled='disabled ="disabled"';
}
if($day=='Friday'){
	$friDisabled='disabled ="disabled"';
}
if($day=='Saturday'){
	$satDisabled='disabled ="disabled"';
}
if($day=='Sunday'){
	$sunDisabled='disabled ="disabled"';
}

?>
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

				<div class="form-group" >
                    <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],8900);?>Day</label>
                    <div class="col-lg-10">
<div class="checkbox-list" style="margin-left:3px">
                        <label class="checkbox-inline">
<?=form_checkbox('is_mon', '1', set_value('is_mon', $products->is_mon), 'id="inputDefault" class=""  '.$monDisabled)?>
                          Monday</label>

                        <label class="checkbox-inline">
<?=form_checkbox('is_tue', '1', set_value('is_tue', $products->is_tue), 'id="inputDefault" class="" '.$tueDisabled)?>
                         Tuesday</label>                                                

                        <label class="checkbox-inline">
<?=form_checkbox('is_wed', '1', set_value('is_wed', $products->is_wed), 'id="inputDefault" class="" '.$wedDisabled)?>
                         Wednesday</label>

                        <label class="checkbox-inline">
<?=form_checkbox('is_thr', '1', set_value('is_thr', $products->is_thr), 'id="inputDefault" class="" '.$thrDisabled)?>
                         Thrusday</label>

                        <label class="checkbox-inline">
<?=form_checkbox('is_fri', '1', set_value('is_fri', $products->is_fri), 'id="inputDefault" class="" '.$friDisabled)?>
                         Friday</label>

                        <label class="checkbox-inline">
<?=form_checkbox('is_sat', '1', set_value('is_sat', $products->is_sat), 'id="inputDefault" class="" '.$satDisabled)?>
                         Saturday</label>

                        <label class="checkbox-inline">
<?=form_checkbox('is_sun', '1', set_value('is_sun', $products->is_sun), 'id="inputDefault" class="" '.$sunDisabled)?>
                         Sunday</label>

                        
                    </div>
                    </div>
                </div>
                
              <div class="form-group" >
<label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],8900);?>Stat Time</label>
<div class="col-lg-10">
<select name="start_time" class="form-control">
<?php
for($i=1;$i<=11;$i++){
?>
	<option value="<?=$i?>" <?=$products->start_time==$i?'selected="selected"':''?> ><?=$i?></option>
<?php	
}
?>
</select>
</div>
</div>

              <div class="form-group" >
<label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],8900);?>End Time</label>
<div class="col-lg-10">
<select name="end_time" class="form-control">
<?php
for($i=12;$i<=23;$i++){
?>
	<option value="<?=$i?>" <?=$products->end_time==$i?'selected="selected"':''?> ><?=$i?></option>
<?php	
}
?>
</select>
</div>
</div>
				
			</div>
            
               <div style="clear:both"></div>

                        
                        

						</div>
	                 <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-9">
                                    <?=form_submit('submit', show_static_text($adminLangSession['lang_id'],235), 'class="btn btn-primary"')?>
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


