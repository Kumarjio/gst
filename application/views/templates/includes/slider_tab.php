<?php
$home_slider_s = $this->comman_model->get_lang('services',$lang_id,NULL,array('enabled'=>1),'service_id',false);
$time_data = $this->custom_model->get_time_hour_min();

?>
<div class="tab-content" >
 <div role="tabpanel" class="tab-pane active" id="flights">
	<form action="<?='flights'?>" method="get" id="advance-search-form">
<input type="hidden" name="fId" id="i-fid" value="" >
<input type="hidden" name="tId" id="i-tid" value="" >
    <div class="row f-row">
        <div class="col-xxs-12 col-md-2 mt text-field-box">
            <div class="input-field">
                <label for="from"><?=show_static_text($lang_id,94);?>:</label>
				 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control f-place" name="from_place" id="from-place" placeholder="<?=show_static_text($lang_id,44);?>" autocomplete="off" required/>
            </div>
        </div>
        <div class="col-xxs-12 col-md-2 text-field-box mt">
            <div class="input-field">
                <label for="from"><?=show_static_text($lang_id,95);?>:</label>
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control t-place" name="to_place" id="to-place" placeholder="<?=show_static_text($lang_id,44);?>" autocomplete="off" required/>
            </div>
        </div>
        
         <div class="col-xxs-12 col-md-2 date-field-box mt alternate">
            <div class="input-field">
                <label for="i-h-s-date2"><?=show_static_text($lang_id,108);?>:</label>
				 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
            <input class="form-control" type="text" id="i-h-s-date2" name="d_date" value="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
            </div>
        </div>
        <div class="col-xxs-12 col-md-2 date-field-box mt alternate return-date-box">
            <div class="input-field">
			 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                <label for="i-h-e-date2"><?=show_static_text($lang_id,339);?>:</label>
            <input class="form-control" type="text" id="i-h-e-date2" name="r_date" value="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
