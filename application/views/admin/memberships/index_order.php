<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box grey-cascade">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i><?php echo $name;?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="admin/category/edit"class="btn green">
                                Add New <i class="fa fa-plus"></i>
                                </a>
		    <input type="button" id="save" value="Save" class="btn btn-primary" />

                            </div>
                        </div>
                    </div>
                </div>
    <p class="alert alert-info">Drag to category and then click 'Save'</p>
    <div id="orderResult" style=""></div>


            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
    <div style="clear:both"></div>





<script>
function confirm_box(){
    var answer = confirm ("Are you sure?");
    if (!answer)
     return false;
}
</script>



<link href="assets/plugins/nestedsortable/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/plugins/nestedsortable/css/admin.css" rel="stylesheet">
<script src="assets/plugins/nestedsortable/jquery.mjs.nestedSortable.js"></script>

<script>
$(function(){
    $.post('<?=site_url('admin/category/order_ajax')?>', {}, function(data){
        $('#orderResult').html(data); 
    });    

	$('#save').click(function(){
		oSortable = $('.sortable').nestedSortable('toArray');

		$('#orderResult').slideUp(function(){
			$.post('<?php echo site_url('admin/category/order_ajax'); ?>', { sortable: oSortable }, function(data){
				$('#orderResult').html(data);
				$('#orderResult').slideDown();
			});
		});
		
	});
})
</script>

<style>
.options {
  background: none !important;
  border: none !important;
  padding: 0px !important;
}

.sortable li div{
	height:38px;
}
</style>
