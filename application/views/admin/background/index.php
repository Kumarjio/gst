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
                <input type="hidden" value="set" id="inputGps" name="operation">
                <div class="form-body">
					
                    
					<div class="form-group">
                      <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2053);?>Hot Deals</label>
                      <div class="col-lg-3">
				      	<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                               <img src="<?php echo !isset($settings['background_b1']) ? 'assets/uploads/no-image.gif' :base_url('assets/images').'/'.$settings['background_b1']; ?>" id="background-b1-img"/>
                            </div>
							<div>
						    <!--<span class="btn btn-default btn-file"><span class="fileinput-new"><?=show_static_text($adminLangSession['lang_id'],159);?></span><span class="fileinput-exists"><?=show_static_text($adminLangSession['lang_id'],160);?></span>
							<input type="file" name="background_b1" id="logo"></span>-->
							<input type="button" name="background_b1" id="logo" value="Select image" data-toggle="modal" data-target="#myModal"></span>
						    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?=show_static_text($adminLangSession['lang_id'],109);?></a>
<?php
if(!empty($settings['background_b1'])){
	echo '<a class="btn " href="'.$_cancel.'/remove_image?id=background_b1" onclick="" >'.show_static_text($adminLangSession['lang_id'],109).'</a>';
}
?>
                            
                     	</div>
                   		</div>
                        <br>Width:1900px, min-height: 423px
                            
                      </div>                      
                      
                    </div>
                    
                    
                    <div class="form-group">
                      <label class="col-lg-2 control-label" style="padding-top:0">Or Media</label>
                      <div class="col-lg-3">
				      		<a href="javascript:;" onclick="open_modals('background-b1');">Select Image</a>
                            <span class="selected-background-b1"></span>
                            
                      </div>                      
                      
                    </div>
                    
                    
                    <div class="form-group">
                      <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2053);?>Or Color</label>
                      <div class="col-lg-3">
					   <?=form_input('background_b1_c', set_value('background_b1_c', isset($settings['background_b1_c'])?$settings['background_b1_c']:''), 'class="form-control jscolor"  placeholder="" required')?>

                            
                      </div>                      
                      
                    </div>
                    
                    
                    <div class="form-group">
                      <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2053);?>Our Client</label>
                      <div class="col-lg-3">
				      	<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                <img src="<?php echo !isset($settings['background_client']) ? 'assets/uploads/no-image.gif' :base_url('assets/images').'/'.$settings['background_client']; ?>" id="background-client-img"/>
                            </div>
							<div>
						    <span class="btn btn-default btn-file"><span class="fileinput-new"><?=show_static_text($adminLangSession['lang_id'],159);?></span><span class="fileinput-exists"><?=show_static_text($adminLangSession['lang_id'],160);?></span>
    	    	            <input type="file" name="logo" id="logo"></span>
						    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?=show_static_text($adminLangSession['lang_id'],109);?></a>
<?php
if(!empty($settings['background_client'])){
	echo '<a class="btn " href="'.$_cancel.'/remove_image?id=background_client" onclick="" >'.show_static_text($adminLangSession['lang_id'],109).'</a>';
}
?>
                            
                     	</div>
                   		</div>
                        <br>Width:1900px, min-height: 423px
                            
                      </div>                      
                      
                    </div>



					<div class="form-group">
                      <label class="col-lg-2 control-label" style="padding-top:0">Or Media</label>
                      <div class="col-lg-3">
				      		<a href="javascript:;" onclick="open_modals('background-client');">Select Image</a>
                            <span class="selected-background-client"></span>
                            
                      </div>                      
                      
                    </div>

					<div class="form-group">
                      <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2053);?>FLight Search</label>
                      <div class="col-lg-3">
				      	<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                               <img src="<?php echo !isset($settings['background_flight_search']) ? 'assets/uploads/no-image.gif' :base_url('assets/images').'/'.$settings['background_flight_search']; ?>" id="background-flight-img" >
                            </div>
							<div>
						    <span class="btn btn-default btn-file"><span class="fileinput-new"><?=show_static_text($adminLangSession['lang_id'],159);?></span><span class="fileinput-exists"><?=show_static_text($adminLangSession['lang_id'],160);?></span>
    	    	            <input type="file" name="background_flight_search" id="logo"></span>
						    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?=show_static_text($adminLangSession['lang_id'],109);?></a>
