<?php
	$data = array('address'=>'','email'=>'shwetaa.chakroborti@esolzmail.com','userName'=>'Shwetaa Chakroborti');
		   
		   
		     $httpRequest = curl_init();
							curl_setopt($httpRequest, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($httpRequest, CURLOPT_HTTPHEADER, array("Content-Type:  application/json"));
							curl_setopt($httpRequest, CURLOPT_POST, 1);
							curl_setopt($httpRequest, CURLOPT_HEADER, 0);
		   			$url = "http://dookansserver.com/Innovommerce/rest/customer/createCustomer";
   					curl_setopt($httpRequest, CURLOPT_URL, $url);
   					//curl_setopt($httpRequest, CURLOPT_URL, 'http://dookansserver.com:8080/Innovommerce-new/rest/customer/createCustomer');
							curl_setopt($httpRequest, CURLOPT_POSTFIELDS,json_encode($data));
            	$returnHeader = curl_exec($httpRequest);
            	echo $returnHeader;
?>