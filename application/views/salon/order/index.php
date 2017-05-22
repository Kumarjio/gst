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
                    <th class=""><?=show_static_text($lang_id,54);?></th>
                    <th class=""><?=show_static_text($lang_id,15300);?>Username</th>
                    <th class=""><?=show_static_text($lang_id,10055);?>Amount</th>
                    <th class=""><?=show_static_text($lang_id,150003);?>Payment Type</th>
                    <th class=""><?=show_static_text($lang_id,150003);?>Item</th>
                    <th class=""><?=show_static_text($lang_id,153);?></th>
                    <th class=""><?=show_static_text($lang_id,156);?></th>
            </tr>
        </thead>
<tbody>
<?php
if(isset($all_data)&&!empty($all_data)){
	foreach($all_data as $set_order){
		$userName = '-';
		$user_data = $this->comman_model->get_by('user_order_shipping_add',array('order_id'=>$set_order->id),false,false,true);
		if($user_data){
			$userName =$user_data->first_name.' '.$user_data->first_name.'<br>('.$user_data->email.')';
		}
		$tempS = '';
		$tempP = '';
		$items = $this->comman_model->get_by('user_order_items',array('order_id'=>$set_order->id),false,false,false);
		if($items){
			foreach($items as $setI){
				if($setI->type=="Service"){
					$tempS = 'Service';	
				}
				else{
					$tempP = 'Product';	
				}
			}
		}


?>
                  <tr id="tablerow_<?=$set_order->id?>">
                    <td class=""><?=$set_order->order_number?></td>
                    <td class=""><?=$userName?></td>
                    <td class=""><strong>$<?=$set_order->total?></strong></td>                    
                    <td class=""><?=$set_order->payment_type?></td>
                    <td class=""><?=(!empty($tempP)&&(!empty($tempS)))?$tempP.'+'.$tempS:$tempP.$tempS;?></td>
                    <td class=""><?=date('d/m/Y h:i A',$set_order->created)?></td>
                    <td class="">
						<a class="btn btn-icon-only btn-success " href="<?=$_cancel.'/review/'.$set_order->id;?>" ><i class="fa fa-star"></i></a>
						<a class="btn btn-icon-only btn-info " href="<?=$_view?>/<?=$set_order->id;?>" ><i class="fa fa-eye"></i></a>
						<a class="btn btn-icon-only btn-primary " href="<?=$_cancel.'/download/'.md5($set_order->id)?>" ><i class="fa fa-download"></i></a>

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
