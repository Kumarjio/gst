    <div class="row media-products">
<?php
if($products){
	foreach($products as $set_pro){
?>

<div class="col-md-3">
<a href="javascript:;" onclick="select_image('<?=$set_pro->files?>')">
<div class="product-item">
    <div class="pi-img-wrapper">
        <img src="<?='assets/images/'.$set_pro->files?>" class="img-responsive" alt="" style="height:100px;width:100%">
    </div>
	<h3><?=$set_pro->files?></h3>
</div>
</a>            
</div>
<?php

	}
}
?>
        
</div>
<s