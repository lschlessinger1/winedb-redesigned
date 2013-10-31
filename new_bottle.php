	<div id="content" class="ui-widget-content ui-corner-all">
		<fieldset id="newBottleFieldset">			
		<legend class="clickableLegend">Bottle Input</legend>
			
			<form id="newBottleForm" method="POST" action="bottles_create.php" class="blindableForm" name="new_bottle_form" onsubmit="checkForm(2)"> 
				<p class="fieldReq">Fields that must be completed are marked with a red asterisk (<span class="mandatory">*</span>).</p>
				<p class="newBottleInputPar" id="vintageInput"><span class="mandatory">* </span><label class="bottleLabel" for="vintage">Vintage: </label><span class="align"><select id="vintage" class="newBottleInput" name="new_vintage"></select></span></p>
				
				<p class="newBottleInputPar" id="countryInput"><label class="bottleLabel" for="country">Country: </label>
				<span class="align"><select id="country" class="newBottleInput" name="new_country">
		
				<?php include('../country_list.php'); ?>

				</select></span></p> 
				
				<p class="newBottleInputPar"><span class="mandatory">* </span><label class="bottleLabel" for="region">Region: </label><input id="wineRegion" dbtable="wines"  field="region" type="text" class="newBottleInput" name="new_region" required/></p> 
						
				<p class="newBottleInputPar"><span class="mandatory">* </span><label class="bottleLabel" for="wineMaker/Vineyard">Wine Maker/Vineyard: </label>
				<input id="wineMaker" type="text" dbtable="wines" field="wine_maker_or_vineyard" class="newBottleInput"name="new_wine_maker_or_vineyard" required/>
				<div class="dropdown">
					<ul class="result">
					</ul>
				</div>
				</p> 
				
				<p class="newBottleInputPar"><label class="bottleLabel" for="supplier">Supplier: </label><input id="wineSupplier" type="text" dbtable="wines" field="supplier" class="newBottleInput" name="new_supplier"/></p> 
				
				<p class="newBottleInputPar"><label class="bottleLabel" for="price">Price: </label><input id="winePrice" type="text" dbtable="wines" field="price" class="newBottleInput"name="new_price" title="(price per bottle) Please do not use the dollar sign (&#36)"/></p> 
				
				<p class="newBottleInputPar"><label class="bottleLabel" for="lifeExpectancy" title="This is a range of when the wine is expected to go bad">Life Expectancy: </label><select id="wineLowerLifeExpectancy" name="new_lower_life_expectancy" class="newBottleInput" title="The minimum year that the bottle is expected to start to go bad"></select> to 
				<select id="wineUpperLifeExpectancy" name="new_upper_life_expectancy" class="newBottleInput" title="The maximum year that the bottle is expected to start to go bad"></select></p> 
				
				<p class="newBottleInputPar"><span class="mandatory">* </span><label class="bottleLabel" for="color">Color: </label>
					<select id="color" name="new_color" class="newBottleInput">
						<option value="default">Select</option>
						<option value="white" title="(light colored wine)">White</option>
						<option value="red">Red</option>
						<option value="gray" title="as in vin gris (gray wine)">Gray</option>
						<option value="orange" title="as in orange wine, a white wine that has spent some time in contact with its skin, giving it a slightly darker hue.">Orange</option>
						<option value="ros&eacute" title="(meaning pinkish in English)">Ros&eacute</option>
						<option value="tawny" title="as in tawny port">Tawny</option>
						<option value="yellow" title="(or straw color), see for instance vin jaune, a special and characteristic type of white wine made in the Jura wine region in eastern France, Jurançon or Sauternes.">Yellow</option>
					</select>
				</p>
				
				<p class="newBottleInputPar"><span class="mandatory">* </span><label class="bottleLabel" for="grapeVarietal">Grape Varietal: </label><input id="wineGrapeVarietal" type="text" dbtable="wines" field="grape_varietal" class="newBottleInput" name="new_grape_varietal" required/></p> <!---should I make this into select element with options? -->
				
				<p class="newBottleInputPar"><label class="bottleLabel" for="percentAlcohol">Percent Alcohol: </label><input id="winePercentAlcohol" type="text" class="newBottleInput" dbtable="wines" field="percent_alcohol" name="new_percent_alcohol" title="Please do not use the percent sign (&#37)."/></p> 
				
				<p class="newBottleInputPar"><label class="bottleLabel" for="wineComments">Comments: </label><textarea id="wineComments" type="text" class="newBottleInput" name="new_wine_comments" rows="4"></textarea></p>
				
				<p class="newBottleInputPar"><span class="mandatory">* </span><label class="bottleLabel" for="location">Location: </label>
				
				<select id="wineLocation" type="text" class="newBottleInput" name="new_location_id"> 
				<?php
				while($row = mysql_fetch_array($locations)){
					print("<option value=".$row['id'].">".$row['room']." ".$row['container_number']."</option>");
				}
				?>
				</select>
				</p>
				
				<p class="newBottleInputPar"><span class="mandatory">* </span><label class="bottleLabel" for="isOpen?">Is open?: </label> 
				<select id="wineIsOpen" type="text" name="new_is_open" class="newBottleInput"> 
					<option value="closed">closed</option>
					<option value="open">open</option>
				</select>
				</p>
				
				<p class="newBottleInputPar"><span class="mandatory">* </span><label class="bottleLabel" for="quantity">Quantity: </label><input id="wineQuantity" type="text" class="newBottleInput" name="new_quantity" min="1" required/></p>
				
				<p id="bottleSubmit"><input id="submit" value="Create" type="submit"/></p>
			</form>
		</fieldset>
	</div>