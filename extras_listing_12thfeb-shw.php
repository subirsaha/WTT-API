<?php
$item_id = $_REQUEST["itemid"];
$choiceLimit = $_REQUEST["choiceLimit"];
$selected_items = $_REQUEST["selected_items"];


//echo "http://dookansserver.com/Innovommerce/rest/businessinfolist/itemswithchoiceft?itemid=".$item_id."&choiceLimit=".$choiceLimit."";
//echo "http://dookansserver.com/Innovommerce/rest/itemchoicelist/choices?itemid=".$item_id."&choiceLimit=".$choiceLimit."";
$json = file_get_contents("http://dookansserver.com/Innovommerce/rest/itemchoicelist/choices?itemid=".$item_id."&choiceLimit=".$choiceLimit.""); // this WILL do an http request for you
$data = json_decode($json, true);

$html='';
$counter=count($data['itemChoiceInfo']);


		$html.='<div class="inner-content">
                    <form action="">
                        <ul class="listingRadio">';
                        for($i=0;$i<$counter;$i++)
						{

							if($selected_items=="")
							{

								if($data['itemChoiceInfo'][$i]['choiceCategory']=="Extras")
								{
			                            $html.='<li>
			                                <div class="inputRadio">
			                                    <input type="checkbox" name="extraItem" id="'.$i.'Item" data-role="none" value="'.$data['itemChoiceInfo'][$i]['choiceName'].'"/>
			                                    <label for="'.$i.'Item">'.$data['itemChoiceInfo'][$i]['choiceName'].' ( $'.$data['itemChoiceInfo'][$i]['choicePrice'].' )</label>
			                                </div>
			                            </li>';
			                     }
								
			                 }
			                 else
			                 {
			                 	if($data['itemChoiceInfo'][$i]['choiceCategory']=="Extras")
								{

									$explode=explode(",",$selected_items);
									for($j=0;$j<count($explode);$j++)
									{

										 $html.='<li>
			                               <div class="inputRadio">
			                                    <input type="checkbox" name="extraItem" id="'.$i.'Item" ';if($explode[$j]==$data['itemChoiceInfo'][$i]['choiceName']){ $html.=' checked '; } else { $html.=' '; } $html.=' data-role="none" value="'.$data['itemChoiceInfo'][$i]['choiceName'].'"/>
			                                    <label for="'.$i.'Item">'.$explode[$j].'*****'.$data['itemChoiceInfo'][$i]['choiceName'].' ( $'.$data['itemChoiceInfo'][$i]['choicePrice'].' )</label>
			                                </div>
			                            </li>';
									}
			                           
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