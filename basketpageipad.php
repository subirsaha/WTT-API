<?php

$string = $_REQUEST["string"];
$explode = explode("=====", $string);



$choice_limit=$_REQUEST["limitchoice"];

//echo $string;


// echo "<pre>";
// print_r($explode);
// echo "</pre>";



$html = "";
							$tot_price=0;
							for ($i=0; $i < count($explode); $i++) {
								$stat='0';
								if($explode[$i]=="")
								{
									$stat='1';
								}
								if($stat=="0"){
								$expld = explode("##", $explode[$i]);

								// echo "<pre>";
								// print_r($expld);

								// echo "</pre>";

								//echo $expld[5];

								

								$html .= '<tr>';
								if($expld[0]=="undefined"){
									$html .='<td> </td>';
								}
								else
								{
									$html .='<td><center>'.$expld[0].'</center></td>';
								}
									
									$html .='<td>
									<p class="split-text" onclick="edit_item(\'' . $expld[6] . '\',\'' . $expld[5] . '\',\'' . $expld[4] . '\',\'' . $expld[3] . '\',\'' . $choice_limit . '\',\'' . $expld[0] . '\',\'' . $i . '\',\'' . $expld[7] . '\');">
											'.$expld[4].' <small>';if($string!="" && $string!="undefined" && $expld[1]!="undefined" && $expld[1]!=""){ $html .=''; }$html .=$expld[1]; $html .='</small>
									</p></td>';
									$pricestr='';
									$price=0;
									if (strpos($expld[5], '$') !== false)
									{
									$html.='<td style="text-align:right">'.$expld[5].'</td>';
									$pricestr=str_replace("$","",$expld[5]);
									$price=(float)$pricestr;
									}else{
									$html.='<td style="text-align:right">$'.$expld[5].'</td>';
									$price=(float)$expld[5];
									}
									if($string!="" || $string!="undefined"){
									$html.='<td><a onclick="remove_item(\'' . $i . '\',\'' . $string . '\');" class="delete"></a></td>
									</tr>';
									}
									
									$tot_price=$tot_price+$price;

									//$tot_price=$tot_price+$expld[5];
								# code...
								}
							}
								
								//echo $tot_price;

							$html .='++++++++++<p style="font-size: 15px;">
							<span class="left-label"><b>Total:</b></span>
							<span class="right" style="font-size: 15px;" id="total_price"><b>$'.number_format($tot_price,2).'</b></span>
						</p></div>

				<input type="hidden" name="" id="final_price" value="'.$tot_price.'">';


echo $html;
?>