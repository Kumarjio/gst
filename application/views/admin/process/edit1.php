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




<ul class="step clearfix" id="order_step">
<li class="first <?=$set_level==1?'step_current':($set_level>1?' step_done':'')?> "><span><em>01.</em> Step 1</span></li>

<li class="second <?=$set_level==2?'step_current':($set_level>2?'step_done':'step_todo')?> "><span><em>02.</em> Step 2</span></li>
<li class="third <?=$set_level==3?'step_current':($set_level>3?'step_done':'step_todo')?>"><span><em>03.</em> Step 3</span></li>

<li class="four  <?=$set_level==4?'step_current':($set_level>4?'step_done':'step_todo')?>"> <span><em>03.</em> Step 4</span></li>

<li id="step_end" class="last <?=$set_level==5?'step_current':($set_level>5?' step_done':'step_todo')?>"> <span><em>04.</em> Step 5</span></li>
</ul>
					
				<br>
    	        <?php echo validation_errors();?>
<form action="" method="post" class="form-horizontal">
	<input type="hidden" name="operation" value="set">
    <div id="product_options">
                <div class="pull-right" style="padding:0px 0px 10px 0px;">
                	<div style="float:left;margin-right:10px">
	                    <select id="option_options" class="form-control" style="margin:0px;">
                        <option value="">Select</option>
                        <option value="textfield">textfield</option>
                        <option value="textarea">text</option>
                        <option value="date">Date</option>
                    </select>
                    </div>
                    <input id="add_option" class="btn" type="button" value="add" style="margin:0px;float:left"/>
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
            $js_date	= (object)array('name'=>'', 'type'=>'date', 'required'=>false, 'values'=>'','id'=>'');
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
            else if(type == 'date')
            {
                $('#options_container').append('<?php add_option($js_date, "'+option_count+'",true);?>');
            }
        }
        
        function add_option_value(option)
        {
            
            option_value_count++;
            <?php
            $js_po	= (object)array('type'=>'radiolist');
            $value	= (object)array('name'=>'', 'value'=>'', 'weight'=>'', 'price'=>'');
            ?>
            $('#option-items-'+option).append('<?php add_option_value($js_po, "'+option+'", "'+option_value_count+'", $value);?>');
        }
        
        $(document).ready(function(){
            $('body').on('click', '.option_title', function(){
                $($(this).attr('href')).slideToggle();
                return false;
            });
            
            $('body').on('click', '.delete-option-value', function(){
                if(confirm('<?php echo 'confirm_remove_value';?>'))
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
		<button type="button" onclick="window.location='admin/attribute/step<?=$set_level-1?>/<?=$id?>'" class="btn btn-info">Back</button>
<?php
}
?>        
		<button type="submit" class="btn btn-primary pull-right"><?php echo 'Next';?></button>
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
			<strong><a class="option_title" href="#option-form-<?php echo $count;?>"><?php echo $po->type;?> <?php echo (!empty($po->name))?' : '.$po->name:'';?></a></strong>
			<button type="button" class="btn btn-mini btn-danger pull-right" onclick="remove_option(<?php echo $count ?>);"><i class="fa fa-trash"></i></button>
			<input type="hidden" name="option[<?php echo $count;?>][id]" value="<?php echo $po->id;?>" />
			<input type="hidden" name="option[<?php echo $count;?>][type]" value="<?php echo $po->type;?>" />
			<div class="option-form" id="option-form-<?php echo $count;?>" style="display: <?=$show?'block':'none'?>  ">
				<div class="row-fluid">
				
					<div class="span10">
						<input type="text" class="span10 form-control" placeholder="<?php echo 'Field Name';?>" name="option[<?php echo $count;?>][name]" value="<?php echo $po->name;?>" required/>
					</div>
					
					<!--<div class="span2" style="text-align:right;">
						<input class="checkbox" type="checkbox" name="option[<?php echo $count;?>][required]" value="1" <?php echo ($po->required)?'checked="checked"':'';?>/> <?php echo 'required';?>
					</div>-->
				</div>				
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
		<div class="row-fluid">
			<?php if($po->type!='textarea' && $po->type!='textfield'):?><div class="span1"><a class="handle btn btn-mini" style="float:left;"><i class="icon-align-justify"></i></a></div><?php endif;?>
			<div class="span3"><input type="text" class="span12" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][name]" value="<?php echo $value->name ?>" /></div>
			<div class="span2"><input type="text" class="span12" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][value]" value="<?php echo $value->value ?>" /></div>
			<div class="span2"><input type="text" class="span12" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][weight]" value="<?php echo $value->weight ?>" /></div>
			<div class="span2"><input type="text" class="span12" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][price]" value="<?php echo $value->price ?>" /></div>
			<div class="span2">
			<?php if($po->type=='textfield'):?><input class="span12" type="text" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][limit]" value="<?php echo $value->limit ?>" />
			<?php elseif($po->type!='textarea' && $po->type!='textfield'):?>
				<a class="delete-option-value btn btn-danger btn-mini pull-right"><i class="icon-trash icon-white"></i></a>
			<?php endif;?>
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

<link href="assets/global/css/custom.css" rel="stylesheet" />

