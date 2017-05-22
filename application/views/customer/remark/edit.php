<div class="row">
	<div class="col-md-12">
		<div class="box-border" >
<h3 style="color:#666666;border-bottom:1px solid #e7e7e7"><?=$name;?></h3>
            <div class="Popular-Restaurants-grids" style="margin-top:10px">
            <div class="row user-form" id="customer-login">
        <div class="col-md-10 col-right" >        
            <?php echo validation_errors();?>
			<?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form','enctype'=>"multipart/form-data",'data-parsley-validate'=>"true"))?>
              	<input type="hidden" name="operation" value="set" />
                <div class="form-body">
                    <div class="form-group" >
                    <label class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-8 col-md-8">
                       <?=form_input('name', set_value('name', $tickets->name), 'class="form-control " id="" placeholder="" required')?>
                    </div>
                </div>
                
                
                
			<div class="form-group" >
                    <label class="col-md-2 control-label">Attachment</label>                	
                    <div class="col-md-8">
						<input type="file" name="logo" id="logo">

<?php
if(isset($tickets->files)&&!empty($tickets->files)){
	echo $tickets->files;
	echo '<a class="btn " href="'.$_cancel.'/remove_file/'.$tickets->id.'" onclick="" >Remove</a>';
}
?>
                    </div>                    
                </div>                

	<div class="form-group">
<label class="col-md-2 control-label">Date</label>
<div class="col-md-8 ">
<input class="form-control" type="text" id="best_sellers_start" placeholder="Date" name="dates"  data-date-format="dd-mm-yyyy" value="<?=set_value('dates', $tickets->dates);?>" />
</div>
</div>                

                <div class="form-group" >
                    <label class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-8 col-md-8">
                       <?=form_textarea('desc', set_value('desc', $tickets->desc), 'placeholder="" rows="3" style="height:80px" class="form-control" required')?>
                    </div>
                </div>
                        
                </div>
                
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-9">
                            <?=form_submit('submit', 'Send', 'class="btn btn-success"')?>
                            <a href="<?=$_cancel?>" class="btn btn-default" type="button">Cancel</a>
                            <!--<button type="button" class="btn default">Cancl</button>-->
                        </div>
                    </div>
                </div>
            
			<?=form_close()?>
                
            </div>
</div>
        </div>
		</div>
	</div><!--// col-md-6 //-->

    <!--// col-md-6 //-->
</div>



<style>
.customer-login .col-md-4{
	margin-bottom:10px;
}
.error-span{
	color:#F00;
	margin:0px;
}
.error-span p{
	margin:0px;
}

.form-group{
	clear:both;
}

.form-group label{
  padding: 5px 0px 0px;
  font-size: 13px;
  font-weight: normal;
}

</style>      


<link href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css"  rel='stylesheet' type='text/css' >
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
	//$('&nbsp;').appendTo('div.dataTables_filter');
	//$('div.dataTables_filter').appendTo('<button id="refresh">Refresh</button>');
	$('#best_sellers_start').datepicker({ dateFormat: 'mm-dd-yy', altField: '#best_sellers_start_alt', altFormat: 'yy-mm-dd' });

});
</script>

