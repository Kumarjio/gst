<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#chat-container").toggle("toggled");
});
</script>
<script type="text/javascript">
var base = "<?=base_url($admin_link.'/chat').'/';?>";
var base_url = "<?=base_url($admin_link.'/chat').'/';?>";
var csrfTokenName = '<?=$this->security->get_csrf_token_name();?>';
var csrfTokenValue = '<?=$this->security->get_csrf_hash();?>';
</script>
<script type="text/javascript" src="assets/global/plugins/chat/js/chat.js"></script>	
<link href="assets/global/plugins/chat/css/chat.css" rel="stylesheet" />
<style>
#chat-container strong {
  color: #767676;
  display: block;
  font-size: 14px;
  padding: 6px 15px;
  text-transform: uppercase;
}
.user-tab > li.active > a, .user-tab > li.active > a:focus, .user-tab > li.active > a:hover {
  background: #008A8A;
}

.user-tab > li > a {
  color:#FFF;
}

#chat-container .tab-content {
  background: #fff none repeat scroll 0 0;
  border-radius: 0px;
  margin-bottom: 0px;
  padding: 0px;
}
</style>
<div id="chat-container" class="fixed" style="display:none;">
<h2 class="chat-header">
 
<!--    <i class="fa fa-comment"></i> -->
<ul class="nav nav-pills user-tab" style="float:left">
  <li class="active btn btn-xs"><a data-toggle="pill" href="#home">All</a></li>
  <li class="btn btn-xs"><a data-toggle="pill" href="#menu1"><!--<span class="btn btn-xs btn-success" id="current_status">Online</span>-->Online <span class="user-online-count">0</span></a></li>
</ul>

    <a href="javascript:;" class="chat-form-close pull-right"><i class="fa fa-remove"></i></a>    
    <div style="clear:both"></div>
</h2>


<!--
| CHAT CONTACTS LIST SECTION
-->
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
		<div class="chat-inner" id="chat-inner" style="position:relative;">
<input type="text" class="form-control friend_name" autocomplete="off" name="search" placeholder="Search" >
<div class="chat-group">
<?php
$this->db->order_by('username','asc');
$userList= $this->comman_model->get_by('users',array('enabled'=>1,'confirm'=>'confirm'),false,false,false);
if($userList){
	foreach($userList as $set_User){
		$image = 'assets/uploads/profile.jpg';
		if(!empty($set_User->image)){
			$image = 'assets/uploads/users/small/'.$set_User->image;
		}
?>
    <a href="javascript:void(0)" data-toggle="popover" id="c-user-<?=$set_User->id;?>" class="user-item" data-name="<?=$set_User->username?>" data-ol="0">
	    <div class="contact-wrap">
      <input value="<?=$set_User->id?>" name="user_id" type="hidden">
       <div class="contact-profile-img">
           <div class="profile-img">
                <img src="<?=$image?>" class="img-responsive" style="width:27px;height:27px">
           </div>
       </div>
        <span class="contact-name">
            <small class="user-name"><?=$set_User->username?></small>
            <span class="badge progress-bar-danger" rel="<?=$set_User->id?>"></span>
        </span>
        <span style="display: table-cell;vertical-align: middle;" class="user_status">
             
            <span class="user-status is-offline" online-data="<?=$set_User->id?>"></span>
        </span>
    </div>
    </a>
<?php
	}
}
?>  
 </div>
 

<div id="chat_settings_wrapper"></div>

</div>
  </div>
  <div id="menu1" class="tab-pane fade">		
<div class="chat-inner" id="chat-inner2" style="position:relative;">
<div class="chat-group" id="user_online">
 </div>
 



</div>
  </div>
  
</div>

<!--
| CHAT CONTACT HOVER SECTION
-->
<!--<div class="popover" id="popover-content">
    <div id="contact-image">
                        <img src="assets/uploads/profile.jpg" class="img-responsive">
           </div>
    <div class="contact-user-info">
        <div id="contact-user-name">Ashley Elaina </div>
        <div id="contact-user-status" class="online-status">
             
            <span class="user-status is-offline"></span>
        </div>
    </div>
</div>-->
</div>
<script type="text/javascript">

$(document).ready(function(){
    $(".friend_name").keyup(function(){
        var str = $(".friend_name").val();
		var count = 0;
        $(".chat-group .user-item").each(function(index){
            if($(this).attr("data-name")){
				//case insenstive search
                if(!$(this).attr("data-name").match(new RegExp(str, "i"))){
                    $(this).fadeOut("fast");
                }else{
                    $(this).fadeIn("slow");
					count++;
                }
            }
        }); 
    });
});
$(document).on('click', '.chat-form-close', function(){
//	console.log('asd');
    $('#chat-container').hide();
    //$('.chat-box').hide();
});

</script>
<style>
#submitForm .dropdown-toggle{
	padding:4.3px 7px;
}
.smile-icons table td{
	padding:2px;
}
.smile-icons{
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.176);
  display: none;
  float: left;
  font-size: 14px;
  right: 0px !important;
  list-style: outside none none;
  margin: 2px 0 0;
  min-width: 160px;
  padding: 5px 0;
  position: absolute;
  text-align: left;
  bottom: 100%;
  top:auto;
  left:auto;
  z-index: 1000;
}
.chat-textarea .smile-btn{
	margin:0;
}
</style>