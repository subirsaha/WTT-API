<?php



$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];
$email = $_REQUEST["email"];

if($lname!="")
{
	$final_name=$fname.' '.$lname;
}
else
{
	$final_name=$fname;
}

// echo $final_name;

// echo $email;


 $data = array('address'=>'','email'=>$email,'userName'=>$final_name);
		   
		   
		     $httpRequest = curl_init();
							curl_setopt($httpRequest, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($httpRequest, CURLOPT_HTTPHEADER, array("Content-Type:  application/json"));
							curl_setopt($httpRequest, CURLOPT_POST, 1);
							curl_setopt($httpRequest, CURLOPT_HEADER, 0);
		   			$url = "http://whatthetrucks.com:8080/Innovommerce/rest/customer/createCustomer";
   					curl_setopt($httpRequest, CURLOPT_URL, $url);
   					//curl_setopt($httpRequest, CURLOPT_URL, 'http://dookansserver.com:8080/Innovommerce-new/rest/customer/createCustomer');
							curl_setopt($httpRequest, CURLOPT_POSTFIELDS,json_encode($data));
            	$returnHeader = curl_exec($httpRequest);
	
						
						
					  $jsdata=json_decode($returnHeader,true);

					  // echo "<pre>";
					  // print_r($jsdata);
					  // echo "</pre>";
					  $prof_id=$jsdata['customerProfileId'];
					  $fbaddress=$jsdata['address'];
					  $fbemail=$jsdata['email'];
					  $fbuserName=$jsdata['userName'];
					  //$contactinfo=json_decode($returnHeader);
					  $returnHeader;
					  
					  echo $returnHeader.'@@'.$prof_id.'@@'.$jsdata['addressList'][0]['email'].'@@'.$jsdata['addressList'][0]['name'].'@@'.$jsdata['addressList'][0]['address1'].'@@'.$jsdata['addressList'][0]['city'].'@@'.$jsdata['addressList'][0]['state'].'@@'.$jsdata['addressList'][0]['zipcode'].'@@'.$jsdata['addressList'][0]['phone1'].'@@'.$fbaddress.'@@'.$fbemail.'@@'.$fbuserName;
					  //echo $jsdata['customerProfileId'];

					  // echo "<pre>";

					  // print_r($jsdata);
					  // echo "</pre>";

					

?>