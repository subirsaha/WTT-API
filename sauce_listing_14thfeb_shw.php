<?php
$item_id = $_REQUEST["itemid"];
$choiceLimit = $_REQUEST["choiceLimit"];
$selected_val = $_REQUEST["selected_val"];
$choice_type='Sauce';

//echo "http://dookansserver.com/Innovommerce/rest/businessinfolist/itemswithchoiceft?itemid=".$item_id."&choiceLimit=".$choiceLimit."";

$json = file_get_contents("http://dookansserver.com/Innovommerce/rest/itemchoicelist/choices?itemid=".$item_id."&choiceLimit=".$choiceLimit.""); // this WILL do an http request for you
$data = json_decode($json, true);

$html='';


$counter=count($data['itemChoiceInfo']);
$newcounter=0;

//for($i=0;$i<$counter;$i++)
//{
//
//	if($data['itemChoiceInfo'][$i]['choiceCategory']=="Sauce")
//	{
//		$newcounter++;
//	}
//}




		$html.='<div class="inner-content">
                    <form action="">
                        <ul class="listingRadio">';
                        for($i=0;$i<$counter;$i++)
						{
							if($selected_val=="")
							{
								if($data['itemChoiceInfo'][$i]['choiceCategory']=="Sauce")
								{
			                            $html.='<li>
			                                <div class="inputRadio" onclick = "MyRadio5(\'' . $i.'Item' . '\',\'' . $data['itemChoiceInfo'][$i]['id'] . '\',\'' . $data['itemChoiceInfo'][$i]['choicePrice'] . '\',\'' . $choice_type . '\',\'' . $data['itemChoiceInfo'][$i]['choiceName'] . '\')">
			                                    <input type="radio" name="Item" id="'.$i.'Item" data-role="none"/>
			                                    <label for="'.$i.'Item">'.$data['itemChoiceInfo'][$i]['choiceName'].' ( $'.$data['itemChoiceInfo'][$i]['choicePrice'].' )</label>
			                                </div>
			                            </li>';
			                     }
			                 }
			                 else
			                 {
			                 	if($data['itemChoiceInfo'][$i]['choiceCategory']=="Sauce")
								{
									
			                            $html.='<li>
			                                <div class="inputRadio" onclick = "MyRadio5(\'' . $i.'Item' . '\',\'' . $data['itemChoiceInfo'][$i]['id'] . '\',\'' . $data['itemChoiceInfo'][$i]['choicePrice'] . '\',\'' . $choice_type . '\',\'' . $data['itemChoiceInfo'][$i]['choiceName'] . '\')">
			                                    <input type="radio" name="Item" id="'.$i.'Item" ';if($i.'Item'==$selected_val){ $html.=' checked '; } else { $html.=' '; } $html.='data-role="none"/>
			                                    <label for="'.$i.'Item">'.$data['itemChoiceInfo'][$i]['choiceName'].' ( $'.$data['itemChoiceInfo'][$i]['choicePrice'].' )</label>
			                                </div>
			                            </li>';
			                     }
			                 }
	

						}
                            
                       $html.='</ul>
                    </form>            
                </div>';


// echo "<pre>";
// print_r($data['itemChoiceInfo']);
// echo "</pre>";





													
echo $html;




?>