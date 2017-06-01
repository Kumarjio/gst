<?php $this->load->view('templates/includes/header.php'); ?>
<body >
<div id="fh5co-wrapper">
<div id="fh5co-page">

<?php $this->load->view('templates/includes/menu.php'); ?>

      

<div class="login-wrapper" style="min-height:350px;padding:120px 0">
<div class="container">
    <div class="row" >
        
	<?php
    if($this->session->flashdata('success')) {
    $msg = $this->session->flashdata('success');
    ?>
    <div class="alert alert-success"><?php echo $msg;?></div>
    <?php	
    }
    if($this->session->flashdata('error')) {
    $msg = $this->session->flashdata('error');
    ?>
        <div class="alert alert-danger"><?php echo $msg;?></div>
    <?php
    }
    ?>

    	
    	<div class="col-sm-12">
            <div class="well">
        <?php //echo validation_errors();?>   
                <form method="post" action="" id="customer_login" accept-charset="UTF-8">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
                <input type="hidden" name="operation" value="set"  /> 
                      <div class="form-group">
					  <?php $sub=$_GET['email'];?>
                          <label for="username" class="control-label"><?=show_static_text($lang_id,111);?></label>
                          <input type="text" class="form-control" id="username" name="email" value="<?php echo $sub; ?>" required="" >
			              <span style="color:#F00;"><?php echo form_error('email'); ?></span>
                      </div>                                                  
                      <button type="submit" class="btn btn-sys btn-block sub_btn">SUBMIT</button>
                     
                  </form>
              </div><!--//well//-->
          </div><!--///col-xs-6/-->
	</div>
</div><!-- END container -->

</div>

<?php $this->load->view('templates/includes/footer.php'); ?>
<style>
.sub_btn {
  width: 20%;
}
</style>
</div><!--//fh5co-page//-->
</div><!--//fh5co-wrapper//-->

</body>
</html>

