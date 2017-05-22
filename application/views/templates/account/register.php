<?php $this->load->view('templates/includes/header.php'); ?>
<body>
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
              <h2 class="entry-title"><?=show_static_text($lang_id,1);?></h2>
              <div class="breadcrumb">
                
                <a href=""><?=show_static_text($lang_id,10);?></a>
                <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
                <span class="current"><?=show_static_text($lang_id,1);?></span>
              </div>
            </div>
          </div>
        </div>
      </div>-->


<div class="login-wrapper">

<div class="container">
    	<div class="">
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
        
        <?php //echo validation_errors();?>   
      <form method="post" action="" id="customer_login" accept-charset="UTF-8" onSubmit="return submit_reg_form(this);">
	    <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
		<input type="hidden" name="operation" value="set"  /> 
        <div class="row" style="margin-top:10px">
        	<div class="col-md-12">
            <div class="row">
<!--<div class="col-md-4 form-field"> 
	<label class="control-label" for="inputEmail">User Type</label> 
    <div class=""> 
		<select  name="type"  onChange="select_type(this.value);" class="form-control">
<?php
foreach($userTypes as $setType){
?>
	<option value="<?=$setType?>"><?=$setType?></option>
<?php
}
?>
        </select>
    </div> 
</div>-->

       	<div class="col-md-4 form-field" >
            <label class="control-label"><?=show_static_text($lang_id,1600);?>Username * </label>
            <div class="">
                <input type="text" class="form-control" title="" value="<?=set_value('username'); ?>" id="email_address" name="username">
                <span class="error-span" ><?php echo form_error('username'); ?></span>
            </div>
        </div>

       	<div class="col-md-4 form-field" >
            <label class="control-label"><?=show_static_text($lang_id,1600);?>Email * </label>
            <div class="">
				<input type="email" class="form-control" title=""  id="lastname" name="email" value="<?=set_value('email'); ?>">
				<span class="error-span"><?php echo form_error('email'); ?></span>
            </div>
        </div>

       	<div class="col-md-4 form-field" >
            <label class="control-label"><?=show_static_text($lang_id,1600);?>Name * </label>
            <div class="">
				<input type="text" class="form-control" title=""  id="lastname" name="first_name" value="<?=set_value('first_name'); ?>">
				<span class="error-span"><?php echo form_error('first_name'); ?></span>
            </div>
        </div>
        <div class="col-md-4 form-field" >
            <label class="control-label"><?=show_static_text($lang_id,1600);?>Last Name * </label>
            <div class="">
				<input type="text" class="form-control" title=""  id="lastname" name="last_name" value="<?=set_value('last_name'); ?>">
				<span class="error-span"><?php echo form_error('last_name'); ?></span>
            </div>
        </div>                      

        <div class="col-md-4 form-field" >
		<label class="control-label" for=""><?=show_static_text($lang_id,83);?><em>*</em></label>
        <div class="" style="clear:both" ></div>
        
	    <div class="col-md-4" style="padding-left:0px;" >
<div class="">
<select name="day" class="form-control" required>
<option value="">Select</option>
<?php
for($i=1;$i<=31;$i++){
?>
<option value="<?=$i?>" <?=$this->input->post('day')==$i?'selected':'';?> ><?=$i?></option>
<?php
}
?>
</select>
</div>
<span class="error-span" style="" ><?php echo form_error('day'); ?></span>
</div>
        <div class="col-md-4" style="margin-bottom:20px;">
            <div class="">
            <select name="month"  class="form-control" required>
                <option value="">Select</option>
                <option value="1" <?=$this->input->post('month')==1?'selected':'';?> >January</option>
                <option value="2" <?=$this->input->post('month')==2?'selected':'';?> >February</option>
                <option value="3" <?=$this->input->post('month')==3?'selected':'';?> >March</option>
                <option value="4" <?=$this->input->post('month')==4?'selected':'';?> >April </option>
                <option value="5" <?=$this->input->post('month')==5?'selected':'';?> >May</option>
                <option value="6" <?=$this->input->post('month')==6?'selected':'';?> >June</option>
                <option value="7" <?=$this->input->post('month')==7?'selected':'';?> >July</option>
                <option value="8" <?=$this->input->post('month')==8?'selected':'';?> >August</option>
                <option value="9" <?=$this->input->post('month')==9?'selected':'';?> >September</option>
                <option value="10" <?=$this->input->post('month')==10?'selected':'';?> >October</option>
                <option value="11" <?=$this->input->post('month')==11?'selected':'';?> >November</option>
                <option value="12" <?=$this->input->post('month')==12?'selected':'';?> >December</option>
            </select>
            </div>
            <span class="error-span" style="" ><?php echo form_error('month'); ?></span>
        </div>
        <div class="col-md-4" style="margin-bottom:20px;">
            <div class="">
                    <select name="year"  class="form-control" required>
        <option value="">Select</option>
