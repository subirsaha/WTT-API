<?php

$string = $_REQUEST["string"];
$explode = explode("=====", $string);

$pickup_time=$_REQUEST["pickup"];


$final_string=$_REQUEST["add_details"];

$final_string= ltrim ($final_string, "'");
$final_string= rtrim ($final_string, "'");

//echo $final_string;

// $abc=substr($final_string, -1) ;

// //echo $abcd=strlen($final_string)-1;

// $string1 = $final_string;  // Original string
// $replacement = "";    // What you want to replace the last character with

// // The final string
// $final = substr($string1, 0, -1).$replacement;  


// echo $namepos=strpos($final_string,"'");

// if($namepos!=-1)
// {
// 	echo $final_strnew=str_replace("'", "", $final_string);
// }
// else
// {
// 	echo $final_strnew=$final_string;
// }




$final_string_payment=$_REQUEST["payment_details"];
$final_string_payment= ltrim ($final_string_payment, "'");
$final_string_payment= rtrim ($final_string_payment, "'");
//echo $final_string_payment;


$namepos_pay=strpos($final_string_payment,"'");

if($namepos_pay!=-1)
{
	$final_strnew_pay=str_replace("'", "", $final_string_payment);
}
else
{
	$final_strnew_pay=$final_string_payment;
}

//echo $final_string.'@@'.$final_string_payment;

$explode_string=explode("==",$final_string);


// echo "<pre>";
// print_r($explode_string);
// echo "</pre>";

$name_final=$explode_string[0];


$explode_string_payment=explode("==",$final_strnew_pay);






// echo "<pre>";
// print_r($explode_string);okm

// echo "</pre>";
$html ="";

$html .= '<div class="inner-content">
					<div class="contactInfoHeader">		
						<div class="headerTopBox">
							<h2><a class="ui-link" href="#">'.$_REQUEST["showname"].'</a></h2>
							<span class="icon-block location">'.$_REQUEST["showaddr"].'</span>
							<div class="inline-icon">
								<span class="icon-block time"><b>'.$_REQUEST["showtime"].'</b></span>
								<span class="icon-block right"><b>$'.$_REQUEST["minorderamt"].' minimum</b></span>
							</div>
						</div>
					</div>
					
					<div class="fullWidth">
						<table id="checkoutpgtbl" data-role="table" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe table-stroke ui-responsive ui-table" data-column-btn-theme="b" style="width:100%">
							<thead>
								<tr class="ui-bar-d ui-bar-blue">
									<th><center>QTY</center></th>
									<th style="width: 160px;">ITEM</th>
									<th style="text-align:right">PRICE</th>
									<th></th>
								</tr>
							</thead>
							<tbody>';

								$tot_price=0;
								for ($i=0; $i < count($explode); $i++) { 
                                                                $stat='0';
								if($explode[$i]=="")
								{
									$stat='1';
								}
								if($stat=="0"){
								$expld = explode("##", $explode[$i]);

								$html .= '<tr>
									<td><center>'.$expld[0].'</center></td>
									<td>
									<p class="split-text">
										'.$expld[4].' <small>'; if($string!="" && $string!="undefined" && $expld[1]!="undefined" && $expld[1]!=""){ $html .=''; }$html .=$expld[1]; $html .='</small>
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
									$html.='<td><a onclick="remove_item2(\'' . $i . '\',\'' . $string . '\');" class="delete"></a></td>
									</tr>';

									$tot_price=$tot_price+$price;
								# code...
                                                                }
							}

							$taxrate=($tot_price * $_REQUEST["taxRate"])/100;

							$total=$tot_price+$taxrate;
							$total=number_format($total, 2);
							$html .= '</tbody>


						</table>
					</div>
					<div class="total">
						<p>
							<span class="left-label"><b>Subtotal:</b></span>
							<span class="right" id="tot_price">$'.number_format($tot_price,2).'</span>
						</p>
						<p>
							<span class="left-label"><b>Tip:</b></span>
							<span class="right">$ <input type="number" id="tipbox" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 46)" onkeyup="updatetipvalue('.this.')" data-role="none" class="tipBox"/></span>
						</p>
						<p>
							<span class="left-label"><b>Tax:</b></span>
							<span class="right" id="tax_price">$'.number_format($taxrate,2).'</span>
						</p>
						
						<p style="font-size: 15px;">
							<span class="left-label"><b>Total:</b></span>
							<span class="right" style="font-size: 15px;font-weight:bold;" id="total_final">$'.$total.'</span>
						</p>
						
					</div>';

					$html .= '<div class="listGroup">';

					if($final_string=="================" || $final_string=="'============================" || $final_string=="'==============" || $final_string=="" || $final_string=="==============")
					{
							$html .= '<div class="bar bar-default">
								<a onclick="add_contact()" class="ui-link" id="addnewcnct">Add Contact Information</a>
							</div>';
					}
					else
					{
						$html .= '<div class="bar bar-default">
								<a onclick="add_contact()" class="addressBar ui-link" id="addnewcnct">
								
									<h2 id="dis_name"><b>'.$name_final.'</b></h2>
									<p id="dis_mail">'.$explode_string[1].'</p>
									<p id="dis_add">'.$explode_string[2].'</p>
									<p id="dis_add_del">'.$explode_string[3].', '.$explode_string[4].' '.$explode_string[5].'<br/>'.$explode_string[7].'</p>
								</a>
							</div>';
					}

					if($final_strnew_pay=="" || $final_strnew_pay=="undefined" || $final_strnew_pay=="==" || $explode_string_payment[0]=="**** **** **** '" || $explode_string_payment[0]=="'" || $final_string_payment=="====")
					{
							$html .= '<div class="listGroup"><div class="bar bar-default">
								<a onclick="add_payment()" class="ui-link" id="addnewpmt">Add Payment Info</a>
							</div>';
					}
					else
					{
						$html .= '<div class="bar bar-default">
								<a onclick="add_payment()" class="addressBar ui-link" id="addnewpmt">
									<p id="last_four">'.$explode_string_payment[2].': **** **** **** '.$explode_string_payment[0].'</p>
									<p id="expdate">Exp: '.$explode_string_payment[1].'</p>
								</a>
							</div>';

					}

					if($pickup_time=="undefined")
					{
						$html .= '<div class="bar bar-default">
								<a class="ui-link" onclick="changepickup()" id="show_pick">Change Pickup Time</a>
							</div>';
					}
					else
					{
						$html .= '<div class="bar bar-default">
								<a class="ui-link" onclick="changepickup()" id="show_pick"></span>Pickup Time: '.$pickup_time.'</a>
							</div>';
					}
							
							$html .= '<div class="bar bar-default">
								<a onclick="save_description()" class="ui-link">Special Instructions <small>(Additional charges may apply)</small></a>
							</div>
						</div>';
											
						
					

					$html .= '</div>';
					
					


				

							


echo $html;
?>