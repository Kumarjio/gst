<?php
if(isset($user_details)){
	if($user_details->account_type=="H"){
		$_header_url = site_url($lang_code.'/saloonuser');
	}
	elseif($user_details->account_type=="E"){
		$_header_url = site_url($lang_code.'/serviceprovider');
	}
	elseif($user_details->account_type=="S"){
		$_header_url = site_url($lang_code.'/serviceprovider');
	}
	elseif($user_details->account_type=="Y"){
		$_header_url = site_url($lang_code.'/expertuser');
	}
	else{
		$_header_url = site_url($lang_code.'/user');
	}
}
?>                

<style>
@media(max-width: 768px) {
.page-header-fixed{
	padding-top:100px
}

}
</style>

<script>
var csrfTokenName = '<?=$this->security->get_csrf_token_name();?>';
var csrfTokenValue = '<?=$this->security->get_csrf_hash();?>';
</script>
<script type="text/javascript" src="assets/plugins/new_chat/js/jquery.js"></script>
<script type="text/javascript" src="assets/plugins/new_chat/js/chat.js"></script>
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="<?=$_header_url?>" class="navbar-brand"><?=$settings['site_name']?></a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<!--<li>
						<form class="navbar-form full-width">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter keyword" />
								<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
							</div>
						</form>
					</li>-->
					<li id="" class="dropdown dropdown-extended dropdown-tasks">
						<a  class="dropdown-toggle" href="<?=$lang_code?>">
						Visit Website 					
					</a>
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?=!empty($user_details->image)?'assets/uploads/users/thumbnails/'.$user_details->image:'assets/uploads/profile.jpg'?>" alt="" /> 
							<span class="hidden-xs"><?=$user_details->first_name.' '.$user_details->last_name;?>
</span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="<?=$_header_url?>/change_password"><?=show_static_text($lang_id,50);?></a></li>
							<li class="divider"></li>
							<li><a href="<?=$_header_url?>/logout"><?=show_static_text($lang_id,57);?></a></li>
						</ul>
					</li>
      <li>				
		<a href="#menu-toggle" id="menu-toggle"><i class="fa fa-comments"></i></a>
	  </li>

				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->



