<?php
$query = "SELECT *,`user_order_items`.`id` AS item_id FROM (`user_order_items`) JOIN `user_orders` ON `user_orders`.`id` = `user_order_items`.`order_id` WHERE payment=1 AND ownner_id='".$user_details->id."' AND `user_orders`.on_date ='".date('Y-m-d')."'";
$toDayOrder = $this->comman_model->get_query($query);

//$query = "SELECT * FROM problems WHERE user_id =".$user_details->id." and date_time > DATE_SUB('".date('Y-m-d')."', INTERVAL 1 WEEK) ORDER BY date_time DESC";
$query = "SELECT *,`user_order_items`.`id` AS item_id FROM (`user_order_items`) JOIN `user_orders` ON `user_orders`.`id` = `user_order_items`.`order_id` WHERE payment=1 AND ownner_id='".$user_details->id."' AND WEEKOFYEAR(on_date)=WEEKOFYEAR('".date('Y-m-d')."')";
$weekProblems = $this->comman_model->get_query($query);

$query = "SELECT *,`user_order_items`.`id` AS item_id FROM (`user_order_items`) JOIN `user_orders` ON `user_orders`.`id` = `user_order_items`.`order_id` WHERE payment=1 AND ownner_id='".$user_details->id."' AND YEAR(on_date)='".date('Y')."' and MONTH(on_date) = '".date('m')."'";
$monthOrder = $this->comman_model->get_query($query);
$query = "SELECT *,`user_order_items`.`id` AS item_id FROM (`user_order_items`) JOIN `user_orders` ON `user_orders`.`id` = `user_order_items`.`order_id` WHERE payment=1 AND ownner_id='".$user_details->id."' AND YEAR(on_date)='".date('Y')."' ";

$yearOrder = $this->comman_model->get_query($query);

//$this->db->order_by('solve_user_time','asc');
$d_services = count($this->comman_model->get_by('products',array('type'=>'Product','user_id'=>$user_details->id),false,false,false));
$d_product = count($this->comman_model->get_by('products',array('type'=>'Service','user_id'=>$user_details->id),false,false,false));
$d_staff = count($this->comman_model->get_by('users',array('parent_id'=>$user_details->id),false,false,false));
?>

<!-- begin row -->
<?php
if($user_details->parent_id==0){
	if($user_details->api_username==''||$user_details->api_signature==''||$user_details->api_password==''||$user_details->bank_name==''||$user_details->bank_account==''){
?>
<div class="alert alert-block alert-danger fade in">
    <button data-dismiss="alert" class="close" type="button"></button>
Please Update your profile!!
</div>
<?php
	}
}
?>


<div class="row" >
    <!-- begin col-3 -->                
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-blue" >
            <div class="stats-icon"><i class="fa fa-history"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($lang_id,2039);?>Today Booking</h4>
                <p><?=count($toDayOrder)?></p>	
            </div>
            
        </div>
    </div>
    <!-- end col-3 -->
	<div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-calendar"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($lang_id,2039);?>Week Booking</h4>
                <p><?=count($weekProblems)?></p>	
            </div>
            
        </div>
    </div>    
    <!-- begin col-3 -->                
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-purple" >
            <div class="stats-icon"><i class="fa fa-calendar"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($lang_id,2039);?>Month Booking</h4>
                <p><?=count($monthOrder)?></p>	
            </div>
            
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats  bg-orange" >
            <div class="stats-icon"><i class="fa fa-calendar"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($lang_id,2039);?>Year Booking</h4>
                <p><?=count($yearOrder)?></p>	
            </div>
            
        </div>
    </div>

</div>
<div class="row" >


    

	<div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-aqua" style="">
            <div class="stats-icon"><i class="fa fa-pencil-square-o "></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($lang_id,2039);?>Services</h4>
                <p><?=$d_services?></p>	
            </div>
            
        </div>
    </div>
    

</div>

<!-- end row -->

<div class="row ">
	<div class="panel panel-inverse" style="">
    <div class="panel-heading">
        <div class="panel-heading-btn " >
			<div class="btn-group pull-right">
                <a href="javascript:void(0);" onclick="get_chart('day');" class="btn btn-primary m-r-5 m-b-5">Day</a>
                <a href="javascript:void(0);" onclick="get_chart('month');" class="btn btn-primary m-r-5 m-b-5">Month</a>
                <a href="javascript:void(0);" onclick="get_chart('year');" class="btn btn-primary m-r-5 m-b-5">Year</a>
            </div>
        </div>
        <h4 class="panel-title" style=""><i class="fa fa-globe"></i> Chart</h4>
        
    </div>
    <div class="panel-body">
        <div class="" id="region_statistics_content" style="display: block;">
					<div>
					<div id="chart1" class="example-chart"  style="height:300px;width:100%;float:left"></div>
					<div style="clear:both"></div>
				    <br>
				</div>
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
	  url: "ajax_chart/ajaxOrderChartD",
	  type:'POST',
	  data:{type:'day',user_type:'ownner',<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
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

        $.jqplot.config.enablePlugins = true;
         
        plot1 = $.jqplot('chart1', [line1], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    //ticks: ticks
                }
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
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    //ticks: ticks
                }
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
	  url: "ajax_chart/ajaxOrderChartD",
	  type:'POST',
	  data:{type:type,user_type:'ownner',<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
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



<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>

<link href="assets/admin_temp/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<script src="assets/admin_temp/plugins/DataTables/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
    if ($('#data-table').length !== 0) {
        $('#data-table').DataTable({
			"order": [[ 4, "desc" ],[ 0, "desc" ]]
	    });
    }
    if ($('#data-table2').length !== 0) {
        $('#data-table2').DataTable({
			"order": [[ 4, "desc" ]]
	    });
    }
    if ($('#data-table3').length !== 0) {
        $('#data-table3').DataTable({
			"order": [[ 4, "desc" ]]
	    });
    }
    if ($('#data-table4').length !== 0) {
        $('#data-table4').DataTable({
			"order": [[ 0, "asc" ]]
	    });
    }
});

</script>