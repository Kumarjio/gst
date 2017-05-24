<style>
#fh5co-tours{
  width: 100%;
  background-color: <?='#'.$settings['background_b1_c'];?>;
  background-image: url("<?='assets/images/'.$settings['background_b1'];?>");
  background-size: cover;
  position: relative;
}

#fh5co-tours .fh5co-tours img{
	height: 240px;
	width: 100%;
}
</style>

<div id="fh5co-tours" class="fh5co-section-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
			<h3><?=show_static_text($lang_id,344);?></h3>
			</div>
			</div>
			<div class="row">
			<?php
			$this->db->limit(6);
			$this->db->order_by('id','desc');
			$home_services = $this->comman_model->get_lang('deals',$lang_id,NULL,array('enabled'=>1),'deal_id',false);
			if($home_services){
			foreach($home_services as $set_service){
			?>
			<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
			<h3><?=$set_service->title?></h3>
			<div href="#"><img src="<?= !empty($set_service->image)?'assets/uploads/services/thumbnails/'.$set_service->image:'assets/uploads/no-image.gif';?>" alt="<?=$set_service->title;?>" class="img-responsive" />
			<div class="desc">
			<h4><?=$set_service->city?></h4>
			<span><?=$set_service->body?></span>
			<span class="price"><?=h_unitPrice($set_service->price,$lang_unit,$lang_currency)?></span>
			<a class="btn btn-primary btn-outline" target="_blank" href="<?=$set_service->link?>"><span class="linktext"><?=show_static_text($lang_id,28);?> <i class="icon-arrow-right22"></i></span></a>
			</div>
			</div>
		</div>
		<?php
		}
		}
		
		?>
		
		</div>
	</div>
</div>

