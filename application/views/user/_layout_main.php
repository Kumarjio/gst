<?php $this->load->view('templates/includes/header'); ?>
<style>
.panel-title{
	font-weight:bold;
	border-bottom: solid 1px #CCC;
	padding-bottom:5px;
}
.col-md-12.page-title {
    border-bottom: 1px solid;
    margin-bottom: 50px;
}


/* css gurpreet */

.user-img {
    border-radius: 100%;
    box-shadow: 0 0 16px #000;
    height: 200px;
    margin: 0 auto;
    width: 200px;
    text-align: center;
}

.profile-usertitle {
 
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}


.panel-primary{
 border-color: rgb(255,153,0);	
}
.panel-primary > .panel-heading {
    background-color: rgb(255,153,0);
    border-color: rgb(255,153,0);
    color: #fff;
}
</style>

<?php
if(isset($table)){
?>


<link href="assets/admin_temp/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<script src="assets/admin_temp/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="assets/admin_temp/js/table-manage-default.demo.min.js"></script>

<script>
$(document).ready(function() {
	TableManageDefault.init();
});
</script>

<?php
}
?>


<body>
<?php $this->load->view('templates/includes/menu.php'); ?>

<div class="user_wrapper" style="margin-top:30px">
	<div class="container">
   
    <div class="row">
	<div class="col-md-12 pull page-title">
		<div class="pull-left">
	   	<h3><b>Dashboard</b></h3>
    </div>
    <div class="pull-right">
    <h3 style="color:rgb(255,153,0);"><b>  <?=$user_details->first_name.' '.$user_details->last_name;?> </b></h3>
    </div> 
		
	</div>
	</div>

     <div class="row">

		<?php $this->load->view('user/includes/left_menu'); ?>

	 	<div class="col-md-9">
	            <?php $this->load->view('user/includes/address'); ?>
				<?php $this->load->view($subview); ?>  
	   </div> <!-- col-md-9 close-->
</div> <!-- row close-->
  
 </div><!-- container close-->
</div>
	<!-- end page container -->

<?php $this->load->view('templates/includes/footer.php'); ?>
</body>
</html>

