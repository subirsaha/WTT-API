<?php
$item_id = $_REQUEST["itemid"];
$choiceLimit = $_REQUEST["choiceLimit"];
$choicecat=$_REQUEST["choicecat"];
$selectids=$_REQUEST["selectids"];
$selectidsarr=array();
if($selectids!=""){
	$selectidsarr=explode(",", $selectids);
}

//$choicecat=str_replace(" ", "", $choicecat);
//$selected_val = $_REQUEST["selected_val"];

$json = file_get_contents("http://whatthetrucks.com:8080/Innovommerce/rest/itemchoicelist/choices?itemid=".$item_id."&choiceLimit=".$choiceLimit.""); // this WILL do an http request for you
$data = json_decode($json, true);

$html='';
$type='';

$counter=count($data['itemChoiceInfo']);


$html.='<section data-role="content"><div class="inner-content">
                    <form name="f_all_listing">
                        <ul class="listingRadio">';
                        for($i=0;$i<$counter;$i++)
						{
							if($data['itemChoiceInfo'][$i]['choiceCategory']==$choicecat && $data['itemChoiceInfo'][$i]['choiceGroup']=="true")
							{
								$id_item=$i.'Item'.$choicecat;
		                            $html.='<li>
		                                <div class="inputRadio">
		                                    <input type="radio" name="Item" id="'.$id_item.'"';if(in_array($id_item, $selectidsarr)){ $html.=' checked '; } else { $html.=' '; } $html.='data-role="none" value="'.$id_item.'####'.$data['itemChoiceInfo'][$i]['id'].'####'.$data['itemChoiceInfo'][$i]['choicePrice'].'####'.$data['itemChoiceInfo'][$i]['choiceCategory'].'####'.$data['itemChoiceInfo'][$i]['choiceName'].'####'.$data['itemChoiceInfo'][$i]['choiceGroup'].'" />
		                                    <label for="'.$id_item.'">'.$data['itemChoiceInfo'][$i]['choiceName']; if($data['itemChoiceInfo'][$i]['choicePrice']!="0.0"){ $html.=' ( $'.number_format($data['itemChoiceInfo'][$i]['choicePrice'],2).' )'; } $html.='</label>
		                                </div>
		                            </li>';
		                            $type=$data['itemChoiceInfo'][$i]['choiceCategory'];
		                     }
		                 }
		                 $html.='</ul><input type="hidden" name="type" id="type" value="'.$type.'"></form></div></section>';
		                 echo $html;


?>