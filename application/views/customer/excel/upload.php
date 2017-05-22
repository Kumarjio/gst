<div class="row">
	<div class="col-md-12">
		<div class="box-border" >
<h3 style="color:#666666;border-bottom:1px solid #e7e7e7"><?=$name;?></h3>
            <div class="Popular-Restaurants-grids" style="margin-top:10px">
            <div class="row user-form" id="customer-login">
        <div class="col-md-10 col-right" >        
<?php //echo validation_errors();?>
<?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form','enctype'=>"multipart/form-data"))?>
                 	<input name="operation" type="hidden" value="set" />

                     <div class="form-body">                                          
	                    <div class="col-md-12">						                        
                        <div class="form-group">
                              <label class="col-lg-2 control-label">Upload Excel Files</label>
                              <div class="col-lg-3">
                                <input type="file" name="userfile" id="logo" requried>
                                    <!--<input type="file" name="logo" id="logo" />-->
                              </div>
  
							</div>
						</div>
                        

						</div>
	                 <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-9">
                                    <?=form_submit('submit', show_static_text($lang_id,235), 'class="btn btn-primary"')?>
                                    <a href="<?=$_cancel.'/excel';?>" class="btn btn-default" type="button"><?=show_static_text($lang_id,22);?></a>
                                </div>
                            </div>
                        </div>

	                 
                 <?=form_close()?>



      </div>
</div>
        </div>
		</div>
	</div><!--// col-md-6 //-->

    <!--// col-md-6 //-->
</div>



<style>
.customer-login .col-md-4{
	margin-bottom:10px;
}
.error-span{
	color:#F00;
	margin:0px;
}
.error-span p{
	margin:0px;
}

.form-group{
	clear:both;
}

.form-group label{
  padding: 5px 0px 0px;
  font-size: 13px;
  font-weight: normal;
}

</style>      

