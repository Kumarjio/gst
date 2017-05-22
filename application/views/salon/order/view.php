<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
        <thead>
              <tr>
                    <th class=""><?=show_static_text($lang_id,16);?></th>
                    <th class=""><?=show_static_text($lang_id,41);?></th>
                    <th class=""><?=show_static_text($lang_id,104);?></th>
                    <th class=""><?=show_static_text($lang_id,43);?></th>
                    <th class=""><?=show_static_text($lang_id,4300);?>Options</th>
            </tr>
        </thead>
<tbody>
<?php
if(isset($view_data)&&!empty($view_data)){
	$total =0;
	$totalShipping = 0;
	foreach($view_data as $set_data){		
		$options = unserialize($set_data->order_content);		
		$checkReview = $this->comman_model->get_by('products_review',array('product_id'=>$set_data->product_id,'user_id'=>$user_details->id,'book_id'=>$set_data->order_id),false,false,false);

		$product_data = $this->comman_model->get_lang('products',$lang_id,NULL,array('id'=>$set_data->product_id),'product_id',true);
		$total = $total +($set_data->price*$set_data->quantity);
		
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
if(isset($options['user_date'])){
?>
<ul class="list-unstyled">
<?php
	echo '<li>'.$options['user_date'].' '.$options['user_time'].'</li>';
?>
</ul>
<?php
}
if($checkReview){
?>
<?php
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
	echo '<li>+<b>'.$setFree['qty'].'X</b> '.$setFree['name'].'&nbsp;&nbsp;&nbsp;$'.($setFree['price']*$setFree['qty']).'</li>';
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
	echo '$'.numberFormat($set_data->price);
?>
	  
    </td>
    <td class="">
      <?=$set_data->quantity?>
    </td>
    <td class="">
    
<?php
echo '$'.numberFormat($set_data->price*$set_data->quantity);
?>
    
 
      
    </td>
    <td>
<?php
if($set_data->type=='Service'){
?>
<select onchange="get_resign(<?php echo $set_data->id;?>,this.value)" name="martial_id">
    <option value="0">Get allotment</option>
<?php
if(isset($employee_data)&&!empty($employee_data)){
	foreach($employee_data as $set_employee){
?>
	<option value="<?=$set_employee->id?>" <?=$set_data->staff_id==$set_employee->id?'selected="selected"':'';?>  ><?=$set_employee->first_name.' '.$set_employee->first_name;?></option>
<?php
	}
}
?>
</select>
<?php
}
?>
<br>
<?php
if($set_data->is_done==0){
?>
<a  href="<?=$_cancel.'/get_status/'.$set_data->id.'/cancel'?>" >Get Cancel</a> Or
<a  href="<?=$_cancel.'/get_status/'.$set_data->id.'/done'?>" >Get Done</a> 
<?php
}
else{
	if($set_data->is_done==1){
		if($options['product_type']=='Service'){
?>
<a  href="<?=$_cancel.'/upload_image/'.$set_data->id?>" >Upload Image</a>
<?php
		}
	}
	else{
		echo 'Cancel';
	}
}
?>
	</td>

  </tr>

<?php	
	}
?>
<?php
if($order_details->coupon_cost>0){
?>
							<tr>
							<td colspan="3" align="right" class="text-right" ><?=show_static_text($lang_id,121);?></td>
							<td>- <?='$'.$order_details->coupon_cost;?></td>
                            <td>&nbsp;</td>
						</tr>
<?php
}
?>
						
						<tr>
							<td colspan="3" align="right" class="text-right" ><?=show_static_text($lang_id,43);?></td>
							<td>
<?php
	if((($total+$order_details->shipping_cost)-$order_details->coupon_cost)>0){
		echo '$'.numberFormat(($total+$order_details->shipping_cost)-$order_details->coupon_cost);
	}
	else{
		echo '$0.00';
	}
?>

                            </td>
                            <td>&nbsp;</td>
						</tr>

<?php
if($order_details->comment){
?>
    <tr>
        <td colspan="5" align="center" style="text-align:center"><strong><?=show_static_text($lang_id,122);?></strong></td>
    </tr>
    <tr>
        <td colspan="5" align="left"><?=$order_details->comment;?></td>
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
		<h3>User Details</h3>
        <hr>
    <div class="">
<dl class="dl-horizontal">
    <dt>User</dt>
    <dd class="show-status"><?=$user_data->first_name.' '.$user_data->last_name?></dd>
    <dt>Email</dt>
    <dd class="show-status"><?=$user_data->email?></dd>
    <dt>Address</dt>
    <dd class="show-status"><?=$user_data->address?></dd>
    <dt>city</dt>
    <dd class="show-status"><?=print_value('cities',array('id'=>$user_data->city),'name');?></dd>
    <dt>Country</dt>
    <dd class="show-status"><?=$user_data->country?></dd>
    <dt>Phone</dt>
    <dd class="show-status"><?=$user_data->phone?></dd>
</dl>
	</div>                        

            </div>
        </div>
        <!-- end panel -->
    </div>

</div>
<script>
function get_resign(id,value){
	//alert(name+' '+id+' '+value);
    $.ajax({
       type: "POST",
       url: "<?=$_cancel?>/ajax_resign",
       data: {id:id,staff_id:value,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
       beforeSend: function () {
	      $("#show_class").html("Loading ...");
        },
       success: function(msg){
		   if(msg.status=='error'){
			   alert('Sorry!! There is some problem.');
		   }
		 //alert(msg);
		//location.reload();
    	$("#show_class").html(msg);
       }
       });
} 

</script>
