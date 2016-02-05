<?php
date_default_timezone_set('America/New_York');
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

	/////////////////////SHWETAA//////////////////////////
	
	
	
	$current = $data['businessInfo'][$i]['locations'];
	$strt = '';
	     $end ='';
	     $lcttn = '';
	     $dstnce = '';
	     $s=0;
	     //echo '<pre>'; print_r($current);
	     if(is_array($current)){
	     foreach ($current as $crnt) {
		     $day=$crnt['locationHours'];
	     // echo '<pre>';print_r($day);echo '</pre>';
	     if(is_array($day)){
		     foreach ($day as $days) {
			     if($days['day'] == date('l')){
				      $cnt = strlen($days['startTime']);
				      $cnt_new = strlen($days['endTime']);
				       $dth = date('H');
				       $dti = date('i');
				       $dt = date('Hi');
				     if($dt <= $days['endTime'])
				     {
					     if($lcttn == '' && $strt == '' && $end == '' && $dstnce == '')
								     {
					     $lcttn = $crnt['address1'];
					     $strt = $days['startTime'];
					     $end = $days['endTime'];
					     $dstnce = $crnt['distance'];
								     }
								     else{
									     if($strt >= $days['startTime'])
										     {
									     $lcttn = $crnt['address1'];
									     $strt = $days['startTime'];
									     $end = $days['endTime'];
									     $dstnce = $crnt['distance'];
									     }
							     }
				     }
				     $s++;
				     
			     }
			     
			     
		     }
		     }
			     else {
				     
			     if($day['day'] == date('l')){
				      $cnt = strlen($day['startTime']);
				      $cnt_new = strlen($day['endTime']);
				       $dth = date('H');
				       $dti = date('i');
				       $dt = date('Hi');
				     if($dt <= $day['endTime'])
				     {
					     if($lcttn == '' && $strt == '' && $end == '' && $dstnce == '')
								     {
					     $lcttn = $crnt['address1'];
					     $strt = $day['startTime'];
					     $end = $day['endTime'];
					     $dstnce = $crnt['distance'];
								     }
								     else{
									     if($strt >= $day['startTime'])
										     {
									     $lcttn = $crnt['address1'];
									     $strt = $day['startTime'];
									     $end = $day['endTime'];
									     $dstnce = $crnt['distance'];
									     }
							     }
				     }
				     $s++;
				     
			     }
				     
			     }
	     
	     }
	     }
		     else {
			     $day=$current['locationHours'];
	     //echo '<pre>';print_r($day);
	     if(is_array($day)){
		     foreach ($day as $days) {
			     if($days['day'] == date('l')){
				      $cnt = strlen($days['startTime']);
				      $cnt_new = strlen($days['endTime']);
				       $dth = date('H');
				       $dti = date('i');
				       $dt = date('Hi');
if($dt <= $days['endTime'])
{
if($lcttn == '' && $strt == '' && $end == '' && $dstnce == '')
{
$lcttn = $current['address1'];
$strt = $days['startTime'];
$end = $days['endTime'];
$dstnce = $current['distance'];
}
else{
if($strt >= $days['startTime'])
{
$lcttn = $current['address1'];
$strt = $days['startTime'];
$end = $days['endTime'];
$dstnce = $current['distance'];
}
}
}
$s++;
}
}
}
else {
if($day['day'] == date('l')){
 $cnt = strlen($day['startTime']);
$cnt_new = strlen($day['endTime']);
 $dth = date('H');
 $dti = date('i');
 $dt = date('Hi');
if($dt <= $day['endTime'])
{
if($lcttn == '' && $strt == '' && $end == '' && $dstnce == '')
{
	$lcttn = $current['address1'];
	$strt = $day['startTime'];
	$end = $day['endTime'];
	$dstnce = $current['distance'];
}
else{
if($strt >= $day['startTime'])
{
	$lcttn = $current['address1'];
	$strt = $day['startTime'];
	$end = $day['endTime'];
	$dstnce = $current['distance'];
}
}
		}
		$s++;
		
	}
		
}

}


