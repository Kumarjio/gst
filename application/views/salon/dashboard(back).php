<?php
$problems = $this->comman_model->get_by('problems',array('user_id'=>$user_details->id),false,false,false);
?>

<!-- begin row -->
<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon"><i class="fa fa-list"></i></div>
            <div class="stats-info">
                <h4>Ticket <?=show_static_text($lang_id,2390);?></h4>
                <p><?=count($problems)?></p>	
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
					<!--<div class="chart_clicks">User</div>-->
					<div id="chart1" class="example-chart"  style="height:300px;width:100%;float:left"></div>
					<div style="clear:both"></div>
					<!--<div style="font-size:18px;margin-left:600px">Country</div>-->
				    <br>
				</div>
                </div>
    </div>
</div>
</div>



<div class="row ">
	<div class="panel panel-inverse" style="">
    <div class="panel-heading">
        <h4 class="panel-title" style="">Ticket</h4>
        
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="sample_6">
<?php
$this->db->order_by('id','desc');
$this->db->limit(10);
$all_data = $this->comman_model->get_by('problems',array('user_id'=>$user_details->id), FALSE, FALSE, false);		
?>
                <thead>
                <tr>
	                <th><?=show_static_text($lang_id,2440);?>S. No.</th>
	                <th><?=show_static_text($lang_id,1580);?>Ticket</th>
	                <th><?=show_static_text($lang_id,1600);?>Information</th>
                    <th><?=show_static_text($lang_id,1007);?>Ticket Created</th>
                    <th><?=show_static_text($lang_id,1007);?>Response Time</th>
                    <th><?=show_static_text($lang_id,1007);?>User Time</th>
                    <th><?=show_static_text($lang_id,1007);?>Status</th>
	                <th><?=show_static_text($lang_id,258);?></th>
                </tr>
                </thead>
                <tbody>

<?php
if(count($all_data)){
	$i=0;
	foreach($all_data as $set_data){
		$statusClass = '';
		$storeName ='-';
		$statusName ='-';
		$i++;
		if($set_data->ticket_id!=0){
			$storeData = $this->comman_model->get_by('tickets',array('id'=>$set_data->ticket_id),false,false,true);
			if($storeData){
				$storeName = $storeData->name;
			}
		}		
/*$this->db->order_by('id','desc');
$cheekStatus = $this->comman_model->get_by('problems_status',array('problem_id'=>$set_data->id),false,false,true);
if($cheekStatus){
	$statusName = $cheekStatus->status;
}*/
		if(!empty($set_data->status)){
			if($set_data->status=='Completed'){
				$statusClass = 'label label-sm label-success';
			}
			else{
				$statusClass = 'label label-sm label-danger';
			}
			$statusName = $set_data->status;
		}

?>
    <tr>
        <td><?=$i; ?></td>
        <td><?=$storeName;?></td>
        <td>
		<?php //echo $set_data->name; ?>
<?php
$html = strip_tags($set_data->desc);
$html = html_entity_decode($html, ENT_QUOTES, 'UTF-8');    
echo (strlen($html)>=100)?substr($html, 0 ,100).'...':$html;
?>
        </td>
       	<td><?=$set_data->date.' '.$set_data->time;?></td>
       <td><?=$set_data->solve_time;?> Hrs</td>
       <td><?=$set_data->solve_user_time;?> Hrs</td>
		<td><span class="<?=$statusClass?>"><?=$statusName;?></span></td>

        <td>
<a class="btn btn-icon-only btn-info" href="<?=$lang_code?>/customer_ticket/view/<?php echo $set_data->id;?>" >
        <i class="fa fa-eye"></i></a>
                 </td>							
    </tr>
<?php             
   }
}
?>                        

                </tbody>                
                </table>
        </div>
    </div>
</div>
</div>




      <div class="row">
<div class="portlet-body">
<h1>Ticket</h1>
 
                
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
	  url: "ajax_chart/chart",
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
	  url: "ajax_chart/chart",
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



<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
