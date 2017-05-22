

<style>
.table th{
	vertical-align:top !important;
}
</style>
		<div class="box-border" >

<div class="page-title">
	<h3 style="color:#666666;border-bottom:1px solid #e7e7e7;padding-bottom:10px"><?=$name;?></h3>
</div>
<div class="portlet-body">
    <div class="table-responsive" style="padding-top:10px">
    	<a href="<?=$_cancel.'/edit'?>" class="btn green" style="margin-bottom:10px"><?=show_static_text($lang_id,233);?></a>
        
        <table class="table table-striped table-bordered table-hover" style="margin-top:10px;" id="data-table">
        <thead>
              <tr>
                    <th class=""><?=show_static_text($lang_id,1060);?>Title</th>
                    <th class=""><?=show_static_text($lang_id,4001);?>Description</th>
                    <th class=""><?=show_static_text($lang_id,4001);?>Date</th>
                    <th class=""><?=show_static_text($lang_id,258);?></th>
            </tr>
        </thead>
<tbody>
<?php
if(isset($all_data)&&!empty($all_data)){
	foreach($all_data as $set_data){
		$category = $this->comman_model->get_by('tickets_category',array('id'=>$set_data->category_id),false,false,true);
?>
    <tr>
        <td><?=$set_data->name; ?></td>
        <td><?=$set_data->desc; ?></td>
        <td><?=$set_data->dates; ?></td>
        <td>        
        <a class="btn btn-icon-only green tooltips" href="<?=$_edit.'/'.$set_data->id;?>" title="Edit" data-original-title="Edit" data-placement="top">
                    <i class="fa fa-edit"></i></a>

        </td>							
    </tr>
<?php             
   }
}
else{
?>
<!--<tr class="">
<td align="center" colspan="4"><?=show_static_text($lang_id,228);?></td>
</tr>-->
<script>
$(document).ready(function(){
	setTimeout(function(){		
		//alert('as');
		$('.dataTables_empty').html("<?=show_static_text($lang_id,228);?>");
	}, 5000);
});
</script>
<?php
}
?>


</tbody>							
        </table>
        <div style="clear:both"></div>
        
    </div>
    
</div>
</div>
<link href="assets/admin_temp/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<script src="assets/admin_temp/plugins/DataTables/js/jquery.dataTables.js"></script>
<script>
$('#data-table').DataTable();
</script>

<script>
function confirm_box(){
    var answer = confirm ("<?=show_static_text($lang_id,265);?>");
    if (!answer)
     return false;
}
</script>
<style>
table a{
	color:#CE0B10;
}
</style>