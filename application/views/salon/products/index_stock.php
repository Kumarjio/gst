<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">

<div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="data-table">
        <thead>
              <tr>
                    <th class=""><?=show_static_text($lang_id,15300);?>Product</th>
                    <th class=""><?=show_static_text($lang_id,10055);?>Quantity</th>
                    <th class=""><?=show_static_text($lang_id,10055);?>Date</th>
            </tr>
        </thead>
<tbody>
<?php
if(isset($all_data)&&!empty($all_data)){
	foreach($all_data as $set_data){
		$productName = '-';
		$user_data = $this->comman_model->get_lang('products',$lang_id,NULL,array('id'=>$set_data->product_id),'product_id',true);
		if($user_data){
			$productName =$user_data->title;
		}


?>
                  <tr id="tablerow_<?=$set_data->id?>">
                    <td class=""><?=$productName?></td>
                    <td class=""><strong style=" <?=$set_data->status==1?'color:#0C0':'color:#C00'?>;"><?=$set_data->qty?></strong></td>
                    <td class=""><?=date('d/m/Y h:i A',$set_data->created)?></td>                    
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
