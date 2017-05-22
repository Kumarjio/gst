<?php
$time_setting  = $this->comman_model->get_by('problems_time_setting',array('id'=>1),false,false,true);
$dayArray = array();
if($time_setting->is_mon==0){
	$dayArray[] = 'Monday';
}
if($time_setting->is_tue==0){
	$dayArray[] = 'Tuesday';
}
if($time_setting->is_wed==0){
	$dayArray[] = 'Wednesday';
}
if($time_setting->is_thr==0){
	$dayArray[] = 'Thursday';
}
if($time_setting->is_fri==0){
	$dayArray[] = 'Friday';
}
if($time_setting->is_sat==0){
	$dayArray[] = 'Saturday';
}
if($time_setting->is_sun==0){
	$dayArray[] = 'Sunday';
}
?>
<link rel="stylesheet" href="assets/plugins/flipclock/flipclock1.css">

<script src="assets/plugins/flipclock/flipclock.js"></script>		
<script src="assets/plugins/time_counter/countdown.js"></script>
<style>
.jqplot-yaxis {
  left:-6px !important;
}

/*.clock {
position: relative !important;
padding-top: 0px;
margin-left: -194px;
height:100px;
width: 800px;
zoom: .6;
transform: scale(.54);
-ms-transform: scale(.54);

}
.flip-clock-wrapper {
position: relative;
}*/
.flip-clock-wrapper{margin:0px}
.flip-clock-wrapper ul {width: 20px;height: 30px;margin: 0 2px;padding:0px}
.flip-clock-wrapper ul li {line-height:30px;}
.flip-clock-wrapper ul li a div div.inn {border-radius: 3px;font-size: 20px;}
.flip-clock-wrapper ul li a div.down {border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;}
.flip-clock-wrapper ul li a div.up:after {top: 38px;height: 2px;}
</style>
<style>
.dashboard-box{
	float:right;
	margin-right:10px;
	margin-top:-5px;
}
.dashboard-box button{
	padding:5px 12px;
	margin-bottom:0px !important;
}
.dashboard-box .col-md-3{
	padding:0 20px;
}
.dashboard-box .widget {
  border-radius: 3px;
  color: #fff;
  margin-bottom: 20px;
  overflow: hidden;
  padding: 3px 15px;
}
</style>
<?php
$nowtime =time();			
$SysStartTime = strtotime(date('Y-m-d '.$time_setting->start_time.':00'));
$SysEndTime = strtotime(date('Y-m-d '.($time_setting->end_time).':00'));

$employee_data = $this->comman_model->get_by('admin',array('id !='=>$admin_details->id,'is_ticket'=>1),false,false,false);

$query = "SELECT * FROM problems where on_date ='".date('Y-m-d')."'";
$toDayOrder = $this->comman_model->get_query($query);

$query = "SELECT * FROM problems where YEAR(on_date)='".date('Y')."' and MONTH(on_date) = '".date('m')."'";
$monthOrder = $this->comman_model->get_query($query);

$query = "SELECT * FROM problems where YEAR(on_date)='".date('Y')."'";
$yearOrder = $this->comman_model->get_query($query);

$OntimeTicket = $this->comman_model->get_by('problems',array('status'=>'Completed','done_by'=>"On Time"),false,false,false);
$DelayTicket = $this->comman_model->get_by('problems',array('status'=>'Completed','done_by'=>"Delay"),false,false,false);
?>

<!-- BEGIN DASHBOARD STATS -->
<?php
$problems = $this->comman_model->get('problems',false);
$users = $this->comman_model->get_by('users',array('account_type'=>'C'),false,false,false);
$users2 = $this->comman_model->get_by('users',array('account_type'=>'U'),false,false,false);
?>
			

<div class="row ">
<div class="panel panel-inverse" style="">
    <div class="panel-heading">
<!--        <h4 class="panel-title" style="float:left;margin-right:20px"><i class="fa fa-globe"></i> Chart</h4>-->
        <div class="panel-heading-btn " style="float:left">
			<div class="btn-group pull-right">
                <a href="javascript:void(0);" onclick="get_chart('day');" class="btn btn-primary m-r-5 m-b-5">Day</a>
                <a href="javascript:void(0);" onclick="get_chart('month');" class="btn btn-primary m-r-5 m-b-5">Month</a>
                <a href="javascript:void(0);" onclick="get_chart('year');" class="btn btn-primary m-r-5 m-b-5">Year</a>
            </div>
        </div>
        <!--<div class="row dashboard-box">    

            <button class="btn bg-purple  m-r-5 m-b-5" type="button">Company <?=count($users)?></button>
            <button class="btn bg-green  m-r-5 m-b-5" type="button">Customer <?=count($users2)?></button>
            <button class="btn m-r-5 m-b-5" style="background:#EAA228" type="button">Ticket On Time <?=count($OntimeTicket)?></button>
            <button class="btn m-r-5 m-b-5" style="background:#953579" type="button">Ticket On Delay <?=count($DelayTicket)?></button>    
	    </div>-->

        <div style="clear:both"></div>
    </div>
    <div class="panel-body">
        <div>
