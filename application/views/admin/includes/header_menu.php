<style>
#header{
	position:relative;
}
.header {
  margin-left:250px;
}
.page-sidebar-minified .header {
  margin-left:60px;
}

</style>
<style>
.header-box .widget {
  margin-top: 5px;
  margin-bottom: 5px;
}
@media(max-width: 768px) {
#header{
	position:fixed;
}

.header {
  margin-left:0px;
}

.header-box{
	display:none;
}
}
/*.header-box .widget-stats .stats-info h4 {
  color: #fff;
  font-size: 12px;
  margin: 0;
}
.header-box  .widget-stats .stats-icon {
  color: #fff;
  font-size: 28px;
  line-height: 10px;
  text-align: center;
}
.header-box .widget {
  margin-top: 1px;
  margin-bottom: 1px;
  padding: 0 4px;
}
.header-box  .widget-stats .stats-info p {
  font-size: 15px;
  font-weight: 300;
  margin-bottom: 0;
}
.header-box .widget-stats .stats-icon {
  height: 29px;
  top: 15px;
  width: 56px;
}
.header-box .col-md-2{
	padding:0 7px;
}*/
</style>
        


		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<!--<a href="" class="navbar-brand"></a>-->
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
<?php
$query = "SELECT * FROM problems where on_date ='".date('Y-m-d')."'";
$toDayOrder = $this->comman_model->get_query($query);

//$query = "SELECT * FROM problems WHERE date_time > DATE_SUB('".date('Y-m-d')."', INTERVAL 1 WEEK) ORDER BY date_time DESC";
$query = "SELECT * FROM problems WHERE WEEKOFYEAR(date_time)=WEEKOFYEAR('".date('Y-m-d')."');";
$weekProblems = $this->comman_model->get_query($query);

$query = "SELECT * FROM problems where YEAR(on_date)='".date('Y')."' and MONTH(on_date) = '".date('m')."'";
$monthOrder = $this->comman_model->get_query($query);

$query = "SELECT * FROM problems where YEAR(on_date)='".date('Y')."'";
$yearOrder = $this->comman_model->get_query($query);

//$this->db->order_by('solve_user_time','asc');
/*$urgentTicket = $this->comman_model->get_by('problems',array('status !='=>'Completed','solve_user_time'=>1),false,false,false);
$openTicket = $this->comman_model->get_by('problems',array('status'=>'Open'),false,false,false);
$ProcessingTicket = $this->comman_model->get_by('problems',array('status'=>'Processing'),false,false,false);
$CompleteTicket = $this->comman_model->get_by('problems',array('status'=>'Completed'),false,false,false);
*/
$user1 = $this->comman_model->get_by('users',array('account_type'=>'U'),false,false,false);
$user2 = $this->comman_model->get_by('users',array('account_type'=>'S'),false,false,false);

?>

<!-- BEGIN DASHBOARD STATS -->
<?php
$problems = $this->comman_model->get('problems',false);
?>
			
<!-- begin row -->
<!--<div class="header-box" style="float:left;width:74%">-->
<?php
if($active=='home'){
?>
<div class="header-box" style="">
<div class="row" >
    <!-- begin col-3 -->                
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-blue" >
            <div class="stats-icon"><i class="fa fa-history"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($adminLangSession['lang_id'],2039);?>Today Booking</h4>
                <p><?=count($toDayOrder)?></p>	
            </div>
            
        </div>
    </div>
    <!-- end col-3 -->

	<div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-calendar"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($adminLangSession['lang_id'],2039);?>Week Booking</h4>
                <p><?=count($weekProblems)?></p>	
            </div>
            
        </div>
    </div>
    
    <!-- begin col-3 -->                
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-purple" >
            <div class="stats-icon"><i class="fa fa-calendar"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($adminLangSession['lang_id'],2039);?>Month Booking</h4>
                <p><?=count($monthOrder)?></p>	
            </div>
            
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats  bg-orange" >
            <div class="stats-icon"><i class="fa fa-calendar"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($adminLangSession['lang_id'],2039);?>Year Booking</h4>
                <p><?=count($yearOrder)?></p>	
            </div>
            
        </div>
    </div>

</div>
<div class="row" >
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-red" style="">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($adminLangSession['lang_id'],2039);?>Total Service Provider</h4>
                <p><?=count($user2)?></p>	
            </div>
            
        </div>
    </div>

	<div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-aqua" style="">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
                <h4><?=show_static_text($adminLangSession['lang_id'],2039);?>Total Customer</h4>
                <p><?=count($user1)?></p>	
            </div>
            
        </div>
    </div>
    

</div>
</div>
<?php
}
else{
?>
<style>
#header{
	display:none
}	
@media(max-width: 768px) {
	#header{
		display:block;
	}	
}

</style>
<?php
}
?>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->




<script>
function set_lang(id){
	$.ajax({
		type:"POST",
		url:"<?=$admin_link?>/account/set_lang",
		data:{id:id,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		dataType:'json',
		success:function(data){
			location.reload();			
		}
	});
	

}
</script>

