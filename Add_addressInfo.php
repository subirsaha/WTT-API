<?php
$Name = $_REQUEST["Name"];
$Address = $_REQUEST["Address"];
$City = $_REQUEST["City"];
$State = $_REQUEST["State"];
$ZIP = $_REQUEST["ZIP"];
$Mobile = $_REQUEST["Mobile"];
$Email = $_REQUEST["Email"];
$customerProfileId = $_REQUEST["profileId"];
$string = $_REQUEST["checkout_string"];
$explode = explode("=====", $string);



$Email1 = $_REQUEST["Email1"];
$Name1 = $_REQUEST["Name1"];
$Address1 = $_REQUEST["Address1"];
$City1 = $_REQUEST["City1"];
$State1 = $_REQUEST["State1"];
$Zipcode1 = $_REQUEST["Zipcode1"];
$Phone1 = $_REQUEST["Phone1"];

$name_explode=explode(" ",$Name);

$data = array
		(
		'customerProfileId'=>$customerProfileId,
		'name'=>$name_explode[0].' '.$name_explode[1],
		'address1'=>$Address,
		'email'=>$Email,
		'city'=>$City,
		'state'=>$State,
		'zipcode'=>$ZIP,
		'phone1'=>$Mobile		
		);

// echo "<pre>";
// print_r($data);
// echo "</pre>";
$httpRequest = curl_init();
					curl_setopt($httpRequest, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($httpRequest, CURLOPT_HTTPHEADER, array("Content-Type:  application/json"));
					curl_setopt($httpRequest, CURLOPT_POST, 1);
					curl_setopt($httpRequest, CURLOPT_HEADER, 0);
				    $url = "http://whatthetrucks.com:8080/Innovommerce/rest/customer/createCustomerAddressProfile";
    				curl_setopt($httpRequest, CURLOPT_URL, $url);
    				//curl_setopt($httpRequest, CURLOPT_URL, 'http://dookansserver.com:8080/Innovommerce-new/rest/customer/createCustomerAddressProfile');

					curl_setopt($httpRequest, CURLOPT_POSTFIELDS,json_encode($data));
					$returnHeader = curl_exec($httpRequest);

					$json_decode=json_decode($returnHeader,true);

					// echo "<pre>";
					// print_r($json_decode);
					// echo "</pre>";

					echo $returnHeader;

					
?>