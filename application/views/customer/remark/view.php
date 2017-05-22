<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div data-sortable-id="form-stuff-1" class="panel panel-inverse" style="margin-bottom:10px">
            <div class="panel-body">

<div class="form-horizontal">
	<div class="form-body">
        <div class="form-group">
            <label class="col-lg-2 col-md-2 control-label">Name</label>
            <div class="col-lg-8 col-md-8"><?=$tickets->name;?></div>
        </div>
<?php
if(!empty($tickets->files)){
?>        <div class="form-group">
            <label class="col-lg-2 col-md-2 control-label">Attachment</label>

            <div class="col-lg-8 col-md-8"><a href="<?=$_cancel?>/download/<?=$tickets->files;?>">Download</a></div>
        </div>
<?php
}
?>
        <div class="form-group">
            <label class="col-lg-2 col-md-2 control-label">Date</label>
            <div class="col-lg-8 col-md-8"><?=$tickets->dates;?></div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 col-md-2 control-label">Description</label>
            <div class="col-lg-8 col-md-8"><?=$tickets->desc;?></div>
        </div>
	</div>							




</div>



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

