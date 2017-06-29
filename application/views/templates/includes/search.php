<div class="search-main-wrapper">
<div class="container">
<div class="row">
    	<div class="col-md-12">

<ul class="search-tab nav nav-tabs nav-justified hidden-sm hidden-xs" role="tablist">
  <li class="active">
    <a href="#flights"><span class="fa fa-fw fa-plane"></span> <span class="hidden-xs">Flights</span></a>
  </li>
  <li>
       <a href="hotels"><span class="fa fa-fw fa-hotel"></span>  <span class="hidden-xs">Hotels</span></a>
  </li>
  <li>
       <a href="carhire"><span class="fa fa-fw fa-car"></span> <span class="hidden-xs">Car Hire</span></a>
  </li>
  <li>
       <a href="holidays"><span class="fa fa-fw fa-umbrella"></span> <span class="hidden-xs">Holiday</span></a>
  </li>
  <li role="presentation">
       <a href="hajj">
       <span class="icons-png i-0"></span>
        <span class="hidden-xs">Hajj</span></a>
  </li>

  <li role="presentation">
       <a href="umrah">
       <span class="icons-png i-1"></span>
        <span class="hidden-xs">Umrah</span></a>
  </li>

  <li role="presentation">
       <a href="travel-insurance">
       <span class="icons-png i-2"></span>
        <span class="hidden-xs">Travel Insurance</span></a>
  </li>

  <li role="presentation">
       <a href="cruises">
       <span class="icons-png i-3"></span>
        <span class="hidden-xs">Cruises</span></a>
  </li>

  
</ul>


<div class="search-form-wp">
<div class="row">
<form action="flights" id="advance-search-form" method="get">
    <input name="min_price" id="min-price" value="" type="hidden">
    <input name="max_price" id="max-price" value="" type="hidden">
    <input name="fId" id="i-fid" value="" type="hidden">
    <input name="tId" id="i-tid" value="" type="hidden">
<div class="row f-row">
	<div class="form-group">
		<div class="col-md-2 col-sm-12 col-xs-12 text-field-box margin-bottom-10">
	        <label class="input">From:</label>
            
            <!--<div class="icon-addon addon-lg">
                    <input type="text" placeholder="Email" class="form-control" id="email">
                    <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
                </div>-->
            <div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
				<input name="from_place" value="" class="form-control f-place" autocomplete="off" placeholder="Country, City or Airport" required="" type="text"><ul class="typeahead dropdown-menu"></ul>
            </div>
        </div>
		

		<div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10 text-field-box">
	        <label class="input">To:</label>
            <div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
				<input name="to_place" value="" class="form-control t-place" autocomplete="off" aria-required="true" placeholder="Country, City or Airport" required="" type="text"><ul class="typeahead dropdown-menu"></ul>
			</div>                
        </div>
		
		<div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10 date-field-box">
	        <label class="input">Depart:</label>
            <div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
				<input class="form-control" id="input-s-date" name="d_date" value="12-06-2017" data-date-format="dd-mm-yyyy" data-date-start-date="+0d" required="" type="text">
            </div>
        </div>
		
		<div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10 date-field-box  return-date-box ">
	        <label class="input">Return:</label>
            <div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
				<input class="form-control" id="input-e-date" name="r_date" value="12-06-2017" data-date-format="dd-mm-yyyy" data-date-start-date="+0d" type="text">
			</div>                
        </div>

		<div class="col-md-2 col-sm-12 col-xs-12 margin-bottom-10 ">
                
                    <div class="input-field">
		                <label for="i-h-e-date2">Passenger:</label>
                        <div class="dropdown  mega-dropdown passenger">
                            <a href="javascript:;" class="dropdown-toggle "><span class="total-psgr">1</span> Passengers <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-lr animated mega-dropdown-menu pull-right" role="menu">
                            <div class="col-lg-12" style="margin-bottom:5px">
	                            <section>
                <label for="class">Adult:</label>
                <div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="demo0" value="1" name="adults" onchange="total_passenger()" data-bts-min="1" data-bts-max="8" data-bts-step="1" class="form-control" style="display: block;" type="text"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn-vertical"><button class="btn btn-default bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button><button class="btn btn-default bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button></span></div>
            </section>
                            </div>
                            <div class="col-lg-12">
	                            <section>
                <label for="class">Children:</label>
                <div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="demo1" value="0" name="children" onchange="total_passenger();child_age();" data-bts-min="0" data-bts-max="7" data-bts-step="1" class="form-control" style="display: block;" type="text"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn-vertical"><button class="btn btn-default bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button><button class="btn btn-default bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button></span></div>
            </section>
                            </div>
	                            <div class="col-lg-12 child-box-content" style="">
	                            <div class="child-age-content">
                                    <label for="class">Age of child 1:</label>
                                    <div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="" value="0" name="children_age[]" class="input-child-spin form-control" onchange="total_passenger();" data-bts-min="0" data-bts-max="17" data-bts-step="1" style="display: block;" type="text"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn-vertical"><button class="btn btn-default bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button><button class="btn btn-default bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button></span></div>
                                </div>

            					<div class="child-age-content">
                                    <label for="class">Age of child 2:</label>
                                    <div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="" value="0" name="children_age[]" class="input-child-spin form-control" onchange="total_passenger();" data-bts-min="0" data-bts-max="17" data-bts-step="1" style="display: block;" type="text"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn-vertical"><button class="btn btn-default bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button><button class="btn btn-default bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button></span></div>
                                </div>

                                
                                <div class="child-age-content">
                                    <label for="class">Age of child 3:</label>
                                    <div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="" value="0" name="children_age[]" class="input-child-spin form-control" data-bts-min="0" data-bts-max="17" data-bts-step="1" style="display: block;" type="text"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn-vertical"><button class="btn btn-default bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button><button class="btn btn-default bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button></span></div>
                                </div>
                                <div class="child-age-content">
                                    <label for="class">Age of child 4:</label>
                                    <div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="" value="0" name="children_age[]" class="input-child-spin form-control" data-bts-min="0" data-bts-max="17" data-bts-step="1" style="display: block;" type="text"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn-vertical"><button class="btn btn-default bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button><button class="btn btn-default bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button></span></div>
                                </div>
                                <div class="child-age-content">
                                    <label for="class">Age of child 5:</label>
                                    <div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="" value="0" name="children_age[]" class="input-child-spin form-control" data-bts-min="0" data-bts-max="17" data-bts-step="1" style="display: block;" type="text"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn-vertical"><button class="btn btn-default bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button><button class="btn btn-default bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button></span></div>
                                </div>

                                <div class="child-age-content">
                                    <label for="class">Age of child 6:</label>
                                    <div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="" value="0" name="children_age[]" class="input-child-spin form-control" data-bts-min="0" data-bts-max="17" data-bts-step="1" style="display: block;" type="text"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn-vertical"><button class="btn btn-default bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button><button class="btn btn-default bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button></span></div>
                                </div>
                                
                                <div class="child-age-content">
                                    <label for="class">Age of child 7:</label>
                                    <div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="" value="0" name="children_age[]" class="input-child-spin form-control" data-bts-min="0" data-bts-max="17" data-bts-step="1" style="display: block;" type="text"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn-vertical"><button class="btn btn-default bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button><button class="btn btn-default bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button></span></div>
                                </div>

                            </div>
                            </ul>
                        </div>

                    </div>
        </div>
		        

