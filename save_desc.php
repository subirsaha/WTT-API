<?php

$showname_pickup = $_REQUEST["showname_pickup"];
$showaddr_pickup = $_REQUEST["showaddr_pickup"];
$showtime_pickup = $_REQUEST["showtime_pickup"];
$desc=$_REQUEST["description"];

if($desc=="undefined")
{
    $description="";
}
else
{
    $description=$desc;
}


$html='<div class="inner-content">
                    
                    <div class="contactInfoHeader">                 
                        <div class="bar bar-default">
                            <div class="search-result-box">
                                <h2><a class="ui-link" href="#">'.$showname_pickup.'</a></h2>
                                <p>'.$showaddr_pickup.'</p>
                                
                            </div>
                        </div>
                        <div class="ui-bar ui-bar-blue">
                            <h2>Special Instructions</h2>
                        </div>
                    </div>
                    <div class="listGroup">
                        <div class="bar bar-default" style="border-bottom:none;">
                            <div class="textareaOuter">
                                <div class="deletetextarea" style="display:none;color: red;margin-left:287px;" id="spcl_inst_checkout" onclick="clear_text_checkout();"></div>
                                <textarea name="speInstruction_checkout" id="speInstruction_checkout" data-clear-btn="true" placeholder="Enter special instruction" rows="8" onkeyup="show_cross_checkout();">'.$description.'</textarea>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>';

 echo $html;

?>