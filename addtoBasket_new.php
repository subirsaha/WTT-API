<?php
$item_id = $_REQUEST["itemid"];
$choiceLimit = $_REQUEST["choiceLimit"];
$itemname = $_REQUEST["itemname"];
$price = $_REQUEST["price"];
$description = $_REQUEST["description"];
$quantity=$_REQUEST["quantity"];
$mode=$_REQUEST["mode"];
$cat_name=array();

$cat_name1=array();

$choiceGroup=array();

$choiceGroup1=array();

$html='';


$val="plus";
$val1="minus";

$json = file_get_contents("http://whatthetrucks.com:8080/Innovommerce/rest/itemchoicelist/choices?itemid=".$item_id."&choiceLimit=".$choiceLimit."");
$data = json_decode($json, true);

$counter=count($data['itemChoiceInfo']);

for($i=0;$i<$counter;$i++)
{
	//echo $data[$i]['choiceCategory'];
	//echo $data['itemChoiceInfo'][$i]['choiceCategory'];

	// array_push($cat_name,str_replace(" ", "", $data['itemChoiceInfo'][$i]['choiceCategory']));
	array_push($cat_name,$data['itemChoiceInfo'][$i]['choiceCategory']);
}
for($i=0;$i<$counter;$i++)
{
	//echo $data[$i]['choiceCategory'];
	//echo $data['itemChoiceInfo'][$i]['choiceCategory'];
	// array_push($choiceGroup,str_replace(" ", "",$data['itemChoiceInfo'][$i]['choiceCategory']).'@@'.$data['itemChoiceInfo'][$i]['choiceGroup']);
	array_push($choiceGroup,$data['itemChoiceInfo'][$i]['choiceCategory'].'@@'.$data['itemChoiceInfo'][$i]['choiceGroup']);
}


$cat_name1=array_unique($cat_name);
$cat_name1 = array_values($cat_name1);

//$implodecat1=implode(",",$cat_name1);

$choiceGroup1=array_unique($choiceGroup);
$choiceGroup1 = array_values($choiceGroup1);

$implodechoiceGrou1=implode(",",$choiceGroup1);




$html.='<div class="inner-content">
					
					<div class="contactInfoHeader">					
						<div class="bar bar-default">
							<div class="search-result-box">
								<h2><a class="ui-link" href="#">'.$itemname.'</a></h2>
								<p>'.$description.'</p>
								<div class="right-small-box">
									<h5 id="set_price">$'.$price.'</h5>';
									
											 if($mode=="edit"){
									 $html.='<input type="hidden" id="main_price_actual_value" name="main_price_actual_value" value="'.($price/$quantity).'" />';
									}else{
											 $html.='<input type="hidden" id="main_price_actual_value" name="main_price_actual_value" value="'.$price.'" />';
									}
									
								$html.='</div>
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
								        <div class="dec button" onclick="button_val(\'' . $val1 . '\',\'' . $price . '\')">-</div>
								        <input type="text" name="french-hens" id="quantity"'; if($mode=="edit"){ $html.=' value="'.$quantity.'"'; } else { $html.=' value="1"'; }  $html.='readonly="true" data-theme="none" data-role="none">
								        <div class="inc button" onclick="button_val(\'' . $val . '\',\'' . $price . '\')">+</div>
							        </div>
							    </div>
							</form>
						</div>';
						//echo count($cat_name1);

						//print_r($cat_name1);
						$mandatoryarr=array();
						$mandatory="";
						if(!empty($choiceGroup1)){
						for($j=0;$j<count($choiceGroup1);$j++)
						{


							//echo $cat_name1[$j];
							$expl=explode('@@',$choiceGroup1[$j]);
							$name=$expl[0];
							$group=$expl[1];
							$replace=str_replace(" ", "", $name);
							if($group=="true"){
								$mandatoryarr[]=$replace;
								$html.='<div class="bar bar-default">
									<a href="#listingPage" onclick="show_radio_lists(\'' . $item_id . '\',\'' . $choiceLimit . '\',\'' . $name . '\');" class="ui-link">'.$name.'<br/><span style="font-size: 13px;" id="'.$name.'div"></span></a>
								</div>';
							}else{
								$html.='<div class="bar bar-default">
									<a href="#listingPage" onclick="show_checkbox_lists(\'' . $item_id . '\',\'' . $choiceLimit . '\',\'' . $name . '\');" class="ui-link">'.$name.'<br/><span style="font-size: 13px;" id="'.$name.'div"></span></a>
								</div>';
							}
							
						
						}
					}
					if(!empty($mandatoryarr)){
						$mandatory=implode(",", $mandatoryarr);
					}

						$html.='<input type="hidden" name="submit_fields" id="submit_fields" value="'.$implodechoiceGrou1.'" /><div class="bar bar-default">
							<a href="#specialInstructions" onclick="instructions(\'' . $itemname . '\',\'' . $description . '\',\'' . $price . '\');" id="description" class="ui-link">Special Instructions <small>(additional charges may apply)</small></a>
						</div>
					</div>
					
				</div>^^^^^^'.$mandatory;

						// $html.='<div class="bar bar-default">
						// 			<a href="#listingPage" onclick="show_choices(\'' . $item_id . '\',\'' . $choiceLimit . '\',\'' . $breadselected_id . '\',\'' . $mode . '\');" class="ui-link">Bread</a>
						// 		</div><input type="hidden" name="hasbread" id="hasbread" value="1" />';



// echo '<pre>';
// print_r($cat_name1);
// echo '</pre>';


echo $html;




?>