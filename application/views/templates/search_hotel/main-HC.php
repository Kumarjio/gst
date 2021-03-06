<?php
$home_slider_s = $this->comman_model->get_lang('services',$lang_id,NULL,array('enabled'=>1),'service_id',false);
?>
<?php $this->load->view('templates/includes/header.php'); ?>
<link rel="stylesheet" href="assets/global/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css" >
<script src="assets/global/plugins/bootstrap-slider/dist/bootstrap-slider.min.js"></script>
<link href="assets/frontend/css/s_m_flight.css"  rel='stylesheet' type='text/css'>
<style>
.search-section {
	background-image: url("<?='assets/uploads/sites/'.$settings['background_hotel_search'];?>");
	background-attachment: fixed;
	background-position: center center;
	background-size: cover;
}

.hcsb_poweredBy {
	display: none!important;
}
</style>
<body>
<!-- BEGIN HEADER -->
<?php $this->load->view('templates/includes/menu.php'); ?>
<?php $this->load->view('templates/includes/menu_tab.php'); ?>
<!-- END global-header -->

<div class="search-section">
  <section id="aa-banner" class="hidden-sm hidden-xs" style="padding:10px 0">
    <div class="container search-content ">
      <div class="row">
<?php
        $slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'top'),'banner_id',false);
        if($slider_banner){
        $i=0;
        foreach($slider_banner as $set_sl){	
?>
        <div class="col-md-12">
          <div class="row">
            <div class="aa-banner-area text-center">
							<?php
								if(!empty($set_sl->body)){
								echo $set_sl->body;
							}
								else{
							?>
              <a href="<?=$set_sl->link?>"><img src="<?='assets/uploads/banners/'.$set_sl->image?>" style="width:100%;height:auto" /></a>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
        <?php
        }
}
?>
      </div>
    </div>
  </section>
  <!--//top _banner//--> 
  <!-- END HEADER -->
  <div class="search-main-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="search-tab nav nav-tabs nav-justified hidden-sm hidden-xs" role="tablist">
            <li class=""> <a href="flights"><span class="fa fa-fw fa-plane"></span> <span class="hidden-xs">
              <?=show_static_text($lang_id,335);?>
              </span></a> </li>
            <li class="active" > <a href="javscript:;" ><span class="fa fa-fw fa-hotel"></span> <span class="hidden-xs">
              <?=show_static_text($lang_id,336);?>
              </span></a> </li>
            <li > <a href="carhire"><span class="fa fa-fw fa-car"></span> <span class="hidden-xs">
              <?=show_static_text($lang_id,348);?>
              </span></a> </li>
            <li > <a href="holidays" ><span class="fa fa-fw fa-umbrella"></span> <span class="hidden-xs">
              <?=show_static_text($lang_id,285);?>
              </span></a> </li>
            <?php
if($home_slider_s){
	$i=0;
	foreach($home_slider_s as $set_s){
?>
            <li role="presentation"> <a href="<?=$active=='Search '.$set_s->id?'javascript:;':$set_s->name?>"> <span class="icons-png i-<?=$i?>"></span> <span class="hidden-xs">
              <?=$set_s->title?>
              </span></a> </li>
            <?php
$i++;
	}
}
?>
          </ul>
          <div class="search-form-wp" ng-controller="MainCtrl">
            <div class="row">
              
              <script src="//hotels.gosearchtravel.com/SearchBox/395045"></script>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- END container --> 
  </div>
  <div class="min-height">
    <div id="leftBanner" class="hidden-sm hidden-xs leftBanner" title="See best prices for hotels and flights.">
	     
      <?php
$slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'left'),'banner_id',false);
if($slider_banner){
	$i=0;
	foreach($slider_banner as $set_sl){
			
?>
      <div class="col-md-12">
        <div class="row">
          <div class="aa-banner-area">
            <?php
if(!empty($set_sl->body)){
	echo $set_sl->body;
}
else{
?>
            <a href="<?=$set_sl->link?>"><img src="<?='assets/uploads/banners/'.$set_sl->image?>" style="width:100%;height:auto" /></a>
            <?php
}
?>
          </div>
        </div>
      </div>
      <?php
	}
}
?>
    </div>
    
     <div class="center-content">
	     <div>
    	
	     </div>
    </div>

    <div id="rightBanner" class="hidden-sm hidden-xs rightBanner" title="See best prices for hotels and flights.">
      <?php
$slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'right'),'banner_id',false);
if($slider_banner){
	$i=0;
	foreach($slider_banner as $set_sl){
			
?>
      <div class="col-md-12">
        <div class="row">
          <div class="aa-banner-area">
            <?php
if(!empty($set_sl->body)){
	echo $set_sl->body;
}
else{
?>
            <a href="<?=$set_sl->link?>"><img src="<?='assets/uploads/banners/'.$set_sl->image?>" style="width:100%;height:auto" /></a>
            <?php
}
?>
          </div>
        </div>
      </div>
      <?php
	}
}
?>
    </div>
  </div>
  <section id="aa-banner" class="hidden-sm hidden-xs" style="padding:10px 0">
    <div class="container search-content">
      <div class="row">
        <?php
$slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'bottom'),'banner_id',false);
if($slider_banner){
	$i=0;
	foreach($slider_banner as $set_sl){
			
?>
        <div class="col-md-12">
          <div class="row">
            <div class="aa-banner-area">
              <?php
if(!empty($set_sl->body)){
	echo $set_sl->body;
}
else{
?>
              <a href="<?=$set_sl->link?>"><img src="<?='assets/uploads/banners/'.$set_sl->image?>" style="width:100%;height:auto" /></a>
              <?php
}
?>
            </div>
          </div>
        </div>
        <?php
	}
}
?>
      </div>
    </div>
  </section>
</div>
<!--//search-section//-->
<?php $this->load->view('templates/includes/home_place');?>
<?php $this->load->view('templates/includes/footer.php'); ?>
</body>
</html>