<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">         
                <h4 class="panel-title"><?=$name?></h4>
            </div>

<div class="panel-body">
<div style="margin-bottom:10px;">
<span class="label label-sm label-primary" style="font-size:16px">Services: <?=$all_items?></span>
<span class="label label-sm label-success" style="font-size:16px;background:#5CB85C">Close: <?=$done_count?></span>
<span class="label label-sm label-warning" style="background:#CC0000;font-size:16px">Cancel: <?=$cancel_count?></span>
</div>
			<div id="external-events">                    
            </div>
			<div id='loading'><img src="assets/uploads/loading.gif" alt="loading..." /></div>
            <div id="calendar" class="has-toolbar calendar"></div>

    
    
    </div>
</div>

        <!-- end panel -->
    </div>
</div>


<link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet"/>
<script src="assets/global/plugins/moment.min.js"></script>
<script src="assets/global/plugins/fullcalendar/fullcalendar.min.js"></script>
<script>

	$(document).ready(function() {
		$('#calendar').fullCalendar({
			eventRender: function (event, element) {
				element.find('.fc-title').html(event.title);
			},
			editable: false,
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: '<?=$_appointment?>',
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
