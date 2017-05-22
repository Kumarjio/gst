<?php
if(isset($user_details)){
	if($user_details->account_type=="H"){
		$_left_url = site_url($lang_code.'/saloonuser');
	}
	elseif($user_details->account_type=="D"){
		$_left_url = site_url($lang_code.'/doctoruser');
	}
	elseif($user_details->account_type=="S"){
		$_left_url = site_url($lang_code.'/serviceprovider');
	}
	elseif($user_details->account_type=="E"){
		$_left_url = site_url($lang_code.'/serviceprovider');
	}
	elseif($user_details->account_type=="Y"){
		$_left_url = site_url($lang_code.'/expertuser');
	}
	else{
		$_left_url = site_url($lang_code.'/user');
	}
}
?>                

<!--<script>
setInterval("user_update()", 5000); // Update every 5 seconds 
function user_update(){ 
	$.post("<?=$lang_code?>/chat/update"); // Sends request to update.php 
	$.ajax({
		type:"POST",
		url:"<?=$lang_code?>/chat/read_message",
		data:{<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		dataType:'json',
		success:function(data){
			if(data['result']=='success'){
				$('.count-message').html(data['count']);
			}
			else{
				$('.count-message').html('');
			}
		}
	}); // Sends request to update.php */
}

//setInterval("check_order()", 5000); // Update every 5 seconds 
//check_order();
</script> -->

<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="<?=!empty($user_details->image)?'assets/uploads/users/thumbnails/'.$user_details->image:'assets/uploads/profile.jpg'?>" alt="" /></a>
                </div>
<!--                <div class="info"><?=$user_details->username;?></div>-->
                <div class="info" >
<?php
if($user_details->plan_id==0){
?>
Free User
<?php	
}
else{
	$show_membership = $this->comman_model->get_by('memberships',array('id'=>$user_details->plan_id),false,false,true);
	if($show_membership){
		$planName = $show_membership->name;
	}
	else{
		$planName = $user_details->plan_type;
	}

/*	$now = time(); // or your date as well
	$your_date = strtotime('+'.$user_details->plan_month.' months',strtotime($user_details->plan_date));
	$remaing ='';
	if($your_date>$now){
		$datediff = $your_date-$now;
		$remaing =  '( remaining '.floor($datediff/(60*60*24)).' day(s) )';
	}*/

echo $planName;
}
?>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
<?php
if($user_details->account_type=='S'){
?>
    <li <?php echo $active=='home'?'class=" active"':'class=""'; ?> >
        <a href="<?=$_left_url ?>" target="">
        <i class="fa fa-home"></i>
        <span class="title"><?=show_static_text($lang_id,80);?></span>
        </a>
    </li>

    <li <?php echo $active=='Profile'?'class=" active"':'class=""'; ?> >
        <a href="<?=$_left_url ?>/edit_profile" target="">
        <i class="fa fa-home"></i>
        <span class="title"><?=show_static_text($lang_id,1080);?>Edit Profile</span>
        </a>
    </li>

<!--    <li <?php echo $active=='Your Code'?'class=" active"':'class=""'; ?> >
    	<a href="<?=$_left_url ?>/your_code" target="">
	    <i class="fa fa-home"></i>
        <span class="title"><?=show_static_text($lang_id,1080);?>Your Code</span>
        </a>
    </li>-->


<!-- 
               <li <?php echo $active=='Problems'?'class=" active"':'class=""'; ?> >
					<a href="<?=$lang_code?>/customer_ticket" target="">
					<i class="fa fa-list"></i>
					<span class="title"><?=show_static_text($lang_id,8000);?>Tickets</span>
					</a>
				</li>

                <li <?php echo $active=='information'?'class=" active"':'class=""'; ?> >
					<a href="<?=$lang_code?>/customer/information" target="">
					<i class="fa fa-list"></i>
					<span class="title"><?=show_static_text($lang_id,8000);?>Information</span>
					</a>
				</li>-->
        

<!--                <li <?php echo $active=='Chat'?'class=" active"':'class=""'; ?> >
					<a href="<?=$lang_code?>/customer/chat" target="">
					<i class="fa fa-comment"></i>
					<span class="title"><?=show_static_text($lang_id,8000);?>Chat</span>&nbsp;
			        <small class="badge count-message" style="background-color:#0C0;float:none;"></small>
					</a>
				</li>-->
            
<?php
}
else{
?>
<li <?php echo $active=='home'?'class=" active"':'class=""'; ?> >
    <a href="<?=$_left_url ?>" target="">
    <i class="fa fa-home"></i>
    <span class="title"><?=show_static_text($lang_id,80);?></span>
    </a>
</li>

<li <?php echo $active=='Profile'?'class=" active"':'class=""'; ?> >
    <a href="<?=$_left_url ?>/edit_profile" target="">
    <i class="fa fa-home"></i>
    <span class="title"><?=show_static_text($lang_id,1080);?>Edit Profile</span>
    </a>
</li>
<?php
if($user_details->is_calender==1){
?>
<li <?php echo $active=='Calender'?'class=" active"':'class=""'; ?> >
    <a href="<?=$lang_code?>/calender_manage" target="">
    <i class="fa fa-calendar"></i>
    <span class="title"><?=show_static_text($lang_id,1080);?>Calender</span>
    </a>
</li>
<?php
}
if($user_details->is_staff==1){
?>
<li class="has-sub <?=$active=='Staff Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-users"></i>
        <span>Staff Management</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=site_url($lang_code.'/datetime_manage')?>">Date & Time</a></li>
        <li><a href="<?=site_url($lang_code.'/leave_sick_manage')?>">Leave And Sick</a></li>
    </ul>
</li>

<?php
}
if($user_details->is_product==1){
?>
<li class="has-sub <?=($active=='Products'||$active=='Stock History'||$active=='Purchase Entry'||$active=='Danger Level')?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-users"></i>
        <span>Products Management</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=site_url($lang_code.'/product_manage')?>">Products</a></li>
        <li><a href="<?=site_url($lang_code.'/product_manage/purchase_entry')?>">Purchase Entry</a></li>
        <li><a href="<?=site_url($lang_code.'/product_manage/stock_history')?>">Stock History</a></li>
        <li><a href="<?=site_url($lang_code.'/product_manage/danger_level')?>">Low Inventory Alert</a></li>
    </ul>
</li>
<?php
}
if($user_details->is_order==1){
?>
<li class="has-sub <?=$active=='Sell Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-history"></i>
        <span>Sell Management</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=site_url($lang_code.'/order_manage')?>">Online</a></li>
        <li><a href="<?=site_url($lang_code.'/sell_manage')?>">Offline</a></li>
    </ul>
</li>
<?php
}
if($user_details->is_customer==1){
?>
<li <?php echo $active=='Customer History'?'class=" active"':'class=""'; ?> >
    <a href="<?=site_url($lang_code.'/customer_manage')?>" target="">
    <i class="fa fa-users"></i>
    <span class="title"><?=show_static_text($lang_id,1080);?>Customer History</span>
    </a>
</li>
<?php
}
if($user_details->is_market==1){
?>
<li class="has-sub <?=$active=='Coupon'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-users"></i>
        <span>Marketing Managemenet</span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=site_url($lang_code.'/coupon_manage')?>">Coupon</a></li>
        <li><a href="<?=site_url($lang_code.'/coupon_manage/l/gift')?>">Gift Voucher</a></li>
        <li><a href="<?=site_url($lang_code.'/coupon_manage/birth_promotion')?>">Birthdate Promotion</a></li>
    </ul>
</li>

<?php
}
if($user_details->is_ticket==1){
?>
<li <?php echo $active=='Problems'?'class=" active"':'class=""'; ?> >
    <a href="<?=$lang_code?>/provider_ticket" target="">
    <i class="fa fa-list"></i>
    <span class="title"><?=show_static_text($lang_id,8000);?>Tickets</span>
    </a>
</li>
<?php
}
if($user_details->is_domain==1){
?>
<li <?php echo $active=='Domain'?'class=" active"':'class=""'; ?> >
    <a href="<?=site_url($lang_code.'/domain_manage')?>" target="">
    <i class="fa fa-home"></i>
    <span class="title"><?=show_static_text($lang_id,1080);?>Domain & Email Setting</span>
    </a>
</li>
<?php
}
}
?>            
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>






