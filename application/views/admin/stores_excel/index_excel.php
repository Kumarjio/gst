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
			    <a href="<?=$_cancel.'/import/'.$storeID;?>" class="btn btn-primary m-r-5 m-b-5">Upload Excel <i class="fa fa-plus"></i></a>
		    </div>
	    </div>
	    </div>
<ul class="nav nav-tabs">
    <li class="active"><a href="javascript:void(0)">Excel File</a></li>
    <li class=""><a href="<?=$_cancel.'/excel_data/'.$storeID;?>" >Excel Data</a></li>
</ul>	    
<div class="tab-content" style="padding:10px 0">
    <div id="step-1" class="tab-pane fade active in">

    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th >Upload File</th>
                    <th width="200"><?=show_static_text($adminLangSession['lang_id'],258);?></th>
                </tr>
                </thead>
                <tbody>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){

?>
<tr>
    <td><?=date("d-m-Y", strtotime($set_data->{'date'}));?></td>
    <td><a class="btn btn-icon-only btn-danger" href="<?=$_delete.'/'.$storeID.'/'.$set_data->{'date'};?>"  onclick="return confirm_box();" ><i class="fa fa-trash-o"></i></a></td>
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
</script>
<style>
table td{
	padding:10px 3px !important;
}
</style>