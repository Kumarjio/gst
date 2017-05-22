<style>
.table th{
	vertical-align:top !important;
}
.table .text-right{
	text-align:right;
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
                    <th class=""><?=show_static_text($lang_id,16);?></th>
                    <th class=""><?=show_static_text($lang_id,41);?></th>
                    <th class=""><?=show_static_text($lang_id,104);?></th>
                    <th class=""><?=show_static_text($lang_id,43);?></th>
            </tr>
        </thead>
<tbody>
<?php
if(isset($view_data)&&!empty($view_data)){
	$total =0;
	$totalShipping = 0;
	foreach($view_data as $set_data){
		if(!empty($set_data->shipping_cost)){
			$totalShipping = $totalShipping+$set_data->shipping_cost;
		}

		$options = unserialize($set_data->order_content);
		$product_data = $this->comman_model->get_lang('products',$lang_id,NULL,array('id'=>$set_data->product_id),'product_id',true);
		$total = $total +($set_data->price*$set_data->quantity);

		$attributes = unserialize($options['attributes']);
		$attributesString ='';
		if($attributes){
			foreach($attributes as $setAttr){
				$attributesString .= '<b>'.$setAttr['field'].' : </b> '.$setAttr['value'].'<br>';
			}
		}
		
?>
  <tr id="tablerow_<?=$set_data->id?>">
    <td class="">
<?php
if($product_data){
?>    
<img src="<?= !empty($product_data->image)?'assets/uploads/products/'.$product_data->image:'assets/uploads/no-image.gif';?>" alt="<?=$product_data->title;?>" style="height:30px;width:30px">
<a href="<?=$lang_code?>/shop/<?=$product_data->slug?>"><?=$product_data->title;?></a>
<?php
}
else{
echo $options['productName'];
}
echo '<br>'.$attributesString;

?>
    </td>
    
    <td class="">
      
<?php
	echo '$'.$set_data->price;
?>
	  
    </td>
    <td class="">
      <?=$set_data->quantity?>
    </td>
    <td class="">
    
<?php
echo '$'.($set_data->price*$set_data->quantity);
?>
    
 
      
    </td>
  </tr>

<?php	
	}
?>
						
						<tr>
							<td colspan="3" align="right" class="text-right" ><?=show_static_text($lang_id,119);?></td>
							<td>
<?php
echo '$'.$total;
?>
                            </td>
						</tr>
						<tr>
							<td colspan="3" align="right" class="text-right" ><?=show_static_text($lang_id,149);?></td>
							<td><?='$'.$order_details->shipping_cost;?></td>
						</tr>

						<tr>
							<td colspan="3" align="right" class="text-right" ><?=show_static_text($lang_id,121);?></td>
							<td>- <?='$'.$order_details->coupon_cost;?></td>
						</tr>
						
						<tr>
							<td colspan="3" align="right" class="text-right" ><?=show_static_text($lang_id,43);?></td>
							<td>
<?php
	echo '$'.(($total+$order_details->shipping_cost)-$order_details->coupon_cost);
?>

                            </td>
						</tr>

<?php
if($order_details->comment){
?>
    <tr>
        <td colspan="4" align="center" style="text-align:center"><strong><?=show_static_text($lang_id,122);?></strong></td>
    </tr>
    <tr>
        <td colspan="4" align="left"><?=$order_details->comment;?></td>
    </tr>
<?php
}
?>		
<?php
}
else{
?>
<tr class="tr_orange">
<td align="center" class="alt_thumb" colspan="5">There is no data.</td>                                
</tr>
<?php
}
?>


</tbody>							
        </table>

    </div>
		<h3><?=show_static_text($lang_id,152);?></h3>
        <hr>
    <div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th><?=show_static_text($lang_id,153);?></th>
                    <th><?=show_static_text($lang_id,157);?></th>
                    <th><?=show_static_text($lang_id,158);?></th>
                </tr>
                </thead>
                <tbody>
<?php
if(isset($order_history_data)&&!empty($order_history_data)){
	foreach($order_history_data as $set_data){
?>
						<tr>
							<td><?=date('d-m-Y',strtotime($set_data->date_added)); ?></td>
							<td><?=$set_data->comment;?></td>
							<td><?=$set_data->order_status;?></td>
						</tr>
<?php		
	}
}
?>                    
						
					</tbody>
                </table>
	</div>                        
    
</div>
