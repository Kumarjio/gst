<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=show_static_text($adminLangSession['lang_id'],282);?></h4>
            </div>

<div class="panel-body">
	    <div class="row">
                        <div class="col-md-6">
                            <form class="form-inline pull-right">
			<input class="form-control" type="text"  id="best_sellers_start" placeholder="Form"  data-date-format="yyyy-mm-dd" />
			<input type="hidden" name="best_sellers_start" id="best_sellers_start_alt" /> 
			<input class="form-control" type="text" id="best_sellers_end" placeholder="To" data-date-format="yyyy-mm-dd" />
			<input type="hidden" name="best_sellers_end" id="best_sellers_end_alt" /> 
			
			<input class="btn btn-primary" type="button" value="<?=show_static_text($adminLangSession['lang_id'],3);?>" onclick="get_best_sellers()"/>
		</form>
                        </div>
                    </div>
    	

    <div class="table-responsive">
        <div class="span12" id="best_sellers"></div>
    </div>
    
    </div>
</div>

        <!-- end panel -->
    </div>
</div>





<link href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css" type="text/css">
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	get_best_sellers();
	//get_monthly_sales();
	$('input:button').button();
	$('#best_sellers_start').datepicker({ dateFormat: 'mm-dd-yy', altField: '#best_sellers_start_alt', altFormat: 'yy-mm-dd' });
	$('#best_sellers_end').datepicker({ dateFormat: 'mm-dd-yy', altField: '#best_sellers_end_alt', altFormat: 'yy-mm-dd' });
});

function get_best_sellers()
{
	show_animation();
  $.post('<?=$_cancel?>/best_sellers',{start:$('#best_sellers_start').val(), end:$('#best_sellers_end').val(),<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'}, function(data){
		$('#best_sellers').html(data);
		setTimeout('hide_animation()', 500);
	});
}


function show_animation()
{
	$('#saving_container').css('display', 'block');
	$('#saving').css('opacity', '.8');
}

function hide_animation()
{
	//$('#saving_container').fadeOut();
}

</script>
