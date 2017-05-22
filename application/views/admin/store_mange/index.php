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
                    <th width="180"><?=show_static_text($adminLangSession['lang_id'],258);?></th>
                </tr>
                </thead>
                <tbody>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){
	$CategoryName = '';
	if(!empty($set_data->department_id)){
		$arr = explode(',',$set_data->department_id);
		$this->db->where_in('id',$arr);
		$store_category = $this->comman_model->get_lang('departments',$adminLangSession['lang_id'],NULL,array('enabled'=>1),'department_id',false);
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
							<td><img src="<?=$image?>" class="img-rounded" style="width:30px;height:30px"> <?=$set_data->name; ?></td>
							<td><?=$CategoryName;?></td>
							<td><?=$userName; ?><br>(<?=$userEmail; ?>)</td>
							<td><?=round($total_rate,1); ?></td>
<!--							<td> <?=!empty($comment)?'<a href="'.$_cancel.'/review/'.$set_data->id.'">'.count($comment).' Reviews</a>':'No Review'?></td>-->
                            <td><input id="remember" name="remember" type="checkbox" onclick="get_status('feature',<?php echo $set_data->id;?>,this.value)" <?=$set_data->is_feature==1?'checked="checked"':''?>   /></td>

<td>
<?php 
$are_type= "get_status('online',".$set_data->id.",this.value)";
echo form_dropdown('online', array('1'=>'Online','0'=>'Offline'), $set_data->is_online, 'onchange="'.$are_type.'"'); ?>
</td>
							<td>

<a class="btn btn-icon-only btn-success " href="<?=$_edit?>/<?=$set_data->id;?>" ><i class="fa fa-edit"></i></a>
<a class="btn btn-icon-only btn-info " href="<?=$_cancel.'/send_mail/'.$set_data->id;?>" title="Send Mail" ><i class="fa fa-share"></i></a>
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