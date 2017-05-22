<?php
$user_feedbacks = $this->comman_model->get_by('feedback',array('enabled'=>1),false,false,false);
if($user_feedbacks){
?>
<style>
#fh5co-testimonial {
  width: 100%;
  background-image: url("<?='assets/images/'.$settings['background_client'];?>");
  background-size: cover;
  position: relative;

}

</style>

<div id="fh5co-testimonial" style="">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2><?=show_static_text($lang_id,311);?></h2>
				</div>
			</div>
			<div class="row">
<?php
	foreach($user_feedbacks as $set_back){
?>
<div class="col-md-4">
    <div class="box-testimony animate-box">
        <blockquote>
            <span class="quote"><span><i class="icon-quotes-right"></i></span></span>
            <p>&ldquo; <?=$set_back->comment?> &rdquo;</p>
        </blockquote>
        <p class="author"><?=print_value('users',array('id'=>$set_back->user_id),'username');?> <span class="subtext">Customer</span></p>
    </div>
</div>
<?php		
}
?>            
				<!--<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;This is description. This is description. This is description. &rdquo;</p>
						</blockquote>
						<p class="author">User <span class="subtext">Customer</span></p>
					</div>
					
				</div>-->
			</div>
		</div>
	</div>
<?php
}
?>