<!--													<input type="text" class="form-control" id="date-end" placeholder="mm/dd/yyyy"/>-->
            </div>
        </div>

        
        
                <div class="col-xxs-12 col-md-2 mt alternate">
                    <div class="input-field">
		                <label for="i-h-e-date2"><?=show_static_text($lang_id,349);?>:</label>
                        <div class="dropdown  mega-dropdown passenger">
                            <a href="javascript:;" class="dropdown-toggle " ><span class="total-psgr">1</span> Passengers <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-lr animated mega-dropdown-menu pull-right" role="menu">
                            <div class="col-lg-12" style="margin-bottom:5px" >
	                            <section>
                <label for="class"><?=show_static_text($lang_id,130);?>:</label>
                <input id="demo0" type="text" value="1" name="adults" onchange="total_passenger();" data-bts-min="1" data-bts-max="9" data-bts-step="1">
            </section>
                            </div>
                            <div class="col-lg-12">
	                            <section>
                <label for="class"><?=show_static_text($lang_id,138);?>:</label>
                <input id="demo1" type="text" value="0" name="children" onchange="total_passenger();child_age();" data-bts-min="0" data-bts-max="7" data-bts-step="1">
            </section>
                            </div>
                            <div class="col-lg-12 child-box-content" style="">
	                            <div class="child-age-content">
                                    <label for="class">Age of child 1:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" onchange="total_passenger();" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>

            					<div class="child-age-content">
                                    <label for="class">Age of child 2:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" onchange="total_passenger();" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>

                                
                                <div class="child-age-content">
                                    <label for="class">Age of child 3:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>
                                <div class="child-age-content">
                                    <label for="class">Age of child 4:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>
                                <div class="child-age-content">
                                    <label for="class">Age of child 5:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>

                                <div class="child-age-content">
                                    <label for="class">Age of child 6:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>
                                
                                <div class="child-age-content">
                                    <label for="class">Age of child 7:</label>
                                    <input id="" type="text" value="0" name="children_age[]" class="input-child-spin" data-bts-min="0" data-bts-max="17" data-bts-step="1">
                                </div>

                            </div>
                            </ul>
                        </div>

                    </div>
		        </div>
        <div class="col-md-2 col-xxs-12 pull-right">
			<button type="submit" class="btn btn-sys btn-sm pull-right" value="<?=show_static_text($lang_id,3);?>"><i class="fa fa-search"></i> Search</button>
            <!--<input type="submit" class="flight-btn btn btn-primary btn-block" >-->
        </div>
    </div>
    
    <div class="row">
    <div class="col-sm-3 mt">
        <section>
        	<span><?=show_static_text($lang_id,310);?>:</span>
            <select class="cs-select cs-skin-border input-trip-type" name="trip_type" onchange="select_trip_type(this.value);">
                <option value="one-way-trip" >One-way trip</option>
                <option value="return-trip" selected>Return trip</option>
            </select>
        </section>
    </div>
    <div class="col-sm-3 mt">
        <section>
        	<span><?=show_static_text($lang_id,315);?>:</span>
            <select class="cs-select cs-selects cs-skin-border">
            	<option value="Economy">Economy</option>
                <option value="Premium economy">Premium economy</option>
                <option value="Business class">Business class</option>
                <option value="First class">First class</option>
            </select>
        </section>
    </div>
    <div class="col-sm-6 mt">
        <input type="checkbox" name="direct_preferred" value="1"> <span class="s-checkbox-text"><?=show_static_text($lang_id,314);?> &nbsp;&nbsp;&nbsp;&nbsp;</span>
        <input type="checkbox" name="Include nearby airports" value="1"> <span class="s-checkbox-text"><?=show_static_text($lang_id,314);?></span>
    </div>
    
	</div>
    </form>
 </div>

 <div role="tabpanel" class="tab-pane" id="hotels" ng-controller="MainCtrl">
    <form action="<?='hotels'?>" method="get" id="advance-search-form2">
    <div class="row">
        <div class="col-xxs-12 col-md-4 mt ">
            <div class="input-field">
                <label for="from"><?=show_static_text($lang_id,84);?>:</label>
				 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control" name="city" id="from-place" placeholder="Los Angeles, USA" g-places-autocomplete ng-model="place" autocomplete="off"   required/>
            </div>
        </div>
        <div class="col-xxs-12 col-md-2  mt alternate">
            <div class="input-field">
                <label for="date-start"><?=show_static_text($lang_id,304);?>:</label>
				 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
             <input class="form-control" type="text" id="i-h-s-date" name="in_date" value="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
            </div>
        </div>
        <div class="col-xxs-12 col-md-2 mt alternate">
            <div class="input-field">
                <label for="date-end"><?=show_static_text($lang_id,305);?>:</label>
				 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
             <input class="form-control" type="text" id="i-h-e-date" name="out_date" value="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
            </div>
        </div>
        
        <div class="col-xxs-12 col-md-1 mt">
            <section>
                <label for="class"><?=show_static_text($lang_id,130);?>:</label>
				 <span class="input-group-addon" id="basic-addon1"></span>
                <select class="cs-select cs-selects cs-skin-border adult-select" name="adult">
                    <option value="" disabled selected>1</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </section>
        </div>
        <div class="col-xxs-12 col-md-1 mt">
            <section>
                <label for="class"><?=show_static_text($lang_id,138);?>:</label>
				<span class="input-group-addon" id="basic-addon1"></span>
                <select class="cs-select cs-selects cs-skin-border adult-select" name="children">
                    <option value="" disabled selected>0</option>
                    <option value="0" >0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </section>
        </div>
        <div class="col-md-2 col-xxs-12 pull-right">
			<button type="submit" class="btn btn-sys btn-sm pull-right" value="<?=show_static_text($lang_id,3);?>"><i class="fa fa-search"></i> Search</button>
           
            <!--<input type="submit" class="flight-btn btn btn-primary btn-block" value="">-->
        </div>
    </div>
    </form>
 </div>

 <div role="tabpanel" class="tab-pane " id="carhire">
 <form action="<?='carhire'?>" method="get" id="">
<input type="hidden" name="fId" id="i-fid" value="" >
<input type="hidden" name="tId" id="i-tid" value="" >
    <div class="row">
        <div class="col-xxs-12 col-md-2 mt">
            <div class="input-field">
                <label for="from"><?=show_static_text($lang_id,9400);?>Pick-Up Location:</label>
				 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control f-place" name="from_place" id="from-place" placeholder="Los Angeles, USA" required/>
            </div>
        </div>
        <div class="col-xxs-12 col-md-2 mt car-return-text-box " >
            <div class="input-field">
                <label for="from"><?=show_static_text($lang_id,9500);?>Drop-Off Location:</label>
				 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control t-place" name="to_place" id="to-place" placeholder="Tokyo, Japan" required/>
            </div>
        </div>
        
         <div class="col-xxs-12 col-md-2 mt alternate">
            <div class="input-field">
                <label for="i-h-s-date2"><?=show_static_text($lang_id,1080);?>Pick-Up Date:</label>
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
            <input class="form-control" type="text" id="i-h-s-date3" name="d_date" value="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
            </div>
        </div>
         <div class="col-xxs-12 col-md-1 mt alternate">
            <div class="input-field">
                <label for="i-h-s-date2"><?=show_static_text($lang_id,1008);?>Time:</label>
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
					<select class="selectpicker show-tick select-time" name="d_time">
						<?php
						foreach($time_data as $key=>$vl){
						?>
						<option value="<?=$key?>"><?=$vl?></option>
						<?php
						}
						?>
					</select>            
            </div>
        </div>
        
         
        
        <div class="col-xxs-12 col-md-2 mt alternate return-date-box">
            <div class="input-field">
                <label for="i-h-e-date2"><?=show_static_text($lang_id,3390);?>Drop-Off Date:</label>
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
            <input class="form-control" type="text" id="i-h-e-date3" name="r_date" value="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
