
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
    <li <?php echo $active=='Visit'?'class=" active"':'class=""'; ?> >
        <a href="<?=site_url($lang_code); ?>" target="">
        <i class="fa fa-sign-in"></i>
        <span class="title"><?=show_static_text($lang_id,149);?></span>
        </a>
    </li>
    <li <?php echo $active=='home'?'class=" active"':'class=""'; ?> >
        <a href="<?=site_url($_user_link); ?>" target="">
        <i class="fa fa-home"></i>
        <span class="title"><?=show_static_text($lang_id,80);?></span>
        </a>
    </li>

    <li <?php echo $active=='Profile'?'class=" active"':'class=""'; ?> >
        <a href="<?=site_url($_user_link.'/account/edit_profile')?>" target="">
        <i class="fa fa-edit"></i>
        <span class="title"><?=show_static_text($lang_id,45);?></span>
        </a>
    </li>

    <li <?php echo $active=='Service'?'class=" active"':'class=""'; ?> >
        <a href="<?=site_url($_user_link.'/service');?>" target="">
        <i class="fa fa-server"></i>
        <span class="title"><?=show_static_text($lang_id,66);?></span>
        </a>
    </li>


    <li <?php echo $active=='Ticket Management'?'class=" active"':'class=""'; ?> >
        <a href="<?=site_url($_user_link.'/ticket');?>" target="">
        <i class="fa fa-ticket"></i>
        <span class="title"><?=show_static_text($lang_id,103);?></span>
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
            
            <!-- begin sidebar minify button -->
<!--            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
-->
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>






