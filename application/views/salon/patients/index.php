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
			    <a href="<?=$_edit?>" class="btn btn-primary m-r-5 m-b-5"><?=show_static_text($lang_id,233);?> <i class="fa fa-plus"></i></a>
		    </div>
	    </div>    	
	    </div>
<div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="data-table">
        <thead>
              <tr>
                    <th class=""><?=show_static_text($lang_id,15300);?>ID</th>
                    <th class=""><?=show_static_text($lang_id,10055);?>Usename</th>
                    <th class=""><?=show_static_text($lang_id,10055);?>Description</th>
	                <th><?=show_static_text($lang_id,258);?></th>
            </tr>
        </thead>
<tbody>
<?php
if(isset($all_data)&&!empty($all_data)){
	foreach($all_data as $set_data){
?>
                  <tr id="tablerow_<?=$set_data->id?>">
                    <td class=""><?=$set_data->id;?></td>
                    <td class=""><?=$set_data->first_name.' '.$set_data->last_name;?></td>
                    <td class="">
<?php
$html = strip_tags($set_data->description);
$html = html_entity_decode($html, ENT_QUOTES, 'UTF-8');    
echo (strlen($html)>=400)?substr($html, 0 ,400).'...':$html;
?>                            
                    </td>
                    <td>
<a class="btn btn-icon-only btn-info" href="<?=$_edit?>/<?php echo $set_data->id;?>" ><i class="fa fa-edit"></i></a>
<a class="btn btn-icon-only btn-danger" href="<?=$_delete?>/<?php echo $set_data->id;?>"  onclick="return confirm_box();"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>

<?php	
	}
}
else{}
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