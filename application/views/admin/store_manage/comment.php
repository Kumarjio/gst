<style>
.progress {
  margin-bottom: 5px;
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
                <div class="table-responsive">
			
        <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>								
                    <th>Username</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Confirm</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){
?>
                        <tr>
							<td><?=$set_data->id; ?></td>
							<td><?=$set_data->username; ?></td>
							<td><?=$set_data->rate; ?></td>
							<td><?=$set_data->comment; ?></td>
							<td>
                            	<input id="remember" name="remember" type="checkbox" onclick="get_active('enabled',<?=$set_data->id;?>,this.value)" <?=$set_data->enabled==1?'checked="checked"':''?>   />
							</td>
							<td>
                            	<a href="<?=$_cancel?>/deletes/review/<?=$uri_id.'/'.$set_data->id;?>"  onclick="return confirm_box();"><?=$this->lang->line('delete');?></a>

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

function get_active(name,id,value){
    $.ajax({
       type: "POST",
       url: "<?=$_cancel?>/get_active_review", /* The country id will be sent to this file */
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

</script>