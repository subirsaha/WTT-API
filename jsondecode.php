<?php
$ar=array( 'deviceorderld' => '1','customerProfileId' =>
'181898397','contactlnfo' => "eco
space,kolkata,jones,Indiana,12345.111752,swarup.sengu-
56-7899", 'tandcversion' => '1', 'pickupTime' => "1:30 am",
'taxAmount' => "0.94", 'businessld' => '10003', 'email' =>
"swarup.sengupta@esolzmail.com",'tip' => '0.00', 'phone'
=> '8765456787','totalprice' => '13.45',
'customerProﬁlePaymentId' => '174992141',
'paymentlnfo' => '1111', 'finalprice' => '14.39',
'deliverycharge' => '0.0' ,'paymentMethod' => "CARD,
Iready Paid", 'locationld' => '10148', 'promotionvalue' => 0,
'deliveryMethod' => "PICKUP", 'status' => "P",'oilist' => array('0' => array( 'itemid' => '3622', 'choicesName' =>
"Breadzwhole
heat,Sauce:Marinara,Choice:Chicken,Extras:Extra Meat",

'orderitemPrice' => '13.45','choicesld' => "12599,,,",

'finalprice' => '13.45', 'comments' => 'Make it spicy',
'quantity' => '1','choiceprice' => '0','itemname'=> "The
Baddest",'status' => "C" ) ));
$data=json_encode($ar);
echo "<pre>";
echo $data;
?>