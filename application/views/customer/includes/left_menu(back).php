<style>
#mt-accordion li.active a {
	color:#ff0000 !important;
	font-weight:bold;
	
}

#mt-accordion li a {
  font-weight: normal;
  color:#000;
}
</style>

<div class="block mt-smartmenu">
    <div class="block-content">
        <ul class="clearfix" id="mt-accordion">
            <li <?php echo $active=='Profile'?'class="active"':''; ?>>
                <a href="<?=$lang_code?>/user/edit_profile" target="">
                
                <span class="title"><?=show_static_text($lang_id,45);?></span>
                
                <!---->
                </a>
            </li>

            <li <?php echo $active=='Change Password'?'class="active"':''; ?>>
                <a href="<?=$lang_code?>/user/change_password" target="">
                
                <span class="title"><?=show_static_text($lang_id,50);?></span>
                
                <!---->
                </a>
            </li>
<?php
if(isset($user_details)){
if($user_details->account_type=='B'){
?>
            <li <?php echo $active=='My Order'?'class="active"':''; ?>>
                <a href="<?=$lang_code?>/user/my_order" target="">
                
                <span class="title"><?=show_static_text($lang_id,49);?></span>
                
                <!---->
                </a>
            </li>

            <li <?php echo $active=='My Coupon'?'class="active"':''; ?>>
                <a href="<?=$lang_code?>/user/my_coupon" target="">
                
                <span class="title"><?=show_static_text($lang_id,150);?></span>
                
                <!---->
                </a>
            </li>
<?php
}
if($user_details->account_type=='G'){
?>
            <li <?php echo $active=='My Order'?'class="active"':''; ?>>
                <a href="<?=$lang_code?>/user/my_order" target="">
                
                <span class="title"><?=show_static_text($lang_id,49);?></span>
                
                <!---->
                </a>
            </li>
<?php
}
}

?>    
                    <li>
                        <a href="<?=$lang_code?>/user/logout"><?=show_static_text($lang_id,57);?></a>
                    </li>


        </ul>
        
    </div> <!-- end class=block-content -->
</div>

