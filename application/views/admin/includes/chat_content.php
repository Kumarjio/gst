
<link rel="stylesheet" href="assets/plugins/chat/new_chat.css" type="text/css" />
<div class="" style="">
    <div class="row chat-window col-xs-10 col-md-3" id="chat_window_1" style="display:none">
        <div class="col-xs-12 col-md-12">
        	<div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="fa fa-comment"></span> Chat  - <span id="admin_onilne" style="color:#F00">Offline</span></h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="javascript:void(0)"><span id="minim_chat_window" class="fa fa-minus icon_minim"></span></a>
                        <a href="javascript:void(0)"><span class="fa fa-remove icon_close" data-id="chat_window_1" id="tab_close"></span></a>
                    </div>
                </div>
                
                <div class="panel-body msg_container_base" >
                    <div class="refresh"></div> 
<?php
if(!isset($user_chat)){
?>
<form role="form" action="" method="post"  id="chat_forms" class="chat_login_form" >
                	<input type="hidden" name="operation" value="set">
                    <div class="col-lg-12">
                  
                    <div class="form-group">
                        <label for="InputName">Name</label>
                        <div class="">
                            <input type="text" class="form-control" name="name" id="chat_name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputName">Email-ID</label>
                        <div class="">
                            <input type="email" class="form-control" name="chat_email" id="chat_email" placeholder="Email-id" required>
                        </div>
                    </div>
                                          
                  <input type="submit" name="submit" id="submit" value="Enter" class="btn btn-info pull-right">
                </div>
			  </form>
<?php
	$chat_form ='display:none';
}
else{
	$chat_form ='';
}
?>
                </div>
                <div class="panel-footer" style=" <?=$chat_form?>" >
                    <form action="#" class="m-b-none" id="submitForm" method="post" onSubmit="return false">
                        <input name="chatUserID" type="hidden" id="chatUserID" value="<?=isset($user_chat)?$user_chat['id']:'';?>"/>
                        <input name="chatUserName" type="hidden" id="chatUserName" value="<?=isset($user_chat)?$user_chat['name']:'';?>"/>
	                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." style="height:30px" />
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
                        </span>
                    </div>
                    </form>
                </div>
    		</div>
        </div>
    </div>
        
</div>

<?php
if(isset($user_chat)){
?>
<script>
$(setInterval("getMgse()", 3000));
</script>
<?php
}
?>
<script type="text/javascript">
setInterval("check_online()", 5000); // Update every 5 seconds 
function check_online(){ 
		$.ajax({
			type: "POST",
			url: "<?=$lang_code;?>/chat/get_online",
			success: function(data) {
				if(data=='on'){
					$('#admin_onilne').css('color','#0C0');
					$('#admin_onilne').html('Online');
				}
				else{
					$('#admin_onilne').css('color','#F00');
					$('#admin_onilne').html('Offline');
				}
				//document.newMessage.btn-input.value = "";
			}
		});
		return false;
	
} 


$(document).ready(function(){
/*	$("#btn-input").keyup(function(e) {	 
    	var code = e.keyCode || e.which;
      	if(code == 13) { //Enter keycode
			$("#submitForm").trigger("submit");
      	}     
	});		*/
});

function read_it(){ 
	$.post("chat/read_it"); // Sends request to update.php 
}
function getMgse(){ 
	girl_id = $('#user_id').val();
	$('.refresh').load('chat/views/'+girl_id);
	$("section").animate({ scrollTop: $('.refresh').height() }, 1000);

	$.ajax({
		type:"POST",
		url:"chat/read_message",
		data:"id=1",
		dataType:'json',
		success:function(data){
			if(data['result']=='success'){
				if(data['count']>=0){
					$('#chat_window_1').show();
					read_it();
				}
			}
		}
	}); // Sends request to update.php 
	
}

$.ajaxSetup({
	cache: false	
});
	
$(function() {	
	$('#submitForm').submit(function(){
		var user_id = $('#chatUserID').val();
		var username = $('#chatUserName').val();
		var message = $.trim($('#btn-input').val());
/*		var recipient_id = $('#user_id').val();
		var recipient = $('#user_name').val();*/
		if (message == "" || message == "Say something"||message==null) {
			$('#btn-input').val('');
			return false;
		}
		//var dataString = 'user_id=' + user_id + '&user_name=' + username + '&message=' + message + '&recipient_id=' + recipient_id + '&recipient=' + recipient;
		var dataString = 'user_id=' + user_id + '&user_name=' + username + '&message=' + message;
		
		$.ajax({
			type: "POST",
			url: "chat/send_chat",
			data: dataString,
			success: function() {
				getMgse();
				$('#btn-input').val('');
				//document.newMessage.btn-input.value = "";
			}
		});
		return false;
	});
});


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
<script>
$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
	
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '#new_chat', function (e) {
    var size = $( ".chat-window:last-child" ).css("margin-left");
     size_total = parseInt(size) + 400;
    alert(size_total);
    var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
    clone.css("margin-left", size_total);
});
/*$(document).on('click', '.icon_close', function (e) {
    //$(this).parent().parent().parent().parent().remove();
    $( "#chat_window_1" ).remove();
});*/

</script>


<script>
$( document ).ready(function() {
	$( "#chat_forms" ).submit(function() {
		var fname = $('#chat_name').val();
/*		var email = $('#chat_email').val();*/
		$.ajax({
				type:"POST",
				dataType: "json",
				url:"chat/chat_login",
				//data:{email:email,name:fname,operation:'set'},
				data:{name:fname,operation:'set'},
				success:function(data){
					if(data['result']=='success'){
						$('.chat_login_form').hide();
						$('.panel-footer').show();
					}
				}
		});
	return false;	
	});
});
</script>

<!--<script>
//Function show and hide download.
$(function(){
  var $tab = $('#top_tab'),$tab_close = $('#tab_close'),
	 // $panel1 =$('#chat_window_1').hide();
	  $panel1 =$('#chat_window_1');
  var toggle = false;
  $tab.on('click', function() {});
  
  $tab_close.on('click', function() {
        if (!toggle) {
            $panel1.slideUp('slow', function() {
                $panel1
                    .stop()
                    .animate({
                        opacity: 0
                    },500);    
            });
        }
        toggle = !toggle;
  });

});
</script>-->
<script>
//Function show and hide download.
$(function(){
  var $tab = $('#top_tab'),$tab_close = $('#tab_close'),
	  $panel1 =$('#chat_window_1').hide();
	  //$panel1 =$('#chat_window_1');
  var toggle = true;
  $tab.on('click', function() {
        if (toggle) {
            $tab.stop().animate({},500, function (){});
            $panel1
                .stop()
                .animate({
                    opacity: 1
                }, 500, function(){
                    $panel1.slideDown('slow');
                });    
        } else {
            $panel1.slideUp('slow', function() {
                $panel1
                    .stop()
                    .animate({
                        opacity: 0
                    },500);    
            });
        }
        toggle = !toggle;
  });
  
  $tab_close.on('click', function() {
        if (!toggle) {
            $panel1.slideUp('slow', function() {
                $panel1
                    .stop()
                    .animate({
                        opacity: 0
                    },500);    
            });
        }
        toggle = !toggle;
  });

});
</script>
