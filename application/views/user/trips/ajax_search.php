<?php
if(isset($products)&&!empty($products)){
	$i=0;
	foreach($products as $set_product){
		$i++;
		$userLike = 'fa-heart-o';
		$userBell = 'fa-bell-o';

if($set_product['type']=='travelpayouts'){

?>
<div class="flight-item">
<div class="item-media">
		<div class="image-cover"><img src="assets/frontend/images/travelpayouts-logo.png" alt="" style=""></div>
    </div>
    <div class="item-body">
    	<div class="item-title">
        <h2><a href="" marked="1"><?=$set_product['name']?> </a></h2></div>
		<p style="margin-top:10px;font-size:14px;"><?=$set_product['address']?></p>
        

    </div>

    <div class="item-price-more">
<?php
if(!empty($set_product['price'])){
?>
<div class="price">
<span class="amount">$<?=$set_product['price']?></span> 
</div>
<?php
}
?>            
            <a href="<?=$set_product['link']?>" target="_blank" class="btn btn-success">View</a></div>
</div>
<?php
}
	}
}
?>