<style>
.sidebar .nav > li > a .badge{
	background:#777;	
}
</style>
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="assets/uploads/admin/profile.jpg" alt="" /></a>
                </div>
                <div class="info"><?=$admin_details->username;?></div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
                
                <li <?php echo $active=='home'?'class=" active"':'class=""'; ?> >
					<a href="<?=$admin_link?>/dashboard" target="">
					<i class="fa fa-home"></i>
					<span class="title"><?=show_static_text($adminLangSession['lang_id'],80);?></span>
					</a>
				</li>

            
            
            
<?php
if($admin_details->role=='super admin'){
?>
<!--<li class="has-sub">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-suitcase"></i>
        <span>UI Elements </span> 
    </a>
    <ul class="sub-menu">
        <li><a href="ui_tree.html">Tree View</a></li>
        <li><a href="ui_language_bar_icon.html">Language Bar & Icon</a></li>
    </ul>
</li>-->
<li class="has-sub <?=$active=='General Settings'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-gears"></i>
        <span><?=show_static_text($adminLangSession['lang_id'],162);?></span> 
    </a>
    <ul class="sub-menu">
        <li class=""><a href="<?=$admin_link?>/account/setting"><?=show_static_text($adminLangSession['lang_id'],162);?></a></li>       
        <li><a href="<?=$admin_link?>/account/email"><?=show_static_text($adminLangSession['lang_id'],163);?></a></li>
        <li><a href="<?=$admin_link?>/account/socialnetwork"><?=show_static_text($adminLangSession['lang_id'],188);?></a></li>
        <li><a href="<?=$admin_link?>/language"><?=show_static_text($adminLangSession['lang_id'],164);?></a></li>
        <li><a href="<?=$admin_link?>/static_text"><?=show_static_text($adminLangSession['lang_id'],189);?></a></li>
        <li><a href="<?=$admin_link?>/update_lang"><?=show_static_text($adminLangSession['lang_id'],165);?></a></li>
        <li><a href="<?=$admin_link?>/backup"><?=show_static_text($adminLangSession['lang_id'],1650);?>Backup</a></li>
        <li><a href="<?=$admin_link?>/paypal_setting"><?=show_static_text($adminLangSession['lang_id'],1650);?>Paypal Setting</a></li>
        <li><a href="<?=$admin_link?>/background"><?=show_static_text($adminLangSession['lang_id'],1650);?>Background Image</a></li>
        <li><a href="admin_dir"><?=show_static_text($adminLangSession['lang_id'],1020);?>Admin Dir</a></li>
    </ul>
</li>

<li <?php echo $active=='Media'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/media" target="">
    <i class="fa fa-file-code-o"></i>
    <span class="title"><?=show_static_text($adminLangSession['lang_id'],1704);?>Media</span>
    </a>
</li>



<li <?php echo $active=='Employee Management'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/admin_user" target="">
    <i class="fa fa-users"></i>
    <span class="title"><?=show_static_text($adminLangSession['lang_id'],1704);?>Employee Management</span>
    </a>
</li>

<li class="has-sub <?=$active=='Slider Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-file-code-o"></i>
        <span><?=show_static_text($adminLangSession['lang_id'],1800);?>Slider Management</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=$admin_link?>/home/setting"><?=show_static_text($adminLangSession['lang_id'],3010);?>Background Setting</a></li>
        <li><a href="<?=$admin_link?>/home/background"><?=show_static_text($adminLangSession['lang_id'],30);?></a></li>
<!--        <li><a href="<?=$admin_link?>/centralise_data"><?=show_static_text($adminLangSession['lang_id'],3100);?>Media</a></li>-->
        <li><a href="<?=$admin_link?>/home/edit_video"><?=show_static_text($adminLangSession['lang_id'],31);?></a></li>
        <li><a href="<?=$admin_link?>/slider"><?=show_static_text($adminLangSession['lang_id'],183);?></a></li>
    </ul>
</li>


<!--<li class="has-sub <?=$active=='Slider Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-file-code-o"></i>
        <span><?=show_static_text($adminLangSession['lang_id'],1800);?>Slider Management</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=$admin_link?>/slider"><?=show_static_text($adminLangSession['lang_id'],183);?></a></li>
    </ul>
</li>-->


<li <?php echo $active=='Service Provider'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/service_provider" target="">
    <i class="fa fa-users"></i>
    <span class="title"><?=show_static_text($adminLangSession['lang_id'],1704);?>Service Provider</span>
    </a>
</li>

<li class="has-sub <?=$active=='User Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-users"></i>
        <span><?=show_static_text($adminLangSession['lang_id'],1850);?>Customer Management</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=$admin_link?>/userlist"><?=show_static_text($adminLangSession['lang_id'],1870);?>Customer</a></li>		
        <li><a href="<?=$admin_link?>/link_statistics"><?=show_static_text($adminLangSession['lang_id'],1870);?>Link Statistics</a></li>		
        <li><a href="<?=$admin_link?>/user_review"><?=show_static_text($adminLangSession['lang_id'],1870);?>Review</a></li>		
    </ul>
</li>

<li class="has-sub <?=$active=='Deal Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-newspaper-o"></i>
        <span><?=show_static_text($adminLangSession['lang_id'],1850);?>Deal Management</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=$admin_link?>/deal"><?=show_static_text($adminLangSession['lang_id'],1870);?>Deal</a></li>		
    </ul>
</li>


<li class="has-sub <?=$active=='Service Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-file-code-o"></i>
        <span><?=show_static_text($adminLangSession['lang_id'],1800);?>Service Management</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=$admin_link?>/service"><?=show_static_text($adminLangSession['lang_id'],10083);?>Service</a></li>
    </ul>
</li>



<!--<li <?php echo $active=='Membership Management'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/membership" target="">
    <i class="fa fa-history"></i>
    <span class="title">Membership Management<?=show_static_text($adminLangSession['lang_id'],4074);?></span>
    </a>
</li>-->

<li <?php echo $active=='Booking History'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/booking" target="">
    <i class="fa fa-history"></i>
    <span class="title">Booking History<?=show_static_text($adminLangSession['lang_id'],4704);?></span>
    </a>
</li>

<li <?php echo $active=='Payment History'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/payment_history" target="">
    <i class="fa fa-history"></i>
    <span class="title">Payment History<?=show_static_text($adminLangSession['lang_id'],4704);?></span>
    </a>
</li>

<li class="has-sub <?=$active=='Ticket Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-file-code-o"></i>
        <span><?=show_static_text($adminLangSession['lang_id'],1080);?>Ticket Management</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=$admin_link?>/ticket"><?=show_static_text($adminLangSession['lang_id'],1802);?>Ticket</a></li>
    </ul>
</li>

<li class="has-sub <?=$active=='Content Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-file-code-o"></i>
        <span><?=show_static_text($adminLangSession['lang_id'],180);?></span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=$admin_link?>/banner"><?=show_static_text($adminLangSession['lang_id'],1810);?>Banner</a></li>
        <li><a href="<?=$admin_link?>/content"><?=show_static_text($adminLangSession['lang_id'],181);?></a></li>
        <li><a href="<?=$admin_link?>/page"><?=show_static_text($adminLangSession['lang_id'],182);?></a></li>
    </ul>
</li>

<li class="has-sub <?=$active=='Newsletter Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-newspaper-o"></i>
        <span><?=show_static_text($adminLangSession['lang_id'],185);?></span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=$admin_link?>/newsletter"><?=show_static_text($adminLangSession['lang_id'],186);?></a></li>
        <li><a href="<?=$admin_link?>/subscriber"><?=show_static_text($adminLangSession['lang_id'],187);?></a></li>		
    </ul>
</li>

<li class="has-sub <?=$active=='State & city'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-file-code-o"></i>
        <span>Place Management</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=$admin_link.'/place'?>">Place</a></li>
    </ul>
</li>



<!--<li <?php echo $active=='Chat'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/chat" target="">
    <i class="fa fa-comment"></i>
    <span class="title"><?=show_static_text($adminLangSession['lang_id'],105);?></span>&nbsp;
        <small class="badge count-message" style="background-color:#0C0;float:none;"></small>
    </a>
</li>
-->
<li <?php echo $active=='Chat'?'class="active"':''; ?>>

    <a href="#menu-toggle" id="menu-toggle">
    <i class="fa fa-comment"></i>
    <span class="title"><?=show_static_text($adminLangSession['lang_id'],10005);?>Chat</span>&nbsp;
        <small class="badge count-message" style="background-color:#0C0;float:none;"></small>
    </a>
</li>
<!--<li <?php echo $active=='logout'?'class=" active"':'class=""'; ?> >
    <a href="#menu-toggle" id="menu-toggle">
    <i class="fa fa-comments"></i>
    <span class="title">Chat</span>
    </a>
</li>-->


<?php
}
else{
if($admin_details->is_general==1){

?>
<li class="has-sub <?=$active=='General Settings'?'active':''; ?> ">
	<a href="javascript:;">
		<b class="caret pull-right"></b>
		<i class="fa fa-gears"></i>
		<span><?=show_static_text($adminLangSession['lang_id'],162);?></span> 
	</a>
	<ul class="sub-menu">
		<li class=""><a href="<?=$admin_link?>/account/setting"><?=show_static_text($adminLangSession['lang_id'],162);?></a></li>       
		<li><a href="<?=$admin_link?>/account/email"><?=show_static_text($adminLangSession['lang_id'],163);?></a></li>
<!--		<li><a href="<?=$admin_link?>/account/socialnetwork"><?=show_static_text($adminLangSession['lang_id'],188);?></a></li>
		<li><a href="<?=$admin_link?>/language"><?=show_static_text($adminLangSession['lang_id'],164);?></a></li>
		<li><a href="<?=$admin_link?>/static_text"><?=show_static_text($adminLangSession['lang_id'],189);?></a></li>
		<li><a href="<?=$admin_link?>/update_lang"><?=show_static_text($adminLangSession['lang_id'],165);?></a></li>-->
	</ul>
</li>
<?php
}
if($admin_details->is_slider==1){
?>
<li class="has-sub <?=$active=='Slider Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-file-code-o"></i>
        <span><?=show_static_text($adminLangSession['lang_id'],1800);?>Slider Management</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=$admin_link?>/home/setting"><?=show_static_text($adminLangSession['lang_id'],3010);?>Background Setting</a></li>
        <li><a href="<?=$admin_link?>/home/background"><?=show_static_text($adminLangSession['lang_id'],30);?></a></li>
        <li><a href="<?=$admin_link?>/home/edit_video"><?=show_static_text($adminLangSession['lang_id'],31);?></a></li>
        <li><a href="<?=$admin_link?>/slider"><?=show_static_text($adminLangSession['lang_id'],183);?></a></li>
    </ul>
</li>
<?php
}
if($admin_details->is_customer==1){
?>
<li <?php echo $active=='Requested Domain & Emails'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/domain" target="">
    <i class="fa fa-users"></i>
    <span class="title"><?=show_static_text($adminLangSession['lang_id'],1704);?>Requested Domain & Emails</span>
    </a>
</li>

<li <?php echo $active=='Service Provider'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/service_provider" target="">
    <i class="fa fa-users"></i>
    <span class="title"><?=show_static_text($adminLangSession['lang_id'],1704);?>Service Provider</span>
    </a>
</li>
<?php
}
if($admin_details->is_user==1){
?>
<li <?php echo $active=='User Management'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/userlist" target="">
    <i class="fa fa-users"></i>
    <span class="title"><?=show_static_text($adminLangSession['lang_id'],1704);?>Customer Management</span>
    </a>
</li>
<?php
}
if($admin_details->is_product==1){
?>
<li class="has-sub <?=$active=='Product Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-newspaper-o"></i>
        <span><?=show_static_text($adminLangSession['lang_id'],1850);?>Product Management</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=$admin_link?>/product"><?=show_static_text($adminLangSession['lang_id'],1870);?>Product</a></li>		
    </ul>
</li>
<?php
}
if($admin_details->is_membership==1){
?>
<li <?php echo $active=='Membership Management'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/membership" target="">
    <i class="fa fa-history"></i>
    <span class="title">Membership Management<?=show_static_text($adminLangSession['lang_id'],4074);?></span>
    </a>
</li>
<?php
}
if($admin_details->is_order==1){
?>
<li <?php echo $active=='Booking History'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/booking_history" target="">
    <i class="fa fa-history"></i>
    <span class="title">Booking History<?=show_static_text($adminLangSession['lang_id'],4704);?></span>
    </a>
</li>
<?php
}
if($admin_details->is_payment==1){
?>
<li <?php echo $active=='Payment History'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/payment_history" target="">
    <i class="fa fa-history"></i>
    <span class="title">Paymant History<?=show_static_text($adminLangSession['lang_id'],4704);?></span>
    </a>
</li>
<?php
}?>


<?php
if($admin_details->is_content==1){
?>
<li class="has-sub <?=$active=='Content Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-file-code-o"></i>
        <span><?=show_static_text($adminLangSession['lang_id'],180);?></span> 
    </a>
    <ul class="sub-menu">
<!--        <li><a href="<?=$admin_link?>/account/background"><?=show_static_text($adminLangSession['lang_id'],30);?></a></li>-->
        <li><a href="<?=$admin_link?>/content"><?=show_static_text($adminLangSession['lang_id'],181);?></a></li>
        <li><a href="<?=$admin_link?>/page"><?=show_static_text($adminLangSession['lang_id'],182);?></a></li>
        <li><a href="<?=$admin_link?>/partner_slider"><?=show_static_text($adminLangSession['lang_id'],1081);?>Client Logo</a></li>
    </ul>
</li>

<?php
}
if($admin_details->is_ticket==1){
?>
<li class="has-sub <?=$active=='Ticket Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-file-code-o"></i>
        <span><?=show_static_text($adminLangSession['lang_id'],1080);?>Ticket Management</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=$admin_link?>/ticket_type"><?=show_static_text($adminLangSession['lang_id'],1081);?>Ticket Type</a></li>
        <li><a href="<?=$admin_link?>/ticket"><?=show_static_text($adminLangSession['lang_id'],1802);?>Ticket</a></li>
    </ul>
</li>
<?php
}
if($admin_details->is_chat==1){
?>

<?php
}
?>
<?php
}
?>
<li <?php echo $active=='Change Password'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/account/change_password" target="">
    <i class="fa fa-users"></i>
    <span class="title"><?=show_static_text($adminLangSession['lang_id'],50);?></span>
    </a>
</li>

<li <?php echo $active=='logout'?'class="active"':''; ?>>
    <a href="<?=$admin_link?>/account/logout" target="">
    <i class="fa fa-sign-out"></i>
    <span class="title"><?=show_static_text($adminLangSession['lang_id'],57);?></span>
    </a>
</li>
            
            
            
            
            <!-- begin sidebar minify button -->
<!--            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>-->
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>






