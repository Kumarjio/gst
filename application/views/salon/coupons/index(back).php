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
                <th><?=show_static_text($lang_id,39);?></th>								
                <th><?=show_static_text($lang_id,178);?></th>
                <th><?=show_static_text($lang_id,229);?></th>
                <th><?=show_static_text($lang_id,230);?></th>
                <th><?=show_static_text($lang_id,231);?></th>
                <th><?=show_static_text($lang_id,232);?></th>
                <th><?=show_static_text($lang_id,258);?></th>
            </tr>
        </thead>
<tbody>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){
	   $user = $this->comman_model->get_by('users',array('id'=>$set_data->user_id),false,false,true);
		if(!empty($user)){
			$user_name = $user->first_name.' '.$user->last_name;
		}
		else{
			$user_name = 'No User';
		}
?>
                        <tr>
							<td><?=$set_data->code;?></td>
							<td><?=$user_name;?></td>
							<td><?=$set_data->reduction_amount;?></td>
							<td><?=$set_data->remaining;?></td>
							<td><?=($set_data->is_used==0)?'Not Used':'Used';?></td>
							<td><?=$set_data->end_date;?></td>
							
							<td>
                            <a class="btn btn-icon-only btn-info " href="<?=$_cancel?>/send_mail/<?php echo $set_data->id;?>/true" >
										<i class="fa fa-mail-forward"></i></a>
                            <a class="btn btn-icon-only btn-success" href="<?=$_add?>/<?php echo $set_data->id;?>" >
										<i class="fa fa-edit"></i></a>
                            	<a class="btn btn-icon-only btn-danger " href="<?=$_delete?>/<?php echo $set_data->id;?>"  onclick="return confirm_box();" >
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
    var answer = confirm ("<?=show_static_text($lang_id,265);?>");
    if (!answer)
     return false;
}

$(document).ready(function(){
//	$('&nbsp;<a href="<?=$_add?>" class="btn btn-success m-r-5 m-b-5">Add New <i class="fa fa-plus"></i></a>').appendTo('div.dataTables_filter');
	//$('div.dataTables_filter').appendTo('<button id="refresh">Refresh</button>');
});

</script>