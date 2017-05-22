<?php $this->load->view('salon/includes/header'); ?>
<script>
checkUser(); // Update every 5 seconds 
function checkUser(){ 
	$.post("ajax_product/check_users"); // Sends request to update.php 
} 

</script>

<link href="assets/admin_temp/css/custom.css" rel="stylesheet" />
<link href="assets/admin_temp/css/chat.css" rel="stylesheet" />

	<script src="assets/admin_temp/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/admin_temp/js/dashboard.min.js"></script>
	<script src="assets/admin_temp/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			//Dashboard.init();
		});
	</script>

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
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
<?php $this->load->view('salon/includes/header_menu'); ?>
		
<?php $this->load->view('salon/includes/left_menu'); ?>
<?php $this->load->view('salon/includes/chat_list'); ?>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
<?php $this->load->view('salon/includes/address'); ?>
<?php $this->load->view($subview); ?>
</div>
		<!-- end #content -->
		
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});


</script>	
	
	<!-- ================== BEGIN BASE JS ================== -->
	<!--[if lt IE 9]>
		<script src="assets/admin_temp/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/admin_temp/crossbrowserjs/respond.min.js"></script>
		<script src="assets/admin_temp/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
<style>
.chatboxtextarea{
	width:100%;
}
</style>

</body>
</html>
