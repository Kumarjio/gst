<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
				
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
<ol class="bwizard-steps clearfix clickable" >
<li style="z-index: 5;" class="<?=$set_level==1?'active':''?>" ><span class="label <?=$set_level==1?'badge-inverse':''?>">1</span> Your Service </li>
<li style="z-index: 4;" class="<?=$set_level==2?'active':''?>" ><span class="label <?=$set_level==2?'badge-inverse':''?>">2</span> Design Form</li>
<li style="z-index: 2;" class="<?=$set_level==3?'active':''?>" ><span class="label <?=$set_level==3?'badge-inverse':''?>">3</span> Search View</li>
<li style="z-index: 1;" class="<?=$set_level==4?'active':''?>" ><span class="label <?=$set_level==4?'badge-inverse':''?>">4</span> Final Step</li>
</ol>
<br />
    	        <?php echo validation_errors();?>
				<?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form', 'enctype'=>"multipart/form-data",'data-parsley-validate'=>"true"))?>
                    <div class="form-body">

						<div class="form-group" >
                  			<label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],151);?></label>
                            <div class="col-lg-10">
                               <?=form_input('name', set_value('name', $categories->{'name'}), 'class="form-control " id="" placeholder="Slug"')?>
                            </div>
                        </div>	                    
                   <h5><?=show_static_text($lang_id,268);?></h5>
                   <div style="margin-bottom: 0px;" class="tabbable">
                      <ul class="nav nav-tabs">
                        <?php $i=0;
                      //   debugger($this->page_m->languages_icon);
                      //  foreach($this->page_m->languages as $key_lang=>$val_lang):
                        foreach($this->service_model->languages_icon as $key_lang=>$val_lang):

                          $i++;?>
                        <li class="<?=$i==1?'active':''?>">
                          <a data-toggle="tab" href="#<?=$key_lang?>"><img src="<?php echo base_url('assets/uploads/language').'/'.$val_lang; ?>" height="15" width="20" ></a></li>
                        <?php endforeach;?>
                      </ul>
                      <div style="padding-top: 9px; border-bottom: 1px solid #ddd;" class="tab-content">
                        <?php $i=0;foreach($this->service_model->languages as $key_lang=>$val_lang):$i++;?>
                        <div id="<?=$key_lang?>" class="tab-pane <?=$i==1?'active':''?>">
                            <div class="form-group">
                              <label class="col-lg-2 control-label"><?=show_static_text($lang_id,16);?></label>
                              <div class="col-lg-10">
                                <?=form_input('title_'.$key_lang, set_value('title_'.$key_lang, $categories->{'title_'.$key_lang}), 'class="form-control copy_to_next" id="inputTitle'.$key_lang.'" placeholder="Name"')?>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label"><?=show_static_text($lang_id,2760);?>Note</label>
                              <div class="col-lg-10">
                                <?=form_textarea('body_'.$key_lang, html_entity_decode(set_value('body_'.$key_lang, $categories->{'body_'.$key_lang})), 'placeholder="Body" rows="3" class="cleditor2 form-control"')?>
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
                                <?=form_submit('submit', 'Next', 'class="btn btn-success"')?>
                                    <a href="<?=$_cancel;?>" class="btn btn-default" type="button"><?=show_static_text($adminLangSession['lang_id'],22);?></a>
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

<link href="assets/admin_temp/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />

<link href="assets/admin_temp/plugins/parsley/src/parsley.css" rel="stylesheet" />
<script src="assets/admin_temp/plugins/parsley/dist/parsley.js"></script>
<script>		
$('#form').parsley();
</script>