

<style>
.table th{
	vertical-align:top !important;
}
</style>
		<div class="box-border" >

<div class="page-title">
	<h3 style="color:#666666;border-bottom:1px solid #e7e7e7;padding-bottom:10px"><?=$name;?></h3>
</div>
<div class="portlet-body">
    	<a href="<?=$_edit?>" class="btn green" style="margin-bottom:10px"><?=show_static_text($lang_id,233);?></a>

    			<div id="external-events">                    
            </div>
			<div id='loading'><img src="assets/uploads/loading.gif" alt="loading..." /></div>
            <div id="calendar" class="has-toolbar calendar"></div>

    
</div>
</div>
<link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet"/>
<script src="assets/global/plugins/moment.min.js"></script>
<script src="assets/global/plugins/fullcalendar/fullcalendar.min.js"></script>
<script>

	$(document).ready(function() {
		$('#calendar').fullCalendar({
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: '<?=$lang_code?>/partner_remark/ajax_appointment',
				error: function() {
					$('#script-warning').show();
				}
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
			
		});
		
	});


</script>
<style>
#loading {
	display: none;
	position: absolute;
	top: 10px;
	right: 10px;
}

</style>
