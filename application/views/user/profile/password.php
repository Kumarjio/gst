<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">

	<form method="post"  accept-charset="UTF-8" >
	    <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
		<input type="hidden" name="operation" value="set"  /> 
<div class="form-group">
    <label class="col-md-3 control-label"><?=show_static_text($lang_id,51);?><em>*</em></label>
    <div class="col-md-9">
        <input type="password" class="form-control" title="" id="firstname" name="old_password" value="<?=set_value('old_password');?>" >
	    <span class="error-span"><?php echo form_error('old_password'); ?></span>
    </div>
    <div style="clear:both"></div>
</div>                      
<div class="form-group" >
    <label class="col-md-3 control-label"><?=show_static_text($lang_id,161);?><em>*</em></label>
    <div class="col-md-9">
        <input type="password" class="form-control" title=""  id="lastname" name="password" value="<?=set_value('password');?>">
        <span class="error-span"><?php echo form_error('password'); ?></span>
    </div>
    <div style="clear:both"></div>
</div>

<div class="form-group" >
    <label class="col-md-3 control-label"><?=show_static_text($lang_id,21);?><em>*</em></label>
    <div class="col-md-9">
        <input type="password" class="form-control" title=""  id="lastname" name="password_confirm" value="<?=set_value('password_confirm');?>">
        <span class="error-span"><?php echo form_error('password_confirm'); ?></span>
    </div>
    <div style="clear:both"></div>
</div>
                              
      <div class="form-actions">
                    <div class="row">
                        <div class="pull-right">
                         <button type="submit" style="margin-top: 56px;" class="btn btn-primary submitBtn" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> <?=show_static_text($lang_id,56)?>">Update Password</button>
                        </div>
                    </div>
                </div>
      </form>
      </div>
       </div>
        <!-- end panel -->
    </div>
