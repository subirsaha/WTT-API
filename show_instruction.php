<?php
$itemname = $_REQUEST["itemname"];
$description = $_REQUEST["description"];
$price = $_REQUEST["price"];
$specialinst = $_REQUEST["specialinst"];

$html='';

$html.='<div class="inner-content">
					
					<div class="contactInfoHeader">					
						<div class="bar bar-default">
							<div class="search-result-box">
								<h2><a class="ui-link" href="#">'.$itemname.'</a></h2>
								<p>'.$description.'</p>
								
							</div>
						</div>
						<div class="ui-bar ui-bar-blue">
							<h2>Special Instructions</h2>
						</div>
					</div>
					<div class="listGroup">
						<div class="bar bar-default">
							<div class="textareaOuter">
								<div class="deletetextarea" style="display:none;color: red;margin-left:287px;" id="spcl_inst" onclick="clear_text();"></div>
								<textarea name="speInstruction" id="speInstruction" data-clear-btn="true" placeholder="Enter special instruction" onkeyup="show_cross();">'.$specialinst.'</textarea>
							</div>
						</div>
					</div>
					
				</div>';

echo $html;
?>