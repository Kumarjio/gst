
<style>
.table th{
	vertical-align:top !important;
}
</style>
		<div class="box-border" >

<div class="page-title">
    <h1><?=$name?></h1>
</div>

<div class="portlet-body">
<ul class="nav nav-tabs">
    <li class=""><a href="<?=$_cancel.'/excel';?>">Excel File</a></li>
    <li class="active"><a href="javascript:void(0)" >Excel Data</a></li>
</ul>	    
<div class="tab-content" style="padding:10px 0">
    <div id="step-1" class="tab-pane fade active in">
	    <div class="table-responsive">
    <table id="data-table" class="table table-striped table-bordered">
        <thead>
              <tr>
                    <th><?=show_static_text($lang_id,244);?></th>								
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
					        <td><?=date("d-m-Y", strtotime($set_data->{'on_date'}));?></td>
                        </tr>

<?php             
   }
}
?>                        
</tbody>
    </table>
    </div>
    </div>
</div><!--//tab-content//-->    
    </div>

<div style="clear:both"></div>
</div>
