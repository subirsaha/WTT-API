<?php

$data = $_REQUEST['del_id'];
		if ($data != "") {
			$httpRequest = curl_init ();
			curl_setopt ( $httpRequest, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt ( $httpRequest, CURLOPT_HTTPHEADER, array (
					"Content-Type:  application/json" 
			) );
			curl_setopt ( $httpRequest, CURLOPT_POST, 1 );
			curl_setopt ( $httpRequest, CURLOPT_HEADER, 0 );
			$url = "http://whatthetrucks.com:8080/Innovommerce/rest/customer/deleteCustomerPayment";
			curl_setopt ( $httpRequest, CURLOPT_URL, $url );
			curl_setopt ( $httpRequest, CURLOPT_POSTFIELDS, $data );
			//print_r("Step 1--".json_encode($data));
			//exit;
			echo $returnHeader = curl_exec ( $httpRequest );
			}

?>