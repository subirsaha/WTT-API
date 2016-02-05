<?php

$string = $_REQUEST["string"];
$explode = explode("=====", $string);



$choice_limit=$_REQUEST["limitchoice"];

//echo $string;


// echo "<pre>";
// print_r($explode);
// echo "</pre>";




$html = '
				<div class="inner-content">
					<div class="contactInfoHeader">	
						<div class="headerTopBox">';

						if($_REQUEST["showname"]=="undefined" || $string=="" || $string=="undefined"){
							$html .='<h2><a class="ui-link" href="#"> </a></h2>';
						}
						else
						{
							$html .='<h2><a class="ui-link" href="#">'.$_REQUEST["showname"].'</a></h2>';
						}
						if($_REQUEST["showaddr"]=="undefined" || $string=="" || $string=="undefined"){
							$html .='<span class="icon-block location"> </span>';
						}
						else
						{
							$html .='<span class="icon-block location">'.$_REQUEST["showaddr"].'</span>';
						}
						if($_REQUEST["showtime"]=="undefined" || $string=="" || $string=="undefined"){
							$html .='<div class="inline-icon"><span class="icon-block time"><b> </b></span>
							<span class="icon-block order right"><b>$minimum</b></span></div>';
						}
						else
						{
							$html .='<div class="inline-icon"><span class="icon-block time"><b>'.$_REQUEST["showtime"].'</b></span>
							<span class="icon-block right"><b>$'.$_REQUEST["minorderamt"].' minimum</b></span></div>';
						}
						
							
						$html .='</div>
					</div>
					<div class="fullWidth">

						<table id="basketpgtbl" data-role="table" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe table-stroke ui-responsive ui-table" data-column-btn-theme="b" style="width:100%" >
							<thead>
								<tr class="ui-bar-d ui-bar-blue">
									<th>QTY</th>
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

							$html .='</tbody>
						</table>
					</div>
					<div class="total">
						<h3>Total: <span id="total_price">$'.number_format($tot_price,2).'</span></h3>
					</div>
					<div class="addItem">
						<a href="#truckDetails" class="addItemLink" ></a>
					</div>
				</div>

				<input type="hidden" name="" id="final_price" value="'.$tot_price.'">

			';


echo $html;
?>