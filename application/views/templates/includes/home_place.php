<div id="fh5co-destination">
			<div class="tour-fluid">
				<div class="row">
					<div class="col-md-12">
						<ul id="fh5co-destination-list" class="animate-box">
<?php
$this->db->limit('10');
$places = $this->comman_model->get_by('places',array('enabled'=>1),false,false,false);
if($places){
	$i=0;
	foreach($places as $set_place){
		$i++;
		if($i==6){
?>
<li class="one-half text-center">
    <div class="title-bg">
        <div class="case-studies-summary">
            <h2><?=show_static_text($lang_id,346);?></h2>
        </div>
    </div>
</li>
<?php
		}
?>
<li class="one-forth text-center" style="background-image: url(<?= !empty($set_place->image)?'assets/uploads/countries/thumbnails/'.$set_place->image:'assets/uploads/no-image.gif';?>); ">
    <a href="<?=!empty($set_place->link)?$set_place->link:'hotels?city='.$set_place->name.'&in_date='.date('d-m-Y').'&out_date='.date('d-m-Y')?>">
        <div class="case-studies-summary">
            <h2><?=$set_place->name?></h2>
        </div>
    </a>
</li>
<?php
	}
}
?>
							
						</ul>		
					</div>
				</div>
			</div>
		</div>