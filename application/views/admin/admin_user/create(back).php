<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
				
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
            <!-- BEGIN FORM-->
            <?php echo validation_errors();?>
            <form class="form-horizontal"  method="post" enctype="multipart/form-data" data-parsley-validate="true">
					<input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
                	<input type="hidden" name="operation" value="set" />
                    <div class="form-body">
                        <div class="form-group" >
                            <label class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-10">
                                <?=form_input('username', set_value('username', $employee->{'username'}), 'class="form-control " id="" placeholder="Userame" required')?>
                            </div>
                        </div>                        
                        <div class="form-group" >
                            <label class="col-lg-2 control-label">Email-ID</label>
                            <div class="col-lg-10">
                                <?=form_input('email', set_value('email', $employee->{'email'}), 'class="form-control " id="" placeholder="Email-ID" required')?>
                            </div>
                        </div>                        
                        
                        <div class="form-group" >
                            <label class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <?=form_input('password', set_value('password', $employee->{'password'}), 'class="form-control " id="" placeholder="Password" required')?>
                            </div>
                        </div>
                                        

<div class="form-group">
                <label class="col-lg-2 col-md-2 control-label">Crendential</label>
                <div class="col-lg-8 col-md-8 " >
                    <div class="checkbox-list" style="margin-left:3px">
                        <label class="checkbox-inline">
<?=form_checkbox('is_general', '1', set_value('is_general', $employee->is_general), 'id="inputDefault" class=""')?>
                             General Settings</label>

                        <label class="checkbox-inline">
<?=form_checkbox('is_product', '1', set_value('is_product', $employee->is_product), 'id="inputDefault" class=""')?>
                             Product Management</label>                        

                        <label class="checkbox-inline">
<?=form_checkbox('is_ticket', '1', set_value('is_ticket', $employee->is_ticket), 'id="inputDefault" class=""')?>
                         Ticket Management</label>

                        <label class="checkbox-inline">
<?=form_checkbox('is_user', '1', set_value('is_user', $employee->is_user), 'id="inputDefault" class=""')?>
                         Customer Management</label>                                                

                        <label class="checkbox-inline">
<?=form_checkbox('is_customer', '1', set_value('is_customer', $employee->is_customer), 'id="inputDefault" class=""')?>
                         Service Provider</label>

                        <label class="checkbox-inline">
<?=form_checkbox('is_membership', '1', set_value('is_membership', $employee->is_membership), 'id="inputDefault" class=""')?>
                         Membership Management</label>

                        <label class="checkbox-inline">
<?=form_checkbox('is_order', '1', set_value('is_order', $employee->is_order), 'id="inputDefault" class=""')?>
                         Booking History</label>

                        <label class="checkbox-inline">
<?=form_checkbox('is_payment', '1', set_value('is_payment', $employee->is_payment), 'id="inputDefault" class=""')?>
                         Payment History</label>

                        <label class="checkbox-inline">
<?=form_checkbox('is_content', '1', set_value('is_content', $employee->is_content), 'id="inputDefault" class=""')?>
                         Content Management</label>

                        <label class="checkbox-inline">
<?=form_checkbox('is_chat', '1', set_value('is_chat', $employee->is_chat), 'id="inputDefault" class=""')?>
                         Chat Management</label>
                        <label class="checkbox-inline">
<?=form_checkbox('is_slider', '1', set_value('is_slider', $employee->is_slider), 'id="inputDefault" class=""')?>
                         Slider Management</label>

<!--                        <label class="checkbox-inline">
<?=form_checkbox('is_newsletter', '1', set_value('is_newsletter', $employee->is_newsletter), 'id="inputDefault" class=""')?>
                         Newsletter Management</label>-->
                        
                    </div>
                </div>
            </div>                                        
	                </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-9">
                                    <?=form_submit('submit', lang('Save'), 'class="btn btn-success"')?>
                                    <a href="<?=$_cancel?>" class="btn btn-default" type="button"><?=lang('Cancel')?></a>
                                    <!--<button type="button" class="btn default">Cancl</button>-->
                                </div>
                            </div>
                        </div>
               </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>





