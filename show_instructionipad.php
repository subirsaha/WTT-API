<?php
$itemname = $_REQUEST["itemname"];
$description = $_REQUEST["description"];
$price = $_REQUEST["price"];
$specialinst = $_REQUEST["specialinst"];

$html='';

$html.='<div class="inner-content">
					
					<div class="contactInfoHeader">					
						<div class="bar bar-default">
							<div class="search-result-box" style="margin-top:10px;">
								<p style="font-size: 2em; letter-spacing: -0.5px; font-weight:400; color: #000; color: #000;"><a class="ui-link" href="#">'.$itemname.'</a></p>
								<p style="font-size: 1.2em;color: #000;">'.$description.'</p>
								
							</div>
						</div>
						<div class="ui-bar ui-bar-blue">
							<h2>Special Instructions</h2>
						</div>
					</div>
					<div class="listGroup">
						<div class="bar bar-default" style="border-bottom:white;">
							<div class="textareaOuter">
								<div class="deletetextarea" style="display:none;color: red;margin-left:287px;" id="spcl_inst" onclick="clear_text();"></div>
								<textarea name="speInstruction" id="speInstruction" data-clear-btn="true" placeholder="Enter special instruction" onkeyup="show_cross();" rows="10" cols="70" style="width:100%;">'.$specialinst.'</textarea>
							</div>
						</div>
					</div>
					
				</div>';

echo $html;
?>