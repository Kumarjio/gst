<?php
if(isset($products)&&!empty($products)){
	$i=0;
	foreach($products as $set_product){
		$i++;
		$userLike = 'fa-heart-o';
		$userBell = 'fa-bell-o';


?>
<div class="flight-item ">
	<div class="item-media">
    	<div class="image-cover"><img src="<?= !empty($set_product->image)?'assets/uploads/services/thumbnails/'.$set_product->image:'assets/uploads/no-image.gif';?>" alt="<?=$set_product->name;?>" class="" ></div>
    </div>
    <div class="item-body">
    	<div class="item-title">
        <h2><a href="" marked="1"><?=$set_product->name?></a></h2></div>
<p>
<?php
$html = strip_tags($set_product->description);
$html = html_entity_decode($html, ENT_QUOTES, 'UTF-8');    
echo (strlen($html)>=350)?substr($html, 0 ,350).'...':$html;
?>
</p>

        <table class="item-table">
        	<!--<thead>
            	<tr>
                	<th class="route">Route</th>
                    <th class="depart">Depart</th>
                    <th class="arrive">Arrive</th>
                    <th class="duration">Duration</th>
                </tr>
            </thead>-->
            <tbody>
            

            </tbody>
        </table>

    </div>

    <div class="item-price-more">
    	<div class="price">
        	<span class="amount">$<?=$set_product->price?></span> </div>
            <a href="<?=$set_product->link?>" target="_blank" class="btn btn-success btn-block btn-sys">View</a></div>
</div>
<?php

	}
}
?>