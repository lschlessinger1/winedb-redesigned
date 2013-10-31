<?php
require_once('../../get_db.php');
$is_open = mysql_real_escape_string(htmlentities(trim($_POST['new_is_open'])));
$location_id = mysql_real_escape_string(htmlentities(trim($_POST['new_location_id'])));
$vintage = mysql_real_escape_string(htmlentities(trim($_POST['new_vintage'])));
$region = mysql_real_escape_string(htmlentities(trim($_POST['new_region'])));
$country = mysql_real_escape_string(htmlentities(trim($_POST['new_country'])));
$wine_maker_or_vineyard = mysql_real_escape_string(htmlentities(trim($_POST['new_wine_maker_or_vineyard'])));
$supplier = mysql_real_escape_string(htmlentities(trim($_POST['new_supplier'])));
$price = mysql_real_escape_string(htmlentities(trim($_POST['new_price'])));
$lower_life_expectancy = mysql_real_escape_string(htmlentities(trim($_POST['new_lower_life_expectancy'])));
$upper_life_expectancy = mysql_real_escape_string(htmlentities(trim($_POST['new_upper_life_expectancy'])));
$color = mysql_real_escape_string(htmlentities(trim($_POST['new_color'])));
$grape_varietal = mysql_real_escape_string(htmlentities(trim($_POST['new_grape_varietal'])));
$percent_alcohol = mysql_real_escape_string(htmlentities(trim($_POST['new_percent_alcohol'])));
$wine_comments = mysql_real_escape_string(htmlentities(trim($_POST['new_wine_comments'])));
$quantity = mysql_real_escape_string(htmlentities(trim($_POST['new_quantity']))); // do i need to put NOW()?
mysql_query("INSERT INTO wines (vintage, region, country, wine_maker_or_vineyard, supplier, price, lower_life_expectancy, upper_life_expectancy, color, grape_varietal, percent_alcohol, wine_comments) VALUES ('".$vintage."', '".$region."', '".$country."','".$wine_maker_or_vineyard."', '".$supplier."', '".$price."', '".$lower_life_expectancy."', '".$upper_life_expectancy."', '".$color."', '".$grape_varietal."', '".$percent_alcohol."', '".$wine_comments."')")
or die ("Could not perform query... ".mysql_error());
$wine_query = mysql_query('SELECT id FROM wines ORDER BY id DESC LIMIT 1'); //last id of wine's table (the wine that was just created above)
$wine_id;
if($is_open == 'open'){
	$is_open = 1;
} else if($is_open == 'closed'){
	$is_open = 0;
}
while($row = mysql_fetch_array($wine_query)){
	$wine_id = ($row['id']);
}
if($wine_id){ //check if it ever found a wine_id to match up the name
	for ($i=1; $i<=$quantity; $i++) {
		mysql_query("INSERT INTO bottles (is_open, wine_id, location_id) VALUES ('".$is_open."', '".$wine_id."', '".$location_id."')") or die ("Could not perform query... ".mysql_error());
	}
}
mysql_close($connection);
header("Location:bottles_index.php?page=home");
exit;
?>