<!--<div class="chart_clicks">User</div>-->
<div id="chart1" class="example-chart"  style="height:300px;width:100%;float:left"></div>
<div style="clear:both"></div>
<!--<div style="font-size:18px;margin-left:600px">Country</div>-->
<br>
</div>
    </div>
</div>
</div>

            
<link class="include" rel="stylesheet" type="text/css" href="assets/plugins/charts/jquery.jqplot.min.css" />
<script class="include" type="text/javascript" src="assets/plugins/charts/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="assets/plugins/charts/jqplot.pointLabels.min.js"></script>
<script language="javascript" type="text/javascript" src="assets/plugins/charts/jqplot.categoryAxisRenderer.min.js"></script>
<script language="javascript" type="text/javascript" src="assets/plugins/charts/jqplot.barRenderer.min.js"></script>

<script type="text/javascript" src="assets/plugins/charts/jqplot.logAxisRenderer.min.js"></script>
<script type="text/javascript" src="assets/plugins/charts/jqplot.canvasTextRenderer.min.js"></script>
<script type="text/javascript" src="assets/plugins/charts/jqplot.canvasAxisLabelRenderer.min.js"></script>
<script type="text/javascript" src="assets/plugins/charts/jqplot.canvasAxisTickRenderer.min.js"></script>
<script type="text/javascript" src="assets/plugins/charts/jqplot.dateAxisRenderer.min.js"></script>

<script type="text/javascript" class="code">
$(document).ready(function(){
function view_charts(){
	user_id = 1;
	//alert(user_id);
	var ret = [];
	$.ajax({
	  async: false,
	  url: "<?=$admin_link?>/ajax_admin/ajax_chart_d",
	  type:'POST',
	  data:{type:'day',<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
	  dataType:"json",
	  success: function(data) {
		   $.each( data, function( key, val ) {
				ret.push([key, val]);
			});
	  }
	});
	return ret;
}


	var line1 = view_charts();
	//console.log(line1);

	$.jqplot.config.enablePlugins = true;
	 
	plot1 = $.jqplot('chart1', [line1], {
		// Only animate if we're not using excanvas (not in IE 7 or IE 8)..
		animate: !$.jqplot.use_excanvas,
		seriesDefaults:{
			renderer:$.jqplot.BarRenderer,
			rendererOptions: {
			// Set the varyBarColor option to true to use different colors for each bar.
			// The default series colors are used.
			varyBarColor: true
			},
			pointLabels: { show: true }
		},
		axes: {
			xaxis: {
				renderer: $.jqplot.CategoryAxisRenderer,
				//ticks: ticks
			},
/*			yaxis: {
				min: 0,  
				//tickInterval: 1, 
				tickOptions: { 
					formatString: '%d' 
				} 
			}*/
			
		},
		highlighter: { show: false }
	});
 
	$('#chart1').bind('jqplotDataClick', 
		function (ev, seriesIndex, pointIndex, data) {
			$('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
		}
	);
});
	
function get_chart(types){
	$('#chart1').html('');
	$(document).ready(function(){
	    var line1 = view_ajax_chart(types);
        $.jqplot.config.enablePlugins = true;
         
        plot1 = $.jqplot('chart1', [line1], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
				rendererOptions: {
                // Set the varyBarColor option to true to use different colors for each bar.
                // The default series colors are used.
                varyBarColor: true
	            },
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    //ticks: ticks
                },
/*				yaxis: {
					min: 0,  
					tickOptions: { 
						formatString: '%d' 
					} 
				}*/
				
            },
            highlighter: { show: false }
        });
     
        $('#chart1').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });
}
function view_ajax_chart(type){
	user_id = 1;
	//alert(user_id);
	var ret = [];
	$.ajax({
	  async: false,
	  url: "<?=$admin_link?>/ajax_admin/ajax_chart_d",
	  type:'POST',
	  data:{type:type,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
	  dataType:"json",
	  success: function(data) {
		   $.each( data, function( key, val ) {
				ret.push([key, val]);
			});
	  }
	});
	return ret;
}

</script>










