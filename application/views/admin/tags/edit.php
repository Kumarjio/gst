<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
    	        <?php echo validation_errors();?>
                <?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form','enctype'=>"multipart/form-data"))?>                                                             
                        <div class="form-body">    
                            <h5><?=show_static_text($adminLangSession['lang_id'],268);?></h5>
                           <div style="margin-bottom: 0px;" class="tabbable">
                              <ul class="nav nav-tabs">
                                <?php $i=0;
                              //   debugger($this->page_m->languages_icon);
                              //  foreach($this->page_m->languages as $key_lang=>$val_lang):
                                foreach($this->tag_model->languages_icon as $key_lang=>$val_lang):

                                  $i++;?>
                                <li class="<?=$i==1?'active':''?>">
                                  <a data-toggle="tab" href="#<?=$key_lang?>"><img src="<?php echo base_url('assets/uploads/language').'/'.$val_lang; ?>" height="15" width="20" ></a></li>
                                <?php endforeach;?>
                              </ul>
                              <div style="padding-top: 9px; border-bottom: 1px solid #ddd;" class="tab-content">
                                <?php $i=0;foreach($this->tag_model->languages as $key_lang=>$val_lang):$i++;?>
                                <div id="<?=$key_lang?>" class="tab-pane <?=$i==1?'active':''?>">
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],236);?></label>
                                      <div class="col-lg-10">
                                        <?=form_input('title_'.$key_lang, set_value('title_'.$key_lang, $tags->{'title_'.$key_lang}), 'class="form-control copy_to_next" id="inputTitle'.$key_lang.'" placeholder="'.lang('Title').'"')?>
                                      </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                              </div>
                            </div>
						</div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-9">
                                    <?=form_submit('submit',show_static_text($adminLangSession['lang_id'],235), 'class="btn btn-primary"')?>
                                    <a href="<?=$_cancel?>" class="btn btn-default" type="button"><?=show_static_text($adminLangSession['lang_id'],22);?></a>
                                    <!--<button type="button" class="btn default">Cancl</button>-->
                                </div>
                            </div>
                        </div>
                <?=form_close()?>

            </div>
        </div>
        <!-- end panel -->
    </div>
</div>
