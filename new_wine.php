
		<fieldset>			
		<legend class="clickableLegend">Wine Input</legend>
			
			<form id="newWineForm" method="POST" action="wines_create.php" onsubmit="checkForm(1)" class="blindableForm" name="new_wine_form"> <!--I need to double check the submission--> 
				<p class="fieldReq">Fields that must be completed are marked with a red asterisk (<span class="mandatory">*</span>).</p>
				<table class="enterWineFormTable">
					<tbody>
						<tr>
							<td class="enterWineFieldLabel" style="vertical-align:middle;">
								<span>
									<label class="locationLabel" for="new_name">
										<span class="notMandatory"></span>
										<b>Save as:&nbsp;</b>
									</label>
									<br />
									<span class="tiny"></span>
								<span>
							</td>
							<td>
								<span>
									<input id="name" type="text" class="newLocationInput" name="new_name" title="The name of the location" maxlength="50" size="50" />
								</span>
							</td>
						</tr>
					</tbody>
				</table>
				<p class="newWineInputPar" id="vintageInput"><span class="mandatory">* </span><label class="wineLabel" for="vintage">Vintage: </label><select id="vintage" name="new_vintage"></select></p>
				
				<p class="newWineInputPar" id="countryInput"><label class="wineLabel" for="country">Country: </label>
				
				<select id="country" name="new_country">

				<?php include('../country_list.php'); ?> 

				</select></p>
				
				<p class="newWineInputPar"><span class="mandatory">* </span><label class="wineLabel" for="region">Region: </label><input id="wineRegion" type="text" class="newWineInput" name="new_region" required/></p> 
				
				<p class="newWineInputPar"><span class="mandatory">* </span><label class="wineLabel" for="wineMaker/Vineyard">Wine Maker/Vineyard: </label><input id="wineMaker" type="text" class="newWineInput"name="new_wine_maker_or_vineyard" required/></p> 
				
				<p class="newWineInputPar"><label class="wineLabel" for="supplier">Supplier: </label><input id="wineSupplier" type="text" class="newWineInput" name="new_supplier" /></p> 
				
				<p class="newWineInputPar"><label class="wineLabel" for="price">Price: </label><input id="winePrice" type="text" class="newWineInput"name="new_price" title="(price per bottle) Please do not use the dollar sign (&#36)" /></p> 
				
				<p class="newWineInputPar"><label class="wineLabel" for="lifeExpectancy" title="This is a range of when the wine is expected to go bad">Peak Drinking Period: </label><select id="wineLowerLifeExpectancy" name="new_lower_life_expectancy" title="The minimum year that the bottle is expected to start to go bad"></select> to 
				<select id="wineUpperLifeExpectancy" name="new_upper_life_expectancy" title="The maximum year that the wine is expected to start to go bad"></select></p>
				
				<p class="newWineInputPar"><span class="mandatory">* </span><label class="wineLabel" for="color">Color: </label>
					<select id="color" name="new_color">
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
			
				<p class="newWineInputPar"><span class="mandatory">* </span><label class="wineLabel" for="grapeVarietal">Grape Varietal: </label><input id="wineGrapeVarietal" type="text" class="newWineInput" name="new_grape_varietal" required/></p> <!---should I make this into select element with options? -->
				
				<p class="newWineInputPar"><label class="wineLabel" for="percentAlcohol">Percent Alcohol: </label><input id="winePercentAlcohol" type="text" class="newWineInput" name="new_percent_alcohol" title="Please do not use the percent sign (&#37)." /></p> 
				
				<p class="newWineInputPar"><label class="wineLabel" for="wine_comments">Wine Comments: </label><textarea id="wineComments" type="text" class="newWineInput" name="new_wine_comments" rows="4"></textarea></p>

				<p id="wineSubmit"><input id="submit" value="Create" type="submit"/></p>
			</form>
		</fieldset>

