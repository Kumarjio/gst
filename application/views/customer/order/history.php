<link href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css"  rel='stylesheet' type='text/css' >
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
	//$('&nbsp;').appendTo('div.dataTables_filter');
	//$('div.dataTables_filter').appendTo('<button id="refresh">Refresh</button>');
	$('#best_sellers_start').datepicker({ dateFormat: 'mm-dd-yy', altField: '#best_sellers_start_alt', altFormat: 'yy-mm-dd' });
	$('#best_sellers_end').datepicker({ dateFormat: 'mm-dd-yy', altField: '#best_sellers_end_alt', altFormat: 'yy-mm-dd' });

});
</script>

<style>
.table th{
	vertical-align:top !important;
}
</style>
		<div class="box-border" >

<div class="page-title" style="margin-bottom:10px;">
    <h1><?=$name?></h1>
</div>

<div class="portlet-body">
<div class="row">
	<div class="col-md-12 " style="margin-bottom:10px;">
        <form class="form-inline pull-left" action="" style="margin-right:5px">
        	<input type="hidden" name="type" value="date" />
			<input class="form-control" type="text" id="best_sellers_start" placeholder="Form" name="from"  data-date-format="yyyy-mm-dd" value="<?=$this->input->get('from');?>" />
			<input class="form-control" type="text" id="best_sellers_end" placeholder="To" name="to"  data-date-format="yyyy-mm-dd" value="<?=$this->input->get('to');?>"  />
			<input class="btn btn-warning" type="submit" value="Search" />
		</form>
        <a href="<?=$_cancel?>/order_history?type=daily" class="btn btn-warning m-r-5 m-b-5">Day</a>&nbsp;
		<a href="<?=$_cancel?>/order_history?type=monthly" class="btn btn-warning m-r-5 m-b-5">Monthly</a>&nbsp;
		<a href="<?=$_cancel?>/order_history" class="btn btn-warning m-r-5 m-b-5">All</a>&nbsp;
    </div>
</div>
    <div class="table-responsive">
	    <table class="table table-striped table-bordered table-hover">
        <thead>
              <tr>
                    <th class=""><?=show_static_text($lang_id,153);?></th>
                    <th class=""><?=show_static_text($lang_id,5993);?>Time</th>
                    <th class=""><?=show_static_text($lang_id,54);?></th>
                    <th class="">username</th>
                    <th class=""><?=show_static_text($lang_id,155);?></th>
                    <th class=""><?=show_static_text($lang_id,5005);?>Delivery</th>
                    <th class=""><?=show_static_text($lang_id,15005);?>Collection</th>
            </tr>
        </thead>
<tbody>
<?php
$totalAmount = 0;
if(isset($all_data)&&!empty($all_data)){
	foreach($all_data as $set_order){
		$user_data = $this->comman_model->get_by('users',array('id'=>$set_order->user_id),false,false,true);
		//$product_data = $this->comman_model->get_lang('products',$lang_id,NULL,array('id'=>$set_wishlist->product_id),'product_id',true);
		$checkReview  = $this->comman_model->get_by('stores_rating',array('order_id'=>$set_order->id),false,false,true);
		$totalAmount = $set_order->total+$totalAmount;
?>
                  <tr id="tablerow_<?=$set_order->id?>">
                    <td class=""><?=date('d-m-Y',$set_order->created)?></td>
                    <td class=""><?=date('H:i',$set_order->created)?></td>
                    <td class=""><?=$set_order->order_number?></td>
                    <td class=""><?=!empty($user_data)?$user_data->first_name.' '.$user_data->last_name:'-'?></td>                    
                    <td class="">
<?php
	echo '&pound;'.numberFormat($set_order->total);
?>
                    </td>                    


                    <td class=""><?=$set_order->payment_type=="cash"?'<i class="fa fa-check"></i>':'&nbsp;'?></td>                    
                    <td class=""><?=$set_order->payment_type=="paypal"?'<i class="fa fa-check"></i>':'&nbsp;'?></td>                    
                  </tr>

<?php	
	}
?>
<tr class="">
<td align="right" class="alt_thumb" colspan="4">Total</td>
<td align="" class="alt_thumb" colspan="4"><strong><?='&pound;'.numberFormat($totalAmount);?></strong></td>
</tr>
<?php
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
</div>
