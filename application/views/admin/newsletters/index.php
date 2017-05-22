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
			    <a href="<?=$_edit;?>" class="btn btn-primary m-r-5 m-b-5"><?=show_static_text($adminLangSession['lang_id'],233);?> <i class="fa fa-plus"></i></a>
		    </div>
	    </div>
	    </div>

    <div class="table-responsive">
        <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th><?=show_static_text($adminLangSession['lang_id'],244);?></th>								
                    <th><?=show_static_text($adminLangSession['lang_id'],255);?></th>
                    <th><?=show_static_text($adminLangSession['lang_id'],55);?></th>
                    <th width="250"><?=show_static_text($adminLangSession['lang_id'],258);?></th>
                </tr>
                </thead>
                <tbody>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){
?>
                        <tr>
							<td><?php echo $set_data->id; ?></td>
							<td><?php echo $set_data->subject; ?></td>
							<td><?php echo substr($set_data->desc, 0 ,100); ?></td>
							<td>
                            
<a class="btn btn-icon-only btn-primary " href="<?=$_cancel.'/duplicate/'.$set_data->id;?>" data-toggle="tooltip" data-placement="top" title="Duplicate" ><i class="fa fa-files-o"></i></a>

<a class="btn btn-icon-only btn-success " href="<?=$_edit?>/<?=$set_data->id;?>" data-toggle="tooltip" data-placement="top" title="Edit" ><i class="fa fa-edit"></i></a>

<a class="btn btn-icon-only btn-primary " href="<?=$_cancel.'/send_mail/'.$set_data->id;?>" data-toggle="tooltip" data-placement="top"  title="Send Mail" ><i class="fa fa-share"></i></a>

<a class="btn btn-icon-only btn-info" href="<?=$_cancel.'/test_email/'.$set_data->id;?>" data-toggle="tooltip" data-placement="top"  title="Test This email"  ><i class="fa fa-chain-broken"></i></a>

<a class="btn btn-icon-only btn-danger" href="<?=$_delete?>/<?=$set_data->id;?>" data-toggle="tooltip" data-placement="top"  title="Delete"  onclick="return confirm_box();" ><i class="fa fa-trash-o"></i></a>

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