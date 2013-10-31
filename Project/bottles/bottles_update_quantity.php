<?php
require_once('../../get_db.php');
$quantity = mysql_real_escape_string(htmlentities(trim($_POST['new_quantity'])));
$is_open = mysql_real_escape_string(htmlentities(trim($_POST['new_is_open'])));
if($is_open == 'open'){
	$is_open = 1;
} else if($is_open == 'closed'){
	$is_open = 0;
}
$wine_id = mysql_real_escape_string(htmlentities(trim($_POST['get_wine_id'])));
$location_id = mysql_real_escape_string(htmlentities(trim($_POST['new_location_id'])));
if($wine_id){ //if it ever found a wine_id to match up the name
	for ($i=1; $i<=$quantity; $i++) {
		mysql_query("INSERT INTO bottles (is_open, wine_id, location_id) VALUES ('".$is_open."', '".$wine_id."', '".$location_id."')") or die ("Could not perform query... ".mysql_error());
	}
}
mysql_close($connection);
header("Location:bottles_index.php?page=home");
exit;
?>