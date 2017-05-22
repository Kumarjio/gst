

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
        
        <table class="table table-striped table-bordered table-hover" style="margin-top:10px;" id="data-table">
        <thead>
              <tr>
                    <th class=""><?=show_static_text($lang_id,1600);?>S. No.</th>
                    <th class=""><?=show_static_text($lang_id,1600);?>Name</th>
                    <th class=""><?=show_static_text($lang_id,4001);?>Email</th>
                    <th class=""><?=show_static_text($lang_id,4001);?>Telphone</th>
                    <th class=""><?=show_static_text($lang_id,4001);?>Member</th>
                    <th class=""><?=show_static_text($lang_id,4001);?>Room</th>
                    <th class=""><?=show_static_text($lang_id,4001);?>Check In</th>
                    <th class=""><?=show_static_text($lang_id,4001);?>Check Out</th>
            </tr>
        </thead>
<tbody>
<?php
if(isset($all_data)&&!empty($all_data)){
	$i=0;
	foreach($all_data as $set_data){
		$i++;
?>
                  <tr id="tablerow">
                    <td class=""><?=$i;?></td>
                    <td class=""><?=$set_data->name;?></td>
                    <td class=""><?=$set_data->email?> </td>
                    <td class=""><?=$set_data->phone?> </td>
                    <td class=""><?=$set_data->member?> </td>
                    <td class=""><?=$set_data->room?> </td>
                    <td class=""><?=$set_data->check_in?> </td>
                    <td class=""><?=$set_data->check_out?> </td>
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