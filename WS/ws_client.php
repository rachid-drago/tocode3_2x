a<?php
  
	require_once('lib/nusoap.php');
	$error  = '';
	$result = array();
    $response = '';
    $result2=null;
    $wsdl = "http://localhost/soc/tocode3_2/WS/ws1_server.php?wsdl";
    if (isset($_GET["country"]))
    {
        $id=$_GET["country"];
        $wsdl = "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";

        $client = new nusoap_client($wsdl, true);
            
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
                 echo $id;
                $result2 = $client->call('FullCountryInfo', array('sCountryISOCode'=>$id));
                var_dump($result2);

			  }catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
    }
    
	if(isset($_POST['sub'])){
		$id = trim($_POST['id']);
		if(!$id){
			$error = 'id cannot be left blank.';
		}

		if(!$error){
			//create client object
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				$result = $client->call('fetchDestinationData', array($id));
				$result = json_decode($result);
			  }catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}
	}	

	function ctc($country) {
		if ($country == 'Afghanistan') return 'AF';
		if ($country == 'Aland Islands') return 'AX';
		if ($country == 'Albania') return 'AL';
		if ($country == 'Algeria') return 'DZ';
		if ($country == 'ASAmerican Samoa') return 'AS';
		if ($country == 'Andorra') return 'AD';
		if ($country == 'Angola') return 'AO';
		if ($country == 'Anguilla') return 'AI';
		if ($country == 'Antarctica') return 'AQ';
		if ($country == 'Antigua and Barbuda') return 'AG';
		if ($country == 'Argentina') return 'AR';
		if ($country == 'Armenia') return 'AM';
		if ($country == 'Aruba') return 'AW';
		if ($country == 'Australia') return 'AU';
		if ($country == 'Austria') return 'AT';
		if ($country == 'Azerbaijan') return 'AZ';
		if ($country == 'Bahamas the') return 'BS';
		if ($country == 'Bahrain') return 'BH';
		if ($country == 'Bangladesh') return 'BD';
		if ($country == 'Barbados') return 'BB';
		if ($country == 'Belarus') return 'BY';
		if ($country == 'Belgium') return 'BE';
		if ($country == 'Belize') return 'BZ';
		if ($country == 'Benin') return 'BJ';
		if ($country == 'Bermuda') return 'BM';
		if ($country == 'Bhutan') return 'BT';
		if ($country == 'Bolivia') return 'BO';
		if ($country == 'Bosnia and Herzegovina') return 'BA';
		if ($country == 'Botswana') return 'BW';
		if ($country == 'Bouvet Island (Bouvetoya)') return 'BV';
		if ($country == 'Brazil') return 'BR';
		if ($country == 'British Indian Ocean Territory') return 'IO';
		if ($country == 'British Virgin Islands') return 'VG';
		if ($country == 'Brunei Darussalam') return 'BN';
		if ($country == 'Bulgaria') return 'BG';
		if ($country == 'Burkina Faso') return 'BF';
		if ($country == 'Burundi') return 'BI';
		if ($country == 'Cambodia') return 'KH';
		if ($country == 'Cameroon') return 'CM';
		if ($country == 'Canada') return 'CA';
		if ($country == 'Cape Verde') return 'CV';
		if ($country == 'Cayman Islands') return 'KY';
		if ($country == 'Central African Republic') return 'CF';
		if ($country == 'Chad') return 'TD';
		if ($country == 'Chile') return 'CL';
		if ($country == 'China') return 'CN';
		if ($country == 'Christmas Island') return 'CX';
		if ($country == 'Cocos (Keeling) Islands') return 'CC';
		if ($country == 'Colombia') return 'CO';
		if ($country == 'Comoros the') return 'KM';
		if ($country == 'Congo') return 'CD';
		if ($country == 'Congo the') return 'CG';
		if ($country == 'Cook Islands') return 'CK';
		if ($country == 'Costa Rica') return 'CR';
		if ($country == 'Cote d\'Ivoire') return 'CI';
		if ($country == 'Croatia') return 'HR';
		if ($country == 'Cuba') return 'CU';
		if ($country == 'Cyprus') return 'CY';
		if ($country == 'Czech Republic') return 'CZ';
		if ($country == 'Denmark') return 'DK';
		if ($country == 'Djibouti') return 'DJ';
		if ($country == 'Dominica') return 'DM';
		if ($country == 'Dominican Republic') return 'DO';
		if ($country == 'Ecuador') return 'EC';
		if ($country == 'Egypt') return 'EG';
		if ($country == 'El Salvador') return 'SV';
		if ($country == 'Equatorial Guinea') return 'GQ';
		if ($country == 'Eritrea') return 'ER';
		if ($country == 'Estonia') return 'EE';
		if ($country == 'Ethiopia') return 'ET';
		if ($country == 'Faroe Islands') return 'FO';
		if ($country == 'Falkland Islands (Malvinas)') return 'FK';
		if ($country == 'Fiji the Fiji Islands') return 'FJ';
		if ($country == 'Finland') return 'FI';
		if ($country == 'France') return 'FR';
		if ($country == 'French Guiana') return 'GF';
		if ($country == 'French Polynesia') return 'PF';
		if ($country == 'French Southern Territories') return 'TF';
		if ($country == 'Gabon') return 'GA';
		if ($country == 'Gambia the') return 'GM';
		if ($country == 'Georgia') return 'GE';
		if ($country == 'Germany') return 'DE';
		if ($country == 'Ghana') return 'GH';
		if ($country == 'Gibraltar') return 'GI';
		if ($country == 'Greece') return 'GR';
		if ($country == 'Greenland') return 'GL';
		if ($country == 'Grenada') return 'GD';
		if ($country == 'Guadeloupe') return 'GP';
		if ($country == 'Guam') return 'GU';
		if ($country == 'Guatemala') return 'GT';
		if ($country == 'Guernsey') return 'GG';
		if ($country == 'Guinea') return 'GN';
		if ($country == 'Guinea-Bissau') return 'GW';
		if ($country == 'Guyana') return 'GY';
		if ($country == 'Haiti') return 'HT';
		if ($country == 'Heard Island and McDonald Islands') return 'HM';
		if ($country == 'Holy See (Vatican City State)') return 'VA';
		if ($country == 'Honduras') return 'HN';
		if ($country == 'Hong Kong') return 'HK';
		if ($country == 'Hungary') return 'HU';
		if ($country == 'Iceland') return 'IS';
		if ($country == 'India') return 'IN';
		if ($country == 'Indonesia') return 'ID';
		if ($country == 'Iran') return 'IR';
		if ($country == 'Iraq') return 'IQ';
		if ($country == 'Ireland') return 'IE';
		if ($country == 'Isle of Man') return 'IM';
		if ($country == 'Israel') return 'IL';
		if ($country == 'Italy') return 'IT';
		if ($country == 'Jamaica') return 'JM';
		if ($country == 'Japan') return 'JP';
		if ($country == 'Jersey') return 'JE';
		if ($country == 'Jordan') return 'JO';
		if ($country == 'Kazakhstan') return 'KZ';
		if ($country == 'Kenya') return 'KE';
		if ($country == 'Kiribati') return 'KI';
		if ($country == 'Korea') return 'KP';
		if ($country == 'Korea') return 'KR';
		if ($country == 'Kuwait') return 'KW';
		if ($country == 'Kyrgyz Republic') return 'KG';
		if ($country == 'Lao') return 'LA';
		if ($country == 'Latvia') return 'LV';
		if ($country == 'Lebanon') return 'LB';
		if ($country == 'Lesotho') return 'LS';
		if ($country == 'Liberia') return 'LR';
		if ($country == 'Libyan Arab Jamahiriya') return 'LY';
		if ($country == 'Liechtenstein') return 'LI';
		if ($country == 'Lithuania') return 'LT';
		if ($country == 'Luxembourg') return 'LU';
		if ($country == 'Macao') return 'MO';
		if ($country == 'Macedonia') return 'MK';
		if ($country == 'Madagascar') return 'MG';
		if ($country == 'Malawi') return 'MW';
		if ($country == 'Malaysia') return 'MY';
		if ($country == 'Maldives') return 'MV';
		if ($country == 'Mali') return 'ML';
		if ($country == 'MT') return 'Malta';
		if ($country == 'Marshall Islands') return 'MH';
		if ($country == 'Martinique') return 'MQ';
		if ($country == 'Mauritania') return 'MR';
		if ($country == 'Mauritius') return 'MU';
		if ($country == 'Mayotte') return 'YT';
		if ($country == 'Mexico') return 'MX';
		if ($country == 'Micronesia') return 'FM';
		if ($country == 'Moldova') return 'MD';
		if ($country == 'Monaco') return 'MC';
		if ($country == 'Mongolia') return 'MN';
		if ($country == 'Montenegro') return 'ME';
		if ($country == 'Montserrat') return 'MS';
		if ($country == 'Morocco') return 'MA';
		if ($country == 'Mozambique') return 'MZ';
		if ($country == 'Myanmar') return 'MM';
		if ($country == 'Namibia') return 'NA';
		if ($country == 'Nauru') return 'NR';
		if ($country == 'Nepal') return 'NP';
		if ($country == 'Netherlands Antilles') return 'AN';
		if ($country == 'Netherlands the') return 'NL';
		if ($country == 'New Caledonia') return 'NC';
		if ($country == 'New Zealand') return 'NZ';
		if ($country == 'Nicaragua') return 'NI';
		if ($country == 'Niger') return 'NE';
		if ($country == 'Nigeria') return 'NG';
		if ($country == 'Niue') return 'NU';
		if ($country == 'Norfolk Island') return 'NF';
		if ($country == 'Northern Mariana Islands') return 'MP';
		if ($country == 'Norway') return 'NO';
		if ($country == 'Oman') return 'OM';
		if ($country == 'Pakistan') return 'PK';
		if ($country == 'Palau') return 'PW';
		if ($country == 'Palestinian Territory') return 'PS';
		if ($country == 'Panama') return 'PA';
		if ($country == 'Papua New Guinea') return 'PG';
		if ($country == 'Paraguay') return 'PY';
		if ($country == 'Peru') return 'PE';
		if ($country == 'Philippines') return 'PH';
		if ($country == 'Pitcairn Islands') return 'PN';
		if ($country == 'Poland') return 'PL';
		if ($country == 'Portugal, Portuguese Republic') return 'PT';
		if ($country == 'Puerto Rico') return 'PR';
		if ($country == 'Qatar') return 'QA';
		if ($country == 'Reunion') return 'RE';
		if ($country == 'Romania') return 'RO';
		if ($country == 'Russian Federation') return 'RU';
		if ($country == 'Rwanda') return 'RW';
		if ($country == 'Saint Barthelemy') return 'BL';
		if ($country == 'Saint Helena') return 'SH';
		if ($country == 'Saint Kitts and Nevis') return 'KN';
		if ($country == 'Saint Lucia') return 'LC';
		if ($country == 'Saint Martin') return 'MF';
		if ($country == 'Saint Pierre and Miquelon') return 'PM';
		if ($country == 'Saint Vincent and the Grenadines') return 'VC';
		if ($country == 'Samoa') return 'WS';
		if ($country == 'San Marino') return 'SM';
		if ($country == 'Sao Tome and Principe') return 'ST';
		if ($country == 'Saudi Arabia') return 'SA';
		if ($country == 'Senegal') return 'SN';
		if ($country == 'Serbia') return 'RS';
		if ($country == 'Seychelles') return 'SC';
		if ($country == 'Sierra Leone') return 'SL';
		if ($country == 'Singapore') return 'SG';
		if ($country == 'Slovakia (Slovak Republic)') return 'SK';
		if ($country == 'Slovenia') return 'SI';
		if ($country == 'Solomon Islands') return 'SB';
		if ($country == 'Somalia, Somali Republic') return 'SO';
		if ($country == 'South Africa') return 'ZA';
		if ($country == 'South Georgia and the South Sandwich Islands') return 'GS';
		if ($country == 'Spain') return 'ES';
		if ($country == 'Sri Lanka') return 'LK';
		if ($country == 'Sudan') return 'SD';
		if ($country == 'Suriname') return 'SR';
		if ($country == 'Svalbard & Jan Mayen Islands') return 'SJ';
		if ($country == 'Swaziland') return 'SZ';
		if ($country == 'Sweden') return 'SE';
		if ($country == 'Switzerland, Swiss Confederation') return 'CH';
		if ($country == 'Syrian Arab Republic') return 'SY';
		if ($country == 'Taiwan') return 'TW';
		if ($country == 'Tajikistan') return 'TJ';
		if ($country == 'Tanzania') return 'TZ';
		if ($country == 'Thailand') return 'TH';
		if ($country == 'Timor-Leste') return 'TL';
		if ($country == 'Togo') return 'TG';
		if ($country == 'Tokelau') return 'TK';
		if ($country == 'Tonga') return 'TO';
		if ($country == 'Trinidad and Tobago') return 'TT';
		if ($country == 'Tunisia') return 'TN';
		if ($country == 'Turkey') return 'TR';
		if ($country == 'Turkmenistan') return 'TM';
		if ($country == 'Turks and Caicos Islands') return 'TC';
		if ($country == 'Tuvalu') return 'TV';
		if ($country == 'Uganda') return 'UG';
		if ($country == 'Ukraine') return 'UA';
		if ($country == 'United Arab Emirates') return 'AE';
		if ($country == 'United Kingdom') return 'GB';
		if ($country == 'United States') return 'US';
		if ($country == 'United States Minor Outlying Islands') return 'UM';
		if ($country == 'United States Virgin Islands') return 'VI';
		if ($country == 'Uruguay, Eastern Republic of') return 'UY';
		if ($country == 'Uzbekistan') return 'UZ';
		if ($country == 'Vanuatu') return 'VU';
		if ($country == 'Venezuela') return 'VE';
		if ($country == 'Vietnam') return 'VN';
		if ($country == 'Wallis and Futuna') return 'WF';
		if ($country == 'Western Sahara') return 'EH';
		if ($country == 'Yemen') return 'YE';
		if ($country == 'Kosovo') return 'XK';
		if ($country == 'Zambia') return 'ZM';
		if ($country == 'Zimbabwe') return 'ZW';
		return 'Country Not Found :( ';
	}    

	/* Add new Country **/
	if(isset($_POST['addbtn'])){
		/*$title = trim($_POST['title']);
		$id = trim($_POST['id']);
		$author = trim($_POST['author']);
		$category = trim($_POST['category']);
        $price = trim($_POST['price']);*/
        $destination=trim($_POST["destination"]);
        $country=trim($_POST["country"]);
        $continent=trim($_POST["continent"]);
        


		//Perform all required validations here
		if(!$destination || !$country || !$continent ){
			$error = 'All fields are required.';
		}
        echo  $destination .' '. $country .' '. $continent;
		if(!$error){
            //create client object
            echo "creation client ";
            $client = new nusoap_client($wsdl, true);

            $err = $client->getError();

			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				/** Call insert Country method */
				 $response =  $client->call('insertDestination', array($destination,$country,$continent));
				 $response = json_decode($response);
			  }catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Destination Store Web Service</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Countrys Store SOAP Web Service</h2>
  <p>Enter <strong>id</strong> of Country and click <strong>Fetch Country Information</strong> button.</p>
  <br />       
  <div class='row'>
  	<form class="form-inline" method = 'post' name='form1'>
  		<?php if($error) { ?> 
	    	<div class="alert alert-danger fade in">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Error!</strong>&nbsp;<?php echo $error; ?> 
	        </div>
		<?php } ?>
	    <div class="form-group">
	      <label for="email">id:</label>
	      <input type="text" class="form-control" name="id" id="id" placeholder="Enter id" required>
	    </div>
	    <button type="submit" name='sub' class="btn btn-default">Fetch Country Information</button>
    </form>
   </div>
   <br />
   <h2>Country Information</h2>
  <table class="table">
    <thead>
      <tr>
      <?php if (isset($result2)) { ?>
        <th>Flag</th>
        <th>Country</th>
        <th>Capital</th>
        <th>Currency</th>

        <th>Continent</th>

        <th></th>
      <?php } else {
          ?>
                  <th>Destination</th>
        <th>Country</th>


        <th>Continent</th>
        <th>id</th>

          <?php
      }?>
      </tr>
    </thead>
    <tbody>
    <?php if (isset($result2)) {?>
        <td><img src="<?php echo $result2["FullCountryInfoResult"]["sCountryFlag"]; ?>"  style="height:100px;width:175px";/></td>
		        <td><?php echo $result2["FullCountryInfoResult"]["sName"]; ?></td>
                <td><?php echo $result2["FullCountryInfoResult"]["sCapitalCity"]; ?></td>

		        <td><?php echo $result2["FullCountryInfoResult"]["sCurrencyISOCode"]; ?></td>
		        <td><?php echo $result2["FullCountryInfoResult"]["sContinentCode"]; ?></td>	

		      </tr>
    <?php } ?>
    <?php if($result){ ?>
      	
		      <tr>
		        <td><?php echo $result->destination; ?></td>
		        <td><?php echo $result->country; ?></td>
		        <td><?php echo $result->continent; ?></td>
		        <td><?php echo $result->id; ?></td>	
				
<td><?php echo "<a href='http://localhost/soc/tocode3_2/WS/ws_client.php?country=".ctc($result->country)."'>More information</a>";?></td>

		      </tr>
      <?php 
  		}else{ ?>
  			<tr>
		        <td colspan='5'>Enter id and click on Fetch Destination Information button</td>
		      </tr>
  		<?php } ?>
    </tbody>
  </table>
	<div class='row'>
	<h2>Add New Destination</h2>
	 <?php if(isset($response->status)) {

	  if($response->status == 200){ ?>
		<div class="alert alert-success fade in">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Success!</strong>&nbsp; Destination Added succesfully. 
	        </div>
	  <?php }elseif(isset($response) && $response->status != 200) { ?>
			<div class="alert alert-danger fade in">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Error!</strong>&nbsp; Cannot Add a Destination. Please try again. 
	        </div>
	 <?php } 
	 }
	 ?>
  	<form class="form-inline" method = 'post' name='form1'>
  		<?php if($error) { ?> 
	    	<div class="alert alert-danger fade in">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Error!</strong>&nbsp;<?php echo $error; ?> 
	        </div>
		<?php } ?>
	    <div class="form-group">
	      <label for="email"></label>
	      <input type="text" class="form-control" name="destination" id="destination" placeholder="Enter Destination" required>
				<input type="text" class="form-control" name="country" id="country" placeholder="Enter Country" required>
				<input type="text" class="form-control" name="continent" id="continent" placeholder="Enter Continent" required>
				
	    <button type="submit" name='addbtn' class="btn btn-default">Add New Destination</button>
    </form>
   </div>
</div>

</body>
</html>



