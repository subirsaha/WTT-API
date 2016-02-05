<?php

$lat = $_REQUEST["string"];
$long = $_REQUEST["longt"];
$busid = $_REQUEST["busid"];


$html = '<section data-role="content" >
				<div class="inner-content">
					<div class="contactInfoHeader">	
						<div class="headerTopBox">
							<h2><a class="ui-link" href="#">Benny’s Crepe Cafe</a></h2>
							<span class="icon-block location">Rings Fountain at Milk Street</span>
							<div class="inline-icon">
								<span class="icon-block time"><b>10am - 6:30pm</b></span>
								<span class="icon-block order right"><b>Pickup: </b> 35 min</span>
							</div>
						</div>
					</div>
					<div class="fullWidth">
						<table data-role="table" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe table-stroke ui-responsive" data-column-btn-theme="b" >
							<thead>
								<tr class="ui-bar-d ui-bar-blue">
									<th>QTY</th>
									<th>ITEM</th>
									<th>PRICE</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>1</th>
									<td>
									<p class="split-text">
										Guacamole Taco Combo <small> + Medium Salsa</small>
									</p></td>
									<td>$8.00</td>
									<td><a href="#" class="delete"></a></td>
								</tr>
								<tr>
									<th>1</th>
									<td>
									<p class="split-text">
										Guacamole Taco Combo <small> + Medium Salsa</small>
									</p></td>
									<td>$8.00</td>
									<td><a href="#" class="delete"></a></td>
								</tr>

							</tbody>
						</table>
					</div>
					<div class="total">
						<h3>Total: <span>$16.00</span></h3>
					</div>
					<div class="addItem">
						<a href="#addItem" class="addItemLink"></a>
					</div>
				</div>
				</section>
			';


echo $html;
?>