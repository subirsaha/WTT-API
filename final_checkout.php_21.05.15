<?php
date_default_timezone_set('America/New_York'); 
$profileId = $_REQUEST["profileId"];
$busId = $_REQUEST["busId"];
$total = $_REQUEST["total"];
$product_title = $_REQUEST["product_title"];
$delivery_charge = $_REQUEST["delivery_charge"];
$delivery_time = $_REQUEST["delivery_time"];
$min_order_amount = $_REQUEST["min_order_amount"];
$location = $_REQUEST["location"];
$location_id = $_REQUEST["location_id"];
$showtime = $_REQUEST["showtime"];
$taxes = $_REQUEST["taxes"];
$pickup_time = $_REQUEST["pickup_time"];
$string = $_REQUEST["string"];
$finalchoice_string = $_REQUEST["finalchoice_string"];

$stringarr=explode("=====", $string);




$emailId = $_REQUEST["emailId"];
$paymentProfId = $_REQUEST["paymentProfId"];
$paymentInfo = $_REQUEST["fianlpInfo"];
$finalcardtype = $_REQUEST["finalcardtype"];
$address_id=$_REQUEST["address_id"];
$phone1_final=$_REQUEST["phone1_final"];
$comment=$_REQUEST["comment"];

if($pickup_time=="undefined")
{
	$pickup_time=date("g:i a");
}
//echo $pickup_time;
if($comment=="undefined")
{
	$commentnew='';
}
else
{
	$commentnew=$comment;
}
//echo 'commentnew - '.$commentnew;

//$string = $_REQUEST["string"];
$explode = explode("=====", $string);


// for ($i=0; $i < (count($explode)-1); $i++) { 

// 	$expld = explode("##", $explode[$i]);
// 		echo "<pre>";

// 		print_r($explode);

// 		echo "</pre>";
// }
//Extras:Extra Cheese,Extra Meat,Bread:Toasted Sub,Sauce:BBQ,Choice:Fries,:,




// echo "<pre>";
// print_r($explode);
// echo "</pre>";

$oilist=array();

//echo ""



$choice_name_price=explode('@@',$finalchoice_string);

// echo "<pre>";

// print_r($choice_name_price);

// echo "</pre>";
 if(is_array($choice_name_price))
 {
	foreach($choice_name_price as $id)
	{
	       $choice_name_id=explode('^',$id);
	       $choice_name[]=$choice_name_id[0];
	       $choice_id[]=$choice_name_id[1];
	       //$option[]=$choice_name_id[2];
	       $option[$choice_name_id[2]]=array();
	       array_push($option[$choice_name_id[2]],$choice_name_id[0]);
	
	
	
	}

 }

$tot_price=0;
$choicestr_arr=array();

for($x=0;$x<(count($stringarr)-1);$x++){
	
		$choicestring="";
		$choicestr_arr=array();
		//echo $stringarr[$x].'++++++';
		$innerexpl=explode('##',$stringarr[$x]);
		//echo "element".$x." - ".count($innerexpl);
		//echo $innerexpl[7].'++++++++';
		$tot_price=$tot_price+$innerexpl[5];
		$realstr=$innerexpl[7];
		$realstrexplode=explode('@@',$realstr);
		$commentnewstr=$realstrexplode[1];
		$commentnewstrexpl=explode('p$$$',$commentnewstr);
		$commentnew=$commentnewstrexpl[1];
		 if($commentnew=="undefined"){
		 	$commentnew="";
		 }
		 //echo 'commentnew - '.$commentnew.'====';
		 //echo 'choicesstr - '.$choicesstr=$realstrexplode[0].'+++++++';
		 $choicesstr=$realstrexplode[0];
		 //echo $choicesstr.'+++++++++';
		 if($choicesstr!='blank'){
		 	$innserschoicearr=explode('~~~~',$choicesstr);
		 	for($j=0;$j<count($innserschoicearr);$j++){
		 		$strvalarr=explode('^',$innserschoicearr[$j]);
		 		$choicestr_arr[]=$strvalarr[2].":".$strvalarr[4];
		 	}
		 	 $choicestring=implode(',', $choicestr_arr);
		 }
		 //echo $choicestring.'++++++';
		 //echo $innerexpl[6].'*********';
		 $oilist[$x]=array('itemid'=>$innerexpl[6],
        //'choicesName'=>implode(',',$choice_name),
		'choicesName' => $choicestring,

		'orderitemPrice'=>number_format($innerexpl[5],2,'.',''),
		'choicesId'=>"",
		'finalprice'=>number_format($innerexpl[5],2,'.',''),
		'comments'=>$commentnew,
		'quantity'=>$innerexpl[0],
		'choiceprice'=>0,
		'itemname'=>$innerexpl[4],
		'status'=>'C');
	
}

