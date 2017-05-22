<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">         
                <h4 class="panel-title"><?=$name?></h4>
            </div>

<div class="panel-body">
    <div class="row">
	    <div class="col-md-6">
    		<div class="btn-group">
			    <a href="<?=$_cancel.'/create';?>" class="btn btn-primary m-r-5 m-b-5"><?=show_static_text($lang_id,233);?> <i class="fa fa-plus"></i></a>
		    </div>
	    </div>
	    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" style="margin-top:10px;" id="data-table">
        <thead>
              <tr>
                <th><?=show_static_text($lang_id,2044);?>S. No.</th>								
                <th><?=show_static_text($lang_id,16);?></th>
                <th><?=show_static_text($lang_id,18);?></th>
                <th><?=show_static_text($lang_id,258);?></th>
            </tr>
        </thead>
<tbody>
<?php
if(isset($all_data)&&!empty($all_data)){
	$i=0;
	foreach($all_data as $set_data){
		$i++;
?>
<tr>
    <td><?=$i; ?></td>
    <td><?=$set_data->first_name.' '.$set_data->last_name; ?></td>
    <td> <?=$set_data->email?></td>
    <td>
	    <a class="btn btn-icon-only btn-danger" href="<?=$_delete?>/<?php echo $set_data->id;?>"  onclick="return confirm_box();">
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

        <!-- end panel -->
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
