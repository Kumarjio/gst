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
			    <a href="<?=$_edit?>" class="btn btn-primary m-r-5 m-b-5"><?=show_static_text($adminLangSession['lang_id'],233);?> <i class="fa fa-plus"></i></a>
		    </div>
	    </div>
    	
	    </div>
            <!--<div class="row">
	    <div class="col-md-6">
    		<div class="btn-group">
			    <a href="admin/userlist/send_mail"class="btn btn-primary m-r-5 m-b-5">Send Mail <i class="fa fa-plus"></i></a>
		    </div>
	    </div>
    </div>-->                
    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>								
                    <th>Title</th>
                    <th>Price</th>
                    <th>Staff</th>
                    <th>User Type</th>
                    <th>For Month</th>
<!--                    <th>User Count</th>-->
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){
		//$count = count($this->comman_model->get_by('users',array('plan_id'=>$set_data->id),false,false,false));
?>
                        <tr>
							<td><?=$set_data->id; ?></td>
							<td><?=$set_data->name; ?></td>
							<td><?=$set_data->price; ?></td>
							<td><?=($set_data->member==50)?'50+':$set_data->member; ?></td>
							<td><?=$set_data->type; ?></td>
							<td><?=$set_data->month; ?></td>
<!--							<td><?=$count; ?></td>-->
							<td>
                            <a class="btn btn-icon-only green tooltips" href="admin/membership/edit/<?=$set_data->id;?>" title="Edit" data-original-title="Edit" data-placement="top">
										<i class="fa fa-edit"></i></a>
                            	<a class="btn btn-icon-only red" href="admin/membership/delete/<?=$set_data->id;?>"  onclick="return confirm_box();" title="Delete">
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
</script>