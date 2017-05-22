<!--<script src="assets/global/scripts/notification.js"></script>
-->
<script>
setInterval("user_update()", 5000); // Update every 5 seconds 
function user_update(){ 
	$.post("<?=$lang_code?>/chat/update"); // Sends request to update.php 

/*	$.ajax({
		type:"POST",
		url:"chat/read_message",
		data:"id=1",
		dataType:'json',
		success:function(data){
			if(data['result']=='success'){
				$('.count-message').html(data['count']);
			}
			else{
				$('.count-message').html('');
			}
		}
	}); // Sends request to update.php 
*/
}
//setInterval("check_order()", 5000); // Update every 5 seconds 
//check_order();
</script>        


</head>
<!-- END HEAD -->

<div class="row">
<div class="col-md-12">
<nav class="navbar page-header-menu">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

<?php
if($user_details->account_type=='R'){
?>
                <li class=" <?=$active=='home'?'active':''; ?>">
                    <a href="<?=$lang_code.'/partner'?>"><?=show_static_text($lang_id,10);?></a>
                </li>
                <li class=" <?=$active=='restaurant'?'active':''; ?>">
                    <a href="<?=$lang_code.'/partner/edit_restaurant'?>"><?=show_static_text($lang_id,97);?></a>
                </li>                
                <li class=" <?=$active=='Import Export'?'active':''; ?>">
                    <a href="<?=$lang_code.'/partner_excel/excel'?>"><?=show_static_text($lang_id,98);?></a>
                </li>
                <li class=" <?=$active=='Booking'?'active':''; ?>">
                    <a href="<?=$lang_code.'/partner/booking'?>"><?=show_static_text($lang_id,99);?> <span class="paypalNotification"></span></a>
                </li>
                <li class=" <?=$active=='reviews'?'active':''; ?>">
                    <a href="<?=$lang_code.'/partner/review'?>"><?=show_static_text($lang_id,35);?></a>
                </li>
                <li class=" <?=$active=='Staff'?'active':''; ?>">
                    <a href="<?=$lang_code.'/partner_staff'?>"><?=show_static_text($lang_id,100);?></a>
                </li>
                <li class=" <?=$active=='Remark'?'active':''; ?>">
                    <a href="<?=$lang_code.'/partner_remark'?>"><?=show_static_text($lang_id,101);?></a>
                </li>
                <li class=" <?=$active=='Ticket'?'active':''; ?>">
                    <a href="<?=$lang_code.'/partner_ticket'?>"><?=show_static_text($lang_id,103);?></a>
                </li>
                <li class=" <?=$active=='Change Password'?'active':''; ?>">
                    <a href="<?=$lang_code.'/partner/change_password'?>"><?=show_static_text($lang_id,50);?></a>
                </li>
                <li class=" <?=$active=='Chat'?'active':''; ?>">
                    <a href="<?=$lang_code.'/partner/chat'?>"><?=show_static_text($lang_id,105);?></a>
                </li>
<?php
}

if($user_details->account_type=='E'){
?>
                <li class=" <?=$active=='home'?'active':''; ?>">
                    <a href="<?=$lang_code.'/employee'?>"><?=show_static_text($lang_id,10);?></a>
                </li>
                <li class=" <?=$active=='Remark'?'active':''; ?>">
                    <a href="<?=$lang_code.'/employee_remark'?>"><?=show_static_text($lang_id,101);?></a>
                </li>
                <li class=" <?=$active=='Change Password'?'active':''; ?>">
                    <a href="<?=$lang_code.'/employee/change_password'?>"><?=show_static_text($lang_id,50);?></a>
                </li>
                <li class=" <?=$active=='Chat'?'active':''; ?>">
                    <a href="<?=$lang_code.'/employee/chat'?>"><?=show_static_text($lang_id,105);?></a>
                </li>
<?php
}
?>
            </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	</div>
</div><!--//row//-->
    
<style>
.navbar{
	min-height:35px;
	border:none;
}
.page-header-menu{
	margin-bottom:0px;
}
.page-header-menu .navbar-nav a{
/*  background: #268abe;*/
  background:#669900;
  border-radius: 3px 3px 0 0;
  color: #000;
  margin: 0 3px;
  opacity: 1;
  padding:10px 5px;
  font-size:12px;
/*  font-family:"Alegreya-Regular";*/
  text-transform:inherit;

}

#bs-example-navbar-collapse-1{
	padding:0px;

}
.page-header-menu .navbar-nav > .active.open > a{
  background: #FFF;
  border-radius: 3px 3px 0 0;
  color: #000;
/*  margin: 0 3px;*/
  opacity: 1;
}

 .page-header-menu .navbar-nav > .active > a,.page-header-menu .navbar-nav > .active > a:focus, .page-header-menu .navbar-nav > .active > a:hover {
  background: #FFF;
  color: #000;
}
.page-header-menu .navbar-nav > li:first-child > a{
	margin-left:0px;
}

.page-header-menu .navbar-nav > li > a:focus, .page-header-menu .navbar-nav > li > a:hover {
  opacity: 1;
/*  background: #1E6B94;*/
	background:#FFF;
  color: #000 ;
}


</style>