
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
</script>--> 
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="assets/uploads/admin/profile.jpg" alt="" /></a>
                </div>
                <div class="info"><?=$user_details->first_name.' '.$user_details->last_name;?></div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">

                
                <li <?php echo $active=='home'?'class=" active"':'class=""'; ?> >
					<a href="<?=$lang_code?>/company" target="">
					<i class="fa fa-home"></i>
					<span class="title"><?=show_static_text($lang_id,80);?></span>
					</a>
				</li>

                <li <?php echo $active=='Profile'?'class=" active"':'class=""'; ?> >
					<a href="<?=$lang_code?>/company/edit_profile" target="">
					<i class="fa fa-edit"></i>
					<span class="title"><?=show_static_text($lang_id,1080);?>Edit Profile</span>
					</a>
				</li>
<!--
                <li <?php echo $active=='User'?'class=" active"':'class=""'; ?> >
					<a href="<?=$lang_code?>/company_user" target="">
					<i class="fa fa-users"></i>
					<span class="title"><?=show_static_text($lang_id,8000);?>User</span>
					</a>
				</li>-->

                <li <?php echo $active=='Problems'?'class=" active"':'class=""'; ?> >
					<a href="<?=$lang_code?>/company_problem" target="">
					<i class="fa fa-list"></i>
					<span class="title"><?=show_static_text($lang_id,8000);?>Ticket</span>
					</a>
				</li>

<!--                <li <?php echo $active=='Chat'?'class=" active"':'class=""'; ?> >
					<a href="<?=$lang_code?>/company/chat" target="">
					<i class="fa fa-comment"></i>
					<span class="title"><?=show_static_text($lang_id,8000);?>Chat</span>&nbsp;
			        <small class="badge count-message" style="background-color:#0C0;float:none;"></small>
					</a>
				</li>-->

        
            
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




                
<!--

<li class="has-sub <?=$active=='Product Management'?'active':''; ?> ">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-file-text"></i>
        <span><?=show_static_text($lang_id,166);?></span> 
    </a>
    <ul class="sub-menu">
        <li><a href="<?=$admin_link?>/category"><?=show_static_text($lang_id,167);?></a></li>
        <li><a href="<?=$admin_link?>/product"><?=show_static_text($lang_id,170);?></a></li>
    </ul>
</li>
              -->  
<!--
<li <?php echo $active=='Gallery Management'?'class="active"':''; ?>>
	<a href="<?=$admin_link?>/gallery" target="">
	<i class="fa fa-history"></i>
	<span class="title"><?=show_static_text($lang_id,176);?></span>
	</a>
</li>-->
            
            
            
            
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>






