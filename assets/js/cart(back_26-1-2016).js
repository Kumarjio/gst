function printerror_item(src,value) {
	//document.getElementById(src).innerHTML='<img src="images/ajax-loader.gif" />';
	$.ajax({
			type:"POST",
			url:"ajax_msg/error_item",
			data:"value="+value,
			success:function(data){
			document.getElementById(src).innerHTML=data;
			}
	});	
}

function addToCartExtra(productID,lang_id,lang_code,lang_curr,csrf_code,option,extra){
	$.ajax({
		type:"POST",
		url:"ajax_cart/addToFCartExtra",
		data:{productID:productID,option_id:option,extra_id:extra,lang_id:lang_id,csrf_test_name:csrf_code},
		dataType:'json',
		success:function(data){
			//	$('#'+src).html(data);
			if(data.status=='ok'){
				$('.simpleCart_quantity').html(data.total_items);
				$('.simpleCart_total').html(lang_curr+data.total_amount);
				$('.addtocart_'+productID).addClass('active');
				//printerror_item('popup_sucessMessage',84);
				$('#message-alert1').html(data.msge);
			  	$('#message-alert1 ').show();
				setTimeout(function(){		
				  $('#message-alert1 font').remove();
				  $('#message-alert1 ').hide();
				}, 5000);
				//change_color(productID);
				showExtra(extra,productID,'plus');
				refresh_cart(lang_id,lang_code,csrf_code);
			}
			else{
				//printerror_item('popup_sucessMessage',84);
				  $('#message-alert1').html(data.msge);
				  $('#message-alert1 ').show();
				
				setTimeout(function(){		
				  $('#message-alert1 font').remove();
				  $('#message-alert1 ').hide();
				}, 5000);
			}
		}
	});
}

function add_to_cart(productID,lang_id,lang_code,lang_curr,csrf_code,option){
	$.ajax({
		type:"POST",
		url:"ajax_cart/addToFCart",
		data:{productID:productID,option_id:option,lang_id:lang_id,csrf_test_name:csrf_code},
		dataType:'json',
		success:function(data){
			//	$('#'+src).html(data);
			if(data.status=='ok'){
				$('.simpleCart_quantity').html(data.total_items);
				$('.simpleCart_total').html(lang_curr+data.total_amount);
				$('.addtocart_'+productID).addClass('active');
				
				//printerror_item('popup_sucessMessage',84);
				$('#message-alert1').html(data.msge);
			  	$('#message-alert1 ').show();
				setTimeout(function(){		
				  $('#message-alert1 font').remove();
				  $('#message-alert1 ').hide();
				}, 5000);
				change_color(productID);
				refresh_cart(lang_id,lang_code,csrf_code);
			}
			else{
				//printerror_item('popup_sucessMessage',84);
				  $('#message-alert1').html(data.msge);
				  $('#message-alert1 ').show();
				
				setTimeout(function(){		
				  $('#message-alert1 font').remove();
				  $('#message-alert1 ').hide();
				}, 5000);
			}
		}
	});
}

function remove_qty(id,qty,lang_id,lang_code,csrf_code){
	$.ajax({
		type:"POST",
		url:"ajax_cart/remove_qty",
		data:{id:id,qty:qty,csrf_test_name:csrf_code},
		success:function(data){
			refresh_cart(lang_id,lang_code,csrf_code);		
		}
	});
}


function refresh_cart(lang_id,lang_code,csrf_code){
	$.ajax({
		type:"POST",
		url:"ajax_cart/refresh_cart",
		data:{lang_id:lang_id,lang_code:lang_code,csrf_test_name:csrf_code},
		success:function(data){
			$('#right-cart-items').html(data);
			checkoutFunction();
		}
	});
}