$cnt=strlen($strt);
					$cnt_new=strlen($end);
									
					$time='';				
				if(substr($strt, 0,$cnt-2) < 12 )
				{
					if($strt != '' && $end != '' && $lcttn != '' && $dstnce != '')
										
					{
					$time= substr($strt, 0,$cnt-2);
						if(substr($strt, $cnt-2,4) != '00')
						{
						$time.= ':'.substr($strt, $cnt-2,4);
						}
					$time.= 'am - ';
					}
				}
				else {
										
						$stm=substr($strt, 0,$cnt-2)-12;
						$time.= $stm;
						if(substr($strt, $cnt-2,4) != '00')
						{
							$time.=':'.substr($strt, $cnt-2,4);
						}
						$time.= 'pm - ';
					}
									
					if(substr($end,0,$cnt_new-2) < 12 )
					{
						if($strt != '' && $end != '' && $lcttn != '' && $dstnce != '')
						{
							$time.= substr($end, 0,$cnt_new-2);
							if(substr($end, $cnt_new-2,4) != '00')
									{
										$time.=':'.substr($end, $cnt_new-2,4);
									}
										$time.= 'am';
						}
					}
					else
					{
						$lstm = substr($end, 0,$cnt_new-2)-12;
						$time.= $lstm;
						if(substr($end, $cnt_new-2,4) != '00')
						{
						$time.= ':'.substr($end, $cnt_new-2,4);
						}
						$time.= 'pm';
					}
					if($cnt == '0' && $cnt_new == '0')
					{
						$time="";
					}
	if($lcttn=='')
	{
		$lcttn= "Closed for the day";
		
	}
	
	
	
	
	
	/////////////////SHWETAA///////////////////////////







	// echo $title= $data['businessInfo'][$i]['businessName'].'/////........////.....////';

	$cnty = count($data['businessInfo'][$i]['locations']);

	$add = "";
	if($data['businessInfo'][$i]['locations'][0]['address1'] == ""){

		$add = "Comm Ave & St. Mary's St";
	}else{

		$add = $data['businessInfo'][$i]['locations'][$cnty-1]['address1'];
		$add_locid = $data['businessInfo'][$i]['locations'][$cnty-1]['id'];
	}
	$time_in_12_hour_format = date("h:i a", strtotime($data['businessInfo'][$i]['locations'][0]['locationHours'][0]['endTime']));
	$time_in_12_hour_format_start = date("h:i a", strtotime($data['businessInfo'][$i]['locations'][0]['locationHours'][0]['startTime']));

	$minutes_endtime=date('i', strtotime($data['businessInfo'][$i]['locations'][0]['locationHours'][0]['endTime']));

	if($minutes_endtime>0)
	{
		$time_in_12_hour_format_new=date("g:ia", strtotime($data['businessInfo'][$i]['locations'][0]['locationHours'][0]['endTime']));
	}
	else
	{
		$time_in_12_hour_format_new=date("ga", strtotime($data['businessInfo'][$i]['locations'][0]['locationHours'][0]['endTime']));
	}

	$minutes_starttime=date('i', strtotime($data['businessInfo'][$i]['locations'][0]['locationHours'][0]['startTime']));

	if($minutes_starttime>0)
	{
		$time_in_12_hour_format_start_new=date("g:ia", strtotime($data['businessInfo'][$i]['locations'][0]['locationHours'][0]['startTime']));
	}
	else
	{
		$time_in_12_hour_format_start_new=date("ga", strtotime($data['businessInfo'][$i]['locations'][0]['locationHours'][0]['startTime']));
	}	


	$busId = $data['businessInfo'][$i]['locations'][0]['businessinfo_id'];
 $rp="";
	if($data['businessInfo'][$i]['activeWithDookans']== 0){
								

									$rp="yes";
								}else{

										$rp="no";
								}

	$html .= '<div class="bar bar-default">
						<div class="search-result-box" >
							<h3><a  onClick="gotoDetailsRes(\'' . $data['businessInfo'][$i]['id'] . '\',\'' . $lat . '\',\'' . $long . '\',\'' . $busId . '\',\'' . $data['businessInfo'][$i]['businessName'] . '\',\'' . $lcttn . '\',\'' . $time . '\',\'' . $data['businessInfo'][$i]['pickupTime'] . '\',\'' . $data['businessInfo'][$i]['minOrderAmt'] . '\',\'' . $data['businessInfo'][$i]['deliveryCharge'] . '\',\'' . $data['businessInfo'][$i]['deliveryMethod'] . '\',\'' . $data['businessInfo'][$i]['deliveryTime'] . '\',\'' . $data['businessInfo'][$i]['minDeliveryOrd'] . '\',\'' . $data['businessInfo'][$i]['locations'][0]['id'] . '\',\'' . $data['businessInfo'][$i]['taxRate'] . '\',\'' . $data['businessInfo'][$i]['tandcversion'] . '\',\'' . $data['businessInfo'][$i]['tandc'] . '\',\'' . $rp . '\',\'' . $add_locid . '\',\'' . $lcttn . '\')" >'.$data['businessInfo'][$i]['businessName'].'</a></h3>
							<span class="icon-block location">'.$lcttn.'</span>
							<div class="inline-icon">';

							if($lcttn=='Closed for the day')
							{
								$html .= '<span class="icon-block time" style="min-width: 60px;">&nbsp;</span>';
							}
							else
							{
								$html .= '<span class="icon-block time">'.$time.'</span>';
							}
																
								if($data['businessInfo'][$i]['activeWithDookans']== 0){
								$html .='<span class="icon-block order">WTT Orders</span>';

								}else{

										$html .='<span class="icon-block menu-only">View Menu only</span>';
								}
							$html .='</div>
							<div class="right-small-box">
								<h6>'.$dstnce; if($lcttn!='Closed for the day'){$html .='mi'; } $html .='</h6>
								<span class="big-calender"></span>
							</div>
						</div>
						<div class="collapsed-schedule">
							<div class="schedule-box">
								
								<div class="scroll-box">
									<ul class="list-date">';

									$counter2=count($data['businessInfo'][$i]['locations']);
									
									for($j=0;$j<$counter2;$j++)
									{

											$newcounter=count($data['businessInfo'][$i]['locations'][$j]['locationHours']);

											for($k=0;$k<$newcounter;$k++)
											{
												$time_in_12_hour_format_txt = date("h:ia", strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours'][$k]['startTime']));
												$time_in_12_hour_format_start_txt2 = date("h:ia", strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours'][$k]['endTime']));

												$minutes_endtime=date('i', strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours'][$k]['endTime']));

												if($minutes_endtime>0)
												{
													$time_in_12_hour_format_new=date("g:ia", strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours'][$k]['endTime']));
												}
												else
												{
													$time_in_12_hour_format_new=date("ga", strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours'][$k]['endTime']));
												}

												$minutes_starttime=date('i', strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours'][$k]['startTime']));

												if($minutes_starttime>0)
												{
													$time_in_12_hour_format_start_new=date("g:ia", strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours'][$k]['startTime']));
												}
												else
												{
													$time_in_12_hour_format_start_new=date("ga", strtotime($data['businessInfo'][$i]['locations'][$j]['locationHours'][$k]['startTime']));
												}


												
																						$html .='<li>
												<span class="location-icon"></span>
												<h4>'.$data['businessInfo'][$i]['locations'][$j]['locationHours'][$k]['day'].' <span>'.$time_in_12_hour_format_start_new.' - '.$time_in_12_hour_format_new.'</span></h4>
												<p>'.$data['businessInfo'][$i]['locations'][$j]['locationHours'][$k]['menuNameStr'].' @ '.$data['businessInfo'][$i]['locations'][$j]['address1'].'</p>
											</li>';
										 }
									}
										
										
								$html .='</ul>
								</div>
							</div>
						</div>
					</div>' ;


}
echo $html;
?>