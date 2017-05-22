<?php
$query = "SELECT * FROM problems where on_date ='".date('Y-m-d')."' and user_id =".$user_details->id;
$toDayOrder = $this->comman_model->get_query($query);

//$query = "SELECT * FROM problems WHERE user_id =".$user_details->id." and date_time > DATE_SUB('".date('Y-m-d')."', INTERVAL 1 WEEK) ORDER BY date_time DESC";
$query = "SELECT * FROM problems WHERE user_id =".$user_details->id." and WEEKOFYEAR(date_time)=WEEKOFYEAR('".date('Y-m-d')."')";
$weekProblems = $this->comman_model->get_query($query);

$query = "SELECT * FROM problems where YEAR(on_date)='".date('Y')."' and MONTH(on_date) = '".date('m')."' and user_id =".$user_details->id;
$monthOrder = $this->comman_model->get_query($query);

$query = "SELECT * FROM problems where YEAR(on_date)='".date('Y')."' and user_id =".$user_details->id;
$yearOrder = $this->comman_model->get_query($query);

//$this->db->order_by('solve_user_time','asc');
$urgentTicket = $this->comman_model->get_by('problems',array('status !='=>'Completed','solve_user_time'=>1,'user_id'=>$user_details->id),false,false,false);
$openTicket = $this->comman_model->get_by('problems',array('status'=>'Open','user_id'=>$user_details->id),false,false,false);
$ProcessingTicket = $this->comman_model->get_by('problems',array('status'=>'Processing','user_id'=>$user_details->id),false,false,false);
$CompleteTicket = $this->comman_model->get_by('problems',array('status'=>'Completed','user_id'=>$user_details->id),false,false,false);
$problems = $this->comman_model->get_by('problems',array('user_id'=>$user_details->id),false,false,false);
?>

<!-- begin row -->
<div class="row" >
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-red" style="">
            <div class="stats-icon"><i class="fa fa-info-circle"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($lang_id,2039);?>Urgent Ticket</h4>
                <p><?=count($urgentTicket)?></p>	
            </div>
            
        </div>
    </div>

	<div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-aqua" style="">
            <div class="stats-icon"><i class="fa fa-pencil-square-o "></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($lang_id,2039);?>Open Ticket</h4>
                <p><?=count($openTicket)?></p>	
            </div>
            
        </div>
    </div>
    
    <!-- begin col-3 -->                
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats " style="background:#953579">
            <div class="stats-icon"><i class="fa fa-line-chart"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($lang_id,2039);?>In Progress Ticket</h4>
                <p><?=count($ProcessingTicket)?></p>	
            </div>
            
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats " style="background:#993300">
            <div class="stats-icon"><i class="fa fa-check-square-o "></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($lang_id,2039);?>Completed Ticket</h4>
                <p><?=count($CompleteTicket)?></p>	
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



<!--<div class="row ">
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
</div>-->

<div class="row ">
<div class="panel panel-inverse" style="">
    <div class="panel-heading">
        <h4 class="panel-title">Tickets to be reviewed within 1 Hr</h4>
    </div>
    <div class="panel-body">
<?php
$query = "select * from problems where (time_to_sec(timediff(DATE_ADD(date_time,INTERVAL solve_user_time HOUR),'".date('Y-m-d H:i:s')."')) / 3600) <1 And status != 'Completed' AND user_id=".$user_details->id;

$all_data = $this->comman_model->get_query($query);;
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="data-table">
    <thead>
    <tr>
        <th><?=show_static_text($lang_id,2440);?>S. No.</th>
        <th><?=show_static_text($lang_id,1580);?>Ticket</th>
        <th><?=show_static_text($lang_id,1600);?>Inforamation</th>
        <th><?=show_static_text($lang_id,1007);?>Ticket Created</th>
        <th><?=show_static_text($lang_id,1600);?>Status</th>
        <th><?=show_static_text($lang_id,258);?></th>
    </tr>
    </thead>
    <tbody>