function checkoutFunction(){
	TotalAmount = parseFloat($('#TotalAmount').val());
	coupon_amount = parseFloat($('#coupon_amount').val());
	if(coupon_amount>0){
	}
	else{
		coupon_amount =0;
	}
	minCheckoutAmount = parseFloat($('#minCheckout').val());
	
	var selected = $("#menuSwitcher input[type='radio']:checked");
	if (selected.length > 0) {
		selectedVal = selected.val();
		if(selectedVal=='delivery'){
			if(minCheckoutAmount<=TotalAmount){
				$('#checkoutBtn').removeClass('disabled');
				$('#checkoutBtn').prop('disabled', false);
				$('#warning').addClass('hide');
				
			}
			else{
				$('#checkoutBtn').addClass('disabled');
				$('#checkoutBtn').prop('disabled',true);
				$('#warning').removeClass('hide');
			}
			getDeliveryPrice = parseFloat($('#deliveryPrice').val());
			$('.basketTotal .simpleCart_total').html('&pound;'+((getDeliveryPrice+TotalAmount)-coupon_amount).toFixed(2));
			$('.deliveryPrice').html('&pound;'+getDeliveryPrice);
		}
		else{
			$('.deliveryPrice').html('&pound;0');
			$('.basketTotal .simpleCart_total').html('&pound;'+((TotalAmount-coupon_amount).toFixed(2)));

			$('#checkoutBtn').removeClass('disabled');
			$('#checkoutBtn').prop('disabled', false);
			$('#warning').addClass('hide');
		}
	}
	else{	
		if(minCheckoutAmount<=TotalAmount){
			$('#checkoutBtn').removeClass('disabled');
			$('#checkoutBtn').prop('disabled', false);
			$('#warning').addClass('hide');
			
		}
		else{
			$('#checkoutBtn').addClass('disabled');
			$('#checkoutBtn').prop('disabled',true);
			$('#warning').removeClass('hide');
		}
	}
}
function refresh_cart_number(csrf_code)
{
	$.ajax({
		type:"POST",
		url:"ajax_cart/show_number",
		data:{csrf_test_name:csrf_code},
		success:function(data){
		
			$('.simpleCart_quantity').html(data);

		}
	});
}
function ajax_refresh_cart_amount(lang_unit,csrf_code)
{
	$.ajax({
		type:"POST",
		url:"ajax_cart/show_amount",
		data:{lang_unit:lang_unit,csrf_test_name:csrf_code},
		success:function(data){
		
			$('.simpleCart_total').html(data);

		}
	});
}

function delete_addto_cart(id,lang_unit,lang_id,lang_code,csrf_code)
{
	$.ajax({
		type:"POST",
		url:"ajax_cart/delete_cart",
		data:{id:id,csrf_test_name:csrf_code},
		success:function(data){
		
		$('#addtocart_popuo_li_'+id).hide();
		$('#cart_page_tr_'+id).hide();
		refresh_cart_number(csrf_code);
		ajax_refresh_cart_amount(lang_unit,csrf_code);
		//refresh_cart(lang_id,lang_code);
		//get_subtotal();
		//get_grandtotal();
		
		}
	});
}


function showExtra(id,product_id,type){
	$('.extra-form-'+id).show();
	value = parseFloat($('#ectl_'+id).val());
	price = parseFloat($('#extra_list_input_price_'+id).val());
	mainPrice = parseFloat($('#product-items-'+product_id).val());
	if(type=='plus'){
		value =value+1;
		$('#ectl_'+id).val(value);
		popTotal = mainPrice+(value*price);
		$('#product-items-'+product_id).val(popTotal.toFixed(2));
		$('.extra_list_price_'+id).html('&pound;'+(value*price).toFixed(2));
		$('#product-price-'+product_id).html('&pound;'+(popTotal).toFixed(2));
	}	
	else if(type=='minus'){
		if(value==0){}
		else{
			value =value-1;
			if(value==0){
				$('.extra-cart-form-'+id).hide();
			}
			popTotal = mainPrice-(value*price);
			$('#ectl_'+id).val(value);
			$('#product-items-'+product_id).val(popTotal.toFixed(2));
			$('.extra_list_price_'+id).html('&pound;'+(value*price).toFixed(2));
			$('#product-price-'+product_id).html('&pound;'+(popTotal).toFixed(2));
		}
	}	
}

