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
			    <a href="<?=$admin_link?>/store" class="btn btn-primary m-r-5 m-b-5">Back <i class="fa fa-arrow-left"></i></a>
		    </div>
	    </div>
	    </div>
<ul class="nav nav-tabs">
    <li class=""><a href="<?=$_cancel.'/excel/'.$storeID;?>">Excel File</a></li>
    <li class="active"><a href="javascript:void(0)" >Excel Data</a></li>
</ul>	    
<div class="tab-content" style="padding:10px 0">
    <div id="step-1" class="tab-pane fade active in">

    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th><?=show_static_text($adminLangSession['lang_id'],244);?></th>								
                    <th >Room Booked</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){

?>
                        <tr>
							<td><?=$set_data->id; ?></td>
							<td><?=$set_data->room; ?></td>
							<td><?=$set_data->price ?></td>
							<td><?=date("d-m-Y", strtotime($set_data->on_date));?></td>
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