<!--													<input type="text" class="form-control" id="date-end" placeholder="mm/dd/yyyy"/>-->
            </div>
        </div>
        
        <div class="col-xxs-12 col-md-1 mt alternate">
            <div class="input-field">
                <label for="i-h-s-date2"><?=show_static_text($lang_id,1008);?>Time:</label>
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
<select class="selectpicker show-tick select-time" name="r_time">
<?php
foreach($time_data as $key=>$vl){
?>
<option value="<?=$key?>"><?=$vl?></option>
<?php
}
?>
</select>            
            </div>
        </div>

        <div class="col-md-2 col-xxs-12 pull-right">
			<button type="submit" class="btn btn-sys btn-sm pull-right" value="<?=show_static_text($lang_id,3);?>"><i class="fa fa-search"></i> Search</button>
            
            <!--<input type="submit" class="flight-btn btn btn-primary btn-block">-->
        </div>
    </div>
    
    <div class="row">
    <div class="col-sm-6 mt">
        <input type="checkbox" name="different_location" id="i-c-d-l" onclick="set_return();" value="1" checked="checked"> <span class="s-checkbox-text"><?=show_static_text($lang_id,3140);?>Return to a different location </span>
    </div>
    
	</div>
    </form>
 </div>


<div role="tabpanel" class="tab-pane " id="tab4">
<?php
$city_data = $this->comman_model->get_query("SELECT MIN(id) AS id, cityName AS city_name FROM airports WHERE countryCode='GB' GROUP BY cityName",false);
?>
    <form action="holidays" method="get">
    <div class="row">
        <div class="col-xxs-12 col-md-3 mt">
            <div class="input-field">
                <label for="from"><?=show_static_text($lang_id,8004);?>Depart Form:</label>
				 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                <select name="form_place" class="selectpicker show-tick"> 
							<option value="">Select</option>
							<?php
							if($city_data){
								foreach($city_data as $set_city){
							?>
								<option value="<?=$set_city->id?>" ><?=$set_city->city_name?></option>
							<?php		
								}
							}
							?>

                </select>
            </div>
        </div>
        <div class="col-xxs-12 col-md-2 mt ">
            <div class="input-field">
                <label for="from"><?=show_static_text($lang_id,8004);?>Holiday Destination:</label>
				 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control" name="city" id="from-place" placeholder="Los Angeles, USA" required/>
            </div>
        </div>
        <div class="col-xxs-12 col-md-2  mt alternate">
            <div class="input-field">
                <label for="date-start"><?=show_static_text($lang_id,3004);?>Depart:</label>
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
             <input class="form-control datetimepicker1" type="text" name="in_date" value="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d"  required  />
            </div>
        </div>
        
        <div class="col-xxs-12 col-md-1 mt">
            <section>
                <label for="class"><?=show_static_text($lang_id,1300);?>Nights:</label>
					<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lightbulb-o"></i></span>
                <select class="cs-select cs-selects cs-skin-border adult-select" name="adult">
                    <option value="" disabled selected>1</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>
            </section>
        </div>
        <div class="col-xxs-12 col-md-1 mt">
            <section>
                <label for="class"><?=show_static_text($lang_id,130);?>:</label>
                <select class="cs-select cs-selects cs-skin-border adult-select" name="adult">
                    <option value="" disabled selected>1</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>
            </section>
        </div>
        <div class="col-xxs-12 col-md-1 mt">
            <section>
                <label for="class"><?=show_static_text($lang_id,138);?>:</label>
                <select class="cs-select cs-selects cs-skin-border adult-select" name="children">
                    <option value="" disabled selected>0</option>
                    <option value="0" >0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </section>
        </div>
        <div class="col-md-2 col-xxs-12 pull-right">
			<button type="submit" class="btn btn-sys btn-sm pull-right" value="<?=show_static_text($lang_id,3);?>"><i class="fa fa-search"></i> Search</button>
            
            <!--<input type="submit" class="flight-btn btn btn-primary btn-block">-->
        </div>
    </div>

    </form>
 </div>
 