// echo '<pre>';
// print_r($oilist);
// echo '</pre>';

$data = array
		(
		'deviceOrderId'=>1,
		'customerProfileId'=>$profileId,
		'contactInfo'=>ltrim($_REQUEST['name_final'],"'").','.$_REQUEST['addr_final'].','.$_REQUEST['city_final'].','.$_REQUEST['state_final'].','.$_REQUEST['zipcode_final'].','.$address_id.','.$_REQUEST['email_final'].','.rtrim($phone1_final,"'"),
		'tandcversion'=>1,
		'pickupTime'=>$pickup_time,
		'taxAmount'=>number_format((($tot_price * $taxes)/100),2),
		'businessId'=>$busId,
		'email'=>$_REQUEST['email_final'],
		'tip'=>number_format($_REQUEST['tip_amt'],2,'.',''),
		'phone'=>'8765456787',
		'totalprice'=>number_format($tot_price,2),
		'customerProfilePaymentId'=>$paymentProfId,
		'paymentInfo'=>$paymentInfo,
		'finalprice'=>number_format((float)$tot_price+(float)(($tot_price * $taxes)/100)+(float)$_REQUEST['tip_amt'],2),
		'deliveryCharge'=>$delivery_charge,
		'paymentMethod'=>'CARD, Already Paid',
		'locationId'=>$location_id,
		//'locationId'=>$this->session->userdata('location_id'),
		'promotionValue'=>0,
		'deliveryMethod'=>'PICKUP',
		'status'=>'P',
		'oilist'=>$oilist,
							
		); 

// for ($i=0; $i < (count($explode)-1); $i++) 
// { 
// 	$bread_name="";
// 	$choice_name="";
// 	$sauce_name="";
// 	$protein_name="";
// 	$extras_name="";
// 	$toppings_name="";
// 	$condiments_name="";
// 	 $expld = explode("##", $explode[$i]);

// 	 // echo "<pre>";
// 	 // print_r($expld);
// 	 // echo "</pre>";

// 	 $tot_price=$tot_price+$expld[5];
// 	 //echo 'mystring------ '.$expld[7];
// 	 $explode_new=explode("@@",$expld[7]);
// 	 //echo '<br/>length - '.count($explode_new);
// 	 //echo 'special inst - '.$explode_new[5];
// 	 $commentnew=$explode_new[7];
// 	 if($commentnew=="undefined"){
// 	 	$commentnew="";
// 	 }
// 	 //$commentnew="hhhhhhhh";
// 	 $choicestring="";
// 	 for($j=0;$j<count($explode_new);$j++)
// 	 {

// 	 	$explode_new1=explode("^",$explode_new[$j]);

// 	 	if($explode_new1[2]=="Bread")
// 	 	{
// 	 		$bread_name=$explode_new1[4];
// 	 	}
// 	 	if($explode_new1[2]=="Choice")
// 	 	{
// 	 		$choice_name=$explode_new1[4];
// 	 	}
// 	 	if($explode_new1[2]=="Sauce")
// 	 	{
// 	 		$sauce_name=$explode_new1[4];
// 	 	}
// 	 	if($explode_new1[2]=="Protein")
// 	 	{
// 	 		$protein_name=$explode_new1[4];
// 	 	}
// 	 	if($explode_new1[2]=="extras")
// 	 	{
// 	 		$extras_name=$explode_new1[4];
// 	 	}
// 	 	if($explode_new1[2]=="toppings")
// 	 	{
// 	 		$toppings_name=$explode_new1[4];
// 	 	}
// 	 	if($explode_new1[2]=="condiments")
// 	 	{
// 	 		$condiments_name=$explode_new1[4];
// 	 	}

	 	

	 	

