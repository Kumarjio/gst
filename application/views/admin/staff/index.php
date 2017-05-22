<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>

<div class="panel-body">
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
                <th><?=show_static_text($adminLangSession['lang_id'],244);?></th>
                <th><?=show_static_text($adminLangSession['lang_id'],10242);?>Hotel Name</th>
                <th><?=show_static_text($adminLangSession['lang_id'],10242);?>Staff Count</th>
                <th><?=show_static_text($adminLangSession['lang_id'],10242);?>Staff Name</th>
                <th><?=show_static_text($adminLangSession['lang_id'],10242);?>Email</th>
                <th><?=show_static_text($adminLangSession['lang_id'],10242);?>Department</th>
            </tr>
            </thead>
            <tbody>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){
		$hotelName =  '-';
		$staffCount =  0;
		if($set_data->parent_id!=0){
			$userData = $this->comman_model->get_by('stores',array('user_id'=>$set_data->parent_id),false,false,true);
			$staffCount = count($this->comman_model->get_by('users',array('parent_id'=>$set_data->parent_id),false,false,true));
			if($userData){
				$hotelName = $userData->name;
			}
		}
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
                        <td><?=$set_data->id;?></td>
                        <td><?=$hotelName;?></td>
                        <td><?=$staffCount;?></td>
                        <td><?=$set_data->first_name.' '.$set_data->last_name;?></td>
                        <td><?=$set_data->email;?></td>
                        <td><?=$CategoryName?></td>
                        
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


function get_status(name,id,value){
	//alert(name+' '+id+' '+value);
    $.ajax({
       type: "POST",
       url: "<?=$_cancel?>/get_status", /* The country id will be sent to this file */
       data: {id:id,status:value,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
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