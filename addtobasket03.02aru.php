<?php
$item_id = $_REQUEST["itemid"];
$choiceLimit = $_REQUEST["choiceLimit"];
$itemname = $_REQUEST["itemname"];
$price = $_REQUEST["price"];
$description = $_REQUEST["description"];


 //echo "http://dookansserver.com/Innovommerce/rest/businessinfolist/itemswithchoiceft?itemid='".$item_id."'&choiceLimit='".$choiceLimit."'";

$json = file_get_contents("http://dookansserver.com/Innovommerce/rest/businessinfolist/itemswithchoiceft?itemid='".$item_id."'&choiceLimit='".$choiceLimit."'"); // this WILL do an http request for you
$data = json_decode($json, true);

$html='';



// echo "<pre>";
// print_r($data);
// echo "</pre>";

$val="plus";
$val1="minus";


$html.='<div class="inner-content">
					
					<div class="contactInfoHeader">					
						<div class="bar bar-default">
							<div class="search-result-box">
								<h2><a class="ui-link" href="#">'.$itemname.'</a></h2>
								<p>'.$description.'</p>
								<div class="right-small-box">
									<h5>$'.$price.'</h5>
								</div>
							</div>
						</div>
						<div class="ui-bar ui-bar-blue">
							<h2>Item Options</h2>
						</div>
					</div>
					<div class="listGroup">
						<div class="bar bar-default">
							<form method="post" action="">
							    <div class="increase-btn">
							        <label for="name">Quantity</label>
							        <div class="right">
								        <a href="javascript:void(0);" class="dec button" onclick="button_val(\'' . $val1 . '\')">-</a>
								        <input type="text" name="french-hens" id="quantity" value="1" data-theme="none" data-role="none">
								        <a href="javascript:void(0);" class="inc button" onclick="button_val(\'' . $val . '\')">+</a>
							        </div>
							    </div>
							</form>
						</div>
						<div class="bar bar-default">
							<a href="#listingPage" onclick="show_choices(\'' . $item_id . '\',\'' . $choiceLimit . '\');" class="ui-link">Choice <small>Steak Tips</small></a>
						</div>
						<div class="bar bar-default">
							<a href="#listingPage" onclick="show_extras(\'' . $item_id . '\',\'' . $choiceLimit . '\');" class="ui-link">Extras <small>Lettuce, Tomato, Pickles, Onions</small></a>
						</div>
						<div class="bar bar-default">
							<a href="#specialInstructions" class="ui-link">Special Instructions <small>(additional charges may apply)</small></a>
						</div>
					</div>
					
				</div>';

													
echo $html;
?>