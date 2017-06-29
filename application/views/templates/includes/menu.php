<?php
$service_icon = array('hajj.png','hand.png','notepad.png','cruises.png');
?>
<header id="fh5co-header-section" class="sticky-banner">
  <div class="container">
    <div class="nav-header"> <a href="javascript:;" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
      <h1 id="fh5co-logo"><a href="<?= base_url(); ?>"><img src="assets/uploads/sites/<?=$settings['logo']?>" class="img-responsive" alt="<?=$settings['site_name']?>" style=""  /></a></h1>
      <nav id="fh5co-menu-wrap" role="navigation">
        <ul class="sf-menu" id="fh5co-primary-menu">
          <li class="<?=$active=='Search Flight'?'active':''?>" ><a href="<?='flights'?>"><i class="icon-png"><img src="assets/frontend/images/flight.png" /></i> <?=show_static_text($lang_id,335);?></a></li>
          <li class="<?=$active=='Search Hotel'?'active':''?>" ><a href="<?='hotels'?>" ><i class="icon-png"><img src="assets/frontend/images/hotel.png" /></i> <?=show_static_text($lang_id,336);?></a></li>
          <li class="<?=$active=='Search Car'?'active':''?>" ><a href="carhire" ><i class="icon-png"><img src="assets/frontend/images/car.png" /></i> <?=show_static_text($lang_id,348);?></a></li>
          <li class="<?=$active=='Search Holiday'?'active':''?>" ><a href="holidays" > <i class="icon-png"><img src="assets/frontend/images/holiday.png" /></i> <?=show_static_text($lang_id,285);?></a></li>
          <?php
          $menu_service = $this->comman_model->get_lang('services',$lang_id,NULL,array('enabled'=>1),'service_id',false);
          if($menu_service ){
          $i=0;
          //print_r($menu_service);
          foreach($menu_service as $set_s){
          ?>
          <li class="<?=$active=='Search '.$set_s->id?'active':''?>"><a href="<?=''.$set_s->name?>"><i class="icon-png"><img src="assets/frontend/images/<?=isset($service_icon[$i])?$service_icon[$i]:'flight.png'?>" /></i><?=$set_s->title;?></a></li>
          <?php
          $i++;
          }
          }
          ?>
          <?php
          if(isset($user_details)){
           if($user_details->account_type=='S'){
          ?>
          <li class="mobile-menu-user-list"> <a href="<?='serviceprovider/account';?>"> <i class="fa fa-user"></i> <?=show_static_text($lang_id,14);?></a></li>
          <li class="mobile-menu-user-list"> <a href="<?='serviceprovider/account/logout';?>"> <i class="fa fa-sign-out"></i> <?=show_static_text($lang_id,57);?></a></li>
          <?php
          }
          else{
          ?>
          <li class="mobile-menu-user-list"> <a href="<?='user/account';?>"> <i class="fa fa-user"></i> <?=show_static_text($lang_id,14);?></a></li>
          <li class="mobile-menu-user-list"> <a href="<?='user/account/logout';?>"> <i class="fa fa-sign-out"></i> <?=show_static_text($lang_id,57);?></a></li>
          <?php
          }
          }
          else{
          ?>
          <li class="mobile-menu-user-list"> <a href="<?='secure/login'?>" > <i class="icon-user"></i> <?=show_static_text($lang_id,2);?></a></li>
          <?php
          }
          ?>
        </ul>
      </nav>
      <nav id="" role="navigation" class="right-menu" style="float:right">
        <div class="aa-language" style="float:left;margin-top:7px">
          <div class="dropdown"> <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <?=$lang_currency?><span class="caret"></span></a>
             <ul class="dropdown-menu m-t-0" aria-labelledby="dropdownMenu1">
              <?php
								if(isset($print_lang_menu)&&!empty($print_lang_menu)){
									foreach($print_lang_menu as $set_lang){
										if(!empty($set_lang['currency'])){
								?>
								<li><a href="javascript:;" onclick="set_currency('<?=$set_lang['currency'];?>')" title="<?=$set_lang['currency'];?>"> <?=$set_lang['currency']?></a></li>
              <?php		
									}
								}
							}
							?>
            </ul>
          </div>
        </div>
        <div class="aa-language" style="float:left;margin-top:7px">
          <div class="dropdown"> <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <img src="assets/uploads/language/<?=print_value('language',array('id'=>$lang_id),'image')?>"  style="height:17px;width:25px;"  alt="">
            <?=print_value('language',array('id'=>$lang_id),'code')?>
            <span class="caret"></span> </a>
            <ul class="dropdown-menu m-t-0" aria-labelledby="dropdownMenu1">
              <?php
								if(isset($print_lang_menu)&&!empty($print_lang_menu)){
									foreach($print_lang_menu as $set_lang){
										if($set_lang['id']!=$lang_id){
										$uri = $this->uri->uri_string();
										$exploded = explode('/', $uri);
										$exploded[0] = $set_lang['code'];
										$uri = implode('/',$exploded);
										$getData = parse_url($_SERVER['REQUEST_URI']);
										if(isset($getData['query'])){
											$uri = $uri.'?'.$getData['query'];
										}
								?>
              <li><a href="javascript:;" title="<?=$set_lang['language'];?>" onclick="set_langs('<?=$set_lang['id']?>')"> <img src="assets/uploads/language/<?php echo $set_lang['image']?>" alt="<?php echo $set_lang['language'];?>" title="<?php echo $set_lang['language'];?>" style="height:17px;width:25px;"  /> <?=$set_lang['code']?></a></li>
              <?php		
									}
								}
							}
							?>
            </ul>
          </div>
        </div>
        <ul class="contact-details sf-menu " style="float:right">
          <?php
						if(isset($user_details)){
							if($user_details->account_type=='S'){
						?>
          <li> <a href="javascript:;" class="fh5co-sub-ddown"><i class="fa fa-user"></i> <?=show_static_text($lang_id,14);?></a>
            <ul class="fh5co-sub-menu">
              <li><a href="<?='serviceprovider/account';?>"> <?=show_static_text($lang_id,14);?></a></li>
              <li><a href="<?='serviceprovider/account/logout';?>"> <?=show_static_text($lang_id,57);?></a></li>
            </ul>
          </li>
          <?php
						}
						else{
					?>
          <li> <a href="javascript:;" class="fh5co-sub-ddown"><i class="fa fa-user"></i> <?=show_static_text($lang_id,14);?></a>
            <ul class="fh5co-sub-menu">
              <li><a href="<?='user/account';?>"> <?=show_static_text($lang_id,14);?></a></li>
              <li><a href="<?='user/account/logout';?>"> <?=show_static_text($lang_id,57);?></a></li>
            </ul>
          </li>
          <?php
							}
						}
						else{
						?>
          <li> <a href="<?='secure/login'?>"><i class="icon-user"></i> <?=show_static_text($lang_id,2);?></a></li>
          <?php
					}
					?>
        </ul>
      </nav>
    </div>
  </div>
</header>
<script>
function set_currency(id){
	$.ajax({
		type:"POST",
		url:"lang/setCurrency",
		data:{id:id,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		dataType: 'json',
		success: function(json) {	
			if(json.status=='ok'){
 				location.reload();
 			}
			if(json.status=='error'){
			}
		}
	});
}

function set_langs(id){
	$.ajax({
		type:"POST",
		url:"lang/setLang",
		data:{id:id,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
		dataType: 'json',
		success: function(json) {	
			if(json.status=='ok'){
 				location.reload();
 			}
			if(json.status=='error'){
			}
		}
	});
}
</script> 