<?php $this->load->view('templates/includes/header'); ?>
<style>
#fh5co-services,
#fh5co-about,
#fh5co-contact {
  padding: 4em 0;
}

.heading-section h3 {
	margin-bottom:0;
}

.contact-info-list{
	list-style:none;
	padding-left:0;
}
</style>	
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">

		
<?php $this->load->view('templates/includes/menu'); ?>

		<!-- end:header-top -->
	
<section id="aa-banner" style="padding:10px 0;background:#F5F5F5">
    <div class="container">
      <div class="row">

<?php
$slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'top'),'banner_id',false);
if($slider_banner){
	$i=0;
	foreach($slider_banner as $set_sl){
			
?>
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area text-center">
<?php
if(!empty($set_sl->body)){
	echo $set_sl->body;
}
else{
?>
<a href="<?=$set_sl->link?>"><img src="<?='assets/uploads/banners/'.$set_sl->image?>" style="width:100%;height:auto" /></a>
<?php
}
?>    

          </div>
          </div>
        </div>

<?php
	}
}
?>
      </div>
    </div>
  </section>		
		

		<div id="fh5co-contact" class="fh5co-section-gray" style="padding:10px 0">
			<div class="container">
				<div class="row">
					<div class="col-md-12 heading-section animate-box">
						<h3 class="text-center"><?=$page->title?></h3>
                        
					</div>
					<!--<div class="col-md-12 ">
						<div><?=$page->body?></div>
					</div>-->
<section id="aa-blog-archive" style="padding:40px 0">
	<div class="container">
	    <div class="row">
	      <div class="row">
              <div class="col-md-6">
                <div class="mu-contact-left">
                  <form class="contactform" id="contact_form" accept-charset="UTF-8"> 
                <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
                <input type="hidden" name="operation" value="set"  /> 
                      <div class="form-group">
                          <label for="username" class="control-label"><?=show_static_text($lang_id,16)?> <span class="required">*</span></label>
                          <input type="text" required size="30" value="" name="author" id="input-name" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="username" class="control-label"><?=show_static_text($lang_id,18)?> <span class="required">*</span></label>
                          <input type="email" required size="30" value="" name="author" id="input-email" class="form-control">
                      </div>

                      <div class="form-group">
                          <label for="username" class="control-label"><?=show_static_text($lang_id,82)?> <span class="required">*</span></label>
                          <input type="text" required size="30" value="" name="author" id="input-phone" class="form-control">
                      </div>

                      <div class="form-group">
                          <label for="username" class="control-label"><?=show_static_text($lang_id,255)?> <span class="required">*</span></label>
                          <input type="text" required size="30" value="" name="author" id="input-subject" class="form-control">
                      </div>
                                            
                      <div class="form-group">
                          <label for="username" class="control-label"><?=show_static_text($lang_id,55)?></label>
                          <textarea class="form-control" id="input-message" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-sys"><?=show_static_text($lang_id,56)?></button>                      
                      
                  </form>                  
		            <div class="message ajax-error"></div>
                </div>
              </div>
              <div class="col-md-6">
              <div id="map_canvas" class="gmap"></div>
              <div class="decs"><?=$page->body?></div>
              <div class="aa-contact-top-right">
                <ul class="contact-info-list">
                  <li> <i class="fa fa-phone"></i> <?=$settings['phone']?></li>
                  <li> <i class="fa fa-envelope-o"></i> <?=$settings['site_email']?></li>
                  <li> <i class="fa fa-map-marker"></i> <?=$settings['address']?></li>
                </ul>
              </div>
               
              </div>
            </div>
      </div>  
	</div><!-- END container -->
</section>                    
				</div>
				
			</div>
		</div>
	
<section id="aa-banner" style="padding:10px 0;background:#F5F5F5">
    <div class="container">
      <div class="row">

<?php
$slider_banner = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'bottom'),'banner_id',false);
if($slider_banner){
	$i=0;
	foreach($slider_banner as $set_sl){
			
?>
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area text-center">
<?php
if(!empty($set_sl->body)){
	echo $set_sl->body;
}
else{
?>
<a href="<?=$set_sl->link?>"><img src="<?='assets/uploads/banners/'.$set_sl->image?>" style="width:100%;height:auto" /></a>
<?php
}
?>    

          </div>
          </div>
        </div>

<?php
	}
}
?>
      </div>
    </div>
  </section>
	
		<!-- END map -->

<?php $this->load->view('templates/includes/footer'); ?>
	</div>
	<!-- END fh5co-page -->

	</div>
	</body>
    
    <script>
$( document ).ready(function() {
	$( "#contact_form" ).submit(function() {
		var email = $('#input-email').val();
		var name = $('#input-name').val();
		var message = $('#input-message').val();
		var subject = $('#input-subject').val();
		var phone = $('#input-phone').val();
		$('.ajax-error').html('sending..');
		$.ajax({
				type:"POST",
				url:"ajax_contact/send_contact",
				data:{email:email,user_name:name,messege:message,subject:subject,phone:phone,lang_id:'<?=$lang_id?>',<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
				dataType: 'json',
				success: function(json) {	
					if(json.status=='ok'){
						$('.ajax-error').html(json.msg);
						$("#input-email").val('');
						$("#input-name").val('');
						$("#input-subject").val('');
						$("#input-message").val('');
					}
					if(json.status=='error'){
						$('.ajax-error').html(json.msg);
					}
				}
		});
	return false;	
	});
});
</script>
</html>

