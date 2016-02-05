<?php

$lat = $_REQUEST["lat"];
$long = $_REQUEST["longt"];
$busid = $_REQUEST["busid"];
$rp = $_REQUEST["rp"];

$json = file_get_contents("http://dookansserver.com/Innovommerce/rest/businessinfolist/listfoodtrucks?LATLONG=".$lat.",".$long."&name=&sortBy=distance"); // this WILL do an http request for you
$data = json_decode($json, true);

$json2 = file_get_contents("http://dookansserver.com/Innovommerce/rest/businessinfolist/itemswithchoiceft?BUSINESSID=".$busid); // this WILL do an http request for you
$data2 = json_decode($json2, true);

$counter=count($data['businessInfo']);
$html='';
for($i=0;$i<$counter;$i++)
{

	// echo $title= $data['businessInfo'][$i]['businessName'].'/////........////.....////';

	$add = "";
	if($data['businessInfo'][$i]['locations'][0]['address1'] == ""){

		$add = "Comm Ave & St. Mary's St";
	}else{

		$add = $data['businessInfo'][$i]['locations'][0]['address1'];
	}
	$time_in_12_hour_format = date("g:i a", strtotime($data['businessInfo'][$i]['locations'][0]['locationHours'][0]['endTime']));
	$time_in_12_hour_format_start = date("g:i a", strtotime($data['businessInfo'][$i]['locations'][0]['locationHours'][0]['startTime']));




		if($data['businessInfo'][$i]['id'] == $_REQUEST['id']){


		$html .='<div class="bar">
						<div class="search-result-box">
							<h3><a href="#truckDetails" class="ui-link">'.$data['businessInfo'][$i]['businessName'].'</a></h3>
							<div class="inline-box">
								<span>Pickup: '.$data['businessInfo'][$i]['pickupTime'].'min</span>
								<span>$'.$data['businessInfo'][$i]['minOrderAmt'].' Minimum</span>
								<span>'.$data['businessInfo'][$i]['businessAddress']['phone'].' </span>
							</div>
							<div class="right-small-box">
								<span class="big-calender"></span>
							</div>
						</div>
						<select name="select-choice-1" id="select-choice-1" data-mini="true">';

														$counter2=count($data['businessInfo'][$i]['locations']);
									
									for($j=0;$j<$counter2;$j++)
										{
											$time_in_12_hour_format_txt = date("g:i a", strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours']['endTime']));
											$time_in_12_hour_format_start_txt2 = date("g:i a", strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours']['startTime']));
											$html .='<option value="1">'.$data['businessInfo'][$i]['locations'][$j]['address1'].',  '.$time_in_12_hour_format_start_txt2.' - '.$time_in_12_hour_format_txt.'</option>';
										}

						   
						$html .='</select>
						<div class="collapsed-schedule">
							<div class="schedule-box">
								<h3>Monday, November 17</h3>
								<div class="scroll-box">
									<ul class="list-date">
										';

									$counter=count($data['businessInfo'][$i]['locations']);
									
									for($j=0;$j<$counter;$j++)
										{
											$time_in_12_hour_format = date("g:i a", strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours']['endTime']));
											$time_in_12_hour_format_start = date("g:i a", strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours']['startTime']));
											$html .='<li>
											<span class="location-icon"></span>
											<h4>'.$data['businessInfo'][$i]['locations'][$j]['locationHours']['day'].' <span>'.$time_in_12_hour_format_start.' - '.$time_in_12_hour_format.'</span></h4>
											<p>Lunch at Harvard Yard</p>
										</li>';
										}
										
										
								$html .='
									</ul>
								</div>
							</div>
						</div>
					</div>
					
					<div class="list-truck-price">';

					 $counterf=count($data2['locations'][0]['items']);
									
									for($j=0;$j<$counterf;$j++)
										{

											//echo $item_id=$data2['locations'][0]['items']['id'];

					if($rp == "yes"){


								$html .= '<div class="bar bar-default">
							<div class="search-result-box">
								<h4><a href="#" class="ui-link" onclick="savename(\'' . $data2['locations'][0]['items'][$j]['itemname'] . '\',\'' . $data2['locations'][0]['items'][$j]['itemprice'] . '\',\'' . $data2['locations'][0]['items'][$j]['id'] . '\',\'' . $data2['locations'][0]['items'][$j]['choiceLimit'] . '\',\'' . $data2['locations'][0]['items'][$j]['itemdesc'] . '\',\'' . $rp . '\');">'.$data2['locations'][0]['items'][$j]['itemname'].'</a></h4>
								<p>'.$data2['locations'][0]['items'][$j]['itemdesc'].'</p>
								<div class="right-small-box">
									<h5>$'.$data2['locations'][0]['items'][$j]['itemprice'].'+</h5>
								</div>
							</div>
						</div>
						';

					}else{

$html .= '<div class="bar bar-default">
							<div class="search-result-box">
								<h4><a href="#truckdetailsPopupNot" class="ui-link" data-rel="popup" data-position-to="window" data-transition="pop">Smoked Salmon Crepe</a></h4>
								<p>'.$data2['locations'][0]['items'][$j]['itemdesc'].'</p>
								<div class="right-small-box">
									<h5>$'.$data2['locations'][0]['items'][$j]['itemprice'].'+</h5>
								</div>
							</div>
						</div>
						';
						
					}							


			
						}
						
					$html .='</div>


					';

					}

}
echo $html;
?>