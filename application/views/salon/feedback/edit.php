<div class="row">
	<div class="col-md-12">
			        <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
       
        <div class="panel-body">
            <?php echo validation_errors();?>
			<?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form','enctype'=>"multipart/form-data",'data-parsley-validate'=>"true"))?>                              
              	<input type="hidden" name="operation" value="set" />
                        
                <!--<div class="form-group" >
                  <label class="col-md-2 control-label"><?=lang('')?>Company Name</label>
                  <div class="col-md-8">
                    <?=form_input('company_name', set_value('company_name', $products->{'company_name'}), 'class="form-control " id="" placeholder="Company Name" required')?>
                  </div>
                </div>-->
                
                <div class="form-group" >
                  <label class="col-md-2 control-label"><?=lang('')?>Title</label>
                  <div class="col-md-8">
                    <?=form_input('title', set_value('title', $products->{'title'}), 'class="form-control " id="" placeholder="title" required')?>
                  </div>
                </div>
                
                <div class="form-group" >
                  <label class="col-md-2 control-label">Rating</label>
                            <div class="col-md-8">                            
                                <label class="radio-inline" >
                                    <input type="radio" name="rate" value="1"  <?=set_radio('rate','1', $products->rate=='1')?>  />1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="rate" value="2" <?=set_radio('rate','2', $products->rate=='2')?> />2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="rate" value="3" <?=set_radio('rate','3', $products->rate=='3')?> />3
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="rate" value="4" <?=set_radio('rate','4', $products->rate=='4')?>/>4
                                </label>
                                <label class="radio-inline"> 
                                    <input type="radio" name="rate" value="5" <?=set_radio('rate','5', $products->rate=='5')?> required />5
                                </label>
                            </div>
                </div>
                <div class="form-group" >
                  <label class="col-md-2 control-label"><?=lang('')?>Message</label>
                  <div class="col-md-8">
					<?=form_textarea('description', set_value('description', $products->{'description'}), 'placeholder="description" rows="3" class="cleditor2 form-control"')?>
                  </div>
                </div>

				<div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-9">
                      <input type="hidden" name="id" value="<?='as'?>" />
                        <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </div>
                </div>
			<?=form_close()?>


            </div>
        </div>
        <!-- end panel -->
    </div>
</div>                




<link href="assets/admin_temp/plugins/parsley/src/parsley.css" rel="stylesheet" />
<script src="assets/admin_temp/plugins/parsley/dist/parsley.js"></script>
<script>		
$('#form').parsley();
$(document).ready(function(){
	$('#parsley-id-multiple-rate').remove();
	//$('div.dataTables_filter').appendTo('<button id="refresh">Refresh</button>');
});

$(document).ready(function(){
	var breadcrumb_html = '<li><a href="<?=$lang_code?>/user">Home</a></li><li class="active"><?=$name;?></li>';
	$('#top-breadcrumb').html(breadcrumb_html);
	//$('div.dataTables_filter').appendTo('<button id="refresh">Refresh</button>');
});

</script>