<?php $this->load->view('templates/includes/header.php'); ?>
<body >
<div id="fh5co-wrapper">
<div id="fh5co-page">
<!-- BEGIN HEADER -->
<?php $this->load->view('templates/includes/menu.php'); ?>
<!-- END global-header -->
<!-- END HEADER -->




<!--<div class="page-header">
        <div class="container">
          <div class="row">

            <div class="col-md-12">
              <h2 class="entry-title"><?=show_static_text($lang_id,24);?></h2>
              <div class="breadcrumb">
                
                <a href="<?=$lang_code?>"><?=show_static_text($lang_id,10);?></a>
                <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
                <span class="current"><?=show_static_text($lang_id,24);?></span>
              </div>
            </div>
          </div>
        </div>
      </div>-->
      

<div class="login-wrapper" style="min-height:350px;padding:155px 0">

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

    	<div class="col-md-6 col-xs-12">
			<h3><?=show_static_text($lang_id,33);?></h3>
        	<p>
            
             <a class="btn btn-sys" href="<?=$lang_code.'/secure/register'?>" ><?=show_static_text($lang_id,86);?></a>
            </p>
		</div>
    	<div class="col-md-6 col-xs-12">
            <div class="well">
        <?php //echo validation_errors();?>   
                <form method="post" action="" id="customer_login" accept-charset="UTF-8">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
                <input type="hidden" name="operation" value="set"  /> 
                      <div class="form-group">
                          <label for="username" class="control-label"><?=show_static_text($lang_id,111);?></label>
                          <input type="text" class="form-control" id="username" name="email" value="" required="" >
			              <span style="color:#F00;"><?php echo form_error('email'); ?></span>
                      </div>
                                                                              
                      <button type="submit" class="btn btn-sys btn-block"><?=show_static_text($lang_id,2);?></button>
                      <div style="margin-top:10px">
					  	<a class="forgot" href="<?=$lang_code.'/secure/login'?>" ><?=show_static_text($lang_id,2);?></a>
                      </div>
                  </form>
              </div><!--//well//-->
          </div><!--///col-xs-6/-->
	</div>
</div><!-- END container -->
</div>


<?php $this->load->view('templates/includes/footer.php'); ?>

</div><!--//fh5co-page//-->
</div><!--//fh5co-wrapper//-->

</body>
</html>

