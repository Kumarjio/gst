<style>

.bg-orange { background: #f59c1a !important; }
.bg-orange-darker { background: #c47d15 !important; }
.bg-orange-lighter { background: #f7b048 !important; }



.bg-green { background: #00acac !important; }
.bg-green-darker { background: #008a8a !important; }
.bg-green-lighter { background: #33bdbd !important; }

.bg-blue { background: #348fe2 !important; }
.bg-blue-darker { background: #2a72b5 !important; }
.bg-blue-lighter { background: #5da5e8 !important; }


.bg-purple { background: #727cb6 !important; }
.bg-purple-darker { background: #5b6392 !important; }
.bg-purple-lighter { background: #8e96c5 !important; }

.widget {
    border-radius: 3px;
    margin-bottom: 20px;
    color: #fff;
    padding: 15px;
    overflow: hidden;
}
.widget.widget-stats {
    position: relative;
}
.widget-stats .stats-info h4 {
    font-size: 12px;
    margin: 5px 0;
    color: #fff;
}
.widget-stats .stats-icon {
    font-size: 42px;
    height: 56px;
    width: 56px;
    text-align: center;
    line-height: 56px;
    margin-left: 15px;
    color: #fff;
    position: absolute;
    right: 15px;
    top: 15px;
    opacity: 0.2;
    filter: alpha(opacity=20);
}
.widget-stats .stats-info p {
    font-size: 24px;
    font-weight: 300;
    margin-bottom: 0;
	color:#FFF;
}
.widget-stats .stats-link a {
    display: block;
    margin: 15px -15px -15px;
    padding: 7px 15px;
    background: url(../img/transparent/black-0.4.png);
    background: rgba(0,0,0,0.4);
    text-align: right;
    color: #ddd;
    font-weight: 300;
    text-decoration: none;
}
.widget-stats .stats-link a:hover, 
.widget-stats .stats-link a:focus {
    background: url(../img/transparent/black-0.6.png);
    background: rgba(0,0,0,0.6);
    color: #fff;
}
.widget-stats .stats-icon.stats-icon-lg {
    font-size: 52px;
    top: 12px;
    right: 21px;
}
.widget-stats .stats-title {
    position: relative;
    line-height: 1.1;
    font-size: 12px;
    margin: 2px 0 7px;
}
.widget-stats .stats-title,
.widget-stats .stats-desc {
    color: #fff;
    color: rgba(255,255,255,0.6);
}
.widget-stats .stats-desc {
    font-weight: 300;
    margin-bottom: 0;
}
.widget-stats .stats-number {
    font-size: 24px;
    font-weight: 300;
    margin-bottom: 10px;
}
.widget-stats .stats-progress {
    background: url('../img/transparent/black-0.2.png');
    background: rgba(0,0,0,0.2);
    height: 2px;
    margin: 0 -15px 12px;
}
.widget-stats .stats-progress .progress-bar {
    background: #fff;
}
</style>
<?php
$query = "SELECT *,`user_order_items`.`id` AS item_id FROM (`user_order_items`) JOIN `user_orders` ON `user_orders`.`id` = `user_order_items`.`order_id` WHERE payment=1 AND user_id='".$user_details->id."' AND `user_orders`.on_date ='".date('Y-m-d')."'";
$toDayOrder = $this->comman_model->get_query($query);

//$query = "SELECT * FROM problems WHERE user_id =".$user_details->id." and date_time > DATE_SUB('".date('Y-m-d')."', INTERVAL 1 WEEK) ORDER BY date_time DESC";
$query = "SELECT *,`user_order_items`.`id` AS item_id FROM (`user_order_items`) JOIN `user_orders` ON `user_orders`.`id` = `user_order_items`.`order_id` WHERE payment=1 AND user_id='".$user_details->id."' AND WEEKOFYEAR(on_date)=WEEKOFYEAR('".date('Y-m-d')."')";
$weekProblems = $this->comman_model->get_query($query);

$query = "SELECT *,`user_order_items`.`id` AS item_id FROM (`user_order_items`) JOIN `user_orders` ON `user_orders`.`id` = `user_order_items`.`order_id` WHERE payment=1 AND user_id='".$user_details->id."' AND YEAR(on_date)='".date('Y')."' and MONTH(on_date) = '".date('m')."'";
$monthOrder = $this->comman_model->get_query($query);

$query = "SELECT *,`user_order_items`.`id` AS item_id FROM (`user_order_items`) JOIN `user_orders` ON `user_orders`.`id` = `user_order_items`.`order_id` WHERE payment=1 AND user_id='".$user_details->id."' AND YEAR(on_date)='".date('Y')."' ";
$yearOrder = $this->comman_model->get_query($query);

?>


<div class="row" >
    <!-- begin col-3 -->                
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-blue" >
            <div class="stats-icon"><i class="fa fa-history"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($lang_id,313);?></h4>
                <p><?=print_count('search_saved',array('user_id'=>$user_detail->id))?></p>	
            </div>
            
        </div>
    </div>

<!--	<div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-calendar"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($lang_id,2039);?>Week Booking</h4>
                <p>0</p>	
            </div>
            
        </div>
    </div>    

    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-purple" >
            <div class="stats-icon"><i class="fa fa-calendar"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($lang_id,2039);?>Month Booking</h4>
                <p>0</p>	
            </div>
            
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats  bg-orange" >
            <div class="stats-icon"><i class="fa fa-calendar"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($lang_id,2039);?>Year Booking</h4>
                <p>0</p>	
            </div>
            
        </div>
    </div>-->

</div>

<!-- end row -->


<div class="row ">
	<div class="panel panel-inverse" style="">
    <div class="panel-heading">
        <div class="panel-heading-btn " >
			<div class="btn-group pull-right">
                <a href="javascript:void(0);" onclick="get_chart('day');" class="btn btn-primary m-r-5 m-b-5"><?=show_static_text($lang_id,91);?></a>
                <a href="javascript:void(0);" onclick="get_chart('month');" class="btn btn-primary m-r-5 m-b-5"><?=show_static_text($lang_id,92);?></a>
                <a href="javascript:void(0);" onclick="get_chart('year');" class="btn btn-primary m-r-5 m-b-5"><?=show_static_text($lang_id,93);?></a>
            </div>
        </div>
        <h4 class="panel-title" style="padding-bottom:20px;padding-top:20px"><i class="fa fa-globe"></i> <?=show_static_text($lang_id,301);?></h4>
        
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
	  url: "<?=$_user_link.'/ajax/ajaxOrderChart'?>",
	  type:'POST',
	  data:{type:'day',user_type:'user',<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
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
	  url: "<?=$_user_link.'/ajax/ajaxOrderChart'?>",
	  type:'POST',
	  data:{type:type,user_type:'user',<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
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


