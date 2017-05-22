
<style>
.table th{
	vertical-align:top !important;
}
</style>
		<div class="box-border" >

<div class="page-title">
			<h3 style="border-bottom: 1px solid #CCC;padding-bottom:10px"><?=$name?></h3>
</div>
<?php
if($order_review){
$order_review_comment	= $this->comman_model->get_by('stores_rating',array('parent_id'=>$order_review->id),false,false,false);
	
?>
			<div class="comment" style="">
 	<div class="col-sm-3"> <!--<span>Grade&nbsp;</span>-->
        <strong itemprop="author" style="text-align:center"><?=$order_review->username?></strong>
    </div>
    <div class="comment_details col-sm-9">
    	<div class="item-rating" style="float:left">
        <div class="star_content clearfix">
            <div class="star <?=$order_review->rate>=1?'star_on':''?>"></div>
            <div class="star <?=$order_review->rate>=2?'star_on':''?>"></div>
            <div class="star <?=$order_review->rate>=3?'star_on':''?>"></div>
            <div class="star <?=$order_review->rate>=4?'star_on':''?>"></div>
            <div class="star <?=$order_review->rate>=5?'star_on':''?>" ></div>
            <div class="star <?=$order_review->rate>=6?'star_on':''?>" style="margin-right:5px;"></div>        	
        </div> 
</div>
		<div style="float:right">
		     <em><?=date("d/m/Y",$order_review->created)?></em>
	     </div>
     </div>
     <div style="clear:both"></div>
	<div class="col-md-12">
		<p ><?=$order_review->comment;?></p>
    </div>
     <div style="clear:both"></div>
 </div>
<?php
if($order_review_comment){
	foreach($order_review_comment as $set_comment){
?>
<div class="comment" style="">
 	<div class="col-sm-3"> <!--<span>Grade&nbsp;</span>-->
        <strong itemprop="author" style="text-align:center"><?=$set_comment->username?></strong>
    </div>
  <div class="comment_details col-sm-9">    	
		<div style="float:right">
		     <em><?=date("d/m/Y",$set_comment->created)?></em>
	     </div>
     </div>
     <div style="clear:both"></div>
	<div class="col-md-12">
		<p ><?=$set_comment->comment;?></p>
    </div>
     <div style="clear:both"></div>
 </div>
<?php
	}
}
?>
 
<form method="post" action="" id="customer_login" accept-charset="UTF-8" style="padding-top:10px;" >
	    <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
		<input type="hidden" name="operation" value="set"  /> 
        
        <div class="col-md-6" >        
			<h4 style="color:#C8181B;font-weight:bold;margin-bottom:10px">Reply:</h4>
<div class="form-group">
	<label class="col-md-3 control-label">Comment</label>
    <div class="col-md-9">
		<textarea name="comment" id="reviews" style="width:100%" required></textarea>
    </div>
</div>

                              
        <div class="" style="clear:both" ></div>

</div><!--//col-md-6 //-->
        <div class="" style="clear:both" ></div>
        <div class="col-md-12 " style="">
		<div class="" style="padding-right:28px;padding-top:10px">
        <p>
<!--          <input type="btn" class="btn grey" value="Delete">-->
          <input type="submit" class="btn yellow" value="Submit">
        </p>
      </div>              
	      </div>
  </form>
  
<?php	
}
else{
	echo 'There is no reivews.';
}
?>
	<div style="clear:both"></div>
</div>


