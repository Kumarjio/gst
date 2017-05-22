
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
    <table id="data-table" class="table table-striped table-bordered">
        <thead>
              <tr>
                    <th class=""><?=show_static_text($lang_id,54);?></th>
                    <th class="">username</th>
                    <th class=""><?=show_static_text($lang_id,153);?></th>
                    <th class=""><?=show_static_text($lang_id,155);?></th>
                    <th class=""><?=show_static_text($lang_id,156);?></th>
            </tr>
        </thead>
    	<tbody>
<?php
if(isset($my_orders)&&!empty($my_orders)){
foreach($my_orders as $set_order){
    $user_data = $this->comman_model->get_by('users',array('id'=>$set_order->user_id),false,false,true);
    //$product_data = $this->comman_model->get_lang('products',$lang_id,NULL,array('id'=>$set_wishlist->product_id),'product_id',true);
    $checkReview  = $this->comman_model->get_by('stores_rating',array('order_id'=>$set_order->id),false,false,true);
?>
              <tr id="tablerow_<?=$set_order->id?>">
                <td class=""><?=$set_order->order_number?></td>
                <td class=""><?=!empty($user_data)?$user_data->first_name.' '.$user_data->last_name:'-'?></td>
                <td class=""><?=date('d-m-Y',$set_order->created)?></td>
                
                <td class=""><?='&pound;'.numberFormat($set_order->total);?></td>
                <td class="">
                  <?php /*?><a class="del-goods" href="javascript:void(0);" onclick="deletewishlist('tablerow_<?=$set_wishlist->id?>','<?=$set_wishlist->id?>')">&nbsp;</a><?php */?>
                  <a  href="<?=$lang_code?>/partner/order_view/<?=$set_order->id?>" ><?=show_static_text($lang_id,28);?></a>&nbsp;&nbsp;&nbsp;
<!--                      <a  href="<?=$lang_code?>/partner/download_order/<?=$set_order->id?>" >Download Pdf</a>&nbsp;&nbsp;&nbsp;-->
                  <a  href="assets/pdf/<?=$set_order->order_number?>.pdf" target="_blank" >View PDF</a>&nbsp;&nbsp;&nbsp;
<?php
if($checkReview){
?>
                  <a  href="<?=$lang_code?>/partner/order_review/<?=$set_order->id?>" >Review</a>
<?php
}
?>
                  
                </td>
              </tr>

<?php	
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

<div style="clear:both"></div>
</div>
