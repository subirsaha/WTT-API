<?php

$string = $_REQUEST["string"];
$explode = explode("=====", $string);



$html = '<div class="inner-content">
					<div class="contactInfoHeader">		
						<div class="headerTopBox">
							<h2><a class="ui-link" href="#">'.$_REQUEST["showname"].'</a></h2>
							<span class="icon-block location">'.$_REQUEST["showaddr"].'</span>
							<div class="inline-icon">
								<span class="icon-block time"><b>'.$_REQUEST["showtime"].'</b></span>
								<span class="icon-block order right"><b>$'.$_REQUEST["minorderamt"].' minimum</b></span>
							</div>
						</div>
					</div>
					
					<div class="fullWidth">
						<table id="checkoutpgtbl" data-role="table" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive" data-column-btn-theme="b" style="width:100%">
							<thead>
								<tr class="ui-bar-d ui-bar-blue">
									<th>QTY</th>
									<th>ITEM</th>
									<th>PRICE</th>
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
									<th>'.$expld[0].'</th>
									<td>
									<p class="split-text">
										'.$expld[4].' <small> + '.$expld[1].'</small>
									</p></td>';
									$pricestr='';
									$price=0;
									if (strpos($expld[5], '$') !== false)
									{
									$html.='<td>'.$expld[5].'</td>';
									$pricestr=str_replace("$","",$expld[5]);
									$price=(float)$pricestr;
									}else{
									$html.='<td>$'.$expld[5].'</td>';
									$price=(float)$expld[5];
									}
									$html.='<td><a onclick="remove_item2(\'' . $i . '\',\'' . $string . '\');" class="delete"></a></td>
									</tr>';

									$tot_price=$tot_price+$price;
								# code...
                                                                }
							}

							$total=$tot_price+$_REQUEST["taxRate"];
							$html .= '</tbody>


						</table>
					</div>
					<div class="total">
						<p>
							<span class="left-label"><b>Subtotal:</b></span>
							<span class="right" id="tot_price">$'.$tot_price.'</span>
						</p>
						<p>
							<span class="left-label"><b>Tax:</b></span>
							<span class="right">$'.$_REQUEST["taxRate"].'</span>
						</p>
						<p>
							<span class="left-label"><b>Tip:</b></span>
							<span class="right"><input type="text" id="tipbox" onkeyup="updatetipvalue('.this.')" data-role="none" class="tipBox"/></span>
						</p>
						<p style="font-size: 15px;">
							<span class="left-label"><b>Total:</b></span>
							<span class="right" style="font-size: 15px;" id="total_final"><b>$'.$total.'</b></span>
						</p>
						
					</div>
					
					<div class="listGroup">
						<div class="bar bar-default">
							<a href="#contactInfo" class="ui-link">Add Contact Information</a>
						</div>
						<div class="bar bar-default">
							<a href="#paymentMethod" class="ui-link">Select Payment</a>
						</div>
						<div class="bar bar-default">
							<a href="#pickUp" class="ui-link">Change Pickup Time</a>
						</div>
						<div class="bar bar-default">
							<a href="#specialInstructions" class="ui-link">Special Instructions <small>(Additional charges may apply)</small></a>
						</div>
					</div>
										
				</div>
			';

							


echo $html;
?>