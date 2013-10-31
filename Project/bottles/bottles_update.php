<?php
require_once('../../get_db.php');
$is_open = mysql_real_escape_string(htmlentities(trim($_POST['is_open'])));
if($is_open == 'open'){
	$is_open = 1;
} else if($is_open == 'closed'){
	$is_open = 0;
}
$wine_id = mysql_real_escape_string(htmlentities(trim($_POST['updated_wine_id'])));
$location_id = mysql_real_escape_string(htmlentities(trim($_POST['updated_location_id'])));
$bottle_comments = mysql_real_escape_string(htmlentities(trim($_POST['updated_bottle_comments'])));
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));

mysql_query('UPDATE bottles SET is_open="'.$is_open.'", wine_id="'.$wine_id.'", location_id="'.$location_id.'", bottle_comments="'.$bottle_comments.'"WHERE id = '.$id) or die("Could not perform query... ".mysql_error());

mysql_close($connection);
header('Location: bottles_index.php?page=home');
exit;
?>