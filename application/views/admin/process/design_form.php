<?php 
$GLOBALS['option_value_count']	= 0;
?>
<script>
function remove_option(id){
	if(confirm('Are you sure you want to remove this option?')){
		$('#option-'+id).remove();
	}
}

</script>

<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
				
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
<ol class="bwizard-steps clearfix clickable" >
	<li style="z-index: 5;" class="<?=$set_level==1?'active':''?>" ><span class="label <?=$set_level==1?'badge-inverse':''?>">1</span> Name Your Process</li>
    <li style="z-index: 4;" class="<?=$set_level==2?'active':''?>" ><span class="label <?=$set_level==2?'badge-inverse':''?>">2</span> Design Form</li>
    <li style="z-index: 3;" class="<?=$set_level==3?'active':''?>" ><span class="label <?=$set_level==3?'badge-inverse':''?>">3</span> Define Workflow</li>
    <li style="z-index: 2;" class="<?=$set_level==4?'active':''?>" ><span class="label <?=$set_level==4?'badge-inverse':''?>">4</span> Configure Permission</li>
    <li style="z-index: 1;" class="<?=$set_level==5?'active':''?>" ><span class="label <?=$set_level==5?'badge-inverse':''?>">5</span> Final Step</li>
</ol>
				<br>
    	        <?php echo validation_errors();?>
