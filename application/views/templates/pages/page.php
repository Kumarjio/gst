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
</style>	
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">

		
<?php $this->load->view('templates/includes/menu'); ?>

		<!-- end:header-top -->
	
		
		

		<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12 heading-section animate-box">
						<h3 class="text-center"><?=$page->title?></h3>
                        
					</div>
					<div class="col-md-12 ">
						<div><?=$page->body?></div>
					</div>
				</div>
				
			</div>
		</div>
		
	
		<!-- END map -->

<?php $this->load->view('templates/includes/footer'); ?>
	</div>
	<!-- END fh5co-page -->

	</div>
	</body>
</html>

