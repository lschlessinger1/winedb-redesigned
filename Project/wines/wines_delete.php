<?php
require_once('../../get_db.php');
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));
$delete_wine = 'DELETE FROM wines WHERE id = '.$id;
mysql_query($delete_wine) or die("Deletion error ".mysql_error()); // deletes that wine type

$delete_bottles = 'DELETE FROM bottles WHERE wine_id = '.$id;
mysql_query($delete_bottles) or die("Deletion error ".mysql_error()); // deletes the bottles of the wine type

mysql_close($connection);
header("Location:wines_index.php");
exit;
?>