<?php
if(count($all_data)){
$i=0;
foreach($all_data as $set_data){
$i++;
$statusName ='-';
$userName ='-';
$storeName ='-';
if($set_data->ticket_id!=0){
$storeData = $this->comman_model->get_by('tickets',array('id'=>$set_data->ticket_id),false,false,true);
if($storeData){
    $storeName = $storeData->name;
}
}	

if($set_data->user_id!=0){
$userData = $this->comman_model->get_by('users',array('id'=>$set_data->user_id),false,false,true);
if($userData){
    $userName = $userData->first_name.' '.$userData->last_name;
}
}		

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
<td><?php //echo $set_data->name; ?>
<?php
$html = strip_tags($set_data->desc);
$html = html_entity_decode($html, ENT_QUOTES, 'UTF-8');    
echo (strlen($html)>=100)?substr($html, 0 ,100).'...':$html;
?>

</td>
<td><?=$set_data->date.' '.$set_data->time;?></td>
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

<div class="panel panel-inverse" style="">
    <div class="panel-heading">
        <h4 class="panel-title">Tickets to be reviewed within 4 Hrs</h4>
    </div>
    <div class="panel-body">
<?php
$query = "select * from problems where (time_to_sec(timediff(DATE_ADD(date_time,INTERVAL solve_user_time HOUR),'".date('Y-m-d H:i:s')."' )) / 3600) <4 And (time_to_sec(timediff(DATE_ADD(date_time,INTERVAL solve_user_time HOUR),'".date('Y-m-d H:i:s')."' )) / 3600) >1 and status != 'Completed' AND user_id=".$user_details->id;
$all_data2 = $this->comman_model->get_query($query);;
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="data-table2">
    <thead>
    <tr>
        <th><?=show_static_text($lang_id,2440);?>S. No.</th>
        <th><?=show_static_text($lang_id,1580);?>Ticket</th>
        <th><?=show_static_text($lang_id,1600);?>Inforamation</th>
        <th><?=show_static_text($lang_id,1007);?>Ticket Created</th>
        <th><?=show_static_text($lang_id,1600);?>Status</th>
        <th><?=show_static_text($lang_id,258);?></th>
    </tr>
    </thead>
    <tbody>

<?php
if(count($all_data2)){
$i=0;
foreach($all_data2 as $set_data){
$i++;
$statusName ='-';
$userName ='-';
$storeName ='-';
if($set_data->ticket_id!=0){
$storeData = $this->comman_model->get_by('tickets',array('id'=>$set_data->ticket_id),false,false,true);
if($storeData){
    $storeName = $storeData->name;
}
}	


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
<td><?php //echo $set_data->name; ?>
<?php
$html = strip_tags($set_data->desc);
$html = html_entity_decode($html, ENT_QUOTES, 'UTF-8');    
echo (strlen($html)>=100)?substr($html, 0 ,100).'...':$html;
?>

</td>
<td><?=$set_data->date.' '.$set_data->time;?></td>
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

<div class="panel panel-inverse" style="">
    <div class="panel-heading">
        <h4 class="panel-title">Tickets to be reviewed within 8 Hrs</h4>
    </div>
    <div class="panel-body">
<?php
$query = "select * from problems where (time_to_sec(timediff( DATE_ADD(date_time,INTERVAL solve_user_time HOUR),'".date('Y-m-d H:i:s')."' )) / 3600) <8 And (time_to_sec(timediff( DATE_ADD(date_time,INTERVAL solve_user_time HOUR),'".date('Y-m-d H:i:s')."' )) / 3600) >4  and status != 'Completed' AND user_id=".$user_details->id;
$all_data3 = $this->comman_model->get_query($query);
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="data-table3">
        <thead>
        <tr>
            <th><?=show_static_text($lang_id,2440);?>S. No.</th>
            <th><?=show_static_text($lang_id,1580);?>Ticket</th>
            <th><?=show_static_text($lang_id,1600);?>Inforamation</th>
            <th><?=show_static_text($lang_id,1007);?>Ticket Created</th>
            <th><?=show_static_text($lang_id,1600);?>Status</th>
            <th><?=show_static_text($lang_id,258);?></th>
        </tr>
        </thead>
        <tbody>
    
<?php
if(count($all_data3)){
    $i=0;
    foreach($all_data3 as $set_data){
		$i++;
		$statusName ='-';
		$userName ='-';
		$storeName ='-';
    if($set_data->ticket_id!=0){
		$storeData = $this->comman_model->get_by('tickets',array('id'=>$set_data->ticket_id),false,false,true);
		if($storeData){
			$storeName = $storeData->name;
		}
    }	
    
    
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
    <td><?php //echo $set_data->name; ?>
    <?php
    $html = strip_tags($set_data->desc);
    $html = html_entity_decode($html, ENT_QUOTES, 'UTF-8');    
    echo (strlen($html)>=100)?substr($html, 0 ,100).'...':$html;
    ?>
    
    </td>
    <td><?=$set_data->date.' '.$set_data->time;?></td>
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

<div class="panel panel-inverse" style="">
    <div class="panel-heading">
        <h4 class="panel-title">Completed Tasks</h4>
    </div>
    <div class="panel-body">
<div class="table-responsive">
<?php
$all_data4 = $this->comman_model->get_by('problems',array('status'=>'Completed','user_id'=>$user_details->id),false,false,false);
//$all_data4 = $this->comman_model->get_query($query);;
?>
<table class="table table-striped table-bordered table-hover" id="data-table4">
    <thead>
    <tr>
        <th><?=show_static_text($lang_id,2440);?>S. No.</th>
        <th><?=show_static_text($lang_id,1580);?>Ticket</th>
        <th><?=show_static_text($lang_id,1600);?>Inforamation</th>
        <th><?=show_static_text($lang_id,1007);?>Ticket Created</th>
        <th><?=show_static_text($lang_id,1600);?>Status</th>
        <th><?=show_static_text($lang_id,258);?></th>
    </tr>
    </thead>
    <tbody>

<?php
if(count($all_data4)){
$i=0;
foreach($all_data4 as $set_data){
$i++;
$statusName ='-';
$userName ='-';
$storeName ='-';
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
<td><?php //echo $set_data->name; ?>
<?php
$html = strip_tags($set_data->desc);
$html = html_entity_decode($html, ENT_QUOTES, 'UTF-8');    
echo (strlen($html)>=100)?substr($html, 0 ,100).'...':$html;
?>

</td>
<td><?=$set_data->date.' '.$set_data->time;?></td>
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

<link href="assets/admin_temp/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<script src="assets/admin_temp/plugins/DataTables/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
    if ($('#data-table').length !== 0) {
        $('#data-table').DataTable({
			"order": [[ 4, "desc" ]]
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