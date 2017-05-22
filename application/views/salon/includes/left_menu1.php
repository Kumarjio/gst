		<div class="widget sidebar-links">
    <div class="widget-content">
    <div class="row">
		<div class="col-md-4">
			<h3 class="">My account details</h3>
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
<!--            <li>
                <a href="<?=$lang_code?>/user/">Delete my Credit/Debit cards</a>
            </li>-->

            <li>
                <a href="<?=$lang_code?>/user/logout"><?=show_static_text($lang_id,57);?></a>
            </li>


        </ul>
        </div>
		<div class="col-md-4">
			<h3 class="">My orders</h3>
    		<ul class="clearfix" id="mt-accordion">

<?php
if(isset($user_details)){
if($user_details->account_type=='B'){
?>
            <li <?php echo $active=='My Order'?'class="active"':''; ?>>
                <a href="<?=$lang_code?>/user/my_order" target="">
                
                <span class="title">Order overview</span>
                
                <!---->
                </a>
            </li>

<?php
}
if($user_details->account_type=='G'){
?>
            <li <?php echo $active=='My Order'?'class="active"':''; ?>>
                <a href="<?=$lang_code?>/user/my_order" target="">
                
                <span class="title">Order overview</span>
                
                <!---->
                </a>
            </li>
<?php
}
}
?>    

<!--            <li <?php echo $active=='My Order'?'class="active"':''; ?>>
                <a href="<?=$lang_code?>/user/" target="">
                <span class="title">Account credit</span>
                </a>
            </li>-->


        </ul>
        </div>
    </div>
    </div>
  </div>

<style>
.widget-content ul {
  list-style: outside none none;
  font-size:13px;
  font-weight:bold;
  color:#d31821;
}

.sidebar-links  .widget-content > ul > li:first-child {
  padding-top: 0;
}

.sidebar-links .widget-content a{
	color:#d31821;
	text-decoration:underline;
}
.sidebar-links .widget-content a:hover{
	text-decoration:none;
}

.sidebar-links .widget-content > ul > li {
  padding: 0;
}
.widget-content{
	background: #f2f2e8 none repeat scroll 0 0;
	border: 1px solid #E7E7E7;
	border-radius: 10px;
	padding:10px;
}
</style>