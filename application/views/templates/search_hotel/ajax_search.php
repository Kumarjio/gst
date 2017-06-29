<?php
if(isset($products)&&!empty($products)){
	$i=0;
	foreach($products as $set_product){
		$i++;
		$userLike = 'fa-heart-o';
		$userBell = 'fa-bell-o';

if($set_product['type']=='travelpayouts'){
?>
<div class="flight-item" data-price="<?=!empty($set_product['price'])?$set_product['price']:0?>" data-star="<?=$set_product['stars']?>">
<div class="item-media">
		<div class="image-cover"><img src="<?=isset($set_product['photos'])?$set_product['photos']:'assets/frontend/images/travelpayouts-logo.png';?>" alt="" style=""></div>
    </div>
    <div class="item-body">
    	<div class="item-title">
        <h2><a href="javascript:;"><?=$set_product['name']?></a></h2>
        <div class="product-rating" style="margin-bottom:0px">
	<i class="fa <?=$set_product['stars']>=1?'fa-star':'fa-star-o'?>"></i> 
    <i class="fa <?=$set_product['stars']>=2?'fa-star':'fa-star-o'?> "></i> 
    <i class="fa <?=$set_product['stars']>=3?'fa-star':'fa-star-o'?> "></i> 
    <i class="fa <?=$set_product['stars']>=4?'fa-star':'fa-star-o'?> "></i> 
    <i class="fa <?=$set_product['stars']>=5?'fa-star':'fa-star-o'?> "></i> 
	<!--<span style="color:#b8b8b8;font-size:13px;">	0 Reviews</span>-->
    
   </div>
        </div>
		<p style="margin-top:10px;font-size:14px;"><?=$set_product['address']?></p>
		<!--<input type="text" value="<?=$set_product['address']?>" id="latlng">-->
        

    </div>

    <div class="item-price-more">
        <img src="assets/frontend/images/travelpayouts-logo1.png" class="img-travelpayout" />

    <div class="ratings-data">
        	<div class="wishlist "><a href="javascript:;"><i class="fa fa-heart-o"></i></a></div>  
        	<div class=" rating"> Good <span class="rating-count"><?=$set_product['stars']?></span></div>
        	<div class=" review"> 0 Reviews</div>
         </div>
    <div class="price-bottom">
<?php
if(!empty($set_product['price'])){
?>
<div class="price">
<span class="amount"><?=h_unitPrice($set_product['price'],$lang_unit,$lang_currency)?></span> 
</div>
<?php
}
?>            
            <a href="<?=$set_product['link']?>" target="_blank" class="btn btn-sys btn-block"><?=show_static_text($lang_id,28);?></a>
	</div>            
            </div>
</div>
<?php
}
else{
?>
<div class="flight-item" data-price="<?=!empty($set_product['price'])?$set_product['price']:0?>" data-star="<?=$set_product['stars']?>">
<div class="item-media">
		<div class="image-cover"><img src="<?='assets/frontend/images/hotwire_logo.png';?>" alt="" style=""></div>
    </div>
    <div class="item-body">
    	<div class="item-title">
        <h2><a href="javascript:;"><?=$set_product['name']?></a></h2>
        <div class="product-rating" style="margin-bottom:0px">
	<i class="fa <?=$set_product['stars']>=1?'fa-star':'fa-star-o'?>"></i> 
    <i class="fa <?=$set_product['stars']>=2?'fa-star':'fa-star-o'?> "></i> 
    <i class="fa <?=$set_product['stars']>=3?'fa-star':'fa-star-o'?> "></i> 
    <i class="fa <?=$set_product['stars']>=4?'fa-star':'fa-star-o'?> "></i> 
    <i class="fa <?=$set_product['stars']>=5?'fa-star':'fa-star-o'?> "></i> 
	<!--<span style="color:#b8b8b8;font-size:13px;">	0 Reviews</span>-->
    
   </div>
        </div>
		<p style="margin-top:10px;font-size:14px;"><?=$set_product['address']?></p>
        

    </div>

    <div class="item-price-more">
        <img src="assets/frontend/images/hotwire_logo.png" class="img-travelpayout" />

    <div class="ratings-data">
        	<div class="wishlist "><a href="javascript:;"><i class="fa fa-heart-o"></i></a></div>  
        	<div class=" rating"> Good <span class="rating-count"><?=$set_product['stars']?></span></div>
        	<div class=" review"> 0 Reviews</div>
         </div>
    <div class="price-bottom">
<?php
if(!empty($set_product['price'])){
?>
<div class="price">
<span class="amount"><?=h_unitPrice($set_product['price'],$lang_unit,$lang_currency)?></span> 
</div>
<?php
}
?>            
            <a href="<?=$set_product['link']?>" target="_blank" class="btn btn-sys btn-block"><?=show_static_text($lang_id,28);?></a>
	</div>            
            </div>
</div>
<?php
}
	}
}
?>