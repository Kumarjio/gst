<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <h4 class="panel-title"><?=$name?></h4>
            </div>

<div class="panel-body">
<?php //echo validation_errors();?>
<?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form','enctype'=>"multipart/form-data"))?>
<div class="form-body">                    
	<div class="col-md-12">						                        
	
    <div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,1006);?>Domain</label>
        <div class="col-lg-6">
			<?=form_input('domain', set_value('domain', $users->{'domain'}), 'class="form-control " id="address-input" placeholder=""')?>
    	    <span class="error-span"><?php echo form_error('domain'); ?></span>
        </div>
    </div>
<div class="form-group">
      <label class="col-lg-2 control-label"><?=show_static_text($lang_id,12120);?>Email</label>
      <div class="col-lg-10" style="">
        <div id="product-options" style="">
        <div class="input_fields_wrap" >
			<div style="margin-bottom:10px;"><input type="email" name="email[0]" class="form-control" style="width:58.6%" ></div>
                <button class="add_field_button2 btn btn-primary" type="button" style="margin-bottom:10px">Add</button>

            </div>
        </div><!--//product-options//-->
      </div>
    </div>

<div class="form-group">
      <label class="col-lg-2 control-label"><?=show_static_text($lang_id,12120);?>Description</label>
      <div class="col-lg-6">
			<textarea  name="desc" class="form-control " ></textarea>
        </div>
    </div>    
</div>






</div>
     <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-2 col-md-9">
                    <?=form_submit('submit', show_static_text($lang_id,235), 'class="btn btn-primary"')?>
                    <a href="<?=$_cancel;?>" class="btn btn-default" type="button"><?=show_static_text($lang_id,22);?></a>
                </div>
            </div>
        </div>
 <?=form_close()?>



      </div>

		</div>
	</div><!--// col-md-6 //-->
    <!--// col-md-6 //-->
</div>




<link href="assets/plugins/select2/select2.css" rel="stylesheet"/>
<script type="text/javascript" src="assets/plugins/select2/select2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#select_size').select2({placeholder: "Select"});
});
</script>



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


<script>
var j =parseInt('2');
$(document).ready(function() {
    var max_fields      = 40; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button2"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
	    e.preventDefault();
		//alert('asd');
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
			
$(wrapper).append('<div style="margin-bottom:10px;"><input type="email" name="email['+j+']" class="form-control" style="width:58.6%;float:left;margin-right:10px" placeholder="Email" required/><a href="javascript:void(0)" class="remove_field btn default"><i class="fa fa-times"></i></a></div>'); 
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
		get_qty();
    })
});

</script>