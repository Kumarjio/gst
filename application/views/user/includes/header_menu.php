<style>
.navbar-default .navbar-brand{
	background:#454E57;
	color:#FFF;
	font-size:17px;
	font-weight:600;
}
.navbar-default .navbar-brand:hover{
	background:#454E57;
	color:#FFF;
}

@media (max-width: 768px) {
	.page-header-fixed {
	  padding-top: 102px;
	}
}

@media (max-width: 468px) {
	.hidden-ss{
		display:none;
	}
}
.navbar-brand {
/*  line-height: 27px;
  padding: 0 20px;*/
  text-align:center;
}

.navbar-brand  span{
  font-size:15px;
  color:#FF871C;
}
</style>
<!--<style>
@media(max-width: 768px) {
.page-header-fixed{
	padding-top:100px
}

}
</style>-->

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
					<a href="" class="navbar-brand"></a>
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
					<!--<li id="header_task_bar" class="dropdown dropdown-extended dropdown-tasks">
					<a  class="dropdown-toggle" href="<?=$lang_code?>/cart">
					View Your Basket Here <i class="fa fa-shopping-cart"></i>
					<span class="badge badge-default cardItemNo">
					<?=$this->cart->total_items()?></span>
					</a>
					
				</li>-->
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?=!empty($user_details->image)?'assets/uploads/users/thumbnails/'.$user_details->image:'assets/uploads/profile.jpg'?>" alt="" /> 
							<span class="hidden-xs"><?=$user_details->first_name.' '.$user_details->last_name.' ('.$user_details->type.')';?>
</span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="<?=$_user_link.'/acccount/change_password'?>"><?=show_static_text($lang_id,50);?></a></li>
							<li class="divider"></li>
							<li><a href="<?=$_user_link.'/account/logout'?>"><?=show_static_text($lang_id,57);?></a></li>
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



