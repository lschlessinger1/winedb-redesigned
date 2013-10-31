<?php
require_once('../../get_db.php');
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));
$wine = mysql_fetch_array(mysql_query('SELECT * FROM wines WHERE id = '.$id));
$country = $wine['country'];
$find = '/ /';
$replace = '_';
$editCountry = preg_replace($find, $replace, $country); 
?>
<html>
	<head>
		<title>Edit Wine</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Edit Wine" />
		<link type="text/css" rel="stylesheet" href="wines_style.css"/> 		
		<script type="text/javascript" src="../javascript/jquery.js"></script>
		<script type="text/javascript" src="../javascript/init.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="../javascript/zebra_rows.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../javascript/form_validation.js"></script>
		<script type="text/javascript" src="../javascript/effects.js"></script>
	</head>

	<body>
		<?php 
		include('wines_show-edit_header.php');?>
		<fieldset>			
		<legend class="clickableLegend">Edit Wine</legend>
			<form id="editWineForm" method="POST" action="wines_update.php?id=<?php echo $wine['id']; ?>" onsubmit="checkForm(1)" name="edit_wine_form" class="blindableForm">
				<p class="fieldReq">Fields that must be completed are marked with a red asterisk (<span class="mandatory">*</span>).</p>
				<p class="newWineInputPar" id="vintageInput" ><span class="mandatory">* </span><label class="wineLabel" for="vintage">Vintage: </label>
				<select id="edit_year" name="updated_vintage" initialVintage="<?php $wine['vintage']; ?>">');
				</select></p>
				<p class="newWineInputPar" id="countryInput"><label class="wineLabel" for="country">Country: </label>
				
				<select id="edit_country" name="updated_country" initialCountry="<?php echo $editCountry; ?>">
				<?php include('../country_list.php'); ?>
				</select></p>
				
				<p class="newWineInputPar"><span class="mandatory">* </span><label class="wineLabel" for="region">Region: </label><input id="wineRegion" type="text" class="newWineInput" name="updated_region" value="<?php echo $wine['region'] ?>" required/></p> 
				
				<p class="newWineInputPar"><span class="mandatory">* </span><label class="wineLabel" for="wineMaker/Vineyard">Wine Maker/Vineyard: </label><input id="wineMaker" type="text" class="newWineInput" name="updated_wine_maker_or_vineyard" value="<?php echo $wine['wine_maker_or_vineyard']; ?>" required/></p> 
				
				<p class="newWineInputPar"><label class="wineLabel" for="supplier">Supplier: </label><input id="wineSupplier" type="text" class="newWineInput" name="updated_supplier" value="<?php echo $wine['supplier']; ?>" /></p> 
				
				<p class="newWineInputPar"><label class="wineLabel" for="price">Price: </label><input id="winePrice" type="text" class="newWineInput"name="updated_price" value="<?php if($wine['price'] !== '0.00') echo $wine['price']; ?>" title="(price per bottle) Please do not use the dollar sign (&#36)" /></p> 
				
				<p class="newWineInputPar"><label class="wineLabel" for="lifeExpectancy" title="This is a range of when the wine is expected to go bad">Peak Drinking Period: </label><select id="edit_wine_lower_life_expectancy" name="updated_lower_life_expectancy" initialLowerLifeExpectancy="<?php echo $wine['lower_life_expectancy']; ?>" title="The minimum year that the bottle is expected to start to go bad"></select> to 
				<select id="edit_wine_upper_life_expectancy" name="updated_upper_life_expectancy" initialUpperLifeExpectancy="<?php echo $wine['upper_life_expectancy'];?>" title="The maximum year that the wine is expected to start to go bad"></select></p>
				
				<p class="newWineInputPar"><span class="mandatory">* </span><label class="wineLabel" for="color">Color: </label>
					<select id="edit_color" name="updated_color" initialColor="<?php echo $wine['color']; ?>">
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
			
				<p class="newWineInputPar"><span class="mandatory">* </span><label class="wineLabel" for="grapeVarietal">Grape Varietal: </label><input id="wineGrapeVarietal" type="text" class="newWineInput" name="updated_grape_varietal" value="<?php echo $wine['grape_varietal']; ?>" required/></p> <!---should I make this into select element with options? -->
				
				<p class="newWineInputPar"><label class="wineLabel" for="percentAlcohol">Percent Alcohol: </label><input id="winePercentAlcohol" type="text" class="newWineInput" name="updated_percent_alcohol" value="<?php if($wine['percent_alcohol'] !== '0.00') echo $wine['percent_alcohol']; ?>" title="Please do not use the percent sign (&#37)." /></p> 
				
				<p class="newWineInputPar"><label class="wineLabel" for="wine_comments">Comments: </label><textarea id="wineComments" type="text" class="newWineInput" name="updated_wine_comments" rows="4"><?php echo $wine['wine_comments']; ?></textarea></p>

				<p id="wineSubmit"><input id="submit" value="Update!" type="submit"/></p>
			</form>
		</fieldset>
		<?php include('../../footer.php'); ?>
	</body>
</html>
<?php mysql_close($connection); ?>