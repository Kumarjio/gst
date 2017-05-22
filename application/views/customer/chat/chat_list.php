<?php echo smiley_js();?>
<style>
.table th{
	vertical-align:top !important;
}
</style>
		<div class="box-border" >

<div class="page-title">
	<h3 style="color:#666666;border-bottom:1px solid #e7e7e7;padding-bottom:10px"><?=$name;?></h3>
</div>
<div class="portlet-body">
    <section class="content chat-content" style="background-color:#ECECEC">
	                <div class="row">
                        <div class="col-md-12">
                        <div class="row">
<!-- start content -->
<div id="content" style="padding:3px 0 30px;">
                        <div class="col-md-3">
						    <div class="chat" style="">
        <div class="chat_menu">
        		<div style="float:left">Online</div>
                <!--<div style="float:right"><a href="" id="all_user" >All</a>&nbsp;|&nbsp;<a href="" id="online_user" >Online</a></div>-->
                <div class="clear" style="clear:both"></div></div>
            <div class="chat_list">        
	            <div class="listBox">
    	        	<div id="all_user_data">
        	        </div>
            	</div>
			</div>
        </div>
						</div><!--//col-md-3//-->
                            <div class="col-md-9">
								<div class="chat_right" style="">
        <section class="panel" > 
            <header class="panel-heading" >Chat</header> 
            <section class="panel-body chat-list" style="min-height:458px;"> 
            	<div class="refresh"></div> 
            </section>                 
        </section>
    </div>
                        </div>
    
    <div style="clear:both" class="clear"></div>
</div><!--//content//-->
</div><!--//row//-->
                        </div>
			
                    </div>
                </section>
    
</div>
</div>

<style>
.tables_view table td{
	padding:4px;
}
.article{
	border:solid 1px #D7D7D7;
	border-radius:5px;
	padding:7px;
}

.article_content{
	float:left !important;
	margin:15px 10px 15px;
	height:380px;
}

</style> 
<link rel="stylesheet" href="assets/plugins/chat/chat.css" type="text/css" />
<script>
$(document).ready(function(){
	getList();
	$("#all_user").click(function(){
		show_data1('get_all_list');
		//alert('hello');
		return false;
	});
	
	$("#online_user").click(function(){
		show_data1('get_list');
		//alert('hello');
		return false;
	});
});
	

setInterval("getList()", 5000); // Get users-online every 5 seconds 
function getList(){
//	alert($(".listBox:first-child").attr("id"));
	show_data = $('.listBox').children('div').attr('id');
 	if(show_data =='all_user_data'){
		$.post("<?=$lang_code?>/chat/get_all_list", function(list){ 
			$(".listBox").html(list);
		}); 
	}
	else{
		$.post("<?=$lang_code?>/chat/get_list", function(list){ 
			$(".listBox").html(list);
		}); 
	}
} 	

function show_data1(name){
	$.ajax({
	   type: "POST",
	   url: "<?=$lang_code?>/chat/"+name,  
	   beforeSend: function () {
		  $(".listBox").html("Loading ...");
		},
	   success: function(msg){
			$(".listBox").html(msg);
	   }
	});
}


</script>
<!--<script type="text/javascript">
$(document).ready(function(){
	$("#textb").keyup(function(e) {	 
    	var code = e.keyCode || e.which;
      	if(code == 13) { //Enter keycode
			$("#submitForm").trigger("submit");
      	}     
	});		
});

function getMgse(){ 
	girl_id = $('#user_id').val();
	$('.refresh').load('<?=$lang_code?>/chat/views/'+girl_id);
	$("section").animate({ scrollTop: $('.refresh').height() }, 1000);
	
}

$.ajaxSetup ({
	cache: false	
});

$(setInterval("getMgse()", 3000));
	
$(function() {	
	$('#submitForm').submit(function(){
		var user_id = $('#texta').val();
		var username = $('#girl_name').val();
		var message = $.trim($('#textb').val());
/*		var recipient_id = $('#user_id').val();
		var recipient = $('#user_name').val();*/
		if (message == "" || message == "Say something"||message==null) {
			$('#textb').val('');
			return false;
		}
		//var dataString = 'user_id=' + user_id + '&user_name=' + username + '&message=' + message + '&recipient_id=' + recipient_id + '&recipient=' + recipient;
		var dataString = 'user_id=' + user_id + '&user_name=' + username + '&message=' + message;
		
		$.ajax({
			type: "POST",
			url: "<?=$lang_code?>/chat/send_chat",
			data: dataString,
			success: function() {
				getMgse();
				$('#textb').val('');
				//document.newMessage.textb.value = "";
			}
		});
		return false;
	});
});
</script>-->
