<?php
$home_slider_s = $this->comman_model->get_lang('services',$lang_id,NULL,array('enabled'=>1),'service_id',false);
?>
<?php $this->load->view('templates/includes/header.php'); ?>
<link rel="stylesheet" href="assets/global/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css" >
<script src="assets/global/plugins/bootstrap-slider/dist/bootstrap-slider.min.js"></script>
<link href="assets/plugins/star_rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/star_rating/js/star-rating.js" type="text/javascript"></script>
<link rel="stylesheet" href="assets/global/plugins/touchspin/jquery.bootstrap-touchspin.css" />
<script type="text/javascript" src="assets/global/plugins/touchspin/jquery.bootstrap-touchspin.js"></script>
<link href="assets/global/css/product_list/2.css" rel="stylesheet">
<link href="assets/frontend/css/s_m_flight.css" rel='stylesheet' type='text/css'>
<style>
.search-section {
	background-image: url("<?='assets/uploads/sites/'.$settings['background_flight_search'];?>");
}
</style>
<script type="text/javascript" src="assets/global/plugins/typeahead/js/bootstrap-typeahead.js"></script>
<script>
$(document).ready(function() {          
$("#advance-search-form .f-place").typeahead({
	onSelect: function(item) {
		$('#i-fid').val(item.value);
        console.log(item.value);
    },

    ajax: {
        url: "ajax_product/api",
        timeout: 500,
        displayField: "value",
  		valueField: "id",
        triggerLength: 1,
        method: "get",
        loadingClass: "loading-circle",
        preDispatch: function (query) {
            //showLoadingMask(true);
            return {
                query: query
            }
        },
        preProcess: function (data) {
            if (data.success === false) {
                return false;
            }
            return data.results;
        }
    },
});

$("#advance-search-form .t-place").typeahead({
	onSelect: function(item) {
		$('#i-tid').val(item.value);
        console.log(item.value);
    },

    ajax: {
        url: "ajax_product/api",
        timeout: 500,
        displayField: "value",
  		valueField: "id",
        triggerLength: 1,
        method: "get",
        loadingClass: "loading-circle",
        preDispatch: function (query) {
            //showLoadingMask(true);
            return {
                query: query
            }
        },
        preProcess: function (data) {
            if (data.success === false) {
                return false;
            }
            return data.results;
        }
    },
});


})
</script>
<body>
<?php $this->load->view('templates/includes/menu.php'); ?>
<?php $this->load->view('templates/includes/menu_tab.php'); ?>
<div class="search-section">
 <div class="searchContainer">

  <section class="search-main-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="search-tab nav nav-tabs nav-justified hidden-sm hidden-xs" role="tablist">
            <li class="active"> <a href="#flights"><span class="fa fa-fw fa-plane"></span> <span class="hidden-xs">
              <?=show_static_text($lang_id,335);?>
              </span></a> </li>
            <li > <a href="hotels" ><span class="fa fa-fw fa-hotel"></span> <span class="hidden-xs">
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
          <div class="search-form-wp">
            <div class="row">
              <form action="flights" id="advance-search-form" method="get">
                <input type="hidden" name="min_price" id="min-price" value="<?=$this->input->get('min_price')?>" >
                <input type="hidden" name="max_price" id="max-price" value="<?=$this->input->get('max_price')?>" >
                <input type="hidden" name="fId" id="i-fid" value="<?=$this->input->get('fId')?>" >
                <input type="hidden" name="tId" id="i-tid" value="<?=$this->input->get('tId')?>" >
                <div class="row f-row">
                  <div class="form-group">
                    <div class="col-md-2 col-sm-12 col-xs-12 text-field-box margin-bottom-10">
                      <label class="input">
                        <?=show_static_text($lang_id,94);?>
                        :</label>
                      <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                        <input type="text" name="from_place" value="<?=$this->input->get('from_place')?>" class="form-control f-place" autocomplete="off"  placeholder="<?=show_static_text($lang_id,44);?>" required>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10 text-field-box">
                      <label class="input">
                        <?=show_static_text($lang_id,95);?>
                        :</label>
                      <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                        <input type="text" name="to_place" value="<?=$this->input->get('to_place')?>" class="form-control t-place" autocomplete="off"  aria-required="true" placeholder="<?=show_static_text($lang_id,44);?>" required>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10 date-field-box">
                      <label class="input">
                        <?=show_static_text($lang_id,108);?>
                        :</label>
                      <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                        <input class="form-control" type="text" id="input-s-date" name="d_date" value="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10 date-field-box  return-date-box ">
                      <label class="input">
                        <?=show_static_text($lang_id,339);?>
                        :</label>
                      <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                        <input class="form-control" type="text" id="input-e-date" name="r_date"  value="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"    />
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10 ">
                      <div class="input-field">
                        <label for="i-h-e-date2">
                          <?=show_static_text($lang_id,349);?>
                          :</label>
                        <div class="dropdown  mega-dropdown passenger"> <a href="javascript:;" class="dropdown-toggle " ><span class="total-psgr">1</span> Passengers <span class="caret"></span></a>
                          <ul class="dropdown-menu dropdown-lr animated mega-dropdown-menu pull-right" role="menu">
                            <div class="col-lg-12" style="margin-bottom:5px" >
                              <section>
                                <label for="class">
                                  <?=show_static_text($lang_id,130);?>
                                  :</label>
                                <input id="demo0" type="text" value="1" name="adults" onChange="total_passenger()" data-bts-min="1" data-bts-max="8" data-bts-step="1">
                              </section>
                            </div>
                            <div class="col-lg-12">
                              <section>
                                <label for="class">
                                  <?=show_static_text($lang_id,138);?>
                                  :</label>
                                <input id="demo1" type="text" value="0" name="children" onChange="total_passenger();child_age();" data-bts-min="0" data-bts-max="7" data-bts-step="1">
                              </section>
                            </div>
                            <div class="col-lg-12 child-box-content" style="">
                              <div class="child-age-content">
                                <label for="class">Age of child 1:</label>
                                <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" onChange="total_passenger();" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                              </div>
                              <div class="child-age-content">
                                <label for="class">Age of child 2:</label>
                                <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" onChange="total_passenger();" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                              </div>
                              <div class="child-age-content">
                                <label for="class">Age of child 3:</label>
                                <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                              </div>
                              <div class="child-age-content">
                                <label for="class">Age of child 4:</label>
                                <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                              </div>
                              <div class="child-age-content">
                                <label for="class">Age of child 5:</label>
                                <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                              </div>
                              <div class="child-age-content">
                                <label for="class">Age of child 6:</label>
                                <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                              </div>
                              <div class="child-age-content">
                                <label for="class">Age of child 7:</label>
                                <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                              </div>
                            </div>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12 search-btns ">
                      <button type="submit" class="btn btn-sys btn-sm pull-right" style=""><i class="fa fa-search"></i>
                      <?=show_static_text($lang_id,3);?>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <section> <span class="label">
                      <?=show_static_text($lang_id,310);?>
                      :</span>
                      <select class="cs-select input-trip-type cs-skin-border" name="trip_type">
                        <option value="one-way-trip"   >One-way trip</option>
                        <option value="return-trip" selected>Return trip</option>
                      </select>
                    </section>
                  </div>
                  <div class="col-sm-3">
                    <section> <span class="label">
                      <?=show_static_text($lang_id,315);?>
                      :</span>
                      <select class="cs-select cs-selects cs-skin-border">
                        <option value="Economy">Economy</option>
                        <option value="Premium economy">Premium economy</option>
                        <option value="Business class">Business class</option>
                        <option value="First class">First class</option>
                      </select>
                    </section>
                  </div>
                  <div class="col-sm-6">
                    <input type="checkbox" name="direct_preferred" value="1">
                    <span class="labels">
                    <?=show_static_text($lang_id,314);?>
                    &nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="checkbox" name="Include nearby airports" value="1">
                    <span class="labels">
                    <?=show_static_text($lang_id,317);?>
                    </span> </div>
                </div>
                <div class="clearfix"></div>
              </form>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  </div>
  
  <div class="min-height">
    <div id="leftBanner" class="hidden-sm hidden-xs leftBanner" title="">
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
    	
    	<h2>Find the cheapest flights</h2>
    </div>
    
    <div id="rightBanner" class="hidden-sm hidden-xs rightBanner" title="">
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
    <?php
$slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'bottom'),'banner_id',false);
if($slider_banner){
	$i=0;
	foreach($slider_banner as $set_sl){
			
?>
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
    <?php
	}
}
?>
  </section>
</div>
<?php $this->load->view('templates/includes/home_place');?>
<?php $this->load->view('templates/includes/footer.php'); ?>
<link href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css"  rel='stylesheet' type='text/css' >
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/frontend/js/flights.js"></script>
</body>
</html>