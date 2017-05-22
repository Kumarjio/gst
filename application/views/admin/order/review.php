<link rel="stylesheet" href="assets/global/css/star.css">

<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
            <!-- BEGIN FORM-->
<?php
if($order_review){
$order_review_comment	= $this->comman_model->get_by('stores_rating',array('parent_id'=>$order_review->id),false,false,false);
?>
			<div class="comment" style="">
 	<div class="col-sm-2"> <!--<span>Grade&nbsp;</span>-->
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
<a href="<?=$_cancel?>/order_review/<?=$order_review->order_id;?>/delete" class="btn btn-icon-only btn-danger"  onclick="return confirm_box();" >Delete</a>
<?php	
}
else{
	echo 'There is no reivews.';
}
?>
                 
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>
<script>
function confirm_box(){
    var answer = confirm ("<?=show_static_text($adminLangSession['lang_id'],265);?>");
    if (!answer)
     return false;
}
</script>