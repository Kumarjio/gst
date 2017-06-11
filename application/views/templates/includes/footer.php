<footer>
  <section class="subscribe-wrapper">
    <div class="container">
      <div class="row animate-box">
        <div class="col-md-12 fh5co-heading">
          <h2><?=show_static_text($lang_id,347);?></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="mail-subscribe-widget">
            <form action="" class="aa-subscribe-form" onsubmit="save_newsletter();return false;">
              <input name="" id="newsletter-input" placeholder="<?=show_static_text($lang_id,81);?>" type="email" required="required">
              <input value="<?=show_static_text($lang_id,12);?>" type="submit">
            </form>
            <div id="show_msges" style="color:#C00"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="footer-wrapper">
    <div class="container">
      <div class="row ">
        <div class="col-md-8 col-sm-12">
          <div class="">
            <ul class="list-inline footer-menu">
              <?php
               if(isset($bottom_menu)){foreach($bottom_menu as $set_bottom_menu){?>
              <li><a href="<?=$set_bottom_menu->slug?>"><?=$set_bottom_menu->title;?></a></li>
              <?php } }?>
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 ">
          <div class=" social-widget">
            <ul class="social-icons">
              <li><a href="<?=$settings['twitter_url']?>" target="_blank"><i class="icon-twitter2"></i></a></li>
              <li><a href="<?=$settings['facebook_url']?>" target="_blank"><i class="icon-facebook2"></i></a></li>
              <li><a href="<?=$settings['google_plus']?>" target="_blank"><i class="icon-google-plus"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="copyright-section">
      <div class="row">
        <div class="col-md-12 text-center">
          <p>
            <?=show_static_text($lang_id,62);?>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="assets/frontend/js/main.js"></script>
<script>
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
function save_newsletter(){
	submitSubscribe =false;
	var newsEmail=$('#newsletter-input').val();
	submitSubscribe  = isEmail(newsEmail);
//	alert(ech);
	
	if(submitSubscribe){
		$('#show_msges').html('sending...');
		$.ajax({
			type:"POST",
			url:"ajax/save_newsletter",
			data:{newsEmail:newsEmail,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
			success:function(data){
				if(data==1)
				{
					$('#show_msges').html('<?=show_static_text($lang_id,190);?>');
				}
				else
				{
					$('#show_msges').html('<?=show_static_text($lang_id,191);?>');
				}
				setTimeout(function(){
				  $('#show_msges').html('');
				}, 3000);
			}
		
		});
	}
	else{
		$('#show_msges').html('<?=show_static_text($lang_id,201);?>');
	}
}

</script>
<div class="message-alert " id="message-alert1" style="display:none"></div>
<div class="popups-msge" >
  <div class="popupmsgcontent">
    <div class="alert-msge" >Removed from your Wishlist</div>
  </div>
</div>
<?=$settings['analytic_code'];?>