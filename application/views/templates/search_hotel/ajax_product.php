<?php
if(isset($products)&&!empty($products)){
	foreach($products as $set_product){
?>
<div class="col-md-4" id="product-<?=$set_product->id?>">
    <div class="col-item">
        <div class="photo">
            <img src="<?= !empty($set_product->image)?'assets/uploads/products/thumbnails/'.$set_product->image:'assets/uploads/no-image.gif';?>" alt="<?=$set_product->title;?>" class="img-responsive" />
        </div>
        <div class="info">
            <div class="row">
                <div class="price col-md-12">
                    <h5 class="title"><?=$set_product->title?></h5>
                    <p class="title-type"><?=$set_product->type?></p>
                </div>
                <div class="price col-md-6">
                    <h5 class="price-text-color">
<?php                    
if($set_product->discount_price!=0){
echo '$'.$set_product->discount_price;
}
else{
	$vatPrice		= 0;
	$taxPrice 		= 0;
	if($set_product->vat!=0&&$set_product->vat>0){
		$vatPrice = round(($set_product->price*$set_product->vat)/100,2);
	}
	if($set_product->tax!=0&&$set_product->tax>0){
		$taxPrice = round(($set_product->price*$set_product->tax)/100,2);
	}
	
	echo '$'.($set_product->price+$vatPrice+$taxPrice);
}
?>

                    </h5>
                </div>
                <div class="rating hidden-sm col-md-6">
                    <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                    </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                    </i><i class="fa fa-star"></i>
                </div>
            </div>
            <div class="separator clear-left">
                <p class="btn-details pull-right">
                    <i class="fa fa-list"></i><a href="<?=site_url($lang_code.'/product/'.$set_product->id)?>" class="hidden-sm">View</a></p>
            </div>
            <div class="clearfix">
            </div>
        </div>
    </div>
</div>

<?php
	}
}
?>
<style>
.col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
}
.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
	height:180px;
}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item:hover .info {
    background-color: #F5F5F5;
}
.col-item .price
{
    /*width: 50%;*/
    float: left;
    margin-top: 5px;
}
.col-item .title{
	font-size:19px;
	
}

.col-item .title-type{
	font-size:13px;
	color:#CCC;
	margin-bottom:0px;
	
}
.col-item .price h5
{
    line-height: 20px;
    margin: 0;
}

.price-text-color
{
    color: #219FD1;
}

.col-item .info .rating
{
    color: #777;
}

.col-item .rating
{
    /*width: 50%;*/
    float: left;
    font-size: 17px;
    text-align: right;
    line-height: 30px;
    margin-bottom: 10px;
    height: 25px;
}

.col-item .separator
{
    border-top: 1px solid #E1E1E1;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 50%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
    float: left;
    padding-left: 10px;
}
.controls
{
    margin-top: 20px;
}
[data-slide="prev"]
{
    margin-right: 10px;
}

</style>