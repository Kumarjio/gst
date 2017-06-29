<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title">View Mailing List</h4>
            </div>

<div class="panel-body">  
    <div class="row" style="margin-bottom:10px">
		<div class="col-md-6">
    <div class="btn-group">
        <a href="<?=$_cancel.'/export';?>"class="btn btn-primary ">
        Export <i class="fa fa-arrow-down"></i>
        </a>
			   <!-- <a href="<?=$_edit?>" class="btn btn-primary m-r-5 m-b-5"><?=show_static_text($adminLangSession['lang_id'],233);?> <i class="fa fa-plus"></i></a>-->
        </a>
        <a href="<?=$_cancel.'/add';?>"class="btn btn-primary create" style="margin: 0px 5px">
        Create New Mailing list <i class="fa fa-plus"></i>
        </a>
    </div>
	    </div>
    </div>  
    <div class="table-responsive">
          <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>S. No.</th>
                    <th>List Title</th>
                    <th>Email Subsciber</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

<?php
 if(count($listing)){
	$i=1;
	foreach($listing as $set_data){
		//echo "<pre>";
//	print_r($set_data);
 
		
?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $set_data->list_title; ?></td>
							<!--<td><?php echo $set_data->email; ?></td>-->
							<td><?php $x = $set_data->email;
					//echo $x; 
					$y=explode(',',$x);?><select Disabled multiple="" class="form-control" name="emails[]">
					<?php
				
if(count($all_data)){
	$k=0;
	foreach($all_data as $set){
	//print_r($set_data); } } die;

?>
                    <option value="<?php echo $set->id;?>" <?php foreach($y as $s){ if($set->id == $s){ echo "selected";} } ?> ><?php echo $set->email;?></option>
	<?php  $k++; } }?>
                  </select></td>
                            
                           <!-- <td><?php echo date('d-m-Y',$set_data->created );?></td>-->
							
                            <td>
							<a class="btn btn-icon-only btn-success" href="<?=$_cancel.'/edit_list'.'/'.$set_data->Id; ?>"  onclick="return confirm_box();">
    <i class="fa fa-edit"></i></a>
<a class="btn btn-icon-only btn-danger" href="<?=$_cancel.'/deletelistsubsciber'.'/'.$set_data->Id; ?>"  onclick="return confirm_box();">
    <i class="fa fa-trash-o"></i></a>

                            </td>
                        </tr>
                      
 <?php $i++;  } }?>
                </tbody>
        </table>
    </div>
    
    </div>
</div>

        <!-- end panel -->
    </div>
</div>


<link href="assets/admin_temp/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<script src="assets/admin_temp/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="assets/admin_temp/js/table-manage-default.demo.min.js"></script>

<script>
$(document).ready(function() {
	TableManageDefault.init();
});
</script>

<script>
function confirm_box(){
    var answer = confirm ("<?=show_static_text($adminLangSession['lang_id'],265);?>");
    if (!answer)
     return false;
}

function get_verified(name,id,value){

	//alert(name+' '+id+' '+value);
    $.ajax({
       type: "POST",
       url: "admin/update_verified", /* The country id will be sent to this file */
       data: "table_name="+name+"&id="+id+"&verified="+value,
       beforeSend: function () {
      $("#show_class").html("Loading ...");
        },
       success: function(msg){
		 //alert(msg);
         $("#show_class").html(msg);
       }
       });
}

function get_status(name,id,value){
	//alert(name+' '+id+' '+value);
    $.ajax({
       type: "POST",
       url: "admin/userlist/get_status", /* The country id will be sent to this file */
       data: "id="+id+"&status="+value,
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