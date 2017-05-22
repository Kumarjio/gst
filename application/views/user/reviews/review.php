<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
<form method="post" action="" id="customer_login" accept-charset="UTF-8" style="padding-top:10px;" class="edit-form" >
	    <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
		<input type="hidden" name="operation" value="set"  /> 
        
        <div class="col-md-6" >        
<div class="form-group">
	<label class="col-md-3 control-label"><?=show_static_text($lang_id,36000);?>Rating</label>
    <div class="col-md-9">
        <input id="rating-input" name="rate" type="number" value="3" class="rating rating-input" min=0 max=5 step=1 data-size="xs" data-show-clear="false" data-show-caption="false" data-stars="5" />			  
    </div>
</div>


<div class="form-group">
	<label class="col-md-3 control-label"><?=show_static_text($lang_id,157);?></label>
    <div class="col-md-9">
		<textarea name="comment" class="form-control" id="reviews" style="width:100%" required><?=(isset($user_review)&&!empty($user_review))?$user_review->comment:''?></textarea>
    </div>
</div>

                              
        <div class="" style="clear:both" ></div>

</div><!--//col-md-6 //-->
        <div class="" style="clear:both" ></div>
        <div class="col-md-12 " style="">
		<div class="" style="padding-right:28px;padding-top:10px">
        <p>
<!--          <input type="btn" class="btn grey" value="Delete" onclick="return confirm_box();">-->
            <button type="submit" class="btn sys-btn submitBtn" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> <?=show_static_text($lang_id,56)?>"><?=show_static_text($lang_id,56)?></button>

        </p>
      </div>              
	      </div>
  </form>
            </div>
        </div>
        <!-- end panel -->
    </div>

</div>




<div style="clear:both"></div>
</div>


<style>
.customer-login .col-md-4{
	margin-bottom:10px;
}

.error-span{
	color:#F00;
	margin:0px;
}
.error-span p{
	margin:0px;
}

.form-group{
	clear:both;
}

.form-group label{
  padding: 5px 0px 0px;
  font-size: 13px;
  font-weight: normal;
}


</style>
<link href="assets/plugins/star_rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/star_rating/js/star-rating.js" type="text/javascript"></script>
<script>
function confirm_box(){
    var answer = confirm ("<?=show_static_text($lang_id,265);?>");
    if (answer){
		window.location ="<?=$lang_code?>/user/delete_review/<?=$order_id?>";
	}
     return false;
}

</script>
<script>
$('.edit-form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
$(document).ready(function () {
    $(".edit-form").submit(function () {
//        $(".submitBtn").attr("disabled", true);
		$(".submitBtn").button('loading');
        return true;
    });
});

</script>