<?php
if($home_slider_s){
	foreach($home_slider_s as $set_s){
		$form_data = $this->comman_model->get_by('services_attr',array('service_id'=>$set_s->id,'is_visible'=>1), FALSE, FALSE, false);

?>
<div role="tabpanel" class="tab-pane" id="s-tab-<?=$set_s->id?>">
    <form action="<?=$set_s->name?>" method="get">
     <input type="hidden" name="service_id" value="<?=$set_s->id?>"  />
    <div class="row">
<!--    <div class="col-xxs-12 col-md-3 ">
        <div class="input-field">
            <label for="from"><?=$set_form->name;?>:</label>
            <input type="text" placeholder="" name="field[<?=$set_form->id?>]" class="form-control" value="" />
        </div>
    </div>-->

					<?php
					if(isset($form_data)&&!empty($form_data)){
						foreach($form_data as $set_form){
					?>
					<div class="col-xxs-12 col-md-3 mt">
						<div class="input-field">
						<label for="from"><?=$set_form->name;?>:</label>
					<?php
					if($set_form->type=='textfield'){
					?>
					
					<input type="text" placeholder="" name="field[<?=$set_form->id?>]" class="form-control" value="" />
					<?php	
					}
					if($set_form->type=='mdroplist'){
						$arrayList = explode(',',$set_form->values);
						if($arrayList){
					?>
				
					<select class="input-field" name="field[<?=$set_form->id?>][mult][]" multiple="multiple" style="width:100%">
					<?php
					foreach($arrayList as $setArry){
					?>
					
					<option value="<?=$setArry; ?>" ><?=$setArry?></option>
					<?php
					}//foreach
					?>
					</select>
					<?php
						}//arrayList
					}//type
					if($set_form->type=='droplist'){
						$arrayList = explode(',',$set_form->values);
						if($arrayList){
					?>
					
					<select class="form-control " name="field[<?=$set_form->id?>]" >
					
							<option value="">Select</option>
					<?php
						foreach($arrayList as $setArry){
					?>
						<option value="<?=$setArry; ?>" ><?=$setArry?></option>
					<?php
						}
					?>
					</select>
					<?php
						}
					}
					if($set_form->type=='date_time'){
					?>
					<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
					<input type="text" name="field[<?=$set_form->id?>]" class="form-control datetimepicker1" id="" value="" />


					<!--<input type="text" placeholder="yyyy-mm-dd" name="field[<?=$set_form->id?>]" data-date-format="yyyy-mm-dd" class="form-control datetimepicker1 " />-->
					<?php
					}

					if($set_form->type=='date'){
					?>
					<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
					<input type="text" placeholder="dd-mm-yyyy" name="field[<?=$set_form->id?>]" data-date-format="dd-mm-yyyy" value="" readonly=""class="form-control datetimepicker1 " />
					<?php
					}
					if($set_form->type=='yes_no'){
					?>
						<div class="radio-list">

						<label class="radio-inline">
							<input type="radio" name="field[<?=$set_form->id?>]" class="" value="Yes" /> Yes
						</label>

						<label class="radio-inline">
							<input type="radio" name="field[<?=$set_form->id?>]" class="" value="No"  /> No
						</label>
						</div>

						<?php
						}
						?>    
            </div>
        </div>

					<?php
						}	
					}
					?>   		     
        
        <div class="col-md-2 col-xxs-12 pull-right">
			<button type="submit" class="btn btn-sys btn-sm pull-right" value="<?=show_static_text($lang_id,3);?>"><i class="fa fa-search"></i> Search</button>
            
        </div>
    </div>
    </form>
 </div>
<?php
	}
}
?>  

 
</div>

<style>
.home-slider-wrapper .adult-select span {
    padding: 6px 10px !important;
}
#carhire .row{
	margin:0;
}
#carhire .mt{
	padding:0 2px;
}
#carhire .select-time{
	padding:0px;
}

.bootstrap-select{
	width:100% !important;
	background:#FFF;
	border:none !important;
}
.bootstrap-select .btn{
	border:none !important;
}
.bootstrap-select .dropdown-toggle{
	padding:7px 15px;
	border-radius: 0;
	border: none;
	font-size:14px;
	font-weight:normal;
}

.btn-default:active, .btn-default.active, .open > .btn-default.dropdown-toggle
.bootstrap-select .dropdown-toggle:hover,
.bootstrap-select .dropdown-toggle:focus,
.bootstrap-select .dropdown-toggle{
	background:#FFF !important;
	color:#000 !important;
	box-shadow:none !important;
}

@media (max-width: 768px) {
.bootstrap-select{
	width:55% !important;
	float:right !important;
}
	
}



</style>