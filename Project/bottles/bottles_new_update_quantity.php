<?php
require_once('../../get_db.php');
$locations = mysql_query('SELECT * FROM locations ORDER BY room') or die ("Could not perform query... ".mysql_error());
$wines = mysql_query('SELECT * FROM wines'); ?>
<div id="content" class="ui-widget">
		<fieldset id="newBottleFieldset">			
		<legend class="clickableLegend">Bottle Input</legend>
			<form id="newBottleQuantityForm" method="POST" action="bottles_update_quantity.php?page=home" class="blindableForm" name="new_quantity_form" onsubmit="checkForm(3)"> 
				<p class="fieldReq">All fields must be answered.</p>
				
				<p class="newBottleInputPar"><label class="bottleLabel" for="get_wine_id">Wine: </label>
					<select id="wineId" type="text" class="newBottleInput" name="get_wine_id">
						<?php
							while($row = mysql_fetch_array($wines)){
								print("<option value=".$row["id"].">".$row['color']." ".$row["vintage"]." ".$row['grape_varietal']." ".$row['wine_maker_or_vineyard']."</option>");} 
						?>
					</select>
				</p>
				
				<p class="newBottleInputPar"><label class="bottleLabel" for="location">Location: </label>
					<select id="wineLocation" type="text" name="new_location_id"> 
						<?php
							while($row = mysql_fetch_array($locations)){
								print("<option value=".$row["id"].">".$row['room']." ".$row["container_number"]."</option>");
							}
						?>
					</select>
				</p>
				
				<p class="newBottleInputPar"><label class="bottleLabel" for="isOpen?">Is open?: </label>
					<select id="wineIsOpen" type="text" name="new_is_open"> 
						<option value="closed">closed</option>
						<option value="open">open</option>
					</select>
				</p>
				
				<p class="newBottleInputPar" id="quantityInput"><label class="bottleLabel" for="quantity">Quantity: </label><input id="wineQuantity" type="text" name="new_quantity" class="newBottleInput" min="1" required/></p>
				
				<p id="bottleSubmit"><input id="submit" value="Create" type="submit"/></p>
			</form>
		</fieldset>
	</div>
	<!--create new bottles of existing wine (already in db) updating the quantity
	how can I pass the wine_id for the value in name of wine like i did with locations -->
