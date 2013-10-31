<fieldset>			
	<legend class="clickableLegend">Create a Location</legend>
		<form id="newLocationForm" method="POST" action="locations_create.php" class="blindableForm" name="new_location_form" onsubmit="checkForm(4)">
			<p class="fieldReq">Fields that must be completed are marked with a red asterisk (<span class="mandatory">*</span>).</p>
			<table class="enterAddressFormTable">
				<tbody>
					<tr>
						<td class="enterAddressFieldLabel" style="vertical-align:middle;">
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
					<tr>
						<td class="enterAddressFieldLabel" style="vertical-align:middle;">
							<span>
								<label class="locationLabel" for="new_address_line_1">
									<span class="mandatory">*&nbsp;</span>
									<b>Address line 1:&nbsp;</b>
								</label>
							<span>
						</td>
						<td>
							<span>
								<input id="AddressLine1" type="text" class="newLocationInput" name="new_address_line_1"  maxlength="60" size="50" required/>
							</span>
							<br />
							<span class="tiny">Street address, P.O. box, company name, c/o</span>
						</td>
					</tr>
					<tr>
						<td class="enterAddressFieldLabel" style="vertical-align:middle;">
							<span>
								<label class="locationLabel" for="new_address_line_2">
									<span class="notMandatory"></span>
									<b>Address line 2:&nbsp;</b>
								</label>
							<span>
						</td>
						<td>
							<span>
								<input id="AddressLine2" type="text" class="newLocationInput" name="new_address_line_2"  maxlength="60" size="50" />
							</span>
							<br />
							<span class="tiny">Apartment, suite, unit, building, floor, etc.</span>
						</td>
					</tr>
					<tr>
						<td class="enterAddressFieldLabel" style="vertical-align:middle;">
							<span>
								<label class="locationLabel" for="new_city">
									<span class="mandatory">*&nbsp;</span>
									<b>City:&nbsp;</b>
								</label>
							<span>
						</td>
						<td>
							<span>
								<input id="city" type="text" class="newLocationInput" name="new_city"  maxlength="50" size="25" required/>
							</span>
							<br />
							<span class="tiny"></span>
						</td>
					</tr>
					<tr>
						<td class="enterAddressFieldLabel" style="vertical-align:middle;">
							<span>
								<label class="locationLabel" for="new_state_province_region">
									<span class="mandatory">*&nbsp;</span>
									<b>State/Province/Region:&nbsp;</b>
								</label>
							<span>
						</td>
						<td>
							<span>
								<input id="stateProvinceRegion" type="text" class="newLocationInput" name="new_state_province_region"  maxlength="50" size="15" required/>
							</span>
							<br />
							<span class="tiny"></span>
						</td>
					</tr>
					<tr>
						<td class="enterAddressFieldLabel" style="vertical-align:middle;">
							<span>
								<label class="locationLabel" for="new_postal_code">
									<span class="mandatory">*&nbsp;</span>
									<b>ZIP/Postal Code:&nbsp;</b>
								</label>
							<span>
						</td>
						<td>
							<span>
								<input id="postalCode" type="text" class="newLocationInput" name="new_postal_code"  maxlength="20" size="20" required />
							</span>
							<br />
							<span class="tiny"></span>
						</td>
					</tr>
					<tr>
						<td class="enterAddressFieldLabel" style="vertical-align:middle;">
							<span>
								<label class="locationLabel" for="new_country">
									<span class="mandatory">*&nbsp;</span>
									<b>Country:&nbsp;</b>
								</label>
							<span>
						</td>
						<td>
							<span>
								<select id="country" type="text" class="newLocationInput" name="new_country">
								<?php include('Project/all_countries_list.html'); ?>
								</select>
							</span>
							<br />
							<span class="tiny"></span>
						</td>
					</tr>
					<tr>
						<td class="enterAddressFieldLabel" style="vertical-align:middle;">
							<span>
								<label class="locationLabel" for="new_room">
									<span class="notMandatory"></span>
									<b>Room:&nbsp;</b>
								</label>
							<span>
						</td>
						<td>
							<span>
								<input id="room" type="text" class="newLocationInput" name="new_room"  maxlength="40" size="40"/>
							</span>
							<br />
							<span class="tiny"></span>
						</td>
					</tr>
					<tr>
						<td class="enterAddressFieldLabel" style="vertical-align:middle;">
							<span>
								<label class="locationLabel" for="new_container_number">
									<span class="notMandatory"></span>
									<b>Container Number:&nbsp;</b>
								</label>
							<span>
						</td>
						<td>
							<span>
								<input id="containerNumber" type="text" class="newLocationInput" name="new_container_number"  maxlength="30" size="20"/>
							</span>
							<br />
							<span class="tiny"></span>
						</td>
					</tr>
					<tr>
						<td class="enterAddressFieldLabel" style="vertical-align:middle;">
							<span>
								<label class="locationLabel" for="new_location_comments">
									<span class="notMandatory"></span>
									<b>Comments:&nbsp;</b>
								</label>
							<span>
						</td>
						<td>
							<span>
								<textarea id="locationComments" type="text" class="newLocationInput" name="new_location_comments" rows="4" maxlength="140"></textarea>
							</span>
							<br />
							<span class="tiny"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<p id="locationSubmit"><input id="submit" value="Create" type="submit"/></p>					
		</form>
</fieldset>
