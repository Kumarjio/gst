<style>
.table th{
	vertical-align:top !important;
}
</style>
<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>

<div class="panel-body">
    <div class="row">
	    <div class="col-md-6">
    		<div class="btn-group">
			    <a href="<?=$_edit?>" class="btn btn-primary m-r-5 m-b-5"><?=show_static_text($lang_id,233);?> <i class="fa fa-plus"></i></a>
		    </div>
	    </div>    	
	    </div>

    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-bordered">
        <thead>
              <tr>
                <th><?=show_static_text($lang_id,244);?></th>								
                <th><?=show_static_text($lang_id,2360);?>Product</th>
                <th><?=show_static_text($lang_id,2360);?>Quantity</th>
                <th><?=show_static_text($lang_id,2360);?>Tax</th>
                <th><?=show_static_text($lang_id,2360);?>Vat</th>
                <th><?=show_static_text($lang_id,258);?></th>
            </tr>
        </thead>
		<tbody>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){
		$productName ='-';
		$product  = $this->comman_model->get_lang('products',$lang_id,NULL,array('id'=>$set_data->product_id),'product_id',true);
		if($product){
			$productName =$product->title;
		}
		


?>
                        <tr>
							<td><?php echo $set_data->id; ?></td>
							<td> <?=$productName?></td>
							<td> <?=$set_data->quantity?></td>
							<td> <?=$set_data->vat?></td>
							<td> <?=$set_data->tax?></td>
                            
							<td>
<?php
if(!empty($set_data->{'file'})){
?>
								<a class="btn btn-icon-only btn-primary " href="<?=$_cancel.'/download/'.md5($set_data->id)?>" ><i class="fa fa-download"></i></a>
<?php
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

<script>
function get_active(name,id,value){
    $.ajax({
       type: "POST",
       url: "<?=$_cancel?>/product/get_active", /* The country id will be sent to this file */
       data: {id:id,type:name,value:value,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
       beforeSend: function () {
	      $("#show_class").html("Loading ...");
        },
       success: function(msg){
		 //alert(msg);
		//location.reload();
    	$("#show_class").html(msg);
       }
       });
}
function get_status(type,id,value){
	//alert(name+' '+id+' '+value);
    $.ajax({
       type: "POST",
       url: "<?=$_cancel?>/product/set_value", /* The country id will be sent to this file */
       data: {id:id,type:type,value:value,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
       beforeSend: function () {
	      $("#show_class").html("Loading ...");
        },
       success: function(msg){
		 //alert(msg);
		//location.reload();
    	$("#show_class").html(msg);
       }
       });
} 

function confirm_box(){
    var answer = confirm ("<?=show_static_text($lang_id,265);?>");
    if (!answer)
     return false;
}
</script>