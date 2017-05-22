<?php 
if(!empty($products)){
foreach($products  as $set_product){
//$user_data = $this->comman_model->get_by('users',array('id'=>$set_product->user_id),false,false,true);

if($set_product['type']=='travelpayouts'){
?>
<div class="marker" data-lat="<?=$set_product['location']['lat'];?>" data-lng="<?=$set_product['location']['lon'];?>" style="display:none">
    <article class="js-card card card-status-A" style="width:300px;padding:0px">
    <div class="card-photo card-block" style="padding-top:0%">
        <div class="card-photo-inner" style="float:left;width:100px;margin-right:10px">
    <a class="" href="<?=$set_product['link'];?>">
<img class="card-img" src="<?=isset($set_product['photos'])?$set_product['photos']:'assets/frontend/images/travelpayouts-logo.png';?>" alt="" title="" style="height:100px;width:100%">
    </a>

        </div>
            <div class="" style="">
                <h4 class="title"><?=$set_product['name'];?></h4>
                <div class="m-rating" >
	<i class="fa <?=$set_product['stars']>=1?'fa-star':'fa-star-o'?>"></i> 
    <i class="fa <?=$set_product['stars']>=2?'fa-star':'fa-star-o'?> "></i> 
    <i class="fa <?=$set_product['stars']>=3?'fa-star':'fa-star-o'?> "></i> 
    <i class="fa <?=$set_product['stars']>=4?'fa-star':'fa-star-o'?> "></i> 
    <i class="fa <?=$set_product['stars']>=5?'fa-star':'fa-star-o'?> "></i> 
	<!--<span style="color:#b8b8b8;font-size:13px;">	0 Reviews</span>-->
   </div>
  				<p><?=$set_product['address'];?></p>
        </div>

    <div style="clear:both"></div>
    </div>
</article>
</div>
<?php
}
	}
}
?>