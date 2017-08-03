<style type="text/css">
.side-menu {
	height: 100%;
	border-right: 1px solid #e7e7e7;
	margin-right: 20px;
}
.side-menu .navbar {
	border: none;
}
.side-menu .navbar-header {
	width: 100%;
	border-bottom: 1px solid #e7e7e7;
}
.side-menu .navbar-nav li {
	display: block;
	width: 100%;
	border-bottom: 1px solid #e7e7e7;
}
.side-menu .navbar-nav li a:hover {
	background-color: rgb(255,153,0) !important;
	color: #FFF !important;
}
.side-menu .navbar-nav li a .glyphicon {
	padding-right: 10px;
}
.side-menu #dropdown {
	border: 0;
	margin-bottom: 0;
	border-radius: 0;
	background-color: transparent;
	box-shadow: none;
}
.side-menu #dropdown .caret {
	float: right;
	margin: 9px 5px 0;
}
.side-menu #dropdown .indicator {
	float: right;
}
.side-menu #dropdown > a {
	border-bottom: 1px solid #e7e7e7;
}
.side-menu #dropdown .panel-body {
	padding: 0;
	background-color: #f3f3f3;
}
.side-menu #dropdown .panel-body .navbar-nav {
	width: 100%;
}
.side-menu #dropdown .panel-body .navbar-nav li a {
	padding-left: 15px;
	border-bottom: 1px solid #e7e7e7;
}
.side-menu #dropdown .panel-body .navbar-nav li:last-child {
	border-bottom: none;
}
.side-menu #dropdown .panel-body .panel > a {
	margin-left: -20px;
	padding-left: 35px;
}
.side-menu #dropdown .panel-body .panel-body {
	margin-left: -15px;
}
.side-menu #dropdown .panel-body .panel-body li {
	padding-left: 30px;
}
.side-menu #dropdown .panel-body .panel-body li:last-child {
	border-bottom: 1px solid #e7e7e7;
}
.side-menu #search-trigger {
	background-color: #f3f3f3;
	border: 0;
	border-radius: 0;
	position: absolute;
	top: 0;
	right: 0;
	padding: 15px 18px;
}
.side-menu .brand-name-wrapper {
	min-height: 50px;
}
.side-menu .brand-name-wrapper .navbar-brand {
	display: block;
}
/* Main body section */
.user_left_menu {
	background-color: transparent;
}
.nameu {
	padding-left: 25px;
}
/* small screen */
</style>
<style>
.nav-profile {
	padding: 20px;
}

.navbar {margin-bottom: 0!important;}
</style>

<div class="col-md-3">
  <div class="profile-sidebar"> 
    <div class="side-menu">
      <nav class="navbar navbar-default user_left_menu" role="navigation"> 
        <div class="navbar-header">
          <div class="side-menu-container">
            <ul class="nav navbar-nav">
              <li class=" <?php echo $active=='home'?'active':'';?>" > <a href="<?=$lang_code?>/user/account" target=""> <i class="fa fa-home"></i> <span class="title"><?=show_static_text($lang_id,80);?></span> </a> </li>
              <li class="panel panel-default <?=($active=='General Settings'||$active=='Employee')?'active':''; ?> " id="dropdown"> <a data-toggle="collapse" href="#dropdown-lvl1"> <i class="fa fa-gears"></i> <?=show_static_text($lang_id,42);?> <span class="caret"></span> </a> 
                <div id="dropdown-lvl1" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul class="nav navbar-nav">
                      <li class=""><a href="<?=$_user_link.'/account/edit_profile'?>"><?=show_static_text($lang_id,45);?></a></li>
                      <li class=""><a href="<?=$_user_link.'/account/change_password'?>"><?=show_static_text($lang_id,20);?></a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="<?php echo $active=='wishlist'?'active':''; ?> " > <a href="<?=$_user_link.'/trip'?>" target=""> <i class="fa fa-bolt"></i> <span class="title"><?=show_static_text($lang_id,142);?></span></a></li>
              <li class="<?php echo $active=='Search Saved'?'active':''; ?>" > <a href="<?=$_user_link.'/saved_search'?>" target=""> <i class="fa fa-floppy-o"></i> <span class="title"><?=show_static_text($lang_id,313);?></span></a></li>              
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>
