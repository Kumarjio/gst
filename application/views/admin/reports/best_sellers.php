<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th><?=show_static_text($adminLangSession['lang_id'],16);?></th>
            <th><?=show_static_text($adminLangSession['lang_id'],104);?></th>
        </tr>
        </thead>
        <tbody>
<?php
if(isset($best_sellers)&&!empty($best_sellers)){
	foreach($best_sellers as $key=>$value){
		$product = $this->comman_model->get_lang('products',$content_language_id,NULL,array('id'=>$key),'product_id',true);
		if($product){

?>
        <tr>
            <td><?=$product->title?></td>
            <td><?=$value?></td>
        </tr>
<?php		
		}
	}
}
?>
    
        </tbody>
    </table>
</div>

                            