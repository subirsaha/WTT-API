<?php

date_default_timezone_set('America/New_York'); 
$timelimit = $_REQUEST["timelimit"];


$tim = explode("-", $timelimit);
// echo strtotime($tim[0]);
// echo strtotime($tim[1]);

if(strtotime($tim[0])==strtotime($tim[1])){
	echo "yes";
}
else{
	if((date('H:i a', strtotime($tim[1])) >= date('H:i a')) && (date('H:i a', strtotime($tim[0])) <= date('H:i a')))
							{
								echo "yes";
							}else{
								echo "no";
							}
						}










?>