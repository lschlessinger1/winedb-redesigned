<?php
require_once('../../get_db.php');
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
mysql_query("INSERT INTO wines (vintage, region, country, wine_maker_or_vineyard, supplier, price, lower_life_expectancy, upper_life_expectancy, color, grape_varietal, percent_alcohol, wine_comments) 
VALUES ('".$vintage."', '".$region."', '".$country."','".$wine_maker_or_vineyard."', '".$supplier."', '".$price."', '".$lower_life_expectancy."', '".$upper_life_expectancy."', '".$color."', '".$grape_varietal."', '".$percent_alcohol."', '".$wine_comments."')") 
or die ("Could not perform query... ".mysql_error());
mysql_close($connection);
header("Location:wines_index.php");
exit;
?>