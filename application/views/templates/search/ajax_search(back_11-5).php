<?php
$get_min_price = $this->input->get('min_price');
$get_max_price = $this->input->get('max_price');
if(isset($products)&&!empty($products)){
	$i=0;
	foreach($products as $set_product){
		$i++;
		$userLike = 'fa-heart-o';
		$userBell = 'fa-bell-o';
		if($get_min_price&&$get_max_price){
			//echo '<br>'.$get_min_price.' < '.$set_product['price'].' < '.$get_max_price;
			$show =false;
			if($get_min_price<=$set_product['price']&&$set_product['price']<=$get_max_price){
				$show =true;
			}
		}
		else{
			$show = true;	
		}

if($show){
if($set_product['type']=='travelpayouts'){
?>
<div class="flight-item travelpayouts">
<div class="item-media"><div class="image-cover"><img src="assets/frontend/images/travelpayouts-logo.png" alt="" style=""></div></div>
    <div class="item-body">
    	<div class="item-title">
        <h2><a href="" marked="1"><?=$set_product['airline']?> (<?=$set_product['flight_number']?>)</a></h2></div>

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
            <tr>
                <td class="route">
	                <ul><li><?=$set_product['origin'];?> <i class="icon-arrow-right"></i></li> <li><?=$set_product['destination'];?></li></ul>
                </td>
                <td class="depart"><span><?=travelpayouts_date($set_product['departure_at'],'H:i');?></span> <span class="date"><?=travelpayouts_date($set_product['departure_at'],'d-m-Y');?></span></td>
                <td class="arrive"><span><?=travelpayouts_date($set_product['departure_at'],'H:i');?></span> <span class="date"><?=travelpayouts_date($set_product['departure_at'],'d-m-Y');?></span></td>
            </tr>

            </tbody>
        </table>

    </div>

    <div class="item-price-more">
    	<div class="price">
        	<span class="amount"><?=h_unitPrice($set_product['price'],$lang_unit,$lang_currency)?></span> </div>
            <a href="<?=$set_product['link']?>" target="_blank" class="btn btn-success btn-sm">View</a></div>
</div>
<?php
}
else{
	if(!empty($set_product['Outbound'])||!empty($set_product['Inbound'])){
?>
<div class="flight-item skyscanner">
	<div class="item-media">
		<div class="image-cover"><img src="assets/frontend/images/Skyscanner_Logo.png" alt="" style=""></div>
    </div>
    <div class="item-body">
<?php
	if(!empty($set_product['Outbound'])){
?>
    	<div class="item-title">
        <h2><a href="" marked="1"><?=$set_product['Outbound']['Carrieres']['Name']?></a></h2></div>

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
            <tr>
                <td class="route">
	                <ul><li><?=$set_product['Outbound']['f_place']['Name'];?> <i class="icon-arrow-right"></i></li> <li><?=$set_product['Outbound']['t_place']['Name'];?></li></ul>
                </td>
                <td class="depart"><span><?=travelpayouts_date($set_product['Outbound']['DepartureDate'],'H:i');?></span> <span class="date"><?=travelpayouts_date($set_product['Outbound']['DepartureDate'],'d-m-Y');?></span></td>
                <td class="arrive"><span><?=travelpayouts_date($set_product['Outbound']['DepartureDate'],'H:i');?></span> <span class="date"><?=travelpayouts_date($set_product['Outbound']['DepartureDate'],'d-m-Y');?></span></td>
            </tr>

            </tbody>
        </table>
<?php
	}
	if(!empty($set_product['Inbound'])){
	
?>
    	<div class="item-title">
        <h2><a href="" marked="1"><?=$set_product['Inbound']['Carrieres']['Name']?></a></h2></div>

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
            <tr>
                <td class="route">
	                <ul><li><?=$set_product['Inbound']['f_place']['Name'];?> <i class="icon-arrow-right"></i></li> <li><?=$set_product['Inbound']['t_place']['Name'];?></li></ul>
                </td>
                <td class="depart"><span><?=travelpayouts_date($set_product['Inbound']['DepartureDate'],'H:i');?></span> <span class="date"><?=travelpayouts_date($set_product['Inbound']['DepartureDate'],'d-m-Y');?></span></td>
                <td class="arrive"><span><?=travelpayouts_date($set_product['Inbound']['DepartureDate'],'H:i');?></span> <span class="date"><?=travelpayouts_date($set_product['Inbound']['DepartureDate'],'d-m-Y');?></span></td>
            </tr>

            </tbody>
        </table>
<?php
	}
?>        
    </div>

    <div class="item-price-more">
    	<div class="price">
        	<span class="amount"><?=h_unitPrice($set_product['price'],$lang_unit,$lang_currency)?></span> </div>
            <a href="<?=$set_product['link']?>" target="_blank" class="btn btn-success btn-sm">View</a></div>
</div>
<?php
	}
}
}//show
	}
}
?>