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
			   <!-- <a href="<?=$_add?>" class="btn btn-primary m-r-5 m-b-5"><?=show_static_text($adminLangSession['lang_id'],233);?> <i class="fa fa-plus"></i></a>-->
			   <button class="btn btn-primary m-r-5 m-b-5" type="button" id="add_new" onclick="window.location.href='/admin/media/create'">Add New <i class="fa fa-plus"></i></button>
		    </div>
	    </div>
	    </div>

    <div class="table-responsive">
      <ul>

<?php
if(count($all_data)){
	foreach($all_data as $set_data){
		$image = "assets/uploads/no-image.gif";
		if($set_data->type=='jpeg'||$set_data->type=='jpg'){
			if(isset($set_data->files)){
				$image = base_url('assets/images').'/'.$set_data->files; 
			}
		}
?>
    <li>
	
				
					<div class="centered">
						<img src="<?=$image?>" class="img-rounded">
					</div>
				
			
		
       <!-- <td><?php echo $set_data->id; ?></td>
        <td><img src="<?=$image?>" class="img-rounded" style="width:30px;height:30px"> <?=$set_data->name; ?></td>
        <td><?=$set_data->type?></td>
       
        <td>
        <a class="btn btn-icon-only btn-info" href="<?=$_cancel.'/download/'.$set_data->id;?>" >
                    <i class="fa fa-download"></i></a>
            <a class="btn btn-icon-only btn-danger" href="<?=$_delete?>/<?php echo $set_data->id;?>"  onclick="return confirm_box();">
                    <i class="fa fa-trash-o"></i></a>
            

        </td>	-->						
    </li>

<?php             
   }
}
?>                        

</ul>							
        </table>
    </div>
    </div>
</div>

        <!-- end panel -->
    </div>
</div>

<script>

/*$('#add_new').click(function()
                    {
                      $('#add_media').css('display','block');
                    }); */
					$("#add_new").click(function(){
    $("#add_media").toggle();
});
function confirm_box(){
    var answer = confirm ("<?=show_static_text($adminLangSession['lang_id'],265);?>");
    if (!answer)
     return false;
}
</script>
<style>
.table-responsive li {
  list-style: none;
  display: inline-block;
  width: 20%;
  margin: 10px ;
  float: left;
}
.img-rounded {
  border-radius: 0;
  height: 180px;
  margin-bottom: 20px;
  width: 100%;
}
</style>