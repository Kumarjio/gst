<?php $this->load->view('templates/includes/header'); ?>
<style>
.panel-title{
	font-weight:bold;
	border-bottom: solid 1px #CCC;
	padding-bottom:5px;
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

