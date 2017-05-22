<div class="Popular-Restaurants-content">
		<div class="Popular-Restaurants-grids">
			<div class="">
<?php
$image = "assets/uploads/no-image.gif";
if(!empty($store_data->image)){
	$image = 'assets/uploads/stores/thumbnails/'.$store_data->image;
}

$rating_data = $this->comman_model->get_by('stores_rating',array('store_id'=>$store_data->id),false,false,false);
if($rating_data){
	$this->db->select_sum('rate');
	$total_rating = $this->comman_model->get_by('stores_rating',array('store_id'=>$store_data->id),false,false,false);
	//echo $this->db->last_query();
	$rate_times = count($rating_data);
	//$rate_value = $total_rating/$rate_times;
	$total_rate = $total_rating[0]->rate/$rate_times;
	//$total_rate = (($rate_value)/5)*100;
}
else{
	$total_rate = 0;
}

$disabled = '';
if(isset($user_details)){	
	if($user_details->account_type=='B'){		
		$user_like_data = $this->comman_model->get_by('stores_rating',array('store_id'=>$store_data->id,'user_id'=>$user_details->id),false,false,true);
		if(count($user_like_data)){
			$disabled= 'disabled';
		}		
	}
	else{
		$disabled= 'disabled';
	}
}
else{
	$disabled ='disabled';
}

?>
<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">
					<div class="col-md-3 restaurent-logo">
						<img src="<?=$image?>" class="img-responsive" alt="" style="width:100%;height:170px;" />
					</div>
					<div class="col-md-6 restaurent-title">
						<div class="logo-title">
							<h4><a href="<?=$lang_code.'/restaurant/'.$store_data->id;?>"><?=$store_data->name;?></a></h4>
						</div>
                        <div class="item-rating store">
        <div class="star_content clearfix">
            <div class="star <?=$total_rate>=1?'star_on':''?>"></div>
            <div class="star <?=$total_rate>=2?'star_on':''?>"></div>
            <div class="star <?=$total_rate>=3?'star_on':''?>"></div>
            <div class="star <?=$total_rate>=4?'star_on':''?>"></div>
            <div class="star <?=$total_rate>=5?'star_on':''?>" ></div>
            <div class="star <?=$total_rate>=6?'star_on':''?>" style="margin-right:5px;"></div>
        	<span style="font-size:16px;" title="Review"><?=count($review_data)?> reviews</span>
        </div> 
</div>
						<div class="rating">
							<span><?=$store_data->address?></span>
							<span><?=$store_data->zip?></span>
							<span><?=$store_data->city?></span>
							<span><?=$store_data->country?></span>
                            
						</div>
					</div>
					
					<div class="clearfix"></div>
				</div>				
			</div>
		</div>

    <div class="">
		<div class="product-collateral clearfix" id="sns_tab_products">
        <h3>Ratings and Comments</h3>
 <section class="page-product-box" id="sns_tab_reviews" style="margin-top:20px;">
 	<div id="product_comments_block_tab">

<?php
if($review_data){
	foreach($review_data as $set_review){
?>
<div class="comment row" style="border-bottom: 1px solid #CCC;padding:10px 0px">
 	<div class="comment_author col-sm-2"> <!--<span>Grade&nbsp;</span>-->
	    <div class="comment_author_infos" > 
            <img src="assets/uploads/profile.jpg" class="img-responsive" alt="" style="width:100%;height:85px"/>
			
        	<strong itemprop="author" style="text-align:center"><?=$set_review->username?></strong>
        </div>
    </div>
    <div class="comment_details col-sm-10">
	<div>
    <div class="item-rating store" style="float:left">
        <div class="star_content clearfix">
            <div class="star <?=$set_review->rate>=1?'star_on':''?>"></div>
            <div class="star <?=$set_review->rate>=2?'star_on':''?>"></div>
            <div class="star <?=$set_review->rate>=3?'star_on':''?>"></div>
            <div class="star <?=$set_review->rate>=4?'star_on':''?>"></div>
            <div class="star <?=$set_review->rate>=5?'star_on':''?>" ></div>
            <div class="star <?=$set_review->rate>=6?'star_on':''?>" style="margin-right:5px;"></div>        	
        </div> 
</div>
	<div style="float:right">
     <em><?=date("d F, Y",$set_review->created)?></em>
     </div>
     <div style="clear:both"></div>
     </div>

    <!--<p class="title_block" itemprop="name"> <strong></strong></p>--><p ><?=$set_review->comment;?></p>
    </div>
 </div>
<?php
	}
}
?>
                      
 	
 
 </div>
 
 </section>
 </div>
		
	</div>        
</div>
<link href="assets/plugins/star_rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/star_rating/js/star-rating.js" type="text/javascript"></script>
