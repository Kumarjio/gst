<!-- BEGIN HEADER -->
<div class="fixed-width-header">
<header class="minicart-header" id="headerCtrl" ng-controller="headerCtrl">
    <nav role="navigation">
    	<ul>
<?php
$this->db->order_by('order','asc');
$middle_menu = $this->comman_model->get_lang('page',$this->data['lang_id'],NULL,array('parent_id'=>0,'middle_menu'=>1),'page_id',false);

if(isset($middle_menu)){
	foreach($middle_menu as $set_top_menu){
?>
	<li><a href="<?=$lang_code.'/pages/'.$set_top_menu->slug?>" title=""><?=$set_top_menu->title;?></a></li>
<?php			
	}
}
?>        
		</ul>
    </nav>

  <a href="" style="float:left">
  <img src="assets/uploads/sites/<?=$settings['logo']?>" width="80px" alt="<?=$settings['site_name']?>" style="width:150px" />
  </a>
            <div style="clear:both"></div>
            <div class="container mini-cart-container" id="cartCtrl" ng-controller="cartCtrl">
                <div id="effect" class="row mini-cart" style="display:none;">
            <div class="minicart-title-bar"> <span>Today&#39;s Order</span> <span>Auto Delivery <!--<span class="mini-cart-auto-ships-on">Ships on {{next_AD_date}} <span class="change-date"><a href="">change</a></span></span>--></span>
              <div class="mini-cart-close">Close X</div>
            </div>
            
            <div ng-show="displayedCart('now')" id="toRight" class="col-md-12 ship-now-mini-cart">
        <?php
        if($this->cart->total_items()!=0){	
        ?>
              <div class="row" style="overflow:hidden;" ng-show="countFormItems(false)">
                <div class="col-md-8">
                  <div class="product-queue">
                    <ul>
        <?php
        foreach($this->cart->contents() as $items){
            $cart_product = $this->comman_model->get_by('products',array('id'=>$items['id']),false,false,true);
        ?>
                      <li ng-repeat="item in form_items | filter:{future: false}" class="mini-cart-item">
                        <div class="row">
                          <div class="mini-cart-product col-xs-6"><span ng-bind="displayTitle(item)"><?php echo $cart_product->name;?></span><br />
                            <div ng-show="item.removeable" class="mini-cart-edit">
                                <span>
                                    <input type="hidden"  name="cart_id" id="cart_id" value="<?php echo $items['rowid'];?>" />
                                    <a class="removeItem">Remove </a>
                                </span>
                            </div>
                          </div>
                          <div class="mini-cart-price col-xs-6">
                            <input type="text" class="item-count" value="<?php echo $items['qty'];?>">
                            <span ng-show="item.editable" class="item-count-update">
                            <a id="update_cart" ng-click="updateCart(item)">update</a></span><?php echo '$'.$cart_product->price;?></div>
                            <div style="clear:both;"></div>
                        </div>
                      </li>
        <?php
        }
        ?>
                    </ul>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mini-cart-total">
                    <div class="mini-cart-total-text">
                      <div>Subtotal:</div>
                      <div ng-show="discount_description" ng-bind="discount_description"></div>
                      <!--<div>Tax:</div>
                      <div>Shipping:</div>-->
                      <div class="grand-total">Today&#39;s Total:</div>
                    </div>
                    <!-- END mini-cart-total-text -->
                    <div class="mini-cart-totals">
                      <div><?php echo '$'.$this->cart->total();?></div>
                      <div ng-show="discount_description"></div>
                      <!--<div> $0</div>
                      <div>$9</div>-->
                      <div class="grand-total"><?php echo '$'.($this->cart->total());?></div>
                    </div>
                    <button onclick='location="<?php echo base_url();?>checkout/get_checkout"; return false;' type="button" class="btn-primary-esalon mini-cart-button">Checkout Now</button>
                    <div class="clear"></div>
                  </div>
                  <!-- END col-md-4" --> 
                </div>
              </div>
        <?php
        }
        else{
        ?>
              <div class="empty-cart-message" ng-hide="countFormItems(false)">You have no items in your shopping cart. <span class="mini-cart-close">Continue Shopping.</span></div>
        <?php
        }
        ?>
              
              <!-- END row --> 
            </div>
            <!-- END col-md-6 ship-now-mini-cart --> 
          </div>
              <!-- END row mini-cart --> 
            </div>
<!-- END container -->

<div id="cartWarning" style="display:none;">
  <p class="cart-warning-title">Attention:</p>
  <p>If you remove Auto-Delivery Hair Color, you will not enjoy 20% off all the other items in your cart.</p>
  <p>Please confirm: <!--<a href="" id="oneTimeHaircolor">one time</a>,--> <a href="#" id="removeHaircolor">Remove</a> or <a href="#" class="closeFancy">Cancel</a></p>
</div>
 <!-- minicart added by Dylan -->
</header>
</div>