<!--//col-md-4//-->
        

	<div class="col-md-2 col-sm-12 col-xs-12 search-btns ">
        <button type="submit" class="btn btn-sys btn-sm pull-right" style=""><i class="fa fa-search"></i> Search</button>
        </div>
		
       
    </div>
</div>    
    <div class="row">
    <div class="col-sm-3">
        <section>
        	<span class="label">Trip type:</span>
            
        <div class="cs-select input-trip-type cs-skin-border" tabindex="0"><span class="cs-placeholder">Return trip</span><div class="cs-options"><ul><li data-option="" data-value="one-way-trip"><span>One-way trip</span></li><li data-option="" data-value="return-trip"><span>Return trip</span></li></ul></div><select class="cs-select input-trip-type cs-skin-border" name="trip_type">
                <option value="one-way-trip">One-way trip</option>
                <option value="return-trip" selected="">Return trip</option>
            </select></div></section>
    </div>
    <div class="col-sm-3">
        <section>
        	<span class="label">Ticket class:</span>
            
        <div class="cs-select cs-selects cs-skin-border" tabindex="0"><span class="cs-placeholder">Economy</span><div class="cs-options"><ul><li data-option="" data-value="Economy"><span>Economy</span></li><li data-option="" data-value="Premium economy"><span>Premium economy</span></li><li data-option="" data-value="Business class"><span>Business class</span></li><li data-option="" data-value="First class"><span>First class</span></li></ul></div><select class="cs-select cs-selects cs-skin-border">
            	<option value="Economy">Economy</option>
                <option value="Premium economy">Premium economy</option>
                <option value="Business class">Business class</option>
                <option value="First class">First class</option>
            </select></div></section>
    </div>
    <div class="col-sm-6">
        <input name="direct_preferred" value="1" type="checkbox"> <span class="labels">Direct preferred &nbsp;&nbsp;&nbsp;&nbsp;</span>
        <input name="Include nearby airports" value="1" type="checkbox"> <span class="labels">Include nearby airports</span>
    </div>
    
	</div>
        <div class="clearfix"></div>
</form>
</div>
     	    <div class="clear"></div>
	       </div>        	
		</div><!--//left search content//-->
  </div>
</div><!-- END container -->
</div>