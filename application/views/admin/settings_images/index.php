<style>
.table th{
	vertical-align:top !important;
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
    <div class="row" style="margin-bottom:10px">
	    <div class="col-md-6">
    		<div class="btn-group">
			    <a href="<?=$_add?>" class="btn btn-primary m-r-5 m-b-5"><?=show_static_text($adminLangSession['lang_id'],233);?> <i class="fa fa-plus"></i></a>
		    </div>
	    </div>
	    </div>

    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-bordered">
        <thead>
              <tr>
                <th><?=show_static_text($adminLangSession['lang_id'],244);?></th>								
                <th><?=show_static_text($adminLangSession['lang_id'],236);?></th>
                <th><?=show_static_text($adminLangSession['lang_id'],2560);?>Default</th>
                <th><?=show_static_text($adminLangSession['lang_id'],258);?></th>
            </tr>
        </thead>
		<tbody>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){
		if(isset($set_data->image)){
			$image = base_url('assets/uploads/home').'/'.$set_data->image; 
		}
		else{
			$image = "assets/uploads/no-image.gif";
		}
?>
    <tr>
        <td><?php echo $set_data->id; ?></td>
        <td><img src="<?=$image?>" class="img-rounded" style="width:30px;height:30px"> <?=$set_data->name; ?></td>
        <td><?=$set_data->is_active==1?'<i class="fa fa-check"></i>':''?></td>
       
        <td>
        <a class="btn btn-icon-only btn-info" href="<?=$_edit?>/<?php echo $set_data->id;?>" >
                    <i class="fa fa-edit"></i></a>
            <a class="btn btn-icon-only btn-danger" href="<?=$_delete?>/<?php echo $set_data->id;?>"  onclick="return confirm_box();">
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
    var answer = confirm ("<?=show_static_text($adminLangSession['lang_id'],265);?>");
    if (!answer)
     return false;
}
</script>