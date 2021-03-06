<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>

<div class="panel-body">
<div class="row">
        <div class="btn-group">	        
            <a href="<?=$_add?>" class="btn btn-success m-r-5 m-b-5">
            Add New Process <i class="fa fa-plus"></i>
            </a>
        </div>
</div>
    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>								
                    <th>Title</th>
                    <th>Category</th>
                    <th>Create By</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){
		$category = $this->comman_model->get_lang('categories',$this->data['content_language_id'],NULL,array('id'=>$set_data->category_id),'category_id',true);
		if($set_data->user_id!=0){
			$user = $this->comman_model->get_by('users',array('id'=>$set_data->user_id),false,false,true);
			$userName = $user->first_name.' '.$user->last_name;
		}
		else{
			$userName ='Admin';
		}
		
?>
                        <tr>
							<td><?php echo $set_data->id; ?></td>
							<td><?php echo $set_data->name; ?></td>
							<td><?php echo $category->title; ?></td>
							<td><?php echo $userName; ?></td>
        <td>
            <input id="remember" name="remember" type="checkbox" onclick="get_active('confirm',<?php echo $set_data->id;?>,this.value)" <?=$set_data->confirm==1?'checked="checked"':''?>   />
        </td>

							<td>


                            <a class="btn btn-icon-only green tooltips" href="<?=$_view.'/'.$set_data->id;?>" title="Edit" data-original-title="Edit" data-placement="top">
										<i class="fa fa-eye"></i></a>

<?php
if($set_data->user_id==0){
?>
                            <a class="btn btn-icon-only green tooltips" href="<?=$_edit.'/'.$set_data->id;?>" title="Edit" data-original-title="Edit" data-placement="top">
										<i class="fa fa-edit"></i></a>
<?php
}
?>

                            	<a class="btn btn-icon-only red" href="<?=$_delete.'/'.$set_data->id;?>"  onclick="return confirm_box();" title="Delete">
										<i class="fa fa-trash-o"></i></a>

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
       url: "admin/process/get_active", /* The country id will be sent to this file */
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

/*$(document).ready(function(){
	$('&nbsp;<a href="<?=$_add?>" class="btn btn-success m-r-5 m-b-5">Add New Process <i class="fa fa-plus"></i></a>').appendTo('div.dataTables_filter');
	//$('div.dataTables_filter').appendTo('<button id="refresh">Refresh</button>');
});
*/

</script>