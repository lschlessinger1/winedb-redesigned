<?php
require_once('../../get_db.php');
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));
$delete_location = 'DELETE FROM locations WHERE id = '.$id;
mysql_query($delete_location) or die("Deletion error ".mysql_error()); // deletes that location

$delete_bottles = 'DELETE FROM bottles WHERE location_id = '.$id;
mysql_query($delete_bottles) or die("Deletion error ".mysql_error()); // deletes the bottles from the location

mysql_close($connection);
header("Location:locations_index.php");
exit;
?>