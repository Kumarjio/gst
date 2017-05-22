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
			    <a href="<?=$_add;?>" class="btn btn-primary m-r-5 m-b-5"><?=show_static_text($adminLangSession['lang_id'],233);?> <i class="fa fa-plus"></i></a>
		    </div>
	    </div>
	    </div>

    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th><?=show_static_text($adminLangSession['lang_id'],244);?></th>								
                    <th width="180"><?=show_static_text($adminLangSession['lang_id'],5550);?>Room Number</th>
                    <th width="180"><?=show_static_text($adminLangSession['lang_id'],5505);?>Price Per Day</th>
                    <th><?=show_static_text($adminLangSession['lang_id'],555);?>Room Type</th>
<!--                    <th><?=show_static_text($adminLangSession['lang_id'],555);?>Default</th>-->
                    <th width="180"><?=show_static_text($adminLangSession['lang_id'],258);?></th>
                </tr>
                </thead>
                <tbody>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){
	$CategoryName = '';
	if(!empty($set_data->tag_id)){
		$arr = explode(',',$set_data->tag_id);
		$this->db->where_in('id',$arr);
		$store_category = $this->comman_model->get_lang('tags',$adminLangSession['lang_id'],NULL,false,'tag_id',false);
		if($store_category){
			foreach($store_category as $set_scat){
				$CategoryName .= $set_scat->title.', ';
			}
		}
		$CategoryName = rtrim($CategoryName,', ');
	}

?>
                        <tr>
							<td><?=$set_data->id; ?></td>
							<td><?=$set_data->room; ?></td>
							<td><?=$set_data->price; ?></td>
							<td><?=$CategoryName;?></td>
<!--                    <td><?=($set_data->default == 1)?'<i class="fa fa-check"></i>':''?></td>
-->
							<td>

<a class="btn btn-icon-only btn-success " href="<?=$_edit?>/<?=$set_data->id;?>" ><i class="fa fa-edit"></i></a>
<a class="btn btn-icon-only btn-danger" href="<?=$_delete?>/<?=$set_data->id;?>"  onclick="return confirm_box();" ><i class="fa fa-trash-o"></i></a>

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
function confirm_box(){
    var answer = confirm ("<?=show_static_text($adminLangSession['lang_id'],265);?>");
    if (!answer)
     return false;
}
function get_status(type,id,value){
	//alert(name+' '+id+' '+value);
    $.ajax({
       type: "POST",
       url: "<?=$_cancel?>/set_value", /* The country id will be sent to this file */
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
</script>
<style>
table td{
	padding:10px 3px !important;
}
</style>