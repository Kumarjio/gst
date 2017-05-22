
<style>
.table th{
	vertical-align:top !important;
}
</style>
		<div class="box-border" >

<div class="page-title">
    <h1><?=$name?></h1>
</div>

<div class="portlet-body">
<ul class="nav nav-tabs">
    <li class="active"><a href="javascript:void(0)">Excel File</a></li>
    <li class=""><a href="<?=$_cancel.'/excel_data/';?>" >Excel Data</a></li>
</ul>	    
<div class="tab-content" style="padding:10px 0">
    <div id="step-1" class="tab-pane fade active in">
	    <div class="table-responsive">
    	<a href="<?=$_cancel.'/import'?>" class="btn green" style="margin-bottom:10px"><?=show_static_text($lang_id,2330);?>Import File</a>
    <table id="data-table" class="table table-striped table-bordered">
        <thead>
              <tr>
                    <th><?=show_static_text($lang_id,244);?></th>								
                    <th>Saved Date</th>
                    <th>OPtion</th>
            </tr>
        </thead>
    	<tbody>
<?php
if(count($all_data)){
	$i=0;
	foreach($all_data as $set_data){
		$i++
?>
    <tr>
        <td><?=$i; ?></td>
        <td><?=date("d-m-Y", strtotime($set_data->{'date'}));?></td>
	    <td><a class="btn btn-icon-only btn-danger" href="<?=$_delete.'/'.$set_data->{'date'};?>"  onclick="return confirm_box();" ><i class="fa fa-trash-o"></i></a></td>
    </tr>
<?php             
   }
}
?>                        
</tbody>
    </table>
    </div>
    </div>
</div><!--//tab-content//-->    
    </div>

<div style="clear:both"></div>
</div>
<script>
function confirm_box(){
    var answer = confirm ("<?=show_static_text($lang_id,265);?>");
    if (!answer)
     return false;
}
</script>
