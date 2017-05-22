<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
			<?php echo validation_errors(); ?>
            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">                    
					<input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2045);?>Main Background</label>
                        <div class="col-lg-4">
                           <?=form_input('main[background]', set_value('main[background]', isset($f_main->background)?$f_main->background:''), 'class="form-control jscolor"  placeholder="" required')?>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2045);?>Footer Background</label>
                        <div class="col-lg-4">
                           <?=form_input('foot[background]', set_value('foot[background]', isset($f_footer->background)?$f_footer->background:''), 'class="form-control jscolor"  placeholder="" required')?>
                        </div>
                    </div>
                </div>
<!--menu-->
<h3>Menu</h3>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2045);?> Menu background</label>
            <div class="col-lg-4">
               <?=form_input('menu[background]', set_value('menu[background]', isset($f_menu->background)?$f_menu->background:''), 'class="form-control jscolor"  placeholder="" required')?>
            </div>
        </div>
		<div class="form-group">
          <label class="col-lg-2 control-label">Fonts</label>
          <div class="col-lg-4">

            <select class="form-control " name="menu[font]" id="select_colour" style="">

<?php

if(isset($font_data)&&!empty($font_data)){
	foreach($font_data as $key=>$value){
?>
		<option value="<?=$key; ?>" <?=$key==$f_menu->font?'selected="selected"':''?>><?=$value; ?></option>
<?php
	}
}
?>
            
            </select>
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-2 control-label">Size</label>
          <div class="col-lg-4">

            <select class="form-control " name="menu[size]" id="select_colour" style="">

<?php
for($i=1;$i<99;$i++){
?>
		<option value="<?=$i; ?>" <?=$i==$f_menu->size?'selected="selected"':''?>><?=$i; ?></option>
<?php
}
?>
            
            </select>
          </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2045);?> Color</label>
            <div class="col-lg-4">
               <?=form_input('menu[color]', set_value('menu[color]', isset($f_menu->color)?$f_menu->color:''), 'class="form-control jscolor"  placeholder="" required')?>
            </div>
        </div>
<!--//menu//-->
<!--menu-->
<!--<h3>User Dashboard Message</h3>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2045);?> Menu background</label>
            <div class="col-lg-4">
               <?=form_input('user[background]', set_value('user[background]', isset($f_user_m->background)?$f_user_m->background:''), 'class="form-control jscolor"  placeholder="" required')?>
            </div>
        </div>
		<div class="form-group">
          <label class="col-lg-2 control-label">Fonts</label>
          <div class="col-lg-4">

            <select class="form-control " name="user[font]" id="select_colour" style="">

<?php

if(isset($font_data)&&!empty($font_data)){
	foreach($font_data as $key=>$value){
?>
		<option value="<?=$key; ?>" <?=$key==$f_user_m->font?'selected="selected"':''?>><?=$value; ?></option>
<?php
	}
}
?>
            
            </select>
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-2 control-label">Size</label>
          <div class="col-lg-4">

            <select class="form-control " name="user[size]" id="select_colour" style="">

<?php
for($i=1;$i<99;$i++){
?>
		<option value="<?=$i; ?>" <?=$i==$f_user_m->size?'selected="selected"':''?>><?=$i; ?></option>
<?php
}
?>
            
            </select>
          </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2045);?> Color</label>
            <div class="col-lg-4">
               <?=form_input('user[color]', set_value('user[color]', isset($f_user_m->color)?$f_user_m->color:''), 'class="form-control jscolor"  placeholder="" required')?>
            </div>
        </div>-->
<!--//menu//-->

<!--menu-->
<!--<h3>Register Message</h3>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2045);?> Menu background</label>
            <div class="col-lg-4">
               <?=form_input('regi[background]', set_value('regi[background]', isset($f_reg_m->background)?$f_reg_m->background:''), 'class="form-control jscolor"  placeholder="" required')?>
            </div>
        </div>
		<div class="form-group">
          <label class="col-lg-2 control-label">Fonts</label>
          <div class="col-lg-4">

            <select class="form-control " name="regi[font]" id="select_colour" style="">

<?php

if(isset($font_data)&&!empty($font_data)){
	foreach($font_data as $key=>$value){
?>
		<option value="<?=$key; ?>" <?=$key==$f_reg_m->font?'selected="selected"':''?>><?=$value; ?></option>
<?php
	}
}
?>
            
            </select>
          </div>
        </div>
		<div class="form-group">
          <label class="col-lg-2 control-label">Size</label>
          <div class="col-lg-4">

            <select class="form-control " name="regi[size]" id="select_colour" style="">

<?php
for($i=1;$i<99;$i++){
?>
		<option value="<?=$i; ?>" <?=$i==$f_reg_m->size?'selected="selected"':''?>><?=$i; ?></option>
<?php
}
?>
            
            </select>
          </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2045);?> Color</label>
            <div class="col-lg-4">
               <?=form_input('regi[color]', set_value('regi[color]', isset($f_reg_m->color)?$f_reg_m->color:''), 'class="form-control jscolor"  placeholder="" required')?>
            </div>
        </div>
--><!--//menu//-->
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-9">
                            <button type="submit" class="btn btn-primary btn-label-left"><?=show_static_text($adminLangSession['lang_id'],56);?></button>
                        </div>
                    </div>
				</div>
                                    
            </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>
	<script src="assets/plugins/color-picker/jscolor.js"></script>

	<script>
	function setTextColor(picker) {
		document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
	}
	</script>


<!--icon
monospace
sans-serif
serif
inherit
initial
unset
-moz-fixed
Arial
'Comic Sans MS'
Georgia
Helvetica
'Libre Baskerville'
"Lucida Console"
"Lucida Grande"
"Open Sans"
Tahoma
'Times New Roman'
"Trebuchet MS"
Verdana
caption
cursive-->


