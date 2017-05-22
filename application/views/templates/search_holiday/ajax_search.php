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
<div class="flight-item skyscanner">
	<div class="item-media">
		<div class="image-cover"><img src="assets/frontend/images/travelpayouts-logo.png" alt="" style=""></div>
    </div>
    <div class="item-body">

        <table class="item-table">
            <tbody>
            <tr>
                <td class="airline border-dott-left" width="20">
	                <a href="" ><?=$set_product['airline']?> (<?=$set_product['flight_number']?>)</a>
                </td>
                <td class="route text-right">
	                <span class="flight-title"><?=$set_product['origin'];?></span>
	                <p class="flight-time"><span class="date"><?=travelpayouts_date($set_product['departure_at'],'H:i');?></span> <span class="date"><?=travelpayouts_date($set_product['departure_at'],'d-m-Y');?></span></p>
                </td>
                <td class="route text-center"><div class="duration">
					<div class="travel-time">hour</div>
					<div class="travel-stops _1" title="via New Delhi">
						<span class="stops">
							<span class="stop "></span>
						</span>
						<span class="total">stop</span>
					</div>
				</div></td>
                <td class="routes text-left">
	                <span class="flight-title"><?=$set_product['destination'];?></span>
	                <p class="flight-time"><span class="date"><?=travelpayouts_date($set_product['departure_at'],'H:i');?></span> <span class="date"><?=travelpayouts_date($set_product['departure_at'],'d-m-Y');?></span></p>
                </td>
                 </tr>

            </tbody>
        </table>
    	

        
        
    </div>

    <div class="item-price-more">
    	<div class="price">
        	<span class="amount"><?=h_unitPrice($set_product['price'],$lang_unit,$lang_currency)?></span> </div>
        <a href="<?=$set_product['link']?>" target="_blank" class="btn btn-sys btn-block ">View</a>
    </div>
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
		<div class="flight-table">
    	<table class="item-table">
            <tbody>
            <tr>
                <td class="airline border-dott-left" width="20">
	                <a href="javascript:;" ><?=$set_product['Outbound']['Carrieres']['Name']?></a>
                </td>
                <td class="route text-right">
	                <span class="flight-title"><?=$set_product['Outbound']['f_place']['Name'];?></span>
	                <p class="flight-time"><span class="date"><?=travelpayouts_date($set_product['Outbound']['DepartureDate'],'H:i');?></span> <span class="date"><?=travelpayouts_date($set_product['Outbound']['DepartureDate'],'d-m-Y');?></span></p>
                </td>
                <td class="route text-center"><div class="duration">
					<div class="travel-time">hour</div>
					<div class="travel-stops _1" title="via New Delhi">
						<span class="stops">
							<span class="stop "></span>
						</span>
						<span class="total">stop</span>
					</div>
				</div></td>
                <td class="routes text-left">
	                <span class="flight-title"><?=$set_product['Outbound']['t_place']['Name'];?></span>
	                <p class="flight-time"><span class="date"><?=travelpayouts_date($set_product['Outbound']['DepartureDate'],'H:i');?></span> <span class="date"><?=travelpayouts_date($set_product['Outbound']['DepartureDate'],'d-m-Y');?></span></p>
                </td>
                 </tr>

            </tbody>
        </table>
        </div>
<?php
	}
	if(!empty($set_product['Inbound'])){
?>
		<div class="flight-table no-border">
	    	<table class="item-table ">
            <tbody>
            <tr>
                <td class="airline border-dott-left" width="20">
	                <a href="javascript:;" ><?=$set_product['Inbound']['Carrieres']['Name']?></a>
                </td>
                <td class="route text-right">
	                <span class="flight-title"><?=$set_product['Inbound']['f_place']['Name'];?></span>
	                <p class="flight-time"><span class="date"><?=travelpayouts_date($set_product['Inbound']['DepartureDate'],'H:i');?></span> <span class="date"><?=travelpayouts_date($set_product['Inbound']['DepartureDate'],'d-m-Y');?></span></p>
                </td>
                <td class="route text-center"><div class="duration">
					<div class="travel-time">hour</div>
					<div class="travel-stops _1" title="via New Delhi">
						<span class="stops">
							<span class="stop "></span>
						</span>
						<span class="total">stop</span>
					</div>
				</div></td>
                <td class="routes text-left">
	                <span class="flight-title"><?=$set_product['Inbound']['t_place']['Name'];?></span>
	                <p class="flight-time"><span class="date"><?=travelpayouts_date($set_product['Inbound']['DepartureDate'],'H:i');?></span> <span class="date"><?=travelpayouts_date($set_product['Inbound']['DepartureDate'],'d-m-Y');?></span></p>
                </td>
                 </tr>

            </tbody>
        </table>
        </div>
<?php
	}
?>
    	

        
        
    </div>

    <div class="item-price-more">
    	<div class="price">
        	<span class="amount"><?=h_unitPrice($set_product['price'],$lang_unit,$lang_currency)?></span> </div>
        <a href="<?=$set_product['link']?>" target="_blank" class="btn btn-sys btn-block">View</a>
    </div>
</div>


<?php
	}/*!empty($set_product['Outbound'])||!empty($set_product['Inbound'])*/
}
}//show
	}
}
?>

<?php /*?><div class="flight-item skyscanner">
	<div class="item-media">
		<div class="image-cover"><img src="assets/frontend/images/Skyscanner_Logo.png" alt="" style=""></div>
    </div>
    <div class="item-body">
    	<!--<div class="item-title">
        <h2><a href="" marked="1">IndiGo</a></h2></div>-->

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
                <td class="airline border-dott-left" width="20">
	                <a href="" marked="1">IndiGo</a>
                </td>
                <td class="route text-right">
	                <span class="flight-title">IndiGo</span>
	                <p class="flight-time"><span class="date">00:00</span> <span class="date">14-05-2017</span></p>
                </td>
                <td class="route text-center"><div class="duration">
					<div class="travel-time">hour</div>
					<div class="travel-stops _1" title="via New Delhi">
						<span class="stops">
							<span class="stop "></span>
						</span>
						<span class="total">stop</span>
					</div>
				</div></td>
                <td class="routes text-left">
	                <span class="flight-title">IndiGo</span>
	                <p class="flight-time"><span class="date">00:00</span> <span class="date">14-05-2017</span></p>
                </td>
                 </tr>

            </tbody>
        </table>
    	

        
        
    </div>

    <div class="item-price-more">
    	<div class="price">
        	<span class="amount">Pound 113</span> </div>
            <a href="" target="_blank" class="btn btn-success btn-sm" marked="1">View</a></div>
</div><?php */?>