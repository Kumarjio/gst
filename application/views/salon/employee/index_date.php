<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>

<div class="panel-body">
    <div class="table-responsive" style="padding-top:10px">
    	<a href="<?=$_edit?>" class="btn green" style="margin-bottom:10px"><?=show_static_text($lang_id,233);?></a>
        
        <table class="table table-striped table-bordered table-hover" style="margin-top:10px;" id="data-table">
        <thead>
              <tr>
                    <th class=""><?=show_static_text($lang_id,16);?></th>
                    <th class=""><?=show_static_text($lang_id,1800);?>Day</th>
<!--                    <th class=""><?=show_static_text($lang_id,1800);?>Time</th>-->
                    <th class=""><?=show_static_text($lang_id,258);?></th>
            </tr>
        </thead>
<tbody>
<?php
if(isset($all_data)&&!empty($all_data)){
	foreach($all_data as $set_data){
		$days= '';
		$staffName = '-';
		$staff = $this->comman_model->get_by('users',array('id'=>$set_data->staff_id),false,false,true);
		if($staff){
			$staffName = $staff->username.' ('.$staff->email.')';
		}
		if($set_data->is_mon==1){
			$days .='Monday,';
		}
		if($set_data->is_tue==1){
			$days .='Tuesday,';
		}
		if($set_data->is_wed==1){
			$days .='Wednesday,';
		}
		if($set_data->is_thr==1){
			$days .='Thursday,';
		}
		if($set_data->is_fri==1){
			$days .='Friday,';
		}
		if($set_data->is_sun==1){
			$days .='Sunday,';
		}
		$days = trim($days,',');
?>
                  <tr id="tablerow">
                    <td class=""><?=$staffName;?></td>
                    <td class=""><?=$days;?> </td>
<!--                    <td class=""><?=$set_data->s_time.' to '.$set_data->e_time?> </td>-->
                    <td class="">
                            <a class="btn btn-icon-only btn-info" href="<?=$_edit.'/'.$set_data->id;?>" >
										<i class="fa fa-edit"></i></a>
                        <a class="btn btn-icon-only btn-danger" href="<?=$_delete.'/'.$set_data->id;?>"  onclick="return confirm_box();">
                                <i class="fa fa-trash-o"></i></a>
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