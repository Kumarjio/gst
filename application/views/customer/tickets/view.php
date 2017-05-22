<style>
/*label.radio-inline.checked, label.checkbox-inline.checked, label.radio.checked, label.checkbox.checked {
  background-color: #266c8e;
  color: #fff !important;
}*/
</style>


<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse">
            <div class="panel-heading">                
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
<!--                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>-->
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">

<div class="form-horizontal">
	<div class="form-body">
        <div class="form-group">
            <label class="col-lg-2 col-md-2 control-label">Name</label>
            <div class="col-lg-8 col-md-8"><?=$view_data->name;?></div>
        </div>
<?php
if(!empty($view_data->files)){
?>        <div class="form-group">
            <label class="col-lg-2 col-md-2 control-label">Attachment</label>
            <div class="col-lg-8 col-md-8"><a href="assets/uploads/tickets/<?=$view_data->files;?>" target="_blank">Click Here</a></div>
        </div>
<?php
}
?>

        <div class="form-group">
            <label class="col-lg-2 col-md-2 control-label">Description</label>
            <div class="col-lg-8 col-md-8"><?=$view_data->desc;?></div>
        </div>
	</div>							

<h4 class="m-t-20" style="border-bottom:solid 1px #CCC;padding-bottom:10px">Answer</h4>

<div class="height-sm" data-scrollbar="true">
	<ul class="media-list media-list-with-divider media-messaging">
<?php
if(isset($answer_data)&&!empty($answer_data)){
	foreach($answer_data as $set_answer){
		if($set_answer->user_id!=0){
			$userName = 'No name';
			$image = 'assets/uploads/profile.jpg';
			$userAnswer = $this->comman_model->get_by('users',array('id'=>$set_answer->user_id),false,false,true);
			if($userAnswer){
				$userName = $userAnswer->first_name.' '.$userAnswer->last_name;
				if(!empty($userAnswer->image)){
					$image = 'assets/uploads/users/small/'.$userAnswer->image;
				}
				else{
					$image = 'assets/uploads/profile.jpg';
				}
			}

		}
		else{
			$userName = 'Admin';
			$image = 'assets/uploads/profile.jpg';
		}
?>
<li class="media media-sm">
    <a href="javascript:void(0);" class="pull-left">
        <img src="<?=$image?>" alt="" class="media-object rounded-corner" />
    </a>
    <div class="media-body">
        <h5 class="media-heading"><?=$userName?></h5>
        <p><?=$set_answer->desc;?></p>
    </div>
</li>
<?php		
	}
}
?>
    
</ul>
</div>
</div>
<h4 class="m-t-20" style="border-bottom:solid 1px #CCC;padding-bottom:10px">Get Answer</h4>

<?=form_open(NULL, array('class' => 'form-horizontal', 'role'=>'form', 'enctype'=>"multipart/form-data",'data-parsley-validate'=>"true"))?>                              
	<input type="hidden" name="operation" value="set"  />
	<div class="form-body">                                                	
		<div class="form-group" >
			<div class="col-lg-12">
			   <?=form_textarea('desc', set_value('desc'), 'placeholder="Answer" rows="3" class="form-control textarea" required')?>
			</div>
		</div>                    
	</div>
	<div class="form-actions">
		<div class="row">
			<div class="col-md-9">
				<?=form_submit('submit', 'Send', 'class="btn btn-success"')?>
				<a href="<?=$_cancel?>" class="btn btn-default" type="button"><?='Cancel'?></a>
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




<style>
.form-horizontal .control-label{
	padding-top:0px;
	text-align:left;
	min-width:50px !important;
}
textarea.form-control {
  height:65px;
}

.media.media-sm .media-object {
  width: 64px;
  height: 64px;
}
</style>

