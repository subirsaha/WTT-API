<?php
$item_id = $_REQUEST["itemid"];
$choiceLimit = $_REQUEST["choiceLimit"];
$selected_val = $_REQUEST["selected_val"];
$selectid = $_REQUEST["selectid"];
$mode = $_REQUEST["mode"];
$choice_type='Choice';

//echo "http://dookansserver.com/Innovommerce/rest/itemchoicelist/choices?itemid=".$item_id."&choiceLimit=".$choiceLimit."";

$json = file_get_contents("https://whatthetrucks.com/Innovommerce/rest/itemchoicelist/choices?itemid=".$item_id."&choiceLimit=".$choiceLimit.""); // this WILL do an http request for you
$data = json_decode($json, true);

$html='';


$counter=count($data['itemChoiceInfo']);
// $newcounter=0;

// for($i=0;$i<$counter;$i++)
// {
// 	//echo $cat=$data['itemChoiceInfo'][$i]['choiceCategory'];

// 	if($data['itemChoiceInfo'][$i]['choiceCategory']=="Choice")
// 	{
// 		//echo $data['itemChoiceInfo'][$i]['choiceName'];
// 		$newcounter++;
// 	}
// }

//echo $newcounter;


		$html.='<div class="inner-content">
                    <form action="">
                        <ul class="listingRadio">';
                        for($i=0;$i<$counter;$i++)
						{

							if($mode=="edit")
							{
								if($data['itemChoiceInfo'][$i]['choiceCategory']=="Choice")
								{
			                            $html.='<li>
			                                <div class="inputRadio">
			                                    <input type="radio" name="Item" id="'.$i.'Item" ';if($i.'Item'==$selectid){ $html.=' checked '; } else { $html.=' '; } $html.=' data-role="none" onclick = "MyRadio2(\'' . $i.'Item' . '\',\'' . $data['itemChoiceInfo'][$i]['id'] . '\',\'' . $data['itemChoiceInfo'][$i]['choicePrice'] . '\',\'' . $choice_type . '\',\'' . $data['itemChoiceInfo'][$i]['choiceName'] . '\')"/>
			                                    <label for="'.$i.'Item">'.$data['itemChoiceInfo'][$i]['choiceName']; if($data['itemChoiceInfo'][$i]['choicePrice']!="0.0"){ $html.=' ( $'.number_format($data['itemChoiceInfo'][$i]['choicePrice'], 2).' )'; } $html.='</label>
			                                </div>
			                            </li>';
			                     }
							}
							else
							{
								if($selected_val=="")
								{
									if($data['itemChoiceInfo'][$i]['choiceCategory']=="Choice")
									{
			                            $html.='<li>
			                                <div class="inputRadio">
			                                    <input type="radio" name="Item" id="'.$i.'Item" data-role="none" onclick = "MyRadio2(\'' . $i.'Item' . '\',\'' . $data['itemChoiceInfo'][$i]['id'] . '\',\'' . $data['itemChoiceInfo'][$i]['choicePrice'] . '\',\'' . $choice_type . '\',\'' . $data['itemChoiceInfo'][$i]['choiceName'] . '\')" />
			                                    <label for="'.$i.'Item">'.$data['itemChoiceInfo'][$i]['choiceName']; if($data['itemChoiceInfo'][$i]['choicePrice']!="0.0"){ $html.=' ( $'.number_format($data['itemChoiceInfo'][$i]['choicePrice'], 2).' )'; } $html.='</label>
			                                </div>
			                            </li>';
			                     	}
								}
								else
								{
									if($data['itemChoiceInfo'][$i]['choiceCategory']=="Choice")
									{
			                            $html.='<li>
			                                <div class="inputRadio">
			                                    <input type="radio" name="Item" id="'.$i.'Item" ';if($i.'Item'==$selected_val){ $html.=' checked '; } else { $html.=' '; } $html.=' data-role="none" onclick = "MyRadio2(\'' . $i.'Item' . '\',\'' . $data['itemChoiceInfo'][$i]['id'] . '\',\'' . $data['itemChoiceInfo'][$i]['choicePrice'] . '\',\'' . $choice_type . '\',\'' . $data['itemChoiceInfo'][$i]['choiceName'] . '\')"/>
			                                    <label for="'.$i.'Item">'.$data['itemChoiceInfo'][$i]['choiceName']; if($data['itemChoiceInfo'][$i]['choicePrice']!="0.0"){ $html.=' ( $'.number_format($data['itemChoiceInfo'][$i]['choicePrice'], 2).' )'; } $html.='</label>
			                                </div>
			                            </li>';
			                     	}
								}
							}
							
							//$data['itemChoiceInfo'][$i]['choiceName'];
							
	

						}
                            
                       $html.='</ul>
                    </form>            
                </div>';


// echo "<pre>";
// print_r($data['itemChoiceInfo']);
// echo "</pre>";





													
echo $html;




?>