<form action="" method="post" class="form-horizontal">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
	<input type="hidden" name="operation" value="set">
    <div id="product_options">
                <div class="pull-right" style="padding:0px 0px 10px 0px;">
                	<div style="float:left;margin-right:10px">
	                    <select id="option_options" class="form-control" style="margin:0px;">
                        <option value="">Select</option>
                        <option value="textfield">textfield</option>
                        <option value="textarea">text</option>
                        <option value="yes_no">Yes/No</option>
                        <option value="attachment">Attachment</option>
                        <option value="date">Date</option>
                        <option value="date_time">Date & Time</option>
                        <option value="droplist">Droplist</option>
                        <option value="mdroplist">Multi Droplist</option>
                    </select>
                    </div>
                    <input id="add_option" class="btn" type="button" value="<?=show_static_text($adminLangSession['lang_id'],1360);?>Add" style="margin:0px;float:left"/>
                    <div style="clear:both"></div>
                </div>
                    <div style="clear:both"></div>
        
        <script type="text/javascript">
        
        $( "#add_option" ).click(function(){
            if($('#option_options').val() != '')
            {
                add_option($('#option_options').val());
                $('#option_options').val('');
            }
        });
        
        function add_option(type)
        {
            //increase option_count by 1
            option_count++;
            
            <?php
            //$value			= array(array('name'=>'', 'value'=>'', 'weight'=>'', 'price'=>'', 'limit'=>''));
            $js_textfield	= (object)array('name'=>'', 'type'=>'textfield', 'required'=>false, 'values'=>'','id'=>NULL);
            $js_textarea	= (object)array('name'=>'', 'type'=>'textarea', 'required'=>false, 'values'=>'','id'=>NULL);
            $js_radiolist	= (object)array('name'=>'', 'type'=>'radiolist', 'required'=>false, 'values'=>'','id'=>NULL);
            $js_checklist	= (object)array('name'=>'', 'type'=>'checklist', 'required'=>false, 'values'=>'','id'=>NULL);
            $js_droplist	= (object)array('name'=>'', 'type'=>'droplist', 'required'=>false, 'values'=>'','id'=>NULL);
            $js_mdroplist	= (object)array('name'=>'', 'type'=>'mdroplist', 'required'=>false, 'values'=>'','id'=>NULL);
            $js_date	= (object)array('name'=>'', 'type'=>'date', 'required'=>false, 'values'=>'','id'=>'');

            $js_yes_no	= (object)array('name'=>'', 'type'=>'yes_no', 'required'=>false, 'values'=>'','id'=>NULL);
            $js_date_time	= (object)array('name'=>'', 'type'=>'date_time', 'required'=>false, 'values'=>'','id'=>'');
            $js_attachment	= (object)array('name'=>'', 'type'=>'attachment', 'required'=>false, 'values'=>'','id'=>'');
            ?>
            if(type == 'textfield')
            {
                $('#options_container').append('<?php add_option($js_textfield, "'+option_count+'",true);?>');
            }
            else if(type == 'textarea')
            {
                $('#options_container').append('<?php add_option($js_textarea, "'+option_count+'",true);?>');
            }
            else if(type == 'radiolist')
            {
                $('#options_container').append('<?php add_option($js_radiolist, "'+option_count+'",true);?>');
            }
            else if(type == 'checklist')
            {
                $('#options_container').append('<?php add_option($js_checklist, "'+option_count+'",true);?>');
            }
            else if(type == 'droplist')
            {
                $('#options_container').append('<?php add_option($js_droplist, "'+option_count+'",true);?>');
            }
            else if(type == 'mdroplist')
            {
                $('#options_container').append('<?php add_option($js_mdroplist, "'+option_count+'",true);?>');
            }
            else if(type == 'date')
            {
                $('#options_container').append('<?php add_option($js_date, "'+option_count+'",true);?>');
            }
            else if(type == 'date_time')
            {
                $('#options_container').append('<?php add_option($js_date_time, "'+option_count+'",true);?>');
            }
            else if(type == 'yes_no')
            {
                $('#options_container').append('<?php add_option($js_yes_no, "'+option_count+'",true);?>');
            }
            else if(type == 'attachment')
            {
                $('#options_container').append('<?php add_option($js_attachment, "'+option_count+'",true);?>');
            }
        }

        
        function add_option_value(option)
        {
            //alert('asd');
            option_value_count++;
            <?php
            $js_po	= (object)array('type'=>'droplist');
            //$value	= (object)array('name'=>'', 'value'=>'', 'weight'=>'', 'price'=>'');
            $value	= '';
            ?>
            $('#option-items-'+option).append('<?php add_option_value($js_po, "'+option+'", "'+option_value_count+'", $value);?>');
        }
        
        $(document).ready(function(){
            $('body').on('click', '.option_title', function(){
                $($(this).attr('href')).slideToggle();
                return false;
            });
            
            $('body').on('click', '.delete-option-value', function(){
                if(confirm('Are you sure you want to remove this value?'))
                {
                    $(this).closest('.option-values-form').remove();
                }
            });
            
            
            
            $('#options_container').sortable({
                axis: "y",
                items:'tr',
                handle:'.handle',
                forceHelperSize: true,
                forcePlaceholderSize: true
            });
            
            $('.option-items').sortable({
                axis: "y",
                handle:'.handle',
                forceHelperSize: true,
                forcePlaceholderSize: true
            });
        });
        </script>
        <style type="text/css">
            .option-form {
                display:none;
                margin-top:10px;
            }
            .option-values-form
            {
                background-color:#fff;
                padding:6px 3px 6px 6px;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
                margin-bottom:5px;
                border:1px solid #ddd;
            }
            
            .option-values-form input {
                margin:0px;
            }
            .option-values-form a {
                margin-top:3px;
            }
        </style>
        <div class="row">
            <div class="span8">
                <table class="table table-striped"  id="options_container">
                    <?php
                    $counter	= 0;
                    if(!empty($product_options))
                    
                    {
                        foreach($product_options as $po)
                        {
                            $po	= (object)$po;
                            if(empty($po->required)){$po->required = false;}

                            add_option($po, $counter,false);
                            $counter++;
                        }
                    }?>
                        
                </table>
            </div>
        </div>
    </div>

	<div class="form-actions">
<?php
if($set_level!=1){
?>
		<button type="button" onclick="window.location='<?=$_cancel.'/edit/'.$id?>'" class="btn btn-success"><?=show_static_text($adminLangSession['lang_id'],360);?>Back</button>
<?php
}
?>        
		<button type="submit" class="btn btn-success pull-right"><?=show_static_text($adminLangSession['lang_id'],1110);?>Next</button>
	</div>
