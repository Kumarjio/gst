<?php $this->load->view('templates/includes/header.php'); ?>
<body>
<div id="fh5co-wrapper">
  <div id="fh5co-page">
    <?php $this->load->view('templates/includes/menu.php'); ?>
    <div class="login-wrapper" style="min-height:650px;">
      <div class="container">
        <div class="row">
         <div class="col-md-12 heading-section animate-box fadeInUp animated">
						<h1 class="text-center">Newsletter Unsubscribe</h1>  
					</div>
          <div id="errmsg" style="color:red; display:none;"></div>
          <h4>Please enter your email address below and press submit</h4>
          <div class="col-sm-12">
            <div class="well">
              <?php //echo validation_errors();?>
              <form method="post" action="" id="unsubscription" accept-charset="UTF-8">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
                <input type="hidden" name="operation" value="set"  />
                <div class="form-group">
                  <?php $sub=$_GET['email'];?>
                  <label for="username" class="control-label">
                    <?=show_static_text($lang_id,111);?>
                  </label>
                  <input type="text" class="form-control" id="username" name="email" value="<?php echo $sub; ?>" required="" >
                  <span style="color:#F00;"><?php echo form_error('email'); ?></span> </div>
                <button type="submit" class="btn btn-sys btn-block sub_btn">SUBMIT</button>
              </form>
            </div>
          </div>
        </div>
        <div><?php echo $delete; ?></div>
      </div>
    </div>
    <?php $this->load->view('templates/includes/footer.php'); ?>
    <style>
			@media only screen and (min-width: 767px) {
				.sub_btn {width: 20%;}
			}
			h1 {margin: 0!important;}
		</style>
  </div>
</div>
</body>
</html>