<link type="text/css" rel="stylesheet" media="all" href="assets/plugins/new_chat/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="assets/plugins/new_chat/css/screen.css" />
<!--<script type="text/javascript" src="js/chat/chat.js"></script>-->

<div id="wrapper" class="toggled" style="z-index:1">
    <div id="sidebar-wrapper" style="z-index:2">
	    <!--<form class="" action="">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="q" value="" onkeypress="search_item(this.value);" onkeydown="search_item(this.value);" onkeyup="search_item(this.value);" />
            </div>
        </form>-->
		<div style="clear:both"></div>
        <ul class="sidebar-nav historyBox" style="margin-top:40px" >
        	<!--<li><a href="javascript:void(0);" onclick="javascript:chatWith('6','Pawan' )">chat with User 1</a></li>-->
        </ul>
    </div>
</div>        


    

<script>
function search_item(id){
	$.ajax({
		url: 'chat/get_all',
		type: 'post',
		data: {lang_code: "<?=$lang_code?>",search_item:id,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		dataType: 'json',
		success: function(json) {	
			if(json.status=='ok'){
				$(".historyBox").html(json.msge);
				//window.location = '';
			}
			if(json.status=='error'){
				$(".historyBox").html('');
			}
		}
	});	
}

</script>
<script type="text/javascript">
$(document).ready(function(){
	getHistoryList();
});


setInterval("getHistoryList()", 10000); // Get users-online every 5 seconds 	
function getHistoryList(){
	$.ajax({
		url: 'chat/get_all',
		type: 'post',
		data: {lang_code: "<?=$lang_code?>",<?=$this->security->get_csrf_token_name();?>:'<?php echo $this->security->get_csrf_hash(); ?>'},
		dataType: 'json',
		success: function(json) {	
			if(json.status=='ok'){
				$(".historyBox").html(json.msge);
				//window.location = '';
			}
			if(json.status=='error'){
				$(".historyBox").html('');
			}
		}
	});	
}
</script>
<script>
setInterval("admin_update()", 5000); // Update every 5 seconds 
function admin_update(){ 
	$.post("chat/update"); // Sends request to update.php 
} 
</script>

