<?php
$cardtype = $_REQUEST["cardtype"];
$cardname = $_REQUEST["cardname"];
$cardNumber = $_REQUEST["cardNumber"];
$expMonth = $_REQUEST["expMonth"];
$expYear = $_REQUEST["expYear"];
$CVVCode = $_REQUEST["CVVCode"];
$customerProfileId = $_REQUEST["profileId"];
$string = $_REQUEST["checkout_string"];
$explode = explode("=====", $string);

// echo "<pre>";
// print_r($explode);
// echo "</pre>";







 $data = array('id'=>'0','cardName'=>$cardname,'customerProfileId'=>$customerProfileId,'creditCardNum'=>$cardNumber,'cardtype'=>$cardtype,'cardcode'=>$CVVCode,'deleted'=>0,'expDate'=>$expYear.'-'.$expMonth,'lastFour'=>substr($cardNumber, -4),
		'returnCode'=>0);

// echo "<pre>";
// print_r($data);
// echo "</pre>";

$httpRequest = curl_init();
    curl_setopt($httpRequest, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($httpRequest, CURLOPT_HTTPHEADER, array("Content-Type:  application/json"));
    curl_setopt($httpRequest, CURLOPT_POST, 1);
    curl_setopt($httpRequest, CURLOPT_HEADER, 1);
    $url = "https://dookansserver.com/Innovommerce/rest/customer/createCustomerPaymentProfile";
    curl_setopt($httpRequest, CURLOPT_URL, $url);
    //curl_setopt($httpRequest, CURLOPT_URL, 'http://dookansserver.com:8080/Innovommerce-new/rest/customer/createCustomerPaymentProfile');
    curl_setopt($httpRequest, CURLOPT_POSTFIELDS,json_encode($data));
   $returnHeader1 = curl_exec($httpRequest);
   //curl_close($httpRequest);

   //echo $returnHeader1;
   $explode_string=explode("{", $returnHeader1);

  // echo $explode_string['1'];

   $json_data='{'.$explode_string['1'];
   $json_decode=json_decode($json_data,true);

   $card_type=$json_decode["cardtype"];
   $card_lastfour=$json_decode["lastFour"];
   $exp_date=$json_decode["expDate"];

   // echo "<pre>";
   // print_r($json_decode);
   // echo "</pre>";





$html = '<div class="inner-content">
                    <div class="contactInfoHeader">     
                        <div class="headerTopBox">
                            <h2><a class="ui-link" href="#">Benny’s Crepe Cafe</a></h2>
                            <span class="icon-block location">Rings Fountain at Milk Street</span>
                            <div class="inline-icon">
                                <span class="icon-block time"><b>10am - 6:30pm</b></span>
                                <span class="icon-block order right"><b>Pickup: </b> 35 min</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="fullWidth">
                        <table data-role="table" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe table-stroke ui-responsive" data-column-btn-theme="b" style="width:100%">
                            <thead>
                                <tr class="ui-bar-d ui-bar-blue">
                                    <th>QTY</th>
                                    <th>ITEM</th>
                                    <th>PRICE</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>';

                                $tot_price=0;
                                for ($i=0; $i < (count($explode)-1); $i++) { 

                                $expld = explode("##", $explode[$i]);

                                $html .= '<tr>
                                    <th>'.$expld[0].'</th>
                                    <td>
                                    <p class="split-text">
                                        '.$expld[3].' <small> + '.$expld[1].'</small>
                                    </p></td>
                                    <td>$'.$expld[4].'</td>
                                    <td><a href="#" class="delete"></a></td>
                                    </tr>';

                                    $tot_price=$tot_price+$expld[4];
                                # code...
                            }

                            $total=$tot_price+1.25;
                            $html .= '</tbody>


                        </table>
                    </div>
                    <div class="total">
                        <p>
                            <span class="left-label"><b>Subtotal:</b></span>
                            <span class="right">$'.$tot_price.'</span>
                        </p>
                        <p>
                            <span class="left-label"><b>Tax:</b></span>
                            <span class="right">$1.25</span>
                        </p>
                        <p>
                            <span class="left-label"><b>Tip:</b></span>
                            <span class="right"><input type="text" data-role="none" class="tipBox"/></span>
                        </p>
                        <p style="font-size: 15px;">
                            <span class="left-label"><b>Total:</b></span>
                            <span class="right" style="font-size: 15px;"><b>$'.$total.'</b></span>
                        </p>
                        
                    </div>

                    <div class="listGroup">
                        <div class="bar bar-default">
                            <a href="#newAddress" class="ui-link">Add Contact Information</a>
                        </div>
                        <div class="bar bar-default">
                           <a class="addressBar" href="#paymentMethod">
                                <p>'.$card_type.': **** **** **** '.$card_lastfour.'</p>
                                <p>Exp: '.$exp_date.'</p>
                            </a>
                        </div>
                        <div class="bar bar-default">
                            <a href="#pickUp" class="ui-link">Change Pickup Time</a>
                        </div>
                        <div class="bar bar-default">
                            <a href="#specialInstructions" class="ui-link">Special Instructions <small>(Additional charges may apply)</small></a>
                        </div>
                    </div>
                                        
                </div>';

                echo $html;


    //curl_close($httpRequest);

?>