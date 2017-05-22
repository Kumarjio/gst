<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class custom_model extends CI_Model {
	protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
	protected $_timestamps = TRUE;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_user_type(){
		$userTypes = array(
				'Hair Salons','Nail Salons','Beauty Salons','Tanning Salons','Waxing Salons',
				'Spas','Massage Therapy','Barber Shop','Brow Bar','Gym & Fitness','Makeup Studio',
				'Mobile Therapy','Pilates Studio','Yoga Studio','Acupuncture','Art Therapy','Audiology',
				'Bowen Therapy Chiropody','Chiropractic','Dietetics','Foot Health','Herbalism','Independent',
				'Nursing Kinesiology','Massage Therapy','NLP Practitioners','Nutritional Counselling','Oriental Medicine',
				'Orthoptics','Occupational Therapy Orthotics','Osteopathy','Physiotherapy','Physical Therapy','Psychology',
				'Psychotherapy','Prosthetics','Reflexology','Speech and Language Therapy Sports Therapy','Others'
		);
		return $userTypes;
	}
	
    public function get_day_name(){
        $templates = array(
					'Sunday'		=> 'Sunday',
					'Monday'		=> 'Monday',
					'Tuesday'		=> 'Tuesday',
					'Wednesday'		=> 'Wednesday',
					'Thursday'		=> 'Thursday',
					'Friday'		=> 'Friday',
					'Saturday'		=> 'Saturday',
				);					
        return $templates;
	}

    public function get_month_name(){
        $templates = array(
					'January'	=>'January',
					'February'	=>'February',
					'March'		=>'March',
					'April'		=>'April',
					'May'		=>'May',
					'June'		=>'June',
					'July'		=>'July',
					'August'	=>'August',
					'September'	=>'September',
					'October'	=>'October',
					'November'	=>'November',
					'December'	=>'December',
				);					
        return $templates;
	}


   public function get_time_hour_min(){	 	 
		$options = array();
		foreach (range(0,23) as $sfullhour) 
		{
			
			$fullhour =str_pad($sfullhour,2, '0', STR_PAD_LEFT);
			$parthour = $fullhour;
		
/*			$options["$fullhour:00"] = $parthour.":00";
			$options["$fullhour:05"] = $parthour.":05";
			$options["$fullhour:10"] = $parthour.":10";
			$options["$fullhour:15"] = $parthour.":15";
			$options["$fullhour:20"] = $parthour.":20";
			$options["$fullhour:25"] = $parthour.":25";
			$options["$fullhour:30"] = $parthour.":30";
			$options["$fullhour:35"] = $parthour.":35";
			$options["$fullhour:40"] = $parthour.":40";
			$options["$fullhour:45"] = $parthour.":45";
			$options["$fullhour:50"] = $parthour.":50";
			$options["$fullhour:55"] = $parthour.":55";*/


			$options["$fullhour:00"] = $parthour.":00";
			$options["$fullhour:15"] = $parthour.":15";
			$options["$fullhour:30"] = $parthour.":30";
			$options["$fullhour:45"] = $parthour.":45";
			
		}
/*		echo '<pre>';
		print_r($options);
		die;*/
		return $options;
   }



	function font_family(){
		$font = array(

'Georgia, serif'=>'Georgia, serif',
'Palatino Linotype, Book Antiqua, Palatino, serif'=>'Palatino Linotype, Book Antiqua, Palatino, serif',
'Times New Roman, Times, serif'=>'Times New Roman, Times, serif',
'Arial, Helvetica, sans-serif'=>'Arial, Helvetica, sans-serif',
'Arial Black, Gadget, sans-serif'=>'Arial Black, Gadget, sans-serif',
'Comic Sans MS, cursive, sans-serif'=>'Comic Sans MS, cursive, sans-serif',
'Impact, Charcoal, sans-serif'=>'Impact, Charcoal, sans-serif',
'Lucida Sans Unicode, Lucida Grande, sans-serif'=>'Lucida Sans Unicode, Lucida Grande", sans-serif',
'Tahoma, Geneva, sans-serif'=>'Tahoma, Geneva, sans-serif',
'Trebuchet MS, Helvetica, sans-serif'=>'Trebuchet MS, Helvetica, sans-serif',
'Verdana, Geneva, sans-serif'=>'Verdana, Geneva, sans-serif',
'Courier New, Courier, monospace 	'=>'Courier New, Courier, monospace',
'Lucida Console, Monaco, monospace'=>'Lucida Console, Monaco, monospace'		

		);

        return $font;
	}


   public function get_time_hour(){	 
		$options = array();
		foreach (range(1,24) as $fullhour) 
		{
			$parthour = $fullhour;
		
			$options["$fullhour:00"] = $parthour.":00";
		}
		return $options;
	}

   public function get_time(){	 
		$options = array();
		foreach (range(0,23) as $fullhour) 
		{
			$parthour = $fullhour > 12 ? $fullhour - 12 : $fullhour;
			$sufix = $fullhour > 11 ? " pm" : " am";
		
			$options["$fullhour:00"] = $parthour.":00".$sufix;
			$options["$fullhour:30"] = $parthour.":30".$sufix;
		}
		return $options;
	}

   public function get_time_hour_AM(){	 
		$options = array();
		foreach (range(1,12) as $fullhour) 
		{
			$parthour = $fullhour;
			$sufix = $fullhour > 11 ? " pm" : " am";
		
			$options["$fullhour:00"] = $parthour.":00 am";
		}
		return $options;
	}
   public function get_time_hour_PM(){	 
		$options = array();
		foreach (range(13,24) as $fullhour) 
		{
			$parthour = $fullhour;
			$sufix = $fullhour > 11 ? " pm" : " am";
		
			$options["$fullhour:00"] = $parthour.":00 pm";
		}
		return $options;
	}

	function get_c_country(){
		$country  = array(
				"AT" => "Austria",
				"BE" => "Belgium",
				"BG" => "Bulgaria",
				"HR" => "Croatia",
				"CY" => "Cyprus",
				"CZ" => "Czech Republic",
				"DK" => "Denmark",
				"EE" => "Estonia",
				"FI" => "Finland",
				"FR" => "France",
				"DE" => "Germany",
				"GR" => "Greece",
				"HU" => "Hungary",
				"IE" => "Ireland",
				"IT" => "Italy",
				"LV" => "Latvia",
				"LT" => "Lithuania",
				"LU" => "Luxembourg",
				"MT" => "Malta",
				"NL" => "Netherlands",				
				"PL" => "Poland",
				"PT" => "Portugal",
				"RO" => "Romania",
				"SK" => "Slovakia",
				"SI" => "Slovenia",
				"ES" => "Spain",
				"SE" => "Sweden",
				"GB" => "United Kingdom",
					);
        return $country;
	}
	function get_city_name(){
	$city_arr  = array(
'Rome'=>'Rome',
'Milan'=>'Milan',
'Naples'=>'Naples',
'Palermo'=>'Palermo',
'Genoa'=>'Genoa',
'Bologna' =>'Bologna',
'Florence' =>'Florence',
'Bari' =>'Bari',
'Catania' =>'Catania',
'Venice' =>'Venice',
'Verona' =>'Verona',
'Messina' =>'Messina',
'Padua' =>'Padua',
'Trieste' =>'Trieste',
'Taranto' =>'Taranto',
'Brescia' =>'Brescia',
'Prato' =>'Prato',
'Reggio Calabria' =>'Reggio Calabria',
'Modena' =>'Modena',
'Parma' =>'Parma',
'Perugia' =>'Perugia',
'Livorno' =>'Livorno',
'Ravenna' =>'Ravenna',
'Foggia' =>'Foggia',
'Cagliari' =>'Cagliari',
'Rimini' =>'Rimini',
'Salerno' =>'Salerno',
'Ferrara' =>'Ferrara',
'Sassari' =>'Sassari',
				);
		return $city_arr;
	}



public function get_country_name(){
$templates = array(
"AF" => "Afghanistan",
"AL" => "Albania",
"DZ" => "Algeria",
"AS" => "American Samoa",
"AD" => "Andorra",
"AO" => "Angola",
"AI" => "Anguilla",
"AQ" => "Antarctica",
"AG" => "Antigua and Barbuda",
"AR" => "Argentina",
"AM" => "Armenia",
"AW" => "Aruba",
"AU" => "Australia",
"AT" => "Austria",
"AZ" => "Azerbaijan",
"BS" => "Bahamas",
"BH" => "Bahrain",
"BD" => "Bangladesh",
"BB" => "Barbados",
"BY" => "Belarus",
"BE" => "Belgium",
"BZ" => "Belize",
"BJ" => "Benin",
"BM" => "Bermuda",
"BT" => "Bhutan",
"BO" => "Bolivia",
"BA" => "Bosnia and Herzegovina",
"BW" => "Botswana",
"BV" => "Bouvet Island",
"BR" => "Brazil",
"BQ" => "British Antarctic Territory",
"IO" => "British Indian Ocean Territory",
"VG" => "British Virgin Islands",
"BN" => "Brunei",
"BG" => "Bulgaria",
"BF" => "Burkina Faso",
"BI" => "Burundi",
"KH" => "Cambodia",
"CM" => "Cameroon",
"CA" => "Canada",
"CT" => "Canton and Enderbury Islands",
"CV" => "Cape Verde",
"KY" => "Cayman Islands",
"CF" => "Central African Republic",
"TD" => "Chad",
"CL" => "Chile",
"CN" => "China",
"CX" => "Christmas Island",
"CC" => "Cocos [Keeling] Islands",
"CO" => "Colombia",
"KM" => "Comoros",
"CG" => "Congo - Brazzaville",
"CD" => "Congo - Kinshasa",
"CK" => "Cook Islands",
"CR" => "Costa Rica",
"HR" => "Croatia",
"CU" => "Cuba",
"CY" => "Cyprus",
"CZ" => "Czech Republic",
"CI" => "Côte d'Ivoire",
"DK" => "Denmark",
"DJ" => "Djibouti",
"DM" => "Dominica",
"DO" => "Dominican Republic",
"NQ" => "Dronning Maud Land",
"DD" => "East Germany",
"EC" => "Ecuador",
"EG" => "Egypt",
"SV" => "El Salvador",
"GQ" => "Equatorial Guinea",
"ER" => "Eritrea",
"EE" => "Estonia",
"ET" => "Ethiopia",
"FK" => "Falkland Islands",
"FO" => "Faroe Islands",
"FJ" => "Fiji",
"FI" => "Finland",
"FR" => "France",
"GF" => "French Guiana",
"PF" => "French Polynesia",
"TF" => "French Southern Territories",
"FQ" => "French Southern and Antarctic Territories",
"GA" => "Gabon",
"GM" => "Gambia",
"GE" => "Georgia",
"DE" => "Germany",
"GH" => "Ghana",
"GI" => "Gibraltar",
"GR" => "Greece",
"GL" => "Greenland",
"GD" => "Grenada",
"GP" => "Guadeloupe",
"GU" => "Guam",
"GT" => "Guatemala",
"GG" => "Guernsey",
"GN" => "Guinea",
"GW" => "Guinea-Bissau",
"GY" => "Guyana",
"HT" => "Haiti",
"HM" => "Heard Island and McDonald Islands",
"HN" => "Honduras",
"HK" => "Hong Kong SAR China",
"HU" => "Hungary",
"IS" => "Iceland",
"IN" => "India",
"ID" => "Indonesia",
"IR" => "Iran",
"IQ" => "Iraq",
"IE" => "Ireland",
"IM" => "Isle of Man",
"IL" => "Israel",
"IT" => "Italy",
"JM" => "Jamaica",
"JP" => "Japan",
"JE" => "Jersey",
"JT" => "Johnston Island",
"JO" => "Jordan",
"KZ" => "Kazakhstan",
"KE" => "Kenya",
"KI" => "Kiribati",
"KW" => "Kuwait",
"KG" => "Kyrgyzstan",
"LA" => "Laos",
"LV" => "Latvia",
"LB" => "Lebanon",
"LS" => "Lesotho",
"LR" => "Liberia",
"LY" => "Libya",
"LI" => "Liechtenstein",
"LT" => "Lithuania",
"LU" => "Luxembourg",
"MO" => "Macau SAR China",
"MK" => "Macedonia",
"MG" => "Madagascar",
"MW" => "Malawi",
"MY" => "Malaysia",
"MV" => "Maldives",
"ML" => "Mali",
"MT" => "Malta",
"MH" => "Marshall Islands",
"MQ" => "Martinique",
"MR" => "Mauritania",
"MU" => "Mauritius",
"YT" => "Mayotte",
"FX" => "Metropolitan France",
"MX" => "Mexico",
"FM" => "Micronesia",
"MI" => "Midway Islands",
"MD" => "Moldova",
"MC" => "Monaco",
"MN" => "Mongolia",
"ME" => "Montenegro",
"MS" => "Montserrat",
"MA" => "Morocco",
"MZ" => "Mozambique",
"MM" => "Myanmar [Burma]",
"NA" => "Namibia",
"NR" => "Nauru",
"NP" => "Nepal",
"NL" => "Netherlands",
"AN" => "Netherlands Antilles",
"NT" => "Neutral Zone",
"NC" => "New Caledonia",
"NZ" => "New Zealand",
"NI" => "Nicaragua",
"NE" => "Niger",
"NG" => "Nigeria",
"NU" => "Niue",
"NF" => "Norfolk Island",
"KP" => "North Korea",
"VD" => "North Vietnam",
"MP" => "Northern Mariana Islands",
"NO" => "Norway",
"OM" => "Oman",
"PC" => "Pacific Islands Trust Territory",
"PK" => "Pakistan",
"PW" => "Palau",
"PS" => "Palestinian Territories",
"PA" => "Panama",
"PZ" => "Panama Canal Zone",
"PG" => "Papua New Guinea",
"PY" => "Paraguay",
"YD" => "People's Democratic Republic of Yemen",
"PE" => "Peru",
"PH" => "Philippines",
"PN" => "Pitcairn Islands",
"PL" => "Poland",
"PT" => "Portugal",
"PR" => "Puerto Rico",
"QA" => "Qatar",
"RO" => "Romania",
"RU" => "Russia",
"RW" => "Rwanda",
"RE" => "Réunion",
"BL" => "Saint Barthélemy",
"SH" => "Saint Helena",
"KN" => "Saint Kitts and Nevis",
"LC" => "Saint Lucia",
"MF" => "Saint Martin",
"PM" => "Saint Pierre and Miquelon",
"VC" => "Saint Vincent and the Grenadines",
"WS" => "Samoa",
"SM" => "San Marino",
"SA" => "Saudi Arabia",
"SN" => "Senegal",
"RS" => "Serbia",
"CS" => "Serbia and Montenegro",
"SC" => "Seychelles",
"SL" => "Sierra Leone",
"SG" => "Singapore",
"SK" => "Slovakia",
"SI" => "Slovenia",
"SB" => "Solomon Islands",
"SO" => "Somalia",
"ZA" => "South Africa",
"GS" => "South Georgia and the South Sandwich Islands",
"KR" => "South Korea",
"ES" => "Spain",
"LK" => "Sri Lanka",
"SD" => "Sudan",
"SR" => "Suriname",
"SJ" => "Svalbard and Jan Mayen",
"SZ" => "Swaziland",
"SE" => "Sweden",
"CH" => "Switzerland",
"SY" => "Syria",
"ST" => "São Tomé and Príncipe",
"TW" => "Taiwan",
"TJ" => "Tajikistan",
"TZ" => "Tanzania",
"TH" => "Thailand",
"TL" => "Timor-Leste",
"TG" => "Togo",
"TK" => "Tokelau",
"TO" => "Tonga",
"TT" => "Trinidad and Tobago",
"TN" => "Tunisia",
"TR" => "Turkey",
"TM" => "Turkmenistan",
"TC" => "Turks and Caicos Islands",
"TV" => "Tuvalu",
"UM" => "U.S. Minor Outlying Islands",
"PU" => "U.S. Miscellaneous Pacific Islands",
"VI" => "U.S. Virgin Islands",
"UG" => "Uganda",
"UA" => "Ukraine",
"SU" => "Union of Soviet Socialist Republics",
"AE" => "United Arab Emirates",
"GB" => "United Kingdom",
"US" => "United States",
"ZZ" => "Unknown or Invalid Region",
"UY" => "Uruguay",
"UZ" => "Uzbekistan",
"VU" => "Vanuatu",
"VA" => "Vatican City",
"VE" => "Venezuela",
"VN" => "Vietnam",
"WK" => "Wake Island",
"WF" => "Wallis and Futuna",
"EH" => "Western Sahara",
"YE" => "Yemen",
"ZM" => "Zambia",
"ZW" => "Zimbabwe",
"AX" => "Åland Islands",
);					
        return $templates;
	}

					
}





/* End of file super_admin_model.php */
/* Location: ./system/application/models/super_admin_model.php */
?>