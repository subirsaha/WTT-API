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
									$html.='<td><a onclick="remove_item2(\'' . $i . '\',\'' . $string . '\');" class="delete"></a></td>
									</tr>';
									}
									
									$tot_price=$tot_price+$price;

									//$tot_price=$tot_price+$expld[5];
								# code...
								}
							}

							$taxrate=($tot_price * $_REQUEST["taxRate"])/100;

							$total=$tot_price+$taxrate;
							$total=number_format($total, 2);
								
								//echo $tot_price;

							$html .='++++++++++<p><span class="left-label"><b>Subtotal:</b></span><span class="right tot_price">$'.number_format($tot_price,2).'</span></p><p><span class="left-label"><b>Tip:</b></span><span class="right">$<input type="text" data-role="none" class="tipBox" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 46)" onkeyup="updatetipvalue('.this.')"/></span></p><p><span class="left-label"><b>Tax:</b></span><span class="right tax_price">$'.number_format($taxrate,2).'</span></p><p style="font-size: 15px;"><span class="left-label"><b>Total:</b></span><span class="right total_final" style="font-size: 15px;"><b>$'.$total.'</b></span></p>';


echo $html;
?>