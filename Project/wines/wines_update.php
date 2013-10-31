<?php
require_once('../../get_db.php');
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));
$vintage = mysql_real_escape_string(htmlentities(trim($_POST['updated_vintage'])));
$region = mysql_real_escape_string(htmlentities(trim($_POST['updated_region'])));
$country = mysql_real_escape_string(htmlentities(trim($_POST['updated_country'])));
$wine_maker_or_vineyard = mysql_real_escape_string(htmlentities(trim($_POST['updated_wine_maker_or_vineyard'])));
$supplier = mysql_real_escape_string(htmlentities(trim($_POST['updated_supplier'])));
$price = mysql_real_escape_string(htmlentities(trim($_POST['updated_price'])));
$lower_life_expectancy = mysql_real_escape_string(htmlentities(trim($_POST['updated_lower_life_expectancy'])));
$upper_life_expectancy = mysql_real_escape_string(htmlentities(trim($_POST['updated_upper_life_expectancy'])));
$color = mysql_real_escape_string(htmlentities(trim($_POST['updated_color'])));
$grape_varietal= mysql_real_escape_string(htmlentities(trim($_POST['updated_grape_varietal'])));
$percent_alcohol = mysql_real_escape_string(htmlentities(trim($_POST['updated_percent_alcohol'])));
$wine_comments = mysql_real_escape_string(htmlentities(trim($_POST['updated_wine_comments'])));
mysql_query('UPDATE wines SET vintage="'.$vintage.'",region="'.$region.'",country="'.$country.'", wine_maker_or_vineyard="'.$wine_maker_or_vineyard.'", supplier="'.$supplier.'", price="'.$price.'",lower_life_expectancy="'.$lower_life_expectancy.'", upper_life_expectancy="'.$upper_life_expectancy.'", color="'.$color.'", grape_varietal="'.$grape_varietal.'", percent_alcohol="'.$percent_alcohol.'", wine_comments="'.$wine_comments.'"WHERE id = '.$id) or die("Could not perform query... ".mysql_error());
mysql_close($connection);
header("Location:wines_index.php");
exit;
?>