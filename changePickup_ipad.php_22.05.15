<?php

date_default_timezone_set('America/New_York'); 
$showname_pickup = $_REQUEST["showname_pickup"];
$showaddr_pickup = $_REQUEST["showaddr_pickup"];
$showtime_pickup = $_REQUEST["showtime_pickup"];

$tim = explode("-", $showtime_pickup);
// echo strtotime($tim[0]);
// echo strtotime($tim[1]);









$html='<div class="inner-content">
					<div class="contactInfoHeader">
						<div class="ui-bar ui-bar-white">
							<h2><b>'.$showname_pickup.'</b></h2>
							<h4><b>'.$showaddr_pickup.'</b></h4>
							<h4><b>'.$showtime_pickup.'</b></h4>
						</div>
						
					</div>
					<div class="pickUpBox pickupselect">';

					if(strtotime($tim[0])==""){
						$html.='<select name="pickUpTime" id="pickUpTime" data-mini="true" style="pointer-events: none; cursor: default;"></select>';
					}else{
						$html.='<select name="pickUpTime" id="pickUpTime" data-mini="true">';
							 

							 $i=0;
						 	if(date('H:i a', strtotime($tim[1])) > date('H:i a'))
							{


								while(date('H:i a', strtotime("+".$i."minutes", strtotime($tim[0]))) <= date('H:i a', strtotime($tim[1]))) {

									if(time() < strtotime("+".$i."minutes", strtotime($tim[0])))
									 {
								


										$html.='<option value="'.date('g:i a', strtotime("+".$i."minutes", strtotime($tim[0]))).'" >'.date('g:i a', strtotime("+".$i."minutes", strtotime($tim[0]))).'</option>';
									}
								$i=$i+15; }
							}
							else
							{

								if(date('h:i A') < date('h:i A', strtotime("+".$i."minutes", strtotime($tim[1]))))
								{
									$html.='<option value="'.date('g:i a').'" >'.date('h:i a', strtotime($tim[1])).'</option>';
								}
							}
						  
						$html.='</select>';
					}
						
						
					$html.='</div>
				</div>';

echo $html;

?>