<?php

$lat = $_REQUEST["lat"];
$long = $_REQUEST["longt"];
$keywrd = $_REQUEST["keywrd"];
$json = file_get_contents("http://dookansserver.com/Innovommerce/rest/businessinfolist/listfoodtrucks?LATLONG=".$lat.",".$long."&name=".$keywrd.""); // this WILL do an http request for you
$data = json_decode($json, true);

//echo 'http://dookansserver.com/Innovommerce/rest/businessinfolist/listfoodtrucks?LATLONG='$_REQUEST['lat']','$_REQUEST['longt']'&name=&sortBy=distance'

$counter=count($data['businessInfo']);
$html='';
for($i=0;$i<$counter;$i++)
{

	// echo $title= $data['businessInfo'][$i]['businessName'].'/////........////.....////';

	$cnty = count($data['businessInfo'][$i]['locations']);

	$add = "";
	if($data['businessInfo'][$i]['locations'][0]['address1'] == ""){

		$add = "Comm Ave & St. Mary's St";
	}else{

		$add = $data['businessInfo'][$i]['locations'][$cnty-1]['address1'];
		$add_locid = $data['businessInfo'][$i]['locations'][$cnty-1]['id'];
	}
	$time_in_12_hour_format = date("g:i a", strtotime($data['businessInfo'][$i]['locations'][0]['locationHours'][0]['endTime']));
	$time_in_12_hour_format_start = date("g:i a", strtotime($data['businessInfo'][$i]['locations'][0]['locationHours'][0]['startTime']));
	$busId = $data['businessInfo'][$i]['locations'][0]['businessinfo_id'];
 $rp="";
	if($data['businessInfo'][$i]['activeWithDookans']== 0){
								

									$rp="yes";
								}else{

										$rp="no";
								}

	$html .= '<div class="bar bar-default">
						<div class="search-result-box" >
							<h3><a  onClick="gotoDetailsRes(\'' . $data['businessInfo'][$i]['id'] . '\',\'' . $lat . '\',\'' . $long . '\',\'' . $busId . '\',\'' . $data['businessInfo'][$i]['businessName'] . '\',\'' . $add . '\',\'' . $time_in_12_hour_format_start.' - '.$time_in_12_hour_format . '\',\'' . $data['businessInfo'][$i]['pickupTime'] . '\',\'' . $data['businessInfo'][$i]['minOrderAmt'] . '\',\'' . $data['businessInfo'][$i]['deliveryCharge'] . '\',\'' . $data['businessInfo'][$i]['deliveryMethod'] . '\',\'' . $data['businessInfo'][$i]['deliveryTime'] . '\',\'' . $data['businessInfo'][$i]['minDeliveryOrd'] . '\',\'' . $data['businessInfo'][$i]['locations'][0]['id'] . '\',\'' . $data['businessInfo'][$i]['taxRate'] . '\',\'' . $data['businessInfo'][$i]['tandcversion'] . '\',\'' . $data['businessInfo'][$i]['tandc'] . '\',\'' . $rp . '\',\'' . $add_locid . '\')" >'.$data['businessInfo'][$i]['businessName'].'</a></h3>
							<span class="icon-block location">'.$add.'</span>
							<div class="inline-icon">
								<span class="icon-block time">'.$time_in_12_hour_format_start.' - '.$time_in_12_hour_format.'</span>';
								if($data['businessInfo'][$i]['activeWithDookans']== 0){
								$html .='<span class="icon-block order">WTT Orders</span>';

								}else{

										$html .='<span class="icon-block menu-only">View Menu only</span>';
								}
							$html .='</div>
							<div class="right-small-box">
								<h6>'.$data['businessInfo'][$i]['distance'].'mi</h6>
								<span class="big-calender"></span>
							</div>
						</div>
						<div class="collapsed-schedule">
							<div class="schedule-box">
								<h3>Monday, November 17</h3>
								<div class="scroll-box">
									<ul class="list-date">';

									$counter2=count($data['businessInfo'][$i]['locations']);
									
									for($j=0;$j<$counter2;$j++)
										{
											$time_in_12_hour_format_txt = date("g:i a", strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours']['endTime']));
											$time_in_12_hour_format_start_txt2 = date("g:i a", strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours']['startTime']));
											$html .='<li>
											<span class="location-icon"></span>
											<h4>'.$data['businessInfo'][$i]['locations'][$j]['locationHours']['day'].' <span>'.$time_in_12_hour_format_start_txt2.' - '.$time_in_12_hour_format_txt.'</span></h4>
											<p>Lunch at Harvard Yard</p>
										</li>';
										}
										
										
								$html .='</ul>
								</div>
							</div>
						</div>
					</div>' ;


}
echo $html;
?>