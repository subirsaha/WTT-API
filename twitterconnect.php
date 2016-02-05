<?php



 $fname = $_REQUEST["fname"];


$data = array(
		   'address'=>'',
		   'email'=>'',
		   'userName'=>$fname
			);
     $httpRequest = curl_init();
							curl_setopt($httpRequest, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($httpRequest, CURLOPT_HTTPHEADER, array("Content-Type:  application/json"));
							curl_setopt($httpRequest, CURLOPT_POST, 1);
							curl_setopt($httpRequest, CURLOPT_HEADER, 0);
		   			$url = self::remote_url."customer/createCustomer";
   					curl_setopt($httpRequest, CURLOPT_URL, $url);
   					//curl_setopt($httpRequest, CURLOPT_URL, 'http://dookansserver.com:8080/Innovommerce-new/rest/customer/createCustomer');
							curl_setopt($httpRequest, CURLOPT_POSTFIELDS,json_encode($data));
            $returnHeader = curl_exec($httpRequest);
	
						
						
						$jsdata=json_decode($returnHeader);
					
					 // echo "<pre>";
					  // print_r($jsdata);
					  // echo "</pre>";
					  $prof_id=$jsdata['customerProfileId'];
					  //$contactinfo=json_decode($returnHeader);
					  
					  echo $returnHeader.'@@'.$prof_id.'@@'.$jsdata['addressList'][0]['email'].'@@'.$jsdata['addressList'][0]['name'].'@@'.$jsdata['addressList'][0]['address1'].'@@'.$jsdata['addressList'][0]['city'].'@@'.$jsdata['addressList'][0]['state'].'@@'.$jsdata['addressList'][0]['zipcode'].'@@'.$jsdata['addressList'][0]['phone1'];
					  //echo $jsdata['customerProfileId'];

					  // echo "<pre>";

					  // print_r($jsdata);
					  // echo "</pre>";


?>