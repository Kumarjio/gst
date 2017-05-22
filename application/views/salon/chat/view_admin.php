<link rel="stylesheet" href="assets/plugins/chat/chat.css" type="text/css" />
<style>
.media-body{
	width:94%;
}
</style>
<?php echo smiley_js();?>
<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                                
                <h4 class="panel-title"><?=$name?></h4>
            </div>

<div class="panel-body">
<section class="chat-content" style="background-color:#ECECEC">
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
            <header class="panel-heading" style="padding:6px 10px" >
                    <strong style="font-size:20px;">Admin</strong>
                    <div class="clearfix"></div>
	                    
            </header> 
            <section class="panel-body chat-list"> 
            	<div class="refresh"></div> 
            </section> 

                <article class="chat-item " id="chat-form" style="padding:0px 4px;">
                	
<?php
if(!empty($user_details->image)){
	$set_image = 'assets/uploads/users/thumbnails/'.$user_details->image;
}
else{
	$set_image = 'assets/uploads/profile.jpg';
}
?>                    

                	<a class="pull-left thumb-small avatar" style="margin-top:10px">
                    
                    <img src="<?php echo $set_image;?>" style="height:35px;width:45px" class="img-circle"></a> 
              <section class="" style="padding:3px 0px"> 
            <form action="#" class="m-b-none" id="submitForm" method="post" onSubmit="return false">
					<input name="girl_id" type="hidden" id="texta" value="<?php echo $user_details->id;?>"/>
					<input name="girl_name" type="hidden" id="girl_name" value="<?php echo $user_details->first_name;?>"/>
					<input name="user_name" type="hidden" id="user_name" value="admin"/>
					<input name="user_id" type="hidden" id="user_id" value="0"/>
                <div class="input-group">
                <textarea id="textb" name="textb" placeholder="Type message" class="form-control" style="height:50px"></textarea>
                <span class="input-group-btn"> 
                    <div class="navigationMenu">
                      <img src="assets/plugins/chat/images/menu.png" width="30" height="30">
                      <span class="icons-table"><?php echo $smiley_table; ?></span>
                      <div class="clear"></div>
                    </div>
				<br>
                <button class="btn btn-primary" type="submit">Send</button> </span> </div> </form>

                
                     </section> </article>
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
        <!-- end panel -->
    </div>
</div>


<style>
.date-time {
  font-size: 24px;
  font-weight: bold;
  height: 30px;
  line-height: 30px;
  margin: 0;
  padding: 0;
  text-align: center;
  width: 150px;
}
</style>

<script>
$(document).ready(function(){
	//getList();
	//getHistoryList();
	$("#all_user").click(function(){
		show_data1('get_all_list');
		//alert('hello');
		return false;
	});
	
});

	

setInterval("getList()", 5000); // Get users-online every 5 seconds 
function getList(){
//	alert($(".listBox:first-child").attr("id"));
	show_data = $('.listBox').children('div').attr('id');
		$.post("<?=$lang_code?>/chat/get_all_list", function(list){ 
			$(".listBox").html(list);
		}); 
/* 	if(show_data =='all_user_data'){
		$.post("<?=$lang_code?>/chat/get_all_list", function(list){ 
			$(".listBox").html(list);
		}); 
	}
	else{
		$.post("<?=$lang_code?>/chat/get_list", function(list){ 
			$(".listBox").html(list);
		}); 
	}*/
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

function getHistoryList(){
}

</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#textb").keyup(function(e) {	 
    	var code = e.keyCode || e.which;
      	if(code == 13) { //Enter keycode
			$("#submitForm").trigger("submit");
      	}     
	});		
});
getMgse();
function getMgse(){ 
	girl_id = $('#user_id').val();
	$('.refresh').load('<?=$lang_code?>/chat/chat_views/'+girl_id);
	//$('.refresh').load('chat/views/'+girl_id);
	//$('.chat-list').attr({ scrollTop: $('.chat-list').attr('scrollHeight') }) ;
	//$("section").animate({ scrollTop: $('.refresh').height() }, 1000);
	
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
		var recipient_id = $('#user_id').val();
		var recipient = $('#user_name').val();
		if (message == ""||message==null) {
			return false;
		}
		
		
		$.ajax({
			type: "POST",
			url: "<?=$lang_code?>/chat/send_chat",
			data:{user_id:user_id,user_name:username,message:message,recipient_id:recipient_id,recipient:recipient,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
			success: function() {
				//document.newMessage.textb.value = "";
				getMgse();
				$('#textb').val('');
			}
		});
	});
});

function send_image(image){
		var user_id = $('#texta').val();
		var username = $('#girl_name').val();
		var message = $('#textb').val();
		var recipient_id = $('#user_id').val();
		var recipient = $('#user_name').val();
		var filename = image;
		$.ajax({
			type: "POST",
			url: "<?=$lang_code?>/chat/send_chat",
			data: {user_id:user_id,user_name:username,message:message,recipient_id:recipient_id,recipient:recipient,filename:filename},
			success: function() {
				$('#file_name').val('');
				getMgse();
				$('#textb').val('');
			}
		});
}


</script>

<style>
.table th{
	vertical-align:top !important;
}
</style>

<!--<style>
.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}

</style>-->

<style>
.chat-list-new
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat-list-new li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat-list-new li.left .chat-body
{
    margin-left: 60px;
}

.chat-list-new li.right .chat-body
{
    margin-right: 60px;
}

.chat-list-new .img-circle{
		width:50px;
		height:50px;

}


.chat-list-new li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat-list-new .glyphicon
{
    margin-right: 5px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

</style>

