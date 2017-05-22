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
                    <th class=""><?=show_static_text($lang_id,6);?></th>
                    <th class=""><?=show_static_text($lang_id,360);?></th>
                    <th class=""><?=show_static_text($lang_id,157);?></th>
                    <th class=""><?=show_static_text($lang_id,258);?></th>
            </tr>
        </thead>
<tbody>
<?php
if(isset($all_data)&&!empty($all_data)){
	foreach($all_data as $set_data){
		$options= unserialize($set_data->order_content);
		$productName = print_lang_value('products',$lang_id,array('id'=>$set_data->product_id),'product_id','title',$options['productName']);
		$order = $this->comman_model->get_by('user_orders',array('id'=>$set_data->order_id),false,false,true);
		$review = $this->comman_model->get_by('products_review',array('product_id'=>$set_data->product_id,'book_id'=>$set_data->id),false,false,true);
		//$product_data = $this->comman_model->get_lang('products',$lang_id,NULL,array('id'=>$set_wishlist->product_id),'product_id',true);
//		$checkReview  = $this->comman_model->get_by('stores_rating',array('order_id'=>$set_data->id,'user_id'=>$user_details->id),false,false,true);
?>
                  <tr id="tablerow_<?=$set_data->id?>">
                    <td class=""><?=$productName?><?=!empty($order)?'<br>('.$order->order_number.')':'';?></td>
                    
                    <td class=""><?=$review?$review->rate:''?></td>
                    <td class=""><?=$review?$review->comment:''?></td>
					<td class="">
<?php
if($set_data->is_done==1){
	if(!$review){
?>
                <a class="btn btn-icon-only btn-info " href="<?=$_cancel.'/edit/'.$set_data->id?>" ><i class="fa fa-star"></i></a>
<?php
	}
}
?>
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
