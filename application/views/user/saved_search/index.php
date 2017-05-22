<style>
.table th{
	vertical-align:top !important;
}
</style>
<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>

<div class="panel-body">
    <div class="table-responsive">


<table id="data-table" class="table table-striped table-hover">
        <thead>
              <tr>
                <th><?=show_static_text($lang_id,1050);?>S.No.</th>								
                <th><?=show_static_text($lang_id,1600);?>Type</th>
                <th><?=show_static_text($lang_id,1006);?>Url</th>
                <th><?=show_static_text($lang_id,1006);?>Date</th>
                <th><?=show_static_text($lang_id,258);?></th>
            </tr>
        </thead>
		<tbody>

<?php
if(count($all_data)){
	$i=0;
	foreach($all_data as $set_data){
		$i++;
		
?>
<tr>
    <td><?=$i;?></td>
	<td><?=$set_data->type?></td>
	<td><a href="<?=$set_data->url?>" target="_blank">Click Here</a></td>
	<td><?=date('d-m-Y',$set_data->created);?></td>

    <td>
        <a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" href="<?=$_delete.'/'.$set_data->id;?>"  onclick="return confirm_box();">
            <i class="fa fa-trash-o"></i></a>

    </td>    
</tr>

<?php             
   }
}
?>                        

</tbody>							
        </table>
    </div>    
    </div>
</div>

        <!-- end panel -->
    </div>
</div>

<link href="assets/admin_temp/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<script src="assets/admin_temp/plugins/DataTables/js/jquery.dataTables.js"></script>

<script>
$('#data-table').DataTable( {
	"bSort": false,
} );

</script>

<script>
function confirm_box(){
    var answer = confirm ("<?=show_static_text($lang_id,265);?>");
    if (!answer)
     return false;
}
</script>