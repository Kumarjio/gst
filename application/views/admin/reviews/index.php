<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>

<div class="panel-body">
    <div class="table-responsive">

<table id="data-table" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Rate</th>
        <th>Comment</th>
        <th>Date</th>
        <th>Status</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>

<?php
if($all_data){
	foreach($all_data as $set_data){
?>
            <tr>
                <td><?=$set_data->id;?></td>
                <td><?=print_value('users',array('id'=>$set_data->user_id),'username');?></td>
                <td><?=$set_data->rate;?></td>
                <td><?=$set_data->comment;?></td>
                <td><?=date('d-m-Y',$set_data->created);?></td>
<td>
                <select onchange="get_status(<?php echo $set_data->id;?>,'enabled',this.value)" name="martial_id">
<?php 
if($set_data->enabled==1){
echo '<option selected="selected" value="1">Active</option>';
echo '<option value="0">Inactive</option>';
}
else{
echo '<option value="1">Active</option>';
echo '<option selected="selected" value="0">Inactive</option>';
}
?>
                    </select>
</td>
<td>                    
                    <a href="<?=$_cancel?>/delete/<?=$set_data->id;?>"  class="btn btn-warning" onclick="return confirm_box();">Delete</a>
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
    var answer = confirm ("Are you sure?");
    if (!answer)
     return false;
}


function get_status(id,type,value){
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