<?php
for($i=date('Y');$i>=1900;$i--){
?>
<option value="<?=$i?>" <?=$this->input->post('year')==$i?'selected':'';?> ><?=$i?></option>
<?php
}
?>
        </select>
            
            </div>
            <span class="error-span" style="" ><?php echo form_error('year'); ?></span>
        </div>
        <div class="" style="clear:both" ></div>
		</div>                   

        <div class="col-md-4 form-field" >
            <label class="control-label"><?=show_static_text($lang_id,1600);?>Phone Number * </label>
            <div class="">
				<input type="text" class="form-control" title=""  id="lastname" name="phone" value="<?=set_value('phone'); ?>">
				<span class="error-span"><?php echo form_error('phone'); ?></span>
            </div>
        </div>                      

		<div class="col-md-4 form-field" >
            <label class="control-label"><?=show_static_text($lang_id,1404);?>Address * </label>
            <div class="">
                    <input type="text" class="form-control" title="" value="<?=set_value('address'); ?>" id="address" name="address">
                    <span class="error-span"><?php echo form_error('address'); ?></span>
            </div>
        </div>
        
        <div class="col-md-4 form-field" >
            <label class="control-label"><?=show_static_text($lang_id,3008);?>City * </label>
            <div class="">
                    <input type="text" class="form-control" title="" value="<?=set_value('city'); ?>" id="address" name="city">
                    <span class="error-span"><?php echo form_error('city'); ?></span>
            </div>
        </div>

        <div class="col-md-4 form-field" >
            <label class="control-label"><?=show_static_text($lang_id,3008);?>Country * </label>
            <div class="">
                    <select class="form-control" title="" name="country">
<option value="">Select</option>
<?php
if($country_data){
	foreach($country_data as $setCate){
?>
	<option value="<?=$setCate; ?>" <?= set_select('country',$setCate); ?> ><?=$setCate; ?></option>
<?php
	}
}
?>
</select>

                    <span class="error-span"><?php echo form_error('country'); ?></span>
            </div>
        </div>
        <div class="col-md-4 form-field" >
            <label class="control-label" for=""><?=show_static_text($lang_id,20);?> * </label>
            <div class="input-box">
                <input type="password" class="form-control" title="" id="password" name="password" value="<?=set_value('password'); ?>">
                  <span class="error-span"><?php echo form_error('password'); ?></span>
            </div>
        </div>


        <div class="col-md-4 form-field" >
            <label class="control-label" for=""><?=show_static_text($lang_id,21);?> * </label>
            <div class="input-box">
                <input type="password" class="form-control" id="confirmation" title="" name="confirm" value="<?=set_value('confirm'); ?>">
                <span class="error-span"><?php echo form_error('confirm'); ?></span>
            </div>
        </div>
        <div  style="clear:both"></div>
		
        </div>
        

		</div>
        </div>

      <div class="action-btn">
        <p>
          <input type="submit" class="btn btn-primary" value="<?=show_static_text($lang_id,1);?>">
        </p>
      </div>
      </form>
    </div>    
</div><!-- END container -->
</div>


<?php $this->load->view('templates/includes/footer.php'); ?>
<style>
.form-field{
	min-height:100px;
}
.error-span p{
	margin-bottom:0px;
	color:#C00;
	font-size:13px;
}
</style>
</div><!--//fh5co-page//-->
</div><!--//fh5co-wrapper//-->

</body>
</html>