function showUpdateExtra(id,product_id,type){
	$('#cartEditModal .extra-cart-form-'+id).show();
	value = parseFloat($('#cartEditModal #update_extra_qty_'+id).val());
	//console.log(value);
	price = parseFloat($('#cartEditModal #update_extra_input_price_'+id).val());
	mainPrice = parseFloat($('#cartEditModal  #product-items-'+product_id).val());
	if(type=='plus'){
		value =value+1;
		//alert(value);
		$('#cartEditModal #update_extra_qty_'+id).val(value);
		popTotal = (mainPrice+(value*price)).toFixed(2);
		$('#cartEditModal #cart-items-'+product_id).val(popTotal);
		$('#cartEditModal .extra_list_price_'+id).html('&pound;'+(value*price).toFixed(2));
		$('#cartEditModal #product-price-'+product_id).html('&pound;'+(popTotal).toFixed(2));
	}	
	else if(type=='minus'){
		if(value==0){
			$('#cartEditModal .extra-cart-form-'+id).hide();
		}
		else{
			value =value-1;
			if(value==0){
				$('#cartEditModal .extra-cart-form-'+id).hide();
			}
			popTotal = mainPrice-(value*price);
			$('#cartEditModal #update_extra_qty_'+id).val(value.toFixed(2));
			$('#cartEditModal #cart-items-'+product_id).val(popTotal.toFixed(2));
			$('#cartEditModal .extra_list_price_'+id).html('&pound;'+(value*price).toFixed(2));
			$('#cartEditModal #product-price-'+product_id).html('&pound;'+(popTotal).toFixed(2));
		}
	}	
}

function addExtra(productID,lang_id,lang_code,lang_curr,csrf_code,option,extra){
	$.ajax({
		type:"POST",
		url:"ajax_cart/addToFCartExtra",
		data:{productID:productID,option_id:option,extra_id:extra,lang_id:lang_id,csrf_test_name:csrf_code},
		dataType:'json',
		success:function(data){
			//	$('#'+src).html(data);
			if(data.status=='ok'){
				$('.simpleCart_quantity').html(data.total_items);
				$('.simpleCart_total').html(lang_curr+data.total_amount);
				$('.addtocart_'+productID).addClass('active');
				//printerror_item('popup_sucessMessage',84);
/*				$('#message-alert1').html(data.msge);
			  	$('#message-alert1 ').show();
				setTimeout(function(){		
				  $('#message-alert1 font').remove();
				  $('#message-alert1 ').hide();
				}, 5000);
				//change_color(productID);*/
				showUpdateExtra(extra,productID,'plus');
				refresh_cart(lang_id,lang_code,csrf_code);
			}
			else{
				//printerror_item('popup_sucessMessage',84);
				  $('#message-alert1').html(data.msge);
				  $('#message-alert1 ').show();
				
				setTimeout(function(){		
				  $('#message-alert1 font').remove();
				  $('#message-alert1 ').hide();
				}, 5000);
			}
		}
	});
}



function removeExtra(productID,lang_id,lang_code,lang_curr,csrf_code,option,extra,type){
	$.ajax({
		type:"POST",
		url:"ajax_cart/removeExtra",
		data:{productID:productID,option_id:option,extra_id:extra,lang_id:lang_id,csrf_test_name:csrf_code},
		dataType:'json',
		success:function(data){
			//	$('#'+src).html(data);
			if(data.status=='ok'){
				$('.simpleCart_quantity').html(data.total_items);
				$('.simpleCart_total').html(lang_curr+data.total_amount);
				$('.addtocart_'+productID).addClass('active');
				if(type=='cart'){
					showUpdateExtra(extra,productID,'minus');
				}
				else{
					showExtra(extra,productID,'minus');
				}
				refresh_cart(lang_id,lang_code,csrf_code);
			}
			else{
				//printerror_item('popup_sucessMessage',84);
/*				  $('#message-alert1').html(data.msge);
				  $('#message-alert1 ').show();
				
				setTimeout(function(){		
				  $('#message-alert1 font').remove();
				  $('#message-alert1 ').hide();
				}, 5000);*/
			}
		}
	});
}

function disabled(id){
	$('#disable-'+id).hide();
}