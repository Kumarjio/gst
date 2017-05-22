<style>
.store .star {
  font-size: 31px;
  margin-top: -2px;
  width: 33px;
}
.box-border .comment{
	border-bottom: 1px solid #CCC;padding:10px 0px;min-height:50px
}
.box-border .comment:last-child{
	border-bottom:none
}

</style>
<div class="row">
	<div class="col-md-6">
		<div class="box-border" >
			<h3>Reviews and rating summary</h3>
            <div class="Popular-Restaurants-grids">
<?php
//for review percent
$totalReviews = $this->comman_model->get_by('stores_rating',array('store_id'=>$store_data->id,'parent_id'=>0),false,false,false);
$totalReviewCount = count($totalReviews);
$bad 	= count($this->comman_model->get_by('stores_rating',array('store_id'=>$store_data->id,'parent_id'=>0,'rate <='=>2),false,false,false));
$neture = count($this->comman_model->get_by('stores_rating',array('store_id'=>$store_data->id,'parent_id'=>0,'rate >'=>2,'rate <='=>4),false,false,false));
$gud	= count($this->comman_model->get_by('stores_rating',array('store_id'=>$store_data->id,'parent_id'=>0,'rate >'=>4,'rate <='=>6),false,false,false));
$badPercent		= 0;
$neturePercent	= 0;
$gudPercent		= 0;
if($bad){
	$badPercent = (($bad * 100) / $totalReviewCount);
	$badPercent = round(($badPercent),0);
}

if($gud){
	$gudPercent = (($gud * 100) / $totalReviewCount);
	$gudPercent = round(($gudPercent),0);
}

if($neture){
	$neturePercent = (($neture * 100) / $totalReviewCount);
	$neturePercent = round(($neturePercent),0);
}
//
$rating_data = $this->comman_model->get_by('stores_rating',array('store_id'=>$store_data->id,'parent_id'=>0),false,false,false);
if($rating_data){
$this->db->select_sum('rate');
$total_rating = $this->comman_model->get_by('stores_rating',array('store_id'=>$store_data->id,'parent_id'=>0),false,false,false);
//echo $this->db->last_query();
$rate_times = count($rating_data);
//$rate_value = $total_rating/$rate_times;
$total_rate = $total_rating[0]->rate/$rate_times;
//$total_rate = (($rate_value)/5)*100;
}
else{
	$total_rating  = 0;
	$total_rate = 0;
}
?>

<div class="item-rating store">
    <div class="star_content clearfix">
        <div class="star <?=$total_rate>=1?'star_on':''?>"></div>
        <div class="star <?=$total_rate>=2?'star_on':''?>"></div>
        <div class="star <?=$total_rate>=3?'star_on':''?>"></div>
        <div class="star <?=$total_rate>=4?'star_on':''?>"></div>
        <div class="star <?=$total_rate>=5?'star_on':''?>" ></div>
        <div class="star <?=$total_rate>=6?'star_on':''?>" style="margin-right:5px;"></div>
        <span style="font-size:20px;float:right" title="Review"><span style="font-size:30px;font-weight:bold;color:#5bbd50"><?=round($total_rate,2);?></span>/ 6</span>
    </div> 
</div>
<?php
if(isset($total_rating[0])){
?>
<p>Average Based on <?=$total_rating[0]->rate?> rating</p>				
<?php
}
?>
        </div>
        
        

    <div class="progress" style="height:38px">

        <div class="progress-bar progress-bar-success" style="width: <?=$gudPercent?>%">

            <span class="" style=""><?=$gudPercent?></span>

        </div>

        <div class="progress-bar progress-bar-warning" style="width: <?=$neturePercent?>%">

            <span class="" style=""><?=$neturePercent?></span>

        </div>

        <div class="progress-bar progress-bar-danger" style="width: <?=$badPercent?>%">

            <span class="" style=""><?=$badPercent?></span>

        </div>

    </div>


		</div>
        <div class="box-border" >
			<h3 style="border-bottom: 1px solid #CCC;padding-bottom:10px">Lastest Reviews</h3>
<?php
if($latest_review_data){
	foreach($latest_review_data as $set_review){
?>
			<div class="comment" style="">
 	<div class="col-sm-3"> <!--<span>Grade&nbsp;</span>-->
        <strong itemprop="author" style="text-align:center"><?=$set_review->username?></strong>
    </div>
    <div class="comment_details col-sm-9">
    	<div class="item-rating" style="float:left">
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
		     <em><?=date("d/m/Y",$set_review->created)?></em>
	     </div>
     </div>
     <div style="clear:both"></div>
	<div class="col-md-12">
		<p ><?=$set_review->comment;?></p>
    </div>
     <div style="clear:both"></div>
 </div>
<?php
	}
}
?>
		</div>
	</div><!--// col-md-6 //-->

    <div class="col-md-6">
		<div class="box-border" >
			<h3 style="border-bottom: 1px solid #CCC;padding-bottom:10px">Customer Reviews</h3>
<?php
if($review_data){
	foreach($review_data as $set_review){
?>
			<div class="comment" style="">
 	<div class="col-sm-3"> <!--<span>Grade&nbsp;</span>-->
        <strong itemprop="author" style="text-align:center"><?=$set_review->username?></strong>
    </div>
    <div class="comment_details col-sm-9">
    	<div class="item-rating" style="float:left">
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
		     <em><?=date("d/m/Y",$set_review->created)?></em>
	     </div>
     </div>
     <div style="clear:both"></div>
	<div class="col-md-12">
		<p ><?=$set_review->comment;?></p>
    </div>
     <div style="clear:both"></div>
 </div>
<?php
	}
}
?>
		</div>
	</div><!--// col-md-6 //-->
</div>
