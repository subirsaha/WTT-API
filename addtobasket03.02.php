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

$bread='0';
$C='0';

$counter=count($data['itemChoiceInfo']);

for($i=0;$i<$counter;$i++)
{
	if($data['itemChoiceInfo'][$i]['choiceCategory']=="Bread"){
		$bread="1";
	}

	if($data['itemChoiceInfo'][$i]['choiceCategory']=="Extras"){
		$extras="1";
	}
}

// echo $bread.','.$extras;



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
								        <div class="dec button">-</div>
								        <input type="text" name="french-hens" id="quantity" value="1" data-theme="none" data-role="none">
								        <div class="inc button">+</div>
							        </div>
							    </div>
							</form>
						</div>';
						if($bread=="1"){
						$html.='<div class="bar bar-default">
								<a href="#listingPage" onclick="show_choices(\'' . $item_id . '\',\'' . $choiceLimit . '\');" class="ui-link">Choice <small>Steak Tips</small></a>
							</div>';
						}
						if($extras=="1"){
							$html.='<div class="bar bar-default">
								<a href="#listingPage" onclick="show_extras(\'' . $item_id . '\',\'' . $choiceLimit . '\');" class="ui-link">Extras <small>Lettuce, Tomato, Pickles, Onions</small></a>
							</div>';
						}
						$html.='<div class="bar bar-default">
							<a href="#specialInstructions" class="ui-link">Special Instructions <small>(additional charges may apply)</small></a>
						</div>
					</div>
					
				</div>';

													
echo $html;
?>