<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2015 &copy; <?php echo $settings['site_name'];?>.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->


<!-- BEGIN PAGE LEVEL PLUGINS -->


<!-- END CORE PLUGINS -->

<script src="assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script>
$(document).ready(function() {
    $('.coupon_featured').change(function() {
		var id = $(this).attr('id');
        if($(this).is(":checked")) {
		    $.ajax({
			   type: "POST",
			   url: "admin/coupon/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:1,action:'featured'},
			   beforeSend: function () {
					$("#show_class").html("Loading ...");
				},
			   success: function(msg){
					$("#show_class").html(msg);
			   }
	       });
/*            var returnVal = confirm("Are you sure?");
            $(this).attr("checked", returnVal);			
*/        }
		else{
		    $.ajax({
			   type: "POST",
			   url: "admin/coupon/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:0,action:'featured'},
			   beforeSend: function () {
				  $("#show_class").html("Loading ...");
				},
			   success: function(msg){
				$("#show_class").html(msg);
			   }
	       });
		}
    });

    $('.coupon_printable').change(function() {
		var id = $(this).attr('id');
        if($(this).is(":checked")) {
		    $.ajax({
			   type: "POST",
			   url: "admin/coupon/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:1,action:'printable'},
			   beforeSend: function () {
				  $("#show_class").html("Loading ...");
				},
			   success: function(msg){
				 //alert(msg);
				//location.reload();
				$("#show_class").html(msg);
			   }
	       });

/*            var returnVal = confirm("Are you sure?");
            $(this).attr("checked", returnVal);			
*/        }
		else{
		    $.ajax({
			   type: "POST",
			   url: "admin/coupon/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:0,action:'printable'},
			   beforeSend: function () {
				  $("#show_class").html("Loading ...");
				},
			   success: function(msg){
				 //alert(msg);
				//location.reload();
				$("#show_class").html(msg);
			   }
	       });
		}
    });
	//website
    $('.website_featured').change(function() {
		var id = $(this).attr('id');
        if($(this).is(":checked")) {
		    $.ajax({
			   type: "POST",
			   url: "admin/website/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:1,action:'featured'},
			   beforeSend: function () {
					$("#show_class").html("Loading ...");
				},
			   success: function(msg){
					$("#show_class").html(msg);
			   }
	       });
        }
		else{
		    $.ajax({
			   type: "POST",
			   url: "admin/website/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:0,action:'featured'},
			   beforeSend: function () {
				  $("#show_class").html("Loading ...");
				},
			   success: function(msg){
				$("#show_class").html(msg);
			   }
	       });
		}
    });

	//website
    $('.website_shopping').change(function() {
		var id = $(this).attr('id');
        if($(this).is(":checked")) {
		    $.ajax({
			   type: "POST",
			   url: "admin/website/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:1,action:'shopping'},
			   beforeSend: function () {
				  $("#show_class").html("Loading ...");
				},
			   success: function(msg){
				 //alert(msg);
				//location.reload();
				$("#show_class").html(msg);
			   }
	       });

/*            var returnVal = confirm("Are you sure?");
            $(this).attr("checked", returnVal);			
*/        }
		else{
		    $.ajax({
			   type: "POST",
			   url: "admin/website/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:0,action:'shopping'},
			   beforeSend: function () {
				  $("#show_class").html("Loading ...");
				},
			   success: function(msg){
				 //alert(msg);
				//location.reload();
				$("#show_class").html(msg);
			   }
	       });
		}
    });
});
</script>
<script>
$(document).ready(function() {
    $('.coupon_featured').change(function() {
		var id = $(this).attr('id');
        if($(this).is(":checked")) {
		    $.ajax({
			   type: "POST",
			   url: "admin/coupon/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:1,action:'featured'},
			   beforeSend: function () {
					$("#show_class").html("Loading ...");
				},
			   success: function(msg){
					$("#show_class").html(msg);
			   }
	       });
/*            var returnVal = confirm("Are you sure?");
            $(this).attr("checked", returnVal);			
*/        }
		else{
		    $.ajax({
			   type: "POST",
			   url: "admin/coupon/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:0,action:'featured'},
			   beforeSend: function () {
				  $("#show_class").html("Loading ...");
				},
			   success: function(msg){
				$("#show_class").html(msg);
			   }
	       });
		}
    });

    $('.coupon_printable').change(function() {
		var id = $(this).attr('id');
        if($(this).is(":checked")) {
		    $.ajax({
			   type: "POST",
			   url: "admin/coupon/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:1,action:'printable'},
			   beforeSend: function () {
				  $("#show_class").html("Loading ...");
				},
			   success: function(msg){
				 //alert(msg);
				//location.reload();
				$("#show_class").html(msg);
			   }
	       });

/*            var returnVal = confirm("Are you sure?");
            $(this).attr("checked", returnVal);			
*/        }
		else{
		    $.ajax({
			   type: "POST",
			   url: "admin/coupon/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:0,action:'printable'},
			   beforeSend: function () {
				  $("#show_class").html("Loading ...");
				},
			   success: function(msg){
				 //alert(msg);
				//location.reload();
				$("#show_class").html(msg);
			   }
	       });
		}
    });
	//website
    $('.website_featured').change(function() {
		var id = $(this).attr('id');
        if($(this).is(":checked")) {
		    $.ajax({
			   type: "POST",
			   url: "admin/website/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:1,action:'featured'},
			   beforeSend: function () {
					$("#show_class").html("Loading ...");
				},
			   success: function(msg){
					$("#show_class").html(msg);
			   }
	       });
        }
		else{
		    $.ajax({
			   type: "POST",
			   url: "admin/website/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:0,action:'featured'},
			   beforeSend: function () {
				  $("#show_class").html("Loading ...");
				},
			   success: function(msg){
				$("#show_class").html(msg);
			   }
	       });
		}
    });

	//website
    $('.website_shopping').change(function() {
		var id = $(this).attr('id');
        if($(this).is(":checked")) {
		    $.ajax({
			   type: "POST",
			   url: "admin/website/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:1,action:'shopping'},
			   beforeSend: function () {
				  $("#show_class").html("Loading ...");
				},
			   success: function(msg){
				 //alert(msg);
				//location.reload();
				$("#show_class").html(msg);
			   }
	       });

/*            var returnVal = confirm("Are you sure?");
            $(this).attr("checked", returnVal);			
*/        }
		else{
		    $.ajax({
			   type: "POST",
			   url: "admin/website/set_option", /* The country id will be sent to this file */
			   data: {id:id,value:0,action:'shopping'},
			   beforeSend: function () {
				  $("#show_class").html("Loading ...");
				},
			   success: function(msg){
				 //alert(msg);
				//location.reload();
				$("#show_class").html(msg);
			   }
	       });
		}
    });
});
</script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features 
});
</script>
<!--table-->
<?php
if($active=='home'){
?>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
});
</script>
<?php
}
?>
<!--<link href="assets/plugins/select2/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="assets/plugins/select2/select2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#select_category').select2({placeholder: "Select Category"});
	$('#user_email').select2({placeholder: "Select Email-ID"});
	$('#select_banner').select2({placeholder: "Select Position"});
	$('#select_website').select2({placeholder: "Select Website"});
});

</script>
-->
<link rel="stylesheet" media="screen" href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css">
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script >
$(function() {
	$('.datepicker').datepicker({
	 format: 'yyyy-mm-dd',	
	});
});
</script>
<!--for table-->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<script>
jQuery(document).ready(function() {       
   //	TableAdvanced.init();
});
</script>


<!-- END JAVASCRIPTS -->

<script type="text/javascript" src="assets/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
/*tinymce.init({
    selector: "textarea",
    menubar : false
 });
*/</script>
<script type="text/javascript">

tinymce.init({
    selector: "#textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
tinymce.init({
    selector: ".textarea",
    menubar : false
 });

</script>

