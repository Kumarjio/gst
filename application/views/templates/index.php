<?php $this->load->view('templates/includes/header');?>
	<body>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W364489"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<?php $this->load->view('templates/includes/menu');?>
		<?php $this->load->view('templates/includes/slider');?>
		<?php $this->load->view('templates/includes/home_service');?>
		<?php $this->load->view('templates/includes/home_place');?>
		<?php $this->load->view('templates/includes/home_client');?>
		<?php
		$this->load->view('templates/includes/footer');
		?>
	</div>
	</div>
	</body>
</html>