<style>
.table th{
	vertical-align:top !important;
}
</style>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box grey-cascade">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i><?php echo $name;?>
                </div>
                <!--<div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config">
                    </a>
                    <a href="javascript:;" class="reload">
                    </a>
                    <a href="javascript:;" class="remove">
                    </a>
                </div>-->
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="/edit"class="btn green">
                                Add New <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="pull-right col-lg-6" style="">
            	<form class="form-horizontal " role="form" action="" method="get" style="float:right">
                        <input type="text" class="form-control" name="q"  value="<?=isset($search)?$search:''?>" style="float:left;width:335px" placeholder="Search">
                        <button type="submit" name="submit" class="btn btn-primary">Search</button>
                  </form>
            </div>
                    </div>
                </div>

<div class="portlet-body">
    <div class="table-scrollable">
        <table class="table table-striped table-bordered table-hover">
        <thead>
              <tr>
                <th>ID</th>								
                <th>Title</th>
                <th>Section</th>
                <th>Partner</th>
                <th>Confirm</th>
                <th>Options</th>
            </tr>
        </thead>
<tbody>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){
		if(isset($set_data->image)){
			$image = base_url('assets/uploads/products').'/'.$set_data->image; 
		}
		else{
			$image = "assets/uploads/no-image.gif";
		}
		if($set_data->user_id!=0){
			$userProduct = $this->comman_model->get_by('users',array('id'=>$set_data->user_id),false,false,true);
		}

?>
                        <tr>
							<td><?php echo $set_data->id; ?></td>
							<td><img src="<?=$image?>" class="img-rounded" style="width:30px;height:30px"> <?=$set_data->title; ?> <span class="label label-sm label-success"><?=$set_data->created_by;?></span></td>

                            
							<td>
<?php 
$are_type= "get_status('section',".$set_data->id.",this.value)";
echo form_dropdown('ares', $section, $set_data->section, 'onchange="'.$are_type.'"'); ?>
                            </td>
							<td>
<?php 
if($set_data->created_by!='user'){
?>
					<select name="" onchange="get_status('user_id','<?=$set_data->id;?>',this.value);" >
                    	<option value="0">Select</option>
<?php
if($user_data){
	foreach($user_data as  $set_user){
		if($set_data->user_id!=0){
			if(isset($userProduct)&&($userProduct->id==$set_user->id)){
				echo '<option value="'.$set_user->id.'" selected>'.$set_user->first_name.' '.$set_user->last_name.'</option>';
			}

			else{
				echo '<option value="'.$set_user->id.'">'.$set_user->first_name.' '.$set_user->last_name.'</option>';
			}
		}
		else{
			echo '<option value="'.$set_user->id.'">'.$set_user->first_name.' '.$set_user->last_name.'</option>';
		}
	}
}

?>                    
                    </select>
<?php
}
else{
	echo $userProduct->first_name.' '.$userProduct->last_name;
}
 ?>
                            </td>
							<td>
                            	<input id="remember" name="remember" type="checkbox" onclick="get_active('status',<?php echo $set_data->id;?>,this.value)" <?=$set_data->status==1?'checked="checked"':''?>   />
							</td>
							
							
							
							<td>
                            <a class="btn btn-icon-only green tooltips" href="admin/product/edit/<?php echo $set_data->id;?>" title="Edit" data-original-title="Edit" data-placement="top">
										<i class="fa fa-edit"></i></a>
                            	<a class="btn btn-icon-only red" href="admin/product/delete/<?php echo $set_data->id;?>"  onclick="return confirm_box();" title="Delete">
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
    <div class="row">
        <div class="col-md-5 col-sm-12">
            <div class="dataTables_info" id="sample_6_info" role="status" aria-live="polite">
<?php
/*$start = $this->pagination->cur_page * $this->pagination->per_page;
$end = $start + $this->pagination->per_page;
$total = $this->pagination->total_rows;
echo "Showing $start to $end of $total entries";*/
//echo $range;
?>
            
            </div>
        </div>
        <div class="col-md-7 col-sm-12">
            <div class="dataTables_paginate paging_simple_numbers" id="sample_6_paginate">
            <?php 
                if($pagination):
                     echo $pagination;
                endif;
            ?>

            <!--<ul class="pagination">
            <li class="paginate_button previous disabled">
            <a href="#"><i class="fa fa-angle-left"></i></a></li>
            <li class="paginate_button active"><a href="#">1</a></li>
            <li class="paginate_button "><a href="#">2</a></li>
            <li class="paginate_button " aria-controls="sample_6" tabindex="0"><a href="#">3</a></li><li class="paginate_button " aria-controls="sample_6" tabindex="0"><a href="#">4</a></li><li class="paginate_button " aria-controls="sample_6" tabindex="0"><a href="#">5</a></li><li class="paginate_button next" aria-controls="sample_6" tabindex="0" id="sample_6_next"><a href="#"><i class="fa fa-angle-right"></i></a></li></ul>-->
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>



<script>
function get_active(name,id,value){
    $.ajax({
       type: "POST",
       url: "admin/product/get_active", /* The country id will be sent to this file */
       data: {id:id,type:name,value:value},
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
       url: "admin/product/set_value", /* The country id will be sent to this file */
       data: {id:id,type:type,value:value},
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
    var answer = confirm ("Are you sure?");
    if (!answer)
     return false;
}
</script>