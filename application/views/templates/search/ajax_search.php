<?php
$get_min_price = $this->input->get('min_price');
$get_max_price = $this->input->get('max_price');
if(isset($products)&&!empty($products)){
	$i=0;
	foreach($products as $set_product){
		$i++;
		$userLike = 'fa-heart-o';
		$userBell = 'fa-bell-o';
			$show = true;	

/*		if($get_min_price&&$get_max_price){
			$show =false;
			if($get_min_price<=$set_product['price']&&$set_product['price']<=$get_max_price){
				$show =true;
			}
		}
		else{
			$show = true;	
		}*/

if($show){
	if($set_product['type']=='travelpayouts'){
?>
<div class="flight-item travelpayouts single-trip " data-price="<?=!empty($set_product['price'])?$set_product['price']:0?>" style="  <?=$i>20?'display:none':''?>" data-max-stop="<?=$set_product['max_stop']?>">
	<!--<div class="item-media">
		<div class="image-cover"><img src="assets/frontend/images/travelpayouts-logo.png" alt="" style=""></div>
    </div>-->
    <div class="item-body">
		<h2 class="top-airline-title"><?=$set_product['airline']?></h2>
        <table class="item-table">
            <tbody>
            <tr>
                <td class="airline border-dott-left" >
	                <a href="" ><img src="assets/frontend/images/airline_logos/<?=$set_product['airline']?>.png" /></a>
                </td>
                <td class="route origin-route text-right">
	                <span class="flight-title"><?=$set_product['departure'];?> <?=$set_product['departure_time'];?></span>
	                <p class="flight-time"> <span class="date"><?=h_dateFormat($set_product['departure_date'],'d-m-Y');?></span></p>
	                <p class="flight-time"> <span class="date"><?=$set_product['departure'];?></span></p>
                </td>
                <td class="route route-time text-center"><div class="duration">
					<div class="travel-time">hour</div>
					<div class="travel-stops _1" title="via New Delhi">
						<span class="stops">
							<span class="stop "></span>
						</span>
						<span class="total">stop</span>
					</div>
				</div></td>
                <td class="routes destination-route text-left">
	                <span class="flight-title"><?=$set_product['arrival_time'];?> <?=$set_product['arrival'];?></span>
	                <p class="flight-time"><span class="date"><?=h_dateFormat($set_product['arrival_date'],'d-m-Y');?></span></p>
	                <p class="flight-time"><span class="date"><?=$set_product['arrival'];?></span></p>
                </td>
                 </tr>

            </tbody>
        </table>
    	
        <img src="assets/frontend/images/travelpayouts-logo1.png" class="img-travelpayout" />

        
        
    </div>

    <div class="item-price-more">
    	<div class="ratings-data">
        	<div class="wishlist item"><a href="javascript:;"><i class="fa fa-heart-o"></i></a></div>  
        	<div class="rating item text-right"><a href="javascript:;"><i class="fa fa-smile-o"></i><span style="display: block;
line-height: 6px;margin-right: 2px;">0</span></a></div>
         </div>
    	
        <div class="view-link">   
	        <div class="price">
        	<span class="amount"><?=h_unitPrice($set_product['price'],$lang_unit,$lang_currency)?></span> </div>
	        <a href="javascript:;" onclick="get_tr_url('<?=$set_product['url_price']?>','<?=$set_product['search_id']?>')" class="btn btn-green btn-block ">View</a>
        </div>
    </div>
</div>

<?php
}
else{
/*	echo '<pre>';
	print_r($set_product);
	echo '</pre>';*/
	if(!empty($set_product['Outbound'])||!empty($set_product['Inbound'])){
?>
<div class="flight-item skyscanner <?=!empty($set_product['Inbound'])?'return-trip':'single-trip'?> " data-price="<?=!empty($set_product['price'])?$set_product['price']:0?>" style="  <?=$i>20?'display:none':''?>">
	<!--<div class="item-media">
		<div class="image-cover"><img src="assets/frontend/images/Skyscanner_Logo.png" alt="" style=""></div>
    </div>-->
    
    <div class="item-body">
<?php
	if(!empty($set_product['Outbound'])){
?>
		<h2 class="top-airline-title"><?=$set_product['Outbound']['Carrieres']['Name']?></h2>

		<div class="flight-table">
    	<table class="item-table">
            <tbody>
            <tr>
                <td class="airline border-dott-left" width="20">
	                <a href="javascript:;" ><?=$set_product['Outbound']['Carrieres']['Name']?></a>
                </td>
                <td class="route origin-route text-right">
	                <span class="flight-title"><?=$set_product['Outbound']['f_place']['IataCode'];?> <?=travelpayouts_date($set_product['Outbound']['DepartureDate'],'H:i');?></span>
	                <p class="flight-time"><span class="date"><?=travelpayouts_date($set_product['Outbound']['DepartureDate'],'d-m-Y');?></span></p>
	                <p class="flight-time"><span class="date"><?=$set_product['Outbound']['f_place']['Name'];?></span></p>
                </td>
                <td class="route route-time text-center"><div class="duration">
					<div class="travel-time">hour</div>
					<div class="travel-stops _1" title="via New Delhi">
						<span class="stops">
							<span class="stop "></span>
						</span>
						<span class="total">stop</span>
					</div>
				</div></td>
                <td class="routes destination-route text-left">
	                <span class="flight-title"><?=travelpayouts_date($set_product['Outbound']['DepartureDate'],'H:i');?> <?=$set_product['Outbound']['t_place']['IataCode'];?></span>
	                <p class="flight-time"><span class="date"><?=travelpayouts_date($set_product['Outbound']['DepartureDate'],'d-m-Y');?></span></p>
	                <p class="flight-time"><span class="date"><?=$set_product['Outbound']['t_place']['Name'];?></span></p>
                </td>
                 </tr>

            </tbody>
        </table>
        </div>
<?php
	}
	if(!empty($set_product['Inbound'])){
?>
		<h2 class="top-airline-title " style="margin-top:10px;"><?=$set_product['Inbound']['Carrieres']['Name']?></h2>

		<div class="flight-table no-border">
	    	<table class="item-table ">
            <tbody>
            <tr>
                <td class="airline border-dott-left" width="20">
	                <a href="javascript:;" ><?=$set_product['Inbound']['Carrieres']['Name']?></a>
                </td>
                <td class="route origin-route text-right">
	                <span class="flight-title"><?=$set_product['Inbound']['f_place']['IataCode'];?> <?=travelpayouts_date($set_product['Inbound']['DepartureDate'],'H:i');?></span>
	                <p class="flight-time"><span class="date"><?=travelpayouts_date($set_product['Inbound']['DepartureDate'],'d-m-Y');?></span></p>
	                <p class="flight-time"><span class="date"><?=$set_product['Inbound']['f_place']['Name'];?></span></p>
                </td>
                <td class="route route-time text-center"><div class="duration">
					<div class="travel-time">hour</div>
					<div class="travel-stops _1" title="via New Delhi">
						<span class="stops">
							<span class="stop "></span>
						</span>
						<span class="total">stop</span>
					</div>
				</div></td>
                <td class="routes destination-route text-left">
	                <span class="flight-title"><?=travelpayouts_date($set_product['Inbound']['DepartureDate'],'H:i');?> <?=$set_product['Inbound']['t_place']['IataCode'];?></span>
	                <p class="flight-time"><span class="date"><?=travelpayouts_date($set_product['Inbound']['DepartureDate'],'d-m-Y');?></span></p>
	                <p class="flight-time"><span class="date"><?=$set_product['Inbound']['t_place']['Name'];?></span></p>
                </td>
                 </tr>

            </tbody>
        </table>
        </div>
<?php
	}
?>
    	

        <img src="assets/frontend/images/Skyscanner_Logo1.png" class="img-skyscanner" />
        
        
    </div>

    <div class="item-price-more">
    	<div class="ratings-data">
        	<div class="wishlist item"><a href="javascript:;"><i class="fa fa-heart-o"></i></a></div>  
        	<div class="rating item text-right"><a href="javascript:;"><i class="fa fa-smile-o"></i><span style="display: block;
line-height: 6px;margin-right: 2px;">0</span></a></div>
         </div>
    	
        <div class="view-link">   
	        <div class="price">
        	<span class="amount"><?=h_unitPrice($set_product['price'],$lang_unit,$lang_currency)?></span> </div>
	        <a href="<?=$set_product['link']?>" target="_blank" class="btn btn-green btn-block ">View</a>
        </div>
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