// 	 	// if(!empty($explode_new1))
// 	 	// {
	 		
	 		
// 	 		//echo 'hii'.$choicestring.'<br/>';

	 	

// 	 	// echo "<pre>";
// 		 // print_r($explode_new1);
// 		 // echo "</pre>";
// 	 }

	 

// 	 if($extras_name!=""){
// 	 	$choicestr_arr[]="Extras:".$extras_name;
// 	 }
// 	 if($bread_name!=""){
// 	 	$choicestr_arr[]="Bread:".$bread_name;
// 	 }
// 	 if($sauce_name!=""){
// 	 	$choicestr_arr[]="Sauce:".$sauce_name;
// 	 }
// 	 if($protein_name!=""){
// 	 	$choicestr_arr[]="Protien:".$protein_name;
// 	 }
// 	 if($choice_name!=""){
// 	 	$choicestr_arr[]="Choice:".$choice_name;
// 	 }
// 	 if($toppings_name!=""){
// 	 	$choicestr_arr[]="Toppings:".$toppings_name;
// 	 }
// 	 if($condiments_name!=""){
// 	 	$choicestr_arr[]="Condiments:".$condiments_name;
// 	 }
// 	 $choicestring=implode(',', $choicestr_arr);

// 	 //echo 'hi--'.$choicestring.'<br/>';
	

	 

// 	 //if($explode_new==)

// 	 $oilist[$i]=array('itemid'=>$expld[6],
//         //'choicesName'=>implode(',',$choice_name),
// 		'choicesName' => $choicestring,

// 		'orderitemPrice'=>number_format($expld[5],2,'.',''),
// 		'choicesId'=>"",
// 		'finalprice'=>number_format($expld[5],2,'.',''),
// 		'comments'=>$commentnew,
// 		'quantity'=>$expld[0],
// 		'choiceprice'=>0,
// 		'itemname'=>$expld[4],
// 		'status'=>'C');

// 		// echo "<pre>";
// 		// 	 print_r($oilist[$i]);
// 		// 	 echo "</pre>";
			
// 		$choicestring=""; 	
// 		$business_id[$i]=$busId;
// 		$delvrycharge[$i]=$delivery_charge;
// 		$pickupTime[$i]=$pickup_time;
// 		$taxAmount[$i]=$taxes ;
// 		$prdcost[$i]=$expld[5];
		

	
// }

// //echo $profileId.'@@'.$busId.'@@'.$total.'@@'.$product_title.'@@'.$delivery_charge.'@@'.$delivery_time.'@@'.$min_order_amount.'@@'.$location.'@@'.$location_id.'@@'.$taxes.'@@'.$string.'@@'.$emailId.'@@'.$paymentProfId;



 


