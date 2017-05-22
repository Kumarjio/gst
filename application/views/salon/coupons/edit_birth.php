<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
            <?php echo validation_errors();?>
                 <?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form','enctype'=>"multipart/form-data"))?>
    	             <div class="form-body">                    

                 	<div class="col-md-12">                        
                        <div class="form-group">
                          <label class="col-lg-2 control-label" style="padding-top:0px"><?=show_static_text($lang_id,178);?></label>
                          <div class="col-lg-10"><?=($user_data)?$user_data->first_name.' '.$user_data->last_name:'No-User'; ?></div>
                        </div>
                        <div class="form-group" >
                            <label class="col-lg-2 control-label"><?=show_static_text($lang_id,39);?></label>
                            <div class="col-lg-10">
                                <?=form_input('code', set_value('code', $products->{'code'}), 'class="form-control " id="" placeholder="Code"')?>
                            </div>
                        </div>
				                
                        <div class="form-group" >
                            <label class="col-lg-2 control-label"><?=show_static_text($lang_id,28700);?>Amount</label>
                            <div class="col-lg-10">
                                <?=form_input('reduction_amount', set_value('reduction_amount', $products->{'reduction_amount'}), 'class="form-control " id="" placeholder="Reduction Amount"')?>
                            </div>
                        </div>
			</div>
            
               <div style="clear:both"></div>
						</div>
	                 <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-9">
                                    <?=form_submit('submit',show_static_text($lang_id,235), 'class="btn btn-primary"')?>
                                    <a href="<?=$_cancel?>" class="btn btn-default" type="button"><?=show_static_text($lang_id,22);?></a>
                                </div>
                            </div>
                        </div>
                 <?=form_close()?>
                 
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!--end col-md-12-->
</div>



<link href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css"  rel='stylesheet' type='text/css' >
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
	//$('&nbsp;').appendTo('div.dataTables_filter');
	//$('div.dataTables_filter').appendTo('<button id="refresh">Refresh</button>');
	$('.date-picker').datepicker({ dateFormat: 'mm-dd-yy', altField: '#input-date_alt', altFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');});

});
</script>

<script>

function get_process(id){	
	$.ajax({
		type:"POST",
		url:"<?=$_cancel?>/ajaxGetUser",
		data:{id:id,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		dataType: 'json',
		success: function(json) {	
			if(json.status=='ok'){
				$('#user-data').html(json.msge);
			}
			if(json.status=='error'){
				$('#user-data').html('<option value="">Select</option>');
			}
		}
		
	});
}

</script>

