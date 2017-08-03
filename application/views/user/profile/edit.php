<style>
.form-horizontal .control-label {
    margin-bottom: 0;
    padding-left: 15px;
    text-align: left;
}
</style>
<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                 <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">

            <?php echo validation_errors();?>
            <?=form_open(NULL, array('class' => 'form-horizontal edit-form', 'role'=>'form','enctype'=>"multipart/form-data"))?>
                <div class="form-body">                    
                    <div class="col-md-12">						                        
                    <div class="form-group" >
                        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,16);?></label>
                        <div class="col-lg-10">
                        <?=form_input('first_name', set_value('first_name', $user_details->{'first_name'}), 'class="form-control " id="" placeholder=""')?>
                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,17);?></label>
                        <div class="col-lg-10">
                        <?=form_input('last_name', set_value('last_name', $user_details->{'last_name'}), 'class="form-control " id="" placeholder=""')?>
                        </div>
                    </div>


                     <div class="form-group" >
                        <label class="col-lg-2 control-label"><?=show_static_text($lang_id,18);?></label>
                        <div class="col-lg-10">
                       
                        <?=form_input('email', set_value('email', $user_details->{'email'}), 'class="form-control " id="" placeholder=""')?>
                     
                        </div>
                    </div>

                    <?php
                    $date_array = array(date('Y'),date('m'),date('d'));
                    if($user_details->dob){
                    $date_array = explode('-',$user_details->dob);
                    }
                    ?>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="pull-right">
                         <button type="submit" style="margin-top: 56px;" class="btn btn-primary submitBtn" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> <?=show_static_text($lang_id,235)?>">Update Profile</button>
                        </div>
                    </div>
                </div>
            <?=form_close()?>
            </div>
        </div>
    <!-- end panel -->
    </div>
<!--end col-md-12-->
</div>

<link href="assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript" language="javascript"></script> 

<script>
$('.edit-form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
$(document).ready(function () {
    $(".edit-form").submit(function () {
//        $(".submitBtn").attr("disabled", true);
		$(".submitBtn").button('loading');
        return true;
    });
});

</script>