<?php
if(!empty($settings['background_flight_search'])){
	echo '<a class="btn " href="'.$_cancel.'/remove_image?id=background_flight_search" onclick="" >'.show_static_text($adminLangSession['lang_id'],109).'</a>';
}
?>
                            
                     	</div>
                   		</div>
                        <br>Width:1900px, min-height: 423px
                            
                      </div>                      
                      
                    </div> 
                    
                    <div class="form-group">
                      <label class="col-lg-2 control-label" style="padding-top:0">Or Media</label>
                      <div class="col-lg-3">
				      		<a href="javascript:;" onclick="open_modals('background-flight');">Select Image</a>
                            <span class="selected-background-flight"></span>
                            
                      </div>                      
                      
                    </div>                   

					<div class="form-group">
                      <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2053);?>Hotel Search</label>
                      <div class="col-lg-3">
				      	<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                <?php echo !isset($settings['background_hotel_search']) ? '<img src="assets/uploads/no-image.gif" id="background-hotel-img">' :'<img src="'.base_url('assets/uploads/sites').'/'.$settings['background_hotel_search'].'" id="background-hotel-img" >'; ?>
                            </div>
							<div>
						    <span class="btn btn-default btn-file"><span class="fileinput-new"><?=show_static_text($adminLangSession['lang_id'],159);?></span><span class="fileinput-exists"><?=show_static_text($adminLangSession['lang_id'],160);?></span>
    	    	            <input type="file" name="background_hotel_search" id="logo"></span>
						    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?=show_static_text($adminLangSession['lang_id'],109);?></a>
<?php
if(!empty($settings['background_hotel_search'])){
	echo '<a class="btn " href="'.$_cancel.'/remove_image?id=background_hotel_search" onclick="" >'.show_static_text($adminLangSession['lang_id'],109).'</a>';
}
?>
                            
                     	</div>
                   		</div>
                        <br>Width:1900px, min-height: 423px
                            
                      </div>                      
                      
                    </div> 
                    
                    <div class="form-group">
                      <label class="col-lg-2 control-label" style="padding-top:0">Or Media</label>
                      <div class="col-lg-3">
				      		<a href="javascript:;" onclick="open_modals('background-hotel');">Select Image</a>
                            <span class="selected-background-hotel"></span>
                            
                      </div>                      
                      
                    </div>                   

					<div class="form-group">
                      <label class="col-lg-2 control-label"><?=show_static_text($adminLangSession['lang_id'],2053);?>Service Search</label>
                      <div class="col-lg-3">
				      	<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                <?php echo !isset($settings['background_service_search']) ? '<img src="assets/uploads/no-image.gif">' :'<img src="'.base_url('assets/uploads/sites').'/'.$settings['background_service_search'].'"  id="background-service-img">'; ?>
                            </div>
							<div>
						    <span class="btn btn-default btn-file"><span class="fileinput-new"><?=show_static_text($adminLangSession['lang_id'],159);?></span><span class="fileinput-exists"><?=show_static_text($adminLangSession['lang_id'],160);?></span>
    	    	            <input type="file" name="background_service_search" id="logo"></span>
						    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?=show_static_text($adminLangSession['lang_id'],109);?></a>
<?php
if(!empty($settings['background_service_search'])){
	echo '<a class="btn " href="'.$_cancel.'/remove_image?id=background_service_search" onclick="" >'.show_static_text($adminLangSession['lang_id'],109).'</a>';
}
?>
                            
                     	</div>
                   		</div>
                        <br>Width:1900px, min-height: 423px
                            
                      </div>                      
                      
                    </div>
                    
                    <div class="form-group">
                      <label class="col-lg-2 control-label" style="padding-top:0">Or Media</label>
                      <div class="col-lg-3">
				      		<a href="javascript:;" onclick="open_modals('background-service');">Select Image</a>
                            <span class="selected-background-service"></span>
                            
                      </div>                      
                      
                    </div>                    

                    

                    
                    
                </div>
                    
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

<link href="assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript" language="javascript"></script> 


<script src="assets/global/plugins/color-picker/jscolor.js"></script>

<script>
function setTextColor(picker) {
	document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
}
</script>

<script>
var open_model =true;
var selectd_sec ='';
function open_modals(id){
	selectd_sec = id;
	$('#media-modal').modal({
        show: 'true',
    }); 
	
	if(open_model){
		$('#modal-loader').show();      // load ajax loader
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$.ajax({
		   type: "POST",
		   url: "<?=$admin_link?>/media/ajax_modal", /* The country id will be sent to this file */
		   data: {type:'image',<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
			dataType: 'json',
			success:function(data){
				open_model =false;
				$('#modal-loader').hide();      // load ajax loader
			   if(data.status='ok'){
					$('#dynamic-content').html(data.content); // leave it blank before ajax call
			   }
		   }
		 });
	}
} 


function select_image(id){
	filename='';
	if(selectd_sec=='background-b1'){
		filename ='m_background_b1';
	}
	else if(selectd_sec=='background-client'){
		filename ='m_background_client';
	}
	else if(selectd_sec=='background-flight'){
		filename ='m_background_flight';
	}
	else if(selectd_sec=='background-hotel'){
		filename ='m_background_hotel';
	}
	else if(selectd_sec=='background-service'){
		filename ='m_background_service';
	}
	
	$('.selected-'+selectd_sec).html('<input type="hidden" name="'+filename+'" value="'+id+'">'+id+' <a href="javascript:;" onclick="empty_image('+selectd_sec+');">remove</a>');
	$('#'+selectd_sec+'-img').attr('src','assets/images/'+id);
	$('#media-modal').modal('hide'); 
}

function empty_image(id){
	$('.selected-'+id).html('');
}
</script>