</form>

            </div>
        </div>
        <!-- end panel -->
    </div>
</div>



<?php
function add_option($po, $count,$show=false)
{
	ob_start();
	?>
	<tr id="option-<?php echo $count;?>">
		<td>
			<a class="handle btn btn-mini"><i class="fa fa-align-justify"></i></a>
			<strong><a class="option_title" href="#option-form-<?php echo $count;?>"><?=($po->type=='mdroplist')?'multi droplist':str_replace('_',' ',$po->type);?> <?php echo (!empty($po->name))?' : '.$po->name:'';?></a></strong>
			<button type="button" class="btn btn-mini btn-danger pull-right" onclick="remove_option(<?php echo $count ?>);"><i class="fa fa-trash"></i></button>
			<input type="hidden" name="option[<?php echo $count;?>][id]" value="<?php echo $po->id;?>" />
			<input type="hidden" name="option[<?php echo $count;?>][type]" value="<?php echo $po->type;?>" />
			<div class="option-form" id="option-form-<?php echo $count;?>" style="display: <?=$show?'block':'none'?>  ">
				<div class="row">
				
					<div class="col-md-10">
						<input type="text" class="span10 form-control" placeholder="<?php echo 'Field Name';?>" name="option[<?php echo $count;?>][name]" value="<?php echo $po->name;?>" required/>
					</div>
					
					<!--<div class="span2" style="text-align:right;">
						<input class="checkbox" type="checkbox" name="option[<?php echo $count;?>][required]" value="1" <?php echo ($po->required)?'checked="checked"':'';?>/> <?php echo 'required';?>
					</div>-->
				</div>
			<?php if($po->type=='droplist'||$po->type=='mdroplist'){?>
				<div class="row">
					<div class="col-md-12">
						<a class="btn btn-primary" onclick="add_option_value(<?php echo $count;?>);">Add Option</a>
					</div>
				</div>
			<div style="margin-top:10px;">

					<div class="row">
						<div class="col-md-2"><strong>Name</strong></div>
					</div>
					<div class="option-items" id="option-items-<?php echo $count;?>">
					<?php if($po->values){
							$po->values=explode(',',$po->values);
						?>
						<?php
						foreach($po->values as $value)
						{
							//$value = (object)$value;
							add_option_value($po, $count, $GLOBALS['option_value_count'], $value);
							$GLOBALS['option_value_count']++;
						}?>
					<?php }?>
					</div>
				</div>				
                
				<?php }?>
			</div>
		</td>
	</tr>
	
	<?php
	$stuff = ob_get_contents();

	ob_end_clean();
	
	echo replace_newline($stuff);
}

function add_option_value($po, $count, $valcount, $value)
{
ob_start();
?>
	<div class="option-values-form">
		<div class="row">
			<div class="col-md-10"><input type="text" class=" form-control" name="option[<?php echo $count;?>][values][]" value="<?php echo $value; ?>" /></div>
			<div class="col-md-2">
			<?php if($po->type=='droplist'||$po->type=='mdroplist'){?>
				<a class="delete-option-value btn btn-danger btn-mini pull-right"><i class="fa fa-trash"></i></a>
			<?php }?>
			</div>
		</div>
	</div>
	<?php
	$stuff = ob_get_contents();

	ob_end_clean();

	echo replace_newline($stuff);
}
//this makes it easy to use the same code for initial generation of the form as well as javascript additions
function replace_newline($string) {
  return trim((string)str_replace(array("\r", "\r\n", "\n", "\t"), ' ', $string));
}
?>
<script type="text/javascript">
//<![CDATA[
var option_count		= <?php echo $counter?>;
var option_value_count	= <?php echo $GLOBALS['option_value_count'];?>


//]]>
</script>

<link href="assets/admin_temp/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
