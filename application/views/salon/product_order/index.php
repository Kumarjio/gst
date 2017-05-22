<style>
.table th{
	vertical-align:top !important;
}
</style>
<div class="page-title">
    <h1><?=$name?></h1>
</div>

<div class="portlet-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
        <thead>
              <tr>
                    <th class=""><?=show_static_text($lang_id,54);?></th>
                    <th class="">username</th>
                    <th class="">Product</th>
                    <th class="">Quantity</th>
                    <th class="">Price</th>
                    <th class=""><?=show_static_text($lang_id,153);?></th>
            </tr>
        </thead>
<tbody>
<?php
if(isset($my_orders)&&!empty($my_orders)){
	foreach($my_orders as $set_order){
		$order_data = $this->comman_model->get_by('user_orders',array('id'=>$set_order->product_id,'payment'=>1),false,false,true);
		if($order_data){
			$product_data = $this->comman_model->get_lang('products',$lang_id,NULL,array('id'=>$set_order->product_id),'product_id',true);
			$user_data = $this->comman_model->get_by('users',array('id'=>$order_data->user_id),false,false,true);

?>
                  <tr id="tablerow_<?=$set_order->id?>">
                    <td class=""><?=$order_data->order_number?></td>
                    <td class=""><?=!empty($user_data)?$user_data->first_name.' '.$user_data->last_name:'-'?></td>
                    <td class=""><?=!empty($product_data)?$product_data->title:'-'?></td>
                    <td class=""><?=$set_order->quantity;?></td>
                    <td class="">$<?=$set_order->price;?></td>
                    <td class=""><?=date('d-m-Y',$set_order->created)?></td>
                  </tr>

<?php	
		}
	}
}
else{
?>
<tr class="tr_orange">
<td align="center" class="alt_thumb" colspan="8"><?=show_static_text($lang_id,228);?></td>                                
</tr>
<?php
}
?>


</tbody>							
        </table>
        
    </div>
    
</div>
