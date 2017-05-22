<link href="assets/global/css/star.css" rel="stylesheet" />
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
                    <th class=""><?=show_static_text($lang_id,10004);?>Rating</th>
                    <th class=""><?=show_static_text($lang_id,4300);?>Comment</th>
            </tr>
        </thead>
<tbody>
<?php
if(isset($view_data)&&!empty($view_data)){
	$total =0;
	$totalShipping = 0;
	foreach($view_data as $set_data){		
		$options = unserialize($set_data->order_content);		
		$checkReview = $this->comman_model->get_by('products_review',array('product_id'=>$set_data->product_id,'user_id'=>$order_details->user_id,'book_id'=>$set_data->order_id),false,false,true);
		//echo $this->db->last_query();
		$product_data = $this->comman_model->get_lang('products',$lang_id,NULL,array('id'=>$set_data->product_id),'product_id',true);		
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


    </td>
    
    <td class="">
<?php
if($checkReview){
?>
<div class="item-rating store" >
    <div class="star_content clearfix">
        <div class="star <?=$checkReview->rate>=1?'star_on':''?>"></div>
        <div class="star <?=$checkReview->rate>=2?'star_on':''?>"></div>
        <div class="star <?=$checkReview->rate>=3?'star_on':''?>"></div>
        <div class="star <?=$checkReview->rate>=4?'star_on':''?>"></div>
        <div class="star <?=$checkReview->rate>=5?'star_on':''?>" ></div>
    </div> 
</div>
<?php
}
else{
echo '-';
}
?>
    </td>
    <td class="">
<?php
if($checkReview){
	echo $checkReview->comment;
}
else{
	echo '-';
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
<td align="center" class="alt_thumb" colspan="4">There is no data.</td>
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
