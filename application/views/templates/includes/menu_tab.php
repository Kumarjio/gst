<?php
$service_icon = array('hajj.png','hand.png','notepad.png','cruises.png');
$home_slider_s = $this->comman_model->get_lang('services',$lang_id,NULL,array('enabled'=>1),'service_id',false);
?>
<div class="tab-menu-wrapper">
<ul class="search-tab nav nav-tabs nav-justified hidden-md hidden-lg" >
  <li  class="<?=$active=='Search Flight'?'active':''?>" >
    <a href="<?=$active=='Search Flight'?'javascript:;':'flights'?>" ><i class="icon-png"><img src="assets/frontend/images/flight.png" /></i></a>
  </li>
  <li  class="<?=$active=='Search Hotel'?'active':''?>" >
       <a href="<?=$active=='Search Hotel'?'javascript:;':'hotels'?>" ><i class="icon-png"><img src="assets/frontend/images/hotel.png" /></i></a>
  </li>
  <li  class="<?=$active=='Search Car'?'active':''?>" >
       <a href="<?=$active=='Search Car'?'javascript:;':'carhire'?>" ><i class="icon-png"><img src="assets/frontend/images/car.png" /></i></a>
  </li>
  <li  class="<?=$active=='Search Holiday'?'active':''?>" >
       <a href="<?=$active=='Search Holiday'?'javascript:;':'holidays'?>" ><i class="icon-png"><img src="assets/frontend/images/holiday.png" /></i></a>
  </li>
<?php
if($home_slider_s){
	$i=0;
	foreach($home_slider_s as $set_s){
?>
  <li class="<?=$active=='Search '.$set_s->id?'active':''?>">
       <a href="<?=$active=='Search '.$set_s->id?'javascript:;':$set_s->name?>"><i class="icon-png"><img src="assets/frontend/images/<?=isset($service_icon[$i])?$service_icon[$i]:'flight.png'?>" /></i></a>
  </li>

<?php
$i++;
	}
}
?>  

</ul>
</div>

<style>
@media (max-width: 768px) {
  .tab-menu-wrapper .search-tab.nav-justified > li,.tab-menu-wrapper .search-tab.nav-justified > li {
    display: table-cell;
    width: 1%;
  }
}

.tab-menu-wrapper .search-tab{
	background:#000;
}
.tab-menu-wrapper .search-tab li a{
	margin-bottom:0;
	border-radius:0;
}
.tab-menu-wrapper .search-tab li a:hover{
	background:#f78536;
}
</style>