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
	<div class="col-md-12">						                        
  
<div class="form-group" >
        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,2000);?>Button</label>
        <div class="col-lg-10">
<?php
$html_code = '<button onClick="window.location=&lsquo;'.site_url($lang_code.'/'.$user_details->user_url).'&lsquo;" style="background: #348fe2 none repeat scroll 0 0;border-color: #348fe2;color: #fff;" title="Checkout" value="Checkout" name="update_cart_action" type="button">Book Now</button>';
?>
	        <textarea  name="desc" class="form-control "><?=$html_code?></textarea>
        </div>
    </div>


    
    
</div>






</div>
	                 
                 <?=form_close()?>
            </div>
        </div>
        <!-- end panel -->
    </div>

	<!--col-md-12-->
    <!--end col-md-12-->
</div>



