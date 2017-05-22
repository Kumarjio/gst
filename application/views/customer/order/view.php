
<style>
.table th{
	vertical-align:top !important;
}
</style>
		<div class="box-border" >

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
		$storeName = '-';
		if(!empty($set_data->shipping_cost)){
			$totalShipping = $totalShipping+$set_data->shipping_cost;
		}
		$options = unserialize($set_data->order_content);
		$product_data = $this->comman_model->get_lang('products',$lang_id,NULL,array('id'=>$set_data->product_id),'product_id',true);
		$total = $total +($set_data->price*$set_data->quantity);
		$store_data=$this->comman_model->get_by('stores',array('id'=>$product_data->store_id),false,false,true);
		if($store_data){
			$storeName = '<a href="'.$lang_code.'/restaurant/'.$store_data->id.'" >'.$store_data->name.'</a>';
		}
		
?>
  <tr id="tablerow_<?=$set_data->id?>">
    <td class="">
<?php
if($product_data){
	echo $product_data->title;
}
else{
	echo $options['productName'];
}
//echo '<br>'.$storeName;

?>

<?php
if(isset($options['product_free_items'])){
	$freeOption = explode(', ',$options['product_free_items']);
	if($freeOption){
?>
<ul class="list-unstyled">
<?php
foreach($freeOption as $setFree){
	echo '<li>'.$setFree.'</li>';
}
?>
</ul>
<?php
	}
}
?>

<?php
if(isset($options['extra_option'])){
	$extraOption = unserialize($options['extra_option']);
	if($extraOption){
/*		echo '<pre>';
		print_r($extraOption);
		echo '</pre>';*/
?>
<ul class="list-unstyled">
<?php
foreach($extraOption as $setFree){
	echo '<li>+<b>'.$setFree['qty'].'X</b> '.$setFree['name'].'&nbsp;&nbsp;&nbsp;&pound;'.($setFree['price']*$setFree['qty']).'</li>';
}
?>
</ul>
<?php
	}
}
?>


    </td>
    
    <td class="">
      
<?php
	echo '&pound;'.numberFormat($set_data->price);
?>
	  
    </td>
    <td class="">
      <?=$set_data->quantity?>
    </td>
    <td class="">
    
<?php
echo '&pound;'.numberFormat($set_data->price*$set_data->quantity);
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
echo '&pound;'.numberFormat($total);
?>
                            </td>
						</tr>
						<tr>
							<td colspan="3" align="right" class="text-right" >Delivery Fee<?=show_static_text($lang_id,999);?></td>
							<td><?='&pound;'.numberFormat($order_details->shipping_cost);?></td>
						</tr>
						<tr>
							<td colspan="3" align="right" class="text-right" ><?=show_static_text($lang_id,121);?></td>
							<td>- <?='&pound;'.numberFormat($order_details->coupon_cost);?></td>
						</tr>
						
						<tr>
							<td colspan="3" align="right" class="text-right" ><?=show_static_text($lang_id,43);?></td>
							<td>
<?php
	echo '&pound;'.numberFormat(($total+$order_details->shipping_cost)-$order_details->coupon_cost);
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


    <h1>Order History</h1>
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
        
        <div class="portlet light bordered">                                            
                                            <div class="portlet-body form">
        
        <div class="alert alert-block alert-success fade in ajax-error" style="display:none">
        </div>
                                                <!-- BEGIN FORM-->
                        <?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form','enctype'=>"multipart/form-data",'id'=>'contact_form'))?>
                            <input type="hidden" name="operation" value="set" />
                            <input type="hidden" name="order_id" value="<?=$order_id?>"  id="order_id"/>
                             <div class="form-body">                    
                                <div class="col-md-12">
                            
                        
        
                        <div class="form-group" >
                          <label class="col-lg-2 control-label"><?=show_static_text($lang_id,158);?></label>
                          <div class="col-lg-10">
                                <select class="form-control" id="order_status" name="order_status">
                                    <option value="Canceled">Canceled</option>
                                    <option value="Complete">Complete</option>
                                    <option value="Failed">Failed</option>
                                    <option value="Pending">Pending</option>
                                    <option selected="selected" value="Processed">Processed</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Shipped">Shipped</option>
                                    <option value="Voided">Voided</option>
                                </select>
                          </div>
                        </div>
                        <div class="form-group" >
                          <label class="col-lg-2 control-label"><?=lang('')?><?=show_static_text($lang_id,281);?></label>
                          <div class="col-lg-1" style="padding-top:10px;">
                                <input type="checkbox" class="" id="notify" name="notify" value="1" />
                          </div>
                        </div>
                        <div class="form-group" >
                          <label class="col-lg-2 control-label"><?=lang('')?><?=show_static_text($lang_id,157);?></label>
                          <div class="col-lg-10">
                            <?=form_textarea('comment', set_value('comment'), 'placeholder="Comment" rows="3" class="form-control" id="comments"')?>
                          </div>
                        </div>
                    </div>
                    
                       <div style="clear:both"></div>
                                </div>
                             <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-2 col-md-9">
                                            <?=form_submit('submit', show_static_text($lang_id,235), 'class="btn btn-primary"')?>
                                            <!--<button type="button" class="btn default">Cancl</button>-->
                                        </div>
                                    </div>
                                </div>
                         <?=form_close()?>
                                                <!-- END FORM-->
                                            </div>
                                        </div>             
        
    </div>
    
</div>
</div>



<style>
.list-unstyled li{
	padding-left:15px;
}

</style>