// echo "<pre>";
// 	print_r($data);
// 	echo "<pre/>";

					$httpRequest = curl_init();
					curl_setopt($httpRequest, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($httpRequest, CURLOPT_HTTPHEADER, array("Content-Type:  application/json"));
					curl_setopt($httpRequest, CURLOPT_POST, 1);
					curl_setopt($httpRequest, CURLOPT_HEADER, 0);
    				$url = "https://whatthetrucks.com/Innovommerce/rest/ordercreate/order";
    				curl_setopt($httpRequest, CURLOPT_URL, $url);
//    				curl_setopt($httpRequest, CURLOPT_URL, 'http://dookansserver.com:8080/Innovommerce-new/rest/ordercreate/order');
					curl_setopt($httpRequest, CURLOPT_POSTFIELDS,json_encode($data));
					$returnHeader = curl_exec($httpRequest);
					//echo $returnHeader;
					$orderarray=json_decode($returnHeader,true);
					//echo $orderarray['id'];

					$html ='<div class="inner-content">
					<div class="contactInfoHeader">		
						<div class="headerTopBox">
							<h2><a class="ui-link" href="#"><strong>'.$product_title.'</strong></a></h2>
							<span class="location">'.$location.'</span>
							<div class="inline-icon">
								<span><b>Order: </b>'.$orderarray['id'].'</span>
								<span class="right"><b>Pickup: </b> '.$pickup_time.'</span>
							</div>
						</div>
					</div>
					
					<div class="fullWidth">
						<table data-role="table" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe table-stroke ui-responsive ui-table" data-column-btn-theme="b" style="width:100%">
							<thead>
								<tr class="ui-bar-d ui-bar-blue">
									<th><center>QTY</center></th>
									<th style="width: 160px;">ITEM</th>
									<th style="text-align:right;padding-right: 20px;">PRICE</th>
								</tr>
							</thead>
							<tbody>';
							$tot_price=0;
							for ($i=0; $i < (count($explode)-1); $i++) { 

								$expld = explode("##", $explode[$i]);

								//echo $expld[5];

								$html .= '<tr>
									<td><center>'.$expld[0].'</center></td>
									<td>
									<p class="split-text">
										'.$expld[4].' <small>'; if($string!="" && $string!="undefined" && $expld[1]!="undefined" && $expld[1]!=""){ $html .=''; }$html .=$expld[1]; $html .='</small>
									</p></td>';
									
									$pricestr='';
									$price=0;
									if (strpos($expld[5], '$') !== false)
									{
									$html.='<td style="text-align:right;padding-right: 20px;">'.$expld[5].'</td>';
									$pricestr=str_replace("$","",$expld[5]);
									$price=(float)$pricestr;
									}else{
									$html.='<td style="text-align:right;padding-right: 20px;">$'.$expld[5].'</td>';
									$price=(float)$expld[5];
									}
									
									

									$tot_price=$tot_price+$price;

									$final_tax=($tot_price * $taxes)/100;

							}
							$tippricestr='';
							$tipprice=0;
							if (strpos($_REQUEST['tip_amt'], '$') !== false)
							{
							       $tippricestr=str_replace("$","",$_REQUEST['tip_amt']);
							       $tipprice=(float)$tippricestr;
							}else{
							       $tipprice=(float)$_REQUEST['tip_amt'];
							}

							$final_price=$tot_price+$final_tax+$tipprice;
							$html .='</tbody>
						</table>
					</div>
					<div class="total">
						<p>
							<span class="left-label"><b>Subtotal:</b></span>
							<span class="right">$'.number_format($tot_price,2).'</span>
						</p>
						<p>
							<span class="left-label"><b>Tip:</b></span>';
							
							if (strpos($_REQUEST['tip_amt'], '$') !== false)
							{
							$html.='<span class="right">'.number_format($_REQUEST['tip_amt'],2).'</span>';
							
							}else{
							$html.='<span class="right">$'.number_format($_REQUEST['tip_amt'],2).'</span>';
							}
							
						$html.='</p>
						<p>
							<span class="left-label"><b>Tax:</b></span>
							<span class="right">$'.number_format($final_tax,2).'</span>
						</p>
						
						<p style="font-size: 18px;">
							<span class="left-label"><b>Total:</b></span>
							<span class="right" style="font-size: 18px;"><b>$'.number_format($final_price,2).'</b></span>
						</p>
						
					</div>
					
					<div class="listGroup confrm_class">
						<div class="bar bar-default">
							
							<a class="addressBar ui-link">
								<h2><b>'.ltrim($_REQUEST['name_final'],"'").'</b></h2>
								<p>'.$_REQUEST['email_final'].'</p>
								<p>'.$_REQUEST['addr_final'].'</p>
								<p>'.$_REQUEST['city_final'].', '.$_REQUEST['state_final'].' '.$_REQUEST['zipcode_final'].'<br/>'.rtrim ($_REQUEST['phone1_final'], "'").'</p>
							</a>
							
						</div>
						<div class="bar bar-default">
							<a class="addressBar ui-link">
								<p>'.$finalcardtype.': **** **** **** '.$paymentInfo.'</p>
								<p>Exp: '.$_REQUEST['expdate'].'</p>
							</a>
							
						</div>

						
						
					</div>
										
				</div>';

echo $html;

?>