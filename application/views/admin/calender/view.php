<link href="assets/global/css/star.css" rel="stylesheet" />

<style>
.dl-horizontal dt, .dl-horizontal dd {
  margin-bottom:5px;
}
.dl-horizontal dt {
  width: 80px;
}
.dl-horizontal dd {
  margin-left: 112px;
}
@media (max-width: 979px) {
	.dl-horizontal dd {
	  margin-left: 0px;
	}
}

.view-data .control-label {
  text-align: left;
  margin-left:10px;
}
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
                <h4 class="panel-title"><?=$name?></h4>
            </div>
            <div class="panel-body">
<dl class="dl-horizontal">
<?php
if(!empty($trainer)){
?>
    <dt>User</dt>
    <dd class="show-status"><?=$trainer->first_name.' '.$trainer->last_name?></dd>
<?php
}
?>
<?php
if(!empty($provider)){
?>
    <dt>Provider</dt>
    <dd class="show-status"><?=$provider->first_name.' '.$provider->last_name?></dd>
<?php
}
?>
    <dt>Service</dt>
    <dd class="show-status"><?=$product->title?></dd>

    <dt>Date</dt>
    <dd class="show-status"><?=$date;?></dd>

    <dt>Member</dt>
    <dd class="show-status"><?=$member?></dd>

</dl>

            </div>
        </div>
        <!-- end panel -->
    </div>

	<!--col-md-12-->
    <!--end col-md-12-->
</div>

